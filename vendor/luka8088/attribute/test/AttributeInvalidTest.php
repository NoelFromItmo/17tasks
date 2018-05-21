<?php

use \luka8088\Attribute;
use \luka8088\PrimitiveAttribute;

class AttributeInvalidTest {

  /** @test @internal */
  static function unittest_doctrineNamedAttributeTest () {

    /**
     * @Attribute("/", name="value")
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 0);

  }

}
