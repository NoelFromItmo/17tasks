<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\node as pnode;
use \PhpParser\Node;

class Return_ {

  function getIdentifier () {
    return 'return';
  }

  /**
   * A node indicating what a callable can return.
   *
   * @param object $node
   * @return bool
   */
  static function get ($node) {
    if (!isset($node->iiData['return'])) {
      $returnClass = class_exists(Node\Identifier::class)
        ? pnode\Return_::class
        : pnode\ReturnV3::class;
      $return_ = new $returnClass();
      $return_->iiData['parentNode'] = $node;
      $node->iiData['return'] = $return_;
    }
    return $node->iiData['return'];
  }

}
