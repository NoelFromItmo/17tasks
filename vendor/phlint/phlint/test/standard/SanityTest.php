<?php

use \phlint\autoload\Composer;
use \phlint\Test as PhlintTest;

/**
 * Sanity test of some edge case situations to make sure
 * they don't cause troubles.
 */
class SanityTest {

  /**
   * Test no crash on syntax error.
   *
   * @test @internal
   */
  static function unittest_syntaxError () {
    PhlintTest::assertIssues('
      function f () {
        $x =
      }
    ', [
      '
        Source Syntax
        Parse error: Syntax error, unexpected \'}\' on line 3.
      ',
    ]);
  }

  /**
   * Test no crash on arbitrary constructs.
   *
   * @test @internal
   */
  static function unittest_arbitraryConstructNoCrash () {
    PhlintTest::assertNoIssues('

      function f () {
        if (rand(0, 1))
          $x = 0;
        else
          $o = function () {};
      }

      function f2 () {}

      class C {
        function m () {}
      }

      interface I {
        function f ();
      }

    ');
  }

  /**
   * Test that code doesn't break on empty `list` item.
   * @see http://www.php.net/manual/en/function.list.p
   * @test @internal
   */
  static function unittest_emptyListVariable () {
    PhlintTest::assertNoIssues('
      list(, $foo) = explode(" ", "Hello world");
    ');
  }

  /**
   * Test that code doesn't break on empty `return`.
   * @see http://php.net/manual/en/function.return.php
   * @test @internal
   */
  static function unittest_emptyReturn () {
    PhlintTest::assertNoIssues('
      function foo () {
        return;
      }
    ');
  }

  /**
   * Test that code doesn't break on empty ternary operator condition.
   * @see http://ie1.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
   * @test @internal
   */
  static function unittest_emptyTernaryCondition () {
    PhlintTest::assertNoIssues('
      function foo () {
        $x = true ?: false;
      }
    ');
  }

  /**
   * Test that repeating traces do not hang or take unreasonable amount of time.
   *
   * @test @internal
   */
  static function unittest_repeatingTraceNoHang () {
    PhlintTest::create()->analyze('
      function foo ($a, $b) {
        foo("a");
        foo("b");
        foo($a, "a");
        foo($a, "b");
        return $a + $b + 1;
      }
    ');
  }

  /**
   * Test that inference does not happen multiple times causing impossible scenarios.
   *
   * Regression test for the issue:
   *   Provided argument *$bar* of type *array* is not compatible in the expression *is_array($bar)* on line 4.
   *
   * @test @internal
   */
  static function unittest_multiInferenceProtectionTest () {

    $linter = PhlintTest::create();

    $linter->addSource('
      class A {}
    ');

    PhlintTest::assertNoIssues($linter->analyze('
      function foo () {
        $bar = "";
        if (!empty($bar))
          $bar = is_array($bar) ? array_fill(0, 1) : "";
      }
    '));

  }

  /**
   * Sanity test for anonymous classes.
   *
   * @test @internal
   */
  static function unittest_anonymousClasses () {
    PhlintTest::assertIssues('
      function foo ($bar) {
        return new class ($bar) {};
      }
      foo(0);
      foo("");
    ', [
    ]);
  }

  /**
   * Nested arguments with call to the same function.
   *
   * @test @internal
   */
  static function unittest_sameFunctionCallNestedArugments () {
    PhlintTest::assertNoIssues('
      function foo () {}
      foo(foo(foo()));
    ');
  }

  /**
   * Test function call as parameter default in library code.
   * Even though it's not allowed in PHP it's used that way in
   * manual and in stubs.
   *
   * @test @internal
   */
  static function unittest_libraryFunctionCallAsParameterDefault () {

    PhlintTest::mockFilesystem(sys_get_temp_dir() . '/ghzljyjj9sqigqkjvoh2wvqbyxdq/', [
      '/vendor/composer/autoload_files.php' =>
        '<?php return ' . var_export([
          sys_get_temp_dir() . '/ghzljyjj9sqigqkjvoh2wvqbyxdq/vendor/company/project/bootstrap.php',
        ], true) . ';',
      '/vendor/company/project/bootstrap.php' => '<?php
        function foo ($bar = baz("!")) {}
        function baz () {}
      ',
    ]);

    $linter = PhlintTest::create();

    $linter[] = new Composer(sys_get_temp_dir() . '/ghzljyjj9sqigqkjvoh2wvqbyxdq/composer.json');

    PhlintTest::assertNoIssues($linter->analyze('
      foo();
    '));

  }

  /**
   * Test returning an array with a specific key from a library.
   *
   * @test @internal
   */
  static function unittest_returnArrayWithSpecificKeyFromLibrary () {
    $linter = PhlintTest::create();
    $linter->addSource('
      function foo ($bar) {
        return [
          $bar => 0,
        ];
      }
    ', true);
    PhlintTest::assertNoIssues($linter->analyze('foo("baz");'));
  }

  /**
   * Test complex default value.
   *
   * @test @internal
   */
  static function unittest_complexDefaultValue () {
    PhlintTest::assertNoIssues('
      const BAZ = 1;
      function foo ($bar = [BAZ, 2]) {}
    ');
  }

  /**
   * Test closure array mutation.
   *
   * @test @internal
   */
  static function unittest_closureArrayMutation () {
    PhlintTest::assertNoIssues('
      $foo = function ($bar) {
        $baz = [];
        $baz[] = $bar;
        return $baz;
      };
      $foo(1);
    ');
  }

  /**
   * Test magic call method with specialization.
   *
   * @test @internal
   */
  static function magicCallMethodWithSpecialization () {
    PhlintTest::assertNoIssues('
      class A {
        function __call ($name, $arguments) {
          return 3;
        }
      }
      $a = new A();
      $bar = $a->foo(1, 2);
      $baz = $bar + 1;
    ');
  }

}
