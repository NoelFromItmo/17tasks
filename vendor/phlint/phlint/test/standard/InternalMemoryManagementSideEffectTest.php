<?php

use \phlint\Test as PhlintTest;

class InternalMemoryManagementSideEffectTest {

  /**
   * Test a case where memory management problems cause
   * unexpected issues.
   *
   * @test @internal
   */
  static function unittest_unexpectedIssues1 () {
    PhlintTest::assertNoIssues('

      class A {}
      class B {}

      class C {

        function root1 (B $par1) {
          $ret1 = $this->spec1();
        }

        function root2 (B $par2) {
          $ret2 = $this->spec1(1);
        }

        /**
         * @param B $baz
         */
        function foo ($baz) {
          $this->bar($baz);
        }

        function bar (B $obj2) {}

        /**
         * @return A
         */
        function spec1 ($obj3) {
          return $this->spec2($obj3);
        }

        /**
         * @return A
         */
        function spec2 ($obj4) {
          return new A();
        }

      }

    ');
  }

}
