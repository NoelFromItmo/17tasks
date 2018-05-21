<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class NodeComparison {

  static function isAlways ($left, $right) {

    if (is_array($left)) {
      foreach ($left as $subLeft)
        if (!inference\NodeComparison::isAlways($subLeft, $right))
          return false;
      return true;
    }

    if (is_array($right)) {
      foreach ($right as $subRight)
        if (!inference\NodeComparison::isAlways($left, $subRight))
          return false;
      return true;
    }

    if ($left instanceof data\Value) {
      foreach ($left->constraints as $constraint)
        if (!self::isAlways($constraint, $right))
          return false;
      return count($left->constraints) > 0;
    }

    if ($right instanceof data\Value) {
      foreach ($right->constraints as $constraint)
        if (!self::isAlways($left, $constraint))
          return false;
      return count($right->constraints) > 0;
    }

    if ($left instanceof Node\Expr\ConstFetch && $right instanceof Node\Expr\ConstFetch)
      if (strtolower($left->name->toString()) == strtolower($right->name->toString()))
        if (in_array($left->name->toString(), ['true', 'false', 'null']))
          return true;

    if ($left instanceof pnode\Excludes)
      return !inference\NodeComparison::isAlways($left->node, $right);

    /**
     * If `$right->node` is such that it is excluded from `$left` that means
     * that `$right->node` is
     */
    if ($right instanceof pnode\Excludes)
      return !inference\NodeComparison::isAlways($left, $right->node);

    if ($left instanceof pnode\SymbolAlias)
      return self::isAlways($left->id, $right);

    if ($right instanceof pnode\SymbolAlias)
      return self::isAlways($left, $right->id);

    if ($left instanceof Node\Scalar\LNumber && $right instanceof Node\Scalar\LNumber)
      return $left->value === $right->value;

    if ($left instanceof Node\Scalar\LNumber && $right == 't_int')
      return true;

    if ($left instanceof Node\Scalar\String_ && $right instanceof Node\Scalar\String_)
      return $left->value === $right->value;

    if ($left instanceof Node\Scalar\String_ && $right == 't_string')
      return true;

    if ($left instanceof Node\Scalar\String_ && $right == 't_mixed')
      return true;

    if ($left instanceof Node\Scalar\String_ && is_string($right) && substr($right, 0, 2) == 'c_')
      return false;

    if ($left instanceof Node\Expr\Array_ && $right == 't_array')
      return true;

    if ($left == 't_array' && $right instanceof Node\Expr\Array_)
      return true;

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'null' && $right == 'o_null')
      return true;

    if ($left == 'o_null' && $right instanceof Node\Expr\ConstFetch && strtolower($right->name->toString()) == 'null')
      return true;

    if ($left == 'o_defined' && $right instanceof Node\Expr\ConstFetch && strtolower($right->name->toString()) == 'null')
      return false;

    if (is_string($left) && substr($left, 0, 2) == 'c_' && $right == 'o_object')
      return true;

    if (is_string($left) && inference\Symbol::isArray($left) && $right == 't_array')
      return true;

    if (is_string($left) && is_string($right))
      return $left == $right;

    return false;

  }

  static function isSometimes ($left, $right) {

    if (is_array($left)) {
      foreach ($left as $subLeft)
        if (inference\NodeComparison::isSometimes($subLeft, $right))
          return true;
      return false;
    }

    if (is_array($right)) {
      foreach ($right as $subRight)
        if (inference\NodeComparison::isSometimes($left, $subRight))
          return true;
      return false;
    }

    if ($left instanceof data\Value) {
      foreach ($left->constraints as $constraint)
        if (self::isSometimes($constraint, $right))
          return true;
      return false;
    }

    if ($right instanceof data\Value) {
      foreach ($right->constraints as $constraint)
        if (self::isSometimes($left, $constraint))
          return true;
      return false;
    }

    if ($left instanceof pnode\Excludes)
      return !inference\NodeComparison::isSometimes($left->node, $right);

    if ($right instanceof pnode\Excludes)
      return !inference\NodeComparison::isSometimes($left, $right->node);

    if ($left instanceof pnode\SymbolAlias)
      return inference\NodeComparison::isSometimes($left->id, $right);

    if ($right instanceof pnode\SymbolAlias)
      return inference\NodeComparison::isSometimes($left, $right->id);

    if (is_string($left) && $left == 'o_defined' && (!is_string($right) || $right != 'o_undefined'))
      return true;

    return inference\NodeComparison::isAlways($left, $right);

  }

}
