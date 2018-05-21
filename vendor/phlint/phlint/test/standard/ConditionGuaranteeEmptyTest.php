<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeEmptyTest {

  /**
   * Test default guarantees.
   *
   * @test @internal
   */
  static function unittest_default () {
    PhlintTest::assertIssues('
      if (empty($foo))
        $foo();
    ', [
      '
        Name: $foo() on line 2
        Expression `$foo()` calls function `bool`.
        Function `bool` not found.
      ',
      '
        Name: $foo() on line 2
        Expression `$foo()` makes a function call to a value of type `array`.
        A function name cannot be of type `array`.
      ',
      '
        Name: $foo() on line 2
        Expression `$foo()` makes a function call to a value of type `bool`.
        A function name cannot be of type `bool`.
      ',
      '
        Name: $foo() on line 2
        Expression `$foo()` makes a function call to a value of type `null`.
        A function name cannot be of type `null`.
      ',
      '
        Name: $foo() on line 2
        Expression `$foo()` makes a function call to a value of type `float`.
        A function name cannot be of type `float`.
      ',
      '
        Name: $foo() on line 2
        Expression `$foo()` makes a function call to a value of type `int`.
        A function name cannot be of type `int`.
      ',
      '
        Variable Initialization: $foo on line 2
        Variable `$foo` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test default guarantees with method call.
   *
   * @test @internal
   */
  static function unittest_defaultWithMethodCall () {
    PhlintTest::assertIssues('
      if (empty($foo))
        $foo->bar();
    ', [
      '
        Name: $foo->bar() on line 2
        Expression `$foo->bar()` calls function `bool::bar`.
        Function `bool::bar` not found.
      ',
      '
        Name: $foo->bar() on line 2
        Expression `$foo->bar()` calls function `float::bar`.
        Function `float::bar` not found.
      ',
      '
        Name: $foo->bar() on line 2
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
      '
        Name: $foo->bar() on line 2
        Expression `$foo->bar()` calls function `mixed[int|string]::bar`.
        Function `mixed[int|string]::bar` not found.
      ',
      '
        Name: $foo->bar() on line 2
        Expression `$foo->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
      '
        Name: $foo->bar() on line 2
        Expression `$foo->bar()` calls function `string::bar`.
        Function `string::bar` not found.
      ',
      '
        Variable Initialization: $foo on line 2
        Variable `$foo` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test that assignee is always defined regardless of guarantees.
   *
   * @test @internal
   */
  static function unittest_isAssigneeDefined () {
    PhlintTest::assertIssues('
      if (empty($foo)) {
        $foo[] = 1;
      }
    ', [
      '
        Variable Append Initialization: $foo on line 2
        Variable `$foo` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);
  }

  /**
   * Test that empty does not guarantee undefined variable when
   * it is always defined.
   *
   * @test @internal
   */
  static function unittest_alwaysDefinedVariables () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        if (empty($bar) && $bar !== "0")
          return;
      }
    ');
  }

  /**
   * Test that `empty` on array dim fetch doesn't cause unexpected consequences
   * on the variable itself.
   *
   * @test @internal
   */
  static function unittest_arrayDimFetchVariableConsequence () {
    PhlintTest::assertNoIssues('
      $foo = [];
      if (!empty($foo["bar"]) && empty($foo["baz"]))
        $fun = $foo;
    ');
  }

  /**
   * Test `empty` filtering by `null`.
   *
   * @test @internal
   */
  static function unittest_nullFilter () {
    PhlintTest::assertIssues('
      /**
       * @param string|null $bar
       * @param string $baz
       */
      function foo ($bar, $baz) {
        if (empty($bar))
          $bar = $baz;
        $fun = $bar + 1;
      }
    ', [
      '
        Operand Compatibility: $bar on line 8
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
      ',
    ]);
  }

  /**
   * Test `empty` filtering by `null` with barrier.
   *
   * @test @internal
   */
  static function unittest_nullFilterWithBarrier () {
    PhlintTest::assertIssues('
      /**
       * @param string|null $bar
       */
      function foo ($bar) {
        if (empty($bar))
          return;
        $fun = $bar + 1;
      }
    ', [
      '
        Operand Compatibility: $bar on line 7
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
      ',
    ]);
  }

  /**
   * Test `empty` filtering of potentially defined variable with barrier.
   *
   * @test @internal
   */
  static function unittest_potentiallyDefinedFilterWithBarrier () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        foreach ($bar as $baz)
          $fun = $baz;
        if (empty($fun["a"]))
          return;
        return $fun["b"];
      }
    ');
  }

  /**
   * Test deterministic type.
   *
   * @test @internal
   */
  static function unittest_deterministicType () {
    PhlintTest::assertIssues('
      $foo = null;
      if (empty($foo))
        $foo = 1;
      $foo->bar();
    ', [
      '
        Name: $foo->bar() on line 4
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
    ]);
  }

  /**
   * Test conditional intersect on non-specific value.
   *
   * @test @internal
   */
  static function unittest_nonSpecificValueIntersact () {
    PhlintTest::assertNoIssues('
      function foo(array $bar) {
        foreach ($bar as $baz)
          if (empty($baz["id"]))
            $fun = $baz;
      }
    ');
  }

}
