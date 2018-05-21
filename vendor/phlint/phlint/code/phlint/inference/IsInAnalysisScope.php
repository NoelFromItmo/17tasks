<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;

class IsInAnalysisScope {

  function getIdentifier () {
    return 'isInAnalysisScope';
  }

  /**
   * Is `$node` in analysis scope.
   *
   * @param object $node Node to analyze.
   * @return bool
   */
  static function get ($node) {

    if ($node->getAttribute('inAnalysisScope', null) !== null)
      return $node->getAttribute('inAnalysisScope', true);

    if (isset($node->iiData['isInAnalysisScope']))
      return $node->iiData['isInAnalysisScope'];

    $parentNode = inference\NodeRelation::parentNode($node);
    if ($parentNode)
      return self::get($parentNode);

    return true;

  }

  static function set ($node, $value) {
    assert(!isset($node->iiData['isInAnalysisScope']));
    $node->iiData['isInAnalysisScope'] = $value;
  }

}
