<?php

use \phlint\Test as PhlintTest;

class WeakTypeTest {

  /**
   * Test weak types function call.
   *
   * @test @internal
   */
  static function unittest_functionCall () {
    PhlintTest::assertNoIssues('
      function foo (string $bar) {}
      foo(2);
    ');
  }

}
