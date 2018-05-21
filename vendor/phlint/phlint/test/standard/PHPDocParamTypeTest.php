<?php

use \phlint\Test as PhlintTest;

class PHPDocParamTypeTest {

  /**
   * Test array PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_arrayParam () {
    PhlintTest::assertIssues('
      /**
       * @param array $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `array`.
      ',
    ]);
  }

  /**
   * Test bool PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_boolParam () {
    PhlintTest::assertIssues('
      /**
       * @param bool $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `bool`.
      ',
    ]);
  }

  /**
   * Test boolean PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_booleanParam () {
    PhlintTest::assertIssues('
      /**
       * @param boolean $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `bool`.
      ',
    ]);
  }

  /**
   * Test callable PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_callableParam () {
    // @todo: Implement and enable.
    return;
    PhlintTest::assertIssues('
      /**
       * @param callable $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Provided argument *null* of type *null*
          is not implicitly convertible to type *callable*
          in the expression *foo(null)* on line 5.
      ',
    ]);
  }

  /**
   * Test callback PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_callbackParam () {
    // @todo: Implement and enable.
    return;
    PhlintTest::assertIssues('
      /**
       * @param callback $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Provided argument *null* of type *null*
          is not implicitly convertible to type *callable*
          in the expression *foo(null)* on line 5.
      ',
    ]);
  }

  /**
   * Test double PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_doubleParam () {
    PhlintTest::assertIssues('
      /**
       * @param double $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `float`.
      ',
    ]);
  }

  /**
   * Test false PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_falseParam () {
    // @todo: Implement and enable.
    return;
    PhlintTest::assertIssues('
      /**
       * @param false $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Provided argument *null* of type *null*
          is not implicitly convertible to value *false*
          in the expression *foo(null)* on line 5.
      ',
    ]);
  }

  /**
   * Test float PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_floatParam () {
    PhlintTest::assertIssues('
      /**
       * @param float $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `float`.
      ',
    ]);
  }

  /**
   * Test int PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_intParam () {
    PhlintTest::assertIssues('
      /**
       * @param int $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test integer PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_integerParam () {
    PhlintTest::assertIssues('
      /**
       * @param integer $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test mixed PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_mixedParam () {
    PhlintTest::assertNoIssues('
      /**
       * @param mixed $bar
       */
      function foo ($bar) {}
      foo(null);
    ');
  }

  /**
   * Test null PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_nullParam () {
    PhlintTest::assertIssues('
      /**
       * @param null $bar
       */
      function foo ($bar) {}
      foo(false);
    ', [
      '
        Argument Compatibility: false on line 5
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `null`.
      ',
    ]);
  }

  /**
   * Test object PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_objectParam () {
    PhlintTest::assertIssues('
      /**
       * @param object $bar
       */
      function foo ($bar) {}
      foo(false);
    ', [
      '
        Argument Compatibility: false on line 5
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `object`.
      ',
    ]);
  }

  /**
   * Test resource PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_resourceParam () {
    // @todo: Implement and enable.
    return;
    PhlintTest::assertIssues('
      /**
       * @param resource $bar
       */
      function foo ($bar) {}
      foo(false);
    ', [
      '
        Provided argument *false* of type *bool*
          is not implicitly convertible to type *resource*
          in the expression *foo(false)* on line 5.
      ',
    ]);
  }

  /**
   * Test self PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_selfParam () {
    // @todo: Implement and enable.
    return;
    PhlintTest::assertIssues('
      /**
       * @param self $bar
       */
      function foo ($bar) {}
      foo(false);
    ', [
      '
        Provided argument *false* of type *bool*
          is not implicitly convertible to type *resource*
          in the expression *foo(false)* on line 5.
      ',
    ]);
  }

  /**
   * Test string PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_stringParam () {
    PhlintTest::assertIssues('
      /**
       * @param string $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Argument Compatibility: null on line 5
        Argument #1 passed in the expression `foo(null)` is of type `null`.
        A value of type `null` is not implicitly convertible to type `string`.
      ',
    ]);
  }

  /**
   * Test true PHPDoc param type.
   *
   * @test @internal
   */
  static function unittest_trueParam () {
    // @todo: Implement and enable.
    return;
    PhlintTest::assertIssues('
      /**
       * @param true $bar
       */
      function foo ($bar) {}
      foo(null);
    ', [
      '
        Provided argument *null* of type *null*
          is not implicitly convertible to value *true*
          in the expression *foo(null)* on line 5.
      ',
    ]);
  }

  /**
   * Test same namespace class param type.
   *
   * @test @internal
   */
  static function unittest_sameNamespaceClassParamType () {
    PhlintTest::assertIssues('
      namespace A {
        /**
         * @param B $bar
         */
        function foo ($bar) {}
      }
    ', [
      '
        PHPDoc: @param B $bar on line 3
        PHPDoc `@param B $bar` declared with the type `A\B`.
        Type `A\B` is not declared.
      ',
    ]);
  }

  /**
   * Test param without a name.
   *
   * @test @internal
   */
  static function unittest_noParamName () {
    PhlintTest::assertIssues('
      /**
       * @param bool
       * @param null
       */
      function foo ($a, $b) {}
      foo(1, 2);
    ', [
      '
        Argument Compatibility: 1 on line 6
        Argument #1 passed in the expression `foo(1, 2)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: 2 on line 6
        Argument #2 passed in the expression `foo(1, 2)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `null`.
      ',
    ]);
  }

  /**
   * Test incomplete type-expression.
   *
   * @test @internal
   */
  static function unittest_incompleteTypeExpression () {
    // @todo: Revisit.
    PhlintTest::assertNoIssues('
      /**
       * @param object| string $bar
       */
      function foo ($bar) {}
    ');
  }

  /**
   * Test incomplete type-expression.
   *
   * @test @internal
   */
  static function unittest_incompleteTypeExpressionWithNewLine () {
    // @todo: Revisit.
    PhlintTest::assertNoIssues('
      /**
       * @param object|
       *   string $bar
       */
      function foo ($bar) {}
    ');
  }

}
