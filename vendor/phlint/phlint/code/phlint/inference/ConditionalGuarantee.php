<?php

namespace phlint\inference;

use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \phlint\phpLanguage;
use \PhpParser\Node;

class ConditionalGuarantee {

  /**
   * Analyzes the condition and infers the guarantees that can be made
   * given that the condition evaluates to true.
   *
   * For example:
   *   - For condition `isset($x)` the guarantee is that `$x` is defined.
   *   - For condition `is_numeric($x)` the guarantee is that `$x` is of `autoFloat` type.
   *
   * @param object $node Node to analyze.
   * @return object[string][]
   */
  static function get ($node) {

    if (!isset($node->iiData['nodeConditionGuarantees']))
      $node->iiData['nodeConditionGuarantees'] = inference\ConditionalGuarantee::lookup($node);

    return $node->iiData['nodeConditionGuarantees'];

  }

  /**
   * Analyzes the condition and infers the guarantees that can be made
   * given that the condition evaluates to true.
   *
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @internal
   */
  static function lookup ($node) {

    $guarantees = [];

    if ($node instanceof Node\Expr\ArrayDimFetch)
      return inference\ConditionalGuarantee::get($node->var);

    if ($node instanceof Node\Expr\BinaryOp\Identical) {
      $guarantees = [];
      if ($node->left instanceof Node\Expr\Variable)
        $guarantees[] = [
          'node' => $node->left,
          'yield' => inference\Value::get($node->right),
        ];
      if ($node->right instanceof Node\Expr\Variable)
        $guarantees[] = [
          'node' => $node->right,
          'yield' => inference\Value::get($node->left),
        ];
      return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);
    }

    if ($node instanceof Node\Expr\BinaryOp\NotIdentical) {
      $guarantees = [];
      if ($node->left instanceof Node\Expr\Variable)
        $guarantees[] = [
          'node' => $node->left,
          'yield' => array_map(function ($yieldNode) {
            return new pnode\Excludes($yieldNode);
          }, inference\Value::get($node->right)),
        ];
      if ($node->right instanceof Node\Expr\Variable)
        $guarantees[] = [
          'node' => $node->right,
          'yield' => array_map(function ($yieldNode) {
            return new pnode\Excludes($yieldNode);
          }, inference\Value::get($node->left)),
        ];
      return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);
    }

    if ($node instanceof Node\Expr\Assign || $node instanceof Node\Expr\AssignRef)
      return [[
        'node' => $node->var,
        'yield' => array_filter(array_map(function ($node) {
          return inference\NodeIntersection::get($node, [
            new pnode\Excludes(new Node\Expr\Array_()),
            new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('false'))),
            new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('null'))),
            new pnode\Excludes(new Node\Scalar\DNumber(0)),
            new pnode\Excludes(new Node\Scalar\LNumber(0)),
            new pnode\Excludes(new Node\Scalar\String_('')),
            new pnode\Excludes(new Node\Scalar\String_('0')),
            new pnode\Excludes(new pnode\SymbolAlias('o_undefined')),
          ]);
        }, inference\Evaluation::get($node->expr))),
      ]];

    if ($node instanceof Node\Expr\BinaryOp\BooleanAnd) {
      $guarantees = [];
      $leftGuarantees = ConditionalGuarantee::get($node->left);
      $rightGuarantees = ConditionalGuarantee::get($node->right);
      foreach (array_merge($leftGuarantees, $rightGuarantees) as $evaluatedGuarantee) {
        $persistYield = $evaluatedGuarantee['yield'];
        $constraintGuaranteeYield = [];
        foreach (array_merge($leftGuarantees, $rightGuarantees) as $constraintGuarantee)
          if (NodeConcept::isSame($evaluatedGuarantee['node'], $constraintGuarantee['node']))
            $constraintGuaranteeYield = inference\UniqueNode::get(array_merge(
              $constraintGuaranteeYield,
              $constraintGuarantee['yield']
            ));
        $persistYield = array_filter(array_map(function ($persistYieldNode) use ($constraintGuaranteeYield) {
          $yieldNode = null;
          foreach ($constraintGuaranteeYield as $constraintGuarantee) {
            $intersectionNode = inference\NodeIntersection::get(
              $yieldNode ? $yieldNode : $persistYieldNode,
              $constraintGuarantee
            );
            if ($intersectionNode)
              $yieldNode = $intersectionNode;
          }
          return $yieldNode;
        }, $persistYield));
        $guarantees[] = [
          'node' => $evaluatedGuarantee['node'],
          'yield' => $persistYield,
        ];
      }
      return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);
    }

    if ($node instanceof Node\Expr\BinaryOp\BooleanOr) {
      $guarantees = [];
      $leftGuarantees = ConditionalGuarantee::lookup($node->left);
      $rightGuarantees = ConditionalGuarantee::lookup($node->right);
      foreach (array_merge($leftGuarantees, $rightGuarantees) as $leftGuaranteeOffset => $evaluatedGuarantee) {
        $persistYield = [];
        foreach (array_merge($leftGuarantees, $rightGuarantees) as $rightGuaranteeOffset => $constraintGuarantee)
          if ($leftGuaranteeOffset != $rightGuaranteeOffset)
            if (NodeConcept::isSame($evaluatedGuarantee['node'], $constraintGuarantee['node']))
              $persistYield = inference\UniqueNode::get(array_merge($persistYield, $evaluatedGuarantee['yield']));
        $guarantees[] = [
          'node' => $evaluatedGuarantee['node'],
          'yield' => $persistYield,
        ];
      }
      return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);
    }

    if ($node instanceof Node\Expr\BooleanNot)
      return inference\ConditionalGuarantee::lookupNegative($node->expr);

    /**
     * No warning is generated if the variable does not exist.
     * That means empty() is essentially the concise equivalent to `!isset($var) || $var == false`.
     *
     * @see http://www.php.net/manual/en/function.empty.php
     */
    if ($node instanceof Node\Expr\Empty_) {
      if ($node->expr instanceof Node\Expr\ArrayDimFetch)
        return [];
      // @todo: Enable.
      #return inference\ConditionalGuarantee::lookup(new Node\Expr\BinaryOp\BooleanOr(new Node\Expr\BooleanNot(new Node\Expr\Isset_([$node->expr])), new Node\Expr\BooleanNot($node->expr)));
      // @todo: Remove.
      return inference\ConditionalGuarantee::lookup(new Node\Expr\BooleanNot($node->expr));
    }

    if ($node instanceof Node\Expr\FuncCall)
      foreach ($node->args as $index => $argument) {
        foreach (inference\DeclarationLink::get($node) as $declaration)
          if (isset($declaration->params[$index]))
            foreach (inference\Attribute::get($declaration->params[$index]) as $attribute)
              if ($attribute instanceof Node\Expr\New_ &&
                  count($attribute->args) >= 1 &&
                  inference\Value::isEqual($attribute->args[0], 'out')) {
                $guarantees[] = [
                  'node' => $argument->value,
                  'yield' => [new pnode\SymbolAlias('o_defined')],
                ];
              }
      }

    /** @see http://php.net/manual/en/language.operators.type.php */
    if ($node instanceof Node\Expr\Instanceof_) {
      $guarantees = [];
      foreach (inference\NameEvaluation::get($node->class, 'auto') as $yieldNode)
        $guarantees[] = [
          'node' => $node->expr,
          'yield' => [new data\Value([$yieldNode])],
        ];
      return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);
    }

    /** @see http://www.php.net/manual/en/function.isset.php */
    if ($node instanceof Node\Expr\Isset_) {
      $guarantees = [];
      foreach ($node->vars as $var) {
        if ($var instanceof Node\Expr\ArrayDimFetch) {
          $guarantees[] = [
            'node' => $var->var,
            'yield' => [
              new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('null'))),
              new pnode\SymbolAlias('o_defined'),
            ],
          ];
          continue;
        }
        $guarantees[] = [
          'node' => $var,
          'yield' => [
            new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('null'))),
            new pnode\SymbolAlias('o_defined'),
          ],
        ];
      }
      return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);
    }

    if ($node instanceof Node\Expr\Variable)
      return [[
        'node' => $node,
        'yield' => [
          new pnode\Excludes(new Node\Expr\Array_()),
          new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('false'))),
          new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('null'))),
          new pnode\Excludes(new Node\Scalar\DNumber(0)),
          new pnode\Excludes(new Node\Scalar\LNumber(0)),
          new pnode\Excludes(new Node\Scalar\String_('')),
          new pnode\Excludes(new Node\Scalar\String_('0')),
          new pnode\Excludes(new pnode\SymbolAlias('o_undefined')),
        ],
      ]];

    $scopeClass = class_exists(Node\Identifier::class)
      ? pnode\Scope::class
      : pnode\ScopeV3::class;

    if ($node instanceof $scopeClass)
      return ConditionalGuarantee::lookup($node->expression);

    $isInvocationGuarantee = function ($node, $symbol, $minimumArguments = 1) {
      return ($node instanceof Node\Expr\FuncCall) &&
        inference\SymbolLink::getUnmangled($node) == [$symbol] &&
        count($node->args) >= $minimumArguments;
    };

    /** @see http://www.php.net/manual/en/function.function-exists.php */
    if ($isInvocationGuarantee($node, 'f_function_exists'))
      foreach (inference\Value::get($node->args[0]) as $value)
        if ($value instanceof Node\Scalar\String_)
          $guarantees[] = [
            'node' => new Node\Stmt\Function_(new Node\Name($value->value)),
            'yield' => [new pnode\SymbolAlias('o_defined')],
          ];

    /** @see http://www.php.net/manual/en/function.is-a.php */
    if ($isInvocationGuarantee($node, 'f_is_a', 2))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value(inference\NameEvaluation::get($node->args[1], 'auto'))],
      ];

    /** @see http://www.php.net/manual/en/function.is-array.php */
    if ($isInvocationGuarantee($node, 'f_is_array'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_array')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-bool.php */
    if ($isInvocationGuarantee($node, 'f_is_bool'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_bool')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-callable.php */
    if ($isInvocationGuarantee($node, 'f_is_callable'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('o_callable')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-double.php */
    if ($isInvocationGuarantee($node, 'f_is_double'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_float')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-float.php */
    if ($isInvocationGuarantee($node, 'f_is_float'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_float')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-int.php */
    if ($isInvocationGuarantee($node, 'f_is_int'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_int')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-integer.php */
    if ($isInvocationGuarantee($node, 'f_is_integer'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_int')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-long.php */
    if ($isInvocationGuarantee($node, 'f_is_long'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_int')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-null.php */
    if ($isInvocationGuarantee($node, 'f_is_null'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new Node\Expr\ConstFetch(new Node\Name('null'))],
      ];

    /** @see http://www.php.net/manual/en/function.is-numeric.php */
    if ($isInvocationGuarantee($node, 'f_is_numeric'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_autoFloat')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-object.php */
    if ($isInvocationGuarantee($node, 'f_is_object'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('o_object')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-real.php */
    if ($isInvocationGuarantee($node, 'f_is_real'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_float')])],
      ];

    /** @see http://www.php.net/manual/en/function.is-scalar.php */
    if ($isInvocationGuarantee($node, 'f_is_scalar'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [
          new data\Value([new pnode\SymbolAlias('t_bool')]),
          new data\Value([new pnode\SymbolAlias('t_float')]),
          new data\Value([new pnode\SymbolAlias('t_int')]),
          new data\Value([new pnode\SymbolAlias('t_string')]),
          new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('null'))),
        ],
      ];

    /** @see http://www.php.net/manual/en/function.is-string.php */
    if ($isInvocationGuarantee($node, 'f_is_string'))
      $guarantees[] = [
        'node' => $node->args[0],
        'yield' => [new data\Value([new pnode\SymbolAlias('t_string')])],
      ];

    return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);

  }

  /**
   * Analyzes the condition and infers the guarantees that can be made
   * given that the condition evaluates to false.
   *
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @internal
   */
  static function lookupNegative ($node) {

    /** @see https://en.wikipedia.org/wiki/De_Morgan%27s_laws */
    if ($node instanceof Node\Expr\BinaryOp\BooleanAnd)
      return inference\ConditionalGuarantee::lookup(new Node\Expr\BinaryOp\BooleanOr(
        new Node\Expr\BooleanNot($node->left),
        new Node\Expr\BooleanNot($node->right)
      ));

    if ($node instanceof Node\Expr\BooleanNot)
      return inference\ConditionalGuarantee::lookup($node->expr);

    /**
     * No warning is generated if the variable does not exist.
     * That means empty() is essentially the concise equivalent to `!isset($var) || $var == false`.
     *
     * @see http://www.php.net/manual/en/function.empty.php
     */
    if ($node instanceof Node\Expr\Empty_) {
      if ($node->expr instanceof Node\Expr\ArrayDimFetch) {
        return [[
          'node' => $node->expr->var,
          'yield' => [
            new pnode\Excludes(new Node\Expr\ConstFetch(new Node\Name('null'))),
            new pnode\SymbolAlias('o_defined'),
          ],
        ]];
      }
      // @todo: Enable.
      #return inference\ConditionalGuarantee::lookup(new Node\Expr\BinaryOp\BooleanOr(new Node\Expr\BooleanNot(new Node\Expr\Isset_([$node->expr])), new Node\Expr\BooleanNot($node->expr)));
      // @todo: Remove.
      return inference\ConditionalGuarantee::lookup($node->expr);
    }

    /** @see http://www.php.net/manual/en/function.isset.php */
    if ($node instanceof Node\Expr\Isset_) {
      $guarantees = [];
      foreach ($node->vars as $var) {
        if ($var instanceof Node\Expr\ArrayDimFetch)
          continue;
        $guarantees[] = [
          'node' => $var,
          'yield' => [
            new Node\Expr\ConstFetch(new Node\Name('null')),
            new pnode\Excludes(new pnode\SymbolAlias('o_defined')),
          ],
        ];
      }
      return inference\ConditionalGuarantee::aggregateGuarantees($guarantees);
    }

    return array_map(function ($guarantee) {
      return [
        'node' => $guarantee['node'],
        'yield' => array_map(function ($node) {
          return $node instanceof pnode\Excludes ? $node->node : new pnode\Excludes($node);
        }, $guarantee['yield']),
      ];
    }, inference\ConditionalGuarantee::lookup($node));

  }

  static function aggregateGuarantees ($guarantees) {

    $aggregatedGuarantees = [];

    foreach ($guarantees as $guarantee) {

      $index = -1;

      foreach ($aggregatedGuarantees as $guaranteeIndex => $aggregatedGuarantee)
        if (NodeConcept::isSame($aggregatedGuarantee['node'], $guarantee['node'])) {
          $index = $guaranteeIndex;
        }

      if ($index == -1) {
        $index = count($aggregatedGuarantees);
        $aggregatedGuarantees[$index] = [
          'node' => $guarantee['node'],
          'yield' => [],
        ];
      }

      $aggregatedGuarantees[$index]['yield'] = inference\UniqueNode::get(array_merge(
        $aggregatedGuarantees[$index]['yield'],
        $guarantee['yield']
      ));

    }

    return $aggregatedGuarantees;

  }

}
