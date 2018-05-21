<?php

use \phlint\Test as PhlintTest;

class ConstructMethodCallOverloadingTest {

  /**
   * Test default overloading call method behavior.
   *
   * @test @internal
   */
  static function defaultOverloadingCallMethodBehavior () {
    PhlintTest::assertNoIssues('
      class A {
        function __call ($name, $arguments) {}
      }
      $a = new A();
      $a->foo();
    ');
  }

}
