<?php

namespace phlint;

use \phlint\data;
use \phlint\MarkdownBuilder;
use \phlint\node as pnode;
use \phlint\NodeTraverser;
use \phlint\printer\Display as DisplayPrinter;
use \phlint\printer\Source as SourcePrinter;
use \PhpParser\Node;

class NodeConcept {

  static function getBody ($node) {
    assert(is_object($node));
    if (property_exists($node, 'stmts') && $node->stmts)
      return $node->stmts;
    return [];
  }

  static function isAssign ($node) {
    return false
      || $node instanceof Node\Expr\Assign
      || $node instanceof Node\Expr\AssignOp
      || $node instanceof Node\Expr\AssignRef
    ;
  }

  static function isConditionalExecutionNode (Node $node) {
    return
      ($node instanceof Node\Expr\Ternary) ||
      ($node instanceof Node\Stmt\ElseIf_) ||
      ($node instanceof Node\Stmt\If_) ||
      false;
  }

  static function isContextBarrier (Node $node) {
    return
      ($node instanceof Node\Stmt\Return_) ||
      ($node instanceof Node\Stmt\Throw_) ||
      false;
  }

  static function isScopeNode (Node $node) {
    $scopeClass = class_exists(Node\Identifier::class)
      ? pnode\Scope::class
      : pnode\ScopeV3::class;
    return
      $node instanceof Node\Stmt\Namespace_ ||
      /**
       * pnode\Source forms a new scope so that certain inferences and rules
       * can detect and disallow cross-file references - for example
       * referencing a variables that has been initialized in file A
       * from file B.
       */
      $node instanceof $scopeClass ||
      NodeConcept::isContextNode($node) ||
      NodeConcept::isExecutionBranchNode($node) ||
      false;
  }

  static function isDeclarationNode (Node $node) {
    return
      ($node instanceof Node\Const_) ||
      ($node instanceof Node\Stmt\PropertyProperty) ||
      ($node instanceof Node\Stmt\StaticVar) ||
      false;
  }

  static function isDefinitionNode ($node) {
    return
      ($node instanceof Node\Const_) ||
      ($node instanceof Node\Expr\Closure) ||
      ($node instanceof Node\Stmt\Class_) ||
      ($node instanceof Node\Stmt\ClassMethod) ||
      ($node instanceof Node\Stmt\Function_) ||
      ($node instanceof Node\Stmt\Interface_) ||
      ($node instanceof Node\Stmt\Namespace_) ||
      ($node instanceof Node\Stmt\Trait_) ||
      false;
  }

  static function isExecutionBarrier (Node $node) {
    return
      ($node instanceof Node\Expr\Exit_) ||
      ($node instanceof Node\Stmt\Break_) ||
      ($node instanceof Node\Stmt\Continue_) ||
      ($node instanceof Node\Stmt\Return_) ||
      ($node instanceof Node\Stmt\Throw_) ||
      false;
  }

  static function isInvocationNode ($node) {
    return
      ($node instanceof Node\Expr\FuncCall) ||
      ($node instanceof Node\Expr\MethodCall) ||
      ($node instanceof Node\Expr\StaticCall) ||
      false;
  }

  static function isImport ($node) {
    return
      $node instanceof Node\Stmt\TraitUse ||
      $node instanceof Node\Stmt\Use_ ||
      false;
  }

  /**
   * The term "interface" in programming is mostly used in context of
   * object orientated programming and most of the times implies that.
   *
   * In Phlint term "interface" also exclusively mean object interface.
   */
  static function isInterfaceNode (Node $node) {
    return
      ($node instanceof Node\Stmt\Class_) ||
      ($node instanceof Node\Stmt\Interface_) ||
      false;
  }

  /**
   * Right-hand side symbol nodes can be used as an expression
   * but can't be assigned values to.
   */
  static function isRhsSymbolNode (Node $node) {
    return
      ($node instanceof Node\Expr\ConstFetch) ||
      NodeConcept::isInvocationNode($node) ||
      NodeConcept::isVariableNode($node) ||
      false;
  }

  static function isValueLiteral (Node $node) {
    return
      ($node instanceof Node\Scalar\DNumber) ||
      ($node instanceof Node\Scalar\LNumber) ||
      ($node instanceof Node\Scalar\String_) ||
      false;
  }

  static function isContextNode (Node $node) {
    return
      ($node instanceof Node\Expr\Closure) ||
      ($node instanceof Node\Stmt\Class_) ||
      ($node instanceof Node\Stmt\ClassMethod) ||
      ($node instanceof Node\Stmt\Function_) ||
      ($node instanceof Node\Stmt\Interface_) ||
      ($node instanceof Node\Stmt\Trait_) ||
      false;
  }

  static function isExecutionContextNode ($node) {
    return
      ($node instanceof Node\Stmt\ClassMethod) ||
      ($node instanceof Node\Expr\Closure) ||
      ($node instanceof Node\Stmt\Function_) ||
      false;
  }

  static function isExecutionBranchNode (Node $node) {
    return
      ($node instanceof Node\Expr\BinaryOp\BooleanAnd) ||
      ($node instanceof Node\Stmt\Case_) ||
      ($node instanceof Node\Stmt\Catch_) ||
      ($node instanceof Node\Stmt\Else_) ||
      ($node instanceof Node\Stmt\ElseIf_) ||
      ($node instanceof Node\Stmt\Foreach_) ||
      ($node instanceof Node\Stmt\If_) ||
      ($node instanceof Node\Stmt\Switch_) ||
      ($node instanceof Node\Stmt\While_) ||
      false;
  }

  static function isLoop (Node $node) {
    return
      ($node instanceof Node\Stmt\Do_) ||
      ($node instanceof Node\Stmt\For_) ||
      ($node instanceof Node\Stmt\Foreach_) ||
      ($node instanceof Node\Stmt\While_) ||
      false;
  }

  static function isLoopScopeBarrier (Node $node) {
    return
      ($node instanceof Node\Stmt\Break_) ||
      ($node instanceof Node\Stmt\Continue_) ||
      NodeConcept::isContextBarrier($node) ||
      false;
  }

  static function isNamedNode (Node $node) {
    return
      ($node instanceof Node\Expr\ClosureUse) ||
      ($node instanceof Node\Expr\StaticPropertyFetch) ||
      ($node instanceof Node\Expr\Variable) ||
      ($node instanceof Node\Param) ||
      ($node instanceof Node\Stmt\Class_) ||
      ($node instanceof Node\Stmt\ClassMethod) ||
      ($node instanceof Node\Stmt\Function_) ||
      ($node instanceof Node\Stmt\Interface_) ||
      ($node instanceof Node\Stmt\Namespace_) ||
      ($node instanceof Node\Stmt\PropertyProperty) ||
      ($node instanceof Node\Stmt\Trait_) ||
      false;
  }

  static function isNamespaceNode ($node) {
    return
      ($node instanceof Node\Stmt\Namespace_) ||
      false;
  }

  static function isVariableNode ($node) {
    return
      ($node instanceof Node\Expr\ClosureUse) ||
      ($node instanceof Node\Expr\Variable) ||
      ($node instanceof Node\Param) ||
      /**
       * In case of `Node\Stmt\Catch_` $node->var is a string representing the variable
       * in question - there is no intermediate `Node\Expr\Variable` node. Hence catch
       * is a variable node itself.
       */
      ($node instanceof Node\Stmt\Catch_) ||
      ($node instanceof Node\Stmt\StaticVar) ||
      false;
  }

  static function key ($node) {
    if ($node instanceof Node\Scalar\LNumber)
      return 't_int:' . $node->value;
    if ($node instanceof Node\Scalar\String_)
      return 't_string:' . $node->value;
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'true')
      return 't_bool:true';
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'false')
      return 't_bool:false';
    if ($node instanceof Node\Expr\ConstFetch && strtolower($node->name->toString()) == 'null')
      return 't_variant:null';
    assert(false);
    if ($node instanceof pnode\SymbolAlias)
      return $node->id;
    assert(false);
  }

  static function deepClone ($node) {

    if (is_array($node)) {
      $clonedNode = [];
      foreach ($node as $index => $subNode)
        $clonedNode[$index] = self::deepClone($subNode);
      return $clonedNode;
    }

    if (!is_object($node))
      return $node;

    $clonedNode = clone $node;

    $clonedNode->iiData = null;

    foreach ($node->getSubNodeNames() as $subNodeName)
      $clonedNode->$subNodeName = self::deepClone($node->$subNodeName);

    return $clonedNode;
  }

  static function deepCount ($node) {

    $count = 0;

    if (is_array($node)) {
      foreach ($node as $index => $subNode)
        $count += self::deepCount($subNode);
      return $count;
    }

    if (!is_object($node))
      return $count;

    $count += 1;

    foreach ($node->getSubNodeNames() as $subNodeName)
      $count += self::deepCount($node->$subNodeName);

    return $count;
  }

  /**
   * Does $nodeA and nodeB represent the same thing.
   */
  static function isSame ($nodeA, $nodeB) {
    if ($nodeA instanceof Node\Arg)
      return self::isSame($nodeA->value, $nodeB);
    if ($nodeB instanceof Node\Arg)
      return self::isSame($nodeA, $nodeB->value);
    if (($nodeA instanceof Node\Expr\Variable) && ($nodeB instanceof Node\Expr\Variable))
      if (is_string($nodeA->name) && is_string($nodeB->name) && $nodeA->name == $nodeB->name)
        return true;
    return false;
  }

  static function sourcePrint ($node) {
    if (is_string($node))
      return $node;
    if ($node instanceof Node && $node->getAttribute('sourcePrint', ''))
      return $node->getAttribute('sourcePrint', '');
    $prettyPrinter = new SourcePrinter();
    if ($node instanceof Node\Name) {
      try {
        $comments = $node->getAttribute('comments', []);
        $node->setAttribute('comments', []);
        $printed = $prettyPrinter->prettyPrint([$node]);
      } finally {
        $node->setAttribute('comments', $comments);
      }
      return $printed;
    }
    return $prettyPrinter->prettyPrint([$node]);
  }

  static function displayPrint ($node) {

    if ($node instanceof data\Value)
      return implode('|', array_map([NodeConcept::class, 'displayPrint'], $node->constraints));

    if ($node instanceof pnode\RangeValueFetch)
      return '';

    if ($node instanceof pnode\SymbolAlias)
      return \phlint\inference\Symbol::phpID($node->id);

    if ($node instanceof Node && $node->getAttribute('displayPrint', ''))
      return $node->getAttribute('displayPrint', '');

    $printer = function ($node) {
      if (is_string($node))
        return $node;
      $printer = new DisplayPrinter();
      return $printer->printNode($node);
    };

    $printed = $printer($node);

    if (false)
    assert(
      strpos($printed, "\n") === false,
      '*' . $printed . '* (' . (is_object($node) ? get_class($node) : gettype($node)) . ') contains a new line.'
    );

    if (false)
    assert(
      strlen($printed) <= 1000,
      '*' . $printed . '* (' . (is_object($node) ? get_class($node) : gettype($node)) . ') is too long.'
    );

    return $printed;

  }

  static function referencePrint ($node) {
    if (is_array($node))
      return 'type ' . MarkdownBuilder::inlineCode(implode('|', array_unique(array_map(function ($node) {
        return NodeConcept::displayPrint($node);
      }, $node))));
    // @todo: Enable.
    if (false)
    if (inference\Value::isValueNode($node))
      return 'value ' . MarkdownBuilder::inlineCode(NodeConcept::displayPrint($node));
    $constructTypeName = '';
    if (NodeConcept::constructTypeName($node))
      $constructTypeName = NodeConcept::constructTypeName($node);
    if ($constructTypeName == 'value' && $node instanceof Node\Expr\Array_)
      return 'type `array`';
    if ($constructTypeName == 'value' && $node instanceof Node\Expr\ConstFetch && in_array(strtolower($node->name->toString()), ['null']))
      return 'type `null`';
    if ($constructTypeName == 'value' && $node instanceof Node\Expr\ConstFetch && in_array(strtolower($node->name->toString()), ['false', 'true']))
      return 'type `bool`';
    if ($constructTypeName == 'value' && $node instanceof Node\Scalar\DNumber)
      return 'type `float`';
    if ($constructTypeName == 'value' && $node instanceof Node\Scalar\LNumber)
      return 'type `int`';
    if ($constructTypeName == 'value' && $node instanceof Node\Scalar\String_)
      return 'type `string`';
    return ($constructTypeName ? $constructTypeName . ' ' : '') . MarkdownBuilder::inlineCode(NodeConcept::displayPrint($node));
  }

  static function referencePrintLegacy ($node) {
    if (is_array($node))
      return 'type *' . implode('|', array_unique(array_map(function ($node) { return NodeConcept::displayPrint($node); }, $node))) . '*';
    // @todo: Enable.
    if (false)
    if (inference\Value::isValueNode($node))
      return 'value *' . NodeConcept::displayPrint($node) . '*';
    $constructTypeName = '';
    if (NodeConcept::constructTypeName($node))
      $constructTypeName = NodeConcept::constructTypeName($node);
    if ($constructTypeName == 'value' && $node instanceof Node\Expr\Array_)
      return 'type *array*';
    if ($constructTypeName == 'value' && $node instanceof Node\Expr\ConstFetch && in_array(strtolower($node->name->toString()), ['null']))
      return 'type *null*';
    if ($constructTypeName == 'value' && $node instanceof Node\Expr\ConstFetch && in_array(strtolower($node->name->toString()), ['false', 'true']))
      return 'type *bool*';
    if ($constructTypeName == 'value' && $node instanceof Node\Scalar\DNumber)
      return 'type *float*';
    if ($constructTypeName == 'value' && $node instanceof Node\Scalar\LNumber)
      return 'type *int*';
    if ($constructTypeName == 'value' && $node instanceof Node\Scalar\String_)
      return 'type *string*';
    return ($constructTypeName ? $constructTypeName . ' ' : '') . '*' . NodeConcept::displayPrint($node) . '*';
  }

  static function constructTypeName ($node) {

    if ($node instanceof data\Value)
      return 'type';

    if ($node instanceof pnode\SymbolAlias)
      return 'type';

    if ($node instanceof Node && $node->getAttribute('constructTypeName', ''))
      return $node->getAttribute('constructTypeName', '');

    if ($node instanceof Node\Arg)
      return 'argument';

    if ($node instanceof Node\Expr\Array_)
      return 'value';

    if ($node instanceof Node\Expr\ConstFetch)
      return 'value';

    if ($node instanceof Node\Expr\Closure)
      return 'function';

    if ($node instanceof Node\Expr\ClosureUse)
      return 'variable';

    if ($node instanceof Node\Expr\FuncCall)
      return 'expression';

    if ($node instanceof Node\Expr\New_)
      return 'expression';

    if ($node instanceof Node\Expr\MethodCall)
      return 'expression';

    if ($node instanceof Node\Expr\StaticCall)
      return 'expression';

    if ($node instanceof Node\Expr\Variable)
      return 'variable';

    if ($node instanceof Node\Name)
      return '';

    if ($node instanceof Node\Scalar\DNumber)
      return 'value';

    if ($node instanceof Node\Scalar\LNumber)
      return 'value';

    if ($node instanceof Node\Scalar\MagicConst)
      return 'magic constant';

    if ($node instanceof Node\Scalar\String_)
      return 'value';

    if ($node instanceof Node\Stmt\Catch_)
      return 'catch';

    if ($node instanceof Node\Stmt\Class_)
      return 'class';

    if ($node instanceof Node\Stmt\ClassMethod)
      return 'method';

    if ($node instanceof Node\Stmt\Foreach_)
      return 'loop';

    if ($node instanceof Node\Stmt\Function_)
      return 'function';

    if ($node instanceof Node\Stmt\Interface_)
      return 'interface';

    if ($node instanceof Node\Stmt\Namespace_)
      return 'namespace';

    if ($node instanceof Node\Stmt\StaticVar)
      return 'variable';

    if ($node instanceof Node\Stmt\UseUse)
      return 'import';

    if ($node instanceof Node\Expr)
      return 'expression';

    return '__' . get_class($node) . '__';

  }

}
