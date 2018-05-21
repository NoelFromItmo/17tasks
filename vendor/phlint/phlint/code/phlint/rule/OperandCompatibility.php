<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/operandCompatibility.md
 */
class OperandCompatibility {

  function getIdentifier () {
    return 'operandCompatibility';
  }

  function getCategories () {
    return [
      'default',
      'strict',
    ];
  }

  function getInferences () {
    return [
      'concept',
      'evaluation',
      'expressionSpecialization',
      'isImplicitlyConvertible',
      'symbol',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    if ($node instanceof Node\Expr\AssignOp\Minus) {
      self::enforceRule($node, $node->var, ['t_float']);
      self::enforceRule($node, $node->expr, ['t_float']);
    }

    if ($node instanceof Node\Expr\AssignOp\Plus) {
      self::enforceRule($node, $node->var, ['t_array', 't_float']);
      self::enforceRule($node, $node->expr, ['t_array', 't_float']);
    }

    if ($node instanceof Node\Expr\BinaryOp\Concat) {
      self::enforceRule($node, $node->left, ['t_string']);
      self::enforceRule($node, $node->right, ['t_string']);
    }

    if ($node instanceof Node\Expr\BinaryOp\Minus) {
      self::enforceRule($node, $node->left, ['t_float']);
      self::enforceRule($node, $node->right, ['t_float']);
    }

    if ($node instanceof Node\Expr\BinaryOp\Plus) {
      self::enforceRule($node, $node->left, ['t_array', 't_float']);
      self::enforceRule($node, $node->right, ['t_array', 't_float']);
    }

    if ($node instanceof Node\Stmt\Foreach_)
      self::enforceRule($node, $node->expr, ['t_array', 'c_traversable']);

  }

  static function enforceRule ($expression, $node, $types) {
    foreach (inference\ExpressionSpecialization::get($node) as $specializedNode)
      foreach (inference\Evaluation::get($specializedNode) as $evaluatedNode)
        if (!inference\IsImplicitlyConvertible::get($evaluatedNode, $types))
        if (inference\Symbol::phpID(inference\Concept::nodeConcept($evaluatedNode)))
          MetaContext::get(Result::class)->addViolation(
            $node,
            'operandCompatibility',
            'Operand Compatibility',
            ucfirst(NodeConcept::constructTypeName($node) . ' ' . MarkdownBuilder::inlineCode(NodeConcept::displayPrint($node))) . ' is always or sometimes of type'
            . ' ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID(inference\Concept::nodeConcept($evaluatedNode))) . '.'
            . "\n"
            . ucfirst(NodeConcept::referencePrint($expression)) . ' may cause undesired or unexpected behavior with'
            . ' ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID(inference\Concept::nodeConcept($evaluatedNode))) . ' operands.',
            'Provided ' . NodeConcept::constructTypeName($node) . ' *' . NodeConcept::displayPrint($node) . '* '
            . 'of type *' . inference\Symbol::phpID(inference\Concept::nodeConcept($evaluatedNode)) . '* '
            . 'is not compatible in the expression *' . NodeConcept::displayPrint($expression) . '*.'
          );
  }

}
