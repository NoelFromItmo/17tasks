<?php

use \luka8088\Attribute;
use \luka8088\PrimitiveAttribute;

class AttributeTest {

  /** @test @internal */
  static function unittest_generalGetTest () {

    /** @PrimitiveAttribute("foo", ["bar"]) */
    $foo = function ($bar) {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 1);
    assert($attributes[0]->name == 'foo');
    assert($attributes[0]->arguments == ['bar']);

  }

  /** @test @internal */
  static function unittest_phpDocTest () {

    /**
     * @param int $bar The bar!
     * @return void
     */
    $foo = function ($bar) {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 2);
    assert($attributes[0]->name == 'param');
    assert(count($attributes[0]->arguments) == 3);
    assert($attributes[0]->arguments[0] == 'int');
    assert($attributes[0]->arguments[1] == '$bar');
    assert($attributes[0]->arguments[2] == 'The bar!');
    assert($attributes[1]->name == 'return');
    assert(count($attributes[1]->arguments) == 1);
    assert($attributes[1]->arguments[0] == 'void');

  }

  /**
   * Regression test for the following issue:
   *   ParseError: syntax error, unexpected 'var' (T_VAR), expecting ',' or ')'
   *
   * @test @internal
   */
  static function unittest_phpDocTrailingSpaceParamTest () {

    $attributes = array_map([Attribute::class, 'evaluate'], Attribute::extractAttributes('
      /**
       * Does the room contain more allocated beds than the beds per room
       *
       * @param $room' . ' ' . '
       * @return var
       */
    '));

    assert(count($attributes) == 2);
    assert($attributes[0]->name == 'param');
    assert(count($attributes[0]->arguments) == 1);
    assert($attributes[0]->arguments[0] == '$room');
    assert($attributes[1]->name == 'return');
    assert(count($attributes[1]->arguments) == 1);
    assert($attributes[1]->arguments[0] == 'var');

  }

  /** @test @internal */
  static function unittest_phpDocSeeTest () {

    /**
     * @see http://www.example.com/ Example url.
     * @see \Throwable Example class reference.
     * @see \Exception
     * @see
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 4);
    assert($attributes[0]->name == 'see');
    assert($attributes[0]->arguments == ['http://www.example.com/', 'Example url.']);
    assert($attributes[1]->name == 'see');
    assert($attributes[1]->arguments == ['\Throwable', 'Example class reference.']);
    assert($attributes[2]->name == 'see');
    assert($attributes[2]->arguments == ['\Exception']);
    assert($attributes[3]->name == 'see');
    assert($attributes[3]->arguments == []);

  }

  /** @test @internal */
  static function unittest_phpDocArbitraryPrimitiveTest () {

    /**
     * @arbitraryPrimitive A B C.
     * @arbitraryPrimitive D E F.
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 2);
    assert($attributes[0]->name == 'arbitraryPrimitive');
    assert($attributes[0]->arguments == []);
    assert($attributes[1]->name == 'arbitraryPrimitive');
    assert($attributes[1]->arguments == []);

  }

  /**
   * Test doctrine attribute syntax.
   * @see http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/annotations-reference.html

   * @test @internal
   */
  static function unittest_doctrineTest () {

    /**
     * @Annotation
     * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
     * @Column(type="integer", name="login_count" nullable=false, options={"unsigned":true, "default":0})
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);

    // @todo: Implement.
    return;

    assert(count($attributes) == 3);

  }

  /**
   * Test that bad comments do not trigger warnings.
   *
   * @test @internal
   */
  static function unittest_badCommentNoWarning () {

    /**
     * @attribute /*
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);

  }

  /** @test @internal */
  static function unittest_paramsInPlural () {

    /**
     * @params true
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 1);
    assert($attributes[0]->name == 'params');
    assert($attributes[0]->arguments == []);

  }

  /** @test @internal */
  static function unittest_returnsInPlural () {

    /**
     * @returns true
     */
    $foo = function () {};

    $attributes = Attribute::get($foo);
    assert(count($attributes) == 1);
    assert($attributes[0]->name == 'returns');
    assert($attributes[0]->arguments == []);

  }

}
