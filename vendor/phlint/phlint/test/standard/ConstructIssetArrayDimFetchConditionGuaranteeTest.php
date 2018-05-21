<?php

use \phlint\Test as PhlintTest;

class ConstructIssetArrayDimFetchConditionGuaranteeTest {

  /**
   * Test that a negative `isset` on array dim fetch for a variable with
   * unknown type doesn't cause unexpected consequences on the variable itself.
   *
   * @test @internal
   */
  static function negativePassIntoAssignment () {
    PhlintTest::assertIssues('
      function foo ($bar) {
        $baz = isset($bar["fun"]) ? false : $bar;
        return $baz + 1;
      }
    ', [
      '
        Operand Compatibility: $baz on line 3
        Variable `$baz` is always or sometimes of type `bool`.
        Expression `$baz + 1` may cause undesired or unexpected behavior with `bool` operands.
      ',
    ]);
  }

  /**
   * Test that a negative `isset` on array dim fetch for a variable with
   * unknown type doesn't cause unexpected consequences on the variable itself.
   *
   * @test @internal
   */
  static function negativePassIntoArray () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        if (!isset($bar["baz"])) {}
        return array_values($bar);
      }
    ');
  }

  /**
   * Test that a negative `isset` on array dim fetch for a variable with
   * unknown type doesn't cause unexpected consequences on the variable itself.
   *
   * @test @internal
   */
  static function negativePassIntoArrayAccess () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        if (!isset($bar["baz"])) {}
        return bar($bar);
      }
      function bar (ArrayAccess $a) {}
    ');
  }

}
