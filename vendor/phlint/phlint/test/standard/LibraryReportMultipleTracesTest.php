<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

/**
 * These tests deal with how library issues are reported.
 * Some issues occur because of the way library is being used while some issues
 * occur because the library itself has issues. In general we want to report
 * the former but not the latter.
 */
class LibraryReportMultipleTracesTest {

  /**
   * Test that a trace does not originate in a library.
   *
   * @test @internal
   */
  static function traceDoesNotOriginateInALibrary () {

    $phlint = PhlintTest::create();

    $phlint[] = new MockAutoload([
      'A' => '
        class A {
          static function foo ($bar) {
            return $bar + 1;
          }
        }
      ',
      'B' => '
        class B {
          static function baz () {
            A::foo(false);
          }
        }
      ',
    ]);

    PhlintTest::assertIssues($phlint->analyze('
      A::fun();
      B::fun();
    '), [
      '
        Name: A::fun() on line 1
        Expression `A::fun()` calls function `A::fun`.
        Function `A::fun` not found.
      ',
      '
        Name: B::fun() on line 2
        Expression `B::fun()` calls function `B::fun`.
        Function `B::fun` not found.
      ',
    ]);

  }

  /**
   * Test that a trace does not originate in a library specialization.
   *
   * @test @internal
   */
  static function traceDoesNotOriginateInALibrarySpecialization () {

    $phlint = PhlintTest::create();

    $phlint[] = new MockAutoload([
      'A' => '
        class A {
          static function foo ($bar) {
            return $bar + 1;
          }
        }
      ',
      'B' => '
        class B {
          static function baz ($fun) {
            A::foo(false);
          }
        }
      ',
    ]);

    PhlintTest::assertNoIssues($phlint->analyze('
      B::baz(null);
    '));

  }

  /**
   * Test that a specialized trace does not originate in a library specialization.
   *
   * In this test the `$bazValue` will be either `""` or `false` and the
   * calling application code cannot influence that which makes that a
   * library issues. On the other hand that can only be inferred by
   * specializing `baz` and we want to make sure that such library issues
   * are treated accordingly even when a trace inspection is required.
   *
   * @test @internal
   */
  static function specializedTraceDoesNotOriginateInALibrarySpecialization () {

    $phlint = PhlintTest::create();

    $phlint[] = new MockAutoload([
      'A' => '
        class A {
          function foo($fooParam) {
            $bazValue = self::baz($fooParam);
            self::bar($bazValue);
          }
          function bar ($barParam = null) {
            $barParam->fun();
          }
          function baz ($bazParam) {
            return ZEND_DEBUG_BUILD ? "" : false;
          }
        }
      ',
    ]);

    PhlintTest::assertIssues($phlint->analyze('
      $string = A::foo("");
    '), [

    ]);

  }

  /**
   * Test that a combination of traces (one which originates in a library
   * specialization and one that does not) get considered independently.
   *
   * @test @internal
   */
  static function tracesWithMixedOrigin () {

    $phlint = PhlintTest::create();

    $phlint[] = new MockAutoload([
      'A' => '
        class A {
          static function foo ($bar) {
            return $bar + 1;
          }
        }
      ',
      'B' => '
        class B {
          static function baz ($fun) {
            A::foo($fun === 1);
          }
        }
      ',
      'C' => '
        class C {
          static function baz ($fun) {
            A::foo(false);
          }
        }
      ',
    ]);

    PhlintTest::assertIssues($phlint->analyze('
      B::baz(null);
    '), [
      '
        Operand Compatibility: $bar in mock:A:3
        Variable `$bar` is always or sometimes of type `bool`.
        Expression `$bar + 1` may cause undesired or unexpected behavior with `bool` operands.
          Trace #1:
            #1: Method *static function foo(false $bar)*
              specialized for the expression *A::foo($fun === 1)* in *mock:B:3*.
            #2: Method *static function baz(null $fun)*
              specialized for the expression *B::baz(null)* on line 1.
      ',
    ]);

  }

}
