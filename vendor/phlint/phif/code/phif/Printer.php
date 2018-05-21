<?php

namespace phif;

use \PhpParser\Node;

class Printer extends \PhpParser\PrettyPrinter\Standard {

  protected function pClassCommon (Node\Stmt\Class_ $node, $afterClassToken) {
    return $this->pModifiers($node->flags)
      . 'class' . $afterClassToken
      . (null !== $node->extends ? ' extends ' . $this->p($node->extends) : '')
      . (!empty($node->implements) ? ' implements ' . $this->pCommaSeparated($node->implements) : '')
      . (count($node->stmts) > 0 ? "\n" . '{' . $this->pStmts($node->stmts) . "\n" . '}' : ' {}');
  }

  protected function pExpr_Array (Node\Expr\Array_ $node) {
    return '[' . $this->pCommaSeparated($node->items) . ']';
  }

  protected function pStmt_Interface (Node\Stmt\Interface_ $node) {
    return 'interface ' . $node->name
      . (!empty($node->extends) ? ' extends ' . $this->pCommaSeparated($node->extends) : '')
      . (count($node->stmts) > 0 ? "\n" . '{' . $this->pStmts($node->stmts) . "\n" . '}' : ' {}');
  }

  protected function pParam (Node\Param $node) {
    return (count($node->getAttribute('comments', [])) > 0 ?
      $this->pComments($node->getAttribute('comments', [])) . ' ' : '')
      . ($node->type ? $this->pType($node->type) . ' ' : '')
      . ($node->byRef ? '&' : '')
      . ($node->variadic ? '...' : '')
      . $this->p($node->var)
      . ($node->default ? ' = ' . $this->p($node->default) : '');
  }

  protected function pStmt_ClassMethod (Node\Stmt\ClassMethod $node) {
    return $this->pModifiers($node->flags)
      . 'function ' . ($node->byRef ? '&' : '') . $node->name
      . '(' . $this->pCommaSeparated($node->params) . ')'
      . (null !== $node->returnType ? ' : ' . $this->pType($node->returnType) : '')
      . (null !== $node->stmts
      ? (count($node->stmts) > 0 ? "\n" . '{' . $this->pStmts($node->stmts) . "\n" . '}' : ' {}')
      : ';');
  }

  protected function pStmt_Function (Node\Stmt\Function_ $node) {
    return 'function ' . ($node->byRef ? '&' : '') . $node->name
      . '(' . $this->pCommaSeparated($node->params) . ')'
      . (null !== $node->returnType ? ' : ' . $this->pType($node->returnType) : '')
      . (count($node->stmts) > 0 ? "\n" . '{' . $this->pStmts($node->stmts) . "\n" . '}' : ' {}');
  }

}
