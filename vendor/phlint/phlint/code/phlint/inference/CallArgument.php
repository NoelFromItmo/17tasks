<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;

class CallArgument {

  function getIdentifier () {
    return 'callArgument';
  }

  /**
   * The arguments yield as it is at the point of invocation.
   *
   * @param object $node Node whose arguments yield to get.
   * @return [][]object
   */
  static function get ($node) {
    // @todo: Remove.
    if (!isset($node->iiData['callArguments']))
      return $node->args;
    assert(isset($node->iiData['callArguments']), 'Not set yet.');
    return $node->iiData['callArguments'];
  }

  static function set ($node, $arguments) {
    assert(!isset($node->iiData['callArguments']), 'Already set.');
    $node->iiData['callArguments'] = $arguments;
  }

}
