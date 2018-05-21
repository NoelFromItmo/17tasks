<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\data;
use \phlint\IIData;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class IsConstraint {

  function getIdentifier () {
    return 'isConstraint';
  }

  static function get ($node) {

    if ($node instanceof data\Value) {
      foreach ($node->constraints as $constraint)
        if (self::get($constraint))
          return true;
      return false;
    }

    if ($node instanceof Node\Expr\Array_ && count($node->items) == 0)
      return true;

    if ($node instanceof pnode\SymbolAlias) {
      if ($node->id == 'c_callable')
        return true;
      if ($node->id == 'o_object')
        return true;
      if ($node->id == 'o_undefined')
        return true;
      if ($node->id == 't_dynamic')
        return true;
      if ($node->id == 't_mixed')
        return true;
      return false;
    }

    return false;

  }

}
