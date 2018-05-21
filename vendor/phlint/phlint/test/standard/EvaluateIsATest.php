<?php

use \phlint\Test as PhlintTest;

/**
 * @see http://www.php.net/manual/en/function.is-a.php
 */
class EvaluateIsATest {

  /**
   * Test is_a with no arguments.
   *
   * @test @internal
   */
  static function unittest_noArguments () {
    PhlintTest::assertNoIssues('
      is_a();
    ');
  }

  /**
   * Test is_a with non-object arguments.
   *
   * @test @internal
   */
  static function unittest_twoArguments () {
    PhlintTest::assertNoIssues('
      is_a(null, "class_that_does_not_exist");
      is_a(false, "class_that_does_not_exist");
      is_a(true, "class_that_does_not_exist");
      is_a(1, "class_that_does_not_exist");
      is_a(1.1, "class_that_does_not_exist");
      is_a(INF, "class_that_does_not_exist");
    ');
  }

}
