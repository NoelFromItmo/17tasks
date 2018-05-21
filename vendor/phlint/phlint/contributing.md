1. Contributing
===============

Since this project is still in an unstable phase there is not much of a process for contributing - opening
a merge request is sufficient.

Example contribution workflow:

- Clone the repository
- Do a `composer install`
- Run tests to make sure everything is ok by running `php test.php`
- Make changes
- Run tests again to make sure everything is ok
- Commit and open a merge request

When making changes one might want to create a, for example, `test-manual.php` which can be used for testing purposes.
Making it analyzer a small arbitrary piece of code makes it much easier to understand the underlying behavior.
It might look like the following:

    <?php

    require __dir__ . '/vendor/autoload.php';

    use \phlint\autoload\Mock as MockAutoload;
    use \phlint\Test as PhlintTest;

    /**
     * Uncomment this line to prevent loading of standard definition.
     * If standard definitions are not loaded the standard functions, for example,
     * will not be available but it will, however, reduce the debugging noise.
     */
    #PhlintTest::$importStandardLibrary = false;

    PhlintTest::assertIssues('
      $foo = $bar;
    ', [
      'Variable *$bar* used before initialized on line 1.',
    ]);

    echo "OK\n";
