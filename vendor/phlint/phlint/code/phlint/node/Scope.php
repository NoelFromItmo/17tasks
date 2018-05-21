<?php

namespace phlint\node;

class Scope extends \PhpParser\Node\Expr {

  public $expression;

  function __construct ($expression, $attributes = []) {
    parent::__construct($attributes);
    $this->expression = $expression;
  }

  function getType () : string {
    return 'scope';
  }

  function getSubNodeNames () : array {
    return ['expression'];
  }

}
