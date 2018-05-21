<?php

namespace phlint\inference;

use \luka8088\phops\MetaContext;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class NodeRelation {

  function getIdentifier () {
    return 'nodeRelation';
  }

  function getPass () {
    return 10;
  }

  function beforeTraverse ($nodes) {

    if (!isset(MetaContext::get(IIData::class)['memo:parentNodeStack']))
      MetaContext::get(IIData::class)['memo:parentNodeStack'] = [];

    if (!isset(MetaContext::get(IIData::class)['memo:scopeNodeStack']))
      MetaContext::get(IIData::class)['memo:scopeNodeStack'] = [];

    NodeRelation::inferNodeSequenceRelations($nodes);

  }

  function beforeNode ($node) {

    if (count(MetaContext::get(IIData::class)['memo:parentNodeStack']) > 0)
      $node->iiData['parentNode'] = end(MetaContext::get(IIData::class)['memo:parentNodeStack']);

    MetaContext::get(IIData::class)['memo:parentNodeStack'][] = $node;

    if ($node instanceof Node\Stmt\Else_ || $node instanceof Node\Stmt\ElseIf_)
      if (count(MetaContext::get(IIData::class)['memo:scopeNodeStack']) > 0)
        if (end(MetaContext::get(IIData::class)['memo:scopeNodeStack']) instanceof Node\Stmt\If_)
          array_pop(MetaContext::get(IIData::class)['memo:scopeNodeStack']);

  }

  function enterNode ($node) {

    if (inference\IsScope::get($node))
      MetaContext::get(IIData::class)['memo:scopeNodeStack'][] = $node;

    NodeRelation::inferNodeSequenceRelations(NodeConcept::getBody($node));

  }

  function afterNode ($node) {

    if (count(MetaContext::get(IIData::class)['memo:scopeNodeStack']) > 0
        && !isset($node->iiData['scopeNode'])) {
      $node->iiData['scopeNode']
        = end(MetaContext::get(IIData::class)['memo:scopeNodeStack']) === $node
        ? (
          count(MetaContext::get(IIData::class)['memo:scopeNodeStack']) > 1
            ? current(array_slice(MetaContext::get(IIData::class)['memo:scopeNodeStack'], -2, 1))
            : null
          )
        : end(MetaContext::get(IIData::class)['memo:scopeNodeStack'])
      ;
    }

    if (count(MetaContext::get(IIData::class)['memo:parentNodeStack']) > 0
        && $node === end(MetaContext::get(IIData::class)['memo:parentNodeStack']))
      array_pop(MetaContext::get(IIData::class)['memo:parentNodeStack']);

    if (count(MetaContext::get(IIData::class)['memo:scopeNodeStack']) > 0
        && $node === end(MetaContext::get(IIData::class)['memo:scopeNodeStack']))
      array_pop(MetaContext::get(IIData::class)['memo:scopeNodeStack']);

  }

  static function inferNodeSequenceRelations ($nodeSequence) {
    $previousNode = null;
    foreach ($nodeSequence as $node) {
      if ($previousNode) {
        $node->iiData['previousNode'] = $previousNode;
        $previousNode->iiData['followingNode'] = $node;
      }
      $previousNode = $node;
    }
  }

  static function cloneRelations ($original, $generated) {
    if (!isset($generated->iiData))
      $generated->iiData = new IIData();
    foreach ($original->getAttributes() as $name => $value)
      $generated->setAttribute($name, $value);
    $generated->iiData['followingNode'] = inference\NodeRelation::followingNode($original);
    $generated->iiData['originNode'] = $original;
    $generated->iiData['parentNode'] = inference\NodeRelation::parentNode($original);
    $generated->iiData['previousNode'] = inference\NodeRelation::previousNode($original);
    $generated->iiData['scopeNode'] = inference\NodeRelation::scopeNode($original);
    return $generated;
  }

  /**
   * Get analysis-time known context node.
   *
   * @param object $object Node whose context node to get.
   * @return Node|null
   */
  static function contextNode ($object) {
    assert(is_object($object));
    if (!isset($object->iiData['contextNode'])) {
      $parent = inference\NodeRelation::parentNode($object);
      while ($parent && !NodeConcept::isContextNode($parent))
        $parent = inference\NodeRelation::parentNode($parent);
      $object->iiData['contextNode'] = $parent;
    }
    return $object->iiData['contextNode'];
  }

  /**
   * Get analysis-time known previous node.
   * Node is considered a previous one if it is right before the current node
   * in the AST and it is in the same scope.
   *
   * @param object $object Node whose previous node to get.
   * @return Node|null
   */
  static function previousNode ($object) {
    if (isset($object->iiData['previousNode']) && $object->iiData['previousNode'])
      return $object->iiData['previousNode'];
    return null;
  }

  /**
   * Get analysis-time known following node.
   * Node is considered a following one if it is right after the current node
   * in the AST and it is in the same scope.
   *
   * @param object $object Node whose following node to get.
   * @return Node|null
   */
  static function followingNode ($object) {
    if (isset($object->iiData['followingNode']) && $object->iiData['followingNode'])
      return $object->iiData['followingNode'];
    return null;
  }

  /**
   * Get analysis-time known import nodes.
   *
   * @param object $object Node whose import nodes to get.
   * @return object[]
   */
  static function importNodes ($object) {
    if (!isset($object->iiData['importNodes'])) {
      $importNodes = [];
      if (property_exists($object, 'stmts'))
        foreach ($object->stmts as $statement)
          if (NodeConcept::isImport($statement))
            $importNodes[] = $statement;
      $object->iiData['importNodes'] = $importNodes;
    }
    return $object->iiData['importNodes'];
  }

  /**
   * Get analysis-time known namespace node.
   *
   * @param object $object Node whose namespace node to get.
   * @return Node|null
   */
  static function namespaceNode ($object) {
    if (!isset($object->iiData['namespaceNode'])) {
      $parent = inference\NodeRelation::parentNode($object);
      while ($parent && !NodeConcept::isNamespaceNode($parent))
        $parent = inference\NodeRelation::parentNode($parent);
      $object->iiData['namespaceNode'] = $parent;
    }
    return $object->iiData['namespaceNode'];
  }

  /**
   * Get analysis-time known origin node.
   * Node is considered an origin one if it is the one that current node has
   * been specialized from.
   *
   * @param object $object Node whose origin node to get.
   * @return Node|null
   */
  static function originNode ($object) {
    if (isset($object->iiData['originNode']) && $object->iiData['originNode'])
      return $object->iiData['originNode'];
    return $object;
  }

  /**
   * Get analysis-time known parent node.
   *
   * @param object $object Node whose parent node to get.
   * @return Node|null
   */
  static function parentNode ($object) {
    if (isset($object->iiData['parentNode']) && $object->iiData['parentNode'])
      return $object->iiData['parentNode'];
    return null;
  }

  /**
   * Get analysis-time known scope node.
   * Node is considered a scope one if it is is the node which holes the current scope.
   *
   * @param object $object Node whose scope node to get.
   * @return Node|null
   */
  static function scopeNode ($object) {
    if (isset($object->iiData['scopeNode']) && $object->iiData['scopeNode'])
      return $object->iiData['scopeNode'];
    return inference\NodeRelation::sourceNode($object);
  }

  /**
   * Get analysis-time known source node.
   *
   * @param object $object Node whose source node to get.
   * @return Node|null
   */
  static function sourceNode ($object) {
    $sourceClass = class_exists(Node\Identifier::class)
      ? pnode\Source::class
      : pnode\SourceV3::class;
    if (!isset($object->iiData['sourceNode'])) {
      $parent = inference\NodeRelation::parentNode($object);
      while ($parent && !($parent instanceof $sourceClass))
        $parent = inference\NodeRelation::parentNode($parent);
      $object->iiData['sourceNode'] = $parent;
    }
    return $object->iiData['sourceNode'];
  }

}
