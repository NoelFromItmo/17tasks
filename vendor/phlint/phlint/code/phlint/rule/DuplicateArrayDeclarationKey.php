<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\NodeConcept;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/duplicateArrayDeclarationKey.md
 */
class DuplicateArrayDeclarationKey {

  function getIdentifier () {
    return 'duplicateArrayDeclarationKey';
  }

  function getCategories () {
    return [
      'default',
      'unexpectedBehavior',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    if ($node instanceof Node\Expr\Array_) {
      $keys = [];
      foreach ($node->items as $item) {
        if (!$item->key)
          continue;
        foreach (inference\Value::get($item->key) as $newKey) {
          $newKey = inference\Evaluation::convertToArrayKeyValue($newKey);
          if (in_array('!' . $newKey->value, $keys))
            MetaContext::get(Result::class)->addViolation(
              $item->key,
              $this->getIdentifier(),
              'Duplicate Array Declaration Key',
              'Array contains multiple entries with the key '
              . MarkdownBuilder::inlineCode(NodeConcept::displayPrint($newKey)) . '.',
              'Duplicate array key *' . NodeConcept::displayPrint($newKey) . '*.'
            );
          $keys[] = '!' . $newKey->value;
        }
      }
    }

  }

}
