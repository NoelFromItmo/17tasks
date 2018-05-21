<?php

use \phlint\autoload\Composer;
use \phlint\Test as PhlintTest;

class ComposerTest {

  /**
   * Test forward reference autoloading.
   *
   * @test @internal
   */
  static function unittest_forwardReference () {

    if (!is_dir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R'))
      mkdir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R');

    if (!is_dir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor'))
      mkdir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor');

    if (!is_dir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor/composer'))
      mkdir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor/composer');

    file_put_contents(
      sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor/composer/autoload_files.php',
      '<?php return ' . var_export([sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/A.php'], true) . ';'
    );

    file_put_contents(
      sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor/composer/autoload_classmap.php',
      '<?php return ' . var_export(['C' => sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/C.php'], true) . ';'
    );

    file_put_contents(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/A.php', '<?php
      class A {
        function b () {
          return C::d();
        }
      }
    ');

    file_put_contents(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/C.php', '<?php
      class C {
        function d () {
          return 2;
        }
      }
    ');

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/composer.json');

    PhlintTest::assertNoIssues($linter->analyze('
      $x = A::b();
    '));

  }

  /**
   * Test that arbitrary `include` does not break the analyzer.
   * @test @internal
   */
  static function unittest_arbitraryInclude () {

    if (!is_dir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R'))
      mkdir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R');

    if (!is_dir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor'))
      mkdir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor');

    if (!is_dir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor/composer'))
      mkdir(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor/composer');

    file_put_contents(
      sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/vendor/composer/autoload_files.php',
      '<?php return ' . var_export([sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/A.php'], true) . ';'
    );

    file_put_contents(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/A.php', '<?php
      class A {
        function b () {
          return 1;
        }
        function x ($path) {
          include $path;
        }
      }
    ');

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/gKBRfZR1ujwAATDRMFLrQU6R/composer.json');

    PhlintTest::assertNoIssues($linter->analyze('
      $x = A::b();
    '));

  }

  /**
   * Test file include that depends on a class.
   * @test @internal
   */
  static function unittest_indirectFunctionClassDependecy () {

    if (!is_dir(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG'))
      mkdir(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG');

    if (!is_dir(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/vendor'))
      mkdir(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/vendor');

    if (!is_dir(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/vendor/composer'))
      mkdir(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/vendor/composer');

    file_put_contents(
      sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/vendor/composer/autoload_files.php',
      '<?php return ' . var_export([sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/functions.php'], true) . ';'
    );

    file_put_contents(
      sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/vendor/composer/autoload_classmap.php',
      '<?php return ' . var_export(['A\B\C' => sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/C.php'], true) . ';'
    );

    file_put_contents(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/functions.php', '<?php
      use A\B;
      use A\B\C;
      function foo($x) {
        B\C::bar($x);
        C::bar($x);
      }
    ');

    file_put_contents(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/C.php', '<?php
      namespace A\B {
        class C {
          function bar ($x) {}
        }
      }
    ');

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/hUY29ImLj8C9d4F5luMDfHSG/composer.json');

    PhlintTest::assertNoIssues($linter->analyze('
      foo(rand(0, 1));
    '));

  }

  /**
   * Test file include that depends on a class.
   * @test @internal
   */
  static function unittest_psr4IndirectFunctionClassDependecy () {

    if (!is_dir(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH'))
      mkdir(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH');

    if (!is_dir(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH/vendor'))
      mkdir(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH/vendor');

    if (!is_dir(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH/vendor/composer'))
      mkdir(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH/vendor/composer');

    file_put_contents(
      sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH/vendor/composer/autoload_psr4.php',
      '<?php return ' . var_export(['A\B' => [sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH']], true) . ';'
    );

    file_put_contents(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH/C.php', '<?php
      namespace A\B {
        class C {
          function bar ($x) {}
        }
      }
    ');

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/zWa1lRFC1Uwgunf7fyIAMBsH/composer.json');

    PhlintTest::assertNoIssues($linter->analyze('
      namespace A\A;
      use \A\B\C;
      $x = new C();
    '));

  }

  /**
   * Test autoloading class extends.
   * @test @internal
   */
  static function unittest_autoloadExtends () {

    if (!is_dir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy'))
      mkdir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy');

    if (!is_dir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/vendor'))
      mkdir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/vendor');

    if (!is_dir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/vendor/composer'))
      mkdir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/vendor/composer');

    if (!is_dir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/A'))
      mkdir(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/A');

    file_put_contents(
      sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/vendor/composer/autoload_psr4.php',
      '<?php return ' . var_export(['A' => [sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/A']], true) . ';'
    );

    file_put_contents(
      sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/vendor/composer/autoload_namespaces.php',
      '<?php return ' . var_export(['C' => [sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy']], true) . ';'
    );

    file_put_contents(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/A/B.php', '<?php
      namespace A;
      class B extends \C {}
    ');

    file_put_contents(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/C.php', '<?php
      class C {
        function foo () {}
      }
    ');

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/lDwvZhJ3j9hIAkBl3qwY7wYy/composer.json');

    PhlintTest::assertIssues($linter->analyze('
      namespace D;
      use \A\B;
      class E {
        function baz (B $b) {
          $b->foo();
          $b->bar();
        }
      }
    '), [
      '
        Name: $b->bar() on line 6
        Expression `$b->bar()` calls function `A\B::bar`.
        Function `A\B::bar` not found.
      ',
    ]);

  }

  /**
   * Test autoloading by fully qualified class name.
   * @test @internal
   */
  static function unittest_autoloadFullyQualified () {

    PhlintTest::mockFilesystem(sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/', [
      '/vendor/composer/autoload_classmap.php' =>
        '<?php return ' . var_export([
          'A_B' => sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/vendor/foo/bar/A/B.php',
        ], true) . ';',
      '/vendor/foo/bar/A/B.php' => '<?php
        class A_B {
          function foo () {}
        }
      ',
    ]);

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/composer.json');

    PhlintTest::assertIssues($linter->analyze('
      namespace C;
      class D {
        function bar () {
        $bar = new \A_B();
        $bar->foo();
        $bar->baz();
        }
      }
    '), [
      '
        Name: $bar->baz() on line 6
        Expression `$bar->baz()` calls function `A_B::baz`.
        Function `A_B::baz` not found.
      ',
    ]);

  }

  /**
   * Regression test for the issue:
   *   Unable to invoke undefined *Z\X\C\D* for the expression *new C\D()* on line 5.
   *
   * @test @internal
   */

  static function unittest_autoloadRelativeClassPath () {

    PhlintTest::mockFilesystem(sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/', [
      '/vendor/composer/autoload_psr4.php' =>
        '<?php return ' . var_export([
          'A' => [sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/vendor/company/project/A'],
        ], true) . ';',
      '/vendor/company/project/A/B/D.php' => '<?php
        namespace A\B;
        class D {
          function foo () {}
        }
      ',
    ]);

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/nmlkTjEJbQcZF3Sc6KYUCla3/composer.json');

    PhlintTest::assertIssues($linter->analyze('
      namespace Z\X;
      use \A\B as C;
      class Y {
        function baz () {
          $obj = new C\D();
          $obj->foo();
          $obj->bar();
        }
      }
    '), [
      '
        Name: $obj->bar() on line 7
        Expression `$obj->bar()` calls function `A\B\D::bar`.
        Function `A\B\D::bar` not found.
      ',
    ]);

  }

  /**
   * Regression test for the issue:
   *   Having multiple definitions for *Foo* is prohibited on line 1.
   *
   * @test @internal
   */
  static function unittest_standardLibraryDefinitionsCacheHygiene () {

    PhlintTest::mockFilesystem(sys_get_temp_dir() . '/paieuiirnig4efuaxzi3vwhe/', [
      '/vendor/composer/autoload_files.php' =>
        '<?php return ' . var_export([
          sys_get_temp_dir() . '/paieuiirnig4efuaxzi3vwhe/vendor/company/project/A.php',
        ], true) . ';',
      '/vendor/company/project/A.php' => '<?php
        class Foo {}
      ',
    ]);

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/paieuiirnig4efuaxzi3vwhe/composer.json');

    PhlintTest::assertNoIssues($linter->analyze('
      $foo = new Foo();
    '));

    PhlintTest::assertNoIssues('
      class Foo {}
    ');

  }

  /**
   * Regression test for the issue:
   *   Having multiple definitions for *Foo* is prohibited in *project/A.php:2*.
   *
   * @test @internal
   */
  static function unittest_composerAutoloadInAnalysisScope () {

    PhlintTest::mockFilesystem(sys_get_temp_dir() . '/a16jkyjmv5vpg2vxtgwl2cou/', [
      '/vendor/composer/autoload_files.php' =>
        '<?php return ' . var_export([
          sys_get_temp_dir() . '/a16jkyjmv5vpg2vxtgwl2cou/project/A.php',
        ], true) . ';',
      '/project/A.php' => '<?php
        class Foo {}
      ',
    ]);

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/a16jkyjmv5vpg2vxtgwl2cou/composer.json');

    $linter->addPath(sys_get_temp_dir() . '/a16jkyjmv5vpg2vxtgwl2cou/');

    PhlintTest::assertNoIssues($linter->analyze('
      $foo = new Foo();
    '));

  }

}
