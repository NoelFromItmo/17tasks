<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \Phlint;
use \phlint\Result;
use \PhpParser\Node;
use \PhpParser\Node\Expr\Variable;
use \PhpParser\NodeVisitorAbstract;
use \PhpParser\PrettyPrinter\Standard as PrettyPrinter;

/**
 * @see /documentation/rule/variableVariable.md
 */
class VariableVariable {

  function getIdentifier () {
    return 'variableVariable';
  }

  function getCategories () {
    return [
      'default',
    ];
  }

  function visitNode ($node) {

    if (($node instanceof Variable) && !is_string($node->name)) {
      $prettyPrinter = new PrettyPrinter();
      $expression = $prettyPrinter->prettyPrintExpr($node->name);
      MetaContext::get(Result::class)->addViolation(
        $node,
        $this->getIdentifier(),
        'Variable Variable',
        'Using variable variable is not allowed.',
        'Using variable variable *$' . $expression . '* is prohibited.'
      );
    }

  }

}
