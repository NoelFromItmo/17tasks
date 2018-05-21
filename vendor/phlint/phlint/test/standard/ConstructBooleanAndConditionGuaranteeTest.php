<?php

use \phlint\Test as PhlintTest;

class ConstructBooleanAndConditionGuaranteeTest {

  /**
   * Test `and` merging of `string` and `array` guarantees.
   *
   * @test @internal
   */
  static function mergeGuaranteesStringAndArray () {
    PhlintTest::assertIssues('
      function foo ($bar) {
        if ((is_string($bar) || is_array($bar)) && (is_string($bar) || is_array($bar)))
          return $bar - 1;
      }
    ', [
      '
        Operand Compatibility: $bar on line 3
        Variable `$bar` is always or sometimes of type `string`.
        Expression `$bar - 1` may cause undesired or unexpected behavior with `string` operands.
      ',
      '
        Operand Compatibility: $bar on line 3
        Variable `$bar` is always or sometimes of type `array`.
        Expression `$bar - 1` may cause undesired or unexpected behavior with `array` operands.
      ',
    ]);
  }

  /**
   * Test that `and` merging of multiple `empty` guarantees does not causes
   * undesired side effects.
   *
   * @test @internal
   */
  static function mergeGuaranteesEmpty () {
    PhlintTest::assertNoIssues('
      $foo = [];
      if (empty($foo["a"]) && empty($foo["b"]) && empty($foo["c"]))
        return null;
      $bar = $foo;
    ');
  }

  /**
   * Test that negative `and` does not cause undesired side effects.
   *
   * @test @internal
   */
  static function negativeGuarantees () {
    PhlintTest::assertNoIssues('
      $foo = [];
      if (!empty($foo["bar"]) && substr($foo["bar"], 0, 3) == "baz")
        return null;
      $fun = $foo;
    ');
  }

}
