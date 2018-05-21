<?php

use \luka8088\phops\MetaContext;
use \phlint\autoload\Mock as MockAutoload;
use \phlint\Code;
use \phlint\Test as PhlintTest;

class SymbolLinkTest {

  /**
   * Test undefined function.
   *
   * @test @internal
   */
  static function unittest_undefinedFunction () {
    PhlintTest::assertIssues('
      $x = function_that_does_not_exist();
    ', [
      '
        Name: function_that_does_not_exist() on line 1
        Expression `function_that_does_not_exist()` calls function `function_that_does_not_exist`.
        Function `function_that_does_not_exist` not found.
      ',
    ]);
  }

  /**
   * Test defined library function.
   *
   * @test @internal
   */
  static function unittest_definedLibraryFunction () {
    PhlintTest::assertNoIssues('
      $x = chr(64);
    ');
  }

  /**
   * Test undefined class method.
   *
   * @test @internal
   */
  static function unittest_undefinedClassMethod () {
    PhlintTest::assertIssues('
      $x = \class_that_does_not_exist::method_that_does_not_exist();
    ', [
      '
        Name: \class_that_does_not_exist::method_that_does_not_exist() on line 1
        Expression `\class_that_does_not_exist::method_that_does_not_exist()` calls function `class_that_does_not_exist::method_that_does_not_exist`.
        Function `class_that_does_not_exist::method_that_does_not_exist` not found.
      ',
    ]);
  }

  /**
   * Test defined library class method.
   *
   * @test @internal
   */
  static function unittest_definedLibraryClassMethod () {
    PhlintTest::assertNoIssues('
      $x = \DateTime::getLastErrors();
    ');
  }

  /**
   * Test defined library class method from a function.
   *
   * @test @internal
   */
  static function unittest_definedLibraryClassMethodFromAFunction () {
    PhlintTest::assertNoIssues('
      $f = function () {
        $x = \DateTime::getLastErrors();
      };
    ');
  }

  /**
   * Test undefined static extended method.
   *
   * @test @internal
   */
  static function unittest_undefinedStaticExtendedMethod () {
    PhlintTest::assertIssues('
      class A { static function x () {} }
      class B extends A {}
      B::y();
    ', [
      '
        Name: B::y() on line 3
        Expression `B::y()` calls function `B::y`.
        Function `B::y` not found.
      ',
    ]);
  }

  /**
   * Test static extended class method.
   *
   * @test @internal
   */
  static function unittest_staticExtendedClassMethod () {
    PhlintTest::assertNoIssues('
      class A { static function x () {} }
      class B extends A {}
      B::x();
    ');
  }

  /**
   * Test undefined static extended namespaced class method.
   *
   * @test @internal
   */
  static function unittest_undefinedStaticExtendedNamespacedClassMethod () {
    PhlintTest::assertIssues('
      namespace ns1;
      class A { static function x () {} }
      class B extends A {}
      B::y();
    ', [
      '
        Name: B::y() on line 4
        Expression `B::y()` calls function `ns1\B::y`.
        Function `ns1\B::y` not found.
      ',
    ]);
  }

  /**
   * Test static extended namespaced class method.
   *
   * @test @internal
   */
  static function unittest_staticExtendedNamespacedClassMethod () {
    PhlintTest::assertNoIssues('
      namespace ns1;
      class a { static function x () {} }
      class b extends a {}
      b::x();
    ');
  }

  /**
   * Test undefined class.
   *
   * @test @internal
   */
  static function unittest_undefinedClass () {
    PhlintTest::assertIssues('
      class a {}
      $x = new A();
      $x = new B();
    ', [
      '
        Case Sensitive Naming: new A() on line 2
        Expression `new A()` is not using the same letter casing as class `a`.
      ',
      '
        Name: new B() on line 3
        Expression `new B()` calls function `B`.
        Function `B` not found.
      ',
    ]);
  }

  /**
   * Test class construction.
   *
   * @test @internal
   */
  static function unittest_classConstruction () {
    PhlintTest::assertNoIssues('
      class a {}
      $x = new a();
    ');
  }

  /**
   * Test undefined class catching.
   *
   * @test @internal
   */
  static function unittest_undefinedClassCatching () {
    PhlintTest::assertIssues('
      class a {}
      try {} catch (A $e) {}
      try {} catch (B $e) {}
    ', [
      '
        Case Sensitive Naming: catch (A $e) on line 2
        Catch `catch (A $e)` is not using the same letter casing as class `a`.
      ',
      '
        Declaration Type: catch (B $e) on line 3
        Type `B` is undefined.
      ',
    ]);
  }

  /**
   * Test class catching.
   *
   * @test @internal
   */
  static function unittest_classCatching () {
    PhlintTest::assertNoIssues('
      class a {}
      try {} catch (a $e) {}
    ');

    PhlintTest::assertNoIssues('
      $x = \DateTime::createFromFormat("Y-m-d", "2000-01-01");
    ');
  }

  /**
   * Test symbol autoloading.
   *
   * @test @internal
   */
  static function unittest_autoloader () {

    $linter = PhlintTest::create();

    $linter[] = /** @ExtensionCall("phlint.phpAutoloadClass") */ function ($symbol) {
      if ($symbol == 'class_that_needs_to_be_autoloaded') {
        MetaContext::get(Code::class)->load([[
          'path' => '',
          'source' => '
            class class_that_needs_to_be_autoloaded {
              function x () {}
            }
          ',
          'isLibrary' => false,
        ]]);
      }
      if ($symbol == 'a\\class_that_needs_to_be_autoloaded') {
        MetaContext::get(Code::class)->load([[
          'path' => '',
          'source' => '
            namespace a {
              class class_that_needs_to_be_autoloaded {
                function y () {}
              }
            }
          ',
          'isLibrary' => false,
        ]]);
      }
    };

    PhlintTest::assertNoIssues($linter->analyze('
      $x = \class_that_needs_to_be_autoloaded::x();
    '));

    PhlintTest::assertNoIssues($linter->analyze('
      namespace a {
        $x = class_that_needs_to_be_autoloaded::y();
      }
    '));

    PhlintTest::assertIssues($linter->analyze('
      $x = \class_that_will_not_be_autoloaded::x();
    '), [
      '
        Name: \class_that_will_not_be_autoloaded::x() on line 1
        Expression `\class_that_will_not_be_autoloaded::x()` calls function `class_that_will_not_be_autoloaded::x`.
        Function `class_that_will_not_be_autoloaded::x` not found.
      ',
    ]);

    PhlintTest::assertNoIssues($linter->analyze('
      $f = function () {
        $x = \example::x();
      };
      class example extends \class_that_needs_to_be_autoloaded {}
    '));

    PhlintTest::assertIssues($linter->analyze('
      $f = function () {
        $x = \example::x();
      };
      class example extends \class_that_will_not_be_autoloaded {}
    '), [
      '
        Name: \example::x() on line 2
        Expression `\example::x()` calls function `example::x`.
        Function `example::x` not found.
      ',
    ]);
  }

  /**
   * Test lookahead.
   *
   * @test @internal
   */
  static function unittest_lookahead () {

    $linter = PhlintTest::create();

    $linter->addSource('
      class X {
        function z () {
          $y = new Y();
        }
      }
    ');

    $linter->addSource('
      class Y {}
    ');

    PhlintTest::assertNoIssues($linter->analyze('
      $x = new X();
    '));

  }

  /**
   * Test that autoloading from the middle of the code does not reset
   * the traverse state.
   * @test @internal
   */
  static function unittest_traverseStateOnAutoload () {

    $linter = PhlintTest::create();

    $linter[] = /** @ExtensionCall("phlint.phpAutoloadClass") */ function ($symbol) {
      if ($symbol == 'A') {
        MetaContext::get(Code::class)->load([[
          'path' => '',
          'source' => '
            class A {
              function bar () {}
            }
          ',
          'isLibrary' => false,
        ]]);
      }
      if ($symbol == 'B') {
        MetaContext::get(Code::class)->load([[
          'path' => '',
          'source' => '
            class B {
              function baz () {}
            }
          ',
          'isLibrary' => false,
        ]]);
      }
    };

    PhlintTest::assertNoIssues($linter->analyze('
      function foo ($x) {
        $x["b"] = new B();

        /** @var A */
        $o = $x["a"];
        $o->bar();
      }
    '));

  }

  /**
   * Test namespaced functions symbol linking.
   *
   * @test @internal
   */
  static function unittest_namespacedFunctions () {
    PhlintTest::assertNoIssues('

      namespace {
        function someFunction () {}
      }

      namespace example {
        function someFunction () {}
        function additionalFunction () {}
      }

      namespace {
        someFunction();
        \someFunction();
        \example\someFunction();
        \example\additionalFunction();
      }

    ');
  }

  /**
   * Test namespaced functions automatic symbol linking.
   *
   * @test @internal
   */
  static function unittest_namespacedFunctionsAutomatic () {
    PhlintTest::assertNoIssues('

      namespace {
        function someFunction () {}
      }

      namespace example {
      }

      namespace example {
        someFunction();
      }

    ');
  }

  /**
   * Test namespaced functions symbol linking on repeating namespaces.
   *
   * @test @internal
   */
  static function unittest_repeatingNamespacedFunctions () {
    PhlintTest::assertNoIssues('

      namespace {
      }

      namespace example {
        function someFunction () {}
      }

      namespace example {
        someFunction();
      }

    ');
  }

  /**
   * Test namespaced functions symbol linking on non-existing function.
   *
   * @test @internal
   */
  static function unittest_namespacedNonExistingFunctions () {
    PhlintTest::assertIssues('
      namespace example {
        someFunction();
      }
    ', [
      '
        Name: someFunction() on line 2
        Expression `someFunction()` calls function `example\someFunction`.
        Function `example\someFunction` not found.
      ',
    ]);
  }

  /**
   * Symbol imports.
   *
   * @test @internal
   */
  static function unittest_symbolImports () {
    PhlintTest::assertNoIssues('
      namespace a {
        b\A::f();
        $x = new b\A();
      }

      namespace a\b {
        class A {
          function f () {}
        }
      }
    ');
  }

  /**
   * Test referencing classes through variables.
   *
   * @test @internal
   */
  static function unittest_variableClass () {
    PhlintTest::assertIssues('
      $undefinedVariable1::$undefinedVariable2();
    ', [
      '
        Variable Initialization: $undefinedVariable1 on line 1
        Variable `$undefinedVariable1` is used but it is not always initialized.
      ',
      '
        Variable Initialization: $undefinedVariable2 on line 1
        Variable `$undefinedVariable2` is used but it is not always initialized.
      ',
      // @todo: Re-enable after known issues are fixed.
      #'Unable to invoke undefined *$undefinedVariable1::$undefinedVariable2();*.',
    ]);
  }

  /**
   * Test trait method lookup.
   *
   * @test @internal
   */
  static function unittest_traitMethod () {
    PhlintTest::assertNoIssues('
      trait T {
        function foo () {}
      }
      class C {
        use T;
      }
      $c = new C();
      $c->foo();
    ');
  }

  /**
   * Test trait method lookup.
   *
   * @test @internal
   */
  static function unittest_traitMethodWithImport () {
    PhlintTest::assertNoIssues('
      namespace a {
        trait T {
          function foo () {}
        }
      }
      namespace b {
        class C {
          use \a\T;
        }
        $c = new C();
        $c->foo();
      }
    ');
  }

  /**
   * Test import alias lookup.
   *
   * @test @internal
   */
  static function unittest_aliasLookup () {
    PhlintTest::assertNoIssues('
      namespace a\b {
        class D {}
      }
      namespace c {
        use \a\b as i;
        $x = new i\D;
      }
    ');
  }

  /**
   * Test linking to undefined method.
   *
   * @test @internal
   */
  static function unittest_undefinedMethod () {
    PhlintTest::assertIssues('
      class C {
        function foo () {}
      }
      $x = new C();
      $y = $x;
      $y->foo();
      $y->bar();
    ', [
      '
        Name: $y->bar() on line 7
        Expression `$y->bar()` calls function `C::bar`.
        Function `C::bar` not found.
      ',
    ]);
  }

  /**
   * Test linking to an extended interface.
   *
   * @test @internal
   */
  static function unittest_linkToExtendedInterface () {
    PhlintTest::assertIssues('
      namespace e\f {
        use \c;
        function bar (c\d\J $x) {
          $x->foo();
          $x->baz();
        }
      }
      namespace c\d {
        use \a\b;
        interface J extends b\I {}
      }
      namespace a\b {
        interface I {
          function foo () {}
        }
      }
    ', [
      '
        Name: $x->baz() on line 5
        Expression `$x->baz()` calls function `c\d\J::baz`.
        Function `c\d\J::baz` not found.
      ',
    ]);

  }

  /**
   * Test invoking a array element doesn't get linked to an invalid definition
   * causing an infinite recursion in template specialization.
   *
   * @test @internal
   */
  static function unittest_invokeArrayElement () {
    PhlintTest::assertNoIssues('
      namespace a {
        class B {
          function foo () {
            $this->bar["helper"]();
          }
        }
      }
    ');
  }

  /**
   * Test static call linking with relative reference.
   *
   * @test @internal
   */
  static function unittest_staticCallWithRelativeReference () {
    PhlintTest::assertIssues('
      namespace a {
        class D {
          static function foo () { return 1; }
        }
      }
      namespace {
        use \a as c;
        function baz () {
          $fun = c\D::foo();
          $fun = c\D::bar();
        }
      }
    ', [
      '
        Name: c\D::bar() on line 10
        Expression `c\D::bar()` calls function `a\D::bar`.
        Function `a\D::bar` not found.
      ',
    ]);
  }

  /**
   * Test static call linking with relative reference and limited reachability.
   *
   * @test @internal
   */
  static function unittest_staticCallWithRelativeReferenceLimitedReachability () {
    PhlintTest::assertNoIssues('
      namespace a {
        class D {
          static function foo () { return 1; }
        }
      }
      namespace {
        use \a as c;
        function baz () {
          return c\D::foo();
          return c\D::bar();
        }
      }
    ');
  }

  /**
   * @test @internal
   * Test nested extends linking.
   */
  static function unittest_nestedExtends () {
    PhlintTest::assertIssues('
      trait T {
        function Foo () {}
      }
      class A {
        use T;
      }
      class B extends A {}
      class C extends B {}
      class D extends B {}

      $o = new D();
      $o->Foo();
      $o->Bar();
    ', [
      '
        Name: $o->Bar() on line 13
        Expression `$o->Bar()` calls function `D::Bar`.
        Function `D::Bar` not found.
      ',
    ]);
  }

  /**
   * Test linking to a library class with library trait.
   *
   * Regression test for the issue:
   *   Unable to invoke undefined *a\A::bar* for the expression *$foo->bar()* on line 2.
   *
   * @test @internal
   */
  static function unittest_staticDefaultInitialization () {

    $phlint = PhlintTest::create();

    $phlint[] = new MockAutoload([
      'a\A' => '
        namespace a;
        class A {
          use B;
        }
      ',
      'a\B' => '
        namespace a;
        trait B {
          function bar () {}
        }
      ',
    ]);

    PhlintTest::assertIssues($phlint->analyze('
      $foo = new \a\A();
      $foo->bar();
      $foo->baz();
    '), [
      '
        Name: $foo->baz() on line 3
        Expression `$foo->baz()` calls function `a\A::baz`.
        Function `a\A::baz` not found.
      ',
    ]);

  }

}
