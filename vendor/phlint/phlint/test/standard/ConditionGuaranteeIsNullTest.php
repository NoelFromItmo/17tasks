<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeIsNullTest {

  /**
   * Test deterministic type.
   *
   * @test @internal
   */
  static function unittest_deterministicType () {
    PhlintTest::assertIssues('
      $foo = null;
      if (is_null($foo))
        $foo = 1;
      $foo->bar();
    ', [
      '
        Name: $foo->bar() on line 4
        Expression `$foo->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
    ]);
  }

  /**
   * Test condition filter.
   *
   * @test @internal
   */
  static function unittest_conditionFilter () {
    PhlintTest::assertNoIssues('
      $foo = 1;
      if (!is_null($foo))
        return;
      $foo->bar();
    ');
  }

  /**
   * Test condition filter by type.
   *
   * @test @internal
   */
  static function unittest_conditionFilterByType () {
    PhlintTest::assertNoIssues('
      function foo (int $bar) {
        if (!is_null($bar))
          return;
        $bar->bar();
      }
    ');
  }

}
