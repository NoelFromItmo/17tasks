<?php

use \phlint\Test as PhlintTest;

class ReturnTypeTest {

  /**
   * Test multiple return type branches.
   *
   * @test @internal
   */
  static function unittest_multipleReturnBrances () {
    PhlintTest::assertIssues('

      class A {}
      class B {}
      class C {}

      function foo () {
        if (rand(0, 1))
          return new A();
        else if (rand(0, 1))
          return new B();
        return new C();
      }

      function bar ($baz) {
        $baz->fun();
      }

      bar(foo());

    ', [
      '
        Name: $baz->fun() on line 15
        Expression `$baz->fun()` calls function `A::fun`.
        Function `A::fun` not found.
          Trace #1:
            #1: Function *function bar (A|B|C $baz)* specialized for the expression *bar(foo())* on line 18.
      ',
      '
        Name: $baz->fun() on line 15
        Expression `$baz->fun()` calls function `B::fun`.
        Function `B::fun` not found.
          Trace #1:
            #1: Function *function bar (A|B|C $baz)* specialized for the expression *bar(foo())* on line 18.
      ',
      '
        Name: $baz->fun() on line 15
        Expression `$baz->fun()` calls function `C::fun`.
        Function `C::fun` not found.
          Trace #1:
            #1: Function *function bar (A|B|C $baz)* specialized for the expression *bar(foo())* on line 18.
      ',
    ]);
  }

  /**
   * Test that only reachable return types are considered.
   *
   * @test @internal
   */
  static function unittest_onlyReachable () {
    PhlintTest::assertIssues('

      class A {}
      class B {}
      class C {}

      function foo () {
        return new A();
        if (rand(0, 1))
          return new B();
        return new C();
      }

      function bar ($baz) {
        $baz->fun();
      }

      bar(foo());

    ', [
      '
        Name: $baz->fun() on line 14
        Expression `$baz->fun()` calls function `A::fun`.
        Function `A::fun` not found.
          Trace #1:
            #1: Function *function bar (A $baz)* specialized for the expression *bar(foo())* on line 17.
      ',
    ]);
  }

  /**
   * Test chaining on the $this return.
   *
   * @test @internal
   */
  static function unittest_thisReturnChaining () {
    PhlintTest::assertIssues('
      class A {
        function foo () {
          return $this;
        }
        function bar () {
          return $this;
        }
      }
      $a = new A();
      $a->foo()->bar()->baz();
    ', [
      '
        Name: $a->foo()->bar()->baz() on line 10
        Expression `$a->foo()->bar()->baz()` calls function `A::baz`.
        Function `A::baz` not found.
      ',
    ]);
  }

  /**
   * Test returning of undefined variable.
   *
   * @test @internal
   */
  static function unittest_returningUndefinedVariable () {
    PhlintTest::assertIssues('
      function foo (A $a, $function = "bar", $method = "baz") {
        $function();
        A::$method();
        $a->{"fun"}();
      }
      function bar () {
        return $ret;
      }
      class A {
        static function baz () {
          return $ret;
        }
        function fun () {
          return $ret;
        }
      }
    ', [
      '
        Variable Initialization: $ret on line 7
        Variable `$ret` is used but it is not always initialized.
      ',
      '
        Variable Initialization: $ret on line 11
        Variable `$ret` is used but it is not always initialized.
      ',
      '
        Variable Initialization: $ret on line 14
        Variable `$ret` is used but it is not always initialized.
      ',
    ]);
  }

}
