<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class NodeIntersection {

  static function get ($left, $right) {

    /*
    if (count($nodes) > 2)
      return NodeIntersection::get(array_merge(
        [NodeIntersection::get(array_slice($nodes, 0, 2))],
        array_slice($nodes, 2)
      ));

    if (count($nodes) == 1)
      return $nodes[0];

    if (count($nodes) == 0)
      return null;
    /**/

    if (is_array($left)) {
      $intersectionNode = count($left) == 0 ? $right : null;
      foreach ($left as $constraintNode) {
        $intermediateIntersectionNode = inference\NodeIntersection::get(
          $constraintNode,
          $intersectionNode ? $intersectionNode : $right
        );
        if ($intermediateIntersectionNode)
          $intersectionNode = $intermediateIntersectionNode;
      }
      return $intersectionNode;
    }

    if (is_array($right)) {
      $intersectionNode = count($right) == 0 ? $left : null;
      foreach ($right as $constraintNode) {
        $intermediateIntersectionNode = inference\NodeIntersection::get(
          $intersectionNode ? $intersectionNode : $left,
          $constraintNode
        );
        if ($intermediateIntersectionNode)
          $intersectionNode = $intermediateIntersectionNode;
      }
      return $intersectionNode;
    }

    if ($left instanceof data\Value)
      return new data\Value(array_filter(array_map(function ($constraint) use ($right) {
        return inference\NodeIntersection::get($constraint, $right);
      }, $left->constraints)));

    if ($right instanceof data\Value) {
      $constraints = array_filter(array_map(function ($constraint) use ($left) {
        return inference\NodeIntersection::get($left, $constraint);
      }, $right->constraints));
      if (count($constraints) == 0)
        return null;
      if (count($constraints) == 1 && $constraints[0] instanceof Node)
        return $constraints[0];
        if (count($constraints) == 1 && $constraints[0] instanceof pnode\SymbolAlias)
          return $left instanceof data\Value ? new data\Value($constraints) : $constraints[0];
      if (false)
      return new data\Value(array_map(function ($constraint) use ($left) {
        return inference\NodeIntersection::get($left, $constraint);
      }, $right->constraints));
    }

    if ($left instanceof pnode\Excludes) {
      if ($left->node instanceof Node\Expr\Array_
          && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
        return null;
      if ($left->node instanceof Node\Expr\ConstFetch && strtolower($left->node->name->toString()) == 'false'
          && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
        return $right;
      if ($left->node instanceof pnode\SymbolAlias && $left->node->id == 'o_defined'
          && $right instanceof pnode\SymbolAlias && $right->id == 'o_defined')
        return null;
    }

    if ($right instanceof pnode\Excludes) {
      if ($left instanceof pnode\SymbolAlias && $left->id == 'o_null'
          && $right->node instanceof Node\Expr\ConstFetch && strtolower($right->node->name->toString()) == 'null')
        return new pnode\SymbolAlias('o_nothing');
      if ($left instanceof pnode\SymbolAlias && $left->id == 'o_undefined'
          && $right->node instanceof pnode\SymbolAlias && $right->node->id == 'o_undefined')
        return new pnode\SymbolAlias('o_nothing');
      if ($left instanceof Node\Expr\ConstFetch && $right->node instanceof Node\Expr\ConstFetch)
        if (strtolower($left->name->toString()) == strtolower($right->node->name->toString()))
          if (in_array($left->name->toString(), ['true', 'false', 'null']))
            return new pnode\SymbolAlias('o_nothing');
      if ($left instanceof Node\Expr\Array_ && $right->node instanceof Node\Expr\Array_)
        return new pnode\SymbolAlias('o_nothing');
    }

    if ($left instanceof Node\Expr\Array_
        && $right instanceof Node\Scalar\LNumber)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\Array_
        && $right instanceof Node\Scalar\String_)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\Array_
        && $right instanceof pnode\SymbolAlias && $right->id == 't_int')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\Array_
        && $right instanceof pnode\SymbolAlias && $right->id == 't_string')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\DNumber
        && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\DNumber
        && $right instanceof pnode\SymbolAlias && $right->id == 't_int')
      return new pnode\SymbolAlias('t_float');

    if ($left instanceof Node\Scalar\DNumber
        && $right instanceof pnode\SymbolAlias && $right->id == 't_string')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\DNumber
        && $right instanceof Node\Scalar\LNumber)
      return new pnode\SymbolAlias('t_float');

    if ($left instanceof Node\Scalar\DNumber
        && $right instanceof Node\Scalar\String_)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\LNumber
        && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\LNumber
        && $right instanceof pnode\SymbolAlias && $right->id == 't_string')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\LNumber
        && $right instanceof Node\Expr\ConstFetch && strtolower($right->name->toString()) == 'null')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\LNumber
        && $right instanceof Node\Scalar\String_)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Scalar\String_
        && $right instanceof Node\Scalar\LNumber)
      return new pnode\SymbolAlias('t_string');

    if ($left instanceof Node\Scalar\String_
        && $right instanceof pnode\SymbolAlias && $right->id == 't_int')
      return new pnode\SymbolAlias('t_string');

    if ($left instanceof Node\Scalar\String_
        && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'null'
        && $right instanceof Node\Scalar\LNumber)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'null'
        && $right instanceof Node\Scalar\String_)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof pnode\SymbolAlias && $left->id == 't_int'
        && $right instanceof Node\Expr\ConstFetch && strtolower($right->name->toString()) == 'null')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'false'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'false'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_int')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'false'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_string')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'false'
        && $right instanceof Node\Scalar\LNumber)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'false'
        && $right instanceof Node\Scalar\String_)
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'null'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'null'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_string')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof Node\Expr\ConstFetch && strtolower($left->name->toString()) == 'null'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_int')
      return new pnode\SymbolAlias('o_defined');

    if ($left instanceof pnode\SymbolAlias && $left->id == 'o_defined'
        && $right instanceof pnode\SymbolAlias && $right->id == 'o_undefined')
      return null;

    if ($left instanceof pnode\SymbolAlias && $left->id == 'o_undefined'
        && $right instanceof Node\Expr\Array_)
      return null;

    if ($left instanceof pnode\SymbolAlias && $left->id == 'o_undefined'
        && $right instanceof pnode\SymbolAlias && $right->id == 'o_defined')
      return null;

    if ($left instanceof pnode\SymbolAlias && $left->id == 'o_undefined'
        && $right instanceof Node\Scalar\String_)
      return null;

    if ($left instanceof pnode\SymbolAlias && $left->id == 'o_undefined'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_mixed')
      return null;

    if ($left instanceof pnode\SymbolAlias && $left->id == 'o_undefined'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_array')
      return null;

    if ($left instanceof pnode\SymbolAlias && $left->id == 'o_undefined'
        && $right instanceof pnode\SymbolAlias && $right->id == 't_string')
      return null;

    return $left;

  }

}
