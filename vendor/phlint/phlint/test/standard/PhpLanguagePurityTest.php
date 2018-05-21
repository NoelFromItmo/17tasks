<?php

use \phlint\Test as PhlintTest;

/**
 * These tests deal with purity of PHP function and class specializations.
 * They are also used to provide examples that prove that some functions and classes,
 * which might be believed to be pure, are actually not pure
 * in some of their specializations.
 */
class PhpLanguagePurityTest {

  /**
   * Test `array_diff_assoc` purity.
   *
   * @test @internal
   */
  static function unittest_array_diff_assoc () {
    PhlintTest::assertNoIssues('
      /** @pure */
      function foo ($a) {
        return array_diff_assoc([$a], [$a]);
      }
      foo("2");
    ');
  }

  /**
   * Test `array_diff_assoc` purity with mutable arguments.
   *
   * @test @internal
   */
  static function unittest_array_diff_assoc_withMutableArguments () {
    // @todo: Enable when implemented.
    if (false)
    PhlintTest::assertIssues('
      class A {
        protected $i = 0;
        function __toString () {
          $this->i += 1;
          return $this->i . "!";
        }
      }
      /** @pure */
      function foo ($a) {
        return array_diff_assoc([$a], [$a]);
      }
      foo(new A());
    ', [
      '
        Function *foo* not pure on line 9.
          Cause #1: Passing non-constant $a to isolated function *array_diff_assoc()* on line 10.
          Trace #1: foo(interface:\A $a) specialized for foo(new A())
      ',
    ]);
  }

  /**
   * Test `sort` purity.
   *
   * @test @internal
   */
  static function unittest_sort () {
    PhlintTest::assertNoIssues('
      /** @pure */
      function foo () {
        $a = [3, 2, 1];
        sort($a);
        sort($a, SORT_NUMERIC);
        return $a;
      }
    ');
  }

  /**
   * Test `sort` purity.
   *
   * @test @internal
   */
  static function unittest_sortByLocale () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo () {
        $a = [3, 2, 1];
        sort($a, SORT_LOCALE_STRING);
        return $a;
      }
    ', [
      '
        Isolated Attribute: @__isolationBreach(\'Depends on the current locale.\')
        Function `@isolated function sort (int[] &$array, 5 $sort_flags) : bool` has been specialized as isolated.
        Its internal functionality however breaks that isolation because it depends on the current locale.
          Trace #1:
            #1: Function *@isolated function sort (int[] &$array, 5 $sort_flags) : bool*
              specialized for the expression *sort($a, SORT_LOCALE_STRING)* on line 4.
      ',
    ]);
  }

  /**
   * Test `sort` purity.
   *
   * @test @internal
   */
  static function unittest_sortByUnknown () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo ($sort_flags) {
        $a = [3, 2, 1];
        sort($a, $sort_flags);
        return $a;
      }
      foo($_GET["bar"]);
    ', [
      '
        Isolated Attribute: @__isolationBreach(\'Depends on the current locale.\')
        Function `@isolated function sort (int[] &$array, mixed $sort_flags) : bool` has been specialized as isolated.
        Its internal functionality however breaks that isolation because it depends on the current locale.
          Trace #1:
            #1: Function *@isolated function sort (int[] &$array, mixed $sort_flags) : bool*
              specialized for the expression *sort($a, $sort_flags)* on line 4.
            #2: Function *@pure function foo (mixed $sort_flags)*
              specialized for the expression *foo($_GET["bar"])* on line 7.
      ',
    ]);
  }

  /**
   * Test `sort` purity.
   *
   * @test @internal
   */
  static function unittest_sortByUnspecified () {
    PhlintTest::assertNoIssues('
      /** @pure */
      function foo ($sort_flags) {
        $a = [3, 2, 1];
        sort($a, $sort_flags);
        return $a;
      }
    ');
  }

  /**
   * Test `sprintf` purity.
   *
   * @test @internal
   */
  static function unittest_sprintf () {
    PhlintTest::assertNoIssues('
      /** @pure */
      function foo ($a) {
        return sprintf("%s%s", $a, $a);
      }
      foo("2");
    ');
  }

  /**
   * Test `sprintf` purity with mutable arguments.
   *
   * @test @internal
   */
  static function unittest_sprintfWithMutableArguments () {
    // @todo: Enable when implemented.
    if (false)
    PhlintTest::assertIssues('
      class A {
        protected $i = 0;
        function __toString () {
          $this->i += 1;
          return $this->i . "!";
        }
      }
      /** @pure */
      function foo ($a) {
        return sprintf("%s%s", $a, $a);
      }
      foo(new A());
    ', [
      '
        Function *foo* not pure on line 9.
          Cause #1: Passing non-constant $a to isolated function *sprintf()* on line 10.
          Trace #1: foo(interface:\A $a) specialized for foo(new A())
      ',
    ]);
  }

}
