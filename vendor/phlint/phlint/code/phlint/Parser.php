<?php

namespace phlint;

use \phlint\IIData;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \PhpParser\Node;
use \PhpParser\ParserFactory;

class Parser {

  static function parse ($source, $path = '') {

    static $parser = null;

    if (!$parser) {
      $parserFactory = new ParserFactory();
      $parser = $parserFactory->create(ParserFactory::PREFER_PHP7);
    }

    $ast = $parser->parse(preg_replace('/(?is)\A\<\?(?=[ \t\r\n])/', '<?php', $source));

    if (preg_match('/(?is)\A\<\?(?=[ \t\r\n])/', $source) > 0 && count($ast) > 0)
      $ast[0]->setAttribute('hasShortOpenTag', true);

    return NodeTraverser::traverse($ast, [[Parser::class, 'expandVirtualAST']]);

  }

  static function expandVirtualAST ($node) {

    $scopeClass = class_exists(Node\Identifier::class)
      ? pnode\Scope::class
      : pnode\ScopeV3::class;

    if (!isset($node->iiData))
      $node->iiData = new IIData();

    /**
     * "&&" condition forms a new scope on the right side as its execution is
     * influenced by the left side.
     *
     * Consider the expression: `$bar = isset($foo) && $foo;`
     *
     * This expression will never produce a "PHP Notice: Undefined variable"
     * and thus a conditional guarantee that `$foo` is defined can be applied
     * to the right side.
     *
     * Also the expression: `isset($foo) && $foo();`
     * Is functionally equal to `if (isset($foo) { $foo(); }`
     *
     * Considering these behaviors it made most sense to make the
     * right side form a new scope.
     */
    if ($node instanceof Node\Expr\BinaryOp\BooleanAnd)
      if (!($node->right instanceof $scopeClass))
        $node->right = new $scopeClass($node->right);

    /**
     * A ternary operator forms two new scopes the same way if-else does
     * but it does not have special nodes for if and else.
     */
    if ($node instanceof Node\Expr\Ternary) {
      if ($node->if && !($node->if instanceof $scopeClass))
        $node->if = new $scopeClass($node->if);
      if (!($node->else instanceof $scopeClass))
        $node->else = new $scopeClass($node->else);
    }

    if ($node instanceof Node\Stmt\Switch_)
      if (!isset($node->iiData['expandedVirtualAST'])) {
        $node->iiData['expandedVirtualAST'] = true;
        $hasDefault = count($node->cases) > 0 && !end($node->cases)->cond;
        for ($index = count($node->cases) - 2; $index >= 0; $index -= 1) {
          if (!$node->cases[$index]->cond)
            $hasDefault = true;
          if (count($node->cases[$index]->stmts) > 0
              && NodeConcept::isExecutionBarrier(end($node->cases[$index]->stmts)))
            continue;
          foreach ($node->cases[$index + 1]->stmts as $statement)
            $node->cases[$index]->stmts[] = NodeConcept::deepClone($statement);
        }
        if (!$hasDefault)
          $node->cases[] = new Node\Stmt\Case_(null);
      }

  }

}
