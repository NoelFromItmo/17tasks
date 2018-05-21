<?php

use \phlint\Test as PhlintTest;

class ConstructIfSimulateConditionGuaranteeTest {

  /**
   * Test that one guarantee simulated after a certain scope does not
   * propagate past another conflicting guarantee.
   *
   * @test @internal
   */
  static function overwriteConflictingGuarantee () {
    PhlintTest::assertIssues('
      function foo ($bar) {
        if (!is_int($bar))
          return;
        if (!isset($bar))
          $bar->baz();
        return $bar;
      }
    ', [
      '
        Name: $bar->baz() on line 5
        Expression `$bar->baz()` calls function `null::baz`.
        Function `null::baz` not found.
      ',
    ]);
  }

  /**
   * Test that one empty guarantee simulated after a certain scope does not
   * propagate past another conflicting guarantee.
   *
   * @test @internal
   */
  static function overwriteConflictingGuaranteeEmpty () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        if (!empty($bar) && !is_numeric($bar))
          return $bar . "!";
        if (!empty($bar) && $bar < 0)
          return $bar . "!";
        return $bar;
      }
    ');
  }

}
