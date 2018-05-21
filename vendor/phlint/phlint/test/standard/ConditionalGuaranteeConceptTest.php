<?php

use \phlint\Test as PhlintTest;

class ConditionalGuaranteeConceptTest {

  /**
   * Test deterministic array concept.
   *
   * Regression test for the issue:
   *   Provided symbol *$foo* of type *string* is not compatible
   *     in the expression *foreach ($foo as $bar)* on line 3.
   *
   * @test @internal
   */
  static function unittest_deterministicArrayConcept () {
    PhlintTest::assertNoIssues('
      $foo = "";
      $foo = !is_array($foo) ? explode(",", $foo) : $foo;
      foreach ($foo as $bar) {}
    ');
  }

}
