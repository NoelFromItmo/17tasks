<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

/**
 * These tests deal with how library issues are reported.
 * Some issues occur because of the way library is being used while some issues
 * occur because the library itself has issues. In general we want to report
 * the former but not the latter.
 */
class LibraryReportContextYieldTest {

  /**
   * Test that library issues are not being reported in case a method
   * call is specialized by context.
   *
   * @test @internal
   */
  static function methodContextSpecialization () {

    $phlint = PhlintTest::create();

    $phlint->addSource('
      class A {
        function foo ($bar = null) {
          return $this->baz($bar);
        }
        function baz ($bar) {
          return strpos($bar, "!");
        }
      }
    ', true);

    PhlintTest::assertNoIssues($phlint->analyze('
      (new A())->foo();
    '));

  }

  /**
   * Test that library issues are not being reported in case a method
   * call is specialized by context inside a namespace.
   *
   * @test @internal
   */
  static function namespacedMethodContextSpecialization () {

    $phlint = PhlintTest::create();

    $phlint->addSource('
      namespace A;
      class B {
        function foo ($bar = null) {
          return $this->baz($bar);
        }
        function baz ($bar) {
          return strpos($bar, "!");
        }
      }
    ', true);

    PhlintTest::assertNoIssues($phlint->analyze('
      use \A\B;
      (new B())->foo();
    '));

  }

}
