<?php

use \phlint\Test as PhlintTest;

class ConstructFunctionTraceTest {

  /**
   * Test trace printing.
   *
   * @test @internal
   */
  static function tracePrint () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          bar("fun");
        }
      }
      function bar ($baz) : string {
        return $$baz;
      }
    ', [
      '
        Variable Variable: ${$baz} on line 7
        Using variable variable is not allowed.
      ',
      '
        Variable Initialization: $fun on line 7
        Variable `$fun` is used but it is not always initialized.
          Trace #1:
            #1: Function *function bar ("fun" $baz) : string*
              specialized for the expression *bar("fun")* on line 3.
      ',
    ]);
  }

}
