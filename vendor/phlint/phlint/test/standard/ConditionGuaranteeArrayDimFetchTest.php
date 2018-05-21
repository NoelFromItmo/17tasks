<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeArrayDimFetchTest {

  /**
   * Sanity test for a negative isset condition guarantee.
   *
   * Regression test for the issue:
   *   Variable *$foo* used before initialized on line 3.
   *
   * @test @internal
   */
  static function unittest_functionCall () {
    PhlintTest::assertNoIssues('
      $foo = [];
      if (!isset($foo["bar"]))
        $foo["bar"] = true;
    ');
  }

}
