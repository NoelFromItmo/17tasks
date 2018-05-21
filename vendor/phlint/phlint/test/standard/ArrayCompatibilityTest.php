<?php

use \phlint\Test as PhlintTest;

class ArrayCompatibilityTest {

  /**
   * Test implicit conversion to float[] with argument declaration.
   *
   * @test @internal
   */
  static function unittest_floatArrayTest () {
    PhlintTest::assertIssues('
      /**
       * @param float[] $bar
       */
      function foo ($bar) {}
      foo([5]);
      foo([5, 1.1]);
      foo([1.1]);
      foo([5, 1.1, "a"]);
      foo(["a"]);
      foo(1);
      foo("a");
      foo(false);
    ', [
      '
        Argument Compatibility: [5, 1.1, "a"] on line 8
        Argument #1 passed in the expression `foo([5, 1.1, "a"])` is of type `(int|float|string)[]`.
        A value of type `(int|float|string)[]` is not implicitly convertible to type `float[]`.
      ',
      '
        Argument Compatibility: ["a"] on line 9
        Argument #1 passed in the expression `foo(["a"])` is of type `string[]`.
        A value of type `string[]` is not implicitly convertible to type `float[]`.
      ',
      '
        Argument Compatibility: 1 on line 10
        Argument #1 passed in the expression `foo(1)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `float[]`.
      ',
      '
        Argument Compatibility: "a" on line 11
        Argument #1 passed in the expression `foo("a")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `float[]`.
      ',
      '
        Argument Compatibility: false on line 12
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `float[]`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to string[][string][] with argument declaration.
   *
   * @test @internal
   */
  static function unittest_mixedDimensionalStringArrayTest () {
    PhlintTest::assertIssues('
      /**
       * @param string[][string][] $bar
       */
      function foo ($bar) {}
      foo(false);
      foo(["a"]);
      foo([["a"]]);
      foo(["a" => ["a"]]);
      foo([["a" => ["a"]]]);
      foo([[1 => ["a"]]]);
    ', [
      '
        Argument Compatibility: false on line 5
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string[][string][]`.
      ',
      '
        Argument Compatibility: ["a"] on line 6
        Argument #1 passed in the expression `foo(["a"])` is of type `string[]`.
        A value of type `string[]` is not implicitly convertible to type `string[][string][]`.
      ',
      '
        Argument Compatibility: [["a"]] on line 7
        Argument #1 passed in the expression `foo([["a"]])` is of type `string[][]`.
        A value of type `string[][]` is not implicitly convertible to type `string[][string][]`.
      ',
      '
        Argument Compatibility: ["a" => ["a"]] on line 8
        Argument #1 passed in the expression `foo(["a" => ["a"]])` is of type `string[][string]`.
        A value of type `string[][string]` is not implicitly convertible to type `string[][string][]`.
      ',
      '
        Argument Compatibility: [[1 => ["a"]]] on line 10
        Argument #1 passed in the expression `foo([[1 => ["a"]]])` is of type `string[][][]`.
        A value of type `string[][][]` is not implicitly convertible to type `string[][string][]`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to and from (int[]|string[])[] with argument declaration.
   *
   * @test @internal
   */
  static function unittest_mixedDimensionalIntAndStringArrayTest () {
    PhlintTest::assertIssues('

      function foo (int $baz) {}
      foo([[0], [""]]);
      foo(0);

      /**
       * @param (int[]|string[])[]
       */
      function bar ($baz) {}
      bar([[0], [""]]);
      bar(0);

    ', [
      '
        Argument Compatibility: [[0], [""]] on line 3
        Argument #1 passed in the expression `foo([[0], [""]])` is of type `(int[]|string[])[]`.
        A value of type `(int[]|string[])[]` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: 0 on line 11
        Argument #1 passed in the expression `bar(0)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `(int[]|string[])[]`.
      ',
    ]);
  }

}
