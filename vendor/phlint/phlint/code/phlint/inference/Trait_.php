<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \PhpParser\Node;

class Trait_ {

  function getIdentifier () {
    return 'trait';
  }

  function getDependencies () {
    return [
      'nodeRelation',
    ];
  }

  /**
   * Should the strict implicit type conversion rules be applied when
   * converting from `$node` types to other types?
   *
   * @param object $node Node whose type to consider.
   * @return bool
   */
  static function useStrictTypeConversion ($node) {
    $sourceNode = inference\NodeRelation::sourceNode($node);
    if (!$sourceNode)
      return false;
    if (!isset($sourceNode->iiData['hasDeclareStrictTypes'])) {
      $hasDeclareStrictTypes = false;
      if (count($sourceNode->stmts) > 0 && $sourceNode->stmts[0] instanceof Node\Stmt\Declare_)
        foreach ($sourceNode->stmts[0]->declares as $declareNode)
          if ($declareNode instanceof Node\Stmt\DeclareDeclare && $declareNode->key == 'strict_types'
              && inference\Value::isEqual($declareNode->value, 1))
            $hasDeclareStrictTypes = true;
      $sourceNode->iiData['hasDeclareStrictTypes'] = $hasDeclareStrictTypes;
    }
    return $sourceNode->iiData['hasDeclareStrictTypes'];
  }

}
