<?php

use \phlint\Test as PhlintTest;

class RuleManagementTest {

  /**
   * Test rule enabling and disabling.
   * @test @internal
   */
  static function unittest_test () {

    $phlint = PhlintTest::create();

    PhlintTest::assertIssues($phlint->analyze('
      $foo = 2 + "a";
      $x = $y;
      $z[] = 1;
    '), [
      '
        Operand Compatibility: "a" on line 1
        Value `"a"` is always or sometimes of type `string`.
        Expression `2 + "a"` may cause undesired or unexpected behavior with `string` operands.
      ',
      '
        Variable Initialization: $y on line 2
        Variable `$y` is used but it is not always initialized.
      ',
      '
        Variable Append Initialization: $z on line 3
        Variable `$z` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);

    $phlint->disableRule('variableInitialization');

    PhlintTest::assertIssues($phlint->analyze('
      $foo = 2 + "a";
      $x = $y;
      $z[] = 1;
    '), [
      '
        Operand Compatibility: "a" on line 1
        Value `"a"` is always or sometimes of type `string`.
        Expression `2 + "a"` may cause undesired or unexpected behavior with `string` operands.
      ',
      '
        Variable Append Initialization: $z on line 3
        Variable `$z` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);

    $phlint->disableRule('all');

    PhlintTest::assertNoIssues($phlint->analyze('
      $foo = 2 + "a";
      $x = $y;
      $z[] = 1;
    '));

    $phlint->enableRule('variableInitialization');

    PhlintTest::assertIssues($phlint->analyze('
      $foo = 2 + "a";
      $x = $y;
      $z[] = 1;
    '), [
      '
        Variable Initialization: $y on line 2
        Variable `$y` is used but it is not always initialized.
      ',
    ]);

    $phlint->enableRule('all');

    PhlintTest::assertIssues($phlint->analyze('
      $foo = 2 + "a";
      $x = $y;
      $z[] = 1;
    '), [
      '
        Operand Compatibility: "a" on line 1
        Value `"a"` is always or sometimes of type `string`.
        Expression `2 + "a"` may cause undesired or unexpected behavior with `string` operands.
      ',
      '
        Variable Initialization: $y on line 2
        Variable `$y` is used but it is not always initialized.
      ',
      '
        Variable Append Initialization: $z on line 3
        Variable `$z` initialized using append operator.
        Initializing variables using append operator is not allowed.
      ',
    ]);

  }

}
