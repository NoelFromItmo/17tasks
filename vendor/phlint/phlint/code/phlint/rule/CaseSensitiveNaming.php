<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\NodeConcept;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/caseSensitiveNaming.md
 */
class CaseSensitiveNaming {

  function getIdentifier () {
    return 'caseSensitiveNaming';
  }

  function getCategories () {
    return [
      'default',
      'tidy',
    ];
  }

  function getInferences () {
    return [
      'symbol',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    if (NodeConcept::isInvocationNode($node))
      $this->enforceRule($node, inference\SymbolLink::get($node), $node->name);

    if ($node instanceof Node\Expr\New_)
      $this->enforceRule($node, inference\SymbolLink::get($node), $node->class);

    if ($node instanceof Node\Stmt\Catch_)
      foreach ($node->types as $type)
        $this->enforceRule($node, inference\SymbolLink::get($type), $type);

  }

  function enforceRule ($node, $symbols, $nameNode) {

    foreach ($symbols as $symbol)
      foreach (inference\SymbolDeclaration::get($symbol) as $definitionNode) {
          if (!NodeConcept::isNamedNode($definitionNode))
            continue;
          if (!$definitionNode->name)
            continue;
          foreach (array_filter($nameNode instanceof Node\Expr\Variable ? array_map(function ($v) { if ($v instanceof Node\Scalar\String_) return $v->value; return ''; }, inference\Value::get($nameNode)) : [$nameNode]) as $nn) {
          $name = NodeConcept::displayPrint($nn);
          $definitionName = NodeConcept::displayPrint($definitionNode->name);
          $checkLength = min(strlen($name), strlen($definitionName));
          if ($checkLength > 0 && strtolower(substr($name, -$checkLength)) == strtolower(substr($definitionName, -$checkLength)) && substr($name, -$checkLength) != substr($definitionName, -$checkLength))
            MetaContext::get(Result::class)->addViolation(
              $node,
              $this->getIdentifier(),
              'Case Sensitive Naming',
              ucfirst(NodeConcept::referencePrint($node)) . ' is not using the same letter casing as'
                . ' ' . NodeConcept::constructTypeName($definitionNode)
                . ' ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID($symbol)) . '.',
              ucfirst(NodeConcept::referencePrintLegacy($node)) . ' is not using the same letter casing as '
                . trim(NodeConcept::constructTypeName($definitionNode) . ' *')
                . inference\Symbol::phpID($symbol) . '*.'
            );
          }

        }

  }

}
