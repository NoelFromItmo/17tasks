<?php

use \phlint\Test as PhlintTest;

class FeatureLateStaticBindingsTest {

  /**
   * Test retuning by static.
   *
   * @test @internal
   */
  static function returnStatic () {
    PhlintTest::assertIssues('
      class A {
        static function foo () {
          return new static();
        }
      }
      class B extends A {}
      B::foo()->bar();
    ', [
      '
        Name: B::foo()->bar() on line 7
        Expression `B::foo()->bar()` calls function `B::bar`.
        Function `B::bar` not found.
      ',
    ]);
  }

  /**
   * Test retuning `$this`.
   *
   * @test @internal
   */
  static function returnThis () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          return $this;
        }
      }
      class B extends A {
        function bar () {
          return $this;
        }
      }
      (new B())->foo()->bar()->baz();
    ', [
      '
        Name: (new B())->foo()->bar()->baz() on line 11
        Expression `(new B())->foo()->bar()->baz()` calls function `B::baz`.
        Function `B::baz` not found.
      ',
    ]);
  }

  /**
   * Test retuning `$this` through specialization.
   *
   * @test @internal
   */
  static function returnThisThroughSpecialization () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          return baz($this);
        }
      }
      class B extends A {
        function bar () {
          return baz($this);
        }
      }
      function baz ($fun) {
        return $fun;
      }
      (new B())->foo()->bar()->baz();
    ', [
      '
        Name: (new B())->foo()->bar()->baz() on line 14
        Expression `(new B())->foo()->bar()->baz()` calls function `B::baz`.
        Function `B::baz` not found.
      ',
    ]);
  }

}
