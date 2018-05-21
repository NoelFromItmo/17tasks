<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \PhpParser\Node;

class Concept {

  function getIdentifier () {
    return 'concept';
  }

  function getPass () {
    return 30;
  }

  function getDependencies () {
    return [
      'attribute',
      'simulation',
      'symbol',
    ];
  }

  /**
   * Get node analysis-time known concepts.
   *
   * @param object $node Node whose concepts to get.
   * @return string[]
   */
  static function get ($node) {

    if ($node === null)
      return [];

    assert(is_object($node) || is_array($node));

    $concepts = [];

    foreach (is_array($node) ? $node : [$node] as $subNode)
      foreach (inference\Evaluation::get($subNode) as $yieldNode) {
        // @todo: Rethink.
        if ($yieldNode instanceof pnode\SymbolAlias && $yieldNode->id == 'o_defined')
          continue;
        $concept = inference\Concept::nodeConcept($yieldNode);
        if ($concept)
          $concepts[] = $concept;
      }

    return inference\UniqueNode::get($concepts);

  }

  static function nodeConcept ($node) {

    if ($node instanceof data\Value)
      return new pnode\SymbolAlias(implode('|', array_filter(array_map(function ($constraint) {
        if (!($constraint instanceof pnode\SymbolAlias))
          return '';
        if ($constraint->id == 't_dynamic')
          return '';
        return $constraint->id;
      }, $node->constraints))), implode('|', array_filter(array_map(function ($constraint) {
        if (!($constraint instanceof pnode\SymbolAlias))
          return '';
        if ($constraint->id == 't_dynamic')
          return '';
        return $constraint->phpID;
      }, $node->constraints))));

    if ($node instanceof Node\Expr\Array_) {
      $yieldNodes = [];
      $itemKeyConcepts = [];
      $itemConcepts = [];
      foreach ($node->items as $itemNode) {
        $itemKeyNodeConcepts = inference\Concept::get($itemNode->key);
        if (count($itemKeyNodeConcepts) == 0)
          $itemKeyConcepts[] = 't_int|t_string';
        foreach ($itemKeyNodeConcepts as $itemKeyNodeConcept)
          $itemKeyConcepts[] = $itemKeyNodeConcept->id;
        $itemNodeConcepts = inference\Concept::get($itemNode->value);
        if (count($itemNodeConcepts) == 0)
          $itemConcepts[] = 't_mixed';
        foreach ($itemNodeConcepts as $itemNodeConcept)
          $itemConcepts[] = $itemNodeConcept->id;
      }
      $commonKey = inference\Symbol::composeMulti(array_unique($itemKeyConcepts));
      if (!$commonKey)
        $commonKey = 't_int|t_string';
      $common = inference\Symbol::composeMulti(array_unique($itemConcepts));
      if (!$common)
        $common = 't_mixed';
      return new pnode\SymbolAlias(inference\Symbol::composeArray($commonKey, $common));
    }

    if ($node instanceof Node\Expr\ConstFetch) {
      if (strtolower($node->name->toString()) == 'null')
        return new pnode\SymbolAlias('o_null', 'null');
      if (in_array(strtolower($node->name->toString()), ['true', 'false']))
        return new pnode\SymbolAlias('t_bool', 'bool');
      if ($node->name->toString() == 'ZEND_DEBUG_BUILD')
        return new pnode\SymbolAlias('t_bool', 'bool');
      if ($node->name->toString() == 'ZEND_THREAD_SAFE')
        return new pnode\SymbolAlias('t_bool', 'bool');
    }

    if ($node instanceof Node\Scalar\DNumber)
      return new pnode\SymbolAlias('t_float', 'float');

    if ($node instanceof Node\Scalar\LNumber)
      return new pnode\SymbolAlias('t_int', 'int');

    if ($node instanceof Node\Scalar\MagicConst) {
      if ($node instanceof Node\Scalar\MagicConst\Line)
        return new pnode\SymbolAlias('t_int', 'int');
      return new pnode\SymbolAlias('t_string', 'string');
    }

    if ($node instanceof Node\Scalar\String_) {
      if ($node->value === '0' || $node->value === '1')
        return new pnode\SymbolAlias('t_stringBool', 'string');
      if (is_int(filter_var(filter_var($node->value, FILTER_VALIDATE_FLOAT), FILTER_VALIDATE_INT)))
        return new pnode\SymbolAlias('t_stringInt', 'string');
      if (is_numeric($node->value))
        return new pnode\SymbolAlias('t_stringFloat', 'string');
      return new pnode\SymbolAlias('t_string', 'string');
    }

    if ($node instanceof pnode\RangeValueFetch) {
      $valueConcepts = [];
      $valueConceptNames = [];
      if ($node->range instanceof Node\Expr\Array_) {
        foreach ($node->range->items as $item) {
          foreach (inference\Evaluation::get($item->value) as $valueYieldNode) {
            $valueConcept = inference\Concept::nodeConcept($valueYieldNode)->id;
            $valueConceptName = inference\Concept::nodeConcept($valueYieldNode)->phpID;
            if ($valueConcept) {
              $valueConcepts[] = $valueConcept;
              $valueConceptNames[] = $valueConceptName;
            }
          }
        }
      }
      return new pnode\SymbolAlias(
        inference\Symbol::composeMulti(array_unique($valueConcepts)),
        inference\Symbol::composeMulti(array_unique($valueConceptNames))
      );
    }

    $yieldClass = class_exists(Node\Identifier::class)
      ? pnode\Yield_::class
      : pnode\YieldV3::class;

    if ($node instanceof $yieldClass)
      return new pnode\SymbolAlias(implode('|', array_map(function ($yieldNode) {
        return inference\Concept::nodeConcept($yieldNode)->id;
      }, $node->yield)), implode('|', array_map(function ($yieldNode) {
        return inference\Concept::nodeConcept($yieldNode)->phpID;
      }, $node->yield)));

    return new pnode\SymbolAlias('', '');

  }

  /**
   * Does the node always evaluate to `int`?
   *
   * @param object $node Concept holding node.
   * @return bool
   */
  static function isInt ($node) {
    if ($node instanceof Node\Scalar\LNumber)
      return true;
    return false;
  }

}
