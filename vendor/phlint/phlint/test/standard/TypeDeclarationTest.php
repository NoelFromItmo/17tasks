<?php

use \phlint\Test as PhlintTest;

class TypeDeclarationTest {

  /**
   * Referencing a type that does not exist.
   * @test @internal
   */
  static function unittest_test () {
    PhlintTest::assertIssues('
      function foo (integer $i) : resource {}
      foo();
    ', [
      '
        Declaration Type: function foo (integer $i) : resource on line 1
        Type `resource` is undefined.
      ',
      '
        Declaration Type: function foo (integer $i) : resource on line 1
        Type `integer` is undefined.
      ',
    ]);
  }

  /**
   * Test boolean full name in type declaration.
   * @test @internal
   */
  static function unittest_booleanFullName () {
    PhlintTest::assertIssues('
      function foo (boolean $i) {}
      function bar () : boolean {}
    ', [
      '
        Declaration Type: function foo (boolean $i) on line 1
        Type `boolean` is undefined.
      ',
      '
        Declaration Type: function bar () : boolean on line 2
        Type `boolean` is undefined.
      ',
    ]);
  }

  /**
   * Test integer full name in type declaration.
   * @test @internal
   */
  static function unittest_integerFullName () {
    PhlintTest::assertIssues('
      function foo (integer $i) {}
      function bar () : integer {}
    ', [
      '
        Declaration Type: function foo (integer $i) on line 1
        Type `integer` is undefined.
      ',
      '
        Declaration Type: function bar () : integer on line 2
        Type `integer` is undefined.
      ',
    ]);
  }

  /**
   * Test resource full name in type declaration.
   * @test @internal
   */
  static function unittest_resourceFullName () {
    PhlintTest::assertIssues('
      function foo (resource $i) {}
      function bar () : resource {}
    ', [
      '
        Declaration Type: function foo (resource $i) on line 1
        Type `resource` is undefined.
      ',
      '
        Declaration Type: function bar () : resource on line 2
        Type `resource` is undefined.
      ',
    ]);
  }

  /**
   * Test a variable type declaration.
   * @test @internal
   */
  static function unittest_variableTypeDeclaration () {
    PhlintTest::assertIssues('

      class A {
        function foo () {}
      }

      function foo ($x) {
        /** @var A $a */
        $a = $x["obj"];
        $a->foo();
        $a->bar();
      }

    ', [
      '
        Name: $a->bar() on line 10
        Expression `$a->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
    ]);
  }

  /**
   * Test a variable type declaration when assignment is done from a
   * declared object through ArrayAccess.
   * @test @internal
   */
  static function unittest_variableTypeDeclarationFromArrayAccess () {
    PhlintTest::assertIssues('

      class A {
        function foo () {}
      }

      function foo (ArrayObject $x) {
        /** @var A */
        $a = $x["obj"];
        $a->foo();
        $a->bar();
      }

    ', [
      '
        Name: $a->bar() on line 10
        Expression `$a->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
    ]);
  }

  /**
   * Test a relative variable type declaration.
   * @test @internal
   */
  static function unittest_relativeVariableTypeDeclaration () {
    PhlintTest::assertIssues('

      namespace a\b\c {
        class D {
          function foo () {}
        }
      }

      namespace {
        use a\b;
        function foo ($x) {
          /** @var b\c\D $a */
          $a = $x["obj"];
          $a->foo();
          $a->bar();
        }
      }

    ', [
      '
        Name: $a->bar() on line 14
        Expression `$a->bar()` calls function `a\b\c\D::bar`.
        Function `a\b\c\D::bar` not found.
      ',
    ]);
  }


  /**
   * Test declaring a type for array key fetch.
   * @test @internal
   */
  static function unittest_arrayKeyFetch () {
    PhlintTest::assertIssues('

      class A {
        function bar () {}
      }

      class B {
        function baz () {}
      }

      function foo ($x) {
        $x["b"] = new B();

        /** @var A */
        $o = $x["a"];
        $o->foo();
        $o->bar();
      }

    ', [
      '
        Name: $o->foo() on line 15
        Expression `$o->foo()` calls function `A::foo`.
        Function `A::foo` not found.
      ',
    ]);
  }

  /**
   * Test phpdoc declared types against the real types.
   *
   * @test @internal
   */
  static function unittest_phpDocTypeDeclaration () {
    PhlintTest::assertIssues('
      /**
       * @param string|boolean $a
       * @param int $b
       * @return bool
       */
      function foo ($a, $b) {
        return $a + $b;
      }
    ', [
      '
        Operand Compatibility: $a on line 7
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
      ',
      '
        Operand Compatibility: $a on line 7
        Variable `$a` is always or sometimes of type `bool`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `bool` operands.
      ',
    ]);
  }

  /**
   * Test fully qualified phpdoc param declared type.
   *
   * @test @internal
   */
  static function unittest_phpDocParamFullyQualifiedType () {
    PhlintTest::assertIssues('
      namespace A {
        /**
         * @param \B\C $bar
         */
        function foo ($bar) {
          $bar->baz();
        }
      }
      namespace B {
        class C {}
      }
    ', [
      '
        Name: $bar->baz() on line 6
        Expression `$bar->baz()` calls function `B\C::baz`.
        Function `B\C::baz` not found.
      ',
    ]);
  }

  /**
   * Test phpdoc param declared type with uppercase null.
   *
   * @test @internal
   */
  static function unittest_phpDocParamUppercaseNull () {
    PhlintTest::assertNoIssues('
      /**
       * @param NULL $bar
       */
      function foo ($bar) {}
    ');
  }

}
