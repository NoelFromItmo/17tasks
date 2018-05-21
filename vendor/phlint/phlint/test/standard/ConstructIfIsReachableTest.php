<?php

use \phlint\Test as PhlintTest;

class ConstructIfIsReachableTest {

  /**
   * Test that `if` branch is not simulated if it is not reachable.
   *
   * @test @internal
   */
  static function isReachableSimulate () {
    PhlintTest::assertNoIssues('
      $foo = null;
      if ($foo === true)
        {}
      else
        $bar = 1;
      $baz = $bar;
    ');
  }

}
