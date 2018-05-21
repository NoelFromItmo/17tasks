<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeStandardSymbolIsStringTest {

  /**
   * Test `is_string` value through condition propagation.
   *
   * @test @internal
   */
  static function unittest_valuePropagation () {
    PhlintTest::assertIssues('
      function foo ($bar) {
        return $bar + 1;
      }
      $baz = "fun";
      if (is_string($baz))
        foo($baz);
    ', [
      '
        Operand Compatibility: $bar on line 2
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("fun"|string $bar)* specialized for the expression *foo($baz)* on line 6.
      ',
    ]);
  }

}
