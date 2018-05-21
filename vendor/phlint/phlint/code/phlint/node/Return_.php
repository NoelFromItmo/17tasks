<?php

namespace phlint\node;

/**
 * A fake return node which represents a sum of everything that
 * can be returned from a callable.
 *
 * In the AST there is a `returnType` but it is optional and it
 * represents only return types introduces in PHP7 - this node
 * is to include everything else.
 */
class Return_ extends \PhpParser\NodeAbstract {

  function getSubNodeNames () : array {
    return [];
  }

  function getType () : string {
    return '';
  }

}
