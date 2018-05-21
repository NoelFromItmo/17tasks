<?php

use \phlint\autoload\Composer;
use \phlint\Test as PhlintTest;
use \phlint\autoload\Mock as MockAutoload;

class AutoloadMinimumTest {

  /**
   * Test that only a minimum set of library classes are loaded.
   * This is done for optimization purposes only.
   *
   * @test @internal
   */
  static function unittest_autoloadMinimum () {

    PhlintTest::mockFilesystem(sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/', [
      '/vendor/composer/autoload_psr4.php' =>
        '<?php return ' . var_export([
          'A' => [sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/vendor/company/project/A'],
        ], true) . ';',
      '/vendor/company/project/A/B/D.php' => '<?php
        namespace A\B;
        class D extends E {
        }
      ',
      '/vendor/company/project/A/B/E.php' => '<?php
        namespace A\B;
        class E extends F {
          function foo () {}
        }
      ',
      '/vendor/company/project/A/B/F.php' => '<?php
        namespace A\B;
        class F {}
        -<Syntax error!>-
        This file should never be loaded and this syntax error should never be reported.
      ',
    ]);

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/composer.json');

    PhlintTest::assertIssues($linter->analyze('
      namespace X;
      use \A\B as C;
      $baz = new C\D();
      $baz->foo();
    '), [
    ]);

  }

  /**
   * Test minimum auto-loading on return types from library code.
   *
   * @test @internal
   */
  static function unittest_AutoloadMinimumOnKnownReturnType () {

    $linter = PhlintTest::create();

    $linter[] = new MockAutoload([
      'BrokenLibrary' => '
        class BrokenLibrary {}
        -<Syntax error!>-
        This file should never be loaded and this syntax error should never be reported.
      ',
      'A' => '
        class A {
          /**
           * @return BrokenLibrary
           */
          static function foo () {
            return new BrokenLibrary();
          }
        }
      ',
      'B' => '
        class B {
          static function foo () : BrokenLibrary {
            return new BrokenLibrary();
          }
        }
      ',
    ]);

    PhlintTest::assertNoIssues($linter->analyze('
      $bar = A::foo();
      $baz = B::foo();
    '));

  }

  /**
   * Test that no attempt is made to infer return types which would lead
   * to unnecessary loading of additional code for library functions
   * which return is not used.
   *
   * @test @internal
   */
  static function unittest_AutoloadMinimumOnUnusedReturnTypes () {
    // @todo: Implement and enable.
    return;
    $linter = PhlintTest::create();

    $linter[] = new MockAutoload([
      'BrokenLibrary' => '
        class BrokenLibrary {}
        -<Syntax error!>- ¯\_(ツ)_/¯
        This file should never be loaded and this syntax error should never be reported.
      ',
      'A' => '
        class A {
          static function foo (string $bar) {
            new BrokenLibrary();
          }
        }
      ',
      'B' => '
        class B {
          /**
           * @param string $bar
           */
          static function foo ($bar) {
            new BrokenLibrary();
          }
        }
      ',
    ]);

    PhlintTest::assertNoIssues($linter->analyze('
      A::foo();
      B::foo();
    '));

  }

}
