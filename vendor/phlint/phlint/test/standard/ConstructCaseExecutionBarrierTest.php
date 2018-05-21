<?php

use \phlint\Test as PhlintTest;

class ConstructCaseExecutionBarrierTest {

  /**
   * Test a case where a variable is initialized initialized inside of `case`
   * and it is guaranteed to be initialized after the `switch` because
   * `default` contains an execution barrier.
   *
   * @test @internal
   */
  static function unittest_caseInitializationWithReturnBarrier () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        switch ($bar) {
          case 1: $baz = 1; break;
          case 2: $baz = 2; break;
          default: return 3;
        }
        return $baz;
      }
    ');
  }

}
