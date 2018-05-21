<?php

use \phlint\Test as PhlintTest;

class ImportTest {

  /**
   * Test used import.
   *
   * @test @internal
   */
  static function unittest_used () {
    PhlintTest::assertNoIssues('
      use \a\b\c;
      $x = null;
      if ($x instanceof c) {}
    ');
  }

  /**
   * Test not used import.
   *
   * @test @internal
   */
  static function unittest_notUsed () {
    PhlintTest::assertIssues('
      use \a\b\c;
      $x = null;
      if ($x instanceof \a\b\c) {}
    ', [
      '
        Import Usage: a\b\c on line 1
        Import `a\b\c` is not used.
      ',
    ]);
  }

  /**
   * Test relative import.
   *
   * @test @internal
   */
  static function unittest_relative () {
    PhlintTest::assertNoIssues('
      namespace a\b\c {
        class d {}
      }
      namespace e {
        use \a\b;
        $x = new b\c\d();
      }
    ');
  }

  /**
   * Test relative non-existing import.
   *
   * @test @internal
   */
  static function unittest_relativeNonExisting () {
    PhlintTest::assertIssues('
      use \a\b;
      $x = new b\c\d();
    ', [
      '
        Name: new b\c\d() on line 2
        Expression `new b\c\d()` calls function `a\b\c\d`.
        Function `a\b\c\d` not found.
      ',
    ]);
  }

  /**
   * Test accessing import from nested scope.
   *
   * @test @internal
   */
  static function unittest_nestedScope () {
    PhlintTest::assertNoIssues('
      namespace a {
        class B {}
      }
      namespace c {
        use a\B;
        class D {
          function e () {
            if (rand(0, 1))
              $x = new B();
          }
        }
      }

    ');
  }

  /**
   * Cross file import usage.
   *
   * @test @internal
   */
  static function unittest_crossFile () {

    $linter = PhlintTest::create();

    $linter->addSource('
      namespace a;
      class B {}
    ');

    PhlintTest::assertNoIssues($linter->analyze('
      namespace c;
      use \a\B;
      $x = new B();
    '));

  }

  /**
   * Test import collision in repeating namespaces.
   *
   * Regression test for the issues:
   *   Unable to invoke undefined *a\Foo::bar* for the expression *$c->bar()* on line 21.
   *   Unable to invoke undefined *a\Foo::baz* for the expression *$c->baz()* on line 27.
   *
   * @test @internal
   */
  static function unittest_repeatingNamespaces () {
    PhlintTest::assertIssues('
      namespace a {
        class Foo {
          function foo () {}
        }
        class Bar {
          function bar () {}
        }
        class Baz {
          function baz () {}
        }
      }
      namespace b {
        use \a\Foo as C;
        $c = new C();
        $c->foo();
        $c->fun();
      }
      namespace b {
        use \a\Bar as C;
        $c = new C();
        $c->bar();
        $c->fun();
      }
      namespace b {
        use \a\Baz as C;
        $c = new C();
        $c->baz();
        $c->fun();
      }
    ', [
      '
        Name: $c->fun() on line 16
        Expression `$c->fun()` calls function `a\Foo::fun`.
        Function `a\Foo::fun` not found.
      ',
      '
        Name: $c->fun() on line 22
        Expression `$c->fun()` calls function `a\Bar::fun`.
        Function `a\Bar::fun` not found.
      ',
      '
        Name: $c->fun() on line 28
        Expression `$c->fun()` calls function `a\Baz::fun`.
        Function `a\Baz::fun` not found.
      ',
    ]);
  }

}
