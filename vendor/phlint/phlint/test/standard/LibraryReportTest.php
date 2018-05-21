<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

/**
 * These tests deal with how library issues are reported.
 * Some issues occur because of the way library is being used while some issues
 * occur because the library itself has issues. In general we want to report
 * the former but not the latter.
 */
class LibraryReportTest {

  /**
   * Test that library issues are not being reported as usage issues.
   * @test @internal
   */
  static function unittest_dontReportLibraryIssues () {

    $linter = PhlintTest::create();

    $linter->addSource('
      function foo ($a, $b = "!") {
        $x = $y;
        return $a + $b;
      }
    ', true);

    PhlintTest::assertIssues($linter->analyze('
      foo();
      foo(1);
      foo("bar");
    '), [
      '
        Operand Compatibility: $a on line 3
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function foo ("bar" $a, $b = "!")* specialized for the expression *foo("bar")* on line 3.
      ',
    ]);

  }

  /**
   * Test specialization by return type.
   *
   * Regression test for the issue:
   *   Unable to invoke undefined *X\Y\A::bar* for the expression *$fun->bar()* in *mock:X\Y\C:6*.
   *     Trace #1: Method *static function createA()* specialized for the expression *I\C::createA()* on line 3.
   *
   * @test @internal
   */
  static function unittest_dontReportLibraryIssuesOnLazyLinking () {

    $linter = PhlintTest::create();

    $linter[] = new MockAutoload([
      'X\Y\A' => '
        namespace X\Y;
        class A extends B {}
      ',
      'X\Y\B' => '
        namespace X\Y;
        class B extends C {
          function foo () {}
        }
      ',
      'X\Y\C' => '
        namespace X\Y;
        class C {
          static function createA () {
            $fun = new A();
            $fun->foo();
            $fun->bar();
            return $fun;
          }
        }
      ',
    ]);

    PhlintTest::assertIssues($linter->analyze('
      namespace Z;
      use \X\Y as I;
      $baz = I\C::createA();
      $baz->foo();
      $baz->bar();
    '), [
      '
        Name: $baz->bar() on line 5
        Expression `$baz->bar()` calls function `X\Y\A::bar`.
        Function `X\Y\A::bar` not found.
      ',
    ]);

  }

  /**
   * Test library report on bad hinting.
   *
   * Regression test for the issue:
   *   Type declaration requires undefined *resource*.
   *     Trace #1: Function *file_get_contents("foo", false, NULL, 0, 0) : string* specialized for the expression *file_get_contents("foo")* on line 1.
   *
   * @test @internal
   */
  static function unittest_dontReportLibraryIssuesBadHinting () {
    PhlintTest::assertNoIssues('
      file_get_contents("foo");
    ');
  }

  /**
   * Test that library only invocations are not specialized and reported.
   *
   * Regression test for the issues:
   *   Unable to invoke undefined *mixed::baz* for the expression *$b->baz()* in *mock:A:4*.
   *   Unable to invoke undefined *mixed::fun* for the expression *$b->fun()* in *mock:A:5*.
   *
   * @test @internal
   */
  static function unittest_dontSpecializeLibraryOnlyInvocations () {

    $phlint = PhlintTest::create();

    $phlint[] = new MockAutoload([
      'A' => '
        class A {
          static function foo ($b = null) {
            return function () use ($b) {
              $b->baz();
              $b->fun();
            };
          }
          static function bar () {
            A::foo(new A());
            A::foo(new B());
          }
        }
      ',
      'B' => '
        class B {
          function baz () {}
        }
      ',
    ]);

    PhlintTest::assertIssues($phlint->analyze('
      $x = new A();
      A::foo(new B());
    '), [
      '
        Name: $b->fun() in mock:A:5
        Expression `$b->fun()` calls function `B::fun`.
        Function `B::fun` not found.
          Trace #1:
            #1: Method *static function foo(B $b)* specialized for the expression *A::foo(new B())* on line 2.
      ',
    ]);

  }

}
