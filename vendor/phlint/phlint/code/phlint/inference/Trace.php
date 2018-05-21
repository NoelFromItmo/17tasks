<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \phlint\NodeConcept;
use \PhpParser\Node;

class Trace {

  function getIdentifier () {
    return 'trace';
  }

  function getDependencies () {
    return [
      'nodeRelation',
    ];
  }

  static function get ($node, $tracedNodes = []) {

    if (!$node)
      return [];

    $context = inference\NodeRelation::contextNode($node);

    if (!$context)
      return [];

    $symbol = $context->getAttribute('specializationSymbol22', '');

    if (!$symbol)
      return self::get($context);

    if (!isset($context->iiData['trace']))
      $context->iiData['trace'] = self::lookup($context, $tracedNodes);

    return $context->iiData['trace'];

  }

  static function lookup ($node, $tracedNodes = []) {

    foreach ($tracedNodes as $tracedNode)
      if ($node === $tracedNode)
        return [];

    $traces = [];

    $symbol = $node->getAttribute('specializationSymbol22', '');

      foreach (inference\SymbolCall::get($symbol) as $linkedNode) {

        $linkedNodeTraces = self::get($linkedNode, array_merge($tracedNodes, [$node]));

        $message = ucfirst(NodeConcept::referencePrintLegacy($node))
          . ' specialized for the ' . NodeConcept::referencePrintLegacy($linkedNode) . '.';

        foreach (count($linkedNodeTraces) > 0 ? $linkedNodeTraces : [0 => ''] as $traceIndex => $_) {
          if (!isset($linkedNodeTraces[$traceIndex]))
            $linkedNodeTraces[$traceIndex] = [];
          $linkedNodeTraces[$traceIndex][] = ['message' => $message, 'node' => $linkedNode];
        }

        foreach ($linkedNodeTraces as $linkedNodeTrace)
          $traces[] = $linkedNodeTrace;

      }

    return $traces;

  }

}
