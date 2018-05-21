<?php

namespace phlint\node;

class CallArgument extends \PhpParser\NodeAbstract {

  /** @var object */
  public $sourceNode = null;

  /** @var mixed[] */
  public $yield = [];

  public function __construct ($sourceNode, $yield, $attributes = []) {
    parent::__construct($sourceNode->getAttributes() + $attributes);
    $this->sourceNode = $sourceNode;
    $this->yield = $yield;
  }

  function getType () : string {
    return 'callArgument';
  }

  function getSubNodeNames () : array {
    return [];
  }

}
