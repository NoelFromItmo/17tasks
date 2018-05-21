<?php

namespace phlint\node;

/**
 * This is a PHP5 compatible version of Scope class.
 * It is called v3 because of the indirectly required compatibility with nikic/php-parser v3.
 * It will be removed when PHP5 compatibility is dropped.
 */
class ScopeV3 extends \PhpParser\Node\Expr {

  public $expression;

  function __construct ($expression, $attributes = []) {
    parent::__construct($attributes);
    $this->expression = $expression;
  }

  function getType () {
    return 'scope';
  }

  function getSubNodeNames () {
    return ['expression'];
  }

}
