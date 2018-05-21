<?php

use \phlint\Test as PhlintTest;

class DynamicMethodInvocationTest {

  /**
   * @test @internal
   */
  static function unittest_dynamicCall () {
    PhlintTest::assertIssues('

      class A {
        function foo () { return 1; }
      }

      class B {
        function bar () { return 2; }
      }

      class C {
        function foo () { return 3; }
      }

      class D {
        function foo () { return 4; }
        function bar () { return 5; }
      }

      class E {
        function baz () { return 6; }
      }

      function getObject () {
        if (rand(0, 1))
          $o = new A();
        else if (rand(0, 1))
          $o = new B();
        else
          $o = new C();
        return $o;
      }

      function doInvocation ($method) {

        if (rand(0, 1))
          $o = getObject();
        else if (rand(0, 1))
          $o = new D();
        else
          $o = new E();

        $o->$method();

      }

      if (rand(0, 1))
        $method = "foo";
      else
        $method = "bar";

      doInvocation($method);


    ', [
      '
        Name: $o->{$method}() on line 42
        Expression `$o->{$method}()` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o->{$method}() on line 42
        Expression `$o->{$method}()` calls function `B::foo`.
        Function `B::foo` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o->{$method}() on line 42
        Expression `$o->{$method}()` calls function `E::foo`.
        Function `E::foo` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o->{$method}() on line 42
        Expression `$o->{$method}()` calls function `E::bar`.
        Function `E::bar` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o->{$method}() on line 42
        Expression `$o->{$method}()` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',

    ]);
  }

  /**
   * @test @internal
   */
  static function unittest_staticCall () {
    PhlintTest::assertIssues('

      class A {
        static function foo () { return 1; }
      }

      class B {
        static function bar () { return 2; }
      }

      class C {
        static function foo () { return 3; }
      }

      class D {
        static function foo () { return 4; }
        static function bar () { return 5; }
      }

      class E {
        static function baz () { return 6; }
      }

      function getClass () {
        if (rand(0, 1))
          $o = "A";
        else if (rand(0, 1))
          $o = "B";
        else
          $o = "C";
        return $o;
      }

      function doInvocation ($method) {

        if (rand(0, 1))
          $o = getClass();
        else if (rand(0, 1))
          $o = "D";
        else
          $o = "E";

        $o::$method();

      }

      if (rand(0, 1))
        $method = "foo";
      else
        $method = "bar";

      doInvocation($method);


    ', [
      '
        Name: $o::$method() on line 42
        Expression `$o::$method()` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o::$method() on line 42
        Expression `$o::$method()` calls function `B::foo`.
        Function `B::foo` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o::$method() on line 42
        Expression `$o::$method()` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o::$method() on line 42
        Expression `$o::$method()` calls function `E::foo`.
        Function `E::foo` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
      '
        Name: $o::$method() on line 42
        Expression `$o::$method()` calls function `E::bar`.
        Function `E::bar` not found.
          Trace #1:
            #1: Function *function doInvocation ("bar"|"foo" $method)*
              specialized for the expression *doInvocation($method)* on line 51.
      ',
    ]);
  }

  /**
   * Test closure invocation does not raises issues.
   *
   * @test @internal
   */
  static function unittest_closure () {
    PhlintTest::assertNoIssues('
      function foo (Closure $bar) {
        $bar();
      }
    ');
  }

  /**
   * Test `new` with variable.
   *
   * Regression test for the issues:
   *   Unable to invoke undefined *string::bar* for the expression *$f->bar()* on line 9.
   *   Unable to invoke undefined *foo\$c::bar* for the expression *$f->bar()* on line 9.
   *   Unable to invoke undefined *string::baz* for the expression *$f->baz()* on line 10.
   *   Unable to invoke undefined *foo\$c::baz* for the expression *$f->baz()* on line 10.
   *
   * @test @internal
   */
  static function unittest_newVariable () {
    PhlintTest::assertIssues('
      class A {
        function bar () {}
      }
      function foo () {
        $c = "A";
        return new $c();
      }
      $f = foo();
      $f->bar();
      $f->baz();
    ', [
      '
        Name: $f->baz() on line 10
        Expression `$f->baz()` calls function `A::baz`.
        Function `A::baz` not found.
      ',
    ]);
  }

}
