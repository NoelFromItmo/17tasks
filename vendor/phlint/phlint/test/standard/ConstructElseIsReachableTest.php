<?php

use \phlint\Test as PhlintTest;

class ConstructElseIsReachableTest {

  /**
   * Test that `else` branch is not simulated if it is not reachable.
   *
   * @test @internal
   */
  static function isReachableSimulate () {
    PhlintTest::assertNoIssues('
      $foo = null;
      if ($foo === null)
        $bar = 1;
      else
        {}
      $baz = $bar;
    ');
  }

}
