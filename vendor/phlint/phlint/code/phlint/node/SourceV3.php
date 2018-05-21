<?php

namespace phlint\node;

use \PhpParser\Node;
use \PhpParser\NodeAbstract;

/**
 * This is a PHP5 compatible version of Source class.
 * It is called v3 because of the indirectly required compatibility with nikic/php-parser v3.
 * It will be removed when PHP5 compatibility is dropped.
 */
class SourceV3 extends NodeAbstract {

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

  function getType () {
    return 'source';
  }

  function getSubNodeNames () {
    return ['stmts'];
  }

}
