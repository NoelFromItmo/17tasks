<?php

namespace phlint\node;

/**
 * A virtual node used to yield something that may not necessarily
 * representable in the AST.
 */
class Yield_ extends \PhpParser\Node\Expr {

  public $yield = [];

  function __construct ($yield, $attributes = []) {
    parent::__construct($attributes);
    $this->yield = $yield;
  }

  function getType () : string {
    return 'yield';
  }

  function getSubNodeNames () : array {
    return [];
  }

}
