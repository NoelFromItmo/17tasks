<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeBooleanAndTest {

  /**
   * Test same condition merging.
   *
   * @test @internal
   */
  static function unittest_sameConditionMerging () {
    PhlintTest::assertNoIssues('
      if (isset($foo) && isset($foo))
        $bar = $foo;
    ');
  }

  /**
   * Test variable initialization during array access chaining.
   *
   * @test @internal
   */
  static function variableInitializationArrayAccessChain () {
    PhlintTest::assertNoIssues('
      function foo(array $bar) {
        if (!$bar["baz"] && !$bar["fun"])
          $baz = $bar;
        $fun = $bar;
      }
    ');
  }

}
