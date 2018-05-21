<?php

use \phlint\Test as PhlintTest;

class ConditionGuaranteeBooleanOrTest {

  /**
   * Test same condition merging.
   *
   * @test @internal
   */
  static function unittest_sameConditionMerging () {
    PhlintTest::assertNoIssues('
      if (isset($foo) || isset($foo))
        $bar = $foo;
    ');
  }

  /**
   * Test that condition is not enforced in case it does not always apply.
   *
   * @test @internal
   */
  static function unittest_randomFallthrough () {
    PhlintTest::assertIssues('
      if (isset($foo) || ZEND_DEBUG_BUILD)
        $bar = $foo;
    ', [
      '
        Variable Initialization: $foo on line 2
        Variable `$foo` is used but it is not always initialized.
      ',
    ]);
  }

}
