<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\Code;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class IsCompatible {

  function getIdentifier () {
    return 'isCompatible';
  }

  static function get ($nodeA, $nodeB) {

    if (NodeConcept::isInvocationNode($nodeA) && NodeConcept::isExecutionContextNode($nodeB)) {

      $useStrictTypeConversion = inference\Trait_::useStrictTypeConversion($nodeA);

      $argumentsYieldNodes = inference\CallArgument::get(inference\NodeRelation::originNode($nodeA));

      foreach ($nodeB->params as $index => $parameter) {

        if (!isset($nodeA->args[$index]))
          continue;

        $parameterYieldNodes = inference\Evaluation::get($parameter);

        if (isset($argumentsYieldNodes[$index]))
          foreach (inference\Evaluation::get($argumentsYieldNodes[$index]) as $yieldNode)
            if (!inference\IsImplicitlyConvertible::get($yieldNode, $parameterYieldNodes, $useStrictTypeConversion))
              return false;

        if ($parameter->variadic)
          for ($variadicIndex = $index; isset($argumentsYieldNodes[$index]); $index += 1)
            foreach (inference\Evaluation::get($argumentsYieldNodes[$index]) as $yieldNode)
              if (!inference\IsImplicitlyConvertible::get($yieldNode, $parameterYieldNodes, $useStrictTypeConversion))
                return false;

      }

      $constraints = inference\Constraint::get($nodeB);
      $parameters = $nodeB->params;

      if (count($constraints) == 0 || count($parameters) == 0)
        return true;

      $constraints = NodeConcept::deepClone($constraints);
      $parameters = NodeConcept::deepClone($parameters);

      foreach ($parameters as $index => $parameter) {
        if (!isset($argumentsYieldNodes[$index]))
          continue;
        $parameter->iiData['evaluationYield'] = inference\Evaluation::get($argumentsYieldNodes[$index]);
      }

      Code::infer([new Node\Expr\Closure([
        'params' => $parameters,
        'stmts' => $constraints,
      ])]);

      foreach ($constraints as $constraint)
        if (inference\Value::isFalse($constraint))
          return false;

      return true;

    }

    return false;

  }

}
