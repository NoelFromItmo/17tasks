<?php

use \phlint\Test as PhlintTest;

class VariadicParameterTest {

  /**
   * Test variadic arguments against an array constraint.
   *
   * @test @internal
   */
  static function unittest_arrayConstraintTest () {
    PhlintTest::assertIssues('
      function foo(array ...$bar) {}
      foo([]);
      foo([""], [0]);
      foo(0);
    ', [
      '
        Argument Compatibility: 0 on line 4
        Argument #1 passed in the expression `foo(0)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `array`.
      ',
    ]);
  }

}
