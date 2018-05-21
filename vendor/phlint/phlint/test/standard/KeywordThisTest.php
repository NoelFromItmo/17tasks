<?php

use \phlint\Test as PhlintTest;

class KeywordThisTest {

  /**
   * Test template specialization with $this keyword.
   *
   * @test @internal
   */
  static function unittest_templateSpecialization () {
    PhlintTest::assertIssues('
      class A extends ArrayObject {
        function foo () {
          $this["fun"] = null;
          $this->bar($this);
        }
        function bar ($object) {
          $object->baz();
        }
      }
    ', [
      '
        Name: $object->baz() on line 7
        Expression `$object->baz()` calls function `A::baz`.
        Function `A::baz` not found.
          Trace #1:
            #1: Method *function bar(A $object)* specialized for the expression *$this->bar($this)* on line 4.
      ',
    ]);
  }

}
