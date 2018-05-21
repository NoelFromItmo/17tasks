<?php

use \phlint\Test as PhlintTest;

class ListTest {

  /**
   * Test list expansion.
   *
   * @test @internal
   */
  static function unittest_listExpansionFromArrayConcept () {
    PhlintTest::assertIssues('
      function foo (array $bar) {
        list($barItem) = $bar;
        baz($barItem);
      }
      function baz (int $fun) {}
    ', [
    ]);
  }

  /**
   * Test list expansion.
   *
   * @test @internal
   */
  static function unittest_listExpansionFromArrayConceptWithSpecialization () {
    PhlintTest::assertIssues('
      function foo (array $bar) {
        list($barItem) = $bar;
        baz($barItem);
      }
      function baz ($fun) {
        return $fun + 1;
      }
    ', [
    ]);
  }

  /**
   * Test a case when list result is used in a condition.
   *
   * @test @internal
   */
  static function unittest_listToCondition () {
    PhlintTest::assertIssues('
      list($a) = [1];
      if ($a) {}
    ', [
    ]);
  }

}
