<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\phpLanguage;
use \PhpParser\Node;

/**
 * Isolation inference.
 *
 * @see /documentation/glossary/isolation.md
 */
class Isolation {

  function getIdentifier () {
    return 'isolation';
  }

  function getDependencies () {
    return [
      'attribute',
      'execution',
      'nodeRelation',
      'value',
    ];
  }

  /**
   * Get node analysis-time known isolation information.
   *
   * @param object $node Node whose isolation to get.
   * @return boolean
   */
  static function isIsolated ($node) {

    if (inference\Purity::isPure($node))
      return true;

    if (!isset($node->iiData['isIsolated'])) {

      $isIsolated = false;

        if (NodeConcept::isContextNode($node)) {

          foreach (inference\SymbolLink::getUnmangled($node) as $symbol)
            foreach (phpLanguage\Fixture::$isolatedPhpFunctions as $isolatedPhpFunction)
              if ('f_' . $isolatedPhpFunction == $symbol)
                $isIsolated = true;

          foreach (inference\Attribute::get($node) as $attribute)
            if ($attribute instanceof Node\Expr\New_ &&
                count($attribute->args) > 0 &&
                inference\Value::isEqual($attribute->args[0], 'isolated'))
              $isIsolated = true;

        }

        $contextNode = inference\NodeRelation::contextNode($node);

        if ($contextNode)
          if (inference\Isolation::isIsolated($contextNode))
            $isIsolated = true;

      $node->iiData['isIsolated'] = $isIsolated;

    }

    return $node->iiData['isIsolated'];

  }

}
