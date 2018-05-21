<?php

use \phlint\Test as PhlintTest;

class MagicToStringTest {

  /**
   * Test implicit conversion of object that implements `__toString` to string parameter.
   *
   * @test @internal
   */
  static function unittest_implicitConversionToStringParameter () {
    PhlintTest::assertIssues('
      class A { function __toString () { return ""; } }
      class B {}
      function foo (string $bar) {}
      foo(new A());
      foo(new B());
    ', [
      '
        Argument Compatibility: new B() on line 5
        Argument #1 passed in the expression `foo(new B())` is of type `B`.
        A value of type `B` is not implicitly convertible to type `string`.
      ',
    ]);
  }

}
