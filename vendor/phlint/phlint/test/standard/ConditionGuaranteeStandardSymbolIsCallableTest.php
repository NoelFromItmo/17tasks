<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeStandardSymbolIsCallableTest {

  /**
   * Test `is_callable` condition barrier.
   *
   * @test @internal
   */
  static function unittest_conditionBarrier () {
    PhlintTest::assertNoIssues('
      $foo = function () {};
      if (is_callable($foo))
        return;
      $bar = $foo . "!";
    ');
  }

  /**
   * Test `is_callable` against a namespaced phpDoc declared type.
   *
   * @test @internal
   */
  static function unittest_namespacedPHPDocDeclaredType () {
    PhlintTest::assertIssues('
      namespace A {
        /**
         * @param callable $bar
         */
        function foo ($bar) {
          if (is_callable($bar))
            {}
          else
            $baz = $bar . "!";
          $fun = $bar . "?";
        }
      }
    ', [
      '
        Operand Compatibility: $bar on line 10
        Variable `$bar` is always or sometimes of type `callable`.
        Expression `$bar . "?"` may cause undesired or unexpected behavior with `callable` operands.
      ',
    ]);
  }

}
