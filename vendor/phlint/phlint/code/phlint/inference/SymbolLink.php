<?php

namespace phlint\inference;

use \luka8088\ExtensionCall;
use \luka8088\ExtensionInterface;
use \luka8088\phops\MetaContext;
use \phlint\Code;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

/**
 * Links invocation to invocable symbols.
 */
class SymbolLink {

  function getIdentifier () {
    return 'symbolLink';
  }

  /**
   * Get node analysis-time known symbols.
   *
   * @param object|string $node Node whose symbols to get or a php keyword.
   * @return string[]
   */
  static function get ($node) {

    if (is_string($node)) {
      $symbol = inference\Symbol::identifier($node, 'auto');
      return $symbol ? [$symbol] : [];
    }

    // @todo: Remove.
    if ($node instanceof Node\Expr\FuncCall && $node->name instanceof Node\Name) {
      $scope = inference\NodeRelation::scopeNode($node);
      if ($scope) {
      $scopeSymbolsGuaranteeYield = inference\Simulation::scopeSymbolsGuaranteeYield($scope);
      if (isset($scopeSymbolsGuaranteeYield['f_' . strtolower($node->name->toString())]))
        return ['x'];
      }
    }

    if ($node instanceof Node\Arg)
      return self::get($node->value);

    if ($node instanceof Node\Expr\ClosureUse)
      return [inference\Symbol::identifier($node->var, 'variable')];

    if ($node instanceof Node\Expr\Variable) {
      if (is_string($node->name))
        return [inference\Symbol::identifier($node->name, 'variable')];
      $symbols = [];
      foreach (inference\Evaluation::get($node->name) as $variableName)
        if ($variableName instanceof Node\Scalar\String_)
          $symbols[] = inference\Symbol::identifier($variableName->value, 'variable');
      return $symbols;
    }

    if ($node instanceof Node\Param)
      return [inference\Symbol::identifier($node->name, 'variable')];

    if ($node instanceof Node\Stmt\Catch_)
      return [inference\Symbol::identifier($node->var, 'variable')];

    if ($node instanceof Node\Stmt\StaticVar)
      return [inference\Symbol::identifier($node->name, 'variable')];

    if ($node instanceof Node\Stmt\Function_)
      return [inference\Symbol::identifier($node->name, 'function')];

    if (!isset($node->iiData['symbols'])) {
      $symbols = [];
      MetaContext::get(ExtensionInterface::class)['phlint.analysis.inference.symbolLookup']->__invoke($symbols, $node);
      // @todo: Remove.
      if (inference\DeclarationSymbol::get($node))
        $symbols[] = inference\DeclarationSymbol::get($node);
      $node->iiData['symbols'] = $symbols;
    }

    return $node->iiData['symbols'];

  }

  /** @ExtensionCall("phlint.analysis.inference.symbolLookup/default") */
  function symbolLookup (&$symbols, $node) {
    if ($symbols === null)
      $symbols = [];
    foreach (inference\SymbolLink::lookup($node) as $sym) {
      $sym->id = ltrim(str_replace('n_.', '', $sym->id), '.');
      $symbols[] = $sym->id;
      if (!isset(MetaContext::get(Code::class)->data['symbols'][$sym->id]))
        MetaContext::get(Code::class)->data['symbols'][$sym->id] = [
          'id' => $sym->id,
          'phpId' => $sym->phpID,
        ];
    }
    $symbols = array_unique($symbols);
  }

  /**
   * Lookup the node symbols.
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @internal
   *
   * @param object $node Node whose symbols to lookup.
   * @return string[]
   */
  static function lookup ($node) {

    if (is_array($node)) {
      $symbols = [];
      foreach ($node as $node_)
        foreach (self::lookup($node_) as $symbol)
          $symbols[] = $symbol;
      return $symbols;
    }

    if ($node instanceof Node\Expr\Closure)
      return [];

    if ($node instanceof Node\Expr\ConstFetch) {
      if (in_array(strtolower($node->name->toString()), ['true', 'false']))
        return [new pnode\SymbolAlias('t_bool', 'bool')];
      if (in_array(strtolower($node->name->toString()), ['null']))
        return [new pnode\SymbolAlias('t_mixed', 'null')];
      return self::lookup(inference\NameEvaluation::get($node->name, 'constant'));
    }

    if ($node instanceof Node\Expr\FuncCall)
      return self::lookup(inference\NameEvaluation::get($node->name, 'function'));

    if ($node instanceof Node\Expr\MethodCall)
      return self::lookupMember(inference\Concept::get($node->var), $node->name);

    if ($node instanceof Node\Expr\New_)
      return self::lookup(inference\NameEvaluation::get($node->class, 'class'));

    if ($node instanceof Node\Expr\StaticCall)
      return self::lookupMember(inference\NameEvaluation::get($node->class, 'class'), $node->name);

    if ($node instanceof Node\Name)
      return self::lookup(inference\NameEvaluation::get($node, 'class'));

    if ($node instanceof Node\NullableType)
      return self::lookup(inference\NameEvaluation::get($node->type, 'auto'));

    if ($node instanceof Node\Scalar\LNumber)
      return [];

    if ($node instanceof Node\Scalar\String_)
      return [];

    if ($node instanceof pnode\SymbolAlias)
      return [new pnode\SymbolAlias($node->id, $node->phpID ? $node->phpID : inference\Symbol::phpID($node->id))];

    #assert(false);

    return [];

  }

  static function lookupMember ($container, $member) {

    $symbols = [];

    if ($member instanceof Node\Identifier)
      $member = $member->name;

    foreach (self::lookup($container) as $containerSymbol) {

      if (Symbol::phpID($containerSymbol))
        Symbol::autoload(Symbol::phpID($containerSymbol));

      foreach ((is_object($member) ? inference\Value::get($member) : [$member]) as $memberSymbol) {

          if (!is_string($memberSymbol) && !($memberSymbol instanceof Node\Scalar\String_))
            continue;

          if (is_object($memberSymbol))
            $memberSymbol = $memberSymbol->value;

          $symbol = inference\SymbolLink::lookupSymbol(
            Symbol::concat($containerSymbol->id, inference\Symbol::identifier($memberSymbol, 'function')),
            $containerSymbol->phpID . '::' . $memberSymbol
          );

          if (!$symbol)
            $symbol = Symbol::concat(ltrim($containerSymbol->id, '.'), Symbol::identifier($memberSymbol, 'function'));

          $symbols[] = new pnode\SymbolAlias($symbol, $containerSymbol->phpID . '::' . $memberSymbol);

      }

    }

    return $symbols;

  }

  static function lookupSymbol ($symbol, $phpId = '', $inAnalysisScope = true) {

    if (!$symbol)
      return '';

    if ($inAnalysisScope && $phpId && count(inference\SymbolDeclaration::get($symbol)) == 0)
      Symbol::autoload($phpId);

    if (count(inference\SymbolDeclaration::get($symbol)) > 0)
      return $symbol;

    if (in_array(Symbol::symbolIdentifierGroup($symbol), ['function'])) {

      $containerSymbol = Symbol::parent($symbol);
      $memberSymbol = Symbol::unqualified($symbol);

      foreach (inference\SymbolDeclaration::get($containerSymbol) as $containerNode) {

        foreach (inference\NodeRelation::importNodes($containerNode) as $import) {

          if (!($import instanceof Node\Stmt\TraitUse))
            continue;

          foreach ($import->traits as $trait_) {
            foreach (inference\SymbolLink::get($trait_) as $traitSymbol) {
              if ($inAnalysisScope)
                inference\Symbol::autoload(inference\Symbol::phpID($traitSymbol));
              $linkedSymbol = SymbolLink::lookupSymbol(Symbol::concat($traitSymbol, $memberSymbol), $phpId, $inAnalysisScope);
              if ($linkedSymbol)
                return $linkedSymbol;
            }
          }

        }

        if (isset($containerNode->extends))
          foreach (is_array($containerNode->extends) ? $containerNode->extends : [$containerNode->extends] as $extendsNode)
            foreach (inference\SymbolLink::get($extendsNode) as $extendsSymbol) {
              if ($inAnalysisScope)
                inference\Symbol::autoload(inference\Symbol::phpID($extendsSymbol));
              $linkedSymbol = SymbolLink::lookupSymbol(Symbol::concat($extendsSymbol, $memberSymbol), $phpId, $inAnalysisScope);
              if ($linkedSymbol)
                return $linkedSymbol;
            }

        if (property_exists($containerNode, 'implements'))
          foreach ($containerNode->implements as $implementsNode)
            foreach (inference\SymbolLink::get($implementsNode) as $implementsSymbol) {
              if ($inAnalysisScope)
                inference\Symbol::autoload(inference\Symbol::phpID($implementsSymbol));
              $linkedSymbol = SymbolLink::lookupSymbol(Symbol::concat($implementsSymbol, $memberSymbol), $phpId, $inAnalysisScope);
              if ($linkedSymbol)
                return $linkedSymbol;
            }

      }

      /**
       * If the member does not exist link to a default overloading call method.
       * @see http://php.net/manual/en/language.oop5.overloading.php#object.call
       */
      if ($memberSymbol != inference\Symbol::identifier('__call', 'function')) {
        $linkedSymbol = SymbolLink::lookupSymbol(
          Symbol::concat($containerSymbol, inference\Symbol::identifier('__call', 'function')),
          $phpId,
          $inAnalysisScope
        );
        if ($linkedSymbol)
          return $linkedSymbol;
      }

    }

    return '';

  }

  /**
   * Get node analysis-time known symbols without extra mangle information.
   *
   * @param object|string $node Node whose symbols to get or a literal symbol.
   * @return string[]
   */
  static function getUnmangled ($node) {
    return array_map(function ($symbol) {
      return preg_replace('/\{[^\}]*\}/', '', $symbol);
    }, \phlint\inference\SymbolLink::get($node));
  }

}
