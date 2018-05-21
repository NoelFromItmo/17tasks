<?php

use \phlint\Test as PhlintTest;

class ConstructNullCoalesceSimulateTest {

  /**
   * Test null coalesce variable initialization.
   *
   * @test @internal
   */
  static function unittest_variableInitialization () {
    PhlintTest::assertNoIssues('
      $foo = $bar ?? 1;
    ');
  }

}
