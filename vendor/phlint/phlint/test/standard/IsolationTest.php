<?php

use \phlint\Test as PhlintTest;

class IsolationTest {

  /**
   * Test default behavior.
   *
   * @test @internal
   */
  static function unittest_defaultBehavior () {
    PhlintTest::assertNoIssues('
      function foo () {
        $x = $GLOBALS["x"];
      }
    ');
  }

  /**
   * Test global access.
   *
   * @test @internal
   */
  static function unittest_globalAccess () {
    PhlintTest::assertIssues('
      /** @isolated */
      function foo () {
        $x = $GLOBALS["x"];
      }
    ', [
      '
        Isolated Attribute: $GLOBALS on line 3
        Function `@isolated function foo ()` has been marked as isolated.
        Accessing superglobal variable `$GLOBALS` breaks that isolation.
      ',
    ]);
  }

  /**
   * Test isolation inference.
   *
   * @test @internal
   */
  static function unittest_isolationInference () {
    PhlintTest::assertIssues('
      function foo () {
        $x = $GLOBALS["x"];
      }
      function bar () {
        foo();
      }
      /** @isolated */
      function baz () {
        bar();
      }
    ', [
      '
        Isolated Attribute: $GLOBALS on line 2
        Function `@isolated function foo ()` has been marked as isolated.
        Accessing superglobal variable `$GLOBALS` breaks that isolation.
          Trace #1:
            #1: Function *@isolated function foo ()* specialized for the expression *foo()* on line 5.
            #2: Function *@isolated function bar ()* specialized for the expression *bar()* on line 9.
      ',
    ]);
  }

  /**
   * Test calling non-isolated function from an isolated function.
   *
   * @test @internal
   */
  static function callingNonIsolatedFunction () {
    PhlintTest::assertIssues('
      /** @isolated */
      function foo () {
        getenv();
      }
    ', [
      '
        Isolated Attribute: getenv() on line 3
        Function `@isolated function foo ()` has been marked as isolated.
        Calling non-isolated function `getenv()` breaks that isolation.
      ',
    ]);
  }

}
