<?php

use \phlint\Test as PhlintTest;

class ConstructIfSimulateTest {

  /**
   * Test a case where the simulation of negative condition guarantee
   * caused an unexpected result due to internal memory management
   * issues.
   *
   * @test @internal
   */
  static function unittest_negativeIfConditionMemory () {
    PhlintTest::assertNoIssues('
      class A {
        function __construct ($val) {}
        /**
         * @param mixed $default
         *
         * @return mixed
         */
        function get ($default = null) {
          return $default;
        }
      }
      class B {
        function __construct ($val) {}
        function foo (A $a) {
          $baz = $a->get(null);
        }
      }
      class C {
        function bar (A $a) {
          if (!ZEND_DEBUG_BUILD)
            return new A("");
          $baz = $a->get(null);
          if (!$baz)
            return new B("");
          $bar = $baz . "!";
        }
      }
    ');
  }

}
