<?php

use \phlint\Test as PhlintTest;

class LibraryTest {

  /**
   * Reachability related sanity test.
   *
   * @test @internal
   */
  static function unittest_reachabilityRelatedSanityTest () {

    $linter = PhlintTest::create();

    $linter->addSource('
      function foo($baz) {
        if (bar($baz)) {
          return (int) $baz;
        }
      }
      function bar ($fun) {}
    ', true);

    PhlintTest::assertNoIssues($linter->analyze('
      foo(1);
    '));

  }

}
