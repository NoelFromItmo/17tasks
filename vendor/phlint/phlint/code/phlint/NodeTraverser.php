<?php

namespace phlint;

use \phlint\node as pnode;
use \PhpParser\Node;

class NodeTraverser {

  /**
   * @param mixed $node Node or AST to traverse.
   * @param array $visitors
   */
  static function traverse ($node, $visitors) {

    $visitorsGroups = [
      'afterNode' => [],
      'afterTraverse' => [],
      'beforeNode' => [],
      'beforeTraverse' => [],
      'enterNode' => [],
      'leaveNode' => [],
      'visitNode' => [],
    ];

    foreach ($visitors as $visitor) {
      if (is_callable($visitor))
        $visitorsGroups['visitNode'][] = $visitor;
      if (method_exists($visitor, 'afterNode'))
        $visitorsGroups['afterNode'][] = [$visitor, 'afterNode'];
      if (method_exists($visitor, 'afterTraverse'))
        $visitorsGroups['afterTraverse'][] = [$visitor, 'afterTraverse'];
      if (method_exists($visitor, 'beforeNode'))
        $visitorsGroups['beforeNode'][] = [$visitor, 'beforeNode'];
      if (method_exists($visitor, 'beforeTraverse'))
        $visitorsGroups['beforeTraverse'][] = [$visitor, 'beforeTraverse'];
      if (method_exists($visitor, 'enterNode'))
        $visitorsGroups['enterNode'][] = [$visitor, 'enterNode'];
      if (method_exists($visitor, 'leaveNode'))
        $visitorsGroups['leaveNode'][] = [$visitor, 'leaveNode'];
      if (method_exists($visitor, 'visitNode'))
        $visitorsGroups['visitNode'][] = [$visitor, 'visitNode'];
    }

    foreach ($visitorsGroups['beforeTraverse'] as $visitor)
      $visitor($node);

    if (is_array($node))
      foreach ($node as $subNode)
        self::traverseNode($subNode, $visitorsGroups);
    else
      self::traverseNode($node, $visitorsGroups);

    foreach ($visitorsGroups['afterTraverse'] as $visitor)
      $visitor($node);

    return $node;

  }

  static function traverseNode ($node, $visitorMap, $modifier = '') {

    foreach ($visitorMap['beforeNode'] as $visitor)
      $visitor($node);

    if ($node instanceof Node\Arg) {
      self::traverseNode($node->value, $visitorMap, !($node->value instanceof Node\Expr\FuncCall) && !($node->value instanceof Node\Expr\MethodCall) && !($node->value instanceof Node\Expr\New_) && !($node->value instanceof Node\Expr\StaticCall) ? 'skipDirectVisit' : '');
    }

    if ($node instanceof Node\Const_) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->value, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Array_) {
      foreach ($node->items as $item)
        self::traverseNode($item, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    if ($node instanceof Node\Expr\ArrayDimFetch) {
      if ($node->dim)
        self::traverseNode($node->dim, $visitorMap);
      self::traverseNode($node->var, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    if ($node instanceof Node\Expr\ArrayItem) {
      if ($node->key)
        self::traverseNode($node->key, $visitorMap);
      self::traverseNode($node->value, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    if ($node instanceof Node\Expr\Assign) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->var, $visitorMap, 'skipDirectVisit');
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::visitNode($node->var, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\AssignOp) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->var, $visitorMap, 'skipDirectVisit');
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::visitNode($node->var, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\AssignRef) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->var, $visitorMap, 'skipDirectVisit');
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::visitNode($node->var, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\BinaryOp) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->left, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::traverseNode($node->right, $visitorMap);
      self::leaveNode($node, $visitorMap);

    }

    if ($node instanceof Node\Expr\BooleanNot) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\ClassConstFetch) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->class, $visitorMap);
      if (is_object($node->name))
        self::traverseNode($node->name, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Closure) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->params as $parameter)
        self::traverseNode($parameter, $visitorMap);
      foreach ($node->uses as $use_)
        self::traverseNode($use_, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
      if (is_object($node->returnType))
        self::traverseNode($node->returnType, $visitorMap);
    }

    if ($node instanceof Node\Expr\ClosureUse) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\ConstFetch) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->name, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Empty_) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Exit_) {
      self::enterNode($node, $visitorMap);
      if ($node->expr)
        self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\FuncCall) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->name, $visitorMap);
      foreach ($node->args as $argument)
        self::traverseNode($argument, $visitorMap);
      self::traverseVisitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Include_) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Instanceof_) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->expr, $visitorMap);
      self::traverseNode($node->class, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Isset_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->vars as $variable)
        self::traverseNode($variable, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\List_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->items as $item)
        if ($item)
          self::traverseNode($item, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\MethodCall) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->var, $visitorMap);
      if (is_object($node->name))
        self::traverseNode($node->name, $visitorMap);
      foreach ($node->args as $argument)
        self::traverseNode($argument, $visitorMap);
      self::traverseVisitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\New_) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->class, $visitorMap);
      foreach ($node->args as $argument)
        self::traverseNode($argument, $visitorMap);
      self::traverseVisitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\PropertyFetch) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->var, $visitorMap);
      if (is_object($node->name))
        self::traverseNode($node->name, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\StaticCall) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->class, $visitorMap);
      if (is_object($node->name))
        self::traverseNode($node->name, $visitorMap);
      foreach ($node->args as $argument)
        self::traverseNode($argument, $visitorMap);
      self::traverseVisitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\StaticPropertyFetch) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->class, $visitorMap);
      if (is_object($node->name))
        self::traverseNode($node->name, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Ternary) {
      self::traverseNode($node->cond, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      if (is_object($node->if))
        self::traverseNode($node->if, $visitorMap);
      self::traverseNode($node->else, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Expr\Variable) {
      self::enterNode($node, $visitorMap);
      if (is_object($node->name))
        self::traverseNode($node->name, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Expression) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Name) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\NullableType) {
      self::enterNode($node, $visitorMap);
      if (is_object($node->type))
        self::traverseNode($node->type, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Param) {
      self::enterNode($node, $visitorMap);
      if (is_object($node->type))
        self::traverseNode($node->type, $visitorMap);
      if (is_object($node->default))
        self::traverseNode($node->default, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Scalar) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Break_) {
      self::enterNode($node, $visitorMap);
      if (is_object($node->num))
        self::traverseNode($node->num, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Case_) {
      if (is_object($node->cond))
        self::traverseNode($node->cond, $visitorMap);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);

    }

    if ($node instanceof Node\Stmt\Catch_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->types as $type)
        self::traverseNode($type, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Class_) {
      if ($node->extends)
        self::traverseNode($node->extends, $visitorMap);
      foreach ($node->implements as $implement)
        self::traverseNode($implement, $visitorMap);
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\ClassConst) {
      self::enterNode($node, $visitorMap);
      foreach ($node->consts as $constant)
        self::traverseNode($constant, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\ClassMethod) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->params as $parameter)
        self::traverseNode($parameter, $visitorMap);
      if ($node->stmts)
        foreach ($node->stmts as $statement)
          self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
      if (is_object($node->returnType))
        self::traverseNode($node->returnType, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Const_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->consts as $constant)
        self::traverseNode($constant, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Declare_) {
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->declares as $declare_)
        self::traverseNode($declare_, $visitorMap);
      self::enterNode($node, $visitorMap);
      if ($node->stmts)
        foreach ($node->stmts as $statement)
          self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\DeclareDeclare) {
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->value, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Do_) {
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
      self::traverseNode($node->cond, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Echo_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->exprs as $expression)
        self::traverseNode($expression, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Else_) {
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\ElseIf_) {
      self::traverseNode($node->cond, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Foreach_) {
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      if ($node->keyVar)
        self::traverseNode($node->keyVar, $visitorMap);
      self::traverseNode($node->valueVar, $visitorMap);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Function_) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->params as $parameter)
        self::traverseNode($parameter, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
      if (is_object($node->returnType))
        self::traverseNode($node->returnType, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Global_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->vars as $variable)
        self::traverseNode($variable, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\If_) {
      self::traverseNode($node->cond, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
      foreach ($node->elseifs as $elseif_)
        self::traverseNode($elseif_, $visitorMap);
      if (is_object($node->else))
        self::traverseNode($node->else, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Interface_) {
      foreach ($node->extends as $extend)
        self::traverseNode($extend, $visitorMap);
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Namespace_) {
      if ($node->name)
        self::traverseNode($node->name, $visitorMap);
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Nop) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Property) {
      foreach ($node->props as $property)
        self::traverseNode($property, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    if ($node instanceof Node\Stmt\PropertyProperty) {
      if ($node->default)
        self::traverseNode($node->default, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    if ($node instanceof Node\Stmt\Return_) {
      self::enterNode($node, $visitorMap);
      if ($node->expr)
        self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Static_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->vars as $variable)
        self::traverseNode($variable, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\StaticVar) {
      self::enterNode($node, $visitorMap);
      if ($node->default)
        self::traverseNode($node->default, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Switch_) {
      self::traverseNode($node->cond, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      foreach ($node->cases as $case_)
        self::traverseNode($case_, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Throw_) {
      self::traverseNode($node->expr, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    if ($node instanceof Node\Stmt\Trait_) {
      self::enterNode($node, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\TraitUse) {
      self::enterNode($node, $visitorMap);
      foreach ($node->traits as $trait_)
        self::traverseNode($trait_, $visitorMap);
      foreach ($node->adaptations as $adaptation)
        self::traverseNode($adaptation, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\TryCatch) {
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
      foreach ($node->catches as $catch_)
        self::traverseNode($catch_, $visitorMap);
      if (is_object($node->finally))
        self::traverseNode($node->finally, $visitorMap);

    }

    if ($node instanceof Node\Stmt\Unset_) {
      self::enterNode($node, $visitorMap);
      foreach ($node->vars as $variable)
        self::traverseNode($variable, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
      self::leaveNode($node, $visitorMap);
    }

    if ($node instanceof Node\Stmt\Use_) {
      foreach ($node->uses as $use_)
        self::traverseNode($use_, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    if ($node instanceof Node\Stmt\UseUse) {
      self::traverseNode($node->name, $visitorMap);
      self::visitNode($node, $visitorMap, $modifier);
    }

    $scopeClass = class_exists(Node\Identifier::class)
      ? pnode\Scope::class
      : pnode\ScopeV3::class;

    if ($node instanceof $scopeClass) {
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      self::traverseNode($node->expression, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    $sourceClass = class_exists(Node\Identifier::class)
      ? pnode\Source::class
      : pnode\SourceV3::class;

    if ($node instanceof $sourceClass) {
      self::visitNode($node, $visitorMap, $modifier);
      self::enterNode($node, $visitorMap);
      foreach ($node->stmts as $statement)
        self::traverseNode($statement, $visitorMap);
      self::leaveNode($node, $visitorMap);
    }

    foreach ($visitorMap['afterNode'] as $visitor)
      $visitor($node);

  }

  static function traverseVisitNode ($node, $visitorMap, $modifier = '') {

    if ($modifier == 'skipDirectVisit')
      return;

    self::visitNode($node, $visitorMap, $modifier);

    if ($node instanceof Node\Expr\FuncCall)
      foreach ($node->args as $argument) {
        self::visitNode($argument, $visitorMap);
        self::traverseVisitNode($argument->value, $visitorMap);
      }

    if ($node instanceof Node\Expr\MethodCall)
      foreach ($node->args as $argument) {
        self::visitNode($argument, $visitorMap);
        self::traverseVisitNode($argument->value, $visitorMap);
      }

    if ($node instanceof Node\Expr\New_)
      foreach ($node->args as $argument) {
        self::visitNode($argument, $visitorMap);
        self::traverseVisitNode($argument->value, $visitorMap);
      }

    if ($node instanceof Node\Expr\StaticCall)
      foreach ($node->args as $argument) {
        self::visitNode($argument, $visitorMap);
        self::traverseVisitNode($argument->value, $visitorMap);
      }

  }

  static function enterNode ($node, $visitorMap) {
    foreach ($visitorMap['enterNode'] as $visitor)
      $visitor($node);
  }

  static function leaveNode ($node, $visitorMap) {
    foreach ($visitorMap['leaveNode'] as $visitor)
      $visitor($node);
  }

  static function visitNode ($node, $visitorMap, $modifier = '') {
    if ($modifier == 'skipDirectVisit')
      return;
    foreach ($visitorMap['visitNode'] as $visitor)
      $visitor($node);
  }

}
