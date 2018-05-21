<?php

use \phlint\Test as PhlintTest;

class ExecutionBranchEffectTest {

  /**
   * Test conditional guarantees barrier.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteesBarrier () {
    PhlintTest::assertNoIssues('
      function f () {
        $list = isset($undefinedVariable) ? [1, 2] : [];
        foreach ($list as $listItem)
          $result = $listItem;
        if (empty($result))
          throw new \Exception("No result");
        return $result;
      }
    ');
  }

  /**
   * Test conditional guarantees barrier with array fetch.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteesBarrierWithArrayFetch () {
    PhlintTest::assertNoIssues('
      function f () {
        $list = isset($undefinedVariable) ? [1, 2] : [];
        foreach ($list as $listItem)
          $result = $listItem;
        if (empty($result["x"]))
          throw new \Exception("No result");
        return $result["y"];
      }
    ');
  }

  /**
   * Test conditional guarantees barrier with negative isset.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteesBarrierWithNegativeIsset () {
    PhlintTest::assertNoIssues('
      function f () {
        $list = isset($undefinedVariable) ? [1, 2] : [];
        foreach ($list as $listItem)
          $result = $listItem;
        if (!isset($result))
          throw new \Exception("No result");
        return $result;
      }
    ');
  }

  /**
   * Test conditional guarantees barrier with negative isset array fetch.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteesBarrierWithNegativeIssetArrayFetch () {
    PhlintTest::assertNoIssues('
      function f () {
        $list = isset($undefinedVariable) ? [1, 2] : [];
        foreach ($list as $listItem)
          $result = $listItem;
        if (!isset($result["x"]))
          throw new \Exception("No result");
        return $result["y"];
      }
    ');
  }

  /**
   * Regression test for the issues:
   *   Unable to invoke undefined *null::foo* for the expression *$a->foo()* on line 12.
   *   Unable to invoke undefined *null::bar* for the expression *$a->bar()* on line 13.
   *
   * @test @internal
   */
  static function unittest_valueBarrier () {
    PhlintTest::assertIssues('
      class A {
        static function create () {
          return rand(0, 1) ? new A() : null;
        }
        function foo () {}
      }
      $a = A::create();
      $a->foo();
      $a->bar();
      if (!$a)
        throw new Exception("No A!");
      $a->foo();
      $a->bar();
    ', [
      '
        Name: $a->foo() on line 8
        Expression `$a->foo()` calls function `null::foo`.
        Function `null::foo` not found.
      ',
      '
        Name: $a->bar() on line 9
        Expression `$a->bar()` calls function `null::bar`.
        Function `null::bar` not found.
      ',
      '
        Name: $a->bar() on line 9
        Expression `$a->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
      '
        Name: $a->bar() on line 13
        Expression `$a->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
    ]);
  }

  /**
   * Regression test for the issues:
   *   Unable to invoke undefined *null::baz* for the expression *$foo->baz()* on line 10.
   *   Unable to invoke undefined *null::fun* for the expression *$foo->fun()* on line 11.
   *
   * @test @internal
   */
  static function unittest_deterministicType () {
    PhlintTest::assertIssues('
      class A {
        function baz () {}
      }
      function bar () {
        return new A();
      }
      $foo = rand(0, 1) ? bar() : null;
      if (!$foo)
        $foo = bar();
      $foo->baz();
      $foo->fun();
    ', [
      '
        Name: $foo->fun() on line 11
        Expression `$foo->fun()` calls function `A::fun`.
        Function `A::fun` not found.
      ',
    ]);
  }

  /**
   * Regression test for various implementation issues.
   *
   * @test @internal
   */
  static function unittest_instaceofVariable () {
    PhlintTest::assertNoIssues('
      $foo = null;
      $bar = "";
      if ($foo instanceof $bar) {}
    ');
  }

}
