<?php

use \phlint\Test as PhlintTest;

class ConstructClosureTraceTest {

  /**
   * Test trace printing.
   *
   * @test @internal
   */
  static function tracePrint () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          $bar = function ($baz) : string {
            return $$baz;
          };
          $bar("fun");
        }
      }
    ', [
      '
        Variable Variable: ${$baz} on line 4
        Using variable variable is not allowed.
      ',
      '
        Variable Initialization: $fun on line 4
        Variable `$fun` is used but it is not always initialized.
          Trace #1:
            #1: Function *function ("fun" $baz) : string*
              specialized for the expression *$bar("fun")* on line 6.
      ',
    ]);
  }

}
