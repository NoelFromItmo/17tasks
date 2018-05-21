<?php

use \phlint\Test as PhlintTest;

class VariableInitializationTest {

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_test () {
    PhlintTest::assertNoIssues('
      $x = 0;
      $y = $x;
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_uninitialized () {
    PhlintTest::assertIssues('
      $y = $x;
    ', [
      '
        Variable Initialization: $x on line 1
        Variable `$x` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_superglobal () {
    PhlintTest::assertNoIssues('
      $x = $_SERVER;
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_functionArgument () {
    PhlintTest::assertIssues('
      $y = function ($x) {};
      $y($x);
    ', [
      '
        Variable Initialization: $x on line 2
        Variable `$x` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_static () {
    PhlintTest::assertNoIssues('
      static $x = 0;
      $y = $x;
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_foreach () {
    PhlintTest::assertIssues('
      foreach ([$x] as $x) {}
    ', [
      '
        Variable Initialization: $x on line 1
        Variable `$x` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_nestedClosure () {
    PhlintTest::assertIssues('
      $f1 = function ($x) {
        $f2 = function ($y) {
          $z = $x;
        };
      };
    ', [
      '
        Variable Initialization: $x on line 3
        Variable `$x` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_returnParameter () {
    PhlintTest::assertNoIssues('
      $f1 = function ($x) {
        return $x;
      };
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_foreachValue () {
    PhlintTest::assertNoIssues('
      foreach ([1, 2] as $x) {
        $a = $x;
      }
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_foreachKeyValue () {
    PhlintTest::assertNoIssues('
      foreach ([1, 2] as $y => $x) {
        $a = $y;
        $b = $x;
      }
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_closureUseReference () {
    PhlintTest::assertNoIssues('
      $a = [];
      $f1 = function ($x) use (&$a) {
        $y = &$a[$x];
      };
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_nestedClosureUseReference () {
    PhlintTest::assertIssues('
      $f1 = function () {
        $f2 = function () use (&$a) {
          $x = $a;
        };
      };
    ', [
      '
        Variable Initialization: $a on line 2
        Variable `$a` is used but it is not always initialized.
      ',
      '
        Variable Initialization: $a on line 3
        Variable `$a` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_assignReference () {
    PhlintTest::assertIssues('
      $a = [];
      $f1 = function ($x) {
        $y = &$a[$x];
      };
    ', [
      '
        Variable Initialization: $a on line 3
        Variable `$a` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_catch () {
    PhlintTest::assertNoIssues('
      try {
        $x = 1;
      } catch (\Exception $e) {
        $y = $e;
      }
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_outParameter () {
    PhlintTest::assertNoIssues('
      $x = function (/** @out */ &$y) {
        $y = 2;
      };
      $x($z);
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_parameterReference () {
    PhlintTest::assertIssues('
      $x = function (&$y) {
        $y = 2;
      };
      $x($z);
    ', [
      '
        Variable Initialization: $z on line 4
        Variable `$z` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_outParameterReference () {
    PhlintTest::assertNoIssues('
      $x = function ($y1, /** @out */ &$y2) {
        $y1 = 1;
        $y2 = 2;
      };
      $x(5, $z);
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_preg_match () {
    PhlintTest::assertNoIssues('
      preg_match("/a/", "a", $match);
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_preg_match_negative () {
    PhlintTest::assertIssues('
      preg_match("/a/", $content);
    ', [
      '
        Variable Initialization: $content on line 1
        Variable `$content` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_assignCondition () {
    PhlintTest::assertNoIssues('
      function f1 ($x) {
        if ($y = $x)
          return f2($y);
      }
      function f2 ($x2) {}
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_assignConditionWithInvocation () {
    PhlintTest::assertNoIssues('
      $f = function ($x) {
        $f2 = function ($x2) {};
        if ($y = $x)
          return $f2($y);
      };
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_doubleForeach () {
    PhlintTest::assertNoIssues('
      function f () {
        if (rand(0, 1))
          foreach ([1, 2] as $index => $value) {}
        if (rand(0, 1))
          foreach ([1, 2] as $index => $value) {}
      }
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_listAssign () {
    PhlintTest::assertNoIssues('
      function f1 () {
        return ["a", "b"];
      }
      function f2 () {
        list($x1, $x2) = f1();
        $y1 = $x1;
        $y2 = $x2;
      }
    ');
  }

  /**
   * General tests.
   *
   * @test @internal
   */
  static function unittest_classProperty () {
    PhlintTest::assertNoIssues('
      class A {
        protected $i = 0;
        function __construct () {
          $this->i = 2;
        }
      }
    ');
  }

  /**
   * Test conditional initialization.
   *
   * @test @internal
   */
  static function unittest_conditionalInitialization () {
    PhlintTest::assertNoIssues('
      function f () {
        $x = 0;
        if (rand(0, 1))
          $x = 1;
        return $x;
      }
    ');
  }

  /**
   * Test conditional initialization.
   *
   * @test @internal
   */
  static function unittest_branchedInitialization () {
    PhlintTest::assertNoIssues('
      function f () {
        if (rand(0, 1))
          $x = 0;
        else
          $x = 1;
        return $x;
      }
    ');
  }

  /**
   * Test conditional initialization.
   *
   * @test @internal
   */
  static function unittest_conditionalInitializationNegative () {
    PhlintTest::assertIssues('
      function f () {
        if (rand(0, 1))
          $x = 0;
        return $x;
      }
    ', [
      '
        Variable Initialization: $x on line 4
        Variable `$x` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test conditional initialization.
   *
   * @test @internal
   */
  static function unittest_loopInitialization () {
    PhlintTest::assertIssues('
      function f () {
        foreach (array_fill(0, rand(0, 1), 1) as $x)
          $y = $x;
        return $y;
      }
    ', [
      '
        Variable Initialization: $y on line 4
        Variable `$y` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test conditional initialization.
   *
   * @test @internal
   */
  static function unittest_iteratorAggregate () {
    PhlintTest::assertIssues('
      class A implements \IteratorAggregate {
        function getIterator () {
          return new \ArrayIterator([]);
        }
      }
      function x () {
        $a = new A();
        if (!empty($a))
          foreach ($a as $v)
            $b = $v;
        $x = $b;
      }
      x();
    ', [
      '
        Variable Initialization: $b on line 11
        Variable `$b` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test cross-namespace lookup.
   *
   * @test @internal
   */
  static function unittest_crossNamespace () {

    $linter = PhlintTest::create();

    $linter->addSource('
      namespace a;
      function x () {
        $i = 0;
      }
    ');

    $linter->addSource('
      namespace b;
      function x () {
        return $i;
      }
    ');

    PhlintTest::assertIssues($linter->analyze(), [
      '
        Variable Initialization: $i on line 3
        Variable `$i` is used but it is not always initialized.
      '
    ]);

  }

  /**
   * Test that namespace does not create a new context.
   * @test @internal
   */
  static function unittest_namespaceContext () {
    PhlintTest::assertNoIssues('
      namespace a {
        $x = 1;
      }
      namespace b {
        $y = $x;
      }
    ');
  }

  /**
   * That variable initialization for conditional connectives.
   * @test @internal
   */
  static function unittest_conditionalConnectives () {
    PhlintTest::assertIssues('
      function foo () {
        $a = ($b = ZEND_DEBUG_BUILD) && ($c = $b);
        $d = $c;
      }
    ', [
      '
        Variable Initialization: $c on line 3
        Variable `$c` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Regression test for the issue:
   *   Variable *$b* used before initialized on line 2.
   *
   * @test @internal
   */
  static function unittest_parametersInConditions () {
    PhlintTest::assertIssues('
      function foo ($a, $b) {
        if (is_null($a) && is_null($b) && is_null($c)) {}
      }
    ', [
      '
        Variable Initialization: $c on line 2
        Variable `$c` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Regression test for the issue:
   *   Variable *$b* used before initialized on line 3.
   *
   * @test @internal
   */
  static function unittest_outReferenceInCondition () {
    PhlintTest::assertIssues('
      function foo ($a) {
        if ($a && bar($b) && (rand($z, 1) && ($x = 2) && ($y = 3))) {
          if ($b && $y && $z) {}
        }
      }
      function bar (/** @out */ &$r) {
        $r = 2;
        return true;
      }
    ', [
      '
        Variable Initialization: $z on line 2
        Variable `$z` is used but it is not always initialized.
      ',
      '
        Variable Initialization: $z on line 3
        Variable `$z` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test that conditionally defining a variable in switch
   * and using it afterwards produces an appropriate issue.
   *
   * @test @internal
   */
  static function unittest_conditionallyDefineVariableInSwitch () {
    PhlintTest::assertIssues('
      switch (rand(0, 1)) {
        case 0:
          $foo = 1;
      }
      $bar = $foo;
    ', [
      '
        Variable Initialization: $foo on line 5
        Variable `$foo` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Regression test for the issue:
   *   Variable *$foo* used before initialized on line 6.
   *
   * @test @internal
   */
  static function unittest_unconditionallyDefineVariableInSwitch () {
    PhlintTest::assertNoIssues('
      switch (rand(0, 1)) {
        case 0:
        default:
          $foo = 1;
      }
      $bar = $foo;
    ');
  }

  /**
   * Define undefined variable test.
   *
   * Regression test for the issue:
   *   Variable *$foo* used before initialized on line 3.
   *
   * @test @internal
   */
  static function unittest_defineUndefinedVariable () {
    PhlintTest::assertNoIssues('
      if (empty($foo))
        $foo = 1;
      $bar = $foo;
    ');
  }

  /**
   * `static` variables are default initialized to `null`.
   *
   * Regression test for the issues:
   *   Variable *$foo* used before initialized on line 1.
   *   Variable *$foo* used before initialized on line 2.
   *
   * @test @internal
   */
  static function unittest_staticDefaultInitialization () {
    PhlintTest::assertNoIssues('
      static $foo;
      $bar = $foo;
    ');
  }

  /**
   * Test undefined variables in multiple definitions.
   *
   * @test @internal
   */
  static function unittest_multipleDefinitionsUndefinedVariable () {
    PhlintTest::assertIssues('
      function foo () {
        if (rand(0, 1))
          $bar = 1;
        else
          $bar = 2;
      }
      function foo () {
        if (rand(0, 1))
          $baz = $bar;
        $fun = $bar;
      }
    ', [
      '
        Redeclaring: function foo () on line 1
        Declaration for `function foo ()` already found.
        Having multiple declarations is not allowed.
      ',
      '
        Redeclaring: function foo () on line 7
        Declaration for `function foo ()` already found.
        Having multiple declarations is not allowed.
      ',
      '
        Variable Initialization: $bar on line 9
        Variable `$bar` is used but it is not always initialized.
      ',
      '
        Variable Initialization: $bar on line 10
        Variable `$bar` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test simple unset.
   *
   * @test @internal
   */
  static function unittest_simpleUnset () {
    PhlintTest::assertIssues('
      unset($foo);
      $foo = 1;
      unset($foo);
      $bar = $foo;
    ', [
      '
        Variable Initialization: $foo on line 4
        Variable `$foo` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test variable propagation after `if`.
   *
   * @test @internal
   */
  static function unittest_propagationAfterIf () {
    PhlintTest::assertNoIssues('
      class A {}
      function foo ($bar) {
        if ($bar instanceof A)
          return;
        $baz = $bar;
      }
    ');
  }

}
