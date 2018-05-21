<?php

namespace phlint\inference;

use \ArrayObject;
use \luka8088\phops\MetaContext;
use \phlint\Code;
use \phlint\IIData;
use \phlint\inference;
use \phlint\inference\Scope;
use \phlint\inference\SymbolLink;
use \phlint\Internal;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\phpLanguage;
use \PhpParser\Node;

class Symbol {

  function getIdentifier () {
    return 'symbol';
  }

  function getDependencies () {
    return [
      'symbolDeclaration',
      'symbolLink',
    ];
  }

  function getPass () {
    return 20;
  }

  protected $scopeStack = [];

  function resetState () {
    $sourceClass = class_exists(Node\Identifier::class)
      ? pnode\Source::class
      : pnode\SourceV3::class;
    $this->scopeStack = [new ArrayObject([
      'id' => '',
      'phpId' => '',
      'node' => new $sourceClass([]),
      'idCounter' => 0,
    ])];
  }

  function beforeTraverse ($nodes) {
      $this->resetState();
      if (!isset(MetaContext::get(Code::class)->data['symbols']))
        MetaContext::get(Code::class)->data['symbols'] = [];
  }

  function beforeNode ($node) {
    $this->enterScope($node);
  }

  function enterNode ($node) {

    if ($node instanceof Node\Stmt\If_)
      $this->enterScope($node, true);

    $this->inferSymbol($node);

  }

  function afterNode ($node) {
    $this->leaveScope($node);
  }

  function enterScope ($node, $special = false) {

    if (true
        && !NodeConcept::isDeclarationNode($node)
        && !NodeConcept::isDefinitionNode($node)
        && !NodeConcept::isExecutionBranchNode($node)
        && !NodeConcept::isScopeNode($node)
        && !NodeConcept::isVariableNode($node)
        && !$node->getAttribute('isScope', false)
    )
      return;

    if (!$special)
    if ($node instanceof Node\Stmt\If_)
      return;

    $scopeId = '';
    $scopePhpId = '';

    if (!$scopeId && !NodeConcept::isInvocationNode($node) && !($node instanceof Node\Stmt\Catch_) && Symbol::identifier($node)) {
      $scopeId = Symbol::fullyQualifiedIdentifier($node, '', end($this->scopeStack)['id']);
      if ($node instanceof Node\Stmt\Namespace_) {
        $scopeId = Symbol::concat($scopeId, 's_' . end($this->scopeStack)['idCounter']);
      }
      $scopePhpId = ltrim(end($this->scopeStack)['phpId']
        . (end($this->scopeStack)['id'] && Symbol::symbolIdentifierGroup(end($this->scopeStack)['id']) == 'class' ? '::' : '\\')
        . Symbol::name($node));
    }

    $this->scopeStack[] = new ArrayObject([
      'id' => $scopeId,
      'phpId' => $scopePhpId,
      'node' => $node,
      'idCounter' => 0,
    ]);

  }

  function leaveScope ($node) {
    if (count($this->scopeStack) > 0 && end($this->scopeStack)['node'] === $node)
      array_pop($this->scopeStack);
  }

  function inferSymbol ($node) {

    if (true
        && !NodeConcept::isDeclarationNode($node)
        && !NodeConcept::isDefinitionNode($node)
        && !NodeConcept::isExecutionBranchNode($node)
        && !NodeConcept::isVariableNode($node)
        && !$node->getAttribute('isScope', false)
    )
      return;

    $symbol = end($this->scopeStack)['id'];

    if (!$symbol)
      return;

    if (NodeConcept::isInvocationNode($node))
      return;

    if (NodeConcept::isNamedNode($node))
    $symbol = rtrim(preg_replace('/(?is)((?<=\.)|\A)s[a-z0-9]*_[^\.]*(\.|\z)/', '', $symbol), '.');

    if (!$symbol)
      return;

    assert(is_string($symbol));
    assert($symbol != '');
    assert(strpos($symbol, '.') !== 0);

    if (!isset(MetaContext::get(Code::class)->data['symbols'][$symbol]))
      MetaContext::get(Code::class)->data['symbols'][$symbol] = [
        'id' => $symbol,
        'phpId' => end($this->scopeStack)['phpId'],
      ];

  }

  static function name ($node) {

    if (is_string($node))
      return $node;

    if ($node instanceof Node\Name)
      return $node->toString();

    if ($node instanceof Node\Stmt\Class_)
      return Symbol::name($node->name);

    if ($node instanceof Node\Stmt\ClassMethod)
      return Symbol::name($node->name);

    if ($node instanceof Node\Stmt\Function_)
      return Symbol::name($node->name);

    if ($node instanceof Node\Expr\FuncCall)
      return Symbol::name($node->name);

    if ($node instanceof Node\Expr\Variable)
      return '$' . Symbol::name($node->name);

    if ($node instanceof Node\Stmt\StaticVar)
      return '$' . Symbol::name(class_exists(Node\Identifier::class) ? $node->var : $node->name);

    if ($node instanceof Node\Expr\ClosureUse)
      return '$' . Symbol::name($node->var);

    if ($node instanceof Node\Identifier)
      return $node->name;

    if ($node instanceof Node\Stmt\Interface_)
      return Symbol::name($node->name);

    if ($node instanceof Node\Stmt\Namespace_)
      return Symbol::name($node->name);

    return '';

  }

  static function fullyQualifiedIdentifier ($node, $symbolIdentifierGroup = '', $scope = '') {

    $identifier = Symbol::identifier($node, $symbolIdentifierGroup);

    $isRelative = function ($identifier) { return strpos($identifier, '.') !== 0; };

    if ($isRelative($identifier)) {
      $identifier = '.' . ($scope ? $scope . '.' : '') . $identifier;
    }

    return substr($identifier, 1);

  }

  /**
   * Generates a static symbol identifier from a Node or a node name.
   *
   * @param Node|string $node Node or a node name.
   * @param string $group If $node is a `Node\Name` it is not always possible
   *   to determinate the symbol identifier group solely based on it. That is
   *   why this argument can be used for hinting.
   *
   * @see /documentation/glossary/symbolIdentifierGroup.md
   */
  static function identifier ($node, $group = '') {

    if (is_string($node)) {

      if (inference\Symbol::isMulti($node))
        return implode('|', array_map(function ($node) use ($group) {
          return self::identifier($node, $group);
        }, inference\Symbol::decomposeMulti($node)));

      if (inference\Symbol::isArray($node)) {
        $decomposed = inference\Symbol::decomposeArray($node);
        return (inference\Symbol::isMulti($decomposed['valueSymbol']) ? '(' . self::identifier($decomposed['valueSymbol'], $group) . ')' : self::identifier($decomposed['valueSymbol'], $group))
          . '[' . self::identifier($decomposed['keySymbol']) . ']';
      }

      if (strpos($node, '\\') !== false && in_array($group, ['class', 'constant', 'function', 'namespace'])) {
        $namespace = array_map(function ($part) {
          return Symbol::identifier($part, 'namespace');
        }, array_slice(explode('\\', trim($node, '\\')), 0, -1));
        $construct = array_map(function ($part) use ($group) {
          return Symbol::identifier($part, $group);
        }, array_slice(explode('\\', trim($node, '\\')), -1));
        return (strpos($node, '\\') === 0 ? '.' : '') . implode('.', array_merge($namespace, $construct));
      }
      if ($group == '' || $group == 'auto') {
        if (in_array(strtolower($node), phpLanguage\Fixture::$typeDeclarationNonClassKeywords))
          return Symbol::identifier($node, 'type');
        if ($node == '')
          return '';
        return Symbol::identifier($node, 'class');
      }
      if ($group == 'class')
        return 'c_' . strtolower($node);
      if ($group == 'constant')
        return 'd_' . $node;
      if ($group == 'function')
        return 'f_' . strtolower($node);
      if ($group == 'namespace')
        return 'n_' . strtolower($node);
      if ($group == 'type')
        return 't_' . strtolower($node);
      if ($group == 'variable') {
        if (in_array($node, phpLanguage\Fixture::$superglobals))
          return '.v_' . $node;
        return 'v_' . $node;
      }
      return '';
    }

    if ($node instanceof Node\Const_)
      return Symbol::identifier($node->name, 'constant');

    if ($node instanceof Node\Expr\Closure)
      return Symbol::identifier('anonymous_' . sha1(NodeConcept::sourcePrint($node)), 'function');

    if ($node instanceof Node\Expr\ClosureUse)
      return Symbol::identifier($node->var, 'variable');

    if ($node instanceof Node\Expr\ConstFetch)
      return Symbol::identifier($node->name, 'constant');

    /**
     * Symbol invocations share the symbol identifier with the invoked symbol.
     * In expression `$x = $x;` both symbols have the same identifier.
     * Hence `function x () {}` has the same symbol identifier as `x();`.
     */
    if ($node instanceof Node\Expr\FuncCall)
      return Symbol::identifier($node->name, 'function');

    if ($node instanceof Node\Expr\New_)
      return Symbol::identifier($node->class, 'class');

    if ($node instanceof Node\Expr\StaticCall)
      return Symbol::identifier($node->class, 'class') . '.' . Symbol::identifier($node->name, 'function');

    if ($node instanceof Node\Expr\StaticPropertyFetch)
      return Symbol::identifier($node->class, 'class') . '.' . Symbol::identifier($node->name, 'variable');

    if ($node instanceof Node\Expr\Variable)
      return Symbol::identifier($node->name, 'variable');

    if ($node instanceof Node\Identifier)
      return Symbol::identifier($node->name, $group);

    if ($node instanceof Node\Name) {
      if ($node instanceof Node\Name\FullyQualified)
        return str_replace('n_.', '', Symbol::identifier(new Node\Name($node->parts), $group));
      $namespace = array_map(function ($part) {
        return Symbol::identifier($part, 'namespace');
      }, array_slice($node->parts, 0, -1));
      $construct = array_map(function ($part) use ($group) {
        return Symbol::identifier($part, $group);
      }, array_slice($node->parts, -1));
      return implode('.', array_merge($namespace, $construct));
    }

    if ($node instanceof Node\Param)
      return class_exists(Node\Identifier::class)
        ? Symbol::identifier($node->var, $group)
        : Symbol::identifier($node->name, 'variable');

    if ($node instanceof Node\Stmt\Catch_)
      return Symbol::identifier($node->var, 'variable');

    if ($node instanceof Node\Stmt\Class_) {
      if (!$node->name)
        return Symbol::identifier('anonymous_' . sha1(NodeConcept::sourcePrint($node)), 'class');
      return Symbol::identifier($node->name, 'class');
    }

    if ($node instanceof Node\Stmt\ClassMethod)
      return Symbol::identifier($node->name, 'function');

    if ($node instanceof Node\Stmt\Function_)
      return Symbol::identifier($node->name, 'function');

    if ($node instanceof Node\Stmt\Interface_)
      return Symbol::identifier($node->name, 'class');

    if ($node instanceof Node\Stmt\Namespace_)
      return $node->name ? Symbol::identifier($node->name, 'namespace') : '';

    if ($node instanceof Node\Stmt\PropertyProperty)
      return Symbol::identifier($node->name, 'variable');

    if ($node instanceof Node\Stmt\StaticVar)
      return Symbol::identifier(class_exists(Node\Identifier::class) ? $node->var : $node->name, 'variable');

    if ($node instanceof Node\Stmt\Trait_)
      return Symbol::identifier($node->name, 'class');

    if ($node instanceof Node\Stmt\UseUse)
      return Symbol::identifier($node->name, $group);

    return '';

  }

  static function symbolIdentifierGroup ($symbol) {
    $symbol = Symbol::unqualified($symbol);
    if (strpos($symbol, 'c') === 0)
      return 'class';
    if (strpos($symbol, 'd') === 0)
      return 'constant';
    if (strpos($symbol, 'f') === 0)
      return 'function';
    if (strpos($symbol, 'n') === 0)
      return 'namespace';
    if (strpos($symbol, 'o') === 0)
      return 'concept';
    if (strpos($symbol, 'r') === 0)
      return '';
    if (strpos($symbol, 's') === 0)
      return '';
    if (strpos($symbol, 't') === 0)
      return 'type';
    if (strpos($symbol, 'v') === 0)
      return 'variable';
    assert(false);
  }

  static function concat ($a, $b, $glue = '.') {
    // @todo: Remove
    $a = $a == 'n_' ? '' : $a;
    return $a . ($a && $b ? $glue : '') . $b;
  }

  static function autoload ($symbol) {
    if ($symbol instanceof Node)
      $symbol = $symbol->getAttribute('phpId');
    $symbol = ltrim($symbol, '\\');
    #var_dump('TRY LOAD ..................: ' . $symbol);
    if (isset(MetaContext::get(Code::class)->autoloadLookups[$symbol]))
      return;
    #var_dump('NEW LOAD ..................: ' . $symbol);
    MetaContext::get(Code::class)->autoloadLookups[$symbol] = true;
    MetaContext::get(Code::class)->extensionInterface['phlint.phpAutoloadClass']($symbol, MetaContext::get(Code::class));
  }

  static function parent ($scope) {
    return strpos($scope, '.') === false ? '' : substr($scope, 0, strrpos($scope, '.'));
  }

  /**
   * Get unqualified symbol identifier.
   * This function is meant to be used by rules and other inferences.
   *
   * @param string $symbol
   * @return string
   */
  static function unqualified ($symbol) {
    return substr('.' . $symbol, strrpos('.' . $symbol, '.') + 1);
  }

  static function phpID ($symbol) {

    if (!$symbol)
      return '';

    if (is_array($symbol))
      return implode('|', array_map(function ($symbol) {
        return inference\Symbol::phpID($symbol);
      }, $symbol));

    if ($symbol == 't_mixed')
      return 'mixed';

    if ($symbol instanceof Node\Name\FullyQualified)
      return ltrim($symbol->toString(), '\\');

    if ($symbol instanceof pnode\SymbolAlias) {
      if ($symbol->phpID)
        return $symbol->phpID;
      return self::phpID($symbol->id);
    }

    $yieldClass = class_exists(Node\Identifier::class)
      ? pnode\Yield_::class
      : pnode\YieldV3::class;

    if ($symbol instanceof $yieldClass)
      return implode('|', array_map(function ($yieldNode) {
        return inference\Symbol::phpID($yieldNode);
      }, $symbol->yield));

    if (is_object($symbol))
      return self::phpID(inference\DeclarationSymbol::get($symbol));

    if (substr($symbol, 0, 3) == 'n_.')
      $symbol = substr($symbol, 3);

    $symbol = rtrim(preg_replace('/(?is)((?<=\.)|\A)s[a-z0-9]*_[^\.]*(\.|\z)/', '', $symbol), '.');

    if (inference\Symbol::isMulti($symbol))
      return inference\Symbol::composeMulti(array_map([self::class, 'phpID'], inference\Symbol::decomposeMulti($symbol)));

    if (inference\Symbol::isArray($symbol)) {
      $decomposed = inference\Symbol::decomposeArray($symbol);
      return inference\Symbol::composeArray(self::phpID($decomposed['keySymbol']), self::phpID($decomposed['valueSymbol']));
    }

    if (in_array($symbol, ['t_bool']))
      return 'bool';

    if (in_array($symbol, ['t_float', 't_floatBool', 't_floatInt']))
      return 'float';

    if (in_array($symbol, ['t_int', 't_intBool', 't_IntFloat']))
      return 'int';

    if (in_array($symbol, ['t_string', 't_stringBool', 't_stringFloat', 't_stringInt']))
      return 'string';

    if (isset(MetaContext::get(Code::class)->data['symbols'][$symbol]))
      return ltrim(MetaContext::get(Code::class)->data['symbols'][$symbol]['phpId'], '\\');

    // @todo: Refactor.
    if ($symbol == 't_array')
      return 'array';

    // @todo: Refactor.
    #if ($symbol == 'o_callable' || $symbol == 'o_callback')
    #  return 'callable';

    // @todo: Refactor.
    if ($symbol == 'o_null')
      return 'null';

    // @todo: Refactor.
    if ($symbol == 'o_object')
      return 'object';

    if ($symbol == 'o_callable')
      return 'callable';

    // @todo: Remove.
    if ($symbol == 'mixed')
      return $symbol;

    return '';

  }

  /**
   * Is `$symbol` an array symbol?
   *
   * @param string $symbol
   * @return bool
   */
  static function isArray ($symbol) {
    if (substr($symbol, -1) != ']')
      return false;
    $tokens = token_get_all('<?php ' . $symbol);
    $curlyBracketsNestingCount = 0;
    $roundBracketsNestingCount = 0;
    $squareBracketsNestingCount = 0;
    for ($i = count($tokens) - 1; $i > 0; $i -= 1) {
      if ($tokens[$i] == '}')
        $curlyBracketsNestingCount += 1;
      if ($tokens[$i] == '{')
        $curlyBracketsNestingCount -= 1;
      if ($tokens[$i] == ')')
        $roundBracketsNestingCount += 1;
      if ($tokens[$i] == '(')
        $roundBracketsNestingCount -= 1;
      if ($tokens[$i] == ']')
        $squareBracketsNestingCount += 1;
      if ($tokens[$i] == '[')
        $squareBracketsNestingCount -= 1;
      if ($curlyBracketsNestingCount == 0 && $roundBracketsNestingCount == 0
          && $squareBracketsNestingCount == 0 && $tokens[$i] == '|')
        return false;
    }
    return true;
  }

  /**
   * Compose a key symbol and value symbol into an array symbol.
   *
   * @param string $keySymbol
   * @param string $valueSymbol
   * @return string
   */
  static function composeArray ($keySymbol, $valueSymbol) {
    return (strpos($valueSymbol, '|') !== false
        ? '(' . $valueSymbol . ')'
        : $valueSymbol)
      . '[' . ($keySymbol == 't_int' ? '' : $keySymbol) . ']';
  }

  /**
   * Decompose an array symbol to a key symbol and value symbol.
   *
   * @param string $symbol
   * @return ['keySymbol' => string, 'valueSymbol' => string]
   */
  static function decomposeArray ($symbol) {
    $tokens = token_get_all('<?php ' . $symbol);
    $decomposed = [
      'keySymbol' => '',
      'valueSymbol' => '',
    ];
    if ($tokens[count($tokens) - 1] != ']')
      return $decomposed;
    $curlyBracketsNestingCount = 0;
    $roundBracketsNestingCount = 0;
    $squareBracketsNestingCount = 0;
    $keyLength = 0;
    for ($i = count($tokens) - 1; $i > 0; $i -= 1) {
      $keyLength += strlen(is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i]);
      if ($tokens[$i] == '}')
        $curlyBracketsNestingCount += 1;
      if ($tokens[$i] == '{')
        $curlyBracketsNestingCount -= 1;
      if ($tokens[$i] == ')')
        $roundBracketsNestingCount += 1;
      if ($tokens[$i] == '(')
        $roundBracketsNestingCount -= 1;
      if ($tokens[$i] == ']')
        $squareBracketsNestingCount += 1;
      if ($tokens[$i] == '[')
        $squareBracketsNestingCount -= 1;
      if ($curlyBracketsNestingCount == 0 && $roundBracketsNestingCount == 0 && $squareBracketsNestingCount == 0) {
        $decomposed['keySymbol'] = substr($symbol, -$keyLength + 1, -1);
        if (substr($decomposed['keySymbol'], 0, 1) == '(' && substr($decomposed['keySymbol'], -1) == ')')
          $decomposed['keySymbol'] = substr($decomposed['keySymbol'], 1, -1);
        $decomposed['valueSymbol'] = substr($symbol, 0, -$keyLength);
        if (substr($decomposed['valueSymbol'], 0, 1) == '(' && substr($decomposed['valueSymbol'], -1) == ')')
          $decomposed['valueSymbol'] = substr($decomposed['valueSymbol'], 1, -1);
        break;
      }
    }
    return $decomposed;
  }

  /**
   * Is `$symbol` a multi-symbol?
   *
   * @param string $symbol
   * @return bool
   */
  static function isMulti ($symbol) {

    // @todo: Remove
    while (substr($symbol, 0, 1) == '(' && substr($symbol, -1) == ')')
      $symbol = substr($symbol, 1, -1);

    if (strpos($symbol, '|') === false)
      return false;
    $tokens = token_get_all('<?php ' . $symbol);
    $curlyBracketsNestingCount = 0;
    $roundBracketsNestingCount = 0;
    $squareBracketsNestingCount = 0;
    for ($i = count($tokens) - 1; $i > 0; $i -= 1) {
      if ($tokens[$i] == '}')
        $curlyBracketsNestingCount += 1;
      if ($tokens[$i] == '{')
        $curlyBracketsNestingCount -= 1;
      if ($tokens[$i] == ')')
        $roundBracketsNestingCount += 1;
      if ($tokens[$i] == '(')
        $roundBracketsNestingCount -= 1;
      if ($tokens[$i] == ']')
        $squareBracketsNestingCount += 1;
      if ($tokens[$i] == '[')
        $squareBracketsNestingCount -= 1;
      if ($curlyBracketsNestingCount == 0 && $roundBracketsNestingCount == 0
          && $squareBracketsNestingCount == 0 && $tokens[$i] == '|')
        return true;
    }
    return false;
  }

  /**
   * Compose a list of symbols into a multi-symbol.
   *
   * @param string[] $symbols
   * @return string
   */
  static function composeMulti ($symbols) {
    $subSymbols = [];
    foreach ($symbols as $symbol)
      foreach (inference\Symbol::isMulti($symbol) ? inference\Symbol::decomposeMulti($symbol) : [$symbol] as $subSymbol)
        $subSymbols[] = $subSymbol;
    return implode('|', array_unique($subSymbols));
  }

  /**
   * Decompose a multi-symbol to a list of symbols.
   *
   * @param string $symbol
   * @return string[]
   */
  static function decomposeMulti ($symbol) {

    // @todo: Remove
    while (substr($symbol, 0, 1) == '(' && substr($symbol, -1) == ')')
      $symbol = substr($symbol, 1, -1);

    $tokens = token_get_all('<?php ' . $symbol);
    $decomposed = [];
    $curlyBracketsNestingCount = 0;
    $roundBracketsNestingCount = 0;
    $squareBracketsNestingCount = 0;
    $lastSymbolPosition = 0;
    $thisTokenEndPosition = 0;
    for ($i = 1; $i < count($tokens); $i += 1) {
      $thisTokenEndPosition += strlen(is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i]);
      if ($tokens[$i] == '{')
        $curlyBracketsNestingCount += 1;
      if ($tokens[$i] == '}')
        $curlyBracketsNestingCount -= 1;
      if ($tokens[$i] == '(')
        $roundBracketsNestingCount += 1;
      if ($tokens[$i] == ')')
        $roundBracketsNestingCount -= 1;
      if ($tokens[$i] == '[')
        $squareBracketsNestingCount += 1;
      if ($tokens[$i] == ']')
        $squareBracketsNestingCount -= 1;
      if ($curlyBracketsNestingCount == 0 && $roundBracketsNestingCount == 0
          && $squareBracketsNestingCount == 0 && $tokens[$i] == '|') {
        $decomposed[] = trim(substr($symbol, $lastSymbolPosition, $thisTokenEndPosition - $lastSymbolPosition - 1));
        $lastSymbolPosition = $thisTokenEndPosition;
      }
    }
    $decomposed[] = trim(substr($symbol, $lastSymbolPosition, $thisTokenEndPosition - $lastSymbolPosition));
    // @todo: Revisit filter.
    return array_filter($decomposed);
  }

}
