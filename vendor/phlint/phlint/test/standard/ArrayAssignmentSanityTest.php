<?php

use \phlint\Test as PhlintTest;

class ArrayAssignmentSanityTest {

  /**
   * Test that array assignment of incompatible call does not causes internal issues.
   *
   * @test @internal
   */
  static function unittest_arrayAssignIncompatibleCall () {
    PhlintTest::assertNoIssues('
      class A {
        static function foo (A $a) {
          A::bar([]);
        }
        static function bar ($baz = []) {
          $baz[] = substr();
        }
      }
    ');
  }

}
