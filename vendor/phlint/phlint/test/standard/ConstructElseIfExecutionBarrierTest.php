<?php

use \phlint\Test as PhlintTest;

class ConstructElseIfExecutionBarrierTest {

  /**
   * Test a case where a variable is initialized initialized inside of `if`
   * and `else` and it is guaranteed to be initialized after the `if` because
   * `elseif` contains an execution barrier.
   *
   * @test @internal
   */
  static function unittest_ifAndElseInitializationWithReturnBarrier () {
    PhlintTest::assertNoIssues('
      if (rand(0, 1))
        $foo = 1;
      else if (rand(0, 1))
        return;
      else
        $foo = 1;
      $bar = $foo;
    ');
  }

  /**
   * Test a case where a variable is initialized initialized inside of `if`
   * and `else` and it is not guaranteed to be initialized after the `if` because
   * `elseif` does not contain an execution barrier.
   *
   * @test @internal
   */
  static function unittest_ifAndElseInitializationWithNoBarrier () {
    PhlintTest::assertIssues('
      if (rand(0, 1))
        $foo = 1;
      else if (rand(0, 1))
        {}
      else
        $foo = 1;
      $bar = $foo;
    ', [
      '
        Variable Initialization: $foo on line 7
        Variable `$foo` is used but it is not always initialized.
      ',
    ]);
  }

}
