<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/exitConstruct.md
 */
class ExitConstruct {

  function getIdentifier () {
    return 'exitConstruct';
  }

  function getCategories () {
    return [
      'default',
    ];
  }

  function __invoke ($node) {
    if ($node instanceof Node\Expr\Exit_) {
      MetaContext::get(Result::class)->addViolation(
        $node,
        $this->getIdentifier(),
        'Exit Construct',
        'Using `exit` is not allowed.',
        'Using *exit();* is prohibited.'
      );
    }
  }

}
