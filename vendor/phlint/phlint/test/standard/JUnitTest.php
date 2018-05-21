<?php

use \phlint\Test as PhlintTest;

class JUnitTest {

  /**
   * Test no context.
   *
   * @test @internal
   */
  static function unittest_noContext () {

    $phlint = PhlintTest::create();

    $phlint[] = new \phlint\report\JUnit(fopen(sys_get_temp_dir() . '/qzcihtw4h6hinvzk6gsrrcgk26rg-junit.xml', 'w'));

    $phlint->analyze('
      $foo = $bar;
    ');

    PhlintTest::assertEquals(file_get_contents(sys_get_temp_dir() . '/qzcihtw4h6hinvzk6gsrrcgk26rg-junit.xml'), '
      <?xml version="1.0" encoding="UTF-8" ?>
      <testsuites>
        <testsuite name="Phlint">
          <testcase name="OK"></testcase>
          <testcase name="Variable Initialization: $bar">
            <failure message="Variable Initialization: $bar on line 1">
              Variable `$bar` is used but it is not always initialized.
              Rule documentation: https://gitlab.com/phlint/phlint/blob/master/documentation/rule/variableInitialization.md
            </failure>
          </testcase>
        </testsuite>
      </testsuites>
    ');

  }

  /**
   * Test testcase name generation.
   *
   * @test @internal
   */
  static function unittest_testcaseName () {

    $phlint = PhlintTest::create();

    $phlint[] = new \phlint\report\JUnit(fopen(sys_get_temp_dir() . '/nzxqbj4me9y8eqovn2b7ovuv-junit.xml', 'w'));

    $phlint->analyze('
      namespace a;
      class B {
        function foo () {
          $bar = $baz;
        }
      }
    ');

    PhlintTest::assertEquals(file_get_contents(sys_get_temp_dir() . '/nzxqbj4me9y8eqovn2b7ovuv-junit.xml'), '
      <?xml version="1.0" encoding="UTF-8" ?>
      <testsuites>
        <testsuite name="Phlint">
          <testcase name="OK"></testcase>
          <testcase name="Variable Initialization: $baz in method a\B::foo">
            <failure message="Variable Initialization: $baz on line 4">
              Variable `$baz` is used but it is not always initialized.
              Rule documentation: https://gitlab.com/phlint/phlint/blob/master/documentation/rule/variableInitialization.md
            </failure>
          </testcase>
        </testsuite>
      </testsuites>
    ');

  }

  /**
   * Test testcase name generation in inline function.
   *
   * @test @internal
   */
  static function unittest_testcaseNameInInlineFunction () {

    $phlint = PhlintTest::create();

    $phlint[] = new \phlint\report\JUnit(fopen(sys_get_temp_dir() . '/lxlefc4oop5m7cur6ocwnoqj-junit.xml', 'w'));

    $phlint->analyze('
      namespace a;
      class B {
        function foo () {
          return function () {
            if (rand(0, 1))
              $bar = $baz;
          };
        }
      }
    ');

    PhlintTest::assertEquals(file_get_contents(sys_get_temp_dir() . '/lxlefc4oop5m7cur6ocwnoqj-junit.xml'), '
      <?xml version="1.0" encoding="UTF-8" ?>
      <testsuites>
        <testsuite name="Phlint">
          <testcase name="OK"></testcase>
          <testcase name="Variable Initialization: $baz in method a\B::foo">
            <failure message="Variable Initialization: $baz on line 6">
              Variable `$baz` is used but it is not always initialized.
              Rule documentation: https://gitlab.com/phlint/phlint/blob/master/documentation/rule/variableInitialization.md
            </failure>
          </testcase>
        </testsuite>
      </testsuites>
    ');

  }

  /**
   * Test phpdoc @param.
   *
   * @test @internal
   */
  static function unittest_phpDocParam () {

    $phlint = PhlintTest::create();

    $phlint[] = new \phlint\report\JUnit(fopen(sys_get_temp_dir() . '/hponbxzcsdzu3rw8jvfiubtdgvo8-junit.xml', 'w'));

    $phlint->analyze('
      namespace a;
      class B {
        /**
         * @param $bar
         */
        function foo ($bar) {}
      }
    ');

    PhlintTest::assertEquals(file_get_contents(sys_get_temp_dir() . '/hponbxzcsdzu3rw8jvfiubtdgvo8-junit.xml'), '
      <?xml version="1.0" encoding="UTF-8" ?>
      <testsuites>
        <testsuite name="Phlint">
          <testcase name="OK"></testcase>
          <testcase name="PHPDoc: @param $bar in method a\B::foo">
            <failure message="PHPDoc: @param $bar on line 4">
              PHPDoc is not valid without a type.
              Rule documentation: https://gitlab.com/phlint/phlint/blob/master/documentation/rule/phpDoc.md
            </failure>
          </testcase>
        </testsuite>
      </testsuites>
    ');

  }

}
