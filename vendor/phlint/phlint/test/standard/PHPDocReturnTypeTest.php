<?php

use \phlint\Test as PhlintTest;

class PHPDocReturnTypeTest {

  /**
   * Regression test for the issues:
   *   Unable to invoke undefined *B::baz* for the expression *fun()->baz()* on line 10.
   *
   * @test @internal
   */
  static function unittest_fullyQualifiedReturnWithExtendedInterfaceMethod () {
    PhlintTest::assertNoIssues('
      interface A {
        function baz () {}
      }
      interface B extends A {}
      /** @return \B */
      function fun () {
        return new B();
      }
      function foo (B $bar) {
        fun()->baz();
      }
    ');
  }

  /**
   * Test invalid PHPDoc return type.
   *
   * @test @internal
   */
  static function unittest_invalidReturnType () {
    PhlintTest::assertIssues('
      /**
       * @return A;
       */
      function foo () {}
      $bar = foo();
      $bar->baz();
    ', [
      '
        PHPDoc: @return A on line 2
        PHPDoc `@return A;` declared with the type `A;`.
        Type `A;` is not valid.
      ',
    ]);
  }

  /**
   * Test `$this` PHPDoc return type.
   *
   * @test @internal
   */
  static function unittest_thisReturnType () {
    PhlintTest::assertNoIssues('
      class A {
        /**
         * @return $this
         */
        function foo () {
          return $this;
        }
      }
    ');
  }

  /**
   * Test `$this` PHPDoc return type with complex return type.
   *
   * @test @internal
   */
  static function unittest_thisReturnTypeComplex () {
    PhlintTest::assertNoIssues('
      class A {
        /**
         * @return null|$this
         */
        function foo () {
          return ZEND_DEBUG_BUILD ? $this : null;
        }
      }
    ');
  }

  /**
   * Test multi type with void.
   *
   * @test @internal
   */
  static function multiTypeWithVoid () {
    PhlintTest::assertIssues('
      /**
       * @return int|void
       */
      function foo () {}
      foo()->bar();
    ', [
      '
        Name: foo()->bar() on line 5
        Expression `foo()->bar()` calls function `int::bar`.
        Function `int::bar` not found.
      ',
    ]);
  }

}
