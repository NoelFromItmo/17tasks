<?php

namespace phlint\node;

/**
 * This is a PHP5 compatible version of CallArgument class.
 * It is called v3 because of the indirectly required compatibility with nikic/php-parser v3.
 * It will be removed when PHP5 compatibility is dropped.
 */
class CallArgumentV3 extends \PhpParser\NodeAbstract {

  /** @var object */
  public $sourceNode = null;

  /** @var mixed[] */
  public $yield = [];

  public function __construct ($sourceNode, $yield, $attributes = []) {
    parent::__construct($sourceNode->getAttributes() + $attributes);
    $this->sourceNode = $sourceNode;
    $this->yield = $yield;
  }

  function getType () {
    return 'callArgument';
  }

  function getSubNodeNames () {
    return [];
  }

}
