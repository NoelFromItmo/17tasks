<?php

use \phlint\Test as PhlintTest;

class ConstructParameterNullableTypeTest {

  /**
   * Test passing a value into a nullable parameter.
   *
   * @test @internal
   */
  static function nullableParameterDefault () {
    PhlintTest::assertIssues('
      function foo (?array $bar) {}
      foo(1);
    ', [
      '
        Argument Compatibility: 1 on line 2
        Argument #1 passed in the expression `foo(1)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `null|array`.
      ',
    ]);
  }

}
