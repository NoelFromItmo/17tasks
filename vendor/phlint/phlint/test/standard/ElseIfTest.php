<?php

use \phlint\Test as PhlintTest;

class ElseIfTest {

  /**
   * Test that else if assignment in condition is propagated after
   * the whole if.
   *
   * @test @internal
   */
  static function unittest_assignmentInCondition () {
    PhlintTest::assertIssues('
      function foo ($bar) {
        return $bar + 1;
      }
      if (ZEND_DEBUG_BUILD) {
        $baz = "a";
      } elseif ($baz = "b") {
      }
      foo($baz);
    ', [
      '
        Operand Compatibility: $bar on line 2
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("a"|"b" $bar)* specialized for the expression *foo($baz)* on line 8.
      ',
    ]);
  }

  /**
   * Sanity test for a function call in condition.
   *
   * @test @internal
   */
  static function unittest_functionCallInConditionSanity () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        if (false) {} elseif (baz($bar)) {}
      }
      function baz ($fun) {}
    ');
  }

}
