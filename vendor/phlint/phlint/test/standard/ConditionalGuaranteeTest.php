<?php

use \phlint\Test as PhlintTest;

class ConditionalGuaranteeTest {

  /**
   * Test condition guarantee.
   *
   * @test @internal
   */
  static function unittest_conditionGuarantee () {
    PhlintTest::assertNoIssues('
      function f () {
        if (isset($a))
          $b = $a;
      }
    ');
  }

  /**
   * Test condition guarantee nested.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeNested () {
    PhlintTest::assertNoIssues('
      function f () {
        if (isset($a))
          if (!isset($undefinedVariable))
            $b = $a;
      }
    ');
  }

  /**
   * Test condition guarantee scope.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeScope () {
    PhlintTest::assertIssues('
      function f () {
        if (isset($a)) {}
        $b = $a;
      }
    ', [
      '
        Variable Initialization: $a on line 3
        Variable `$a` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test condition guarantee multiple scope.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeMultipleScope () {
    PhlintTest::assertIssues('
      function f () {
        if (isset($a)) {}
        if (!isset($undefinedVariable)) {}
        $b = $a;
      }
    ', [
      '
        Variable Initialization: $a on line 4
        Variable `$a` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test condition guarantee nested with multiple.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeNestedWithMultiple () {
    PhlintTest::assertNoIssues('
      function f () {
        if (isset($a)) {
          if (isset($a)) {}
          if (!isset($undefinedVariable))
            $b = $a;
        }
      }
    ');
  }

  /**
   * Test condition guarantee with existing symbols.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeWithExistingSymbols () {
    PhlintTest::assertNoIssues('
      function f () {
        if (rand(0, 1))
          $a = 1;
        if (isset($a))
          $b = $a;
      }
    ');
  }

  /**
   * Test condition guarantee isset negation.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeIssetNegation () {
    PhlintTest::assertIssues('
      function f () {
        if (!isset($a))
          $b = $a;
      }
    ', [
      '
        Variable Initialization: $a on line 3
        Variable `$a` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test condition guarantee ternary.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeTernary () {
    PhlintTest::assertNoIssues('
      function f () {
        if (rand(0, 1))
          $a = 1;
        $b = !empty($a) ? $a : 0;
        $c = isset($a) ? $a : 0;
      }
    ');
  }

  /**
   * Test condition guarantee ternary not always defined.
   *
   * @test @internal
   */
  static function unittest_conditionGuaranteeTernaryNotAlwaysDefined () {
    PhlintTest::assertIssues('
      function f () {
        if (rand(0, 1))
          $a = 1;
        $b = true ? $a : 0;
      }
    ', [
      '
        Variable Initialization: $a on line 4
        Variable `$a` is used but it is not always initialized.
      ',
    ]);
  }

  /**
   * Test conditional guarantee on right side of `&&` operation.
   *
   * @test @internal
   */
  static function unittest_andOperationRightSideGuarantee () {
    PhlintTest::assertNoIssues('
      true && $foo = 1;
      $bar = $foo;
    ');
  }

  /**
   * Test conditional guarantee interface concept.
   *
   * @test @internal
   */
  static function unittest_concept () {
    PhlintTest::assertNoIssues('
      class A {
        function foo () {}
      }
      class B {
        function bar () {}
      }
      function f () {
        $foo = "a";
        $a = new A();
        if ($a instanceof B)
          $a->bar();
        elseif (isset($undefinedVariable))
          $a->foo();
        else
          $a->foo();
        $a->foo();
      }
    ');
  }

  /**
   * Test conditional guarantee interface concept negative test.
   *
   * @test @internal
   */
  static function unittest_conceptNegativeTest () {
    PhlintTest::assertNoIssues('
      function bar ($y) {
        return $y + 1;
      }
      function foo ($x = 0) {
        if ($x instanceof \DateTimeInterface)
          $x = $x->format("U");
        elseif (!is_numeric($x))
          $x = "0";
        bar($x);
      }
    ');
  }

  /**
   * Test conditional guarantee interface template concept negative test.
   *
   * @test @internal
   */
  static function unittest_templateConceptNegativeTest () {
    PhlintTest::assertIssues('
      function bar ($y) {
        return $y + 1;
      }
      function foo ($x) {
        if (ZEND_DEBUG_BUILD)
          $x = 0;
        else if ($x instanceof \DateTimeInterface)
          $x = $x->format("U");
        elseif (!is_numeric($x))
          $x = "0";
        bar($x);
      }
    ', [
      '
        Operand Compatibility: $y on line 2
        Variable `$y` is always or sometimes of type `string`.
        Expression `$y + 1` may cause undesired or unexpected behavior with `string` operands.
          Trace #1:
            #1: Function *function bar ("0"|0|string $y)* specialized for the expression *bar($x)* on line 11.
      ',
    ]);
  }

  /**
   * Test nested conditional guarantee.
   * @test @internal
   */
  static function unittest_nested () {
    PhlintTest::assertIssues('

      class A {
        function foo () {}
      }

      class B {
        function bar () {}
      }

      class C {
        function baz () {}
      }

      function foo ($a) {

        bar($a);

        if ($a instanceof B) {
          bar($a);
          #if (is_int($a))
          #  $a += 1;
        } elseif ($a instanceof C) {
          bar($a);
          #if (is_int($a))
          #  $a += 1;
        } else {
          bar($a);
          #if (is_int($a))
          #  $a += 1;
        }

        bar($a);

      }

      function bar ($a) {
        $a->foo();
        $a->bar();
        $a->baz();
      }

      foo(new A());

    ', [
      '
        Name: $a->foo() on line 37
        Expression `$a->foo()` calls function `B::foo`.
        Function `B::foo` not found.
          Trace #1:
            #1: Function *function bar (B $a)* specialized for the expression *bar($a)* on line 19.
      ',
      '
        Name: $a->baz() on line 39
        Expression `$a->baz()` calls function `B::baz`.
        Function `B::baz` not found.
          Trace #1:
            #1: Function *function bar (B $a)* specialized for the expression *bar($a)* on line 19.
      ',
      '
        Name: $a->foo() on line 37
        Expression `$a->foo()` calls function `C::foo`.
        Function `C::foo` not found.
          Trace #1:
            #1: Function *function bar (C $a)* specialized for the expression *bar($a)* on line 23.
      ',
      '
        Name: $a->bar() on line 38
        Expression `$a->bar()` calls function `C::bar`.
        Function `C::bar` not found.
          Trace #1:
            #1: Function *function bar (C $a)* specialized for the expression *bar($a)* on line 23.
      ',
      '
        Name: $a->bar() on line 38
        Expression `$a->bar()` calls function `A::bar`.
        Function `A::bar` not found.
          Trace #1:
            #1: Function *function bar (A $a)* specialized for the expression *bar($a)* on line 16.
            #2: Function *function foo (A $a)* specialized for the expression *foo(new A())* on line 42.
          Trace #2:
            #1: Function *function bar (A $a)* specialized for the expression *bar($a)* on line 27.
            #2: Function *function foo (A $a)* specialized for the expression *foo(new A())* on line 42.
          Trace #3:
            #1: Function *function bar (A $a)* specialized for the expression *bar($a)* on line 32.
            #2: Function *function foo (A $a)* specialized for the expression *foo(new A())* on line 42.
      ',
      '
        Name: $a->baz() on line 39
        Expression `$a->baz()` calls function `A::baz`.
        Function `A::baz` not found.
          Trace #1:
            #1: Function *function bar (A $a)* specialized for the expression *bar($a)* on line 16.
            #2: Function *function foo (A $a)* specialized for the expression *foo(new A())* on line 42.
          Trace #2:
            #1: Function *function bar (A $a)* specialized for the expression *bar($a)* on line 27.
            #2: Function *function foo (A $a)* specialized for the expression *foo(new A())* on line 42.
          Trace #3:
            #1: Function *function bar (A $a)* specialized for the expression *bar($a)* on line 32.
            #2: Function *function foo (A $a)* specialized for the expression *foo(new A())* on line 42.
      ',
    ]);
  }

  /**
   * Test conditional guarantee cross-namespace symbol lookup.
   *
   * @test @internal
   */
  static function unittest_crossNamespaceSymbolLookup () {
    PhlintTest::assertNoIssues('
      namespace a {
        class A {
          function foo () {}
        }
      }
      namespace b {
        use a\A;
        class B {
          function foo () {
            $x = null;
            if ($x instanceof A) {
              $x->foo();
              $x->bar();
            }
          }
        }
      }
    ');
  }

  /**
   * Test conditional guarantee template cross-namespace symbol lookup.
   *
   * @test @internal
   */
  static function unittest_templateCrossNamespaceSymbolLookup () {
    PhlintTest::assertIssues('
      namespace a {
        class A {
          function foo () {}
        }
      }
      namespace b {
        use a\A;
        class B {
          function foo ($x) {
            if ($x instanceof A) {
              $x->foo();
              $x->bar();
            }
          }
        }
      }
    ', [
      '
        Name: $x->bar() on line 12
        Expression `$x->bar()` calls function `a\A::bar`.
        Function `a\A::bar` not found.
      ',
    ]);
  }

  /**
   * Test conditional guarantees barrier with complex conditions.
   *
   * @test @internal
   */
  static function unittest_complexAndCondition () {
    PhlintTest::assertIssues('

      class A {
        function foo () {}
      }

      class B {
        function bar () {}
      }

      class C {
        function foo () {}
        function bar () {}
      }

      function foo ($a) {
        if (rand(0, 1) == 1 && (((($a instanceof A) || ($a instanceof B)) && rand(0, 1) == 1) || ($a instanceof C)))
          $a->foo();
      }

    ', [
      '
        Name: $a->foo() on line 17
        Expression `$a->foo()` calls function `B::foo`.
        Function `B::foo` not found.
      ',
    ]);
  }

  /**
   * Test conditional guarantees barrier within a loop.
   *
   * @test @internal
   */
  static function unittest_loopBarrier () {
    PhlintTest::assertIssues('
      class A {
        function foo () {}
      }
      function foo () {
        /** @var A */
        $a = null;
        foreach ([1, 2, 3] as $x) {
          if (is_null($a))
            break;
          else
            $a->foo();
          $a->foo();
        }
        $a->foo();
      }
    ', [
      '
        Name: $a->foo() on line 14
        Expression `$a->foo()` calls function `null::foo`.
        Function `null::foo` not found.
      ',
    ]);
  }

  /**
   * Test conditional connectives conditional guarantees.
   *
   * @test @internal
   */
  static function unittest_conditionalConnectives () {
    PhlintTest::assertIssues('

      class A {}

      class B {
        function foo () {
          return true;
        }
      }

      function foo (A $a) {
        $b = ($a instanceof B) && $a->foo();
        if ($b->bar()) {}
        if (($b instanceof B) && $b->foo())
          $b->foo();
      }

    ', [
      '
        Name: $b->bar() on line 12
        Expression `$b->bar()` calls function `bool::bar`.
        Function `bool::bar` not found.
      ',
    ]);
  }

  /**
   * Test conditional connectives conditional guarantees in a ternary operation.
   *
   * @test @internal
   */
  static function unittest_conditionalConnectivesTernary () {
    PhlintTest::assertIssues('
      class A { function bar () {} }
      class B { function baz () {} }
      $foo = new B();
      $foo instanceof A
        ? (
          $foo->bar()
            ? $foo->bar()
            : $foo->baz()
          )
        : (
          $foo->baz()
            ? $foo->baz()
            : $foo->bar()
          )
        ;
      $foo->bar();
    ', [
      '
        Name: $foo->baz() on line 8
        Expression `$foo->baz()` calls function `A::baz`.
        Function `A::baz` not found.
      ',
      '
        Name: $foo->bar() on line 13
        Expression `$foo->bar()` calls function `B::bar`.
        Function `B::bar` not found.
      ',
      '
        Name: $foo->bar() on line 16
        Expression `$foo->bar()` calls function `B::bar`.
        Function `B::bar` not found.
      ',
    ]);
  }

  /**
   * Test conditional connectives conditional guarantees with type changing and method invocation.
   *
   * @test @internal
   */
  static function unittest_conditionalConnectivesMethodInvocation () {
    PhlintTest::assertIssues('
      class A { function bar () {} }
      $foo = "";
      if (($foo instanceof \A && !$foo->bar() && (rand(0, 1) || !$foo->baz())) || !$foo->lol()) {}
    ', [
      '
        Name: $foo->baz() on line 3
        Expression `$foo->baz()` calls function `A::baz`.
        Function `A::baz` not found.
      ',
      '
        Name: $foo->lol() on line 3
        Expression `$foo->lol()` calls function `string::lol`.
        Function `string::lol` not found.
      ',
    ]);
  }

  /**
   * Test `empty` conditional guarantees.
   *
   * @test @internal
   */
  static function unittest_emptyGuarantee () {
    PhlintTest::assertNoIssues('
      class A {}
      $foo = new A();
      if (empty($foo))
        $foo->bar();
    ');
  }

  /**
   * Test `empty` conditional guarantees with values.
   *
   * @test @internal
   */
  static function unittest_emptyWithValues () {
    PhlintTest::assertIssues('

      class A {
        function foo () {}
      }

      $obj = null;

      if (rand(0, 1))
        $obj = new A();

      if (!empty($obj)) {
        $obj->foo();
        $obj->bar();
      }

    ', [
      '
        Name: $obj->bar() on line 13
        Expression `$obj->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
    ]);
  }

  /**
   * Test a complex expression in isset.
   *
   * @test @internal
   */
  static function unittest_issetComplexExpression () {
    PhlintTest::assertNoIssues('
      function foo ($x) {
        if (isset($x[0][1]->{"prop"}[2]))
          return $x[0][1]->{"prop"}[2];
      }
    ');
  }

  /**
   * Test that nested comparison conditions do not cause issues.
   *
   * @test @internal
   */
  static function unittest_nestedConditions () {
    PhlintTest::assertNoIssues('
      $foo = null;
      if (is_null($foo))
        if (true === true)
          if ($foo) {}
    ');
  }

  /**
   * Test function Exists guarantee.
   *
   * @test @internal
   */
  static function unittest_functionExists () {
    PhlintTest::assertIssues('
      if (function_exists("foo"))
        foo();
      foo();
    ', [
      '
        Name: foo() on line 3
        Expression `foo()` calls function `foo`.
        Function `foo` not found.
      ',
    ]);
  }

  /**
   * Regression test for the issue:
   *   Provided symbol *$foo* of type *bool* is not compatible in the expression *foreach ($foo as $bar)* on line 5.
   *
   * @test @internal
   */
  static function unittest_nonEmptyBoolGuarantee () {
    PhlintTest::assertIssues('
      $foo = false;
      if (rand(0, 1))
        $foo = new ArrayObject();
      if (!empty($foo))
        foreach ($foo as $bar) {}
    ', [
    ]);
  }

  /**
   * Test constraint conditional guarantee.
   *
   * @test @internal
   */
  static function unittest_objectConstraintGuarantee () {
    PhlintTest::assertIssues('
      function foo ($obj) {
        if (is_object($obj))
          return get_class($obj) . $obj->bar();
        return $obj;
      }
      foo(2);
      foo("Hello world");
      foo(new stdClass());
    ', [
      '
        Name: $obj->bar() on line 3
        Expression `$obj->bar()` calls function `stdClass::bar`.
        Function `stdClass::bar` not found.
          Trace #1:
            #1: Function *function foo (stdClass $obj)* specialized for the expression *foo(new stdClass())* on line 8.
      ',
    ]);
  }

  /**
   * Test that scope guarantee doesn't get polluted on overlap.
   * In this case `$foo instanceof A && $foo->bar()` is a left sub-scope of the
   * whole statement and at the same time forms a scope for itself.
   *
   * @test @internal
   */
  static function unittest_BooleanAndOpLeftScopeGuarantee () {
    PhlintTest::assertIssues('
      class A { function bar () {} }
      $foo = "";
      ($foo instanceof A && $foo->bar()) && $foo->bar();
      $foo->baz();
    ', [
      '
        Name: $foo->baz() on line 4
        Expression `$foo->baz()` calls function `string::baz`.
        Function `string::baz` not found.
      ',
    ]);
  }

  /**
   * @todo: This if this should be always reported or not.
   *
   * Regression test for the issue:
   *   Variable *$baz* used before initialized on line 6.
   *
   * @test @internal
   */
  static function unittest_nonEmptyForeach () {
    return;
    PhlintTest::assertIssues('
      $foo = [];
      if (!empty($foo)) {
        foreach ($foo as $bar) {
          $baz = $bar;
        }
        $fun = $baz;
      }
    ', [
    ]);
  }

  /**
   * Test non-empty string guarantee.
   *
   * Regression test for the issue:
   *   Provided symbol *$foo* of type *string* is not compatible in the expression *foreach ($foo as $bar)* on line 3.
   *
   * @test @internal
   */
  static function unittest_nonEmptyString () {
    PhlintTest::assertNoIssues('
      $foo = "";
      if (!empty($foo))
        foreach ($foo as $bar) {}
    ');
  }

  /**
   * Test branch joining effect of and condition.
   *
   * Regression test for the issue:
   *   Variable *$foo* used before initialized on line 4.
   *
   * @test @internal
   */
  static function unittest_andConditionBranchEffect () {
    PhlintTest::assertNoIssues('
      $foo = 1;
      if (!empty($foo) && ZEND_DEBUG_BUILD)
        return;
      $bar = $foo;
    ');
  }

}
