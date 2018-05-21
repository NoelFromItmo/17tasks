<?php

namespace phif;

use \ArrayObject;
use \Phif;
use \phif\Parser;
use \PhpParser\Comment;
use \PhpParser\Node;
use \PhpParser\NodeTraverser;
use \PhpParser\NodeVisitorAbstract;

class DeclarationBuilder {

  static function build ($flatBlueprint) {

    $declarations = [];
    $blueprint = [];

    foreach ($flatBlueprint as $symbol => $data) {
      $pointer = &$blueprint;
      foreach (explode('.', Phif::parentSymbol($symbol)) as $symbolPart) {
        if (!isset($pointer[$symbolPart]))
          $pointer[$symbolPart] = [];
        $pointer = &$pointer[$symbolPart];
      }
      $pointer[Phif::unqualifiedSymbol($symbol)] = $data;
    }

    $filterOutIncomplete = function (&$blueprint) use (&$filterOutIncomplete) {
      $blueprint = array_filter($blueprint, function ($blueprint) {
        return !is_array($blueprint) || isset($blueprint['a_construct']);
      });
      foreach ($blueprint as $symbol => $_)
        if (is_array($blueprint[$symbol]))
          $filterOutIncomplete($blueprint[$symbol]);
    };
    $filterOutIncomplete($blueprint);

    foreach ($blueprint as $symbol => $data) {

      // @todo: Remove
      if (strpos($symbol, 'n_') === 0)
        continue;

      if (isset($data['a_aliasOf']))
        $data = array_merge($blueprint[$data['a_aliasOf']], [
          'a_name' => $data['a_name'],
          'a_symbol' => $data['a_symbol'],
        ]);

      $declarations[] = DeclarationBuilder::buildSymbol($symbol, $data);

    }

    $traverser = new NodeTraverser();
    $traverser->addVisitor(new class extends NodeVisitorAbstract {
      function leaveNode (Node $node) {
          DeclarationBuilder::generateDocComment($node);
      }
    });
    $declarations = $traverser->traverse($declarations);

    return $declarations;

  }

  static function buildSymbol ($symbol, $data) {

    switch ($data['a_construct']) {
      case 'class':
        $node = DeclarationBuilder::buildClass($data);
        break;
      case 'constant':
        $node = DeclarationBuilder::buildConstant($symbol, $data);
        break;
      case 'function':
        $node = DeclarationBuilder::buildFunction($symbol, $data);
        break;
      case 'interface':
        $node = DeclarationBuilder::buildInterface($data);
        break;
      case 'parameter':
        $node = DeclarationBuilder::buildParameter($data);
        break;
      default:
        var_dump($symbol, $data);
        assert(false);
    }

    if (isset($data['a_symbol']))
      $node->setAttribute('symbol', $data['a_symbol']);

    if (isset($data['a_isRemoved']))
      $node->setAttribute('isRemoved', $data['a_isRemoved']);

    if (isset($data['a_isolated']))
      $node->setAttribute('isolated', $data['a_isolated']);

    if (isset($data['a_pure']))
      $node->setAttribute('pure', $data['a_pure']);

    if (isset($data['a_out']))
      $node->setAttribute('out', $data['a_out']);

    if (isset($data['a_sourceLibrary']))
      $node->setAttribute('sourceLibrary', $data['a_sourceLibrary']);

    if (isset($data['a_sourceLibrary']))
      $node->setAttribute('source-library', $data['a_sourceLibrary']);

    if (isset($data['a_template']))
      $node->setAttribute('template', $data['a_template']);

    if (isset($data['a_types']))
      $node->setAttribute('types', $data['a_types']);

    return $node;

  }

  static function buildClass ($data) {
    #var_dump($data);
    #exit;
    $implements = [];
    foreach ($data as $key => $statement)
      if (strpos($key, 'a_implements_') === 0)
        $implements[] = new Node\Name($data[$key]['a_name']);

    $statements = [];
    foreach ($data as $fieldSymbol => $fieldData) {
      if (substr($fieldSymbol, 0, 2) == 'f_') {
        $function_ = DeclarationBuilder::buildSymbol($fieldSymbol, $fieldData);
        $statements[] = new Node\Stmt\ClassMethod($function_->name, [
          #'flags' => $function_->flags,
          'byRef' => $function_->returnsByRef(),
          'params' => $function_->getParams(),
          'returnType' => $function_->getReturnType(),
          'stmts' => $function_->getStmts(),
        ], $function_->getAttributes());
      }
    }

    usort($statements, function ($a, $b) {
      return strcmp($a->getAttribute('symbol', ''), $b->getAttribute('symbol', ''));
    });

    return new Node\Stmt\Class_($data['a_name'], [
      'flags' => isset($data['a_flags']) ? $data['a_flags'] : 0,
      'extends' => !empty($data['a_extends']) ? DeclarationBuilder::buildName($data['a_extends']) : null,
      'implements' => $implements,
      'stmts' => $statements,
    ]);
  }

  static function buildConstant ($symbol, $data) {
    return new Node\Stmt\Const_([new Node\Const_(
      $data['a_name'],
      DeclarationBuilder::literalValue($data['a_value'])
    )]);

    #var_dump($data);
    #var_dump(Parser::parse('<?php $x = ' . var_export($data['a_value'], true) . ';')[0]->expr->expr);
    #DeclarationBuilder::literalValue($data['a_value']);
    #exit;

    return new Node\Stmt\Const_([new Node\Const_(
      $data['a_name'],
      DeclarationBuilder::literalValue($data['a_value'])#,
      #[
      #  'symbol' => $data['a_symbol'],
      #  'sourceLibrary' => $data['a_sourceLibrary'],
      #]
      #new Node\Expr\ConstFetch(new Node\Name('null'))
    )]);

  }

  static function buildFunction ($symbol, $data) {
    $parameters = [];
    for ($index = 0; isset($data['p_' . $index]); $index += 1)
      if (!isset($data['p_' . $index]['a_isRemoved']) || !$data['p_' . $index]['a_isRemoved'])
        $parameters[] = DeclarationBuilder::buildSymbol($symbol . '.' . 'p_' . $index, $data['p_' . $index]);
    $statements = [];
    foreach ($data as $key => $statement)
      if (strpos($key, 's_') === 0)
        if (is_string($statement))
          foreach (Parser::parse('<?php ' . $statement) as $statementNode)
            $statements[] = $statementNode;
        else
          $statements[] = $statement;
    return new Node\Stmt\Function_($data['a_name'], [
      'params' => $parameters,
      'returnType' => isset($data['a_returnType']) && $data['a_returnType'] ? $data['a_returnType'] : null,
      'stmts' => $statements,
    ], [
      'phpDocReturnType' => isset($data['a_phpDocReturnType']) ? $data['a_phpDocReturnType'] : '',
    ]);
  }

  static function buildInterface ($data) {

    $extends = [];
    foreach ($data as $field => $fieldData)
      if (strpos($field, 'a_extends_') === 0)
        $extends[] = new Node\Name($fieldData['a_name']);

    $statements = [];
    foreach ($data as $fieldSymbol => $fieldData) {
      if (substr($fieldSymbol, 0, 2) == 'f_') {
        $function_ = DeclarationBuilder::buildFunction($fieldSymbol, $fieldData);
        $statements[] = new Node\Stmt\ClassMethod($function_->name, [
          #'flags' => $function_->flags,
          'byRef' => $function_->returnsByRef(),
          'params' => $function_->getParams(),
          'returnType' => $function_->getReturnType(),
          'stmts' => $function_->getStmts(),
        ], $function_->getAttributes());
      }
    }

    return new Node\Stmt\Interface_($data['a_name'], [
      'extends' => $extends,
      'stmts' => $statements,
    ]);
  }

  static function buildParameter ($data) {
    return new Node\Param(
      new Node\Expr\Variable(str_replace('"', '', $data['a_name'])),
      isset($data['a_defaultValue']) ? $data['a_defaultValue'] : null,
      isset($data['a_type']) ? $data['a_type'] : null,
      isset($data['a_byRef']) ? $data['a_byRef'] : false,
      isset($data['a_isVariadic']) ? $data['a_isVariadic'] : false,
      [
        'phpDocType' => isset($data['a_phpDocType']) ? $data['a_phpDocType'] : '',
      ]
    );
  }

  static function buildName ($name) {
    if (is_string($name))
      return new Node\Name($name);
    return $name;
  }

  static function nameToString ($name) {
    if (is_object($name))
      return $name->toString();
    return (string) $name;
  }

  static function literalValue ($value) {
    return Parser::parse('<?php $_ = ' . var_export($value, true) . ';')[0]->expr->expr;
    /*
    if (is_string($value))
      return new Node\Scalar\String_($value);
    if (is_int($value))
      return new Node\Scalar\LNumber($value);
    if (is_float($value))
      return new Node\Scalar\DNumber($value);
    if (is_bool($value))
      return new Node\Name($value ? 'true' : 'false');
    if (is_null($value))
      return new Node\Name('null');
    if (is_resource($value))
      return new Node\Name('null');
    assert(false, 'Value type not implemented');
    /**/
  }

  static function generateDocComment ($node) {

    $commentLines = [];

    if ($node->getAttribute('isolated', ''))
      $commentLines[] = trim('@isolated ' . $node->getAttribute('isolated', ''));

    if ($node->getAttribute('pure', ''))
      $commentLines[] = '@pure';

    if ($node->getAttribute('out', ''))
      $commentLines[] = trim('@out ' . $node->getAttribute('out', ''));

    if ($node->getAttribute('template', null) !== null)
      $commentLines[] = trim('@template' . ($node->getAttribute('template', null) === false ? '(false)' : ''));

    if ($node->getAttribute('var', ''))
      $commentLines[] = trim('@var ' . $node->getAttribute('var', ''));

    if ($node->getAttribute('types', ''))
      $commentLines[] = trim('@var ' . $node->getAttribute('types', ''));

    if ($node instanceof Node\Stmt\Function_) {
      if (isset($node->params))
        foreach ($node->params as $parameter) {
          $phpDocType = '';
          if (!$phpDocType)
            $phpDocType = $parameter->getAttribute('phpDocType', '');
          if (!$phpDocType)
            $phpDocType = DeclarationBuilder::nameToString($parameter->type);
          if (!$phpDocType)
            $phpDocType = 'mixed';
          $commentLines[] = trim('@param ' . $phpDocType . ' $' . $parameter->var->name);
        }
      $phpDocReturnType = '';
      if (!$phpDocReturnType)
        $phpDocReturnType = $node->getAttribute('phpDocReturnType', '');
      if (!$phpDocReturnType)
        $phpDocReturnType = DeclarationBuilder::nameToString($node->returnType);
      if (!$phpDocReturnType)
        $phpDocReturnType = 'void';
      $commentLines[] = trim('@return ' . $phpDocReturnType);
    }

    if (count($commentLines) > 0)
      if ($node instanceof Node\Param)
        $node->setAttribute('comments', [new Comment\Doc("/** " . implode(" ", $commentLines) . " */")]);
      else
        $node->setAttribute('comments', [new Comment\Doc("/**\n * " . implode("\n * ", $commentLines) . "\n */")]);

  }

  static function build___ ($blueprint) {
    $builder = new DeclarationBuilder($blueprint);
    return $builder->_build();
  }

  protected $blueprint = null;
  protected $blueprintMap = [];
  protected $declarationsMap = [];

  function __construct__ ($blueprint) {
    $this->blueprint = $blueprint;
  }

  function _build__ () {

    $this->declarationsMap = [];

    foreach ($this->blueprint as $symbol => $value) {
      $pointer = &$this->blueprintMap;
      foreach (explode('.', Phif::parentSymbol($symbol)) as $symbolPart) {
        if (!isset($pointer[$symbolPart]))
          $pointer[$symbolPart] = [];
        $pointer = &$pointer[$symbolPart];
      }
      $pointer[Phif::unqualifiedSymbol($symbol)] = $value;
    }

    foreach ($this->blueprintMap as $symbol => $value)
      switch (Phif::unqualifiedSymbol($symbol)) {
        case 'a_construct':
          $this->processConstruct(Phif::parentSymbol($symbol), $value);
          break;
      }
  }

  function processConstruct__ ($symbol, $construct) {
    switch ($construct) {
      case 'constant':
        if (!isset($this->declarationsMap[$symbol]))
          $this->declarationsMap[$symbol] = new Node\Stmt\Const_([new Node\Const_(
            '',
            new Node\Expr\ConstFetch(new Node\Name('null'))
          )]);
        break;
    }
  }

  function processName__ ($symbol, $name) {
    #$node =
    switch ($construct) {
      case 'constant':
        if (!isset($this->declarationsMap[$symbol]))
          $this->declarationsMap[$symbol] = new Node\Stmt\Const_([new Node\Const_(
            '',
            new Node\Expr\ConstFetch(new Node\Name('null'))
          )]);
        break;
    }
  }

}
