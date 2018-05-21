<?php

return function ($phlint) {

  // Find code through Composer autoloader.
  $phlint[] = new \phlint\autoload\Composer(__dir__ . '/composer.json');

  // Where to look for code to analyze.
  $phlint->addPath(__dir__ . '/');

  // Not all rules are enabled by default.
  #$phlint->enableRule('all');

};

