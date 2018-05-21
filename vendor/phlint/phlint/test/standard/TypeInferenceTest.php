<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

class TypeInferenceTest {

  /**
   * Test type inference through foreach and plus operation.
   *
   * @test @internal
   */
  static function unittest_foreachPlus () {
    PhlintTest::assertIssues('

      function myRangeSum ($values) {
        $result = 0;
        foreach ($values as $value) {
          $result += $value;
        }
        return $result;
      }

      $a = [1, 2.2, "2", 3, "a3.3"];

      $b = [];

      foreach ($a as $x)
        $b[] = $x;

      $r = myRangeSum($b);

      $c = [$r, $a[4], 3];

      $r2 = myRangeSum($c);

    ', [
      '
        Operand Compatibility: $value on line 5
        Variable `$value` is always or sometimes of type `int|float|string`.
        Expression `$result += $value` may cause undesired or unexpected behavior with `int|float|string` operands.
          Trace #1:
            #1: Function *function myRangeSum ((int|float|string)[] $values)*
              specialized for the expression *myRangeSum($b)* on line 17.
          Trace #2:
            #1: Function *function myRangeSum ((int|float|string)[] $values)*
              specialized for the expression *myRangeSum($c)* on line 21.
      ',
    ]);
  }

  /**
   * Test merging of types on multiple assign statements.
   *
   * @test @internal
   */
  static function unittest_mergeTypes () {
    PhlintTest::assertIssues('

      class A {
        function foo () { return 1; }
      }

      class B {
        function bar () { return 2; }
      }

      function getObject () {
        if (rand(0, 1))
          $o = new A();
        else
          $o = new B();
        $o->bar();
      }

    ', [
      '
        Name: $o->bar() on line 15
        Expression `$o->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
    ]);
  }

  /**
   * Test that inline function return types do not leak outside of function scope.
   *
   * @test @internal
   */
  static function unittest_typeLeaking () {
    PhlintTest::assertNoIssues('

      function bar () {
        $arr = ["a", "b"];
        usort($arr, function ($a, $b) {
          if ($a === null || $b === null)
            return 0;
          return strcmp($a, $b);
        });
        return $arr;
      }

      foreach (bar() as $v) {}

    ');
  }

  /**
   * Test PHPDoc type inference when doing a forward lookup.
   *
   * Regression test for the issue:
   *   Provided argument *1* of type *int* is not compatible
   *     in the expression *foo("%s and %s", 1, new A())* on line 3.
   *
   * @test @internal
   */
  static function unittest_phpDocTypeInference () {
    PhlintTest::assertIssues('

      function callFoo () {
        foo("%s and %s", 1, new A());
      }

      /**
       * @param string $bar
       * @param string $baz
       */
      function foo($bar, ...$baz) {}

      class A {}

      callFoo();

    ', [
      '
        Argument Compatibility: new A() on line 3
        Argument #3 passed in the expression `foo("%s and %s", 1, new A())` is of type `A`.
        A value of type `A` is not implicitly convertible to type `string`.
      ',
    ]);
  }

  /**
   * Test function as argument.
   *
   * Regression test for the issue:
   *   Unable to invoke undefined *f_foo__f_anonymous_052e44e6d5e328c244d6cfba4095bf33d17eb43d)}* for the expression *foo(() use ("a"))* on line 5.
   *     Trace #1: Function *bar("a")* specialized for the expression *bar("a")* on line 9.
   *
   * @test @internal
   */
  static function unittest_functionAsArgument () {
    PhlintTest::assertIssues('
      function foo ($callback) {
        $x = $callback() + 1;
      }
      function bar ($baz) {
        foo(function () use ($baz) {
          return $baz;
        });
      }
      bar("a");
    ', [
      '
        Operand Compatibility: $callback() on line 2
        Expression `$callback()` is always or sometimes of type `string`.
        Expression `$callback() + 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ($callback)* specialized for the expression *foo(function () use ("a"))* on line 5.
            #2: Function *function bar ("a" $baz)* specialized for the expression *bar("a")* on line 9.
      ',
    ]);
  }

  /**
   * Test implicitly convertible from library.
   *
   * Regression test for the issue:
   *   Provided argument *new D()* of type *D* is not compatible in the expression *foo(new D())* on line 2.
   *
   * @test @internal
   */
  static function unittest_implicitlyConvertibleFromLibrary () {

    $linter = PhlintTest::create();

    $linter[] = new MockAutoload([
      'A' => '
        interface A {}
      ',
      'B' => '
        interface B extends A {}
      ',
      'C' => '
        class C implements B {}
      ',
      'D' => '
        class D extends C {}
      ',
    ]);

    PhlintTest::assertIssues($linter->analyze('
      function foo (A $a) {}
      foo(new D());
    '), [
    ]);

  }

  /**
   * Test inference of `self` keyword.
   *
   * Regression test for the issues:
   *   Unable to invoke undefined *self::format* for the expression *$dt->format("c")* on line 9.
   *   Unable to invoke undefined *self::fly* for the expression *$dt->fly()* on line 10.
   *
   * @test @internal
   */
  static function unittest_selfKeywordInference () {
    // @todo: Optimize and re-enable.
    return;
    PhlintTest::assertIssues('

      class DT extends DateTime {
        static function create () {
          return new self();
        }
      }

      $dt = DT::create();
      $dt->format("c");
      $dt->fly();

    ', [
      'Unable to invoke undefined *DT::fly* for the expression *$dt->fly()* on line 10.',
    ]);
  }

}
