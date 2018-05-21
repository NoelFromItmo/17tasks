<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

class ProhibitCaseInsensitiveNamingTest {

  /**
   * Test case insensitive naming.
   *
   * @test @internal
   */
  static function unittest_caseInsensitiveNaming () {
    PhlintTest::assertIssues('

      namespace {

        function myFunction () {}
        myfunction();
        MYFUNCTION();
        myFunction();
        myFunCTion();

        function myParameters (int $i = 1, iNt $j = 2, INT $k = 3) {}

      }

      namespace myApp\myNamespace\mySubNamespace {
        class MyClass {}
      }

      namespace otherApp\otherNamespace\otherSubNamespace {
        use \myApp\myNamespace;
        use \myApp\myNamespace\mySubNamespace\MyClass;
        $x = new myNamespace\mySubNamespace\myclass();
        $x = new myNamespace\mySubNamespace\MYCLASS();
        $x = new myNamespace\mySubNamespace\MyClass();
        $x = new myNamespace\mySubNamespace\MyCLaSs();
        $x = new myclass();
        $x = new MYCLASS();
        $x = new MyClass();
        $x = new MyCLaSs();
      }

    ', [
      '
        Case Sensitive Naming: myfunction() on line 5
        Expression `myfunction()` is not using the same letter casing as function `myFunction`.
      ',
      '
        Case Sensitive Naming: MYFUNCTION() on line 6
        Expression `MYFUNCTION()` is not using the same letter casing as function `myFunction`.
      ',
      '
        Case Sensitive Naming: myFunCTion() on line 8
        Expression `myFunCTion()` is not using the same letter casing as function `myFunction`.
      ',
      '
        Case Sensitive Naming: new myNamespace\mySubNamespace\myclass() on line 21
        Expression `new myNamespace\mySubNamespace\myclass()`
          is not using the same letter casing as class `myApp\myNamespace\mySubNamespace\MyClass`.
      ',
      '
        Case Sensitive Naming: new myNamespace\mySubNamespace\MYCLASS() on line 22
        Expression `new myNamespace\mySubNamespace\MYCLASS()`
          is not using the same letter casing as class `myApp\myNamespace\mySubNamespace\MyClass`.
      ',
      '
        Case Sensitive Naming: new myNamespace\mySubNamespace\MyCLaSs() on line 24
        Expression `new myNamespace\mySubNamespace\MyCLaSs()`
          is not using the same letter casing as class `myApp\myNamespace\mySubNamespace\MyClass`.
      ',
      '
        Case Sensitive Naming: new myclass() on line 25
        Expression `new myclass()`
          is not using the same letter casing as class `myApp\myNamespace\mySubNamespace\MyClass`.
      ',
      '
        Case Sensitive Naming: new MYCLASS() on line 26
        Expression `new MYCLASS()`
          is not using the same letter casing as class `myApp\myNamespace\mySubNamespace\MyClass`.
      ',
      '
        Case Sensitive Naming: new MyCLaSs() on line 28
        Expression `new MyCLaSs()`
          is not using the same letter casing as class `myApp\myNamespace\mySubNamespace\MyClass`.
      ',
    ]);
  }

  /**
   * Test indirections.
   * @test @internal
   */
  static function unittest_indirections () {

    $linter = PhlintTest::create();

    $linter->addSource('
      namespace A;
      class Z {
        function foo () {
          $x = new \B\Z();
          $x->bar();
        }
      }
    ');

    $linter->addSource('
      namespace B;
      class Z implements \B\I {
        function bar() {}
      }
      interface I {
        function bar();
      }
    ');

    $linter->addSource('
      namespace C;
      class Z {}
    ');

    $linter->addSource('
      namespace D;
      class Z {
        function baz (\B\I $x) {
          $x->bar();
        }
      }
    ');

    PhlintTest::assertNoIssues($linter->analyze('
      $x = new \A\Z();
      $x = new \C\Z();
      $x = new \D\Z();
    '));

  }

  /**
   * Test methods.
   * @test @internal
   */
  static function unittest_method () {
    PhlintTest::assertIssues('
      class A {
        function Foo () {}
      }
      class B {
        function Bar (A $a) {
          $a->foo();
        }
      }
    ', [
      '
        Case Sensitive Naming: $a->foo() on line 6
        Expression `$a->foo()` is not using the same letter casing as method `A::Foo`.
      ',
    ]);
  }

  /**
   * Test library reporting for insensitive naming.
   *
   * Regression test for the issue:
   *   Expression `$b->bar($x)` is not using the same letter casing as method `function bar("fun")` in *mock:A:3*.
   *     Trace #1: Method *function foo(B $b, "fun")*
   *       specialized for the expression *$a->foo(new B(), "fun")* on line 2.
   *
   * @test @internal
   */
  static function unittest_libraryReport () {

    $linter = PhlintTest::create();

    $linter[] = new MockAutoload([
      'A' => '
        class A {
          function foo (B $b, $x) {
            return $b->Bar($x);
          }
        }
      ',
      'B' => '
        class B {
          function bar ($x) {
            return $x;
          }
        }
      ',
    ]);

    PhlintTest::assertNoIssues($linter->analyze('
      $a = new A();
      $a->foo(new B(), "fun");
    '));

  }


  /**
   * Test `new` variable behavior.
   *
   * Regression test for the issue:
   *   Expression `new $a()` is not using the same letter casing as class `A` on line 8.
   *
   * @test @internal
   */
  static function unittest_newVariable () {
    PhlintTest::assertIssues('
      class A {}
      class B {}
      function foo () {
        if (rand(0, 1))
          $a = "A";
        else
          $a = "b";
        return new $a();
      }
    ', [
      '
        Case Sensitive Naming: new $a() on line 8
        Expression `new $a()` is not using the same letter casing as class `B`.
      ',
    ]);
  }

}
