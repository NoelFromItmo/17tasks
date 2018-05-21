<?php

use \phlint\Test as PhlintTest;

class ConstructForeachConditionGuaranteeTest {

  /**
   * Test variable initialization in a complex expression after a
   * condition guarantee barrier.
   *
   * @test @internal
   */
  static function unittest_variableInitializationInAComplexExpression () {
    PhlintTest::assertNoIssues('
      function foo ($bar = true) {
        if (!$bar)
          return;
        $baz = [];
        foreach ($baz as $fun) {}
      }
      foo(false);
    ');
  }

}
