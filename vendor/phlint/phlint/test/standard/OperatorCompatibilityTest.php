<?php

use \phlint\Test as PhlintTest;

class OperatorCompatibilityTest {

  /**
   * Foreach operator test.
   *
   * @test @internal
   */
  static function unittest_foreachOperator () {
    PhlintTest::assertIssues('

      class A {}

      foreach ([] as $item) {}
      foreach (0 as $item) {}
      foreach ("" as $item) {}
      foreach (false as $item) {}
      foreach (null as $item) {}
      foreach (new ArrayObject() as $item) {}
      foreach (new A() as $item) {}

    ', [
      '
        Operand Compatibility: 0 on line 5
        Value `0` is always or sometimes of type `int`.
        Loop `foreach (0 as $item)` may cause undesired or unexpected behavior with `int` operands.
      ',
      '
        Operand Compatibility: "" on line 6
        Value `""` is always or sometimes of type `string`.
        Loop `foreach ("" as $item)` may cause undesired or unexpected behavior with `string` operands.
      ',
      '
        Operand Compatibility: false on line 7
        Value `false` is always or sometimes of type `bool`.
        Loop `foreach (false as $item)` may cause undesired or unexpected behavior with `bool` operands.
      ',
      '
        Operand Compatibility: null on line 8
        Value `null` is always or sometimes of type `null`.
        Loop `foreach (null as $item)` may cause undesired or unexpected behavior with `null` operands.
      ',
      '
        Operand Compatibility: new A() on line 10
        Expression `new A()` is always or sometimes of type `A`.
        Loop `foreach (new A() as $item)` may cause undesired or unexpected behavior with `A` operands.
      ',
    ]);
  }

}
