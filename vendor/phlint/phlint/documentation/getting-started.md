1. Getting Started
==================

Basic usage
-----------

Phlint can be downloaded from [the download section](https://gitlab.com/phlint/phlint-compiled/tree/master) and used
as a command line utility:

    # To download run:
    wget https://gitlab.com/phlint/phlint-compiled/raw/master/phlint-0.3.3.phar -O phlint.phar

    # To invoke run:
    php phlint.phar /path/to/project

Alternatively it can be included in a project through composer:

    # To install run:
    composer require phlint/phlint

    # To invoke run:
    ./vendor/bin/phlint


Basic Configuration
-------------------

Phlint can be configured by placing a `phlint.configuration.php` in the root path of the project.

Example `phlint.configuration.php`:

    <?php

    return function ($phlint) {

      // Autoload composer dependencies.
      $phlint[] = new \phlint\autoload\Composer(__dir__ . '/composer.json');

      // Remove a certain (undesired) rule.
      $phlint->removeRule('shortOpenTag');

      // Include a path to be analyzed.
      $phlint->addPath(__dir__ . '/src');

    };
