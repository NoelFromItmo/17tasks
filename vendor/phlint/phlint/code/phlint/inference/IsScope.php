<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\NodeConcept;

class IsScope {

  function getIdentifier () {
    return 'isScope';
  }

  /**
   * Is `$node` a scope.
   *
   * @param object $node Node to analyze.
   * @return bool
   */
  static function get ($node) {

    if (NodeConcept::isScopeNode($node))
      return true;

    return isset($node->iiData['isScope']) && $node->iiData['isScope'];

  }

  static function set ($node, $value) {
    assert(!isset($node->iiData['isScope']));
    $node->iiData['isScope'] = $value;
  }

}
