<?php

use \phlint\Test as PhlintTest;

class SymbolLinkMethodTest {

  /**
   * Test linking to an interface-defined abstract method.
   *
   * @test @internal
   */
  static function unittest_interfaceDefinedAbstractMethod () {
    PhlintTest::assertNoIssues('
      interface I {
        function foo ();
      }
      abstract class A implements I {
        function bar () {
          $this->foo();
        }
      }
    ');
  }

}
