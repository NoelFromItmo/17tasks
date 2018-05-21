<?php

use \luka8088\Attribute;
use \luka8088\PrimitiveAttribute;

class PHPDocReturnTest {

  /**
   * Test type in a new line.
   *
   * @test @internal
   */
  static function typeInANewLine () {

    /**
     * @return
     *   true
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 1);
    assert($attributes[0]->name == 'return');
    assert(count($attributes[0]->arguments) == 1);
    assert($attributes[0]->arguments[0] == 'true');

  }

  /**
   * Test attribute source for type in a new line.
   *
   * @test @internal
   */
  static function typeInANewLineAttributeSource () {

    /**
     * @return
     *   true
     */
    $foo = function ($bar) {};

    $attributes = Attribute::getSource($foo);
    assert(count($attributes) == 1);
    assert(preg_replace('/(?s)[ \t\r\n]+/', ' ', $attributes[0]['source']) == '@return true');

  }

}
