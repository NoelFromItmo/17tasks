<?php

use \phlint\Test as PhlintTest;

class UnreachableTest {

  /**
   * Test unreachable method call in condition guarantee.
   *
   * @test @internal
   */
  static function unittest_methodCallInConditionGuarantee () {
    PhlintTest::assertNoIssues('
      $foo = null;
      if (false)
        if (empty($foo->bar())) {}
    ');
  }

}
