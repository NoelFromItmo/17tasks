<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;

class IsInitialization {

  function getIdentifier () {
    return 'isInitialization';
  }

  function getDependencies () {
    return [
      'simulation',
    ];
  }

  /**
   * Is `$node` an initialization of a symbol?
   *
   * @param object $node
   * @return bool
   */
  static function get ($node) {

    $originNode = inference\NodeRelation::originNode($node);

    if (isset($originNode->iiData['nodeSymbolIsInitialization:' . inference\Symbol::identifier($node)]))
      return $originNode->iiData['nodeSymbolIsInitialization:' . inference\Symbol::identifier($node)];

    return false;

  }

  static function set ($node, $symbol, $value) {
    $node->iiData['nodeSymbolIsInitialization:' . $symbol] = $value;
  }

}
