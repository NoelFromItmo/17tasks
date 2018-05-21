<?php

use \phlint\Test as PhlintTest;

class VariableAppendInitializationTest {

  /**
   * Test existing variable.
   *
   * @test @internal
   */
  static function unittest_existing () {
    PhlintTest::assertNoIssues('
      function f () {
        $a = [];
        $a[] = 2;
      }
    ');
  }

  /**
   * Test append to parameter.
   *
   * @test @internal
   */
  static function unittest_appendToParameter () {
    PhlintTest::assertNoIssues('
      function f ($a) {
        $a[] = 2;
      }
    ');
  }

  /**
   * Test variable initialization.
   *
   * @test @internal
   */
  static function unittest_initialization () {
    PhlintTest::assertIssues('
      function f () {
        $a[] = 2;
        $a = [];
      }
    ', [
      '
        Variable Append Initialization: $a on line 2
        Variable `$a` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);
  }

  /**
   * Test conditional variable initialization.
   *
   * @test @internal
   */
  static function unittest_conditionalInitialization () {
    PhlintTest::assertIssues('
      function f () {
        if (rand(0, 1))
          $a[] = 2;
        $a = [];
      }
    ', [
      '
        Variable Append Initialization: $a on line 3
        Variable `$a` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);
  }

}
