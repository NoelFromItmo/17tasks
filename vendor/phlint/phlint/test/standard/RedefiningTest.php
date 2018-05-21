<?php

use \phlint\Test as PhlintTest;

class RedefiningTest {

  /**
   * Test redefining.
   *
   * @test @internal
   */
  static function unittest_redefining () {

    $linter = PhlintTest::create();

    $linter->addSource('
      function x () {}
    ');

    $linter->addSource('
      function x () {}
    ');

    PhlintTest::assertIssues($linter->analyze('
      x();
    '), [
      '
        Redeclaring: function x () on line 1
        Declaration for `function x ()` already found.
        Having multiple declarations is not allowed.
      ',
    ]);
  }

  /**
   * Test redefining class method with the same name in a different class.
   *
   * @test @internal
   */
  static function unittest_redefiningSameNameClassMethodInDifferentClasses () {
    PhlintTest::assertNoIssues('

      class C {
        use T;
        function f () {}
      }

      class C2 {
        use T2;
        function f () {}
      }

      trait T {
        function f () {}
      }

      trait T2 {
        function f () {}
      }

      function f () {}

    ');
  }

  /**
   * Test redefining class constants.
   *
   * @test @internal
   */
  static function unittest_redefiningClassConstants () {
    PhlintTest::assertIssues('

      class A {
        const C1 = 1;
        const C2 = 2;
      }

      class B {
        const C2 = 3;
        const C2 = 4;
      }

    ', [
      '
        Redeclaring: C2 on line 8
        Declaration for `C2` already found.
        Having multiple declarations is not allowed.
      ',
      '
        Redeclaring: C2 on line 9
        Declaration for `C2` already found.
        Having multiple declarations is not allowed.
      ',
    ]);
  }

}
