<?php

use \phlint\Test as PhlintTest;

class CallTypeTest {

  /**
   * Test calling methods on primitive types.
   *
   * @test @internal
   */
  static function unittest_primitiveTypesMethods () {
    PhlintTest::assertIssues('
      (null)->foo();
      (false)->foo();
      (true)->foo();
      (0)->foo();
      (1)->foo();
      (0.0)->foo();
      (1.1)->foo();
      ""->foo();
      "A"->foo();
    ', [
      '
        Name: null->foo() on line 1
        Expression `null->foo()` calls function `null::foo`.
        Function `null::foo` not found.
      ',
      '
        Name: false->foo() on line 2
        Expression `false->foo()` calls function `bool::foo`.
        Function `bool::foo` not found.
      ',
      '
        Name: true->foo() on line 3
        Expression `true->foo()` calls function `bool::foo`.
        Function `bool::foo` not found.
      ',
      '
        Name: (0)->foo() on line 4
        Expression `(0)->foo()` calls function `int::foo`.
        Function `int::foo` not found.
      ',
      '
        Name: (1)->foo() on line 5
        Expression `(1)->foo()` calls function `int::foo`.
        Function `int::foo` not found.
      ',
      '
        Name: (0.0)->foo() on line 6
        Expression `(0.0)->foo()` calls function `float::foo`.
        Function `float::foo` not found.
      ',
      '
        Name: (1.1)->foo() on line 7
        Expression `(1.1)->foo()` calls function `float::foo`.
        Function `float::foo` not found.
      ',
      '
        Name: ""->foo() on line 8
        Expression `""->foo()` calls function `string::foo`.
        Function `string::foo` not found.
      ',
      '
        Name: "A"->foo() on line 9
        Expression `"A"->foo()` calls function `string::foo`.
        Function `string::foo` not found.
      ',
    ]);
  }

  /**
   * Test calling on scalars.
   *
   * @test @internal
   */
  static function unittest_invokeScalar () {
    PhlintTest::assertIssues('
      if (rand(0, 1))
        $foo = null;
      else if (rand(0, 1))
        $foo = true;
      else if (rand(0, 1))
        $foo = false;
      else if (rand(0, 1))
        $foo = "bar";
      else
        $foo = 1;
      $foo();
    ', [
      '
        Name: $foo() on line 11
        Expression `$foo()` calls function `bool`.
        Function `bool` not found.
      ',
      '
        Name: $foo() on line 11
        Expression `$foo()` makes a function call to a value of type `null`.
        A function name cannot be of type `null`.
      ',
      '
        Name: $foo() on line 11
        Expression `$foo()` makes a function call to a value of type `bool`.
        A function name cannot be of type `bool`.
      ',
      '
        Name: $foo() on line 11
        Expression `$foo()` calls function `bar`.
        Function `bar` not found.
      ',
      '
        Name: $foo() on line 11
        Expression `$foo()` makes a function call to a value of type `int`.
        A function name cannot be of type `int`.
      ',
    ]);
  }

  /**
   * Test empty array call.
   *
   * @test @internal
   */
  static function unittest_emptyArrayCall () {
    PhlintTest::assertIssues('
      $foo = [];
      $foo();
    ', [
      '
        Name: $foo() on line 2
        Expression `$foo()` makes a function call to a value of type `array`.
        A function name cannot be of type `array`.
      ',
    ]);
  }

}
