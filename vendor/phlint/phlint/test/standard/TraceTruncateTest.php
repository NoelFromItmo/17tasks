<?php

use \phlint\Test as PhlintTest;

class TraceTruncateTest {

  /**
   * Test truncation of too many traces.
   *
   * @test @internal
   */
  static function tooManyTracesTruncation () {
    PhlintTest::assertIssues('
      function foo ($bar) {
        return $bar + 1;
      }
      $bar = "";
      foo($bar);
      foo($bar);
      foo($bar);
      foo($bar);
      foo($bar);
    ', [
      '
        Operand Compatibility: $bar on line 2
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("" $bar)* specialized for the expression *foo($bar)* on line 5.
          Trace #2:
            #1: Function *function foo ("" $bar)* specialized for the expression *foo($bar)* on line 6.
          Trace #3:
            #1: Function *function foo ("" $bar)* specialized for the expression *foo($bar)* on line 7.
          (2 more trace(es) truncated)
      ',
    ]);
  }

  /**
   * Test defer trace generation.
   *
   * @test @internal
   */
  static function deferTraceGeneration () {

    $phlint = PhlintTest::create();

    $phlint->addSource('
      function foo ($format) {
        if (substr($format, 0, 1) == "a")
          return foo("bcbcbcbcbc") . foo(substr($format, 1));
        if (substr($format, 0, 1) == "b")
          return foo("cccccccccc") . foo(substr($format, 1));
        if (substr($format, 0, 1) == "c")
          return foo("!!!!!!!!!!") . foo(substr($format, 1));
        return substr($format, 0, 1) . foo(substr($format, 1));
      }
    ', true);

    PhlintTest::assertIssues($phlint->analyze('
      foo("d") + 1;
    '), [
      '
        Operand Compatibility: foo("d") on line 1
        Expression `foo("d")` is always or sometimes of type `string`.
        Expression `foo("d") + 1` may cause undesired or unexpected behavior with `string` operands.
      ',
    ]);

  }

}
