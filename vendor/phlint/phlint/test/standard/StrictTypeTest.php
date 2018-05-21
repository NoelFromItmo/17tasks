<?php

use \phlint\Test as PhlintTest;

class StrictTypeTest {

  /**
   * Test implicit conversion to bool with argument declaration.
   *
   * @test @internal
   */
  static function unittest_strictTypeImplicitConversionToBoolWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      declare(strict_types=1);
      function foo (bool $bar) {}
      foo(1.1);
      foo("1.1");
      foo("0.0");
      foo("1.0");
      foo(1);
      foo(2);
      foo("1");
      foo("2");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: 1.1 on line 3
        Argument #1 passed in the expression `foo(1.1)` is of type `float`.
        A value of type `float` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "1.1" on line 4
        Argument #1 passed in the expression `foo("1.1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "0.0" on line 5
        Argument #1 passed in the expression `foo("0.0")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "1.0" on line 6
        Argument #1 passed in the expression `foo("1.0")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: 1 on line 7
        Argument #1 passed in the expression `foo(1)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: 2 on line 8
        Argument #1 passed in the expression `foo(2)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "1" on line 9
        Argument #1 passed in the expression `foo("1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "2" on line 10
        Argument #1 passed in the expression `foo("2")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "bar" on line 11
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to string with argument declaration.
   *
   * @test @internal
   */
  static function unittest_strictTypeImplicitConversionToStringWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      declare(strict_types=1);
      function foo (string $bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: 1.1 on line 3
        Argument #1 passed in the expression `foo(1.1)` is of type `float`.
        A value of type `float` is not implicitly convertible to type `string`.
      ',
      '
        Argument Compatibility: 1 on line 5
        Argument #1 passed in the expression `foo(1)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `string`.
      ',
      '
        Argument Compatibility: false on line 8
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to integer with argument declaration.
   *
   * @test @internal
   */
  static function unittest_strictTypeImplicitConversionToIntegerWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      declare(strict_types=1);
      function foo (int $bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: 1.1 on line 3
        Argument #1 passed in the expression `foo(1.1)` is of type `float`.
        A value of type `float` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: "1.1" on line 4
        Argument #1 passed in the expression `foo("1.1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: "1" on line 6
        Argument #1 passed in the expression `foo("1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: "bar" on line 7
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: false on line 8
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to float with argument declaration.
   *
   * @test @internal
   */
  static function unittest_strictTypeImplicitConversionToFloatWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      declare(strict_types=1);
      function foo (float $bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: "1.1" on line 4
        Argument #1 passed in the expression `foo("1.1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `float`.
      ',
      '
        Argument Compatibility: "1" on line 6
        Argument #1 passed in the expression `foo("1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `float`.
      ',
      '
        Argument Compatibility: "bar" on line 7
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `float`.
      ',
      '
        Argument Compatibility: false on line 8
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `float`.
      ',
    ]);
  }

}
