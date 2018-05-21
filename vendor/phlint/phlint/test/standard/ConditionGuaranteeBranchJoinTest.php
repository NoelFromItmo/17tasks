<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeBranchJoinTest {

  /**
   * Test that that `isset` and `empty` combined condition has no side effects.
   *
   * @test @internal
   */
  static function unittest_issetAndEmptyNoSideEffects () {
    PhlintTest::assertNoIssues('
      function foo (int $bar) {
        if (isset($bar) && !empty($bar)) {}
        $fun = $bar;
      }
    ');
  }

}
