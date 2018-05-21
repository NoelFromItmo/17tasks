<?php

namespace luka8088\phops;

use \RuntimeException;

/**
 * Provides a way to tie a resource lifetime to a current execution scope.
 * The aim is to prove a way to achieve functionality described
 * on http://dlang.org/statement.html#ScopeGuardStatement
 *
 * Example usage:
 *
 *   function foo () {
 *     $_byeBye = DestructCallback::create(function () { echo "Bye-bye.\n"; });
 *     echo "Hello world\n";
 *   }
 *
 * Returns an object which will execute the provided callback once destructed
 * and if assigned to a scope variable it will get garbage collected at
 * the end of scope. Assigning to a scoped variable is necessary as otherwise
 * the destruction happens immediately. Also on the other hand if there are
 * any other references created destruction will be deferred after the end
 * of scope.
 */
class DestructCallback {

  /** @var callable */
  protected $callback;

  static function create ($callback) {
    return new self($callback);
  }

  /** @test @internal */
  static function test_create () {
    $output = '';
    call_user_func(function () use (&$output) {
      $scopeExit = DestructCallback::create(function () use (&$output) { $output .= 'bar'; });
      $output .= 'foo';
    });
    assert($output == 'foobar');
  }

  function __construct ($callback) {
    $this->callback = $callback;
  }

  function __destruct () {
    if (!$this->callback)
      throw new RuntimeException('Callback garbage collected before executed.');
    call_user_func($this->callback);
  }

}
