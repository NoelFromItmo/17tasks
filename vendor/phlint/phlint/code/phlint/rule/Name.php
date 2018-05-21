<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\IIData;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/name.md
 */
class Name {

  function getIdentifier () {
    return 'name';
  }

  function getCategories () {
    return [
      'default',
      'fatal',
    ];
  }

  function getInferences () {
    return [
      'concept',
      'symbol',
      'templateSpecialization',
      'value',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    if (!NodeConcept::isInvocationNode($node) && !($node instanceof Node\Expr\New_))
      return;

    foreach (inference\ExpressionSpecialization::get($node) as $specializedNode) {
      if ($specializedNode instanceof Node\Expr\FuncCall) {
        if (!in_array(inference\Concept::nodeConcept($specializedNode->name)->id, ['', 't_mixed', 't_string', 'c_closure'])) {
          MetaContext::get(Result::class)->addViolation(
            $node,
            $this->getIdentifier(),
            'Name',
            ucfirst(NodeConcept::referencePrint($node)) . ' makes a function call to a value of type '
            . MarkdownBuilder::inlineCode(inference\Symbol::phpID(inference\Concept::nodeConcept($specializedNode->name))) . '.'
            . "\n"
            . 'A function name cannot be of type ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID(inference\Concept::nodeConcept($specializedNode->name))) . '.',
            'Value of type *' . inference\Symbol::phpID(inference\Concept::nodeConcept($specializedNode->name)) . '*'
            . ' is not a valid function name in the ' . NodeConcept::referencePrintLegacy($node) . '.'
          );
          continue;
        }
        if (!inference\IsCallable::get($specializedNode)) {
          if (inference\Symbol::phpID($specializedNode->name) != '')
          if (inference\Symbol::phpID($specializedNode->name) != 'mixed')
          MetaContext::get(Result::class)->addViolation(
            $node,
            $this->getIdentifier(),
            'Name',
            ucfirst(NodeConcept::referencePrint($node)) . ' calls function '
            . MarkdownBuilder::inlineCode(inference\Symbol::phpID($specializedNode->name)) . '.'
            . "\n"
            . 'Function ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID($specializedNode->name))
            . ' not found.',
            'Unable to invoke undefined *' . inference\Symbol::phpID($specializedNode->name) . '*' .
            ' for the ' . NodeConcept::referencePrintLegacy($node) . '.'
          );
        }
      }
      if ($specializedNode instanceof Node\Expr\MethodCall) {
        if (!inference\IsCallable::get($specializedNode))
          if (inference\Symbol::phpID(inference\Concept::get($specializedNode->var)) != '')
          if (inference\Symbol::phpID(inference\Concept::get($specializedNode->var)) != 'mixed')
          if (inference\Symbol::phpID(inference\Concept::get($specializedNode->var)) != 'object')
          if (is_string($specializedNode->name) || $specializedNode->name instanceof Node\Identifier || $specializedNode->name instanceof Node\Scalar\String_)
          MetaContext::get(Result::class)->addViolation(
            $node,
            $this->getIdentifier(),
            'Name',
            ucfirst(NodeConcept::referencePrint($node)) . ' calls function '
            . MarkdownBuilder::inlineCode(inference\Symbol::phpID(inference\Concept::get($specializedNode->var)) . '::' . NodeConcept::displayPrint($specializedNode->name)) . '.'
            . "\n"
            . 'Function ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID(inference\Concept::get($specializedNode->var)) . '::' . NodeConcept::displayPrint($specializedNode->name))
            . ' not found.',
            'Unable to invoke undefined *' . inference\Symbol::phpID(inference\Concept::get($specializedNode->var)) . '::' . NodeConcept::displayPrint($specializedNode->name) . '*' .
            ' for the ' . NodeConcept::referencePrintLegacy($node) . '.'
          );
      }
      if ($specializedNode instanceof Node\Expr\StaticCall) {
        if (!inference\IsCallable::get($specializedNode))
          if (inference\Symbol::phpID($specializedNode->class) != '')
          if (inference\Symbol::phpID($specializedNode->class) != 'mixed')
          MetaContext::get(Result::class)->addViolation(
            $node,
            $this->getIdentifier(),
            'Name',
            ucfirst(NodeConcept::referencePrint($node)) . ' calls function '
            . MarkdownBuilder::inlineCode(inference\Symbol::phpID($specializedNode->class) . '::' . NodeConcept::displayPrint($specializedNode->name)) . '.'
            . "\n"
            . 'Function ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID($specializedNode->class) . '::' . NodeConcept::displayPrint($specializedNode->name))
            . ' not found.',
            'Unable to invoke undefined *' . inference\Symbol::phpID($specializedNode->class) . '::' . NodeConcept::displayPrint($specializedNode->name) . '*' .
            ' for the ' . NodeConcept::referencePrintLegacy($node) . '.'
          );
      }
    }

    if ($node instanceof Node\Expr\FuncCall)
      $this->enforceRule($node, $node);

    if ($node instanceof Node\Expr\New_)
      $this->enforceRule($node, $node);

  }

  function enforceRule ($expressionNode, $symbolNode) {
    foreach (inference\SymbolLink::getUnmangled($symbolNode) as $symbol)
      if (inference\Symbol::phpID($symbol) != '')
      if (inference\Symbol::phpID($symbol) != 'mixed')
      if (count(inference\SymbolDeclaration::get($symbol)) == 0)
        MetaContext::get(Result::class)->addViolation(
          $expressionNode,
          $this->getIdentifier(),
          'Name',
          ucfirst(NodeConcept::referencePrint($expressionNode)) . ' calls function '
          . MarkdownBuilder::inlineCode(inference\Symbol::phpID($symbol)) . '.'
          . "\n"
          . 'Function ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID($symbol))
          . ' not found.',
          'Unable to invoke undefined *' . inference\Symbol::phpID($symbol) . '*'
          . ' for the ' . NodeConcept::referencePrintLegacy($expressionNode) . '.'
        );
  }

}
