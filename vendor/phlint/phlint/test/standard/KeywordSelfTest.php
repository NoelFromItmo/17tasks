<?php

use \phlint\Test as PhlintTest;

class KeywordSelfTest {

  /**
   * Test static method call by self keyword.
   *
   * @test @internal
   */
  static function unittest_staticCall () {
    PhlintTest::assertIssues('
      class A {
        static function foo () {
          self::bar();
        }
        static function bar () {
          self::fun();
        }
      }
    ', [
      '
        Name: self::fun() on line 6
        Expression `self::fun()` calls function `A::fun`.
        Function `A::fun` not found.
      ',
    ]);
  }

}
