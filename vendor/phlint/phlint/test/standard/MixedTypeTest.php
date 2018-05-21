<?php

use \phlint\Test as PhlintTest;

class MixedTypeTest {

  /**
   * Test invocation on mixed type.
   * @test @internal
   */
  static function unittest_mixedInvocation () {
    PhlintTest::assertNoIssues('
      function foo (ArrayObject $a) {
        $a["x"]->baz();
      }
    ');
  }

  /**
   * Test callback invocation on mixed type.
   *
   * Regression test for the issue:
   *   Unable to invoke undefined *mixed* for the expression *$callback()* on line 3.
   *
   * @test @internal
   */
  static function unittest_mixedCallbackInvocation () {
    PhlintTest::assertNoIssues('
      function foo (ArrayObject $a) {
        $callback = $a["callback"];
        $callback();
      }
    ');
  }

}
