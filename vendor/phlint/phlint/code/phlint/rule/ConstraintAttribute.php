<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\Code;
use \phlint\IIData;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/constraintAttribute.md
 */
class ConstraintAttribute {

  function getIdentifier () {
    return 'constraintAttribute';
  }

  function getCategories () {
    return [
      'default',
      'strict',
    ];
  }

  function getInferences () {
    return [
      'constraint',
      'value',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    if (!NodeConcept::isInvocationNode($node))
      return;

    $arguments = inference\CallArgument::get(inference\NodeRelation::originNode($node));

    foreach (inference\DeclarationLink::get($node) as $declaration) {

      if (!NodeConcept::isExecutionContextNode($declaration))
        continue;

      $constraints = inference\Constraint::get($declaration);
      $parameters = $declaration->params;

      if (count($constraints) == 0 || count($parameters) == 0)
        continue;

      $constraints = NodeConcept::deepClone($constraints);
      $parameters = NodeConcept::deepClone($parameters);

      foreach ($parameters as $index => $parameter) {
        if (!isset($arguments[$index]))
          continue;
        $parameter->iiData['evaluationYield'] = inference\Evaluation::get($arguments[$index]);
      }

      Code::infer([new Node\Expr\Closure([
        'params' => $parameters,
        'stmts' => $constraints,
      ])]);

      foreach ($constraints as $constraint) {
        if (inference\Value::isFalse($constraint)) {
          MetaContext::get(Result::class)->addViolation(
            $node,
            $this->getIdentifier(),
            'Constraint Attribute',
            ucfirst(NodeConcept::referencePrint($declaration))
            . ' has the ' . NodeConcept::referencePrint($constraint)
            . ' ' . inference\Location::get($constraint) . '.'
            . "\n"
            . 'That constraint is failing for the ' . NodeConcept::referencePrint($node)
            . ' ' . inference\Location::get($node) . '.',
            ucfirst(NodeConcept::referencePrintLegacy($constraint)) . ' of '
            . NodeConcept::referencePrintLegacy($declaration)
            . ' failed for the '
            . NodeConcept::referencePrintLegacy($node) . '.'
          );
        }
      }

    }



  }

}
