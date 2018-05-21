<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \PhpParser\Node;

class DeclarationSymbol {

  function getIdentifier () {
    return 'declarationSymbol';
  }

  static function set ($node, $symbol) {
    $node->iiData['declarationSymbol'] = $symbol;
  }

  /**
   * Get node analysis-time known declaration symbols.
   *
   * @param object|string $node Node whose symbols to get or a php keyword.
   * @return string
   */
  static function get ($node) {

    if (is_string($node))
      return inference\Symbol::identifier($node, 'auto');

    if ($node instanceof Node\Expr\ClosureUse)
      return inference\Symbol::identifier($node->var, 'variable');

    if ($node instanceof Node\Param)
      return inference\Symbol::identifier($node);

    if ($node instanceof Node\Stmt\Catch_)
      return inference\Symbol::identifier($node->var, 'variable');

    if ($node instanceof Node\Stmt\StaticVar)
      return inference\Symbol::identifier(class_exists(Node\Identifier::class) ? $node->var : $node->name, 'variable');

    if (!isset($node->iiData['declarationSymbol']))
      $node->iiData['declarationSymbol'] = inference\DeclarationSymbol::lookup($node);

    return $node->iiData['declarationSymbol'];

  }

  /**
   * Get node analysis-time known declaration symbols.
   *
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @internal
   *
   * @param object $node Node whose symbols to get.
   * @return string
   */
  static function lookup ($node) {

    if ($node instanceof Node\Const_) {
      $contextNode = inference\NodeRelation::contextNode($node);
      if ($contextNode instanceof Node\Stmt\Class_)
        return inference\DeclarationSymbol::get($contextNode)
          . '.' . inference\Symbol::identifier($node->name, 'constant');
      $namespaceNode = inference\NodeRelation::namespaceNode($node);
      return
        ($namespaceNode && $namespaceNode->name ? inference\DeclarationSymbol::get($namespaceNode) . '.' : '')
        . inference\Symbol::identifier($node->name, 'constant')
      ;
    }

    if ($node instanceof Node\Expr\Closure) {
      $contextNode = inference\NodeRelation::contextNode($node);
      if ($contextNode)
        return inference\DeclarationSymbol::get($contextNode)
          . '.' . inference\Symbol::identifier($node, 'function');
      $namespaceNode = inference\NodeRelation::namespaceNode($node);
      return
        ($namespaceNode && $namespaceNode->name ? inference\DeclarationSymbol::get($namespaceNode) . '.' : '')
        . inference\Symbol::identifier($node, 'function')
      ;
    }

    if ($node instanceof Node\Stmt\Class_) {
      $namespaceNode = inference\NodeRelation::namespaceNode($node);
      return
        ($namespaceNode && $namespaceNode->name ? inference\DeclarationSymbol::get($namespaceNode) . '.' : '')
        . inference\Symbol::identifier($node->name, 'class')
      ;
    }

    if ($node instanceof Node\Stmt\ClassMethod)
      return inference\DeclarationSymbol::get(inference\NodeRelation::contextNode($node))
        . '.' . inference\Symbol::identifier($node->name, 'function');

    if ($node instanceof Node\Stmt\Function_) {
      $namespaceNode = inference\NodeRelation::namespaceNode($node);
      return
        ($namespaceNode && $namespaceNode->name ? inference\DeclarationSymbol::get($namespaceNode) . '.' : '')
        . inference\Symbol::identifier($node->name, 'function')
      ;
    }

    if ($node instanceof Node\Stmt\Interface_) {
      $namespaceNode = inference\NodeRelation::namespaceNode($node);
      return
        ($namespaceNode && $namespaceNode->name ? inference\DeclarationSymbol::get($namespaceNode) . '.' : '')
        . inference\Symbol::identifier($node->name, 'class')
      ;
    }

    if ($node instanceof Node\Stmt\Namespace_)
      return $node->name ? inference\Symbol::identifier($node->name, 'namespace') : '';

    if ($node instanceof Node\Stmt\Trait_) {
      $namespaceNode = inference\NodeRelation::namespaceNode($node);
      return
        ($namespaceNode && $namespaceNode->name ? inference\DeclarationSymbol::get($namespaceNode) . '.' : '')
        . inference\Symbol::identifier($node->name, 'class')
      ;
    }

    return '';

  }

}
