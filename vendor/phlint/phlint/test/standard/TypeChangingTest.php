<?php

use \phlint\Test as PhlintTest;

class TypeChangingTest {

  /**
   * Test changing variable types.
   *
   * @test @internal
   */
  static function unittest_changingVariableType () {
    PhlintTest::assertIssues('

      $foo = null;

      $foo->bar();

      $foo = 1;
      $foo -= 1;

      $foo->bar();

      $foo = "abc";
      $foo = substr($foo, 1, 1);

      $foo->bar();

      $foo = false;

      $foo->bar();

    ', [
      '
        Name: $foo->bar() on line 4
        Expression `$foo->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
      '
        Name: $foo->bar() on line 9
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
      '
        Name: $foo->bar() on line 14
        Expression `$foo->bar()` calls function `string::bar`.
        Function `string::bar` not found.
      ',
      '
        Name: $foo->bar() on line 18
        Expression `$foo->bar()` calls function `bool::bar`.
        Function `bool::bar` not found.
      ',
    ]);
  }

  /**
   * Test changing variable types based on return types.
   *
   * @test @internal
   */
  static function unittest_changingVariableTypeBasedOnSignature () {
    PhlintTest::assertIssues('

      /** @return null */
      function returnsNull () {}
      function returnsInt () : int {}
      function returnsString () : string {}
      function returnsBool () : bool {}

      $foo = returnsNull();

      $foo->bar();

      $foo = returnsInt();
      $foo -= 1;

      $foo->bar();

      $foo = returnsString();
      $foo = substr($foo, 1, 1);

      $foo->bar();

      $foo = returnsBool();

      $foo->bar();

    ', [
      '
        Name: $foo->bar() on line 10
        Expression `$foo->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
      '
        Name: $foo->bar() on line 15
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
      '
        Name: $foo->bar() on line 20
        Expression `$foo->bar()` calls function `string::bar`.
        Function `string::bar` not found.
      ',
      '
        Name: $foo->bar() on line 24
        Expression `$foo->bar()` calls function `bool::bar`.
        Function `bool::bar` not found.
      ',
    ]);
  }

  /**
   * This is not a valid test but rather just a blueprint.
   *
   * @test @internal
   */
  static function unittest_conditionallyChangingVariableType () {
    PhlintTest::assertIssues('

      $foo = null;

      $foo->bar();

      if (rand(0, 1)) {
        $foo = 1;
        $foo -= 1;
      }

      $foo->bar();

      if (rand(0, 1)) {
        $foo = "abc";
        $foo = substr($foo, 1, 1);
      }

      $foo->bar();

      if (rand(0, 1)) {
        $foo = false;
      }

      $foo->bar();

    ', [
      '
        Name: $foo->bar() on line 4
        Expression `$foo->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
      '
        Name: $foo->bar() on line 11
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
      '
        Name: $foo->bar() on line 11
        Expression `$foo->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
      '
        Name: $foo->bar() on line 18
        Expression `$foo->bar()` calls function `string::bar`.
        Function `string::bar` not found.
      ',
      '
        Name: $foo->bar() on line 18
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
      '
        Name: $foo->bar() on line 18
        Expression `$foo->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
      '
        Name: $foo->bar() on line 24
        Expression `$foo->bar()` calls function `bool::bar`.
        Function `bool::bar` not found.
      ',
      '
        Name: $foo->bar() on line 24
        Expression `$foo->bar()` calls function `string::bar`.
        Function `string::bar` not found.
      ',
      '
        Name: $foo->bar() on line 24
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
      '
        Name: $foo->bar() on line 24
        Expression `$foo->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
    ]);
  }

  /**
   * Test changing to mixed array.
   *
   * @test @internal
   */
  static function unittest_toMixedArray () {
    PhlintTest::assertNoIssues('
      $foo = "";
      $foo = [];
      $foo += [];
    ');
  }

  /**
   * Value and type mixing test.
   *
   * @test @internal
   */
  static function unittest_valueAndTypeMixing () {
    PhlintTest::assertIssues('

      class A {
        function bar () {}
      }

      $foo = null;

      if (rand(0, 1))
        $foo = new A();

      if (!empty($foo))
        if (!empty($anotherFoo)) {
          $foo->bar();
          $foo->baz();
        }

    ', [
      '
        Name: $foo->baz() on line 14
        Expression `$foo->baz()` calls function `A::baz`.
        Function `A::baz` not found.
      ',
    ]);
  }

}
