<?php

namespace phlint\node;

/**
 * This is a PHP5 compatible version of Return_ class.
 * It is called v3 because of the indirectly required compatibility with nikic/php-parser v3.
 * It will be removed when PHP5 compatibility is dropped.
 */
class ReturnV3 extends \PhpParser\NodeAbstract {

  function getSubNodeNames () {
    return [];
  }

}
