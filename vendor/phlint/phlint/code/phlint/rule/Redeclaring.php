<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\NodeConcept;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/redeclaring.md
 */
class Redeclaring {

  function getIdentifier () {
    return 'redeclaring';
  }

  function getCategories () {
    return [
      'default',
      'phpFatal',
    ];
  }

  function getInferences () {
    return [
      'symbol',
    ];
  }

  function visitNode ($node) {

    if (NodeConcept::isDefinitionNode($node) && !($node instanceof Node\Expr\Closure) && $node->name && !NodeConcept::isNamespaceNode($node)) {

      $definitionNodes = [];

      foreach (inference\SymbolLink::getUnmangled($node) as $symbol)
          foreach (inference\SymbolDeclaration::get($symbol) as $definitionNode)
            if (!$definitionNode->getAttribute('isSpecialization', false))
            if (!$definitionNode->getAttribute('isSpecializationTemp', false))
            if (inference\IsAlwaysExecuted::get($definitionNode))
              $definitionNodes[] = $definitionNode;

      if (!($node instanceof Node\Expr\Closure) && count($definitionNodes) > 1)
        MetaContext::get(Result::class)->addViolation(
          $node,
          $this->getIdentifier(),
          'Redeclaring',
          'Declaration for ' . MarkdownBuilder::inlineCode(NodeConcept::displayPrint($node)) . ' already found.'
          . "\n"
          . 'Having multiple declarations is not allowed.',
          'Having multiple definitions for *' . NodeConcept::sourcePrint($node->name) . '* is prohibited.'
        );
    }

  }

}
