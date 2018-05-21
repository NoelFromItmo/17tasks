<?php

use \phif\DeclarationBuilder;
use \phif\NodeFacade;
use \phif\Parser;
use \phif\Printer;
use \PhpParser\Comment;
use \PhpParser\Node;

/**
 * This class handles PHP internal and standard library information that
 * is not available out of the box or needs to be available in a
 * specific format.
 */
class Phif {

  static function documentationPath () {
    return __dir__ . '/../temp/php-documentation.html';
  }

  static function declarationPath () {
    return __dir__ . '/../data/';
  }

  static function extractors () {
    return [
      '\phif\extractor\Documentation::extract',
      '\phif\extractor\Reflection::extract',
    ];
  }

  static function patches () {
    return [
      '\phif\patch\Constant::patch',
      '\phif\patch\Declaration::patch',
      '\phif\patch\EnvironmentConstants::patch',
      '\phif\patch\Isolated::patch',
      '\phif\patch\Logic::patch',
      '\phif\patch\Pure::patch',
      '\phif\patch\SourceLibrary::patch',
      '\phif\patch\ValueConstants::patch',
    ];
  }

  /**
   * @see http://php.net/manual/en/language.variables.superglobals.php
   */
  static $superglobals = [
    '_COOKIE',
    '_ENV',
    '_FILES',
    '_GET',
    '_POST',
    '_REQUEST',
    '_SERVER',
    '_SESSION',
    'GLOBALS',
  ];

  static $phpDocumentorTypeToPhpTypeMap = [
    'array' => 'array',
    'bool' => 'bool',
    'boolean' => 'bool',
    'callback' => 'callable',
    'double' => 'float',
    'false' => '',
    'float' => 'float',
    'int' => 'int',
    'integer' => 'int',
    'mixed' => '',
    'null' => '',
    'object' => '',
    'resource' => '',
    'self' => 'self',
    'string' => 'string',
    'true' => '',
    'void' => '',
  ];

  static function importDeclarations ($id) {
    if (!is_file(__dir__ . '/../data/php-' . strtolower($id) . '.php'))
      throw new Exception('Import file *' . __dir__ . '/../data/php-' . strtolower($id) . '.php' . '* not found.');
    return file_get_contents(__dir__ . '/../data/php-' . strtolower($id) . '.php');
  }

  static function downloadPhpDocumentation () {
    $curl = curl_init();

    // Todo: Only in development.
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_URL, 'http://php.net/get/php_manual_en.html.gz/from/this/mirror');

    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($curl);

    $documentation = gzdecode($content);

    if (!is_dir(dirname(self::documentationPath())))
      mkdir(dirname(self::documentationPath()), 0777, true);

    file_put_contents(self::documentationPath(), $documentation);

  }

  static function generateDeclarations () {

    $blueprint = new ArrayObject();

    foreach (Phif::extractors() as $extractor)
      call_user_func($extractor, $blueprint);

    foreach (Phif::patches() as $patch)
      call_user_func($patch, $blueprint);

    $declarations = DeclarationBuilder::build($blueprint);

    $output = [
      'php-standard' => '',
    ];

    $output['php-standard'] .= "\n";
    foreach (self::$superglobals as $superglobal)
      $output['php-standard'] .= '/** @var array */ $' . $superglobal . ' = [];' . "\n";

    foreach ($declarations as $declaration) {
      echo '1';
      if ($declaration->getAttribute('source-library') == 'php-standard' && ($declaration instanceof Node\Stmt\Function_) && !function_exists($declaration->name))
        $declaration->setAttribute('source-library', '');
      if ($declaration->getAttribute('source-library') == 'php-standard' && ($declaration instanceof Node\Stmt\Class_) && !class_exists($declaration->name))
        $declaration->setAttribute('source-library', '');
    }

    foreach ($declarations as $declaration) {
      echo '1';
      if ($declaration instanceof Node\Stmt\Function_)
        foreach ($declaration->params as $parameter)
          self::generateDocComment($parameter);
      self::generateDocComment($declaration);
    }

    usort($declarations, function ($a, $b) {
      #if ($a instanceof Node\Stmt\Const_)
      #  $a = $a->consts[0];
      #if ($b instanceof Node\Stmt\Const_)
      #  $b = $b->consts[0];
      $a = $a->getAttribute('symbol', '');
      $b = $b->getAttribute('symbol', '');
      if (strpos($a, 'd_') === 0)
        $a = '10_' . $a;
      if (strpos($b, 'd_') === 0)
        $b = '10_' . $b;
      if (strpos($a, 'f_') === 0)
        $a = '20_' . $a;
      if (strpos($b, 'f_') === 0)
        $b = '20_' . $b;
      if (strpos($a, 'c_') === 0)
        $a = '30_' . $a;
      if (strpos($b, 'c_') === 0)
        $b = '30_' . $b;
      return strcmp(strtolower($a), strtolower($b));
    });

    $afterConst = [];

    foreach ($declarations as $declaration) {
      echo '2';

      if ($declaration->getAttribute('isRemoved', false))
        continue;

      $serializedDeclaration = self::sourcePrint($declaration);

      if (($declaration instanceof Node\Stmt\Class_) || ($declaration instanceof Node\Stmt\Interface_) || ($declaration instanceof Node\Stmt\Function_))
        $serializedDeclaration = "\n" . $serializedDeclaration;

      $sourceLibrary = $declaration->getAttribute('source-library');

      if (!$sourceLibrary)
        continue;

      if (!isset($output[$sourceLibrary])) {
        $output[$sourceLibrary] = '';
      }

      if (!isset($afterConst[$sourceLibrary]))
        $afterConst[$sourceLibrary] = 0;

      if ($afterConst[$sourceLibrary] == 0 && ($declaration instanceof Node\Stmt\Const_)) {
        $afterConst[$sourceLibrary] = 1;
        $output[$sourceLibrary] .= "\n";
      }

      if ($afterConst[$sourceLibrary] == 1 && !($declaration instanceof Node\Stmt\Const_)) {
        $afterConst[$sourceLibrary] = 2;
        #$output[$sourceLibrary] .= "\n";
      }

      $output[$sourceLibrary] .= $serializedDeclaration . "\n";
    }

    // Make sure that output is parsable.
    // Todo: Remove
    try {
    foreach ($output as $outputChunk)
      Parser::parse($outputChunk);
    } catch (\Exception $e) {
      echo $e;
      echo $output;
    }

    foreach ($output as $sourceLibrary => $outputChunk) {
      // @todo: Rethink.
      if ($sourceLibrary == 'php-extension-memcache')
        continue;
      // @todo: Rethink.
      if ($sourceLibrary == 'php-extension-imagick')
        continue;
      file_put_contents(self::declarationPath() . '/' . $sourceLibrary . '.php', "<?php\n" . $outputChunk);
    }
    #$output = []'<?php';
    #$output .= "\n\n";


    #file_put_contents(self::declarationPath(), $output);

  }

  static function generateDocComment ($node) {

    $commentLines = [];

    if ($node->getAttribute('out', ''))
      $commentLines[] = trim('@out ' . $node->getAttribute('out', ''));

    if ($node->getAttribute('var', ''))
      $commentLines[] = trim('@var ' . $node->getAttribute('var', ''));

    if ($node->getAttribute('types', ''))
      $commentLines[] = trim('@var ' . $node->getAttribute('types', ''));

    if (false)
    if (isset($node->params))
      foreach ($node->params as $parameter) {
        $type = is_object($parameter->type) ? $parameter->type->toString() : ((string) $parameter->type);
        if (!$type)
          $type = 'mixed';
        $commentLines[] = trim('@param ' . $type . ' $' . $parameter->var->name);
      }

    if (count($commentLines) > 0)
      if ($node instanceof Node\Param)
        $node->setAttribute('comments', [new Comment\Doc("/** " . implode(" ", $commentLines) . " */")]);
      else
        $node->setAttribute('comments', [new Comment\Doc("/**\n * " . implode("\n * ", $commentLines) . "\n */")]);

  }

  static function sourceLibrary ($extension) {
    if (is_object($extension) && method_exists($extension, 'getExtension'))
      $extension = $extension->getExtension()->getName();
    if ($extension == 'standard')
      return 'php-standard';
    if ($extension == 'Core')
      return 'php-core';
    if ($extension == 'mhash')
      return 'php-extension-hash';
    if ($extension == 'SimpleXML')
      return 'php-extension-simplexml';
    if (in_array($extension, ['PDO', 'pdo']))
      return 'php-extension-pdo';
    if (in_array($extension, ['SPL', 'spl']))
      return 'php-extension-spl';
    if ($extension == 'CUBRID')
      return 'php-extension-cubrid';
    if ($extension == 'OAuth')
      return 'php-extension-oauth';
    if ($extension == 'OCI8')
      return 'php-extension-oci8';
    if ($extension == 'Phar')
      return 'php-extension-phar';
    if ($extension == 'Reflection')
      return 'php-extension-reflection';
    if ($extension == 'Solr')
      return 'php-extension-solr';
    if ($extension == 'ZendOpcache')
      return 'php-extension-zendopcache';
    return 'php-extension-' . strtolower($extension);
  }

  static function parentSymbol ($symbol) {
    return strpos($symbol, '.') === false ? '' : substr($symbol, 0, strrpos($symbol, '.'));
  }

  static function unqualifiedSymbol ($symbol) {
    return substr('.' . $symbol, strrpos('.' . $symbol, '.') + 1);
  }

  static function sourcePrint ($node) {
    if (is_string($node))
      return $node;
    $printer = new Printer();
    return $printer->prettyPrint([$node]);
  }

}
