<?php

use \phlint\Test as PhlintTest;

class TemplateSpecializationSanityTest {

  /**
   * Test a case where a potential context condition is jumped over by
   * specializing a function that is after it in the code.
   *
   * @test @internal
   */
  static function unittest_specializeFollowingFunctionWithContextLookback () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {}
      class A {
        function __construct (B $b) {
          $b->baz(1);
        }
      }
      if (foo("a") && ZEND_DEBUG_BUILD) {}
      class B {
        function baz ($name) {
          return $this->fun($name);
        }
        function fun ($name) {
          return $name;
        }
      }
    ');
  }

  /**
   * Test that passed-by-value parameter mutation is not propagated back
   * and tried to be displayed in the trace which would cause internal issues.
   *
   * @test @internal
   */
  static function unittest_parameterPassByValueMutation () {
    PhlintTest::assertIssues('
      class A {
        static function foo ($bar = [], $baz) {
          $bar[] = null;
          $bar[] = new A();
          A::fun($baz);
        }
        static function fun ($val) {
          return $val + 1;
        }
      }
      A::foo([], "a");
    ', [
      '
        Operand Compatibility: $val on line 8
        Variable `$val` is always or sometimes of type `string`.
        Expression `$val + 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Method *static function fun("a" $val)*
              specialized for the expression *A::fun($baz)* on line 5.
            #2: Method *static function foo(mixed[int|string] $bar, "a" $baz)*
              specialized for the expression *A::foo([], "a")* on line 11.
      ',
    ]);
  }

}
