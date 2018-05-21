<?php

use \phlint\Test as PhlintTest;

class TypeDeclarationNullableTest {

  /**
   * Test nullable undeclared return type.
   *
   * @test @internal
   */
  static function unittest_nullableUndeclaredReturnType () {
    PhlintTest::assertIssues('
      function foo () : ?A {}
    ', [
      '
        Declaration Type: function foo () : ?A on line 1
        Type `A` is undefined.
      ',
    ]);
  }

  /**
   * Test nullable build-in return type.
   *
   * @test @internal
   */
  static function unittest_nullableBuildInReturnType () {
    PhlintTest::assertNoIssues('
      function foo () : ?string {}
    ');
  }

}
