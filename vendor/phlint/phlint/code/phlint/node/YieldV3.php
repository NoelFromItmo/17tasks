<?php

namespace phlint\node;

/**
 * This is a PHP5 compatible version of Yield_ class.
 * It is called v3 because of the indirectly required compatibility with nikic/php-parser v3.
 * It will be removed when PHP5 compatibility is dropped.
 */
class YieldV3 extends \PhpParser\Node\Expr {

  public $yield = [];

  function __construct ($yield, $attributes = []) {
    parent::__construct($attributes);
    $this->yield = $yield;
  }

  function getType () {
    return 'yield';
  }

  function getSubNodeNames () {
    return [];
  }

}
