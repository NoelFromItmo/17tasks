<?php

use \phlint\Test as PhlintTest;

/**
 * @see http://www.php.net/manual/en/function.substr.php
 */
class EvaluateSubstrTest {

  /**
   * Test substr with no arguments.
   *
   * @test @internal
   */
  static function unittest_noArguments () {
    PhlintTest::assertNoIssues('
      substr();
    ');
  }

  /**
   * Test substr with two arguments.
   *
   * @test @internal
   */
  static function unittest_twoArguments () {
    PhlintTest::assertNoIssues('
      substr("Hello World", 6);
    ');
  }

  /**
   * Test substr first argument compatibility.
   *
   * @test @internal
   */
  static function unittest_firstArgumentCompatibility () {
    PhlintTest::assertIssues('
      substr("Hello World", 6);
      substr(11, 1);
      substr(11.1, 1);
      substr(new stdClass(), 1);
      substr([], 1);
      substr(null, 1);
      substr(true, 1);
      substr(false, 1);
    ', [
      '
        Argument Compatibility: new stdClass() on line 4
        Argument #1 passed in the expression `substr(new stdClass(), 1)` is of type `stdClass`.
        A value of type `stdClass` is not implicitly convertible to type `string`.
      ',
      '
        Argument Compatibility: [] on line 5
        Argument #1 passed in the expression `substr([], 1)` is of type `array`.
        A value of type `array` is not implicitly convertible to type `string`.
      ',
      '
        Argument Compatibility: null on line 6
        Argument #1 passed in the expression `substr(null, 1)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `string`.
      ',
      '
        Argument Compatibility: true on line 7
        Argument #1 passed in the expression `substr(true, 1)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string`.
      ',
      '
        Argument Compatibility: false on line 8
        Argument #1 passed in the expression `substr(false, 1)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string`.
      ',
    ]);
  }

}
