<?php

namespace phlint\rule;

use \ArrayObject;
use \luka8088\phops\MetaContext;
use \Phlint;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\NodeConcept;
use \phlint\phpLanguage;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/isolatedAttribute.md
 */
class IsolatedAttribute {

  function getIdentifier () {
    return 'isolatedAttribute';
  }

  function getCategories () {
    return [
      'attribute',
      'default',
    ];
  }

  function getInferences () {
    return [
      'attribute',
      'declarationLink',
      'isolation',
      'purity',
    ];
  }

  function visitNode ($node) {

    if (!inference\Isolation::isIsolated($node) && !inference\Purity::isPure($node))
      return;

    $context = inference\NodeRelation::contextNode($node) ? inference\NodeRelation::contextNode($node) : $node;

    if ($node instanceof Node\Expr\FuncCall) {
      $isIsolated = true;
      foreach (inference\DeclarationLink::get($node) as $declaration)
        if (!inference\Isolation::isIsolated($declaration))
          $isIsolated = false;
      if (!$isIsolated)
        MetaContext::get(Result::class)->addViolation(
          $node,
          $this->getIdentifier(),
          'Isolated Attribute',
          ucfirst(NodeConcept::referencePrint($context)) . ' has been marked as isolated.'
          . "\n"
          . 'Calling non-isolated function ' . MarkdownBuilder::inlineCode(NodeConcept::displayPrint($node))
          . ' breaks that isolation.',
          'Isolation breach: Calling non-isolated function *' . NodeConcept::displayPrint($node) . '*.'
        );
    }

    if ($node instanceof Node\Expr\StaticPropertyFetch)
      MetaContext::get(Result::class)->addViolation(
        $node,
        $this->getIdentifier(),
        'Isolated Attribute',
        ucfirst(NodeConcept::referencePrint($context)) . ' has been marked as isolated.'
        . "\n"
        . 'Accessing ' . MarkdownBuilder::inlineCode(NodeConcept::displayPrint($node)) . ' breaks that isolation.',
        'Isolation breach: Accessing global variable *' . NodeConcept::displayPrint($node) . '*.'
      );

    if (($node instanceof Node\Expr\Variable) && in_array($node->name, phpLanguage\Fixture::$superglobals))
      MetaContext::get(Result::class)->addViolation(
        $node,
        $this->getIdentifier(),
        'Isolated Attribute',
        ucfirst(NodeConcept::referencePrint($context)) . ' has been marked as isolated.'
        . "\n"
        . 'Accessing superglobal ' . NodeConcept::referencePrint($node) . ' breaks that isolation.',
        'Isolation breach: Accessing superglobal *' . NodeConcept::displayPrint($node) . '*.'
      );

    if (($node instanceof Node\Scalar\MagicConst\Dir) ||
        ($node instanceof Node\Scalar\MagicConst\File) ||
        ($node instanceof Node\Scalar\MagicConst\Line))
      MetaContext::get(Result::class)->addViolation(
        $node,
        $this->getIdentifier(),
        'Isolated Attribute',
        ucfirst(NodeConcept::referencePrint($context)) . ' has been marked as isolated.'
        . "\n"
        . 'Using ' . NodeConcept::referencePrint($node) . ' breaks that isolation.',
        'Isolation breach: Using magic constant *' . NodeConcept::displayPrint($node) . '*.'
      );

    if ($node instanceof Node\Stmt\StaticVar)
      MetaContext::get(Result::class)->addViolation(
        $node,
        $this->getIdentifier(),
        'Isolated Attribute',
        ucfirst(NodeConcept::referencePrint($context)) . ' has been marked as isolated.'
        . "\n"
        . 'Declaring static ' . NodeConcept::referencePrint($node) . ' breaks that isolation.',
        'Isolation breach: Declaring static variable *' . NodeConcept::displayPrint($node) . '*.'
      );

    foreach (inference\Attribute::get($node) as $attribute)
      if ($attribute instanceof Node\Expr\New_ &&
          count($attribute->args) >= 1 &&
          inference\Value::isEqual($attribute->args[0], '__isolationBreach')) {
        MetaContext::get(Result::class)->addViolation(
          $attribute,
          $this->getIdentifier(),
          'Isolated Attribute',
          ucfirst(NodeConcept::referencePrint($context)) . ' has been specialized as isolated.'
          . "\n"
          . 'Its internal functionality however breaks that isolation because it '
          . lcfirst($attribute->args[1]->value->items[0]->value->value),
          'Isolation breach: ' . $attribute->args[1]->value->items[0]->value->value
        );
      }

  }

}
