<?php

use \phlint\Test as PhlintTest;

class TypeCompatibilityTest {

  /**
   * Test template specialization plus operator.
   *
   * @test @internal
   */
  static function unittest_templateSpecializationPlus () {
    PhlintTest::assertNoIssues('
      function f () {
        return "2";
      }
      $x = f() + 1;
    ');
  }

  /**
   * Test incompatible template specialization plus operator.
   *
   * @test @internal
   */
  static function unittest_incompatibleTemplateSpecializationPlus () {
    PhlintTest::assertIssues('
      function f () {
        return "a";
      }
      $x = f() + 1;
    ', [
      '
        Operand Compatibility: f() on line 4
        Expression `f()` is always or sometimes of type `string`.
        Expression `f() + 1` may cause undesired or unexpected behavior with `string` operands.
      ',
    ]);
  }

  /**
   * Test plus operator inside a template specialization.
   *
   * @test @internal
   */
  static function unittest_plusInsideTemplateSpecialization () {
    PhlintTest::assertNoIssues('
      function sum ($a, $b) {
        return $a + $b;
      }
      $x = sum(2, 3);
      $x = sum("2", 3);
      $x = sum(2, "3");
    ');
  }

  /**
   * Test incompatible plus inside template specialization.
   *
   * @test @internal
   */
  static function unittest_incompatiblePlusInsideTemplateSpecialization () {
    PhlintTest::assertIssues('
      function sum ($a, $b) {
        return $a + $b;
      }
      $x = sum("a", 3);
    ', [
      '
        Operand Compatibility: $a on line 2
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function sum ("a" $a, 3 $b)* specialized for the expression *sum("a", 3)* on line 4.
      ',
    ]);
  }

  /**
   * Test nested template specialization plus operator.
   *
   * @test @internal
   */
  static function unittest_nestedTemplateSpecializationPlus () {
    PhlintTest::assertIssues('
      function sum ($a, $b) {
        return $a + $b;
      }
      function doSum ($c, $d) {
        return sum($c, $d);
      }
      $x = doSum("a", 3);
    ', [
      '
        Operand Compatibility: $a on line 2
        Variable `$a` is always or sometimes of type `string`.
        Expression `$a + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function sum ("a" $a, 3 $b)* specialized for the expression *sum($c, $d)* on line 5.
            #2: Function *function doSum ("a" $c, 3 $d)* specialized for the expression *doSum("a", 3)* on line 7.
      ',
    ]);
  }

  /**
   * Test template specialization plus operator with explicit types.
   *
   * @test @internal
   */
  static function unittest_templateSpecializationPlusWithExplicitTypes () {
    PhlintTest::assertNoIssues('
      function sum ($a, $b) {
        $c = $a;
        return $c + $b;
      }

      function doSum ($d, $e) {
        $f = $d;
        return sum($f, $e);
      }

      function getExternalInput () : int {
        return 2;
      }

      $x = doSum(getExternalInput(), 3);
    ');
  }

  /**
   * Test incompatible template specialization plus operator with explicit types.
   *
   * @test @internal
   */
  static function unittest_incompatibleTemplateSpecializationPlusWithExplicitTypes () {
    PhlintTest::assertIssues('
      function sum ($a, $b) {
        $c = $a;
        return $c + $b;
      }

      function doSum ($d, $e) {
        $f = $d;
        return sum($f, $e);
      }

      function getExternalInput () : string {
        return "a";
      }

      $x = doSum(getExternalInput(), 3);
    ', [
      '
        Operand Compatibility: $c on line 3
        Variable `$c` is always or sometimes of type `string`.
        Expression `$c + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function sum ("a" $a, 3 $b)*
              specialized for the expression *sum($f, $e)* on line 8.
            #2: Function *function doSum ("a" $d, 3 $e)*
              specialized for the expression *doSum(getExternalInput(), 3)* on line 15.
      ',
    ]);
  }

  /**
   * Test template specialization plus operator with multiple types.
   *
   * @test @internal
   */
  static function unittest_templateSpecializationPlusWithMultipleTypes () {
    PhlintTest::assertIssues('
      function foo () {
        $x = ZEND_DEBUG_BUILD ? rand(0, 1) : false;
        return $x;
      }
      function bar () {
        $x = foo() + 1;
      }
    ', [
      '
        Operand Compatibility: foo() on line 6
        Expression `foo()` is always or sometimes of type `bool`.
        Expression `foo() + 1` may cause undesired or unexpected behavior with `bool` operands.
      ',
    ]);
  }

  /**
   * Test that the analyzer does not go into infinite recursion while analyzing.
   *
   * @test @internal
   */
  static function unittest_infiniteRecursion () {
    PhlintTest::assertNoIssues('
      function f () {
        f();
      }
      f();
    ');
  }

  /**
   * Regression test for undefined function not being reported due to
   * a closure being registered as empty symbol name.
   *
   * @test @internal
   */
  static function unittest_closureSymbol () {
    PhlintTest::assertIssues('
      function f1 () {
        fx();
      }
      function f2 () {
        $f3 = function () {};
        $x = $f3();
      }
    ', [
      '
        Name: fx() on line 2
        Expression `fx()` calls function `fx`.
        Function `fx` not found.
      ',
    ]);
  }

  /**
   * Test execution branching.
   *
   * @test @internal
   */
  static function unittest_executionBranching () {
    PhlintTest::assertNoIssues('
      function f () {
        if (rand(0, 1))
          $x = 0;
        else
          $x = 1;
        return $x;
      }
      $x = f() + 1;
    ');
  }

  /**
   * Test execution branching.
   *
   * @test @internal
   */
  static function unittest_executionBranchingIncompatiblePlus () {
    PhlintTest::assertIssues('
      function f () {
        if (rand(0, 1))
          $x = 0;
        else
          $x = "a";
        return $x;
      }
      $x = f() + 1;
    ', [
      '
        Operand Compatibility: f() on line 8
        Expression `f()` is always or sometimes of type `string`.
        Expression `f() + 1` may cause undesired or unexpected behavior with `string` operands.
      ',
    ]);
  }

  /**
   * Test nested execution branching.
   *
   * @test @internal
   */
  static function unittest_nestedExecutionBranching () {
    PhlintTest::assertIssues('
      function sum ($a, $b) {
        $c = $a;
        return $c + $b;
      }

      function doSum ($d, $e) {
        if (rand(0, 1))
          $f = $d;
        else
          $f = "a";
        return sum($f, $e);
      }

      function getExternalInput () : int {
        return 2;
      }

      $x = doSum(getExternalInput(), 3);
    ', [
      '
        Operand Compatibility: $c on line 3
        Variable `$c` is always or sometimes of type `string`.
        Expression `$c + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function sum ("a" $a, $b)* specialized for the expression *sum($f, $e)* on line 11.
      ',
      '
        Operand Compatibility: $c on line 3
        Variable `$c` is always or sometimes of type `string`.
        Expression `$c + $b` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function sum ("a"|2 $a, 3 $b)* specialized for the expression *sum($f, $e)* on line 11.
            #2: Function *function doSum (2 $d, 3 $e)* specialized for the expression *doSum(getExternalInput(), 3)* on line 18.
      ',
    ]);
  }

  /**
   * Test class concept.
   *
   * @test @internal
   */
  static function unittest_classConcept () {
    PhlintTest::assertNoIssues('

      class A {
        function bar () { return 1; }
      }

      class B {
        function bar () { return 2; }
      }

      class C {
        function foo () {}
      }

      function foo ($o, $i) {
        return $o->bar() + $i;
      }

      function baz ($newObj) {
        if (rand(0, 1))
          $obj = new A();
        else
          $obj = $newObj;
        return foo($obj, 2);
      }

      $x = foo(new B(), baz(new B()));

    ');
  }

  /**
   * Test class concept with non existing method invocation.
   *
   * @test @internal
   */
  static function unittest_classConceptNonExistingMethod () {
    PhlintTest::assertIssues('

      class A {
        function bar () { return 1; }
      }

      class B {
        function bar () { return 2; }
      }

      class C {
        function foo () {}
      }

      function foo ($o, $i) {
        return $o->bar() + $i;
      }

      function baz ($newObj) {
        if (rand(0, 1))
          $obj = new A();
        else
          $obj = $newObj;
        return foo($obj, 2);
      }

      $x = foo(new B(), baz(new C()));

    ', [
      '
        Name: $o->bar() on line 15
        Expression `$o->bar()` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function foo (A|C $o, 2 $i)* specialized for the expression *foo($obj, 2)* on line 23.
            #2: Function *function baz (C $newObj)* specialized for the expression *baz(new C())* on line 26.
      ',
    ]);
  }

  /**
   * Test implicit conversion to bool with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToBoolWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      function foo (bool $bar) {}
      foo(1.1);
      foo("1.1");
      foo("0.0");
      foo("1.0");
      foo(1);
      foo(2);
      foo("1");
      foo("2");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: 1.1 on line 2
        Argument #1 passed in the expression `foo(1.1)` is of type `float`.
        A value of type `float` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "1.1" on line 3
        Argument #1 passed in the expression `foo("1.1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "0.0" on line 4
        Argument #1 passed in the expression `foo("0.0")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "1.0" on line 5
        Argument #1 passed in the expression `foo("1.0")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      // @todo: Implement 0 or 1 to intBool
      '
        Argument Compatibility: 1 on line 6
        Argument #1 passed in the expression `foo(1)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: 2 on line 7
        Argument #1 passed in the expression `foo(2)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "2" on line 9
        Argument #1 passed in the expression `foo("2")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "bar" on line 10
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to bool with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToBoolWithPHPDocDeclaration () {
    PhlintTest::assertIssues('
      /**
       * @param bool $bar
       */
      function foo ($bar) {}
      foo(1.1);
      foo("1.1");
      foo("0.0");
      foo("1.0");
      foo(1);
      foo(2);
      foo("1");
      foo("2");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: 1.1 on line 5
        Argument #1 passed in the expression `foo(1.1)` is of type `float`.
        A value of type `float` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "1.1" on line 6
        Argument #1 passed in the expression `foo("1.1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "0.0" on line 7
        Argument #1 passed in the expression `foo("0.0")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "1.0" on line 8
        Argument #1 passed in the expression `foo("1.0")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      // @todo: Implement 0 or 1 to intBool
      '
        Argument Compatibility: 1 on line 9
        Argument #1 passed in the expression `foo(1)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: 2 on line 10
        Argument #1 passed in the expression `foo(2)` is of type `int`.
        A value of type `int` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "2" on line 12
        Argument #1 passed in the expression `foo("2")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
      '
        Argument Compatibility: "bar" on line 13
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `bool`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to string with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToStringWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      function foo (string $bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: false on line 7
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to string with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToStringWithPHPDocDeclaration () {
    PhlintTest::assertIssues('
      /**
       * @param string $bar
       */
      function foo ($bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: false on line 10
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `string`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to integer with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToIntegerWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      function foo (int $bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: 1.1 on line 2
        Argument #1 passed in the expression `foo(1.1)` is of type `float`.
        A value of type `float` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: "1.1" on line 3
        Argument #1 passed in the expression `foo("1.1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: "bar" on line 6
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: false on line 7
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to integer with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToIntegerWithPHPDocDeclaration () {
    PhlintTest::assertIssues('
      /**
       * @param int $bar
       */
      function foo ($bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: 1.1 on line 5
        Argument #1 passed in the expression `foo(1.1)` is of type `float`.
        A value of type `float` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: "1.1" on line 6
        Argument #1 passed in the expression `foo("1.1")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: "bar" on line 9
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `int`.
      ',
      '
        Argument Compatibility: false on line 10
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `int`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to float with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToFloatWithArugmentDeclaration () {
    PhlintTest::assertIssues('
      function foo (float $bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: "bar" on line 6
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `float`.
      ',
      '
        Argument Compatibility: false on line 7
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `float`.
      ',
    ]);
  }

  /**
   * Test implicit conversion to float with argument declaration.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToFloatWithPHPDocDeclaration () {
    PhlintTest::assertIssues('
      /**
       * @param float $bar
       */
      function foo ($bar) {}
      foo(1.1);
      foo("1.1");
      foo(1);
      foo("1");
      foo("bar");
      foo(false);
    ', [
      '
        Argument Compatibility: "bar" on line 9
        Argument #1 passed in the expression `foo("bar")` is of type `string`.
        A value of type `string` is not implicitly convertible to type `float`.
      ',
      '
        Argument Compatibility: false on line 10
        Argument #1 passed in the expression `foo(false)` is of type `bool`.
        A value of type `bool` is not implicitly convertible to type `float`.
      ',
    ]);
  }

  /**
   * Test isTraversable.
   *
   * @test @internal
   */
  static function unittest_isTraversable () {
    PhlintTest::assertIssues('
      function myRangeSum ($values) {
        $result = 0;
        foreach ($values as $value) {
          $result += $value;
        }
        return $result;
      }

      myRangeSum([1, 2.2, "2", 3]);
      myRangeSum([1, 2.2, "2", 3, "a"]);
      myRangeSum(2);
    ', [
      '
        Operand Compatibility: $value on line 4
        Variable `$value` is always or sometimes of type `int|float|string`.
        Expression `$result += $value` may cause undesired or unexpected behavior with `int|float|string` operands.
          Trace #1:
            #1: Function *function myRangeSum ((int|float|string)[] $values)*
              specialized for the expression *myRangeSum([1, 2.2, "2", 3, "a"])* on line 10.
      ',
      '
        Operand Compatibility: $values on line 3
        Variable `$values` is always or sometimes of type `int`.
        Loop `foreach ($values as $value)` may cause undesired or unexpected behavior with `int` operands.
          Trace #1:
            #1: Function *function myRangeSum (2 $values)*
              specialized for the expression *myRangeSum(2)* on line 11.
      ',
    ]);
  }

  /**
   * Test argument types.
   *
   * @test @internal
   */
  static function unittest_argumentTypes () {
    PhlintTest::assertIssues('

      function foo () {
        return rand(0, 1) ? 2 : ["a" => 1];
      }

      function bar () {
        return rand(0, 1) ? 2.0 : ["a" => 1.0];
      }

      $baz = sprintf("%0.2f and %0.2f", foo(), bar());

    ', [
      '
        Argument Compatibility: foo() on line 10
        Argument #2 passed in the expression `sprintf("%0.2f and %0.2f", foo(), bar())` is of type `int[string]`.
        A value of type `int[string]` is not implicitly convertible to type `float|int|string`.
      ',
      '
        Argument Compatibility: bar() on line 10
        Argument #3 passed in the expression `sprintf("%0.2f and %0.2f", foo(), bar())` is of type `float[string]`.
        A value of type `float[string]` is not implicitly convertible to type `float|int|string`.
      ',
    ]);
  }

  /**
   * Test type compatibility with class and interface inheritance.
   *
   * @test @internal
   */
  static function unittest_classInheritanceCompatibility () {
    PhlintTest::assertIssues('

      class A extends B {}
      class B implements I {}
      class C implements J {}
      interface I extends J {}
      interface J {}

      function foo (I $a) {}

      foo(new A());
      foo(new C());

    ', [
      '
        Argument Compatibility: new C() on line 11
        Argument #1 passed in the expression `foo(new C())` is of type `C`.
        A value of type `C` is not implicitly convertible to type `I`.
      ',
    ]);
  }

  /**
   * Test type compatibility with class and interface inheritance on a standard library example.
   *
   * @test @internal
   */
  static function unittest_classInheritanceCompatibilityInStandardLibrary () {
    PhlintTest::assertNoIssues('
      $foo = new DateTime();
      $foo->diff($foo);
    ');
  }

  /**
   * @test @internal
   */
  static function unittest_classInheritanceCompabibilityWithMethodSpecialization () {
    PhlintTest::assertIssues('

      class A extends B {}

      class B implements I {
        function foo (J $x) {}
      }

      class C {
        function foo (C $x) {}
      }

      interface I extends J {}

      interface J {
        function foo (J $x) {}
      }

      function baz ($a, $b) {
        $a->foo($b);
        $a->bar($b);
      }

      baz(new A(), new A());
      baz(new C(), new A());
      baz(new A(), new C());
      baz(new C(), new C());

    ', [
      '
        Argument Compatibility: $b on line 19
        Argument #1 passed in the expression `$a->foo($b)` is of type `A`.
        A value of type `A` is not implicitly convertible to type `C`.
          Trace #1:
            #1: Function *function baz (C $a, A $b)*
              specialized for the expression *baz(new C(), new A())* on line 24.
      ',
      '
        Argument Compatibility: $b on line 19
        Argument #1 passed in the expression `$a->foo($b)` is of type `C`.
        A value of type `C` is not implicitly convertible to type `J`.
          Trace #1:
            #1: Function *function baz (A $a, C $b)*
              specialized for the expression *baz(new A(), new C())* on line 25.
      ',
      '
        Name: $a->bar($b) on line 20
        Expression `$a->bar($b)` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function baz (A $a, A $b)* specialized for the expression *baz(new A(), new A())* on line 23.
      ',
      '
        Name: $a->bar($b) on line 20
        Expression `$a->bar($b)` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function baz (C $a, A $b)* specialized for the expression *baz(new C(), new A())* on line 24.
      ',
      '
        Name: $a->bar($b) on line 20
        Expression `$a->bar($b)` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function baz (A $a, C $b)* specialized for the expression *baz(new A(), new C())* on line 25.
      ',
      '
        Name: $a->bar($b) on line 20
        Expression `$a->bar($b)` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function baz (C $a, C $b)* specialized for the expression *baz(new C(), new C())* on line 26.
      ',
    ]);
  }

  /**
   * @test @internal
   */
  static function unittest_complexInfereceTypeCompatibility () {
    PhlintTest::assertIssues('

      class A {

        function bar () {
          $b = B::getInstance();
          return $b->baz();
        }

      }

      class B {

        public static function getInstance () {
          static $instance = null;
          if (!$instance)
            $instance = new B();
          return $instance;
        }

        function baz () {
          $data = [];
          foreach ([1, 2, 3] as $v)
            $data[] = $v;
          return $data;
        }

      }

      $obj = new A();

      $foo = sprintf("%0.2f", $obj->bar());

    ', [
      '
        Argument Compatibility: $obj->bar() on line 31
        Argument #2 passed in the expression `sprintf("%0.2f", $obj->bar())` is of type `int[]`.
        A value of type `int[]` is not implicitly convertible to type `float|int|string`.
      ',
    ]);
  }

  /**
   * Test implicit type cast.
   *
   * @test @internal
   */
  static function unittest_implicitTypeCast () {
    // @todo: Rewrite, implement, and enable.
    PhlintTest::assertNoIssues('
      class X {}
      function foo (X $a) {}
      $bar = [new X(), new X(), new X()];
      foo($bar[0]);
    ');
    /*
    PhlintTest::assertNoIssues('
      class X {}
      class Y {}
      function foo (X $a) {}
      $bar = [new X(), new Y(), new X(), new Y()];
      foo($bar[0]);
    ');
    /*
    context('code', new \phlint\Code(), function () {
      assert(Type::common(['t_X', 't_X', 't_X']) == 't_X');
      assert(Type::common(['t_X', 't_Y', 't_Y', 't_X']) == '');
      assert(Type::common(['t_int', 't_float']) == 't_float');
      assert(Type::common(['t_autoInteger', 't_autoFloat']) == 't_autoFloat');
      assert(Type::common(['t_int', 't_int']) == 't_int');
      assert(Type::common(['t_int', 't_string']) == 't_autoString');
      assert(Type::common(['t_int', 't_float', 't_autoInteger', 't_int']) == 't_autoFloat');
    });
    /**/
  }

  /**
   * Test unknown type invocation.
   *
   * Regression test for the issue:
   *   Unable to invoke undefined *::fun* for the expression *$baz->fun()* on line 4.
   *
   * @test @internal
   */
  static function unittest_unknownTypeInvocation () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        $baz = call_user_func($bar);
        $baz();
        $baz->fun();
        $baz::fun();
      }
    ');
  }

  /**
   * Test numeric operation on float.
   *
   * Regression test for the issue:
   *   Provided expression *sqrt(1)* of type *float* is not compatible in the expression *1 - sqrt(1)* on line 1.
   *
   * @test @internal
   */
  static function unittest_floatNumeric () {
    PhlintTest::assertNoIssues('
      $foo = 1 - sqrt(1);
    ');
  }

  /**
   * Static type keyword sanity test.
   *
   * Regression test for the issue:
   *   Provided argument *A::create()* of type *static* is not compatible
   *     in the expression *A::foo(A::create())* on line 7.
   *
   * @test @internal
   */
  static function unittest_staticTypeKeyword () {
    PhlintTest::assertNoIssues('
      class A {
        static function create () {
          return new static();
        }
        static function foo (A $a) {}
      }
      A::foo(A::create());
    ');
  }

  /**
   * Test cross namespace inheritance compatibility.
   *
   * Regression test for the issue:
   *   Provided argument *new C()* of type *c\C* is not compatible
   *     in the expression *$b->foo(new C())* on line 5.
   *
   * @test @internal
   */
  static function unittest_crossNamespaceInheritanceCompatibility () {
    PhlintTest::assertIssues('
      namespace a {
        use \b\B;
        use \c\C;
        $b = new B();
        $b->foo(new C());
        $b->foo(new B());
      }
      namespace b {
        use \d\D;
        class B {
          function foo (D $d) {}
        }
      }
      namespace c {
        use \d\D;
        class C implements D {}
      }
      namespace d {
        interface D {}
      }
    ', [
      '
        Argument Compatibility: new B() on line 6
        Argument #1 passed in the expression `$b->foo(new B())` is of type `b\B`.
        A value of type `b\B` is not implicitly convertible to type `d\D`.
      ',
    ]);
  }

}
