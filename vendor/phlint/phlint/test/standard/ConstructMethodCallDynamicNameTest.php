<?php

use \phlint\Test as PhlintTest;

class ConstructMethodCallDynamicNameTest {

  /**
   * Test calls to arbitrary names that are guaranteed to exist.
   *
   * @test @internal
   */
  static function arbitraryExistingNames () {
    PhlintTest::assertNoIssues('
      class A {
        function foo (array $data) {
          foreach ($data as $key => $value) {
            $bar = "set" . $key;
            if (method_exists($this, $bar))
              $this->$bar($value);
          }
        }
      }
    ');
  }

}
