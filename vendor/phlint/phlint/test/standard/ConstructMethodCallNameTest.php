<?php

use \phlint\Test as PhlintTest;

class ConstructMethodCallNameTest {

  /**
   * Test linking with multiple classes.
   *
   * @test @internal
   */
  static function multipleClassesLinking () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          return fun();
        }
      }
      class B {
        function foo () {
          return fun();
        }
      }
      $a = ZEND_DEBUG_BUILD ? new A() : new B();
      $a->foo();
    ', [
      '
        Name: fun() on line 3
        Expression `fun()` calls function `fun`.
        Function `fun` not found.
      ',
      '
        Name: fun() on line 8
        Expression `fun()` calls function `fun`.
        Function `fun` not found.
      ',
    ]);
  }

  /**
   * Test chaining with `null` return.
   *
   * @test @internal
   */
  static function nullReturnChaining () {
    PhlintTest::assertIssues('
      class A {
        function foo ($b) : ?A {
          return $this;
        }
        function bar ($c) : A {
          return $this;
        }
        function baz ($d) : A {
          return $this;
        }
      }
      (new A())->foo(1)->bar(2)->baz(3);
    ', [
      '
        Name: (new A())->foo(1)->bar(2) on line 12
        Expression `(new A())->foo(1)->bar(2)` calls function `null::bar`.
        Function `null::bar` not found.
      ',
    ]);
  }

}
