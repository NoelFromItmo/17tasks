<?php

namespace phlint;

use \ArrayAccess;
use \Exception;
use \luka8088\ExtensionCall;
use \luka8088\ExtensionInterface;
use \luka8088\phops\DestructCallback;
use \luka8088\phops\MetaContext;
use \phlint\autoload\Composer;
use \phlint\Code;
use \phlint\Internal;
use \phlint\Output;
use \phlint\Result;
use \Symfony\Component\Console\Command\Command;
use \Symfony\Component\Console\Input\InputDefinition;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Input\InputOption;
use \Symfony\Component\Console\Output\OutputInterface;

class Application extends \Symfony\Component\Console\Application implements ArrayAccess {

  /** @internal */
  protected $extensionInterface = null;

  /** @internal */
  public $parameters = [];

  /** @internal */
  public $parser = null;

  /** @internal */
  public $inferences = [];

  /** @internal */
  public $rules = [];

  /** @internal */
  public $enabledRules = [];

  /** @internal */
  public $code = [];

  /** @internal */
  public $importStandardLibrary = true;

  static function create () {
    return new static();
  }

  function __construct () {

    parent::__construct();

    $this->extensionInterface = new ExtensionInterface();

    $this->extensionInterface[] = [
      /** @ExtensionCall("phlint.analysis.begin") */ function () {},
      /** @ExtensionCall("phlint.analysis.end") */ function () {},
      /** @ExtensionCall("phlint.analysis.issueFound") */ function ($issue) {},
      /** @ExtensionCall("phlint.phpAutoloadClass") */ function ($className, $code) {},
      /** @ExtensionCall("phlint.phpAutoloadInitialize") */ function () {},
    ];

    $this->output = new Output(null);

    $this[] = new \phlint\report\Console();

    $this->getDefinition()->addOption(new InputOption(
      '--configuration',
      '-c',
      InputOption::VALUE_OPTIONAL,
      'Path to a configuration file.'
    ));

    $this->createParameter('rootPath', self::autodetectRootPath());

    $this->add(new \phlint\command\Analyze());

    $this->setDefaultCommand('analyze');

    $this->registerInference(new \phlint\inference\Attribute());
    $this->registerInference(new \phlint\inference\Concept());
    $this->registerInference(new \phlint\inference\Constraint());
    $this->registerInference(new \phlint\inference\Evaluation());
    $this->registerInference(new \phlint\inference\HasExecutionBarrier());
    $this->registerInference(new \phlint\inference\Include_());
    $this->registerInference(new \phlint\inference\IsAssignee());
    $this->registerInference(new \phlint\inference\Isolation());
    $this->registerInference(new \phlint\inference\IsReachable());
    $this->registerInference(new \phlint\inference\NodeRelation());
    $this->registerInference(new \phlint\inference\Purity());
    $this->registerInference(new \phlint\inference\Return_());
    $this->registerInference(new \phlint\inference\Simulation());
    $this->registerInference(new \phlint\inference\Symbol());
    $this->registerInference(new \phlint\inference\SymbolDeclaration());
    $this->registerInference(new \phlint\inference\SymbolLink());
    $this->registerInference(new \phlint\inference\TemplateSpecialization());
    $this->registerInference(new \phlint\inference\Trait_());
    $this->registerInference(new \phlint\inference\Trusted());
    $this->registerInference(new \phlint\inference\Value());

    $this->registerRule(new \phlint\rule\ArgumentCompatibility());
    $this->registerRule(new \phlint\rule\AssertConstruct());
    $this->registerRule(new \phlint\rule\CaseSensitiveNaming());
    $this->registerRule(new \phlint\rule\ConstraintAttribute());
    $this->registerRule(new \phlint\rule\DeclarationType());
    $this->registerRule(new \phlint\rule\DuplicateArrayDeclarationKey());
    $this->registerRule(new \phlint\rule\ExitConstruct());
    $this->registerRule(new \phlint\rule\ImportUsage());
    $this->registerRule(new \phlint\rule\IsolatedAttribute());
    $this->registerRule(new \phlint\rule\Name());
    $this->registerRule(new \phlint\rule\OperandCompatibility());
    $this->registerRule(new \phlint\rule\PHPDoc());
    $this->registerRule(new \phlint\rule\PureAttribute());
    $this->registerRule(new \phlint\rule\Redeclaring());
    $this->registerRule(new \phlint\rule\ShortOpenTag());
    $this->registerRule(new \phlint\rule\VariableAppendInitialization());
    $this->registerRule(new \phlint\rule\VariableInitialization());
    $this->registerRule(new \phlint\rule\VariableVariable());

    $this->enableRule('default');

  }

  static function autodetectRootPath () {
    $rootPath = getcwd();
    while ($rootPath && $rootPath != dirname($rootPath)) {
      if (is_file($rootPath . '/phlint.configuration.distributed.php'))
        return $rootPath;
      if (is_file($rootPath . '/phlint.configuration.php'))
        return $rootPath;
      if (is_file($rootPath . '/composer.json'))
        return $rootPath;
      $rootPath = dirname($rootPath);
    }
    return '';
  }

  function doRun (InputInterface $input = null, OutputInterface $output = null) {

    $extensionInterfaceMetaContext = MetaContext::enterDestructible(ExtensionInterface::class, $this->extensionInterface);
    $applicationMetaContext = MetaContext::enterDestructible(Application::class, $this);

    $this->addOutput(fopen('php://stdout', 'w'));

    $configurationPath = '';

    if ($this->getParameter('rootPath')) {

      if (is_file($this->getParameter('rootPath') . '/phlint.configuration.distributed.php'))
        $configurationPath = $this->getParameter('rootPath') . '/phlint.configuration.distributed.php';

      if (is_file($this->getParameter('rootPath') . '/phlint.configuration.php'))
        $configurationPath = $this->getParameter('rootPath') . '/phlint.configuration.php';

    }

    $configurationPathArgument = $input->getParameterOption('-c')
      ? $input->getParameterOption('-c')
      : $input->getParameterOption('--configuration');
    if ($configurationPathArgument) {
      if (!is_file($configurationPathArgument))
        throw new Exception('Configuration file *' . $configurationPathArgument . '* not found.');
      $configurationPath = $configurationPathArgument;
    }

    if ($configurationPath) {
      $configurator = require($configurationPath);
      $configurator($this);
    }

    if ($this->getParameter('rootPath') && !$configurationPath) {

      if (is_file($this->getParameter('rootPath') . '/composer.json'))
        $this[] = new Composer($this->getParameter('rootPath') . '/composer.json');

    }

    return parent::doRun($input, $output);

  }

  function createParameter ($name, $value) {
    if (isset($this->parameters[$name]))
      throw new Exception('Parameter *' . $name . '* already created.');
    $this->parameters[$name] = $value;
  }

  function setParameter ($name, $value) {
    if (!isset($this->parameters[$name]))
      throw new Exception('Parameter *' . $name . '* does not exist.');
    $this->parameters[$name] = $value;
  }

  function getParameter ($name) {
    return $this->parameters[$name];
  }

  /**
   * @param $path Path to a file or folder with files to analyze.
   */
  function addPath ($path, $isLibrary = false) {

    $this->code[] = [
      'path' => $path,
      'source' => '',
      #'ast' => null,
      'isLibrary' => $isLibrary,
    ];

    return $this;

  }

  /**
   * @param $source PHP source code to analyze.
   */
  function addSource ($source, $isLibrary = false) {

    $this->code[] = [
      'path' => '',
      'source' => $source,
      #'ast' => null,
      'isLibrary' => $isLibrary,
    ];

    return $this;

  }

  /** @internal */
  public $output = null;

  /** @internal */
  function addOutput ($output) {
    $this->output = new Output($output);
    return $this;
  }

  /**
   * @param $path Path to a file or folder with files to analyze.
   */
  function analyzePath ($path = '') {

    if ($path) {
      $this->addPath($path);
    }

    $result = $this->_analyze();

    if ($path)
      array_pop($this->code);

    return $result;
  }

  /**
   * @param $source PHP source code to analyze.
   */
  function analyze ($source = '') {

    if ($source) {
      $this->addSource($source);
    }

    $result = $this->_analyze();

    if ($source)
      array_pop($this->code);

    return $result;
  }

  protected function _analyze () {

    $applicationMetaContext = MetaContext::enterDestructible(Application::class, $this);

    $analyzer = new \phlint\Analyzer();

    $analyzer->inferences = $this->inferences;
    $analyzer->rules = $this->rules;
    $analyzer->enabledRules = $this->enabledRules;
    $analyzer->extensionInterface = $this->extensionInterface;
    $analyzer->code = $this->code;
    $analyzer->output = $this->output;
    $analyzer->importStandardLibrary = $this->importStandardLibrary;

    return $analyzer->analyze();

  }

  public $maximumMemoryUsage = 0;

  protected function _recordMemoryUsage () {
    $this->maximumMemoryUsage = max($this->maximumMemoryUsage, memory_get_usage());
  }

  function registerExtension ($extension) {
    $this->extensionInterface[] = $extension;
  }

  /** @internal */
  function offsetExists ($offset) {
    assert(false);
  }

  /** @internal */
  function offsetGet ($offset) {
    assert(false);
  }

  /** @internal */
  function offsetSet ($offset, $value) {
    assert($offset === null);
    $this->registerExtension($value);
  }

  /** @internal */
  function offsetUnset ($offset) {
    assert(false);
  }

  function registerInference ($inference) {
    $this->inferences[] = $inference;
  }

  function registerRule ($rule) {
    $this->rules[] = $rule;
  }

  function enableRule ($rule) {
    $class = '\\phlint\\rule\\' . ucfirst($rule);
    if (class_exists($class))
      $this->registerRule(new $class());
    foreach ($this->rules as $specificRule)
      if (self::doesRuleMatch($specificRule, $rule))
        $this->enabledRules[] = $specificRule->getIdentifier();
  }

  function disableRule ($rule) {
    foreach ($this->rules as $specificRule)
      if (self::doesRuleMatch($specificRule, $rule))
        $this->enabledRules = array_filter($this->enabledRules, function ($enabledRule) use ($specificRule) {
          return !($enabledRule == $specificRule->getIdentifier());
        });
  }

  static function doesRuleMatch ($specificRule, $rule) {
    return
      $specificRule->getIdentifier() == $rule ||
      (method_exists($specificRule, 'getCategories') && in_array($rule, $specificRule->getCategories())) ||
      $rule == 'all' ||
      false
    ;
  }

}
