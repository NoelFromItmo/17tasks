<?php

namespace phif\patch;

use \phif\NodeFacade;
use \PhpParser\Node;

class ValueConstants {

  static function patch ($blueprint) {

    $valueConstants = [
      'FALSE',
      'INF',
      'NAN',
      'NULL',
      'TRUE',
      'ZEND_DEBUG_BUILD',
      'ZEND_THREAD_SAFE',
    ];

    foreach ($valueConstants as $valueConstant)
      $blueprint[NodeFacade::identifier($valueConstant, 'constant') . '.a_isRemoved'] = true;

  }

}
