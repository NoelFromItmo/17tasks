<?php

use \phlint\Test as PhlintTest;

class RecursionTest {

  /**
   * Test recursive return inference.
   *
   * @test @internal
   */
  static function unittest_recursiveReturnInference () {
    PhlintTest::assertNoIssues('
      function foo () {
        return foo();
      }
    ');
  }

  /**
   * Test recursive return inference without specialization.
   *
   * @test @internal
   */
  static function unittest_recursiveReturnInferenceWithoutSpecialization () {
    PhlintTest::assertNoIssues('
      function foo () : string {
        return foo();
      }
    ');
  }

  /**
   * Test indirect recursive return inference.
   *
   * @test @internal
   */
  static function unittest_indirectRecursiveReturnInference () {
    PhlintTest::assertNoIssues('
      function foo () {
        return bar();
      }
      function bar () {
        return baz();
      }
      function baz () {
        return foo();
      }
    ');
  }

}
