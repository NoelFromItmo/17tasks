<?php

namespace phlint\inference;

use \ArrayObject;
use \luka8088\ExtensionCall;
use \luka8088\ExtensionInterface;
use \luka8088\phops\MetaContext;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class Simulation {

  function getIdentifier () {
    return 'simulation';
  }

  function getPass () {
    return 30;
  }

  function getDependencies () {
    return [
      'executionBarrier',
      'hasExecutionBarrier',
      'isAssignee',
      'symbol',
    ];
  }

  static function get ($node) {

    // @todo: Remove.
    if (!isset($node->iiData['simulationYield']))
      return [];

    if (isset($node->iiData['simulationYield']))
      return $node->iiData['simulationYield'];
    assert(false, 'Not simulated yet.');
  }

  function enterNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    self::inferScopeSymbolsYield($node);

  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    self::inferSymbolYield($node);
    self::inferNodeYield($node);

    MetaContext::get(ExtensionInterface::class)['phlint.inference.simulateNode']->__invoke($node);

  }

  function afterNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    self::inferBranchJoinYield($node);
    self::inferArgumentsMutation($node);
    self::inferNodeReturnYield($node);

    if (!isset($node->iiData['simulationYield']))
      $node->iiData['simulationYield'] = [];

  }

  static function inferScopeSymbolsYield ($node) {

    if (!inference\IsScope::get($node))
      return;

    if (NodeConcept::isContextNode($node))
      return;

    $parentScope = inference\Simulation::precedingScope($node);

    $parentScopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($parentScope);
    $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($node);
    foreach ($parentScopeSymbolsGuaranteeYield as $symbol => $yieldNodes)
      $scopeSymbolsGuaranteeYield[$symbol] = $yieldNodes;

    $parentScopeSymbolsYield = inference\Simulation::scopeSymbolsYield($parentScope);
    $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($node);
    foreach ($parentScopeSymbolsYield as $symbol => $yieldNodes)
      $scopeSymbolsYield[$symbol] = $yieldNodes;

    foreach (inference\ScopedGuarantee::get($node) as $guarantee) {
      foreach (inference\SymbolLink::get($guarantee['node']) as $symbol) {

        if (isset($scopeSymbolsYield[$symbol]))
          $scopeSymbolsYield[$symbol] = array_filter(array_map(function ($node) use ($guarantee) {
            return inference\NodeIntersection::get($node, $guarantee['yield']);
          }, $scopeSymbolsYield[$symbol]));

        if (!isset($scopeSymbolsGuaranteeYield[$symbol]))
          $scopeSymbolsGuaranteeYield[$symbol] = [];

        $scopeSymbolsGuaranteeYield[$symbol] = array_filter(array_map(function ($node) use ($guarantee) {
          return inference\NodeIntersection::get($node, $guarantee['yield']);
        }, $scopeSymbolsGuaranteeYield[$symbol]));

        foreach ($guarantee['yield'] as $guaranteeYieldNode) {
          $intersectionNode = inference\NodeIntersection::get(
            $guaranteeYieldNode,
            isset($scopeSymbolsYield[$symbol]) ? $scopeSymbolsYield[$symbol] : []
          );
          if ($intersectionNode)
            $scopeSymbolsGuaranteeYield[$symbol][] = $intersectionNode;
        }

      }
    }

  }

  static function inferSymbolYield ($node) {

    if ($node instanceof Node\Expr\Assign || $node instanceof Node\Expr\AssignRef) {

      if ($node->var instanceof Node\Expr\ArrayDimFetch) {
        $scope = inference\NodeRelation::scopeNode($node->var->var);
        $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($scope);
        $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);
        foreach (inference\SymbolLink::get($node->var->var) as $symbol) {
          if ($symbol == 'v_this')
            continue;
          if (!isset($scopeSymbolsYield[$symbol]))
            inference\IsInitialization::set($node->var->var, $symbol, true);
          if (!isset($scopeSymbolsYield[$symbol]))
            $scopeSymbolsYield[$symbol] = [new Node\Expr\Array_()];
          $scopeSymbolsYield[$symbol] = array_map(function ($yieldNode) {
            if (inference\NodeComparison::isAlways($yieldNode, 'o_undefined'))
              return new Node\Expr\Array_();
            return $yieldNode;
          }, $scopeSymbolsYield[$symbol]);
          $yieldClass = class_exists(Node\Identifier::class)
            ? pnode\Yield_::class
            : pnode\YieldV3::class;
          if (isset($GLOBALS['phlintExperimental']) && $GLOBALS['phlintExperimental'])
          foreach ($scopeSymbolsYield[$symbol] as $symbolYieldNode)
            if ($symbolYieldNode instanceof Node\Expr\Array_)
              $symbolYieldNode->items[] = new Node\Expr\ArrayItem(new $yieldClass(inference\Evaluation::get($node->expr)));
        }
      }

      if ($node->var instanceof Node\Expr\List_)
        foreach ($node->var->items as $index => $listItem)
          if ($listItem && $listItem->value instanceof Node\Expr\Variable) {
            $scope = inference\NodeRelation::scopeNode($listItem->value);
            $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($scope);
            $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);
            foreach (inference\SymbolLink::get($listItem->value) as $symbol) {
              if (isset($scopeSymbolsGuaranteeYield[$symbol]))
                unset($scopeSymbolsGuaranteeYield[$symbol]);
              $scopeSymbolsYield[$symbol] = [new pnode\SymbolAlias('o_defined')];
            }
          }

      if ($node->var instanceof Node\Expr\Variable) {
        $scope = inference\NodeRelation::scopeNode($node->var);
        $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($scope);
        $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);
        foreach (inference\SymbolLink::get($node->var) as $symbol) {
          if (!isset($scopeSymbolsYield[$symbol]))
            inference\IsInitialization::set($node->var, $symbol, true);
          if (isset($scopeSymbolsGuaranteeYield[$symbol]))
            unset($scopeSymbolsGuaranteeYield[$symbol]);
          $scopeSymbolsYield[$symbol] = array_map(function ($yieldNode) {
            if (inference\NodeComparison::isAlways($yieldNode, 'o_undefined'))
              return new Node\Expr\ConstFetch(new Node\Name('null'));
            return $yieldNode;
          }, inference\Evaluation::get($node->expr));
          foreach (inference\Attribute::get($node->var) as $attribute) {
            if ($attribute instanceof Node\Expr\New_ &&
                count($attribute->args) >= 1 &&
                inference\Value::isEqual($attribute->args[0], 'var')) {
              foreach (inference\Evaluation::getPHPID($attribute->args[1]->value->items[0]->value->value, $node) as $evaluatedNode)
                $scopeSymbolsYield[$symbol][] = new data\Value([$evaluatedNode]);
            }
          }
          $scopeSymbolsYield[$symbol][] = new pnode\SymbolAlias('o_defined');
        }
      }

    }

    if ($node instanceof Node\Expr\AssignOp\Minus) {
      if ($node->var instanceof Node\Expr\Variable) {
        $scope = inference\NodeRelation::scopeNode($node->var);
        $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($scope);
        $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);
        foreach (inference\SymbolLink::get($node->var) as $symbol) {
          if (!isset($scopeSymbolsYield[$symbol]))
            inference\IsInitialization::set($node->var, $symbol, true);
          if (isset($scopeSymbolsGuaranteeYield[$symbol]))
            unset($scopeSymbolsGuaranteeYield[$symbol]);
          $scopeSymbolsYield[$symbol] = [new data\Value([new pnode\SymbolAlias('t_int')])];
          $scopeSymbolsYield[$symbol][] = new pnode\SymbolAlias('o_defined');
        }
      }
    }

    if ($node instanceof Node\Expr\ClosureUse) {
      $scope = inference\NodeRelation::scopeNode($node);
      $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);
      $parentScope = inference\NodeRelation::scopeNode($scope);
      $parentScopeSymbolsYield = inference\Simulation::scopeSymbolsYield($parentScope);
      if (isset($parentScopeSymbolsYield[DeclarationSymbol::get($node)]))
        $scopeSymbolsYield[DeclarationSymbol::get($node)] = $parentScopeSymbolsYield[DeclarationSymbol::get($node)];
    }

    if ($node instanceof Node\Param) {
      $symbol = DeclarationSymbol::get($node);
      $scope = inference\NodeRelation::scopeNode($node);
      $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);
      $yieldNodes = array_map(
        function ($yieldNode) { return clone $yieldNode; },
        inference\Evaluation::get($node)
      );
      if ($node->default) {
        $defaultYield = array_map(
          function ($yieldNode) { return clone $yieldNode; },
          inference\Evaluation::get($node->default)
        );
        $yieldNodes = array_filter($yieldNodes, function ($yieldNode) use ($defaultYield) {
          return !inference\NodeComparison::isAlways($defaultYield, $yieldNode);
        });
        if (count($yieldNodes) == 0)
          foreach ($defaultYield as $yieldNode)
            $yieldNodes[] = $yieldNode;
      }
      $yieldNodes[] = new pnode\SymbolAlias('o_defined');
      $scopeSymbolsYield[$symbol] = $yieldNodes;
    }

    if ($node instanceof Node\Stmt\Catch_)
      inference\Simulation::scopeSymbolsYield($node)[DeclarationSymbol::get($node)] = [new pnode\SymbolAlias('o_defined')];

    if ($node instanceof Node\Stmt\Foreach_) {
      $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield(inference\NodeRelation::scopeNode($node->valueVar));
      if ($node->keyVar)
        foreach (inference\SymbolLink::get($node->keyVar) as $symbol) {
          $scopeSymbolsYield[$symbol] = inference\Evaluation::lookup(new pnode\RangeKeyFetch($node->expr));
          $scopeSymbolsYield[$symbol][] = new pnode\SymbolAlias('o_defined');
        }
      foreach (inference\SymbolLink::get($node->valueVar) as $symbol) {
        $scopeSymbolsYield[$symbol] = inference\Evaluation::lookup(new pnode\RangeValueFetch($node->expr));
        $scopeSymbolsYield[$symbol][] = new pnode\SymbolAlias('o_defined');
      }
    }

    if ($node instanceof Node\Stmt\Global_)
      foreach ($node->vars as $variable)
        foreach (inference\SymbolLink::get($variable) as $symbol)
          inference\Simulation::scopeSymbolsYield(inference\NodeRelation::scopeNode($node))[$symbol] = [new pnode\SymbolAlias('o_defined')];

    if ($node instanceof Node\Stmt\Return_) {
      $context = inference\NodeRelation::contextNode($node);
      if (!$context)
        $context = inference\NodeRelation::sourceNode($node);
      if (!isset($context->iiData['memo:returnYield']))
        $context->iiData['memo:returnYield'] = [];
      if ($node->expr)
        $context->iiData['memo:returnYield'] = array_merge($context->iiData['memo:returnYield'], [$node->expr]);
    }

    if ($node instanceof Node\Stmt\Static_)
      foreach ($node->vars as $variable)
        inference\Simulation::scopeSymbolsYield(inference\NodeRelation::scopeNode($node))[inference\DeclarationSymbol::get($variable)] = [new pnode\SymbolAlias('o_defined')];

    if ($node instanceof Node\Stmt\Unset_)
      foreach ($node->vars as $variable) {
        foreach (inference\SymbolLink::get($variable) as $symbol) {
          if (isset(inference\Simulation::scopeSymbolsGuaranteeYield(inference\NodeRelation::scopeNode($variable))[$symbol]))
            unset(inference\Simulation::scopeSymbolsGuaranteeYield(inference\NodeRelation::scopeNode($variable))[$symbol]);
          inference\Simulation::scopeSymbolsYield(inference\NodeRelation::scopeNode($variable))[$symbol] = [new pnode\Excludes(new pnode\SymbolAlias('o_defined'))];
        }
      }

  }

  static function inferNodeYield ($node) {

    if ($node instanceof Node\Expr\ClosureUse) {
      $node->iiData['simulationYield']
        = isset(inference\Simulation::scopeSymbolsYield(inference\NodeRelation::scopeNode($node))[DeclarationSymbol::get($node)])
        ? inference\Simulation::scopeSymbolsYield(inference\NodeRelation::scopeNode($node))[DeclarationSymbol::get($node)]
        : (inference\IsAssignee::get($node) ? [] : [new pnode\Excludes(new pnode\SymbolAlias('o_defined'))]);
    }

    if ($node instanceof Node\Expr\FuncCall)
      inference\Simulation::inferNodeCallArgument($node);

    if ($node instanceof Node\Expr\MethodCall)
      inference\Simulation::inferNodeCallArgument($node);

    if ($node instanceof Node\Expr\New_)
      inference\Simulation::inferNodeCallArgument($node);

    if ($node instanceof Node\Expr\StaticCall)
      inference\Simulation::inferNodeCallArgument($node);

    if ($node instanceof Node\Expr\Variable)
      $node->iiData['simulationYield'] = inference\Simulation::nodeYield($node);

  }

  static function inferNodeCallArgument ($node) {
    // @todo: Remove condition.
    if (!isset($node->iiData['callArguments']))
    inference\CallArgument::set($node, array_map(function ($argument) {
      $callArgumentClass = class_exists(Node\Identifier::class)
        ? pnode\CallArgument::class
        : pnode\CallArgumentV3::class;
      return NodeRelation::cloneRelations($argument, new $callArgumentClass($argument,
          array_filter(inference\Simulation::nodeYield($argument), function ($node) {
        return !($node instanceof pnode\SymbolAlias) || $node->id !=  'o_undefined';
      })));
    }, $node->args));
    inference\SymbolLink::get($node);
  }

  static function inferNodeReturnYield ($node) {

    if (!NodeConcept::isContextNode($node))
      return;

    assert(!isset($node->iiData['returnYield']));

    $node->iiData['returnYield'] = isset($node->iiData['memo:returnYield']) ? $node->iiData['memo:returnYield'] : [];

  }

  /** @ExtensionCall("phlint.inference.simulateNode/default") */
  static function simulateNode ($node) {}

  static function inferBranchJoinYield ($node) {

    if ($node instanceof Node\Stmt\Else_)
      return;

    if (!inference\IsScope::get($node))
      return;

    $scope = inference\NodeRelation::scopeNode($node);

    if (!$scope)
      return;

    if (inference\Simulation::hasVirtualElse($node))
      self::inferScopeSymbolsYield(inference\Simulation::virtualElse($node));

    $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);

    $symbols = [];
    foreach (inference\Simulation::subScopeNodes($node) as $subScopeNode)
      foreach (inference\Simulation::scopeSymbolsYield($subScopeNode) as $symbol => $yieldNodes)
        $symbols[] = $symbol;
    $symbols = array_unique($symbols);

    foreach (inference\Simulation::subScopeNodes($node) as $subScopeNode) {
      $subScopeSymbolsYield = inference\Simulation::scopeSymbolsYield($subScopeNode);
      $subScopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($subScopeNode);
      foreach ($symbols as $symbol) {
        if (isset($scopeSymbolsYield[$symbol]))
          continue;
        if (!isset($subScopeSymbolsYield[$symbol]))
          $subScopeSymbolsYield[$symbol] = isset($scopeSymbolsYield[$symbol]) ? $scopeSymbolsYield[$symbol] : [];
        if (count($subScopeSymbolsYield[$symbol]) == 0)
          $subScopeSymbolsYield[$symbol][] = new pnode\SymbolAlias('o_undefined');
        if (isset($subScopeSymbolsGuaranteeYield[$symbol]))
          $subScopeSymbolsYield[$symbol] = array_filter($subScopeSymbolsYield[$symbol], function ($node) use ($subScopeSymbolsGuaranteeYield, $symbol) {
            return inference\NodeComparison::isAlways($node, $subScopeSymbolsGuaranteeYield[$symbol]);
          });
      }
    }

    $newSymbolsYield = [];
    foreach (inference\Simulation::subScopeNodes($node) as $subScopeNode) {
      if (inference\HasExecutionBarrier::get($subScopeNode))
        continue;
      foreach (inference\Simulation::scopeSymbolsYield($subScopeNode) as $symbol => $yieldNodes) {
        if (!isset($newSymbolsYield[$symbol]))
          $newSymbolsYield[$symbol] = [];
        foreach ($yieldNodes as $yieldNode)
          $newSymbolsYield[$symbol][] = $yieldNode;
      }
    }

    $originalScopeSymbolsYield = $scopeSymbolsYield->getArrayCopy();

    foreach ($newSymbolsYield as $symbol => $yieldNodes)
      $scopeSymbolsYield[$symbol] = inference\UniqueNode::get($yieldNodes);

    if ($node instanceof Node\Stmt) {
      $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($scope);
      $newSymbolsGuaranteeYield = [];
      foreach (inference\Simulation::subScopeNodes($node) as $subScopeNode) {
        if (inference\HasExecutionBarrier::get($subScopeNode))
          continue;
        $subScopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($subScopeNode);
        foreach ($newSymbolsGuaranteeYield as $symbol => $_)
          if (!isset($subScopeSymbolsGuaranteeYield[$symbol]))
            unset($newSymbolsGuaranteeYield[$symbol]);
        foreach (inference\Simulation::scopeSymbolsGuaranteeYield($subScopeNode) as $symbol => $yieldNodes) {
          if (!isset($newSymbolsGuaranteeYield[$symbol]))
            $newSymbolsGuaranteeYield[$symbol] = $yieldNodes;
          $newSymbolsGuaranteeYield[$symbol] = array_uintersect($newSymbolsGuaranteeYield[$symbol], $yieldNodes, function ($a, $b) {
            return strcmp(inference\NodeKey::get($a), inference\NodeKey::get($b));
          });
          $newSymbolsGuaranteeYield[$symbol] = array_filter(array_map(function ($node) use ($originalScopeSymbolsYield, $symbol) {
            return inference\NodeIntersection::get($node, isset($originalScopeSymbolsYield[$symbol]) ? $originalScopeSymbolsYield[$symbol] : []);
          }, $newSymbolsGuaranteeYield[$symbol]));
        }
      }
      foreach ($newSymbolsGuaranteeYield as $symbol => $yieldNodes)
        if (count($yieldNodes) > 0)
          $scopeSymbolsGuaranteeYield[$symbol] = inference\UniqueNode::get($yieldNodes);
    }

  }

  static function inferArgumentsMutation ($node) {

    if (!NodeConcept::isInvocationNode($node))
      return;

    foreach ($node->args as $argumentIndex => $argument)
      foreach (inference\SymbolLink::get($argument) as $symbol)
        foreach (inference\DeclarationLink::get($node) as $declaration)
          if (isset($declaration->params[$argumentIndex]))
            foreach (inference\Attribute::get($declaration->params[$argumentIndex]) as $attribute)
              if ($attribute instanceof Node\Expr\New_ &&
                  count($attribute->args) >= 1 &&
                  inference\Value::isEqual($attribute->args[0], 'out')) {
                inference\Simulation::scopeSymbolsYield(inference\NodeRelation::scopeNode($argument))[$symbol]
                  = [new pnode\SymbolAlias('o_defined')];
                $argument->value->iiData['simulationYield'] = [new pnode\SymbolAlias('o_defined')];
              }

  }

  static function precedingScope ($node) {

    $scopeClass = class_exists(Node\Identifier::class)
      ? pnode\Scope::class
      : pnode\ScopeV3::class;

    if ($node instanceof Node\Stmt\If_) {
      // @todo: Generalize.
      if ($node->cond instanceof Node\Expr\BinaryOp\BooleanAnd) {
        $scope = $node->cond;
        while ($scope instanceof Node\Expr\BinaryOp\BooleanAnd)
          $scope = $scope->right;
        while ($scope instanceof $scopeClass && $scope->expression instanceof Node\Expr\BinaryOp\BooleanAnd)
          $scope = $scope->expression->right;
        return $scope;
      }
    }

    return inference\NodeRelation::scopeNode($node);

  }

  static function subScopeNodes ($node) {

    if ($node instanceof Node\Expr\BinaryOp\BooleanAnd) {
      yield $node->right;
      if (inference\Simulation::hasVirtualElse($node))
        yield inference\Simulation::virtualElse($node);
      return;
    }

    if ($node instanceof Node\Expr\Ternary) {
      if ($node->if)
        yield $node->if;
      yield $node->else;
      return;
    }

    if ($node instanceof Node\Stmt\Foreach_) {
      yield $node;
      if (inference\Simulation::hasVirtualElse($node))
        yield inference\Simulation::virtualElse($node);
      return;
    }

    if ($node instanceof Node\Stmt\If_) {
      if (!inference\Value::isFalse($node->cond))
        yield $node;
      if (inference\Value::isTrue($node->cond))
        return;
      foreach ($node->elseifs as $elseif)
        yield $elseif;
      if ($node->else)
        yield $node->else;
      else if (inference\Simulation::hasVirtualElse($node))
        yield inference\Simulation::virtualElse($node);
      return;
    }

    if ($node instanceof Node\Stmt\Namespace_) {
      yield $node;
      return;
    }

    if ($node instanceof Node\Stmt\Switch_) {
      foreach ($node->cases as $case)
        yield $case;
      return;
    }

    if (!NodeConcept::isScopeNode($node) && inference\IsScope::get($node)) {
      yield $node;
      return;
    }

  }

  static function hasVirtualElse ($node) {

    if ($node instanceof Node\Expr\BinaryOp\BooleanAnd)
      return !inference\Value::isTrue($node->left);

    if ($node instanceof Node\Stmt\Foreach_)
      return true;

    if ($node instanceof Node\Stmt\If_)
      return !$node->else;

    return false;

  }

  /**
   * Get analysis-time known virtual else node.
   * A virtual else node is an `else` node which represents an execution
   * path where a condition in a conditional execution node was not met
   * and an execution of the node body didn't took place.
   * For example, a `foreach` node would require an virtual `else` node which
   * would represent an execution path in which execution never entered the
   * `foreach` node.
   *
   * @param object $object Node whose source node to get.
   * @return Node|null
   */
  static function virtualElse ($object) {
    if (!inference\Simulation::hasVirtualElse($object))
      return null;
    if (!isset($object->iiData['virtualElseNode'])) {
      $virtualElse = new Node\Stmt\Else_();
      $object->iiData['virtualElseNode'] = $virtualElse;
      $virtualElse->iiData['parentNode'] = $object;
      $virtualElse->iiData['scopeNode'] = inference\NodeRelation::scopeNode($object);
    }
    return $object->iiData['virtualElseNode'];
  }

  static function scopeSymbolsYield ($node) {
    assert($node);
    if (!isset($node->iiData['memo:scopeSymbolsYield']))
      $node->iiData['memo:scopeSymbolsYield'] = new ArrayObject();
    return $node->iiData['memo:scopeSymbolsYield'];
  }

  static function scopeSymbolsGuaranteeYield ($node) {
    assert($node);
    if (!isset($node->iiData['memo:scopeSymbolsGuaranteeYield']))
      $node->iiData['memo:scopeSymbolsGuaranteeYield'] = new ArrayObject();
    return $node->iiData['memo:scopeSymbolsGuaranteeYield'];
  }

  static function nodeYield ($node) {

    if ($node instanceof Node\Arg)
      return self::nodeYield($node->value);

    if ($node instanceof Node\Expr\Variable) {
      $yieldNodes = [];
      foreach (inference\SymbolLink::get($node) as $symbol) {

        if ($symbol == 'v_this') {
          $context = inference\NodeRelation::contextNode($node);
          if ($context && isset($context->iiData['contextYield'])) {
            foreach ($context->iiData['contextYield'] as $contextYieldNode)
              $yieldNodes[] = new data\Value([$contextYieldNode]);
            continue;
          }
          $interfaceNode = $node;
          while ($interfaceNode && !NodeConcept::isInterfaceNode($interfaceNode))
            $interfaceNode = inference\NodeRelation::parentNode($interfaceNode);
          if ($interfaceNode)
            $yieldNodes[] = new data\Value([
              new pnode\SymbolAlias(inference\DeclarationSymbol::get($interfaceNode), ''),
              new pnode\SymbolAlias('t_dynamic'),
            ]);
          continue;
        }

        $symbolYieldNodes = [];

        $scope = inference\NodeRelation::scopeNode($node);
        $scopeSymbolsYield = inference\Simulation::scopeSymbolsYield($scope);
        $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($scope);

        if (isset($scopeSymbolsYield[$symbol]))
          $symbolYieldNodes = $scopeSymbolsYield[$symbol];

        if (isset($scopeSymbolsGuaranteeYield[$symbol])) {
          $guaranteeYieldNodes = $scopeSymbolsGuaranteeYield[$symbol];
          $symbolYieldNodes = array_filter($symbolYieldNodes, function ($node) use ($guaranteeYieldNodes) {
            return inference\NodeComparison::isAlways($node, $guaranteeYieldNodes);
          });
          foreach ($scopeSymbolsGuaranteeYield[$symbol] as $guaranteeYieldNode)
            $symbolYieldNodes[] = $guaranteeYieldNode;
        }

        if (!inference\IsAssignee::get($node) && count($symbolYieldNodes) == 0)
          $symbolYieldNodes[] = new pnode\SymbolAlias('o_undefined');

        if (inference\IsAssignee::get($node))
          $symbolYieldNodes = array_filter($symbolYieldNodes, function ($node) {
            return !inference\NodeComparison::isAlways($node, 'o_undefined');
          });

        $symbolYieldNodes = array_filter($symbolYieldNodes, function ($node) {
          return !inference\NodeComparison::isAlways($node, 'o_defined');
        });

        foreach ($symbolYieldNodes as $symbolYieldNode)
          $yieldNodes[] = $symbolYieldNode;

      }
      return $yieldNodes;
    }

    return [$node];

  }

}
