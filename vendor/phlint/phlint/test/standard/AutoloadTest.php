<?php

use \phlint\Test as PhlintTest;
use \phlint\autoload\Mock as MockAutoload;

class AutoloadTest {

  /**
   * Test autoload on method call.
   *
   * Regression test for the issue:
   *   Unable to invoke undefined *B::bar* for the expression *$foo->bar()* on line 2.
   *
   * @test @internal
   */
  static function unittest_methodCall () {

    $linter = PhlintTest::create();

    $linter[] = new MockAutoload([
      'A' => '
        class A {
          /**
           * @return B
           */
          static function foo () {
            return new B();
          }
        }
      ',
      'B' => '
        class B {
          function bar () {}
        }
      ',
    ]);

    PhlintTest::assertIssues($linter->analyze('
      $foo = A::foo();
      $foo->bar();
      $foo->baz();
    '), [
      '
        Name: $foo->baz() on line 3
        Expression `$foo->baz()` calls function `B::baz`.
        Function `B::baz` not found.
      ',
    ]);

  }

}
