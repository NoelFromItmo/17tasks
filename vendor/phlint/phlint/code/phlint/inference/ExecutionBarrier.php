<?php

namespace phlint\inference;

use \phlint\inference;
use \phlint\NodeConcept;
use \PhpParser\Node;

/**
 * Infers if executing a node will yield an execution barrier of some sort.
 *
 * Execution barriers are yielded by all nodes which in one way or another
 * jump or return: `break`, `continue`, `exit`, `return`, `throw`.
 *
 * Execution barrier information is given as an array of integers representing
 * the break level with a special case of -1 meaning infinite break.
 *
 * Here a positive (or -1) break level means "will the execution continue pass this node".
 *
 * For example:
 *
 *   function foo () {
 *     for ($i = 0; $i < 10; $i += 1) { // inference\ExecutionBarrier::get() yields [0, -1]
 *       for ($j = 0; $j < 10; $j += 1) { // inference\ExecutionBarrier::get() yields [0, 1, -1]
 *         if (rand(0, 1)) // inference\ExecutionBarrier::get() yields [1]
 *           break;
 *         else if (rand(0, 1)) // inference\ExecutionBarrier::get() yields [-1]
 *           return;
 *         else // inference\ExecutionBarrier::get() yields [2]
 *           break 2;
 *       }
 *       // Execution will reach here in case execution takes path with break `0` from the second `for`.
 *       // That `0` is inferred from the first `break` which yields `1` but becomes `0` on the scope level.
 *     }
 *     // Execution will reach here in case execution takes path with break `0` from the first `for`.
 *     // That `0` is inferred from the second `for` yields `0` and `1` which both become `0` on the scope level.
 *   }
 *
 * In the example the first `for` node yields `[0, -1]`.
 * `0` signifies that it is possible for the execution to continue pass that `for` node
 * reaching the end of the function.
 * `-1` on the other hand signifies that it is also possible for the execution to
 * to return thus not reaching the end of the function.
 *
 * In the example the second `for` node yields `[0, 1, -1]`.
 * `0` signifies that it is possible for the execution to continue pass that `for` node
 * reaching the end of the function.
 * `1` signifies that it is possible for the execution to break and continue the execution
 * after the first `for` also reaching the end of the function.
 * `-1` on the other hand signifies that it is also possible for the execution to
 * to return thus not reaching the end of the function.
 */
class ExecutionBarrier {

  function getIdentifier () {
    return 'executionBarrier';
  }

  /**
   * Get analysis-time known execution barrier information.
   *
   * @param object $node Node whose execution barrier information to get.
   * @return int[]
   */
  static function get ($node) {

    if (!isset($node->iiData['executionBarrier']))
      $node->iiData['executionBarrier'] = inference\ExecutionBarrier::lookup($node);

    return $node->iiData['executionBarrier'];

  }

  /**
   * Get analysis-time known execution barrier information.
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @param object $node Node whose execution barrier information to get.
   * @return int[]
   */
  static function lookup ($node) {

    if ($node instanceof Node\Stmt\Break_)
      return $node->num
        ? array_map(function ($value) { return $value->value; }, inference\Value::get($node->num))
        : [1]
      ;

    if ($node instanceof Node\Stmt\Case_) {
      foreach ($node->stmts as $statement) {
        $levels = inference\ExecutionBarrier::get($statement);
        if (count($levels) == count(array_filter($levels)))
          return array_unique(array_map(function ($level) {
            return $level == -1 ? $level : max($level - 1, 0);
          }, $levels));
      }
      return [0];
    }

    if ($node instanceof Node\Stmt\Else_) {
      $levels = [0];
      foreach ($node->stmts as $statement) {
        $statementLevels = inference\ExecutionBarrier::get($statement);
        $levels = array_unique(array_merge($levels, $statementLevels));
        if (count($statementLevels) == count(array_filter($statementLevels))) {
          $levels = array_filter($levels);
          break;
        }
      }
      return $levels;
    }

    if (false)
    if ($node instanceof Node\Stmt\ElseIf_) {
      $levels = [0];
      foreach ($node->stmts as $statement) {
        $statementLevels = inference\ExecutionBarrier::get($statement);
        $levels = array_unique(array_merge($levels, $statementLevels));
        if (count($statementLevels) == count(array_filter($statementLevels))) {
          $levels = array_filter($levels);
          break;
        }
      }
      return $levels;
    }

    if ($node instanceof Node\Stmt\If_) {
      $levels = [0];
      foreach ($node->stmts as $statement) {
        $statementLevels = inference\ExecutionBarrier::get($statement);
        $levels = array_unique(array_merge($levels, $statementLevels));
        if (count($statementLevels) == count(array_filter($statementLevels))) {
          $levels = array_filter($levels);
          break;
        }
      }
      return $levels;
    }

    if ($node instanceof Node\Stmt\Return_)
      return [-1];

    if ($node instanceof Node\Stmt\Switch_) {
      $levels = [];
      foreach ($node->cases as $case)
        $levels = array_unique(array_merge($levels, inference\ExecutionBarrier::get($case)));
      return $levels;
    }

    if ($node instanceof Node\Stmt\Throw_)
      return [-1];

    return [0];

  }

}
