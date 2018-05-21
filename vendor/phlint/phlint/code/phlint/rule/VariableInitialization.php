<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\Result;

/**
 * @see /documentation/rule/variableInitialization.md
 */
class VariableInitialization {

  function getIdentifier () {
    return 'variableInitialization';
  }

  function getCategories () {
    return [
      'default',
      'strict',
    ];
  }

  function getInferences () {
    return [
      'evaluation',
      'expressionSpecialization',
      'nodeIntersection',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    foreach (inference\ExpressionSpecialization::get($node) as $specializedNode) {
      foreach (inference\Evaluation::get($specializedNode) as $specializedNodeYieldNode)
      if (!inference\NodeIntersection::get($specializedNodeYieldNode, new pnode\SymbolAlias('o_defined')))
        MetaContext::get(Result::class)->addViolation(
          $specializedNode,
          $this->getIdentifier(),
          'Variable Initialization',
          ucfirst(NodeConcept::referencePrint($specializedNode)) . ' is used but it is not always initialized.',
          ucfirst(NodeConcept::referencePrintLegacy($specializedNode)) . ' used before initialized.'
        );
    }

  }

}
