<?php

namespace phlint\inference;

use \phlint\inference;
use \phlint\node as pnode;
use \PhpParser\Node;

class UniqueNode {

  static function get ($nodes) {
    $uniqueNodes = [];
    foreach ($nodes as $node)
      $uniqueNodes[inference\NodeKey::get($node)] = $node;
    return array_values($uniqueNodes);
  }

}
