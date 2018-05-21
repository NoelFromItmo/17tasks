<?php

namespace luka8088\phops;

use \RuntimeException;

/**
 * Provides a way to expand the current context in a way that it virtually
 * gets propagates through the stack.
 *
 * Example usage:
 *
 *   class A {}
 *
 *   function foo () {
 *     assert(!MetaContext::exists(A::class)); // Not entered yet.
 *     bar();
 *     assert(!MetaContext::exists(A::class)); // Closed at the end of bar.
 *   }
 *
 *   function bar () {
 *     $aMetaContext = MetaContext::enterDestructible(A::class, new A());
 *     baz();
 *   }
 *
 *   function baz () {
 *     MetaContext::get(A::class); // Exists and yields an instance of A.
 *   }
 *
 * Also the contexts are stacked so that recursion causes no unexpected
 * side effects.
 */
class MetaContext {

  /** @internal */
  static $contexts = [];

  /** @internal */
  static $stacks = [];

  static function exists ($type) {
    return isset(self::$contexts[$type]);
  }

  /** @test @internal */
  static function test_exists () {
    assert(!self::exists(\ArrayObject::class));
    $metaContext = self::enterDestructible(\ArrayObject::class, new \ArrayObject());
    assert(self::exists(\ArrayObject::class));
  }

  static function get ($type) {
    if (!isset(self::$contexts[$type]))
      throw new RuntimeException('Metacontext for type *' . $type . '* not initialized.');
    return self::$contexts[$type];
  }

  /** @test @internal */
  static function test_get () {
    $arrayObject = new \ArrayObject();
    $metaContext = self::enterDestructible(\ArrayObject::class, $arrayObject);
    assert(self::get(\ArrayObject::class) === $arrayObject);
    $arrayObject2 = new \ArrayObject();
    $metaContext2 = self::enterDestructible(\ArrayObject::class, $arrayObject2);
    assert(self::get(\ArrayObject::class) === $arrayObject2);
  }

  static function enterDestructible ($type, $value) {
    if (!isset(self::$stacks[$type]))
      self::$stacks[$type] = [];
    array_push(self::$stacks[$type], $value);
    self::$contexts[$type] = $value;
    return DestructCallback::create(function () use ($type) {
      array_pop(self::$stacks[$type]);
      unset(self::$contexts[$type]);
      if (count(self::$stacks[$type]) > 0)
        self::$contexts[$type] = end(self::$stacks[$type]);
      if (count(self::$stacks[$type]) == 0)
        unset(self::$stacks[$type]);
    });
  }

}
