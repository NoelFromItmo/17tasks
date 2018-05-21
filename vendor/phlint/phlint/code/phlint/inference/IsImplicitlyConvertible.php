<?php

namespace phlint\inference;

use \luka8088\phops\MetaContext;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \PhpParser\Node;

class IsImplicitlyConvertible {

  function getIdentifier () {
    return 'isImplicitlyConvertible';
  }

  /**
   * Is `$from` implicitly convertible to `$to`.
   *
   * Strict type comparison is done according to rules of `declare(strict_types=1);`.
   * @see http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict
   *
   * @param string $from
   * @param string $to
   * @param bool $strictType Do a strict type comparison.
   * @return bool
   */
  static function get ($from, $to, $strictType = false) {

    if (is_array($to)) {
      $isCompatible = count($to) == 0;
      foreach ($to as $subTo)
        if (self::get($from, $subTo, $strictType))
          $isCompatible = true;
      return $isCompatible;
    }

    /**
     * A value of a certain type is convertible to that type.
     *
     * Technically speaking the value is not converted to that type but rather
     * to another value of that type. However when dealing with constraints they
     * are expressed as types rather than values of types so that is ok.
     *
     * On the other hand converting types to values is not allowed simply
     * because a type cannot be expanded to a value (it could be initialized
     * but that is a separate operation).
     */
    if ($from instanceof data\Value) {
      foreach ($from->constraints as $constraint)
        if (!self::get($constraint, $to, $strictType))
          return false;
      return count($from->constraints) > 0;
    }

    if ($to instanceof data\Value) {
      foreach ($to->constraints as $constraint)
        if (!self::get($from, $constraint, $strictType))
          return false;
      return count($to->constraints) > 0;
    }

    if ($from instanceof Node\Arg)
      return self::get($from->value, $to, $strictType);

    if ($to instanceof Node\Arg)
      return self::get($from, $to->value, $strictType);

    if ($from instanceof pnode\SymbolAlias)
      return self::get($from->id, $to, $strictType);

    if ($to instanceof pnode\SymbolAlias)
      return self::get($from, $to->id, $strictType);

    if ($from instanceof \phlint\constraint\GreaterThan)
      $from = 't_int';

    if ($from instanceof \phlint\constraint\LessThan)
      $from = 't_int';

    if ($from instanceof Node\Expr\Array_ && $to == 't_array')
      return true;

    if ($from instanceof Node\Expr\Array_ && $to == 'o_object')
      return false;

    if ($from instanceof Node\Expr\Array_ && count($from->items) == 0
        && $to instanceof Node\Expr\Array_ && count($to->items) == 0)
      return true;

    if ($from instanceof Node\Expr\BinaryOp\Concat && $to == 't_int')
      return self::get($from->left, $to, $strictType) && self::get($from->right, $to, $strictType);

    if ($from instanceof Node\Expr\ConstFetch && strtolower($from->name->toString()) == 'false'
        && $to instanceof Node\Expr\ConstFetch && strtolower($to->name->toString()) == 'true')
      return false;

    if ($from instanceof Node\Expr\ConstFetch && strtolower($from->name->toString()) == 'true'
        && $to instanceof Node\Expr\ConstFetch && strtolower($to->name->toString()) == 'false')
      return false;

    if ($from == 't_bool' && $to instanceof Node\Expr\ConstFetch)
      return false;

    if ($from instanceof Node\Expr\ConstFetch && strtolower($from->name->toString()) == 'null' && $to == 't_array')
      return false;

    if ($from instanceof Node\Expr\ConstFetch && strtolower($from->name->toString()) == 'null' && $to == 'o_object')
      return false;

    if ($from instanceof Node\Param || $to instanceof Node\Param)
      return true;

    if ($from instanceof Node\Scalar\DNumber && $to instanceof Node\Scalar\DNumber)
      return true;

    if ($from instanceof Node\Scalar\LNumber && $to == 't_array')
      return false;

    if ($from instanceof Node\Scalar\LNumber && $to == 'o_object')
      return false;

    if ($from instanceof Node\Scalar\LNumber && $to instanceof Node\Scalar\LNumber)
      return true;

    if ($from instanceof Node\Scalar\String_ && $to == 't_array')
      return false;

    if ($from instanceof Node\Scalar\String_ && $to == 'o_object')
      return false;

    if ($from instanceof Node\Scalar\String_ && $to instanceof Node\Scalar\String_)
      return true;

    // @todo: Rethink.
    if ($to == '')
      return true;

    if ($from instanceof Node\Expr\ConstFetch && in_array(strtolower($from->name->toString()), ['true', 'false']))
      $from = 't_bool';

    if ($to instanceof Node\Expr\ConstFetch && in_array(strtolower($to->name->toString()), ['true', 'false']))
      $to = 't_bool';

    if ($from instanceof pnode\SymbolAlias)
      return self::get($from->id, $to, $strictType);

    if ($to instanceof pnode\SymbolAlias)
      return self::get($from, $to->id, $strictType);

    if ($from instanceof Node\Expr\Array_)
      return self::get('t_array', $to, $strictType);

    if ($to instanceof Node\Expr\Array_)
      return self::get($from, 't_array', $strictType);

    if ($from instanceof Node\Scalar\String_ && $to instanceof pnode\SymbolAlias && $to->id == 't_int' && !$strictType) {
      $floatValue = filter_var($from->value, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
      $intValue = filter_var($floatValue, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
      return $intValue !== null;
    }

    if ($from == 't_mixed')
      return true;

    $from = is_string($from) ? $from : (count(inference\Concept::get($from)) > 0 ? inference\Concept::get($from)[0]->id : '');
    $to = is_string($to) ? $to : (count(inference\Concept::get($to)) > 0 ? inference\Concept::get($to)[0]->id : '');

    $metaContextKey = 'nodeIsImplicitlyConvertible:' . $from . '/' . $to;

    if (!isset(MetaContext::get(IIData::class)[$metaContextKey]))
      MetaContext::get(IIData::class)[$metaContextKey] = inference\IsImplicitlyConvertible::lookup($from, $to, $strictType);

    return MetaContext::get(IIData::class)[$metaContextKey];

  }

  /**
   * Lookup if `$from` is implicitly convertible to `$to`.
   *
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * Strict type comparison is done according to rules of `declare(strict_types=1);`.
   * @see http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict
   *
   * @internal
   *
   * @param string $from
   * @param string $to
   * @param bool $strictType Do a strict type comparison.
   * @return bool
   */
  static function lookup ($from, $to, $strictType = false) {

    $fromSymbol = $from;
    $toSymbol = $to;

    // @todo: Remove.
    if ($toSymbol == 'o_callable')
      return true;

    // @todo: Remove
    if ($fromSymbol == 't_array')
      $fromSymbol = '[]';

    // @todo: Remove
    if ($toSymbol == 't_array')
      $toSymbol = '[]';

    if ($fromSymbol == $toSymbol)
      return true;

    if ($fromSymbol == 't_dynamic' || $toSymbol == 't_dynamic')
      return true;

    #var_dump($fromSymbol . ' -> ' . $toSymbol);

    if ($toSymbol == 't_mixed')
      return true;

    if ($fromSymbol == 't_array' && inference\Symbol::isArray($toSymbol))
      return true;

    if ($fromSymbol == '[]' && inference\Symbol::isArray($toSymbol))
      return true;

    if (inference\Symbol::isArray($fromSymbol) && $toSymbol == 't_array')
      return true;

    if (inference\Symbol::isArray($fromSymbol) && $toSymbol == '[]')
      return true;

    // @todo: Remove
    if (!$strictType)
    if (in_array($fromSymbol, ['t_autoBool', 't_stringBool']) && $toSymbol == 't_bool')
      return true;

    // @todo: Remove
    if (!$strictType)
    if (in_array($fromSymbol, ['t_autoInteger', 't_stringBool', 't_stringInt']) && $toSymbol == 't_int')
      return true;

    // @todo: Remove
    if (!$strictType)
    if (in_array($fromSymbol, ['t_int', 't_stringFloat', 't_stringBool', 't_autoInteger', 't_autoFloat', 't_stringInt']) && $toSymbol == 't_float')
      return true;

    // @todo: Remove
    if (!$strictType)
    if (in_array($fromSymbol, ['t_int', 't_float', 't_autoInteger', 't_autoFloat', 't_stringInt', 't_stringFloat', 't_stringBool']) && $toSymbol == 't_string')
      return true;

    // @todo: Remove
    if (in_array($fromSymbol, ['t_stringInt', 't_stringFloat', 't_stringBool']) && $toSymbol == 't_string')
      return true;

    // @todo: Remove
    if (in_array($fromSymbol, ['t_int']) && $toSymbol == 't_float')
      return true;

    if (inference\Symbol::isMulti($fromSymbol)) {
      foreach (inference\Symbol::decomposeMulti($fromSymbol) as $subType1)
        if (!inference\IsImplicitlyConvertible::get($subType1, $toSymbol, $strictType))
          return false;
      return true;
    }

    if (inference\Symbol::isMulti($toSymbol)) {
      foreach (inference\Symbol::decomposeMulti($toSymbol) as $subType2)
        if (inference\IsImplicitlyConvertible::get($fromSymbol, $subType2, $strictType))
          return true;
      return false;
    }

    if (inference\Symbol::isArray($fromSymbol) && inference\Symbol::isArray($toSymbol)) {
      $decomposedArray1 = inference\Symbol::decomposeArray($fromSymbol);
      $decomposedArray2 = inference\Symbol::decomposeArray($toSymbol);
      return inference\IsImplicitlyConvertible::get($decomposedArray1['keySymbol'], $decomposedArray2['keySymbol'], $strictType)
        && inference\IsImplicitlyConvertible::get($decomposedArray1['valueSymbol'], $decomposedArray2['valueSymbol'], $strictType)
      ;
    }

    if (inference\Symbol::isArray($fromSymbol) && $toSymbol == 'c_traversable')
      return false;

    if ($fromSymbol && !inference\Symbol::isArray($fromSymbol) && inference\Symbol::symbolIdentifierGroup($fromSymbol) == 'class' && $toSymbol == 'o_object')
      return true;

    if ($fromSymbol && !inference\Symbol::isArray($fromSymbol) && inference\Symbol::symbolIdentifierGroup($fromSymbol) == 'class' && $toSymbol == 't_mixed')
      return true;

    if ($fromSymbol == 't_string' && $toSymbol == 't_float')
      return false;

    if ($fromSymbol == 't_int' && $toSymbol == 't_array')
      return false;

    /** @see http://www.php.net/manual/en/language.oop5.magic.php#object.tostring */
    $magicToStringSymbol = $fromSymbol . '.' . inference\Symbol::identifier('__toString', 'function');
    if (count(inference\SymbolDeclaration::get($magicToStringSymbol)) > 0 && $toSymbol == 't_string')
      return true;

    foreach (inference\SymbolDeclaration::get($fromSymbol) as $declarationNode) {

      if ($declarationNode instanceof Node\Stmt\Class_)
        if ($declarationNode->extends)
          foreach (inference\NameEvaluation::get($declarationNode->extends, 'class') as $childSymbol) {
            inference\Symbol::autoload($childSymbol->phpID);
            if (inference\IsImplicitlyConvertible::get($childSymbol->id, $toSymbol, $strictType))
              return true;
          }

      if ($declarationNode instanceof Node\Stmt\Class_)
        foreach ($declarationNode->implements as $interface_)
          foreach (inference\NameEvaluation::get($interface_, 'class') as $childSymbol) {
            inference\Symbol::autoload($childSymbol->phpID);
            if (inference\IsImplicitlyConvertible::get($childSymbol->id, $toSymbol, $strictType))
              return true;
          }

      if ($declarationNode instanceof Node\Stmt\Interface_)
        foreach ($declarationNode->extends as $interface_)
          foreach (inference\NameEvaluation::get($interface_, 'class') as $childSymbol) {
            inference\Symbol::autoload($childSymbol->phpID);
            if (inference\IsImplicitlyConvertible::get($childSymbol->id, $toSymbol, $strictType))
              return true;
          }

    }

    return false;

  }

}
