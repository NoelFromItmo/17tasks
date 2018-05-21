<?php

use \phlint\Test as PhlintTest;

class PHPDocTest {

  /**
   * Test empty `@param` attribute.
   *
   * @test @internal
   */
  static function unittest_emptyParam () {
    PhlintTest::assertIssues('
      /**
       * @param
       */
      function foo () {}
    ', [
      '
        PHPDoc: @param on line 2
        PHPDoc is not valid without a type.
      ',
    ]);
  }

  /**
   * Test `@param` attribute without a name.
   *
   * @test @internal
   */
  static function unittest_paramWithoutAName () {
    PhlintTest::assertNoIssues('
      /**
       * @param int
       */
      function foo () {}
    ');
  }

  /**
   * Test `@param` attribute without a type.
   *
   * @test @internal
   */
  static function unittest_paramWithoutAType () {
    PhlintTest::assertIssues('
      /**
       * @param $bar
       */
      function foo ($bar) {
        return $bar + 1;
      }
    ', [
      '
        PHPDoc: @param $bar on line 2
        PHPDoc is not valid without a type.
      ',
    ]);
  }

  /**
   * Test `@param` attribute with an invalid type.
   *
   * @test @internal
   */
  static function unittest_paramWithAnInvalidType () {
    PhlintTest::assertIssues('
      /**
       * @param a-b $bar
       */
      function foo ($bar) {
        return $bar + 1;
      }
    ', [
      '
        PHPDoc: @param a-b $bar on line 2
        PHPDoc `@param a-b $bar` declared with the type `a-b`.
        Type `a-b` is not valid.
      ',
    ]);
  }

  /**
   * Test `@param` attribute with an undefined type.
   *
   * @test @internal
   */
  static function unittest_paramWithAnUndefinedType () {
    PhlintTest::assertIssues('
      class A {}
      /**
       * @param A $bar
       * @param B $baz
       */
      function foo ($bar, $baz) {}
    ', [
      '
        PHPDoc: @param B $baz on line 4
        PHPDoc `@param B $baz` declared with the type `B`.
        Type `B` is not declared.
      ',
    ]);
  }

  /**
   * Test `@param` attribute with a keyword type.
   *
   * @test @internal
   */
  static function unittest_paramWithAKeywordType () {
    PhlintTest::assertNoIssues('
      /**
       * @param bool $bar
       */
      function foo ($bar) {}
    ');
  }

}
