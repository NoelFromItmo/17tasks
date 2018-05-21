<?php

use \phlint\Test as PhlintTest;

class VariableInitializationInsideAConditionTest {

  /**
   * Assign a variable inside an if condition.
   *
   * Regression test for the issue:
   *   Variable *$bar* used before initialized on line 3.
   *
   * @test @internal
   */
  static function unittest_assignInsideAnIfCondition () {
    PhlintTest::assertNoIssues('
      if ($bar = 1)
        $baz = $bar;
      return $bar;
    ');
  }

  /**
   * Assign a variable inside an if condition within a context.
   *
   * Regression test for the issue:
   *   Variable *$bar* used before initialized on line 4.
   *
   * @test @internal
   */
  static function unittest_assignInsideAnIfConditionWithinAContext () {
    PhlintTest::assertNoIssues('
      function foo () {
        if ($bar = 1)
          $baz = $bar;
        return $bar;
      }
    ');
  }

  /**
   * Conditionally assign a variable inside an if condition.
   *
   * @test @internal
   */
  static function unittest_conditionallyAssignInsideAnIfCondition () {
    PhlintTest::assertIssues('
      if (ZEND_DEBUG_BUILD && ($bar = 1)) {}
      $foo = $bar;
    ', [
      '
        Variable Initialization: $bar on line 2
        Variable `$bar` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Conditionally assign a variable inside an if condition with negative condition.
   *
   * @test @internal
   */
  static function unittest_conditionallyAssignInsideAnIfConditionWithNegativeCondition () {
    PhlintTest::assertIssues('
      if (ZEND_DEBUG_BUILD && !($bar = 1)) {}
      $foo = $bar;
    ', [
      '
        Variable Initialization: $bar on line 2
        Variable `$bar` is used but it is not always initialized.
      ',
    ]);
  }

}
