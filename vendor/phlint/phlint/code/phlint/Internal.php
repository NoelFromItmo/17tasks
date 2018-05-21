<?php

namespace phlint;

use \phlint\node as pnode;
use \phlint\NodeTraverser;
use \phlint\Parser;
use \PhpParser\Node;

/**
 * This class handles PHP internal and standard library information that
 * is not available out of the box or needs to be available in a
 * specific format.
 */
class Internal {

  static function importDefinitions ($id) {

    static $cache = [];

    if (!isset($cache[$id])) {

      $sourceClass = class_exists(Node\Identifier::class)
        ? pnode\Source::class
        : pnode\SourceV3::class;

      $cache[$id] = [new $sourceClass(Parser::parse(\Phif::importDeclarations($id)))];

      NodeTraverser::traverse($cache[$id], [function ($node) {
        #$node->setAttribute('isSourceAvailable', false);
        $node->setAttribute('inAnalysisScope', false);
        $node->setAttribute('startLine', 0);
        $node->setAttribute('endLine', 0);
        foreach ($node->getAttribute('comments', []) as $comment)
          if (is_object($comment))
            $comment->__construct($comment->getText());
      }]);

    }

    // @todo: Clone.
    return $cache[$id];

  }

}
