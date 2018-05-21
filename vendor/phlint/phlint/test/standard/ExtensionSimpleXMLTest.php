<?php

use \phlint\autoload\Composer;
use \phlint\Test as PhlintTest;

class ExtensionSimpleXMLTest {

  /**
   * Test that `SimpleXML` does not report any potential internal issues
   * such as missing `DOM` extension declarations.
   *
   * @test @internal
   */
  static function smokeTest () {
    PhlintTest::mockFilesystem(sys_get_temp_dir() . '/vtc5cny2j14a0gpz2z5exe6o8lec/', [
      '/composer.lock' => json_encode([
        'platform' => [
          'ext-simplexml' => '*',
        ],
      ]),
    ]);

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/vtc5cny2j14a0gpz2z5exe6o8lec/composer.json');

    $linter->addPath(sys_get_temp_dir() . '/vtc5cny2j14a0gpz2z5exe6o8lec/');

    PhlintTest::assertIssues($linter->analyze('
      simplexml_import_dom(null);
    '), [
      '
        Argument Compatibility: null on line 1
        Argument #1 passed in the expression `simplexml_import_dom(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `DOMNode`.
      ',
    ]);
  }

}
