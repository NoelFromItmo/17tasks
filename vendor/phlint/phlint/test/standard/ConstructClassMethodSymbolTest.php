<?php

use \phlint\autoload\Mock as MockAutoload;
use \phlint\Test as PhlintTest;

class ConstructClassMethodSymbolTest {

  /**
   * Test that class method symbol is generated correctly so that it
   * does not overlap with the regular function symbol.
   *
   * @test @internal
   */
  static function classMethodDeclarationSymbol () {

    $phlint = PhlintTest::create();

    $phlint[] = new MockAutoload([
      'A' => '
        class A {
          /**
           * @return $this
           */
          function foo (string $field) {
            return $this;
          }
        }
      ',
    ]);

    $phlint->addSource('
      function foo (array $array) {}
    ', true);

    $phlint->addSource('
      class B {
        function bar (A $a) {
          return $a->foo();
        }
      }
    ');

    PhlintTest::assertNoIssues($phlint->analyze('
      class C {
        function baz () {
          $fun = [];
          foo($fun);
        }
      }
    '));

  }

}
