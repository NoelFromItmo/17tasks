<?php

namespace phlint\inference;

use \luka8088\phops\MetaContext;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\phpLanguage;
use \PhpParser\Node;

class NameEvaluation {

  function getIdentifier () {
    return 'nameEvaluation';
  }

  function getDependencies () {
    return [
      'nodeRelation',
      'symbol',
      'value',
    ];
  }

  /**
   * Analyzes the code and infers the nodes that it would yield if it would
   * be evaluated as a name.
   */
  static function get ($node, $symbolIdentifierGroup) {

    assert(is_string($node) || is_object($node) || is_array($node));
    assert($symbolIdentifierGroup != '');

    if (is_array($node)) {
      $yieldNodes = [];
      foreach ($node as $subNode)
        foreach (self::get($subNode, $symbolIdentifierGroup) as $yieldNode)
          $yieldNodes[] = $yieldNode;
      return inference\UniqueNode::get($yieldNodes);
    }

    if (is_string($node)) {

      $metaContextKey = 'nameEvaluationYield:' . $node;

      if (!isset(MetaContext::get(IIData::class)[$metaContextKey]))
        MetaContext::get(IIData::class)[$metaContextKey] = inference\NameEvaluation::lookup($node, $symbolIdentifierGroup);

      return MetaContext::get(IIData::class)[$metaContextKey];

    }

    if ($node instanceof Node\Identifier)
      return self::get($node->name, $symbolIdentifierGroup);

    if (!isset($node->iiData['nameEvaluationYield']))
      $node->iiData['nameEvaluationYield'] = inference\NameEvaluation::lookup($node, $symbolIdentifierGroup);

    return $node->iiData['nameEvaluationYield'];

  }

  static function lookup ($node, $symbolIdentifierGroup) {

    if (is_string($node)) {
      if (strtolower($node) == 'false')
        return [new Node\Expr\ConstFetch(new Node\Name('false'))];
      if (strtolower($node) == 'null')
        return [new Node\Expr\ConstFetch(new Node\Name('null'))];
      if (strtolower($node) == 'true')
        return [new Node\Expr\ConstFetch(new Node\Name('true'))];
      return [new pnode\SymbolAlias(inference\Symbol::identifier($node, 'auto'))];
    }

    assert(is_object($node));
    assert($symbolIdentifierGroup != '');

    $yieldNodes = [];
    foreach (inference\Evaluation::get($node) as $evaluatedNode)
      foreach (inference\NameEvaluation::lookupName($evaluatedNode, $symbolIdentifierGroup) as $yieldNode)
        $yieldNodes[] = $yieldNode;

    return inference\UniqueNode::get($yieldNodes);

  }

  static function lookupName ($node, $symbolIdentifierGroup) {

    if (is_string($node)) {
      if (strtolower($node) == 'false')
        return [new Node\Expr\ConstFetch(new Node\Name('false'))];
      if (strtolower($node) == 'true')
        return [new Node\Expr\ConstFetch(new Node\Name('true'))];
      return [new pnode\SymbolAlias(inference\Symbol::identifier($node, 'auto'))];
    }

    if ($node instanceof data\Value)
      return [$node];

    if ($node instanceof Node\Expr\Array_) {
      if (count($node->items) != 2)
        return [new data\Value([new pnode\SymbolAlias('t_array', 'array')])];
      return [];
    }

    if ($node instanceof Node\Identifier)
      return self::lookupName($node->name, $symbolIdentifierGroup);

    if ($node instanceof Node\NullableType)
      return inference\UniqueNode::get(array_merge(
        self::lookupName($node->type, $symbolIdentifierGroup),
        [new Node\Expr\ConstFetch(new Node\Name('null'))]
      ));

    if ($node instanceof Node\Scalar\String_)
      return $node->value ? self::lookupName(new Node\Name\FullyQualified($node->value), $symbolIdentifierGroup) : [];

    if ($node instanceof pnode\SymbolAlias)
      return [$node];

    if (inference\Value::isValueNode($node))
      return [$node];

    if ($node->isFullyQualified()) {

      $symbol = inference\SymbolLink::lookupSymbol(
        inference\Symbol::identifier($node, $symbolIdentifierGroup),
        ltrim($node->toString(), '\\'),
        $node->getAttribute('inAnalysisScope', true)
      );

      if (!$symbol)
        $symbol = inference\Symbol::identifier($node, $symbolIdentifierGroup);

      return [new pnode\SymbolAlias($symbol, ltrim($node->toString(), '\\'))];

    }

    if (strtolower($node->toString()) == 'parent') {
      $interfaceNode = $node;
      while ($interfaceNode && !NodeConcept::isInterfaceNode($interfaceNode))
        $interfaceNode = inference\NodeRelation::parentNode($interfaceNode);
      if (!$interfaceNode || !$interfaceNode->extends)
        return [];
      return inference\nameEvaluation::get($interfaceNode->extends, $symbolIdentifierGroup);
    }

    if (strtolower($node->toString()) == 'self') {
      $interfaceNode = $node;
      while ($interfaceNode && !NodeConcept::isInterfaceNode($interfaceNode))
        $interfaceNode = inference\NodeRelation::parentNode($interfaceNode);
      return $interfaceNode ? [new pnode\SymbolAlias(inference\DeclarationSymbol::get($interfaceNode), '')] : [];
    }

    if (strtolower($node->toString()) == 'static' || strtolower($node->toString()) == '$this') {
      $context = inference\NodeRelation::contextNode($node);
      return $context && isset($context->iiData['contextYield']) ? $context->iiData['contextYield'] : [];
    }

    $importScope = inference\NodeRelation::namespaceNode($node);

    if (!$importScope)
      $importScope = inference\NodeRelation::sourceNode($node);

    if ($importScope) {

      foreach (inference\NodeRelation::importNodes($importScope) as $importNode)
        foreach ($importNode->uses as $useNode) {

          $importTypes = [];

          switch ($useNode->type ? $useNode->type : $importNode->type) {
            case Node\Stmt\Use_::TYPE_NORMAL:
              $importTypes = [
                'class',
                'constant',
                'function',
                'namespace',
              ];
              break;
            case Node\Stmt\Use_::TYPE_FUNCTION:
              $importTypes = [
                'function',
              ];
              break;
            case Node\Stmt\Use_::TYPE_CONSTANT:
              $importTypes = [
                'constant',
              ];
              break;
            default: assert(false);
          }

          foreach ($importTypes as $importType) {

            $relativeSymbol = inference\Symbol::identifier($node, $symbolIdentifierGroup);

            if (substr($relativeSymbol . '.', 0, strpos($relativeSymbol . '.', '.'))
                == inference\Symbol::identifier(class_exists(Node\Identifier::class) ? ($useNode->alias ? $useNode->alias : $useNode->name->getLast()) : $useNode->alias, $importType)) {
              $relativePHPID = $node->toString();
              $phpID = $useNode->name->toString()
                . (strpos($relativePHPID, '\\') !== false ? substr($relativePHPID, strpos($relativePHPID, '\\')) : '');
              $symbol = inference\SymbolLink::lookupSymbol(
                inference\Symbol::identifier($useNode->name, $importType)
                  . (strpos($relativeSymbol, '.') !== false
                    ? substr($relativeSymbol, strpos($relativeSymbol, '.'))
                    : ''
                  ),
                $phpID,
                $node->getAttribute('inAnalysisScope', true)
              );
              if (!$symbol)
                $symbol = inference\Symbol::identifier($useNode->name, $importType)
                  . (strpos($relativeSymbol, '.') !== false
                    ? substr($relativeSymbol, strpos($relativeSymbol, '.'))
                    : ''
                  );
              return [new pnode\SymbolAlias($symbol, $phpID)];
            }

          }

        }

      if (NodeConcept::isNamespaceNode($importScope)) {

        $phpID = ($importScope->name ? $importScope->name->toString() . '\\' : '') . $node->toString();

        $symbol = inference\SymbolLink::lookupSymbol(
          ($importScope->name ? inference\Symbol::identifier($importScope->name, 'namespace') . '.' : '') .
          inference\Symbol::identifier($node, $symbolIdentifierGroup),
          $phpID,
          $node->getAttribute('inAnalysisScope', true)
        );

        if (!$symbol && in_array($symbolIdentifierGroup, ['auto', 'class']))
          $symbol = ($importScope->name ? inference\Symbol::identifier($importScope->name, 'namespace') . '.' : '') .
          inference\Symbol::identifier($node, $symbolIdentifierGroup);

        if ($symbol)
          return [new pnode\SymbolAlias($symbol, $phpID)];

      }

    }

    $symbol = inference\SymbolLink::lookupSymbol(
      inference\Symbol::identifier($node, $symbolIdentifierGroup),
      $node->toString(),
      inference\IsInAnalysisScope::get($node)
    );

    if ($symbol)
      return [new pnode\SymbolAlias($symbol, $node->toString())];

    return [new pnode\SymbolAlias(
      Symbol::concat(NodeConcept::isNamespaceNode($importScope) && $importScope->name ? Symbol::identifier($importScope) : '', inference\Symbol::identifier($node, $symbolIdentifierGroup)),
      (NodeConcept::isNamespaceNode($importScope) && $importScope->name && $importScope->name->toString() ? $importScope->name->toString() . '\\' : '') . $node->toString()
    )];

  }

}
