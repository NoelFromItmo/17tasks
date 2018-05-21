<?php

use \phlint\Test as PhlintTest;

class ConcatenationTest {

  /**
   * Test build-in constants concatenation.
   *
   * @test @internal
   */
  static function unittest_buildInConstants () {
    PhlintTest::assertIssues('
      $foo = false . INF . NAN . null . true . ZEND_DEBUG_BUILD . ZEND_THREAD_SAFE;
    ', [
      '
        Operand Compatibility: false on line 1
        Value `false` is always or sometimes of type `bool`.
        Expression `false . INF`
          may cause undesired or unexpected behavior with `bool` operands.
      ',
      '
        Operand Compatibility: null on line 1
        Value `null` is always or sometimes of type `null`.
        Expression `false . INF . NAN . null`
          may cause undesired or unexpected behavior with `null` operands.
      ',
      '
        Operand Compatibility: true on line 1
        Value `true` is always or sometimes of type `bool`.
        Expression `false . INF . NAN . null . true`
          may cause undesired or unexpected behavior with `bool` operands.
      ',
      '
        Operand Compatibility: ZEND_DEBUG_BUILD on line 1
        Value `ZEND_DEBUG_BUILD` is always or sometimes of type `bool`.
        Expression `false . INF . NAN . null . true . ZEND_DEBUG_BUILD`
          may cause undesired or unexpected behavior with `bool` operands.
      ',
      '
        Operand Compatibility: ZEND_THREAD_SAFE on line 1
        Value `ZEND_THREAD_SAFE` is always or sometimes of type `bool`.
        Expression `false . INF . NAN . null . true . ZEND_DEBUG_BUILD . ZEND_THREAD_SAFE`
          may cause undesired or unexpected behavior with `bool` operands.
      ',
    ]);
  }

}
