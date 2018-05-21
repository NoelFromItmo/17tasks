<?php

use \phlint\Test as PhlintTest;

class ConstraintTest {

  /**
   * Test constraint attribute.
   * @test @internal
   */
  static function unittest_constraintAttribute () {
    PhlintTest::assertIssues('
      $i = 0;
      /**
       * @constraint(is_numeric($a))
       * @constraint(is_numeric($c))
       */
      function foo ($a, /** @constraint(is_numeric($b)) */ $b, $c) {
        return $a + $b + $c;
      }
      foo(1, 2, 3);
      foo("a", "b", "c");
    ', [
      '
        Constraint Attribute: foo("a", "b", "c") on line 10
        Function `function foo ($a, $b, $c)` has the constraint `@constraint(is_numeric($a))` on line 3.
        That constraint is failing for the expression `foo("a", "b", "c")` on line 10.
      ',
      '
        Constraint Attribute: foo("a", "b", "c") on line 10
        Function `function foo ($a, $b, $c)` has the constraint `@constraint(is_numeric($c))` on line 4.
        That constraint is failing for the expression `foo("a", "b", "c")` on line 10.
      ',
      '
        Constraint Attribute: foo("a", "b", "c") on line 10
        Function `function foo ($a, $b, $c)` has the constraint `@constraint(is_numeric($b))` on line 6.
        That constraint is failing for the expression `foo("a", "b", "c")` on line 10.
      ',
    ]);
  }

  /**
   * Regression test for fully qualified symbol object constraint.
   *
   * Regression test for the issue:
   *   Constraint *@param object $object* failed for the function *get_class(a\B $object) : string*.
   *     Trace #1: Function *get_class(a\B $object) : string*
   *       specialized for the expression *get_class(new \a\B())* on line 3.
   *
   * @test @internal
   */
  static function unittest_fullyQualifiedSymbolObjectConstraint () {
    PhlintTest::assertNoIssues('
      namespace a {
        class B {}
        get_class(new \a\B());
      }
    ');
  }

}
