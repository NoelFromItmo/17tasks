<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/argumentCompatibility.md
 */
class ArgumentCompatibility {

  function getIdentifier () {
    return 'argumentCompatibility';
  }

  function getCategories () {
    return [
      'default',
    ];
  }

  function getInferences () {
    return [
      'callArgument',
      'declarationLink',
      'evaluation',
      'execution',
      'isImplicitlyConvertible',
      'nodeIntersection',
      'nodeRelation',
      'trait',
      'value',
    ];
  }

  protected $extensionInterface = null;

  function setExtensionInterface ($extensionInterface) {
    $this->extensionInterface = $extensionInterface;
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    if (!NodeConcept::isInvocationNode($node))
      return;

    $callArgument = inference\CallArgument::get(inference\NodeRelation::originNode($node));

    foreach (inference\DeclarationLink::get($node) as $declaration) {

      $variadicIndex = 0;

      foreach ($callArgument as $argumentIndex => $argument) {
        $useStrictTypeConversion = inference\Trait_::useStrictTypeConversion($node->args[$argumentIndex]);
        $index = $variadicIndex ? $variadicIndex : $argumentIndex;
        if (isset($declaration->params[$index])) {
          if ($declaration->params[$index]->variadic)
            $variadicIndex = $index;

          foreach (inference\Evaluation::get($argument) as $argumentYield) {

            if (!inference\NodeIntersection::get($argumentYield, new pnode\SymbolAlias('o_defined')))
              continue;

            $parameterYields = inference\Evaluation::get($declaration->params[$index]);

            if (!inference\IsImplicitlyConvertible::get($argumentYield, $parameterYields, $useStrictTypeConversion))
              if (NodeConcept::referencePrintLegacy($argumentYield) != 'type **')
              if (NodeConcept::referencePrintLegacy($parameterYields) != 'type **')
              MetaContext::get(Result::class)->addViolation(
                $argument,
                $this->getIdentifier(),
                'Argument Compatibility',
                'Argument #' . ($argumentIndex + 1) . ' passed in the ' . NodeConcept::referencePrint($node)
                . ' is of ' . NodeConcept::referencePrint($argumentYield) . '.'
                . "\n"
                . 'A value of ' . NodeConcept::referencePrint($argumentYield) . ' is not implicitly convertible to'
                . ' ' . NodeConcept::referencePrint($parameterYields) . '.',
                'Provided ' . NodeConcept::referencePrintLegacy($node->args[$argumentIndex])
                . ' of ' . NodeConcept::referencePrintLegacy($argumentYield)
                . ' is not implicitly convertible to ' . NodeConcept::referencePrintLegacy($parameterYields)
                . ' in the ' . NodeConcept::referencePrintLegacy($node) . '.'
              );

          }

        }

      }

    }

  }

}
