<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\phpLanguage;
use \PhpParser\Node;

/**
 * Purity inference.
 *
 * @see /documentation/glossary/purity.md
 */
class Purity {

  function getIdentifier () {
    return 'purity';
  }

  function getDependencies () {
    return [
      'attribute',
      'execution',
      'isolation',
      'nodeRelation',
      'value',
    ];
  }

  /**
   * Get node analysis-time known purity information.
   *
   * @param object $node Node whose purity to get.
   * @return boolean
   */
  static function isPure ($node) {

    if (!isset($node->iiData['isPure'])) {

      $isPure = false;

        if (NodeConcept::isContextNode($node)) {

          foreach (inference\SymbolLink::getUnmangled($node) as $symbol)
            foreach (phpLanguage\Fixture::$purePhpFunctions as $purePhpFunction)
              if ('f_' . $purePhpFunction == $symbol)
                $isPure = true;

          foreach (inference\Attribute::get($node) as $attribute)
            if ($attribute instanceof Node\Expr\New_ &&
                count($attribute->args) > 0 &&
                inference\Value::isEqual($attribute->args[0], 'pure'))
              $isPure = true;

        }

        $contextNode = inference\NodeRelation::contextNode($node);

        if ($contextNode)
          if (inference\Purity::isPure($contextNode))
            $isPure = true;

      $node->iiData['isPure'] = $isPure;

    }

    return $node->iiData['isPure'];

  }

}
