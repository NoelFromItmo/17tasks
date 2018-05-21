<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

class TemplateSpecializationTest {

  /**
   * Test that calling a function before its definition causes no issue.
   *
   * @test @internal
   */
  static function unittest_test () {
    PhlintTest::assertNoIssues('
      $x = foo(1);
      function foo ($i) {
        return $i;
      }
    ');
  }

  /**
   * Test that invocations are linked to the correct specializations.
   *
   * @test @internal
   */
  static function unittest_link () {
    PhlintTest::assertNoIssues('

      const X1 = 1;
      const X2 = 2;

      function foo ($x = X1) {
        if ($x === X2)
          $y = $GLOBALS["x"];
      }

      /** @pure */
      function bar () {
        foo();
      }

      bar();

    ');
  }

  /**
   * Test that invocations are linked to the correct specializations.
   *
   * @test @internal
   */
  static function unittest_link2 () {
    PhlintTest::assertNoIssues('

      const X1 = 1;
      const X2 = 2;

      function foo ($x = X1) {
        if ($x === X2)
          $y = $GLOBALS["x"];
      }

      /** @pure */
      function bar () {
        foo();
      }

      /** @pure */
      function baz () {
        foo();
      }

      foo();
      bar();
      baz();

    ');
  }

  /**
   * Test alternative templates.
   *
   * @test @internal
   */
  static function unittest_alternativeTemplates () {
    PhlintTest::assertIssues('
      if (rand(0, 1)) {
        function foo ($bar) {
          $x = 2;
          return $bar + 1;
        }
      } else {
        function foo ($bar) {
          $y = $x;
          return $bar - 1;
        }
      }
      foo(1);
      foo("Hello");
    ', [
      '
        Operand Compatibility: $bar on line 4
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("Hello" $bar)* specialized for the expression *foo("Hello")* on line 13.
      ',
      '
        Variable Initialization: $x on line 8
        Variable `$x` is used but it is not always initialized.
      ',
      '
        Operand Compatibility: $bar on line 9
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar - 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("Hello" $bar)* specialized for the expression *foo("Hello")* on line 13.
      ',
    ]);
  }

  /**
   * Test alternative return types with multiple declarations.
   *
   * @test @internal
   */
  static function unittest_alternativeReturnTypesWithMultipleDeclarations () {
    PhlintTest::assertIssues('
      if (rand(0, 1)) {
        function foo () {
          $bar = 1;
          return $bar;
        }
      } else {
        function foo () {
          $bar = [1];
          return $bar;
        }
      }
      $baz = foo() - 1;
      foreach (foo() as $fun) {}
    ', [
      '
        Operand Compatibility: foo() on line 12
        Expression `foo()` is always or sometimes of type `int[]`.
        Expression `foo() - 1` may cause undesired or unexpected behavior with `int[]` operands.
      ',
      '
        Operand Compatibility: foo() on line 13
        Expression `foo()` is always or sometimes of type `int`.
        Loop `foreach (foo() as $fun)` may cause undesired or unexpected behavior with `int` operands.
      ',
    ]);
  }

  /**
   * Test that no specialization is done for a known signature.
   *
   * @test @internal
   */
  static function unittest_knownSignatureSpecialization () {

    $linter = PhlintTest::create();

    $linter->addSource('
      class A {
        /**
         * @return B
         */
        static function createB () {
          /**
           * The following assert should not be complained about as
           * it is a part of the library code and this function
           * is not being specialized as it has a known signature.
           */
          assert(false);
        }
      }
      class B {
        function foo () {}
      }
    ', true);

    PhlintTest::assertIssues($linter->analyze('
      $b = A::createB();
      $b->foo();
      $b->bar();
    '), [
      '
        Name: $b->bar() on line 3
        Expression `$b->bar()` calls function `B::bar`.
        Function `B::bar` not found.
      ',
    ]);

  }

  /**
   * Test object constraint specialization.
   *
   * @test @internal
   */
  static function unittest_objectConstraintSpecialization () {
    PhlintTest::assertIssues('
      /**
       * @param object $bar
       */
      function foo ($bar) : void {
        $bar->baz();
      }
      class B {};
      foo(new B());
    ', [
      '
        Name: $bar->baz() on line 5
        Expression `$bar->baz()` calls function `B::baz`.
        Function `B::baz` not found.
          Trace #1:
            #1: Function *function foo (B $bar) : void* specialized for the expression *foo(new B())* on line 8.
      ',
    ]);
  }

  /**
   * Test sub-templating.
   *
   * @test @internal
   */
  static function unittest_subTemplating () {
    PhlintTest::assertIssues('
      function foo ($x) {
        return function ($y) use ($x) {
          return $x + $y;
        };
      }
      $intFoo = foo(1);
      $intFoo("world");
      $stringFoo = foo("Hello");
      $stringFoo(2);
    ', [
      '
        Operand Compatibility: $y on line 3
        Variable `$y` is always or sometimes of type `string`.
        Expression `$x + $y` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function ("world" $y) use (1)* specialized for the expression *$intFoo("world")* on line 7.
      ',
      '
        Operand Compatibility: $x on line 3
        Variable `$x` is always or sometimes of type `string`.
        Expression `$x + $y` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("Hello" $x)* specialized for the expression *foo("Hello")* on line 8.
      ',
      '
        Operand Compatibility: $x on line 3
        Variable `$x` is always or sometimes of type `string`.
        Expression `$x + $y` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function (2 $y) use ("Hello")* specialized for the expression *$stringFoo(2)* on line 9.
      ',
    ]);
  }

  /**
   * Test sub-template nesting.
   *
   * @test @internal
   */
  static function unittest_subTemplateNesting () {
    PhlintTest::assertIssues('
      function foo ($a) {
        return function ($b) use ($a) {
          return function ($c) use ($a, $b) {
            return function ($d) use ($a, $b, $c) {
              return function ($e) use ($a, $b, $c, $d) {
                return $a + $b + $c + $d + $e;
              };
            };
          };
        };
      }
      $stringFoo = foo("Hello");
      $intFoo = $stringFoo(1);
      $arrayFoo = $intFoo([]);
      $boolFoo = $arrayFoo(false);
      $boolFoo(null);
    ', [
      '
        Operand Compatibility: $a on line 6
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("Hello" $a)*
              specialized for the expression *foo("Hello")* on line 12.
      ',
      '
        Operand Compatibility: $a on line 6
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function (1 $b) use ("Hello")*
              specialized for the expression *$stringFoo(1)* on line 13.
      ',
      '
        Operand Compatibility: $a on line 6
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function (mixed[int|string] $c) use ("Hello", 1)*
              specialized for the expression *$intFoo([])* on line 14.
      ',
      '
        Operand Compatibility: $a on line 6
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function (false $d) use ("Hello", 1, mixed[int|string] $c)*
              specialized for the expression *$arrayFoo(false)* on line 15.
      ',
      '
        Operand Compatibility: $d on line 6
        Variable `$d` is always or sometimes of type `bool`.
        Expression `$a + $b + $c + $d` may cause undesired or unexpected behavior with `bool` operands.
          Trace #1:
            #1: Function *function (false $d) use ("Hello", 1, mixed[int|string] $c)*
              specialized for the expression *$arrayFoo(false)* on line 15.
      ',
      '
        Operand Compatibility: $a on line 6
            Variable `$a` is always or sometimes of type `string`.
            Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
              Trace #1:
                #1: Function *function (null $e) use ("Hello", 1, mixed[int|string] $c, false)*
                  specialized for the expression *$boolFoo(null)* on line 16.
      ',
      '
        Operand Compatibility: $d on line 6
        Variable `$d` is always or sometimes of type `bool`.
        Expression `$a + $b + $c + $d` may cause undesired or unexpected behavior with `bool` operands.
          Trace #1:
            #1: Function *function (null $e) use ("Hello", 1, mixed[int|string] $c, false)*
              specialized for the expression *$boolFoo(null)* on line 16.
      ',
      '
        Operand Compatibility: $e on line 6
        Variable `$e` is always or sometimes of type `null`.
        Expression `$a + $b + $c + $d + $e` may cause undesired or unexpected behavior with `null` operands.
          Trace #1:
            #1: Function *function (null $e) use ("Hello", 1, mixed[int|string] $c, false)*
              specialized for the expression *$boolFoo(null)* on line 16.
      ',
    ]);
  }

  /**
   * Test that incompatible arguments don't get propagated in the specialization.
   *
   * @test @internal
   */
  static function unittest_incompatibleArgumentPropagation () {
    PhlintTest::assertIssues('
      function foo (int $bar) {
        return $bar + 1;
      }
      foo("abc");
    ', [
      '
        Argument Compatibility: "abc" on line 4
        Argument #1 passed in the expression `foo("abc")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test that indirectly compatible argument's don't effect declaration constraints.
   *
   * @test @internal
   */
  static function unittest_argumentsToConstraints () {
    PhlintTest::assertIssues('
      function foo (string $bar) {
        return $bar . "a";
      }
      foo(ZEND_DEBUG_BUILD ? 1 : true);
    ', [
      '
        Argument Compatibility: ZEND_DEBUG_BUILD ? 1 : true on line 4
        Argument #1 passed in the expression `foo(ZEND_DEBUG_BUILD ? 1 : true)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string`.
      ',
    ]);
  }

  /**
   * Test that incompatible argument's don't effect declaration constraints.
   *
   * @test @internal
   */
  static function unittest_incompatibleArgumentsToConstraints () {
    PhlintTest::assertIssues('
      function foo (string $a, $b) {
        return $a . "!";
      }
      function bar () : string {}
      function baz () : float {}
      function fun () : bool {}
      $var = ZEND_DEBUG_BUILD ? ZEND_DEBUG_BUILD ? bar() : baz() : fun();
      foo($var, null);
    ', [
      '
        Argument Compatibility: $var on line 8
        Argument #1 passed in the expression `foo($var, null)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string`.
      ',
    ]);
  }

  /**
   * Test that default value does not effect invocation compatibility when a default
   * value is of the same type as a constraint.
   *
   * @test @internal
   */
  static function unittest_specializationParameterDefaultValueSameAsConstraintType () {
    PhlintTest::assertNoIssues('
      /**
       * @param array|string $bar
       */
      function foo ($bar = "") {}
      foo("!");
    ');
  }

  /**
   * Test specialization constraints.
   *
   * @test @internal
   */
  static function unittest_specializationConstraints () {
    PhlintTest::assertIssues('
      /**
       * @constraint(is_numeric($bar))
       */
      function foo (string $bar) {
        return $bar + 1;
      }
      foo("2");
      foo(null);
      foo(INF);
      foo("a");
    ', [
      '
        Operand Compatibility: $bar on line 5
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
      ',
      '
        Constraint Attribute: foo(null) on line 8
        Function `function foo (string $bar)` has the constraint `@constraint(is_numeric($bar))` on line 2.
        That constraint is failing for the expression `foo(null)` on line 8.
      ',
      '
        Argument Compatibility: null on line 8
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `string`.
      ',
      '
        Constraint Attribute: foo(INF) on line 9
        Function `function foo (string $bar)` has the constraint `@constraint(is_numeric($bar))` on line 2.
        That constraint is failing for the expression `foo(INF)` on line 9.
      ',
      '
        Argument Compatibility: INF on line 9
        Argument #1 passed in the expression `foo(INF)` is of value `INF`.
        A value of value `INF` is not implicitly convertible to type `string`.
      ',
      '
        Constraint Attribute: foo("a") on line 10
        Function `function foo (string $bar)` has the constraint `@constraint(is_numeric($bar))` on line 2.
        That constraint is failing for the expression `foo("a")` on line 10.
      ',
    ]);
  }

}
