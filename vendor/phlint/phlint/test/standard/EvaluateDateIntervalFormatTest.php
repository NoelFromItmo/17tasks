<?php

use \phlint\Test as PhlintTest;

/**
 * @see http://www.php.net/manual/en/dateinterval.format.php
 */
class EvaluateDateIntervalFormatTest {

  /**
   * Test str_replace with no arguments.
   *
   * @test @internal
   */
  static function unittest_plusCompatibility () {
    PhlintTest::assertIssues('
      (new DateInterval("P1D"))->format("%d") + 1;
      (new DateInterval("P1D"))->format("d") + 1;
    ', [
      '
        Operand Compatibility: (new DateInterval("P1D"))->format("d") on line 2
        Expression `(new DateInterval("P1D"))->format("d")` is always or sometimes of type `string`.
        Expression `(new DateInterval("P1D"))->format("d") + 1`
          may cause undesired or unexpected behavior with `string` operands.
      ',
    ]);
  }

}
