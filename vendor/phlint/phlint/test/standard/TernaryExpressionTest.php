<?php

use \phlint\Test as PhlintTest;

class TernaryExpressionTest {

  /**
   * Test short variation.
   *
   * @test @internal
   */
  static function unittest_shortVariationTest () {
    PhlintTest::assertIssues('
      function foo (int $bar) {}
      foo(1.1 ?: "a");
    ', [
      '
        Argument Compatibility: 1.1 ?: "a" on line 2
        Argument #1 passed in the expression `foo(1.1 ?: "a")` is of type `float`.
        A value of type `float` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: 1.1 ?: "a" on line 2
        Argument #1 passed in the expression `foo(1.1 ?: "a")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
    ]);
  }

}
