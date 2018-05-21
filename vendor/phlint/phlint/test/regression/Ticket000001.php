<?php

use \phlint\Test as PhlintTest;

/**
 * @see https://gitlab.com/phlint/phlint/issues/1
 */
class Ticket000001 {

  /**
   * Test the case reported in the ticket.
   * @test @internal
   */
  static function unittest_reported () {
    PhlintTest::assertNoIssues('

      /**
       * @param bool $b
       * @param int $a
       */
      function foo($a, $b) : void {}

      foo(5, true);

    ');
  }

  /**
   * Type propagation test.
   *
   * @test @internal
   */
  static function unittest_typePropagation () {
    PhlintTest::assertIssues('

      /**
       * @param bool $b
       * @param null $a
       */
      function foo($a, $b) : void {
        return $a + $b;
      }

      foo(1, 2);

    ', [
      '
        Argument Compatibility: 1 on line 10
        Argument #1 passed in the expression `foo(1, 2)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `null`.
      ',
      '
        Argument Compatibility: 2 on line 10
        Argument #2 passed in the expression `foo(1, 2)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Operand Compatibility: $a on line 7
        Variable `$a` is always or sometimes of type `null`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `null` operands.
      ',
      '
        Operand Compatibility: $b on line 7
        Variable `$b` is always or sometimes of type `bool`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `bool` operands.
      ',
    ]);
  }

}
