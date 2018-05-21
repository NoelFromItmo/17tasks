<?php

$cwd = getcwd();

foreach ([__dir__ . '/../../autoload.php', __dir__ . '/vendor/autoload.php'] as $autoloadFile)
  if (is_file($autoloadFile))
    require $autoloadFile;

chdir($cwd);

\luka8088\XdebugHelper::disable();

if (in_array('xdebug', array_map(function ($name) { return strtolower($name); }, get_loaded_extensions(true))))
  echo "\x1b[33m" .
    "Warning: XDebug is currently enabled. Running phlint with XDebug has significant performance implications." .
    "\x1b[0m\n";

/**
 * Due to the way Phlint works and how deep analysis it does
 * a large amount of memory is expected to be used.
 */
ini_set('memory_limit', -1);

/**
 * Disable cyclic garbage collector during analysis as it has
 * huge performance implications on large code bases.
 */
gc_disable();

\luka8088\phops\Strict::initialize();

\phlint\Application::create()->run();
