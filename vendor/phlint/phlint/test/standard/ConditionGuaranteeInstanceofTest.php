<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeInstanceofTest {

  /**
   * Test condition guarantee in conjunction with reachability of
   * extended class.
   *
   * @test @internal
   */
  static function unittest_extendedClass () {
    PhlintTest::assertIssues('
      class A {}
      class B extends A {}
      $foo = new B();
      if ($foo instanceof A)
        $foo->bar();
    ', [
      '
        Name: $foo->bar() on line 5
        Expression `$foo->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
    ]);
  }

  /**
   * Test condition guarantee propagation after the barrier.
   *
   * @test @internal
   */
  static function unittest_barrierPropagation () {
    PhlintTest::assertIssues('
      class A {}
      function foo ($bar) {
        if (!($bar instanceof A))
          return;
        $bar->baz();
      }
    ', [
      '
        Name: $bar->baz() on line 5
        Expression `$bar->baz()` calls function `A::baz`.
        Function `A::baz` not found.
      ',
    ]);
  }

}
