<?php

use \phlint\Test as PhlintTest;

class ConstructEmptyConditionGuaranteeTest {

  /**
   * Test that always satisfied empty causes no unexpected side effects.
   *
   * @test @internal
   */
  static function alwaysSatisfiedEmptyNoSideEffects () {
    PhlintTest::assertNoIssues('
      $foo = "a";
      if (!empty($foo))
        $foo = "b";
      $bar = $foo . "!";
    ');
  }

  /**
   * Test that always satisfied empty on arbitrary values causes no unexpected side effects.
   *
   * @test @internal
   */
  static function alwaysSatisfiedEmptyOnArbitraryValuesNoSideEffects () {
    PhlintTest::assertNoIssues('
      function foo (string $bar, string $baz) {
        if (!empty($bar))
          $bar = $baz;
        $fun = $bar . "!";
      }
    ');
  }

  /**
   * Test that always satisfied empty causes no unexpected side effects with integers.
   *
   * @test @internal
   */
  static function alwaysSatisfiedEmptyNoSideEffectsWithIntegers () {
    PhlintTest::assertIssues('
      $foo = 1;
      if (!empty($foo))
        $foo = 2;
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
   * Test that always satisfied empty on arbitrary values causes no unexpected side effects with integers.
   *
   * @test @internal
   */
  static function alwaysSatisfiedEmptyOnArbitraryValuesNoSideEffectsWithIntegers () {
    PhlintTest::assertIssues('
      function fun (int $bar, int $baz) {
        if (!empty($bar))
          $bar = $baz;
        $bar->fun();
      }
    ', [
      '
        Name: $bar->fun() on line 4
        Expression `$bar->fun()` calls function `int::fun`.
        Function `int::fun` not found.
      ',
    ]);
  }

  /**
   * Test that guarantees do no get propagated in case the variable is not overwritten
   * but rather just modified.
   *
   * @test @internal
   */
  static function noGuaranteeProparationOnVariableModification () {
    PhlintTest::assertIssues('
      $foo = [1];
      if (!empty($foo))
        $foo[] = 2;
      foreach ($foo as $bar)
        $bar->baz();
    ', [
      '
        Name: $bar->baz() on line 5
        Expression `$bar->baz()` calls function `int::baz`.
        Function `int::baz` not found.
      ',
    ]);
  }

}
