<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeNotIdenticalTest {

  /**
   * Test not identical to null.
   *
   * @test @internal
   */
  static function unittest_notIdenticalToNull () {
    PhlintTest::assertIssues('
      $foo = null;
      if ($foo !== null)
        foreach ($foo as $bar) {}
      if (null !== $foo)
        foreach ($foo as $bar) {}
      foreach ($foo as $bar) {}
    ', [
      '
        Operand Compatibility: $foo on line 6
        Variable `$foo` is always or sometimes of type `null`.
        Loop `foreach ($foo as $bar)` may cause undesired or unexpected behavior with `null` operands.
      ',
    ]);
  }

  /**
   * Test function call comparison.
   *
   * @test @internal
   */
  static function unittest_functionCallComparison () {
    PhlintTest::assertNoIssues('
      function foo () {
        return ZEND_DEBUG_BUILD;
      }
      if (isset($bar) && $bar !== foo()) {}
    ');
  }

}
