<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \phlint\NodeConcept;
use \PhpParser\Node;

class IsAlwaysExecuted {

  function getIdentifier () {
    return 'isAlwaysExecuted';
  }

  /**
   * Is `$node` always executed?
   *
   * @param string $node
   * @return bool
   */
  static function get ($node) {

    if (NodeConcept::isConditionalExecutionNode($node))
      return false;

    $parent = inference\NodeRelation::parentNode($node);
    if ($parent)
      return inference\IsAlwaysExecuted::get($parent);

    return true;

  }

}
