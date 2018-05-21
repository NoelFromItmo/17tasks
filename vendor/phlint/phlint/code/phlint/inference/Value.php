<?php

namespace phlint\inference;

use \phlint\inference;
use \phlint\phpLanguage;
use \PhpParser\Node;

class Value {

  function getIdentifier () {
    return 'value';
  }

  /**
   * Get node analysis-time known values.
   *
   * @param mixed $node Node whose value to get.
   * @return object[]
   */
  static function get ($node) {
    return array_filter(inference\Evaluation::get($node), function ($node) {
      return inference\Value::isValueNode($node);
    });
  }

  static function isEqual ($node, $value) {
    $values = inference\Value::get($node);
    foreach (inference\Value::get($node) as $valueNode) {
      if ($valueNode instanceof Node\Expr\ConstFetch) {
        if (strtolower($valueNode->name->toString()) == 'true' && $value)
          continue;
        if (strtolower($valueNode->name->toString()) == 'false' && !$value)
          continue;
        if (strtolower($valueNode->name->toString()) == 'null' && !$value)
          continue;
      }
      if ($valueNode instanceof Node\Scalar\DNumber && $valueNode->value == $value)
        continue;
      if ($valueNode instanceof Node\Scalar\LNumber && $valueNode->value == $value)
        continue;
      if ($valueNode instanceof Node\Scalar\String_ && $valueNode->value == $value)
        continue;
      return false;
    }
    return count($values) > 0;
  }

  /**
   * Does the node always evaluate to `true`?
   *
   * @param object $node Value holding node.
   * @return bool
   */
  static function isTrue ($node) {
    $values = inference\Value::get($node);
    foreach ($values as $value)
      if (!($value instanceof Node\Expr\ConstFetch) || strtolower($value->name->toString()) != 'true')
        return false;
    return count($values) > 0;
  }

  /**
   * Does the node always evaluate to `false`?
   *
   * @param object $node Value holding node.
   * @return bool
   */
  static function isFalse ($node) {
    $values = inference\Value::get($node);
    foreach ($values as $value)
      if (!($value instanceof Node\Expr\ConstFetch) || strtolower($value->name->toString()) != 'false')
        return false;
    return count($values) > 0;
  }

  static function isValueNode ($node) {
    if ($node instanceof Node\Expr\ConstFetch)
      if (in_array(strtoupper($node->name->toString()), phpLanguage\Fixture::$valueConstants))
        return true;
    if ($node instanceof Node\Scalar\DNumber)
      return true;
    if ($node instanceof Node\Scalar\LNumber)
      return true;
    if ($node instanceof Node\Scalar\String_)
      return true;
    return false;
  }

  static function toString ($node) {
    if ($node instanceof Node\Scalar\DNumber)
      return new Node\Scalar\String_((string) $node->value);
    if ($node instanceof Node\Scalar\LNumber)
      return new Node\Scalar\String_((string) $node->value);
    if ($node instanceof Node\Scalar\String_)
      return $node;
    if ($node instanceof Node\Expr\ConstFetch && $node->name->toString() == 'INF')
      return new Node\Scalar\String_('INF');
    if ($node instanceof Node\Expr\ConstFetch && $node->name->toString() == 'NAN')
      return new Node\Scalar\String_('NAN');
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'false')
      return new Node\Scalar\String_('');
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'null')
      return new Node\Scalar\String_('');
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'true')
      return new Node\Scalar\String_('1');
    var_dump($node);
    var_dump(__file__, __line__);
    exit;
  }

}
