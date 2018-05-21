<?php

use \luka8088\Attribute;
use \luka8088\PrimitiveAttribute;

class PHPDocParamTest {

  /**
   * Test type in a new line.
   *
   * @test @internal
   */
  static function typeInANewLine () {

    /**
     * @param
     *   true
     *   $bar
     */
    $foo = function ($bar) {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 1);
    assert($attributes[0]->name == 'param');
    assert(count($attributes[0]->arguments) == 2);
    assert($attributes[0]->arguments[0] == 'true');
    assert($attributes[0]->arguments[1] == '$bar');

  }

  /**
   * Test attribute source for type in a new line.
   *
   * @test @internal
   */
  static function typeInANewLineAttributeSource () {

    /**
     * @param
     *   true
     *   $bar
     */
    $foo = function ($bar) {};

    $attributes = Attribute::getSource($foo);
    assert(count($attributes) == 1);
    assert(preg_replace('/(?s)[ \t\r\n]+/', ' ', $attributes[0]['source']) == '@param true $bar');

  }

  /**
   * Test multiple incomplete parameters.
   *
   * @test @internal
   */
  static function multipleIncomplete () {

    /**
     * @param $bar
     * @param $baz
     * @param $fun
     */
    $foo = function ($bar, $baz, $fun) {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 3);
    assert($attributes[0]->name == 'param');
    assert(count($attributes[0]->arguments) == 1);
    assert($attributes[0]->arguments[0] == '$bar');
    assert($attributes[1]->name == 'param');
    assert(count($attributes[1]->arguments) == 1);
    assert($attributes[1]->arguments[0] == '$baz');
    assert($attributes[2]->name == 'param');
    assert(count($attributes[2]->arguments) == 1);
    assert($attributes[2]->arguments[0] == '$fun');

  }

  /**
   * Test attribute source for multiple incomplete parameters.
   *
   * @test @internal
   */
  static function multipleIncompleteAttributeSource () {

    /**
     * @param $bar
     * @param $baz
     * @param $fun
     */
    $foo = function ($bar, $baz, $fun) {};

    $attributes = Attribute::getSource($foo);
    assert(count($attributes) == 3);
    assert(preg_replace('/(?s)[ \t\r\n]+/', ' ', $attributes[0]['source']) == '@param $bar');
    assert(preg_replace('/(?s)[ \t\r\n]+/', ' ', $attributes[1]['source']) == '@param $baz');
    assert(preg_replace('/(?s)[ \t\r\n]+/', ' ', $attributes[2]['source']) == '@param $fun');

  }

}
