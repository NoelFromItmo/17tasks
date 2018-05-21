<?php

namespace phlint\printer;

use \luka8088\phops as op;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \PhpParser\Node;

class Display extends \PhpParser\PrettyPrinter\Standard {

  function printNode ($node) {
    return $this->handleMagicTokens($this->p($node));
  }

  function pClassCommon(Node\Stmt\Class_ $node, $afterClassToken) {
    return $this->pModifiers($node->flags)
      . 'class' . $afterClassToken
      . (null !== $node->extends ? ' extends ' . $this->p($node->extends) : '')
      . (!empty($node->implements) ? ' implements ' . $this->pCommaSeparated($node->implements) : '')
    ;
  }

  function pConst (Node\Const_ $node) {
    return $node->name instanceof Node\Identifier ? $node->name->name : $node->name;
  }

  function pExpr_Array (Node\Expr\Array_ $node) {
    if ($node->getAttribute('kind', Node\Expr\Array_::KIND_SHORT) === Node\Expr\Array_::KIND_LONG)
      return 'array(' . $this->pCommaSeparated($node->items) . ')';
    return '[' . $this->pCommaSeparated($node->items) . ']';
  }

  function pExpr_Closure (Node\Expr\Closure $node) {
    return (inference\Purity::isPure($node) ? '@pure ' : (inference\Isolation::isIsolated($node) ? '@isolated ' : ''))
      . ($node->static ? 'static ' : '')
      . 'function '
      . ($node->byRef ? '&' : '')
      . '(' . $this->pCommaSeparated($node->params) . ')'
      . (!empty($node->uses) ? ' use (' . $this->pCommaSeparated($node->uses) . ')' : '')
      . (null !== $node->returnType ? ' : '
        . (class_exists(Node\Identifier::class) ? $this->p($node->returnType) : $this->pType($node->returnType)) : '')
    ;
  }

  function pExpr_ClosureUse (Node\Expr\ClosureUse $node) {

    $values = inference\Value::get($node);

    if (count($values) > 0)
      return implode('|', array_unique(array_map(function ($value) {
        return $this->p($value);
      }, $values)));

    $typeDisplay = implode('|', array_unique(array_map([inference\Symbol::class, 'phpID'], inference\Concept::get($node))));

    return trim($typeDisplay . ' ' #. ($node->byRef ? '&' : '')
      . (class_exists(Node\Identifier::class) ? $this->p($node->var) : '$' . $node->var));

  }

  function pExpr_FuncCall (Node\Expr\FuncCall $node) {
    if ($node->getAttribute('displayPrint', ''))
      return $node->getAttribute('displayPrint', '');
    return $this->pCallLhs($node->name) . '(' . $this->pCommaSeparated($node->args) . ')';
  }

  function pExpr_StaticCall (Node\Expr\StaticCall $node) {
    return $this->pDereferenceLhs($node->class) . '::'
      . ($node->name instanceof Node\Expr
        ? ($node->name instanceof Node\Expr\Variable
          ? $this->p($node->name)
          : '{' . $this->p($node->name) . '}')
        : $node->name)
      . '(' . $this->pCommaSeparated($node->args) . ')'
    ;
  }

  function pParam (Node\Param $node) {

    $display = [];

    foreach (inference\Evaluation::get($node) as $yieldNode) {
      if (inference\Value::isValueNode($yieldNode)) {
        $display[] = $this->p($yieldNode);
        continue;
      }
      $display[] = inference\Symbol::phpID(inference\Concept::nodeConcept($yieldNode));
    }

    $display = array_unique(array_filter($display, function ($type) { return $type !== ''; }));
    sort($display, SORT_NATURAL | SORT_FLAG_CASE);

    return (count($display) > 0 ? implode('|', $display) . ' ' :
        ($node->type ? $this->p($node->type) . ' ' : '')
      )
      . ($node->byRef ? '&' : '')
      . ($node->variadic ? '...' : '')
      . (class_exists(Node\Identifier::class) ? $this->p($node->var) : '$' . $node->name)
      . (count($display) == 0 && $node->default ? ' = ' . $this->p($node->default) : '')
    ;

  }

  function pStmt_ClassMethod (Node\Stmt\ClassMethod $node) {
    return $this->pModifiers($node->flags)
      . 'function ' . ($node->byRef ? '&' : '') . $node->name
      . '(' . $this->pCommaSeparated($node->params) . ')'
      . (null !== $node->returnType ? ' : '
        . (class_exists(Node\Identifier::class) ? $this->p($node->returnType) : $this->pType($node->returnType)) : '')
    ;
  }

  function pStmt_Declare (Node\Stmt\Declare_ $node) {
    return 'declare (' . $this->pCommaSeparated($node->declares) . ')';
  }

  function pStmt_Do (Node\Stmt\Do_ $node) {
    return 'do {} while (' . $this->p($node->cond) . ')';
  }

  function pStmt_Else (Node\Stmt\Else_ $node) {
    return 'else';
  }

  function pStmt_ElseIf (Node\Stmt\ElseIf_ $node) {
    return 'elseif (' . $this->p($node->cond) . ')';
  }

  function pStmt_For (Node\Stmt\For_ $node) {
    return 'for ('
      . $this->pCommaSeparated($node->init) . ';' . (!empty($node->cond) ? ' ' : '')
      . $this->pCommaSeparated($node->cond) . ';' . (!empty($node->loop) ? ' ' : '')
      . $this->pCommaSeparated($node->loop)
      . ')'
    ;
  }

  function pStmt_Foreach (Node\Stmt\Foreach_ $node) {
    return 'foreach (' . $this->p($node->expr) . ' as '
      . (null !== $node->keyVar ? $this->p($node->keyVar) . ' => ' : '')
      . ($node->byRef ? '&' : '') . $this->p($node->valueVar) . ')'
    ;
  }

  function pStmt_Function (Node\Stmt\Function_ $node) {
    return (inference\Purity::isPure($node) ? '@pure ' : (inference\Isolation::isIsolated($node) ? '@isolated ' : ''))
      . 'function '
      . ($node->byRef ? '&' : '') . $node->name
      . ' (' . $this->pCommaSeparated($node->params) . ')'
      . (null !== $node->returnType ? ' : '
        . (class_exists(Node\Identifier::class) ? $this->p($node->returnType) : $this->pType($node->returnType)) : '')
    ;
  }

  function pStmt_If (Node\Stmt\If_ $node) {
    return 'if (' . $this->p($node->cond) . ')';
  }

  function pStmt_Interface (Node\Stmt\Interface_ $node) {
    return 'interface ' . $node->name
      . (!empty($node->extends) ? ' extends ' . $this->pCommaSeparated($node->extends) : '')
    ;
  }

  function pStmt_Namespace (Node\Stmt\Namespace_ $node) {
    return 'namespace' . (null !== $node->name ? ' ' . $this->p($node->name) : '');
  }

  function pStmt_StaticVar (Node\Stmt\StaticVar $node) {
    return 'static ' . (class_exists(Node\Identifier::class) ? $this->p($node->var) : '$' . $node->name);
  }

  function pStmt_Switch (Node\Stmt\Switch_ $node) {
    return 'switch (' . $this->p($node->cond) . ')';
  }

  function pStmt_Trait (Node\Stmt\Trait_ $node) {
    return 'trait ' . $node->name;
  }

  function pStmt_TryCatch (Node\Stmt\TryCatch $node) {
    return 'try {}'
      . ($node->catches ? ' ' . $this->pImplode($node->catches, ' ') : '')
      . ($node->finally !== null ? ' ' . $this->p($node->finally) : '')
    ;
  }

  function pStmt_Catch (Node\Stmt\Catch_ $node) {
    return 'catch (' . $this->pImplode($node->types, '|')
      . ' ' . (class_exists(Node\Identifier::class) ? $this->p($node->var) : '$' . $node->var)
      . ')'
    ;
  }

  function pStmt_While (Node\Stmt\While_ $node) {
    return 'while (' . $this->p($node->cond) . ')';
  }

  function pCallArgument ($node) {
    return $this->p($node->sourceNode);
  }

  function pScope ($node) {
    return $this->p($node->expression);
  }

  function pYield ($node) {
    return implode('|', array_map(function ($yieldNode) {
      // @todo: Rethink.
      if ($yieldNode instanceof pnode\SymbolAlias)
        return '';
      if ($yieldNode instanceof data\Value)
        return $yieldNode->name;
      return $this->p($yieldNode);
    }, $node->yield));
  }

}
