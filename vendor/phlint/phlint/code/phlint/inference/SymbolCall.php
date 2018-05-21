<?php

namespace phlint\inference;

use \luka8088\phops\MetaContext;
use \phlint\IIData;

/**
 * Links call nodes with the symbol they are calling so that call nodes can
 * can be traced back from declaration nodes.
 */
class SymbolCall {

  function getIdentifier () {
    return 'symbolCall';
  }

  static function add ($symbol, $node) {
    $metaContextKey = 'symbolCall:' . $symbol;
    assert(!isset(MetaContext::get(IIData::class)[$metaContextKey]), 'SymbolCall already locked.');
    if (!isset(MetaContext::get(IIData::class)['memo:' . $metaContextKey]))
      MetaContext::get(IIData::class)['memo:' . $metaContextKey] = [];
    $isNodeAttached = false;
    foreach (MetaContext::get(IIData::class)['memo:' . $metaContextKey] as $existingNode)
      if ($existingNode === $node)
        $isNodeAttached = true;
    if (!$isNodeAttached)
      MetaContext::get(IIData::class)['memo:' . $metaContextKey][] = $node;
  }

  static function get ($symbol) {
    $metaContextKey = 'symbolCall:' . $symbol;
    if (!isset(MetaContext::get(IIData::class)[$metaContextKey])) {
      MetaContext::get(IIData::class)[$metaContextKey] = isset(MetaContext::get(IIData::class)['memo:' . $metaContextKey])
        ? MetaContext::get(IIData::class)['memo:' . $metaContextKey]
        : [];
      unset(MetaContext::get(IIData::class)['memo:' . $metaContextKey]);
    }
    return MetaContext::get(IIData::class)[$metaContextKey];
  }

}
