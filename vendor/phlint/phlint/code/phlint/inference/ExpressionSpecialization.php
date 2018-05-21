<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\phpLanguage;
use \PhpParser\Node;

class ExpressionSpecialization {

  function getIdentifier () {
    return 'expressionSpecialization';
  }

  /**
   * Analyzes the code and infers the expression nodes that would exist if no
   * dynamic features were to be used.
   *
   * @param object $node Node to analyze.
   * @return object[]
   */
  static function get ($node) {

    if ($node instanceof Node\Expr\Array_)
      return [$node];

    if ($node instanceof Node\Expr\ClosureUse)
      return [$node];

    if ($node instanceof Node\Expr\ConstFetch)
      return [$node];

    if ($node instanceof Node\Expr\FuncCall && $node->name instanceof Node\Name)
      return [$node];

    if ($node instanceof Node\Expr\Variable && is_string($node->name))
      return [$node];

    if ($node instanceof Node\Scalar\DNumber)
      return [$node];

    if ($node instanceof Node\Scalar\LNumber)
      return [$node];

    if ($node instanceof Node\Scalar\String_)
      return [$node];

    if (!isset($node->iiData['expressionSpecializationYield']))
      $node->iiData['expressionSpecializationYield'] = inference\ExpressionSpecialization::lookup($node);

    return $node->iiData['expressionSpecializationYield'];

  }

  /**
   * Analyzes the code and infers the expression nodes that would exist if no
   * dynamic features were to be used.
   *
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @internal
   */
  static function lookup ($node) {

    $yieldClass = class_exists(Node\Identifier::class)
      ? pnode\Yield_::class
      : pnode\YieldV3::class;

    if ($node instanceof Node\Expr\FuncCall) {
      $yieldNodes = [];
      foreach (inference\NameEvaluation::get($node->name, 'function') as $yieldNode)
        $yieldNodes[] = inference\NodeRelation::cloneRelations($node, new Node\Expr\FuncCall(
          new $yieldClass([$yieldNode]),
          $node->args
        ));
      foreach ($yieldNodes as $yieldNode)
        inference\IsVirtual::set($yieldNode, true);
      return $yieldNodes;
    }

    if ($node instanceof Node\Expr\MethodCall) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->var) as $containerYieldNode)
        foreach (is_string($node->name) ? [new Node\Scalar\String_($node->name)] : inference\Evaluation::get($node->name) as $memberYieldNode)
          $yieldNodes[] = inference\NodeRelation::cloneRelations($node, new Node\Expr\MethodCall(
            new $yieldClass([$containerYieldNode]),
            $memberYieldNode instanceof Node\Identifier
              ? $memberYieldNode->name
              : ($memberYieldNode instanceof Node\Scalar\String_
                && preg_match('/\A[A-Za-z\_][A-Za-z0-9_]*\z/', $memberYieldNode->value)
                ? $memberYieldNode->value
                : $memberYieldNode
              ),
            $node->args
          ));
      foreach ($yieldNodes as $yieldNode)
        inference\IsVirtual::set($yieldNode, true);
      return $yieldNodes;
    }

    if ($node instanceof Node\Expr\New_)
      return [$node];

    if ($node instanceof Node\Expr\StaticCall) {
      $yieldNodes = [];
      foreach (inference\NameEvaluation::get($node->class, 'class') as $containerYieldNode)
        foreach (is_string($node->name) ? [new Node\Scalar\String_($node->name)] : inference\Evaluation::get($node->name) as $memberYieldNode)
          $yieldNodes[] = inference\NodeRelation::cloneRelations($node, new Node\Expr\StaticCall(
            new $yieldClass([$containerYieldNode]),
            $memberYieldNode instanceof Node\Identifier
              ? $memberYieldNode->name
              : ($memberYieldNode instanceof Node\Scalar\String_
                && preg_match('/\A[A-Za-z\_][A-Za-z0-9\_]*\z/', $memberYieldNode->value)
                ? $memberYieldNode->value
                : $memberYieldNode
              ),
            $node->args
          ));
      foreach ($yieldNodes as $yieldNode)
        inference\IsVirtual::set($yieldNode, true);
      return $yieldNodes;
    }

    if ($node instanceof Node\Expr\Variable) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->name) as $variableName) {
        if ($variableName instanceof Node\Identifier)
          $yieldNodes[] = inference\NodeRelation::cloneRelations($node, new Node\Expr\Variable($variableName->name));
        if ($variableName instanceof Node\Scalar\String_)
          $yieldNodes[] = inference\NodeRelation::cloneRelations($node, new Node\Expr\Variable($variableName->value));
      }
      return $yieldNodes;
    }

    return [];

  }

}
