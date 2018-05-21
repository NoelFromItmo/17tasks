<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \PhpParser\Node;

class IsAssignee {

  function getIdentifier () {
    return 'isAssignee';
  }

  /**
   * Is `$node` an assignee?
   *
   * @param object $node
   * @return bool
   */
  static function get ($node) {
    if (isset($node->iiData['isAssignee']))
      return $node->iiData['isAssignee'];
    return false;
  }

  function beforeNode ($node) {

    if ($node instanceof Node\Expr\Assign)
      self::markIsAssignee($node->var);

    if ($node instanceof Node\Expr\AssignRef)
      self::markIsAssignee($node->var);

    if ($node instanceof Node\Stmt\Global_)
      foreach ($node->vars as $variable)
        self::markIsAssignee($variable);

    if ($node instanceof Node\Stmt\Static_)
      foreach ($node->vars as $variable)
        self::markIsAssignee($variable);

  }

  static function markIsAssignee ($node ) {

    if ($node instanceof Node\Expr\ArrayDimFetch)
      self::markIsAssignee($node->var);

    if ($node instanceof Node\Expr\List_)
      foreach ($node->items as $index => $listItem)
        if ($listItem)
          self::markIsAssignee($listItem->value);

    if ($node instanceof Node\Expr\Variable)
      $node->iiData['isAssignee'] = true;

  }

}
