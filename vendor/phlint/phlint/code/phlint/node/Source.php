<?php

namespace phlint\node;

use \PhpParser\Node;
use \PhpParser\NodeAbstract;

class Source extends NodeAbstract {

  /** @var Node[] Statements */
  public $stmts;

  /**
   * Constructs a source node.
   *
   * @param array $stmts Statements
   */
  public function __construct ($stmts, $attributes = []) {
    parent::__construct($attributes);
    $this->stmts = $stmts;
  }

  function getType () : string {
    return 'source';
  }

  function getSubNodeNames () : array {
    return ['stmts'];
  }

}
