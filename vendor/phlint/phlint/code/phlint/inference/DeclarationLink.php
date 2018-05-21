<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\inference;
use \phlint\NodeConcept;
use \PhpParser\Node;

class DeclarationLink {

  function getIdentifier () {
    return 'declarationLink';
  }

  function getDependencies () {
    return [
      'symbolDeclaration',
      'symbolLink',
    ];
  }

  /**
   * Get node analysis-time known linked declarations.
   *
   * @param object $node Node whose linked declarations to get.
   * @return object[]
   */
  static function get ($node) {
    $declarations = [];
    foreach (inference\SymbolLink::get($node) as $symbol)
      foreach (inference\SymbolDeclaration::get($symbol) as $declaration)
        $declarations[] = $declaration;
    return $declarations;
  }

}
