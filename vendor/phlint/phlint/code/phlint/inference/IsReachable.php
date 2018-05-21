<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \phlint\NodeConcept;
use \PhpParser\Node;

class IsReachable {

  function getIdentifier () {
    return 'isReachable';
  }

  function getDependencies () {
    return [
      'nodeRelation',
      'value',
    ];
  }

  /**
   * Get analysis-time known reachability information.
   *
   * @param object $node Node whose reachability to get.
   * @return bool
   */
  static function get ($node) {

    if (!isset($node->iiData['isNodeReachable']))
      $node->iiData['isNodeReachable'] = inference\IsReachable::lookup($node);

    return $node->iiData['isNodeReachable'];

  }

  /**
   * Lookup the node reachability.
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::isReachable` which will
   * call lookup implicitly if needed.
   *
   * @param object $node Node whose reachability to lookup.
   * @return bool
   *
   * @internal
   */
  static function lookup ($node) {

    if (!$node->getAttribute('inAnalysisScope', true) && (inference\NodeRelation::contextNode($node) || NodeConcept::isContextNode($node)))
      return false;

    if (NodeConcept::isExecutionContextNode($node) && $node->getAttribute('isSpecialization', false))
      return true;

    $previousNode = inference\NodeRelation::previousNode($node);
    if ($previousNode) {
      if (!inference\IsReachable::get($previousNode))
        return false;
      if (NodeConcept::isExecutionBarrier($previousNode))
        return false;
      if ($previousNode instanceof Node\Stmt\If_) {
        if (inference\Value::isTrue($previousNode->cond) && inference\HasExecutionBarrier::get($previousNode))
          return false;
      }
    }

    $scopeNode = inference\NodeRelation::scopeNode($node);
    if ($scopeNode) {
      if (!inference\IsReachable::get($scopeNode))
        return false;
      if (NodeConcept::isConditionalExecutionNode($scopeNode) && inference\Value::isFalse($scopeNode->cond))
          return false;
    }

    $parentNode = inference\NodeRelation::parentNode($node);

    if ($parentNode && !NodeConcept::isContextNode($parentNode) && !inference\IsReachable::get($parentNode))
      return false;

    if ($parentNode instanceof Node\Stmt\If_ && $node instanceof Node\Stmt\Else_)
      if (inference\Value::isTrue($parentNode->cond))
        return false;

    return true;

  }

}
