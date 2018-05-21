<?php

use \phlint\Test as PhlintTest;

class ConstructAssignArrayDimSimulateTest {

  /**
   * Test that an array initialization initializes an array type.
   *
   * @test @internal
   */
  static function correctTypeInitialization () {
    PhlintTest::assertIssues('
      function foo (int $bar) {}
      $baz[] = 1;
      foo($baz);
    ', [
      '
        Variable Append Initialization: $baz on line 2
        Variable `$baz` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
      '
        Argument Compatibility: $baz on line 3
        Argument #1 passed in the expression `foo($baz)` is of type `int[]`.
        A value of type `int[]` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test that a conditional array initialization initializes an array type.
   *
   * Regardless whether the `if` condition is met or not the second assignment
   * will not allow for the variable to be unassigned.
   *
   * @test @internal
   */
  static function conditionalCorrectTypeInitialization () {
    PhlintTest::assertIssues('
      function foo (array $bar) {
        if (ZEND_DEBUG_BUILD)
          $baz[] = [];
        $baz[] = [];
        return $baz;
      }
    ', [
      '
        Variable Append Initialization: $baz on line 3
        Variable `$baz` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);
  }

}
