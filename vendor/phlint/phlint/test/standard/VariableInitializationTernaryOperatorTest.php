<?php

use \phlint\Test as PhlintTest;

class VariableInitializationTernaryOperatorTest {

  /**
   * Test variable to ternary operator sub scope propagation.
   *
   * @test @internal
   */
  static function unittest_subScopePropagation () {
    PhlintTest::assertNoIssues('
      function foo () {
        $bar = 1;
        $baz = ZEND_DEBUG_BUILD ? $bar : false;
      }
    ');
  }

  /**
   * That nested ternary condition propagation.
   *
   * @test @internal
   */
  static function unittest_nestedConditionalConnectivities () {
    PhlintTest::assertIssues('
      $x = ($a = 1)
        ? (
          ($b = $a)
            ? (
              ($c = $b)
                ? ($d = $c) && ($e = $f)
                : 0
              )
            : 0
          )
        : 0
      ;
    ', [
      '
        Variable Initialization: $f on line 6
        Variable `$f` is used but it is not always initialized.
      ',
    ]);
  }

}
