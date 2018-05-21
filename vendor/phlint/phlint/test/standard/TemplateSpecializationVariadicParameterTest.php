<?php

use \phlint\Test as PhlintTest;

class TemplateSpecializationVariadicParameterTest {

  /**
   * Test type inference of variadic parameters with template specialization.
   *
   * @test @internal
   */
  static function unittest_variadicParameterTypeInference () {
    PhlintTest::assertIssues('
      function foo($bar = 0, ...$baz) {
        return $bar - 1;
      }
      foo([], 0, []);
    ', [
      '
        Operand Compatibility: $bar on line 2
        Variable `$bar` is always or sometimes of type `mixed[int|string]`.
        Expression `$bar - 1` may cause undesired or unexpected behavior with `mixed[int|string]` operands.
          Trace #1:
            #1: Function *function foo (mixed[int|string] $bar, ...$baz)*
              specialized for the expression *foo([], 0, [])* on line 4.
      ',
    ]);
  }

}
