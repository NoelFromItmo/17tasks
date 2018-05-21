<?php

namespace phlint;

use \ArrayObject;
use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeTraverser;
use \phlint\Output;
use \phlint\Parser;
use \phlint\Result;
use \PhpParser\Node;
use \ReflectionMethod;

class Code {

  public $data = [];

  /** @internal */
  public $acode = [];

  /** @internal */
  public $inferences = [];

  /** @internal */
  public $autoloaders = [];

  /** @internal */
  public $autoloadLookups = [];

  /** @internal */
  public $globalVariables = [];

  /** @internal */
  public $scopes = [];

  public $asts = [];
  public $astsIsLibrary = [];

  public $loadedFileMap = [];

  public $imports = [];

  public $interfaceSymbolMap = [];

  function __construct () {
    $this->globalVariables = new ArrayObject();
  }

  function addAst ($ast, $isLibrary = false) {

    if (count($ast) == 0 || !$ast[0]->getAttribute('inferred'))
      Code::infer($ast, $this->inferences);

    $this->asts[] = $ast;
    $this->astsIsLibrary[] = $isLibrary;
  }

  function load ($code) {

    $expandedCode = [];

    #MetaContext::get(Output::class)->__invoke("Collecting code files ...\n");

    foreach ($code as $codeEntry) {

      if ($codeEntry['source']) {
        $codeEntry['source'] = preg_replace('/(?is)\A\r?\n/', '', $codeEntry['source']);
        $codeEntry['source'] = (substr($codeEntry['source'], 0, 2) != '<?' ? '<?php ' : '') . $codeEntry['source'];
        $expandedCode[] = $codeEntry;
        continue;
      }

      if (is_file($codeEntry['path'])) {
        $iterator = [$codeEntry['path']];
      } else {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($codeEntry['path']));
        $iterator = new \RegexIterator($iterator, '/(?i)\.php$/');
      }

      foreach ($iterator as $file) {
        $filePath = is_object($file) ? $file->getPathName() : $file;
        if (isset(MetaContext::get(Code::class)->loadedFileMap[$filePath]) || isset(MetaContext::get(Code::class)->loadedFileMap[realpath($filePath)]))
          continue;
        MetaContext::get(Code::class)->loadedFileMap[$filePath] = true;
        MetaContext::get(Code::class)->loadedFileMap[realpath($filePath)] = true;
        $expandedCode[] = [
          'path' => $file,
          'source' => file_get_contents($file),
          'isLibrary' => $codeEntry['isLibrary'],
        ];
      }

    }

    #MetaContext::get(Output::class)->__invoke("Parsing code ...\n");

    $aggregatedAst = [];

    foreach ($expandedCode as &$codeEntry) {
      try {
        if (false)
        if ($codeEntry['path'])
          MetaContext::get(Output::class)->__invoke(($codeEntry['isLibrary'] ? '  Library: ' : '') . $codeEntry['path'] . "\n");
        $sourceClass = class_exists(Node\Identifier::class)
          ? pnode\Source::class
          : pnode\SourceV3::class;
        $codeEntry['ast'] = [new $sourceClass(Parser::parse($codeEntry['source']), ['startLine' => 1])];
        if ($codeEntry['path'])
          self::populatePath($codeEntry['ast'], $codeEntry['path']);
        if ($codeEntry['isLibrary'])
          NodeTraverser::traverse($codeEntry['ast'], [function ($node) {
            $node->setAttribute('isLibrary', true);
            $node->setAttribute('inAnalysisScope', false);
          }]);
        $aggregatedAst = array_merge($aggregatedAst, $codeEntry['ast']);
      } catch (\PhpParser\Error $exception) {
        MetaContext::get(Result::class)->addViolation(
          new Node\Stmt\Nop(['path' => $codeEntry['path']]),
          'sourceSyntax',
          'Source Syntax',
          'Parse error: ' . $exception->getMessage()
            . ($codeEntry['path'] ? ' in *' . realpath($codeEntry['path']) . '*.' : '.'),
          'Parse error: ' . $exception->getMessage()
            . ($codeEntry['path'] ? ' in *' . realpath($codeEntry['path']) . '*.' : '.')
        );
      }
    }

    self::infer($aggregatedAst, $this->inferences);

    foreach ($expandedCode as &$codeEntry) {
      if (!isset($codeEntry['ast']))
        continue;
      $this->addAst($codeEntry['ast'], $codeEntry['isLibrary']);
    }

  }

  static function infer ($ast, $inferrers = []) {

    if (count($inferrers) == 0)
      $inferrers = MetaContext::get(Code::class)->inferences;

    foreach ($ast as $astEntry)
      $astEntry->setAttribute('inferred', true);

    #MetaContext::get(Output::class)->__invoke("Inferring about code ...\n");

    #MetaContext::get(Output::class)->indent();

    $inferrers = array_filter($inferrers, function ($inferrer) {
      return false
        || method_exists($inferrer, 'afterNode')
        || method_exists($inferrer, 'beforeNode')
        || method_exists($inferrer, 'enterNode')
        || method_exists($inferrer, 'leaveNode')
        || method_exists($inferrer, 'visitNode')
      ;
    });

    $inferrerPasses = [];

    foreach ($inferrers as $inferrer) {

      $pass = 10;

      if (is_callable($inferrer) && (!is_object($inferrer) || ($inferrer instanceof \Closure))) {
        $reflection = new ReflectionMethod($inferrer);
        if (preg_match('/(?is)\@pass[ \t\r\n]*\([ \t\r\n]*([^\)]+)\)/', $reflection->getDocComment(), $match))
          $pass = $match[1];
      }

      if (method_exists($inferrer, 'getPass'))
        $pass = $inferrer->getPass();

      // Allow running the same inference in different passes.
      // @todo: Rethink.
      foreach ((array) $pass as $p) {
        if (!isset($inferrerPasses[$p]))
          $inferrerPasses[$p] = [];
        $inferrerPasses[$p][] = $inferrer;
      }

    }

    ksort($inferrerPasses);

    foreach ($inferrerPasses as $pass => $inferrers) {
      #MetaContext::get(Output::class)->__invoke("Running inference pass " . $pass . " ...\n");
      $inferrersx = [];
      foreach ($inferrers as $inferrer)
        $inferrersx[] = clone $inferrer;
      NodeTraverser::traverse($ast, $inferrersx);
    }

    #MetaContext::get(Output::class)->unindent();

    #MetaContext::get(Output::class)->__invoke("Code inference complete.\n");

    return $ast;

  }

  static function analyze ($ast, $rules) {
    NodeTraverser::traverse($ast, $rules);
  }

  static function parse ($source, $path = '') {

    static $parser = null;

    if ($parser === null) {
      $parserFactory = new \PhpParser\ParserFactory();
      $parser = $parserFactory->create(\PhpParser\ParserFactory::PREFER_PHP7);
    }

    $ast = $parser->parse(preg_replace('/(?is)\A\<\?(?=[ \t\r\n])/', '<?php', $source));

    if (preg_match('/(?is)\A\<\?(?=[ \t\r\n])/', $source) > 0 && count($ast) > 0)
      $ast[0]->setAttribute('hasShortOpenTag', true);

    #NodeTraverser::traverse($ast, [function ($node) {
    #  $node->setAttribute('isSourceAvailable', true);
    #}]);

    return $ast;

  }

  protected static function populatePath ($ast, $path) {
    NodeTraverser::traverse($ast, [function ($node) use ($path) {
      $node->setAttribute('path', realpath($path) ? realpath($path) : (string) $path);
    }]);
  }

}
