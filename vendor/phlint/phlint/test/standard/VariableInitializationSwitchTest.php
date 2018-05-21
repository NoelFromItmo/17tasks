<?php

use \phlint\Test as PhlintTest;

class VariableInitializationSwitchTest {

  /**
   * Test variable initialization in a switch.
   *
   * @test @internal
   */
  static function unittest_default () {
    PhlintTest::assertIssues('
      switch (rand(0, 5)) {
        case 1:
          $foo = 1;
          break;
        case 2:
        case 3:
          $foo = 2;
          $bar = 2;
          break;
        default:
          $foo = 3;
          break;
      }
      $baz = $foo;
      $fun = $bar;
    ', [
      '
        Variable Initialization: $bar on line 15
        Variable `$bar` is used but it is not always initialized.
      ',
    ]);
  }

}
