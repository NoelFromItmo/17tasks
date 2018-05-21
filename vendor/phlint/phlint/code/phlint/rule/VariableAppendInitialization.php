<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/variableAppendInitialization.md
 */
class VariableAppendInitialization {

  function getIdentifier () {
    return 'variableAppendInitialization';
  }

  function getInferences () {
    return [
      'expressionSpecialization',
      'isInitialization',
    ];
  }

  function visitNode($node) {

    if ($node instanceof Node\Expr\Assign || $node instanceof Node\Expr\AssignRef)
      if ($node->var instanceof Node\Expr\ArrayDimFetch)
        foreach (inference\ExpressionSpecialization::get($node->var->var) as $specializedNode)
          if (inference\IsInitialization::get($specializedNode))
            MetaContext::get(Result::class)->addViolation(
              $node->var->var,
              $this->getIdentifier(),
              'Variable Append Initialization',
              ucfirst(NodeConcept::referencePrint($specializedNode)) . ' initialized using append operator.'
              . "\n"
              . 'Initializing variables using append operator is not allowed.',
              ucfirst(NodeConcept::referencePrintLegacy($specializedNode)) . ' initialized using append operator.'
            );

  }

}
