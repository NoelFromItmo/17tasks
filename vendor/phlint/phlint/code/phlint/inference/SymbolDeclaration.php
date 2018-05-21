<?php

namespace phlint\inference;

use \luka8088\phops\MetaContext;
use \phlint\IIData;
use \phlint\inference;
use \PhpParser\Node;

class SymbolDeclaration {

  function getIdentifier () {
    return 'symbolDeclaration';
  }

  function getPass () {
    return 10;
  }

  function getDependencies () {
    return [
      'declarationSymbol',
    ];
  }

  /**
   * Gets all declarations for the given symbol.
   *
   * @param string $symbol Symbol who's declarations to lookup.
   * @return object[]
   */
  static function get ($symbol) {
    $metaContextKey = 'symbolDeclarations:' . $symbol;
    if (!isset(MetaContext::get(IIData::class)[$metaContextKey]))
      MetaContext::get(IIData::class)[$metaContextKey] = [];
    return MetaContext::get(IIData::class)[$metaContextKey];
  }

  static function afterNode ($node) {

    if (!(false
      || $node instanceof Node\Const_
      || $node instanceof Node\Expr\Closure
      || $node instanceof Node\Stmt\Class_
      || $node instanceof Node\Stmt\ClassMethod
      || $node instanceof Node\Stmt\Function_
      || $node instanceof Node\Stmt\Interface_
      || $node instanceof Node\Stmt\Namespace_
      || $node instanceof Node\Stmt\Trait_
    ))
      return;

    $symbol = inference\DeclarationSymbol::get($node);

    $metaContextKey = 'symbolDeclarations:' . $symbol;
    if (!isset(MetaContext::get(IIData::class)[$metaContextKey]))
      MetaContext::get(IIData::class)[$metaContextKey] = [];

    $isNodeAttached = false;
    foreach (MetaContext::get(IIData::class)[$metaContextKey] as $existingNode)
      if ($existingNode === $node)
        $isNodeAttached = true;
    if (!$isNodeAttached)
      MetaContext::get(IIData::class)[$metaContextKey][] = $node;

  }

}
