<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeIssetTest {

  /**
   * Test that assignee is always defined regardless of guarantees.
   *
   * @test @internal
   */
  static function unittest_isAssigneeDefined () {
    PhlintTest::assertIssues('
      if (!isset($foo)) {
        $foo[] = 1;
      }
    ', [
      '
        Variable Append Initialization: $foo on line 2
        Variable `$foo` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);
  }

  /**
   * Test that `isset` on array dim fetch doesn't cause unexpected consequences
   * on the variable itself.
   *
   * @test @internal
   */
  static function unittest_arrayDimFetchVariableConsequence () {
    PhlintTest::assertNoIssues('
      $foo = [];
      if (isset($foo["bar"]) && !isset($foo["baz"]))
        $fun = $foo;
    ');
  }

}
