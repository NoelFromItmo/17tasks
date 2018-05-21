<?php

namespace phif\patch;

use \phif\NodeFacade;
use \PhpParser\Node;

class Isolated {

  static function patch ($blueprint) {

    static $isolatedPHPFunctions = [
      'array_diff' => 'Invokes `__toString` on array values if they are objects.',
      'array_diff_assoc' => 'Invokes `__toString` on array values if they are objects.',
      'array_diff_uassoc' => 'Invokes provided callback.',
      'array_diff_ukey' => 'Invokes provided callback.',
      'array_filter' => 'Invokes provided callback.',
      'array_flip' => 'Invokes `__toString` on array values if they are objects.',
      'array_intersect_assoc' => 'Invokes `__toString` on array values if they are objects.',
      'array_intersect_uassoc' => 'Invokes provided callback.',
      'array_pop' => 'Modifies passed in array.',
      'array_push' => 'Modifies passed in array.',
      'array_walk' => 'Invokes provided callback.',
      'asort' => 'Modifies passed in array.',
      'count' => 'Invokes `count` is case object is passed in.',
      'fprintf' => 'Pushes data to provided resource.',
      'ksort' => 'Modifies passed in array.',
      'preg_replace_callback' => 'Invokes a callback.',
      'similar_text' => 'Modifies argument value.',
      # // @todo: Revisit - not really always isolated as it can sort by locale string.
      #'sort', // Modifies passed in array.
      'sprintf' => 'Invokes `__toString` on array values if they are objects.',
      'str_ireplace' => 'Modifies argument value.',
      'str_replace' => 'Modifies argument value.',
      'uasort' => 'Invokes provided callback.',
      'usort' => 'Invokes provided callback.',
      'vfprintf' => 'Pushes data to provided resource.',
      'vsprintf' => 'Invokes `__toString` on array values if they are objects.',
    ];

    foreach ($isolatedPHPFunctions as $isolatedPHPFunction => $comment)
      $blueprint[NodeFacade::identifier($isolatedPHPFunction, 'function') . '.a_isolated'] = $comment;

  }

}
