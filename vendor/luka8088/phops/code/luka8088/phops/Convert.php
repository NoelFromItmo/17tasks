<?php

namespace luka8088\phops;

use \RuntimeException;

class Convert {

  /**
   * Converts a `$value` of any type to a value of type `$type`.
   *
   * If passed in value cannot be converted to a value of type `$type` without data loss
   * then a `RuntimeException` is thrown.
   *
   * @param string $type
   * @param mixed $value
   * @return mixed
   */
  static function to ($type, $value) {
    assert(count(func_get_args()) == 2);
    if ($type == 'bool')
      return self::toBool($value);
    if ($type == 'float')
      return self::toFloat($value);
    if ($type == 'int')
      return self::toInt($value);
    if ($type == 'string')
      return self::toString($value);
    if (is_a($value, $type))
      return $value;
    throw new RuntimeException('Unable to convert to *' . $type . '*.');
  }

  /** @test @internal */
  static function test_to () {
    assert(self::to('bool', 1) === true);
    assert(self::to('float', '1.1') === 1.1);
    assert(self::to('int', '5') === 5);
    assert(self::to('string', 1.1) === '1.1');
    assert(self::to(\ArrayAccess::class, new \ArrayObject()) instanceof \ArrayAccess);
  }

  /**
   * Converts a value to `bool`.
   *
   * If passed in value cannot be converted to `bool` without data loss then a `RuntimeException` is thrown.
   *
   * @param mixed $value
   * @return bool
   */
  static function toBool ($value) {
    assert(count(func_get_args()) == 1);
    if (is_scalar($value)) {
      $convertedValue = filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
      if ($convertedValue !== null)
        return $convertedValue;
    }
    if (is_object($value) && method_exists($value, 'toBool'))
      return self::toBool($value->toBool());
    throw new RuntimeException('Unable to convert to bool.');
  }

  /** @test @internal */
  static function test_toBool () {
    assert(self::to('bool', 1) === true);
  }

  /**
   * Converts a value to `float`.
   *
   * If passed in value cannot be converted to `float` without data loss then a `RuntimeException` is thrown.
   *
   * @param mixed $value
   * @return float
   */
  static function toFloat ($value) {
    assert(count(func_get_args()) == 1);
    if (is_scalar($value)) {
      $convertedValue = filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
      if ($convertedValue !== null)
        return $convertedValue;
    }
    if (is_object($value) && method_exists($value, 'toFloat'))
      return self::toFloat($value->toFloat());
    throw new RuntimeException('Unable to convert to float.');
  }

  /** @test @internal */
  static function test_toFloat () {
    assert(self::to('float', '1.1') === 1.1);
  }

  /**
   * Converts a value to `int`.
   *
   * If passed in value cannot be converted to `int` without data loss then a `RuntimeException` is thrown.
   *
   * @param mixed $value
   * @return int
   */
  static function toInt ($value) {
    assert(count(func_get_args()) == 1);
    if (is_scalar($value)) {
      /**
       * Conversion to float is being applied to the value to allow leading zeros.
       * @see https://bugs.php.net/bug.php?id=43372
       */
      $floatValue = filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
      $convertedValue = filter_var($floatValue, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
      if ($convertedValue !== null)
        return $convertedValue;
    }
    if (is_object($value) && method_exists($value, 'toInt'))
      return self::toInt($value->toInt());
    throw new RuntimeException('Unable to convert to int.');
  }

  /** @test @internal */
  static function test_toInt () {
    assert(self::to('int', '-05') === -5);
    assert(self::to('int', '05') === 5);
    assert(self::to('int', '05.0') === 5);
    assert(self::to('int', '5') === 5);
  }

  /**
   * Converts a value to `string`.
   *
   * If passed in value cannot be converted to `string` without data loss then a `RuntimeException` is thrown.
   *
   * @param mixed $value
   * @return string
   */
  static function toString ($value) {
    assert(count(func_get_args()) == 1);
    if (is_string($value) || is_int($value) || is_float($value))
      return (string) $value;
    if (is_object($value) && method_exists($value, 'toString'))
      return self::toString($value->toString());
    throw new RuntimeException('Unable to convert to string.');
  }

  /** @test @internal */
  static function test_toString () {
    assert(self::to('string', 1.1) === '1.1');
  }

}
