<?php

namespace phlint\inference;

use \luka8088\ExtensionCall;
use \luka8088\ExtensionCallOverwrite;
use \luka8088\phops\MetaContext;
use \phlint\Code;
use \phlint\IIData;
use \phlint\inference;
use \phlint\inference\Symbol;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \PhpParser\Node;

class TemplateSpecialization {

  function getIdentifier () {
    return 'templateSpecialization';
  }

  function getDependencies () {
    return [
      'constraint',
      'isolation',
      'purity',
      'return',
      'symbol',
      'value',
    ];
  }

  protected $extensionInterface = null;

  function setExtensionInterface ($extensionInterface) {
    $this->extensionInterface = $extensionInterface;
  }

  /**
   * @ExtensionCall("phlint.analysis.inference.symbolLookup/templateSpecialization")
   * @ExtensionCallOverwrite("phlint.analysis.inference.symbolLookup/default")
   */
  function specializeSymbols (&$specializationSymbols, $node) {

    $specializationSymbols = [];

    $this->extensionInterface['phlint.analysis.inference.symbolLookup/default'](
      $symbols,
      $node
    );

    if (!NodeConcept::isInvocationNode($node)) {
      $specializationSymbols = $symbols;
      return;
    }

    if (!inference\IsReachable::get($node)) {
      $specializationSymbols = $symbols;
      return;
    }

    if (!$node->getAttribute('inAnalysisScope', true)) {
      $specializationSymbols = $symbols;
      return;
    }

    foreach ($symbols as $symbol) {

      $specializationMangle = $this->specializationMangle($node);
      $specializationSymbol = $symbol . $specializationMangle;

      $specializationSymbols[] = $specializationSymbol;

        // @todo: Remove condition.
        if (!isset(MetaContext::get(IIData::class)['symbolCall:' . $specializationSymbol]))
        inference\SymbolCall::add($specializationSymbol, inference\NodeRelation::originNode($node));

      assert(isset(MetaContext::get(Code::class)->data['symbols'][$symbol]));

      if (!isset(MetaContext::get(Code::class)->data['symbols'][$specializationSymbol]))
        MetaContext::get(Code::class)->data['symbols'][$specializationSymbol] = [
          'id' => $specializationSymbol,
          'phpId' => MetaContext::get(Code::class)->data['symbols'][$symbol]['phpId'],
        ];

      $specializedDeclarationNodes = [];

      foreach (inference\SymbolDeclaration::get($symbol) as $declarationNode) {

        $specializedDeclarationNode = null;
        $specializationKey = $specializationSymbol . '/' . spl_object_hash(inference\NodeRelation::originNode($declarationNode));
        $requiresInference = false;

        if (!$declarationNode->getAttribute('inAnalysisScope', true) && $this->requiresSpecialization($node, $declarationNode) && !$declarationNode->getAttribute('isDummySpecialization', false)) {
          $declarationNode->setAttribute('isDummySpecialization', true);
          $dummyInvocation = inference\NodeRelation::cloneRelations($node, NodeConcept::deepClone($node));
          $dummyInvocation->setAttribute('inAnalysisScope', false);
          $dummyInvocation->args = [];
          Code::infer([$dummyInvocation]);
          $dummySpecialization = $this->generateSpecialization($dummyInvocation, $declarationNode, $specializationKey);
          Code::infer([$dummySpecialization]);
          MetaContext::get(Code::class)->data['dummySpecializations'][] = $dummySpecialization;
        }

        if (!$specializedDeclarationNode && !$this->requiresSpecialization($node, $declarationNode))
          $specializedDeclarationNode = $declarationNode;

        if (!$specializedDeclarationNode && isset(MetaContext::get(Code::class)->data['specializationMap'][$specializationKey]))
          $specializedDeclarationNode = MetaContext::get(Code::class)->data['specializationMap'][$specializationKey];

        if (!$specializedDeclarationNode && !inference\IsCompatible::get($node, $declarationNode))
          $specializedDeclarationNode = $declarationNode;

        if (!$specializedDeclarationNode) {

          $specializedDeclarationNode = $this->generateSpecialization($node, $declarationNode, $specializationKey);

          $specializedDeclarationNode->setAttribute('specializationSymbol22', $specializationSymbol);

          $specializedDeclarationNode->iiData['isIsolated']
            = inference\Isolation::isIsolated($node) || inference\Purity::isPure($node);

          $specializedDeclarationNode->setAttribute('isSpecializationTemp', true);

          inference\DeclarationSymbol::set($specializedDeclarationNode, $specializationSymbol);

          $requiresInference = true;

        }

        if (!isset(MetaContext::get(Code::class)->data['specializationMap'][$specializationKey]))
          MetaContext::get(Code::class)->data['specializationMap'][$specializationKey] = $specializedDeclarationNode;

        $metaContextKey = 'symbolDeclarations:' . $specializationSymbol;
        if (!isset(MetaContext::get(IIData::class)[$metaContextKey]))
          MetaContext::get(IIData::class)[$metaContextKey] = [];

        $isNodeAttached = false;
        foreach (MetaContext::get(IIData::class)[$metaContextKey] as $existingNode)
          if ($existingNode === $specializedDeclarationNode)
            $isNodeAttached = true;
        if (!$isNodeAttached)
          MetaContext::get(IIData::class)[$metaContextKey][] = $specializedDeclarationNode;

        if ($requiresInference)
          Code::infer([$specializedDeclarationNode]);

      }

    }

  }

  function requiresSpecialization ($invocationNode, $node) {

    // @todo: Implement.
    if ($node instanceof Node\Stmt\Class_)
      return false;

    assert(NodeConcept::isExecutionContextNode($node));

    if (!$node->stmts || count($node->stmts) == 0)
      return false;

    $requiresSpecialization = false;

    foreach (inference\Attribute::get($node) as $attribute)
      if ($attribute instanceof Node\Expr\New_ && count($attribute->args) >= 1
          && inference\Value::isEqual($attribute->args[0], 'template'))
        return true;

    if (inference\Isolation::isIsolated($invocationNode) && !inference\Isolation::isIsolated($node))
      $requiresSpecialization = true;

    if (inference\Purity::isPure($invocationNode) && !inference\Isolation::isIsolated($node) && !inference\Purity::isPure($node))
      $requiresSpecialization = true;

    foreach ($node->params as $parameter)
      if (count(inference\TemplateSpecialization::specializedYield($parameter))
          <= ($parameter->default ? count(inference\TemplateSpecialization::specializedYield($parameter->default)) : 0))
        $requiresSpecialization = true;

    if (count(inference\TemplateSpecialization::specializedYield(inference\Return_::get($node))) == 0)
      $requiresSpecialization = true;

    return $requiresSpecialization;

  }

  function specializationMangle ($node) {
    static $replacements = [
      '.' => '__',
      '{' => '_(_',
      '}' => '_)_',
    ];
    return '{' . str_replace(
      array_keys($replacements),
      array_values($replacements),
      $this->specializationSignature($node)
    ) . '}';
  }

  function specializationSignature ($node) {

    if (NodeConcept::isInvocationNode($node))
      return '(' . implode(', ', array_map(function ($argument) {
        $yieldNodes = [];
        foreach (inference\Evaluation::get($argument) as $yieldNode)
          $yieldNodes[] = $yieldNode;
        return implode('|', array_unique(array_map(function ($node) {
          return inference\NodeKey::get($node);
        }, $yieldNodes)));
      }, inference\CallArgument::get(inference\NodeRelation::originNode($node)))) . ')' .
      '*' . implode('|', array_unique(array_filter(array_map(function ($symbol) {
        return $symbol->id;
      }, self::callContext($node))))) .
      (inference\Isolation::isIsolated($node) ? '!i' : '') .
      (inference\Purity::isPure($node) ? '!p' : '');

    return '';

  }

  function generateSpecialization ($invocationNode, $definitionNode, $specializationKey) {

    $specializationNode = inference\NodeRelation::cloneRelations(
      $definitionNode,
      NodeConcept::deepClone($definitionNode)
    );

    NodeTraverser::traverse($specializationNode, [function ($specializationNode) {
      $specializationNode->setAttribute('isSpecialization', true);
      $specializationNode->setAttribute('inAnalysisScope', true);
    }]);

    // @todo: Rethink.
    if ($definitionNode instanceof Node\Stmt\ClassMethod && $definitionNode->name == '__call')
      return new Node\Stmt\Function_(new Node\Name('_' . sha1($specializationKey)));

    if (NodeConcept::isExecutionContextNode($specializationNode)) {

      $argumentsYieldNodes = inference\CallArgument::get(inference\NodeRelation::originNode($invocationNode));

      foreach ($specializationNode->params as $index => $parameter) {

        if (!isset($invocationNode->args[$index]))
          continue;

        $parameterYieldNodes = [];

        if (isset($argumentsYieldNodes[$index]))
          if ($parameter->variadic) {
            $variadicParameterTypes = [];
            for ($variadicIndex = $index; isset($argumentsYieldNodes[$variadicIndex]); $variadicIndex += 1)
              foreach (inference\Concept::get($argumentsYieldNodes[$variadicIndex]) as $variadicParameterType)
                $variadicParameterTypes[] = $variadicParameterType->id;
            $parameterYieldNodes[] = new pnode\SymbolAlias(inference\Symbol::composeMulti($variadicParameterTypes));
          } else {
            foreach (inference\Evaluation::get($argumentsYieldNodes[$index]) as $argumentsYieldNode)
              $parameterYieldNodes[] = $argumentsYieldNode;
          }

        if (count($parameterYieldNodes) == 0)
          foreach (inference\Evaluation::get($definitionNode->params[$index]) as $declarationParameterYieldNode)
            $parameterYieldNodes[] = $declarationParameterYieldNode;

        $parameter->iiData['evaluationYield'] = $parameterYieldNodes;

      }

      $specializationNode->iiData['contextYield'] = self::callContext($invocationNode);

    }

    return $specializationNode;

  }

  static function specializedYield ($node) {
    return array_filter(inference\Evaluation::get($node), function ($node) {
      return !inference\IsConstraint::get($node);
    });
  }

  static function callContext ($node) {
    $filter = function ($yieldNode) {
      if (inference\Value::isValueNode($yieldNode))
        return false;
      if ($yieldNode instanceof pnode\SymbolAlias && $yieldNode->id == 'o_null')
        return false;
      return true;
    };
    if ($node instanceof Node\Expr\MethodCall)
      return array_filter(inference\Concept::get($node->var), $filter);
    if ($node instanceof Node\Expr\New_)
      return array_filter(inference\NameEvaluation::get($node->class, 'class'), $filter);
    if ($node instanceof Node\Expr\StaticCall)
      return array_filter(inference\NameEvaluation::get($node->class, 'class'), $filter);
    return [];
  }

}
