<?php

use \phlint\Test as PhlintTest;

class ArgumentCompatibilityTest {

  /**
   * Test parameter constraint.
   * @test @internal
   */
  static function unittest_parameterConstraint () {
    PhlintTest::assertIssues('
      function foo ($obj) {
        return get_class($obj);
      }
      foo(2);
      foo("Hello world");
      foo(new stdClass());
    ', [
      '
        Argument Compatibility: $obj on line 2
        Argument #1 passed in the expression `get_class($obj)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `object|null`.
          Trace #1:
            #1: Function *function foo (2 $obj)*
              specialized for the expression *foo(2)* on line 4.
      ',
      '
        Argument Compatibility: $obj on line 2
        Argument #1 passed in the expression `get_class($obj)` is of type `string`.
        A value of type `string` is not implicitly convertible to type `object|null`.
          Trace #1:
            #1: Function *function foo ("Hello world" $obj)*
              specialized for the expression *foo("Hello world")* on line 5.
      ',
    ]);
  }

  /**
   * Test that a default null value implies a nullable.
   *
   * @test @internal
   */
  static function implicitlyNullableByDefaultValue () {
    PhlintTest::assertIssues('
      function foo (int $bar = null) {}
      foo(1);
      foo(null);
      foo("a");
    ', [
      '
        Argument Compatibility: "a" on line 4
        Argument #1 passed in the expression `foo("a")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int|null`.
      ',
    ]);
  }

}
