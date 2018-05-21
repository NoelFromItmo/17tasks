<?php

use \phlint\Test as PhlintTest;

class ConstructElseExecutionBarrierTest {

  /**
   * Test a case where a variable is initialized initialized inside of `if`
   * and it is guaranteed to be initialized after the `if` because `else`
   * contains an execution barrier.
   *
   * @test @internal
   */
  static function unittest_ifInitializationWithReturnBarrier () {
    PhlintTest::assertNoIssues('
      if (rand(0, 1))
        $foo = 1;
      else
        return;
      $bar = $foo;
    ');
  }

  /**
   * Test a case where a variable is initialized initialized inside of `if`
   * and `elseif` and it is guaranteed to be initialized after the `if` because
   * `else` contains an execution barrier.
   *
   * @test @internal
   */
  static function unittest_ifAndElseIfInitializationWithReturnBarrier () {
    PhlintTest::assertNoIssues('
      if (rand(0, 1))
        $foo = 1;
      else if (rand(0, 1))
        $foo = 1;
      else
        return;
      $bar = $foo;
    ');
  }

  /**
   * Test a case where a variable is initialized initialized inside of `if`
   * and `elseif` and it is not guaranteed to be initialized after the `if`
   * because `else` does not contain an execution barrier.
   *
   * @test @internal
   */
  static function unittest_ifAndElseIfInitializationWithNoBarrier () {
    PhlintTest::assertIssues('
      if (rand(0, 1))
        $foo = 1;
      else if (rand(0, 1))
        $foo = 1;
      else
        {}
      $bar = $foo;
    ', [
      '
        Variable Initialization: $foo on line 7
        Variable `$foo` is used but it is not always initialized.
      ',
    ]);
  }

}
