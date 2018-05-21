<?php

use \phlint\Test as PhlintTest;

class EvaluateAssertsTest {

  /**
   * Test parameter assertions.
   * @test @internal
   */
  static function unittest_parametersAssertations () {
    PhlintTest::assertIssues('
      function foo ($a, $b) {
        assert(is_numeric($a));
        assert(is_numeric($b));
      }
      foo(1, "a");
    ', [
      '
        Assert Construct: assert(is_numeric($b)) on line 3
        Assertion expression `assert(is_numeric($b))` is not always true.
        Assertions must always be true.
          Trace #1:
            #1: Function *function foo (1 $a, "a" $b)* specialized for the expression *foo(1, "a")* on line 5.
      ',
    ]);
  }

  /**
   * Test `class_exists` argument type.
   * @test @internal
   */
  static function unittest_classExistsAssertationsArgumentType () {
    PhlintTest::assertIssues('
      assert(class_exists("class_that_does_not_exist"));
      assert(!class_exists("class_that_does_not_exist"));
    ', [
      '
        Assert Construct: assert(class_exists("class_that_does_not_exist")) on line 1
        Assertion expression `assert(class_exists("class_that_does_not_exist"))` is not always true.
        Assertions must always be true.
      ',
    ]);
  }

  /**
   * Test `class_exists` assertions.
   * @test @internal
   */
  static function unittest_classExistsAssertations () {
    PhlintTest::assertIssues('
      namespace A {
        class B {}
      }
      namespace C {
        use \A\B as Y;
        assert(class_exists(X::class));
        assert(class_exists(Y::class));
      }
    ', [
      '
        Assert Construct: assert(class_exists(X::class)) on line 6
        Assertion expression `assert(class_exists(X::class))` is not always true.
        Assertions must always be true.
      ',
    ]);
  }

  /**
   * Test `class_exists` assertions in combination with
   * value based template specialization.
   * @test @internal
   */
  static function unittest_classExistsAssertationsWithValueSpecialization () {
    PhlintTest::assertIssues('
      namespace A {
        class B {}
      }
      namespace C {
        class D {
          function foo ($bar) {
            assert(class_exists($bar));
          }
        }
      }
      namespace {
        use \A\B;
        \C\D::foo(B::class);
        \C\D::foo(E::class);
      }
    ', [
      '
        Assert Construct: assert(class_exists($bar)) on line 7
        Assertion expression `assert(class_exists($bar))` is not always true.
        Assertions must always be true.
          Trace #1:
            #1: Method *function foo(\'E\' $bar)* specialized for the expression *\C\D::foo(E::class)* on line 14.
      ',
    ]);
  }

}
