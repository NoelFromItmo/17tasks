<?php

use \phlint\Test as PhlintTest;

class CatchTypeTest {

  /**
   * Test namespaced and undefined catch type.
   *
   * @test @internal
   */
  static function unittest_namespacedUndefined () {
    PhlintTest::assertIssues('
      namespace {
        class B {}
      }
      namespace A {
        try {} catch (B $e) {}
      }
    ', [
      '
        Declaration Type: catch (B $e) on line 5
        Type `A\B` is undefined.
      ',
    ]);
  }

}
