<?php

use \phlint\Test as PhlintTest;

/**
 * @see http://www.php.net/constants
 */
class ConstantTest {

  /**
   * Constant definition test.
   * @test @internal
   */
  static function unittest_constantDefinition () {
    // @todo: Enable when implemented.
    return;
    PhlintTest::assertIssues('
      define("FoO", 1);
      $x = FoO;
      $y = foo;
    ', [
      'foo is undefined',
    ]);
  }

}
