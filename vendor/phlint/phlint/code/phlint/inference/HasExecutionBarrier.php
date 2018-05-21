<?php

namespace phlint\inference;

use \phlint\inference;

class HasExecutionBarrier {

  function getIdentifier () {
    return 'hasExecutionBarrier';
  }

  static function get ($node) {
    $executionBarrier = inference\ExecutionBarrier::get($node);
    return count($executionBarrier) > 0 && count(array_filter($executionBarrier)) == count($executionBarrier);
  }

}
