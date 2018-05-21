<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;

class IsVirtual {

  function getIdentifier () {
    return 'isVirtual';
  }

  static function set ($node, $value) {
    $node->iiData['isVirtual'] = $value;
  }

  static function get ($node) {
    return isset($node->iiData['isVirtual']) && $node->iiData['isVirtual'];
  }

}
