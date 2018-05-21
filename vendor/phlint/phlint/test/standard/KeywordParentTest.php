<?php

use \phlint\Test as PhlintTest;

class KeywordParentTest {

  /**
   * Test static method call by parent keyword.
   *
   * @test @internal
   */
  static function unittest_staticCall () {
    PhlintTest::assertIssues('
      class A {}
      class B extends A {
        function foo () {
          parent::foo();
        }
      }
    ', [
      '
        Name: parent::foo() on line 4
        Expression `parent::foo()` calls function `A::foo`.
        Function `A::foo` not found.
      ',
    ]);
  }

}
