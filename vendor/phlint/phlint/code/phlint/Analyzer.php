<?php

namespace phlint;

use \ArrayObject;
use \luka8088\ExtensionCall;
use \luka8088\ExtensionInterface;
use \luka8088\phops\DestructCallback;
use \luka8088\phops\MetaContext;
use \Phlint;
use \phlint\Code;
use \phlint\IIData;
use \phlint\Internal;
use \phlint\Output;
use \phlint\Result;
use \Symfony\Component\Console\Input\InputDefinition;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Input\InputOption;
use \Symfony\Component\Console\Output\OutputInterface;

class Analyzer {

  /**
   * Standard library consist of a set of symbols which are under normal circumstances always available.
   * As inferences are run against standard library in the same way they are against other library
   * code it might create significant noise while debugging and hence one might want to disable
   * it during debugging.
   *
   * @see https://en.wikipedia.org/wiki/Runtime_library
   * @see https://en.wikipedia.org/wiki/Standard_library
   */
  public $importStandardLibrary = true;

  /** @internal */
  public $inferences = [];

  /** @internal */
  public $rules = [];

  /**
   * Intermediately inferred data.
   *
   * @see /documentation/glossary/intermediatelyInferredData.md
   *
   * @internal
   */
  public $iiData = null;

  static function create () {
    return new self();
  }

  function __construct () {
    $this->iiData = new ArrayObject();
  }

  function analyze () {

    $self = $this;

    /**
     * Disable cyclic garbage collector during analysis as it has
     * huge performance implications on large code bases.
     */
    if (gc_enabled()) {
      $cyclicGCScoped = DestructCallback::create(function () { gc_enable(); });
      gc_disable();
    }

    $this->extensionInterface['phlint.analysis.begin']();

    $code = new Code();
    $result = new Result();

    $code->extensionInterface = $this->extensionInterface;
    $result->extensionInterface = $this->extensionInterface;

    foreach ($this->inferences as $inference) {
      $this->extensionInterface[] = $inference;
      if (method_exists($inference, 'setExtensionInterface'))
        $inference->setExtensionInterface($this->extensionInterface);
    }

    foreach ($this->rules as $rule) {
      $this->extensionInterface[] = $rule;
      if (method_exists($rule, 'setExtensionInterface'))
        $rule->setExtensionInterface($this->extensionInterface);
    }

    $code->acode = $this->code;

    $this->iiData->exchangeArray([]);

    $iiData = $this->iiData;

    // Todo: Rewrite
    static $phpStandardCode = [];

    $extensionInterfaceMetaContext = MetaContext::enterDestructible(ExtensionInterface::class, $self->extensionInterface);
    $iiDataMetaContext = MetaContext::enterDestructible(IIData::class, $self->iiData);
    $outputMetaContext = MetaContext::enterDestructible(Output::class, $self->output);
    $resultMetaContext = MetaContext::enterDestructible(Result::class, $result);
    $codeMetaContext = MetaContext::enterDestructible(Code::class, $code);

    $beginTimestamp = microtime(true);

    $rules = [];
    $inferences = [];

    $collectInferences = function ($requiredInferences) use (&$collectInferences, &$inferences, $self) {
      foreach ($self->inferences as $specificInference)
        if (in_array($specificInference->getIdentifier(), $requiredInferences)) {
          if (method_exists($specificInference, 'getDependencies'))
            $collectInferences($specificInference->getDependencies());
          $hasInference = false;
          foreach ($inferences as $existingInference)
            if ($existingInference === $specificInference)
              $hasInference = true;
          if (!$hasInference)
            $inferences[] = $specificInference;
        }
    };

    foreach ($self->rules as $specificRule)
      if (in_array($specificRule->getIdentifier(), $this->enabledRules)) {
        $hasRule = false;
        foreach ($rules as $existingRule)
          if ($existingRule === $specificRule)
            $hasRule = true;
        if (!$hasRule)
          $rules[] = $specificRule;
        if (method_exists($specificRule, 'getInferences'))
          $collectInferences($specificRule->getInferences());
      }

    $code->inferences = $inferences;

    if ($this->importStandardLibrary) {
      MetaContext::get(Output::class)->__invoke("Importing php standard definitions ...\n");

      // @todo: Rewrite
      static $phpStandardDefinitionsAst = [];

      if (count($phpStandardDefinitionsAst) == 0)
        $phpStandardDefinitionsAst = array_merge(
          Internal::importDefinitions('core'),
          Internal::importDefinitions('extension-date'),
          Internal::importDefinitions('extension-filter'),
          Internal::importDefinitions('extension-hash'),
          Internal::importDefinitions('extension-libxml'),
          Internal::importDefinitions('extension-pcre'),
          Internal::importDefinitions('extension-readline'),
          Internal::importDefinitions('extension-reflection'),
          Internal::importDefinitions('extension-session'),
          Internal::importDefinitions('extension-spl'),
          Internal::importDefinitions('standard')
        );

      // @todo: Rewrite
      if (count($phpStandardCode) == 0) {
        call_user_func(function () use ($inferences, &$phpStandardDefinitionsAst, $iiData, &$phpStandardCode) {
          $codeMetaContext = MetaContext::enterDestructible(Code::class, new Code());
          MetaContext::get(Code::class)->extensionInterface = new ExtensionInterface();
          MetaContext::get(Code::class)->extensionInterface[] = [
            /** @ExtensionCall("phlint.analysis.begin") */ function () {},
            /** @ExtensionCall("phlint.analysis.end") */ function () {},
            /** @ExtensionCall("phlint.analysis.issueFound") */ function ($issue) {},
            /** @ExtensionCall("phlint.phpAutoloadClass") */ function ($className, $code) {},
            /** @ExtensionCall("phlint.phpAutoloadInitialize") */ function () {},
          ];
          MetaContext::get(Code::class)->inferences = $inferences;
          Code::infer($phpStandardDefinitionsAst);
          $phpStandardCode = [
            'iiData' => $iiData->getArrayCopy(),
            'data' => MetaContext::get(Code::class)->data,
            'scopes' => MetaContext::get(Code::class)->scopes,
            'interfaceSymbolMap' => MetaContext::get(Code::class)->interfaceSymbolMap,
          ];
        });
      }
      $iiData->exchangeArray(array_merge($phpStandardCode['iiData'], $iiData->getArrayCopy()));
      MetaContext::get(Code::class)->data = array_merge($phpStandardCode['data'], MetaContext::get(Code::class)->data);
      MetaContext::get(Code::class)->scopes = array_merge($phpStandardCode['scopes'], MetaContext::get(Code::class)->scopes);
      MetaContext::get(Code::class)->interfaceSymbolMap = array_merge($phpStandardCode['interfaceSymbolMap'], MetaContext::get(Code::class)->interfaceSymbolMap);

      $code->addAst($phpStandardDefinitionsAst, true);
      $this->_recordMemoryUsage();
    }

    MetaContext::get(Output::class)->__invoke("Loading code ...\n");

    MetaContext::get(Code::class)->extensionInterface['phlint.phpAutoloadInitialize']();

    MetaContext::get(Output::class)->indent();
    $code->load($self->code);
    $this->_recordMemoryUsage();
    MetaContext::get(Output::class)->unindent();

    MetaContext::get(Output::class)->__invoke("Analyzing code ...\n");

    $libraryResult = new Result();

    $libraryResult->extensionInterface = new ExtensionInterface();

    $libraryResult->extensionInterface[] = [
      /** @ExtensionCall("phlint.analysis.begin") */ function () {},
      /** @ExtensionCall("phlint.analysis.end") */ function () {},
      /** @ExtensionCall("phlint.analysis.issueFound") */ function ($issue) {},
      /** @ExtensionCall("phlint.phpAutoloadClass") */ function ($className, $code) {},
      /** @ExtensionCall("phlint.phpAutoloadInitialize") */ function () {},
    ];

    call_user_func(function () use ($self, $libraryResult, $code, $result, $rules, &$phpStandardCode) {

      $resultMetaContext = MetaContext::enterDestructible(Result::class, $libraryResult);
      $outputMetaContext = MetaContext::enterDestructible(Output::class, function () {});

      if (isset(MetaContext::get(Code::class)->data['dummySpecializations']))
      foreach (MetaContext::get(Code::class)->data['dummySpecializations'] as $dummySpecialization) {
        Code::analyze([$dummySpecialization], $rules);
        $this->_recordMemoryUsage();
      }

      foreach (MetaContext::get(Code::class)->data['symbols'] as $symbol => $_)
        foreach (\phlint\inference\SymbolDeclaration::get($symbol) as $definitionNode) {
          if (!$definitionNode->getAttribute('isLibrary', false))
            continue;
          if ($definitionNode->getAttribute('isSpecialization', false))
            continue;
          Code::analyze([$definitionNode], $rules);
          $this->_recordMemoryUsage();
        }

    });

    MetaContext::get(Result::class)->libraryViolations = array_map(function ($violation) {
      return $violation->getLegacyMessageWithTrace();
    }, $libraryResult->violations);

    foreach ($code->asts as $index => $ast) {
      if ($code->astsIsLibrary[$index])
        continue;
      Code::analyze($ast, $rules);
      $this->_recordMemoryUsage();
    }

    foreach (MetaContext::get(Code::class)->data['symbols'] as $symbol => $_)
      foreach (\phlint\inference\SymbolDeclaration::get($symbol) as $definitionNode) {
        if (!$definitionNode->getAttribute('isSpecialization', false))
          continue;
        Code::analyze([$definitionNode], $rules);
        $this->_recordMemoryUsage();
      }

    $this->_recordMemoryUsage();

    MetaContext::get(Output::class)->__invoke(
      "\n" .
      'Done in ' . number_format((microtime(true) - $beginTimestamp) * 1000, 2) . "ms\n" .
      'Maximum memory usage is ' . number_format($this->maximumMemoryUsage / (1024 * 1024), 2) . "MB\n"
    );

    $this->extensionInterface['phlint.analysis.end']();

    return $result;

  }

  public $maximumMemoryUsage = 0;

  protected function _recordMemoryUsage () {
    $this->maximumMemoryUsage = max($this->maximumMemoryUsage, memory_get_usage());
  }

}
