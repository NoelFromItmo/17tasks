<?php

use \phlint\Test as PhlintTest;

class ConstructAssertTest {

  /**
   * Test a not equal value assert.
   *
   * @test @internal
   */
  static function notEqualValueAssert () {
    PhlintTest::assertIssues('
      function divide ($a, $b) {
        assert($b != 0);
        return $a / $b;
      }
      $result = divide(5, 0);
    ', [
      '
        Assert Construct: assert($b != 0) on line 2
        Assertion expression `assert($b != 0)` is not always true.
        Assertions must always be true.
          Trace #1:
            #1: Function *function divide (5 $a, 0 $b)* specialized for the expression *divide(5, 0)* on line 5.
      ',
    ]);
  }

}
