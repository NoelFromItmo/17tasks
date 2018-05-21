<?php

use \phlint\Test as PhlintTest;

class ValueComparisonTest {

  /**
   * Test null value identical comparison.
   *
   * @test @internal
   */
  static function unittest_nullIdenticalComparison () {
    PhlintTest::assertIssues('
      assert(null === null);
      assert(null === false);
      assert(null === true);
      assert(null === 0);
      assert(null === 1);
      assert(null === "0");
      assert(null === "1");
      assert(null === "0.0");
      assert(null === "1.1");
    ', [
      '
        Assert Construct: assert(null === false) on line 2
        Assertion expression `assert(null === false)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(null === true) on line 3
        Assertion expression `assert(null === true)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(null === 0) on line 4
        Assertion expression `assert(null === 0)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(null === 1) on line 5
        Assertion expression `assert(null === 1)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(null === "0") on line 6
        Assertion expression `assert(null === "0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(null === "1") on line 7
        Assertion expression `assert(null === "1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(null === "0.0") on line 8
        Assertion expression `assert(null === "0.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(null === "1.1") on line 9
        Assertion expression `assert(null === "1.1")` is not always true.
        Assertions must always be true.
      ',
    ]);
  }

  /**
   * Test bool value identical comparison.
   *
   * @test @internal
   */
  static function unittest_boolIdenticalComparison () {
    PhlintTest::assertIssues('
      assert(false === false);
      assert(true === true);
      assert(false === true);
      assert(false === 0);
      assert(true === 0);
      assert(false === 1);
      assert(true === 1);
      assert(false === "");
      assert(true === "");
      assert(false === "0");
      assert(true === "0");
      assert(false === "1");
      assert(true === "1");
    ', [
      '
        Assert Construct: assert(false === true) on line 3
        Assertion expression `assert(false === true)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(false === 0) on line 4
        Assertion expression `assert(false === 0)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(true === 0) on line 5
        Assertion expression `assert(true === 0)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(false === 1) on line 6
        Assertion expression `assert(false === 1)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(true === 1) on line 7
        Assertion expression `assert(true === 1)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(false === "") on line 8
        Assertion expression `assert(false === "")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(true === "") on line 9
        Assertion expression `assert(true === "")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(false === "0") on line 10
        Assertion expression `assert(false === "0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(true === "0") on line 11
        Assertion expression `assert(true === "0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(false === "1") on line 12
        Assertion expression `assert(false === "1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(true === "1") on line 13
        Assertion expression `assert(true === "1")` is not always true.
        Assertions must always be true.
      ',
    ]);
  }

  /**
   * Test int value identical comparison.
   *
   * @test @internal
   */
  static function unittest_intIdenticalComparison () {
    PhlintTest::assertIssues('
      assert(0 === 0);
      assert(1 === 1);
      assert(0 === 1);
      assert(1 === 2);
      assert(0 === "0");
      assert(0 === "1");
      assert(1 === "0");
      assert(1 === "1");
      assert(0 === false);
      assert(1 === true);
    ', [
      '
        Assert Construct: assert(0 === 1) on line 3
        Assertion expression `assert(0 === 1)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(1 === 2) on line 4
        Assertion expression `assert(1 === 2)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(0 === "0") on line 5
        Assertion expression `assert(0 === "0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(0 === "1") on line 6
        Assertion expression `assert(0 === "1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(1 === "0") on line 7
        Assertion expression `assert(1 === "0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(1 === "1") on line 8
        Assertion expression `assert(1 === "1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(0 === false) on line 9
        Assertion expression `assert(0 === false)` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert(1 === true) on line 10
        Assertion expression `assert(1 === true)` is not always true.
        Assertions must always be true.
      ',
    ]);
  }

  /**
   * Test string value identical comparison.
   *
   * @test @internal
   */
  static function unittest_stringIdenticalComparison () {
    PhlintTest::assertIssues('
      assert("" === "");
      assert("0" === "0");
      assert("1" === "1");
      assert("0.0" === "0.0");
      assert("1.0" === "1.0");
      assert("1.1" === "1.1");
      assert("" === "0");
      assert("" === "1");
      assert("" === "0.0");
      assert("" === "1.0");
      assert("" === "1.1");
      assert("0" === "1");
      assert("0" === "0.0");
      assert("0" === "1.0");
      assert("0" === "1.1");
      assert("1" === "0.0");
      assert("1" === "1.0");
      assert("1" === "1.1");
      assert("0.0" === "1.0");
      assert("0.0" === "1.1");
      assert("1.0" === "1.1");
    ', [
      '
        Assert Construct: assert("" === "0") on line 7
        Assertion expression `assert("" === "0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("" === "1") on line 8
        Assertion expression `assert("" === "1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("" === "0.0") on line 9
        Assertion expression `assert("" === "0.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("" === "1.0") on line 10
        Assertion expression `assert("" === "1.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("" === "1.1") on line 11
        Assertion expression `assert("" === "1.1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("0" === "1") on line 12
        Assertion expression `assert("0" === "1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("0" === "0.0") on line 13
        Assertion expression `assert("0" === "0.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("0" === "1.0") on line 14
        Assertion expression `assert("0" === "1.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("0" === "1.1") on line 15
        Assertion expression `assert("0" === "1.1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("1" === "0.0") on line 16
        Assertion expression `assert("1" === "0.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("1" === "1.0") on line 17
        Assertion expression `assert("1" === "1.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("1" === "1.1") on line 18
        Assertion expression `assert("1" === "1.1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("0.0" === "1.0") on line 19
        Assertion expression `assert("0.0" === "1.0")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("0.0" === "1.1") on line 20
        Assertion expression `assert("0.0" === "1.1")` is not always true.
        Assertions must always be true.
      ',
      '
        Assert Construct: assert("1.0" === "1.1") on line 21
        Assertion expression `assert("1.0" === "1.1")` is not always true.
        Assertions must always be true.
      ',
    ]);
  }

}
