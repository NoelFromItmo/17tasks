<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\data;
use \phlint\node as pnode;
use \phlint\IIData;
use \phlint\inference;
use \PhpParser\Node;

class IsCallable {

  function getIdentifier () {
    return 'isCallable';
  }

  /**
   * Is `$node` something that can be called?
   *
   * @param string $node
   * @return bool
   */
  static function get ($node) {

    if ($node instanceof data\Value) {
      foreach ($node->constraints as $constraint)
        if (!inference\IsCallable::get($constraint))
          return false;
      return count($node->constraints) > 0;
    }

    if ($node instanceof Node\Expr\FuncCall && $node->name instanceof Node\Scalar\DNumber)
      return false;

    if ($node instanceof Node\Expr\FuncCall && $node->name instanceof Node\Scalar\LNumber)
      return false;

    if ($node instanceof Node\Expr\Variable)
      foreach (inference\Evaluation::get($node) as $yieldNode)
        if (!inference\IsCallable::get($yieldNode))
          return false;

    if ($node instanceof Node\Scalar\LNumber)
      return false;

    if ($node instanceof Node\Scalar\DNumber)
      return false;

    if ($node instanceof pnode\SymbolAlias && $node->id = 'o_callable')
      return true;

    if (count(inference\DeclarationLink::get($node)) == 0)
      return false;

    return true;

  }

}
