<?php

return function ($phlint) {

  $phlint[] = new \phlint\autoload\Composer(__dir__ . '/composer.json');

  $phlint->addPath(__dir__ . '/code/');

  $phlint->enableRule('all');

};
