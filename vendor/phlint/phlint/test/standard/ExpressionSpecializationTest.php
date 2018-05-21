<?php

use \phlint\Test as PhlintTest;

class ExpressionSpecializationTest {

  /**
   * Test a case where expression specialization cases a linking
   * to an already existing symbol.
   *
   * @test @internal
   */
  static function unittest_relinkToExistingSymbol () {
    PhlintTest::assertIssues('
      class A {
        static function foo ($method = "bar") {
          A::$method("fun");
        }
        static function bar ($method) {
          self::$method();
        }
      }
      A::foo("bar");
    ', [
      '
        Name: self::$method() on line 6
        Expression `self::$method()` calls function `A::fun`.
        Function `A::fun` not found.
          Trace #1:
            #1: Method *static function bar("fun" $method)*
              specialized for the expression *A::$method("fun")* on line 3.
          Trace #2:
            #1: Method *static function bar("fun" $method)*
              specialized for the expression *A::$method("fun")* on line 3.
            #2: Method *static function foo("bar" $method)*
              specialized for the expression *A::foo("bar")* on line 9.
      ',
    ]);
  }

  /**
   * Test a case where expression specialization cases a linking
   * to an already existing symbol with method call.
   *
   * @test @internal
   */
  static function unittest_relinkToExistingSymbolWithMethodCall () {
    PhlintTest::assertIssues('
      class A {
        function baz ($obj) {
          $obj->fun();
        }
        function bar ($obj) {
          $this->baz(new B());
        }
        function foo () {
          $this->bar(new B());
        }
      }
      class B {}
    ', [
      '
        Name: $obj->fun() on line 3
        Expression `$obj->fun()` calls function `B::fun`.
        Function `B::fun` not found.
          Trace #1:
            #1: Method *function baz(B $obj)*
              specialized for the expression *$this->baz(new B())* on line 6.
          Trace #2:
            #1: Method *function baz(B $obj)*
              specialized for the expression *$this->baz(new B())* on line 6.
            #2: Method *function bar(B $obj)*
              specialized for the expression *$this->bar(new B())* on line 9.
      ',
    ]);
  }

  /**
   * Test that expression specialization does not breaks linking.
   *
   * @test @internal
   */
  static function unittest_specializedLinkingTest () {
    PhlintTest::assertIssues('
      function foo (A $a, $function = "bar", $method = "baz") {
        $function();
        A::$method();
        $a->{"fun"}();
      }
      class A {}
    ', [
      '
        Name: $function() on line 2
        Expression `$function()` calls function `bar`.
        Function `bar` not found.
      ',
      '
        Name: A::$method() on line 3
        Expression `A::$method()` calls function `A::baz`.
        Function `A::baz` not found.
      ',
      '
        Name: $a->{"fun"}() on line 4
        Expression `$a->{"fun"}()` calls function `A::fun`.
        Function `A::fun` not found.
      ',
    ]);
  }

}
