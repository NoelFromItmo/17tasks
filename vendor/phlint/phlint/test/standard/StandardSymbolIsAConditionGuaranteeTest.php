<?php

use \phlint\Test as PhlintTest;

class StandardSymbolIsAConditionGuaranteeTest {

  /**
   * Test `is_a` in a deterministic type conversion function.
   *
   * @test @internal
   */
  static function unittest_deterministicTypeConversion () {
    PhlintTest::assertIssues('
      /**
       * @param string $type
       * @param mixed $value
       * @return mixed
       */
      function to ($type, $value) {
        if (is_a($value, $type))
          return $value;
        throw new Exception();
      }
      class A {}
      $foo = to(A::class, $GLOBALS["baz"]);
      $foo->bar();
    ', [
      '
        Name: $foo->bar() on line 13
        Expression `$foo->bar()` calls function `A::bar`.
        Function `A::bar` not found.
      ',
    ]);
  }

}
