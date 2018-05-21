<?php

namespace phlint\inference;

use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class ScopedGuarantee {

  /**
   * Analyzes the scope node and infers the guarantees that can be made for execution inside of it.
   *
   * @param object $node Node to analyze.
   * @return object[string][]
   */
  static function get ($node) {

    if (!isset($node->iiData['scopeGuarantee']))
      $node->iiData['scopeGuarantee'] = inference\ScopedGuarantee::lookup($node);

    return $node->iiData['scopeGuarantee'];

  }

  /**
   * Analyzes the scope node and infers the guarantees that can be made for execution inside of it.
   *
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @internal
   */
  static function lookup ($node) {

    if ($node instanceof Node\Stmt\If_)
      return inference\ConditionalGuarantee::get($node->cond);

    $parentNode = inference\NodeRelation::parentNode($node);

    if ($parentNode instanceof Node\Expr\BinaryOp\BooleanAnd) {
      if ($node === $parentNode->right)
        return inference\ConditionalGuarantee::get($parentNode->left);
      return [];
    }

    if ($parentNode instanceof Node\Expr\Ternary) {
      if ($parentNode->if && $node === $parentNode->if)
        return inference\ConditionalGuarantee::get($parentNode->cond);
      if ($node === $parentNode->else)
        return inference\ConditionalGuarantee::get(new Node\Expr\BooleanNot($parentNode->cond));
      return [];
    }

    if ($parentNode instanceof Node\Stmt\If_ && $node instanceof Node\Stmt\Else_)
      return inference\ConditionalGuarantee::get(new Node\Expr\BooleanNot($parentNode->cond));

    if (NodeConcept::isConditionalExecutionNode($node))
      return inference\ConditionalGuarantee::get($node->cond);

    return [];

  }

}
