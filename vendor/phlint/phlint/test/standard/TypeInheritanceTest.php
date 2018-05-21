<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

class TypeInheritanceTest {

  /**
   * Test inheritance inference through aliases.
   *
   * Regression test for the issue:
   *   Provided argument *new F()* of type *A\F* is not implicitly convertible to type *B\C*
   *     in the expression *$baz->foo(new F())* on line 5.
   *
   * @test @internal
   */
  static function unittest_inheritanceInferenceThroughAliases () {

    $linter = PhlintTest::create();

    $linter[] = new MockAutoload([
      'A\G' => '
        namespace A;
        use \B\C;
        use \B\D\E;
        class G {
          function foo (C $bar) {}
        }
      ',
      'A\F' => '
        namespace A;
        use \B\D\E;
        class F extends E {}
      ',
      'B\D\E' => '
        namespace B\D;
        use \B\C;
        class E extends C {}
      ',
      'B\C' => '
        namespace B;
        abstract class C {}
      ',
    ]);

    PhlintTest::assertNoIssues($linter->analyze('
      namespace H;
      use \A\G;
      use \A\F;
      $baz = new G();
      $baz->foo(new F());
    '));

  }

}
