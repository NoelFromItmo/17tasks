<?php

use \phlint\Test as PhlintTest;

class ProhibitedConstructsTest {

  /** @test @internal */
  static function unittest_exitTest () {
    PhlintTest::assertIssues('
      exit;
    ', [
      '
        Exit Construct: exit on line 1
        Using `exit` is not allowed.
      ',
    ]);
  }

  /** @test @internal */
  static function unittest_variableVariableTest () {
    PhlintTest::assertIssues('
      $x = "a";
      $$x = "b";
    ', [
      '
        Variable Variable: ${$x} on line 2
        Using variable variable is not allowed.
      ',
    ]);
  }

}
