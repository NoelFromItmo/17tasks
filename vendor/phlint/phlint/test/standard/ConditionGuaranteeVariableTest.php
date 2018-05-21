<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeVariableTest {

  /**
   * Test that there are not side effects when providing
   * guarantees for an empty array.
   *
   * @test @internal
   */
  static function unittest_emptyArrayNoFilterSideEffects () {
    PhlintTest::assertNoIssues('
      $foo = array_flip([]);
      if ($foo)
        $foo = [];
      else
        array_flip($foo);
      array_flip($foo);
    ');
  }

}
