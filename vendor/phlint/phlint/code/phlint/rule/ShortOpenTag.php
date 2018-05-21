<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/shortOpenTag.md
 */
class ShortOpenTag {

  function getIdentifier () {
    return 'shortOpenTag';
  }

  function getCategories () {
    return [
      'default',
      'legacy',
    ];
  }

  function visitNode ($node) {

    if ($node->getAttribute('hasShortOpenTag', false))
      MetaContext::get(Result::class)->addViolation(
        new Node\Stmt\Nop(['path' => $node->getAttribute('path', ''), 'startLine' => 1]),
        $this->getIdentifier(),
        'Short Open Tag',
        'Using short open tag is not allowed.',
        'Using short open tag is prohibited.'
      );

  }

}
