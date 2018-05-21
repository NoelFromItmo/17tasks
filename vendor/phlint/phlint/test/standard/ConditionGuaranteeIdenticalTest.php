<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeIdenticalTest {

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
      if (isset($bar) && $bar === foo()) {}
    ');
  }

}
