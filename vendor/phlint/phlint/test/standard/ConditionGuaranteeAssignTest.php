<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeAssignTest {

  /**
   * Test that a complex assign expression in a complex guarantee gets resolved
   * properly and does not causes issues when it's being merged with other guarantees.
   *
   * @test @internal
   */
  static function unittest_complexMerge () {
    PhlintTest::assertIssues('
      function foo () {
        return ZEND_DEBUG_BUILD ? true : false;
      }
      if (($bar = foo()) || $bar = "a") {
        $baz = $bar + 1;
      }
    ', [
      '
        Operand Compatibility: $bar on line 5
        Variable `$bar` is always or sometimes of type `bool`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `bool` operands.
      ',
      '
        Operand Compatibility: $bar on line 5
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `string` operands.
      ',
    ]);
  }

  /**
   * Test assign null filter.
   *
   * @test @internal
   */
  static function unittest_assignNullFilter () {
    PhlintTest::assertIssues('
      class A {}
      function foo () : ?A {
        return ZEND_DEBUG_BUILD ? new A() : null;
      }
      function bar () {
        if (ZEND_DEBUG_BUILD && ($baz = foo()))
          $baz->fun();
      }
    ', [
      '
        Name: $baz->fun() on line 7
        Expression `$baz->fun()` calls function `A::fun`.
        Function `A::fun` not found.
      ',
    ]);
  }

  /**
   * Test negative assign null filter.
   *
   * @test @internal
   */
  static function unittest_negativeAssignNullFilter () {
    PhlintTest::assertIssues('
      class A {}
      function foo () : ?A {
        return ZEND_DEBUG_BUILD ? new A() : null;
      }
      function bar () {
        if (ZEND_DEBUG_BUILD && (ZEND_DEBUG_BUILD && (ZEND_DEBUG_BUILD && !($baz = foo()))))
          $baz->fun();
      }
    ', [
      '
        Name: $baz->fun() on line 7
        Expression `$baz->fun()` calls function `null::fun`.
        Function `null::fun` not found.
      ',
    ]);
  }

}
