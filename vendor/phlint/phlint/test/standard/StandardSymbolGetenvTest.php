<?php

use \phlint\Test as PhlintTest;

class StandardSymbolGetenvTest {

  /**
   * Test `getenv` by getting all variables.
   *
   * @test @internal
   */
  static function getAllReturnType () {
    PhlintTest::assertNoIssues('
      $foo = getenv();
      foreach ($foo as $bar) {}
    ');
  }

  /**
   * Test `getenv` by getting one variable.
   *
   * @test @internal
   */
  static function getOneReturnType () {
    PhlintTest::assertNoIssues('
      $foo = getenv("path");
      $bar = $foo . "!";
    ');
  }

}
