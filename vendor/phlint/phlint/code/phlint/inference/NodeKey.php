<?php

namespace phlint\inference;

use \phlint\data;
use \phlint\inference;
use \phlint\node as pnode;
use \PhpParser\Node;

class NodeKey {

  static function get ($node) {
    if ($node instanceof \phlint\constraint\LessThan)
      return 't_int:<' . $node->value;
    if ($node instanceof \phlint\constraint\GreaterThan)
      return 't_int:>' . $node->value;
    if ($node instanceof data\Value)
      return implode('|', array_map(function ($constraint) {
        return inference\NodeKey::get($constraint);
      }, $node->constraints));
    if ($node instanceof Node\Expr\Array_)
      return '[' . implode(',', array_map([self::class, 'get'], $node->items)) . ']';
    if ($node instanceof Node\Expr\ArrayItem)
      return ($node->key ? self::get($node->key) . '/' : '') . self::get($node->value);
    if ($node instanceof Node\Expr\BinaryOp\Concat)
      return inference\NodeKey::get($node->left) . '~' . inference\NodeKey::get($node->right);
    if ($node instanceof Node\Scalar\DNumber)
      return 't_float:' . $node->value;
    if ($node instanceof Node\Scalar\LNumber)
      return 't_int:' . $node->value;
    if ($node instanceof Node\Scalar\String_)
      return 't_string:' . $node->value;
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'true')
      return 't_bool:true';
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'false')
      return 't_bool:false';
    if ($node instanceof Node\Expr\ConstFetch && $node->name->toString() == 'INF')
      return 't_float:inf';
    if ($node instanceof Node\Expr\ConstFetch && $node->name->toString() == 'NAN')
      return 't_float:nan';
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'null')
      return 'o_null';
    if ($node instanceof Node\Expr\ConstFetch && $node->name->toString() == 'ZEND_DEBUG_BUILD')
      return 'd_ZEND_DEBUG_BUILD';
    if ($node instanceof pnode\Excludes)
      return '!' . inference\NodeKey::get($node->node);
    if ($node instanceof pnode\SymbolAlias)
      return $node->id;
    $yieldClass = class_exists(Node\Identifier::class)
      ? pnode\Yield_::class
      : pnode\YieldV3::class;
    if ($node instanceof $yieldClass)
      return implode('|', array_map(function ($yieldNode) {
        return inference\NodeKey::get($yieldNode);
      }, $node->yield));
    var_dump($node);
    assert(false);
  }

}
