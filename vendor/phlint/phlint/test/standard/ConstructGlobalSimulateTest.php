<?php

use \phlint\Test as PhlintTest;

class ConstructGlobalSimulateTest {

  /**
   * `global` variables are default initialized to `null`.
   *
   * @test @internal
   */
  static function variableInitialization () {
    PhlintTest::assertNoIssues('
      global $foo;
      $bar = $foo;
    ');
  }

  /**
   * `global` variables are default initialized to `null`.
   *
   * @test @internal
   */
  static function variableVariableInitialization () {
    PhlintTest::assertIssues('
      $baz = "foo";
      global $$baz;
      $bar = $foo;
    ', [
      '
        Variable Variable: ${$baz} on line 2
        Using variable variable is not allowed.
      ',
    ]);
  }

}
