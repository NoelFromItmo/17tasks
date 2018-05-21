<?php

use \phlint\Test as PhlintTest;

/**
 * @see http://www.php.net/manual/en/function.str-replace.php
 */
class EvaluateStrReplaceTest {

  /**
   * Test str_replace with no arguments.
   *
   * @test @internal
   */
  static function unittest_noArguments () {
    PhlintTest::assertNoIssues('
      str_replace();
    ');
  }

}
