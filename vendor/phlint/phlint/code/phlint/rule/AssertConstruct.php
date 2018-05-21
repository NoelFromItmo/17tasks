<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\Result;

/**
 * @see /documentation/rule/assertConstruct.md
 */
class AssertConstruct {

  function getIdentifier () {
    return 'assertConstruct';
  }

  function getCategories () {
    return [
      'default',
      'strict',
    ];
  }

  function getInferences () {
    return [
      'value',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    if ($node->getAttribute('isGenerated', false))
      return;

    if (NodeConcept::isInvocationNode($node) && inference\SymbolLink::getUnmangled($node) == ['f_assert'])
      if (count($node->args) > 0)
        foreach (inference\Value::get($node->args[0]) as $value)
          if (inference\Value::isFalse($value))
            MetaContext::get(Result::class)->addViolation(
              $node,
              $this->getIdentifier(),
              'Assert Construct',
              'Assertion ' . NodeConcept::referencePrint($node) . ' is not always true.'
              . "\n"
              . "Assertions must always be true.",
              'Assertion failure for the ' . NodeConcept::referencePrintLegacy($node) . '.'
            );

  }

}
