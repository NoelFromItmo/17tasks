<?php

use \phlint\Test as PhlintTest;

class PHPStandardLibraryTest {

  /**
   * Test ArrayIterator sort signature.
   *
   * @test @internal
   */
  static function unittest_arrayIteratorSignature () {
    PhlintTest::assertIssues('
      function foo (ArrayIterator $bar) {
        $bar->uasort(function ($a, $b) { return strcmp($a, $b); });
        $bar->uksort(function ($a, $b) { return strcmp($a, $b); });
        $bar->uzsort(function ($a, $b) { return strcmp($a, $b); });
      }
    ', [
      '
        Name: $bar->uzsort(function ($a, $b)) on line 4
        Expression `$bar->uzsort(function ($a, $b))` calls function `ArrayIterator::uzsort`.
        Function `ArrayIterator::uzsort` not found.
      ',
    ]);
  }

  /**
   * Test `date` return value compatibility.
   *
   * @test @internal
   */
  static function unittest_dateReturnValue () {
    PhlintTest::assertIssues('
      dechex(date("Y"));
      dechex(date("Y-m-d"));
    ', [
      '
        Argument Compatibility: date("Y-m-d") on line 2
        Argument #1 passed in the expression `dechex(date("Y-m-d"))` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test `substr`.
   *
   * @test @internal
   */
  static function unittest_substrTest () {
    PhlintTest::assertIssues('
      dechex(substr("Date: 2000-01-01", 6, 4));
      dechex(substr("Date: 2000-01-01", 11, 2));
      dechex(substr("Date: 2000-01-01", 10, 4));
      dechex(substr("Date: 2000-01-01", 3, 4));
    ', [
      '
        Argument Compatibility: substr("Date: 2000-01-01", 10, 4) on line 3
        Argument #1 passed in the expression `dechex(substr("Date: 2000-01-01", 10, 4))` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: substr("Date: 2000-01-01", 3, 4) on line 4
        Argument #1 passed in the expression `dechex(substr("Date: 2000-01-01", 3, 4))` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * pfsockopen sanity test.
   *
   * @test @internal
   */
  static function unittest_pfsockopenSanity () {
    PhlintTest::assertNoIssues('
      pfsockopen("example.com");
    ');
  }

}
