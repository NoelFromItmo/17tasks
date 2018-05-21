<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeStandardSymbolIsArrayTest {

  /**
   * Test `is_array` condition barrier.
   *
   * @test @internal
   */
  static function unittest_conditionBarrier () {
    PhlintTest::assertNoIssues('
      $foo = [];
      if (is_array($foo))
        return;
      $bar = $foo . "!";
    ');
  }

  /**
   * Test `is_array` against a phpDoc declared type.
   *
   * @test @internal
   */
  static function unittest_phpDocDeclaredType () {
    PhlintTest::assertIssues('
      /**
       * @param array $bar
       */
      function foo ($bar) {
        if (is_array($bar))
          {}
        else
          $baz = $bar . "!";
        $fun = $bar . "?";
      }
    ', [
      '
        Operand Compatibility: $bar on line 9
        Variable `$bar` is always or sometimes of type `array`.
        Expression `$bar . "?"` may cause undesired or unexpected behavior with `array` operands.
      ',
    ]);
  }

}
