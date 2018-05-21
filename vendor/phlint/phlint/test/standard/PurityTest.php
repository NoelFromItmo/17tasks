<?php

use \phlint\Test as PhlintTest;

class PurityTest {

  /**
   * Test enforcement of purity on global access with specialization.
   *
   * @test @internal
   */
  static function unittest_globalAccessWithSpecialization () {
    PhlintTest::assertNoIssues('
      function foo () {
        bar();
      }
      function bar () {
        $x = $GLOBALS["x"];
        static $i = 0;
      }
    ');
  }

  /**
   * Test enforcement of purity with specialization.
   *
   * @test @internal
   */
  static function unittest_specialization () {
    PhlintTest::assertNoIssues('
      /** @pure */
      function foo () {
        return bar();
      }
      function bar () {
        return 2;
      }
    ');
  }

  /**
   * Test enforcement of purity with static access.
   *
   * @test @internal
   */
  static function unittest_static () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo () {
        static $i = 0;
      }
      foo();
    ', [
      '
        Isolated Attribute: static $i on line 3
        Function `@pure function foo ()` has been marked as isolated.
        Declaring static variable `static $i` breaks that isolation.
      ',
    ]);
  }

  /**
   * Test enforcement of purity with special constants.
   *
   * @test @internal
   */
  static function unittest_specialConstants () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo () {
        return __dir__ . __file__ . __line__;
      }
    ', [
      '
        Isolated Attribute: __DIR__ on line 3
        Function `@pure function foo ()` has been marked as isolated.
        Using magic constant `__DIR__` breaks that isolation.
      ', '
        Isolated Attribute: __FILE__ on line 3
        Function `@pure function foo ()` has been marked as isolated.
        Using magic constant `__FILE__` breaks that isolation.
      ', '
        Isolated Attribute: __LINE__ on line 3
        Function `@pure function foo ()` has been marked as isolated.
        Using magic constant `__LINE__` breaks that isolation.
      ',
    ]);
  }

  /**
   * Test enforcement of purity with static mutable.
   *
   * @test @internal
   */
  static function unittest_staticMutable () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo () {
        static $i = 0;
        $i += 1;
        return $i;
      }
    ', [
      '
        Isolated Attribute: static $i on line 3
        Function `@pure function foo ()` has been marked as isolated.
        Declaring static variable `static $i` breaks that isolation.
      ',
    ]);
  }

  /**
   * Test enforcement of purity on global access with double specialization.
   *
   * @test @internal
   */
  static function unittest_globalWithDoubleSpecialization () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo () {
        bar();
      }
      function bar () {
        baz();
      }
      function baz () {
        $x = $GLOBALS["x"];
      }
    ', [
      '
        Isolated Attribute: $GLOBALS on line 9
        Function `@isolated function baz ()` has been marked as isolated.
        Accessing superglobal variable `$GLOBALS` breaks that isolation.
          Trace #1:
            #1: Function *@isolated function baz ()* specialized for the expression *baz()* on line 6.
            #2: Function *@isolated function bar ()* specialized for the expression *bar()* on line 3.
      ',
    ]);
  }

  /**
   * Test enforcement of purity with static class variable.
   *
   * @test @internal
   */
  static function unittest_staticClassVariable () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo () {
        return A::$i + 1;
      }
      class A {
        static $i = 0;
      }
    ', [
      '
        Isolated Attribute: A::$i on line 3
        Function `@pure function foo ()` has been marked as isolated.
        Accessing `A::$i` breaks that isolation.
      ',
    ]);
  }

  /**
   * Test enforcement of purity with setlocale and closure.
   *
   * @test @internal
   */
  static function unittest_setlocaleAndClosure () {
    PhlintTest::assertIssues('
      /** @pure */
      function foo () {
        setlocale(LC_ALL, "en_GB");
        $x = [5, 3, 1, 2, 4];
        usort($x, function ($a, $b) {
          return $a - $b;
        });
        return substr(implode("", $x), 2, 2);
      }
    ', [
      '
        Isolated Attribute: @__isolationBreach(\'Modifies global state.\')
        Function `@isolated function setlocale (0 $category, "en_GB" $locale, string ...$__variadic) : string`
          has been specialized as isolated.
        Its internal functionality however breaks that isolation because it modifies global state.
          Trace #1:
            #1: Function *@isolated function setlocale (0 $category, "en_GB" $locale, string ...$__variadic) : string*
              specialized for the expression *setlocale(LC_ALL, "en_GB")* on line 3.
      ',
    ]);
  }

}
