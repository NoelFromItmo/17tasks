<?php

use \phlint\Test as PhlintTest;

class KeywordTest {

  /**
   * "resource" is not a keyword in PHP although it is used
   * as keyword in the documentation.
   *
   * @test @internal
   */
  static function unittest_resourceClassNonExisting () {
    PhlintTest::assertIssues('
      $x = new resource();
    ', [
      '
        Name: new resource() on line 1
        Expression `new resource()` calls function `resource`.
        Function `resource` not found.
      ',
    ]);
  }

  /**
   * "resource" is not a keyword in PHP although it is used
   * as keyword in the documentation.
   *
   * @test @internal
   */
  static function unittest_resourceClass () {
    PhlintTest::assertNoIssues('
      class resource {}
      function foo (resource $x) {}
      foo(new resource());
    ');
  }

}
