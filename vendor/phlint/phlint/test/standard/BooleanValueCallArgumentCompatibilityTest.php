<?php

use \phlint\Test as PhlintTest;

class ValueCallArgumentCompatibilityTest {

  /**
   * Test true to false compatibility.
   *
   * @test @internal
   */
  static function unittest_trueToFalse () {
    PhlintTest::assertIssues('
      /**
       * @param false $bar
       */
      function foo ($bar) {}
      foo(true);
    ', [
      '
        Argument Compatibility: true on line 5
        Argument #1 passed in the expression `foo(true)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `false`.
      ',
    ]);
  }

  /**
   * Test false to true compatibility.
   *
   * @test @internal
   */
  static function unittest_falseToTrue () {
    PhlintTest::assertIssues('
      /**
       * @param true $bar
       */
      function foo ($bar) {}
      foo(false);
    ', [
      '
        Argument Compatibility: false on line 5
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `true`.
      ',
    ]);
  }

  /**
   * Test bool to false compatibility.
   *
   * @test @internal
   */
  static function unittest_boolToFalse () {
    PhlintTest::assertIssues('
      /**
       * @param false $bar
       */
      function foo ($bar) {}
      function bar (bool $baz) {
        foo($baz);
      }
    ', [
      '
        Argument Compatibility: $baz on line 6
        Argument #1 passed in the expression `foo($baz)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `false`.
      ',
    ]);
  }

  /**
   * Test bool to true compatibility.
   *
   * @test @internal
   */
  static function unittest_boolToTrue () {
    PhlintTest::assertIssues('
      /**
       * @param true $bar
       */
      function foo ($bar) {}
      function bar (bool $baz) {
        foo($baz);
      }
    ', [
      '
        Argument Compatibility: $baz on line 6
        Argument #1 passed in the expression `foo($baz)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `true`.
      ',
    ]);
  }

}
