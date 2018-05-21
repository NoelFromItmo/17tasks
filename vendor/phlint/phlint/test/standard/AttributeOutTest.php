<?php

use \phlint\Test as PhlintTest;

class AttributeOutTest {

  /**
   * Test `@out` in a dynamic method call.
   *
   * @test @internal
   */
  static function unittest_dynamicMethodCall () {
    PhlintTest::assertIssues('
      class A {
        function foo (/** @out */ $bar) {}
      }
      $x = new A();
      $z = "x";
      $r = "foo";
      $$z->$r($undefinedVariable);
    ', [
      '
        Variable Variable: ${$z} on line 7
        Using variable variable is not allowed.
      ',
    ]);
  }

}
