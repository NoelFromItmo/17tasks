<?php

use \phlint\Test as PhlintTest;

class SimulateDoWhileTest {

  /**
   * Test do-while variable initialization.
   *
   * @test @internal
   */
  static function unittest_variableInitialization () {
    PhlintTest::assertNoIssues('
        do {
            $foo = rand(0, 1);
        } while (!$foo);
        $bar = $foo;
    ');
  }

}
