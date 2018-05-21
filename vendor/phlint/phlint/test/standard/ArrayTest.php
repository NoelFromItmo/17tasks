<?php

use \phlint\Test as PhlintTest;

class ArrayTest {

  /**
   * Test array set and get.
   *
   * @test @internal
   */
  static function unittest_setAndGet () {
    PhlintTest::assertNoIssues('
      $foo = [];
      $foo["bar"] = null;
      $foo["baz"] = $foo["bar"];
    ');
  }

}
