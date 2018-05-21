<?php

use \phlint\Test as PhlintTest;

class ConstructClassMethodTraceTest {

  /**
   * Test trace printing.
   *
   * @test @internal
   */
  static function tracePrint () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          $this->bar("fun");
        }
        function bar ($baz) : string {
          return $$baz;
        }
      }
    ', [
      '
        Variable Variable: ${$baz} on line 6
        Using variable variable is not allowed.
      ',
      '
        Variable Initialization: $fun on line 6
        Variable `$fun` is used but it is not always initialized.
          Trace #1:
            #1: Method *function bar("fun" $baz) : string*
              specialized for the expression *$this->bar("fun")* on line 3.
      ',
    ]);
  }

  /**
   * Test trace printing.
   *
   * @test @internal
   */
  static function staticCallTracePrint () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          self::bar("fun");
        }
        static function bar ($baz) : string {
          return $$baz;
        }
      }
    ', [
      '
        Variable Variable: ${$baz} on line 6
        Using variable variable is not allowed.
      ',
      '
        Variable Initialization: $fun on line 6
        Variable `$fun` is used but it is not always initialized.
          Trace #1:
            #1: Method *static function bar("fun" $baz) : string*
              specialized for the expression *self::bar("fun")* on line 3.
      ',
    ]);
  }

}
