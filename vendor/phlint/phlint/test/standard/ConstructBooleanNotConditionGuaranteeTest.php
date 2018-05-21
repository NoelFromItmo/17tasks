<?php

use \phlint\Test as PhlintTest;

class ConstructBooleanNotConditionGuaranteeTest {

  /**
   * Test variable initialization in a complex expression after a
   * condition guarantee barrier.
   *
   * @test @internal
   */
  static function unittest_variableInitializationInAComplexExpression () {
    PhlintTest::assertIssues('
      function foo ($bar = true) {
        if (!$bar)
          return;
        $fun = baz();
        $fun = $fun + 1;
      }
      foo(false);
    ', [
      '
        Name: baz() on line 4
        Expression `baz()` calls function `baz`.
        Function `baz` not found.
      ',
    ]);
  }

}
