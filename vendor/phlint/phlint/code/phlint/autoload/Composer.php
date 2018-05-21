<?php

namespace phlint\autoload;

use \luka8088\ExtensionCall;
use \luka8088\phops\MetaContext;
use \phlint\Code;
use \phlint\Internal;

class Composer {

  protected $path = '';
  protected $loadedFileMap = [];

  function __construct ($path) {
    $this->path = $path;
  }

  protected $initialized = false;

  protected $map = [
    'classMap' => [],
    'namespaceMap' => [],
    'psr4Map' => [],
  ];

  /** @ExtensionCall("phlint.phpAutoloadInitialize") */
  function initialize () {

    if ($this->initialized)
      return;
    $this->initialized = true;

    if (is_file(dirname($this->path) . '/composer.lock')) {
      $composerLock = json_decode(file_get_contents(dirname($this->path) . '/composer.lock'), true);

      foreach ($composerLock['platform'] as $extensionSignature => $extensionVersion) {

        $id = '';

        if ($extensionSignature == 'php')
          $id = 'standard';
        else if (strpos($extensionSignature, 'ext-') === 0)
          $id = 'extension-' . substr($extensionSignature, 4);

        if ($id == 'standard')
          continue;

        MetaContext::get(Code::class)->addAst(Internal::importDefinitions($id));

      }

    }

    if (is_file(dirname($this->path) . '/vendor/composer/autoload_classmap.php'))
      $this->map['classMap'] = require(dirname($this->path) . '/vendor/composer/autoload_classmap.php');

    if (is_file(dirname($this->path) . '/vendor/composer/autoload_namespaces.php'))
      $this->map['namespaceMap'] = require(dirname($this->path) . '/vendor/composer/autoload_namespaces.php');

    if (is_file(dirname($this->path) . '/vendor/composer/autoload_psr4.php'))
      $this->map['psr4Map'] = require(dirname($this->path) . '/vendor/composer/autoload_psr4.php');

    if (is_file(dirname($this->path) . '/vendor/composer/autoload_files.php'))
      foreach (require(dirname($this->path) . '/vendor/composer/autoload_files.php') as $path)
        $this->autoloadFile($path);

  }

  /** @ExtensionCall("phlint.phpAutoloadClass") */
  function __invoke ($symbol) {

    $this->initialize();

    foreach ($this->map['classMap'] as $className => $path)
      if ($symbol == $className)
        $this->autoloadFile($path);

    foreach ($this->map['namespaceMap'] as $namespace => $paths)
      if (self::inNamespace($symbol, $namespace))
        foreach ($paths as $path) {
          $this->autoloadFile($path . '/' . str_replace('_', '/', ltrim($symbol, '_')) . '.php');
          $this->autoloadFile($path . '/' . str_replace('\\', '/', ltrim($symbol, '\\')) . '.php');
        }

    foreach ($this->map['psr4Map'] as $namespace => $paths)
      if (self::inNamespace($symbol, $namespace))
        foreach ($paths as $path)
          $this->autoloadFile(
            $path . '/' .
            str_replace('\\', '/', substr(ltrim($symbol, '\\'), strlen(ltrim($namespace, '\\')))) . '.php'
          );

  }

  static function inNamespace ($symbol, $namespace) {
    if (trim($namespace, '_') == '' || strpos(ltrim($symbol, '_') . '_', trim($namespace, '_') . '_') === 0)
      return true;
    if (trim($namespace, '\\') == '' || strpos(ltrim($symbol, '\\') . '\\', trim($namespace, '\\') . '\\') === 0)
      return true;
    return false;
  }

  function autoloadFile ($path) {

    if (!is_file($path))
      return;

    $isLibrary = true;

    foreach (MetaContext::get(Code::class)->acode as $acode) {
      if (strpos(str_replace('\\', '/', $path . '/'), str_replace('\\', '/', $acode['path'] . '/')) === 0)
        $isLibrary = false;
      if (strpos(str_replace('\\', '/', realpath($path) . '/'), str_replace('\\', '/', realpath($acode['path']) . '/')) === 0)
        $isLibrary = false;
    }

    MetaContext::get(Code::class)->load([[
      'path' => $path,
      'source' => '',
      'isLibrary' => $isLibrary,
    ]]);

  }

}
