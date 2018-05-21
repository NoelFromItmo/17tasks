<?php

use \phlint\Test as PhlintTest;

class StandardSymbolDateTest {

  /**
   * Test `date('i')`.
   *
   * @test @internal
   */
  static function dateI () {
    PhlintTest::assertIssues('
      dechex(date("i"));
      dechex(substr(date("-i-"), 1, 2));
      dechex(substr(date("-i-"), 1, 3));
    ', [
      '
        Argument Compatibility: substr(date("-i-"), 1, 3) on line 3
        Argument #1 passed in the expression `dechex(substr(date("-i-"), 1, 3))` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test `date('n')`.
   *
   * @test @internal
   */
  static function dateN () {
    PhlintTest::assertIssues('
      dechex(date("n"));
      dechex(substr(date("-n-"), 1, 1));
      dechex(substr(date("-n-"), 1, 2));
    ', [
      '
        Argument Compatibility: substr(date("-n-"), 1, 2) on line 3
        Argument #1 passed in the expression `dechex(substr(date("-n-"), 1, 2))` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test `date('U')`.
   *
   * @test @internal
   */
  static function dateU () {
    PhlintTest::assertIssues('
      dechex(date("U"));
      dechex(substr(date(",U-"), 1, 1));
      dechex(substr(date(",U-"), 0, 2));
    ', [
      '
        Argument Compatibility: substr(date(",U-"), 0, 2) on line 3
        Argument #1 passed in the expression `dechex(substr(date(",U-"), 0, 2))` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test that template specialization from `date` generated value
   * takes a reasonable amount of time.
   *
   * @test @internal
   */
  static function templateSpecialization () {
    PhlintTest::assertNoIssues('
      function foo () {
        bar(date("Y-m-d H:i:s"));
      }
      function bar ($baz) {
        return $baz;
      }
    ');
  }

}
