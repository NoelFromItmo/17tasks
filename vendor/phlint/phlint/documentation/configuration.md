Configuration
=============

To configure Phlint create a `phlint.configuration.php` file in the root of a project,
the same way there is one in this repository.

Example configuration file:

```php
<?php

return function ($phlint) {

  // Find code through Composer autoloader.
  $phlint[] = new \phlint\autoload\Composer(__dir__ . '/composer.json');

  // Where to look for code to analyze.
  $phlint->addPath(__dir__ . '/code/');

  // Not all rules are enabled by default.
  #$phlint->enableRule('all');

};
```