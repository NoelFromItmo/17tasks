<?php

use \phlint\Test as PhlintTest;

class ValueInferenceTest {

  /**
   * Make sure that value inference does not cause symbol pollution
   * by creating symbol entries before they are created by symbol inference.
   * @test @internal
   */
  static function unittest_symbolPolution () {
    PhlintTest::assertNoIssues('
      function foo ($a) {
        if (preg_match("/(.?)/", $a, $match))
          $x = $match[1];
        else
          $x = "";
      }
      foo("a");
    ');
  }

  /**
   * Test that invocation of potentially broken link behaves accordingly.
   * @test @internal
   */
  static function unittest_brokenLinkInvocation () {
    PhlintTest::assertIssues('
      function invoke ($symbol = "foo") {
        $symbol(1);
      }
      invoke();
      invoke("bar");
    ', [
      '
        Name: $symbol(1) on line 2
        Expression `$symbol(1)` calls function `foo`.
        Function `foo` not found.
      ',
      '
        Name: $symbol(1) on line 2
        Expression `$symbol(1)` calls function `bar`.
        Function `bar` not found.
          Trace #1:
            #1: Function *function invoke ("bar" $symbol)* specialized for the expression *invoke("bar")* on line 5.
      ',
    ]);
  }

  /**
   * Test that template specialization does not alter the original library
   * definition in a way that could cause issues for the next specialization.
   *
   * Regression test for the issue:
   *   Variable *$bar* used before initialized on line 1.
   *
   * @test @internal
   */
  static function unittest_impureTemplateSpecialization () {
    PhlintTest::assertNoIssues('
      preg_match("/a/", "a", $foo);
    ');
    PhlintTest::assertNoIssues('
      preg_match("/b/", "b", $bar);
    ');
  }

}
