<?php

use \phlint\Test as PhlintTest;

class ArrayAccessConcept {

  /**
   * Test symbol linking when using `ArrayAccess` concept interface.
   *
   * @test @internal
   */
  static function unittest_symbolLink () {
    PhlintTest::assertNoIssues('
      $a = new ArrayObject();
      $a["a"] = true;
      assert($a->count() == 1);
    ');
  }

  /**
   * Test symbol linking when using `ArrayAccess` concept interface with specialization.
   *
   * @test @internal
   */
  static function unittest_symbolLinkSpecialization () {
    PhlintTest::assertNoIssues('
      function foo ($x) {
        $x["a"] = "b";
      }
      foo(["a1" => "b1"]);
      foo(new ArrayObject());
    ');
  }

  /**
   * Regression test for the issue:
   *   Unable to invoke undefined *SplFixedArray::isEmpty* for the expression *$app["baz"]->isEmpty()* on line 4.
   *
   * @test @internal
   */
  static function unittest_arrayAccessObject () {
    PhlintTest::assertNoIssues('
      function foo ($app) {
        $app["bar"] = new SplFixedArray();
        $app["baz"] = new SplHeap();
        assert($app["baz"]->isEmpty());
      }
    ');
  }

}
