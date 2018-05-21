<?php

use \phlint\Test as PhlintTest;

/**
 * @see http://www.php.net/manual/en/function.implode.php
 */
class EvaluateImplodeTest {

  /**
   * Test implode with no arguments.
   *
   * @test @internal
   */
  static function unittest_noArguments () {
    //@todo: Test that calling with no arguments returns null.
    return;
    PhlintTest::assertNoIssues('
      implode();
    ');
  }

}
