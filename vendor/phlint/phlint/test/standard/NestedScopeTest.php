<?php

use \phlint\Test as PhlintTest;

class NestedScopeTest {

  /**
   * Test variable types in nested scopes.
   *
   * @test @internal
   */
  static function unittest_variableTypes () {
    PhlintTest::assertIssues('

      class A {
        function foo () {}
      }

      class B {
        function bar () {}
      }

      class C {
        function baz () {}
      }

      function test ($o) {
        $o->foo();
        $o->bar();
        $o->baz();
      }

      function foo () {
        $a = new A();
        if ($a instanceof B)
          test($a);
        elseif ($a instanceof C)
          test($a);
        elseif ($a instanceof B)
          if (isset($undefinedVariable))
            if ($a instanceof A)
              if ($a instanceof C)
                test($a);
              else
                test($a);
            else
              test($a);
          else
            test($a);
        elseif (isset($undefinedVariable))
          test($a);
        else
          if ($a instanceof B)
            test($a);
          else
            test($a);
      }

    ', [
      '
        Name: $o->bar() on line 16
        Expression `$o->bar()` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function test (A $o)* specialized for the expression *test($a)* on line 38.
          Trace #2:
            #1: Function *function test (A $o)* specialized for the expression *test($a)* on line 43.
      ',
      '
        Name: $o->baz() on line 17
        Expression `$o->baz()` calls function `A::baz`.
        Function `A::baz` not found.
          Trace #1:
            #1: Function *function test (A $o)* specialized for the expression *test($a)* on line 38.
          Trace #2:
            #1: Function *function test (A $o)* specialized for the expression *test($a)* on line 43.
      ',
    ]);
  }

  /**
   * Test combined variable types in nested scopes.
   *
   * @test @internal
   */
  static function unittest_combinedVariableTypes () {
    PhlintTest::assertIssues('

      class A {
        function foo () {}
      }

      class B {
        function bar () {}
      }

      class C {
        function baz () {}
      }

      function test ($o) {
        $o->foo();
        $o->bar();
        $o->baz();
      }

      function foo ($a) {
        $a = ZEND_DEBUG_BUILD ? (ZEND_DEBUG_BUILD ? new A() : new B()) : new C();
        if ($a instanceof B)
          test($a);
        elseif ($a instanceof C)
          test($a);
        elseif ($a instanceof B)
          if (!isset($undefinedVariable))
            if ($a instanceof A)
              if ($a instanceof C)
                test($a);
              else
                test($a);
            else
              test($a);
          else
            test($a);
        elseif (!isset($undefinedVariable))
          test($a);
        else
          if ($a instanceof B)
            test($a);
          else
            test($a);
      }

    ', [
      '
        Name: $o->foo() on line 15
        Expression `$o->foo()` calls function `B::foo`.
        Function `B::foo` not found.
          Trace #1:
            #1: Function *function test (B $o)* specialized for the expression *test($a)* on line 23.
          Trace #2:
            #1: Function *function test (B $o)* specialized for the expression *test($a)* on line 34.
          Trace #3:
            #1: Function *function test (B $o)* specialized for the expression *test($a)* on line 36.
      ',
      '
        Name: $o->baz() on line 17
        Expression `$o->baz()` calls function `B::baz`.
        Function `B::baz` not found.
          Trace #1:
            #1: Function *function test (B $o)* specialized for the expression *test($a)* on line 23.
          Trace #2:
            #1: Function *function test (B $o)* specialized for the expression *test($a)* on line 34.
          Trace #3:
            #1: Function *function test (B $o)* specialized for the expression *test($a)* on line 36.
      ',
      '
        Name: $o->foo() on line 15
        Expression `$o->foo()` calls function `C::foo`.
        Function `C::foo` not found.
          Trace #1:
            #1: Function *function test (C $o)* specialized for the expression *test($a)* on line 25.
      ',
      '
        Name: $o->bar() on line 16
        Expression `$o->bar()` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function test (C $o)* specialized for the expression *test($a)* on line 25.
      ',
      '
        Name: $o->bar() on line 16
        Expression `$o->bar()` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function test (A|B|C $o)* specialized for the expression *test($a)* on line 38.
      ',
      '
        Name: $o->baz() on line 17
        Expression `$o->baz()` calls function `A::baz`.
        Function `A::baz` not found.
          Trace #1:
            #1: Function *function test (A|B|C $o)* specialized for the expression *test($a)* on line 38.
      ',
      '
        Name: $o->foo() on line 15
        Expression `$o->foo()` calls function `B::foo`.
        Function `B::foo` not found.
          Trace #1:
            #1: Function *function test (A|B|C $o)* specialized for the expression *test($a)* on line 38.
      ',
      '
        Name: $o->baz() on line 17
        Expression `$o->baz()` calls function `B::baz`.
        Function `B::baz` not found.
          Trace #1:
            #1: Function *function test (A|B|C $o)* specialized for the expression *test($a)* on line 38.
      ',
      '
        Name: $o->foo() on line 15
        Expression `$o->foo()` calls function `C::foo`.
        Function `C::foo` not found.
          Trace #1:
            #1: Function *function test (A|B|C $o)* specialized for the expression *test($a)* on line 38.
      ',
      '
        Name: $o->bar() on line 16
        Expression `$o->bar()` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function test (A|B|C $o)* specialized for the expression *test($a)* on line 38.
      ',
      '
        Name: $o->bar() on line 16
        Expression `$o->bar()` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function test (A|C $o)* specialized for the expression *test($a)* on line 43.
      ',
      '
        Name: $o->baz() on line 17
        Expression `$o->baz()` calls function `A::baz`.
        Function `A::baz` not found.
          Trace #1:
            #1: Function *function test (A|C $o)* specialized for the expression *test($a)* on line 43.
      ',
      '
        Name: $o->foo() on line 15
        Expression `$o->foo()` calls function `C::foo`.
        Function `C::foo` not found.
          Trace #1:
            #1: Function *function test (A|C $o)* specialized for the expression *test($a)* on line 43.
      ',
      '
        Name: $o->bar() on line 16
        Expression `$o->bar()` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function test (A|C $o)* specialized for the expression *test($a)* on line 43.
      ',
    ]);
  }

}
