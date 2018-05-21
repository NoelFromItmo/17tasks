<?php

namespace phlint\inference;

use \luka8088\Attribute as AttributeReader;
use \luka8088\phops\MetaContext;
use \phlint\Code;
use \phlint\IIData;
use \phlint\inference;
use \PhpParser\Node;

/**
 * @see /documentation/attribute/index.md
 */
class Attribute {

  function getIdentifier () {
    return 'attribute';
  }

  function getDependencies () {
    return [
      'nodeRelation',
    ];
  }

  /**
   * Get node analysis-time known attributes.
   *
   * @param object $node Node whose attributes to get.
   * @return object[]
   */
  static function get ($node) {

    if (!isset($node->iiData['attributes']))
      $node->iiData['attributes'] = inference\Attribute::lookup($node);

    return $node->iiData['attributes'];

  }

  /**
   * Lookup the node attributes.
   * Note that this call can be significantly expensive.
   * For general purpose it is better to call `::get` which will
   * call lookup implicitly if needed.
   *
   * @internal
   */
  static function lookup ($node) {

    $attributes = [];

    if ($node instanceof Node\Param) {
      $contextNode = inference\NodeRelation::contextNode($node);
      assert($contextNode, 'Parameter without a context node found!');
      $phpDocAttribute = null;
      $parameterIndex = -1;
      foreach ($contextNode->params as $index => $parameter)
        if ($parameter === $node) {
          $parameterIndex = $index;
          break;
        }
      assert($parameterIndex >= 0);
      $attributeIndex = 0;
      foreach (inference\Attribute::get($contextNode) as $attribute) {
        if (!($attribute instanceof Node\Expr\New_ &&
            count($attribute->args) >= 1 &&
            inference\Value::isEqual($attribute->args[0], 'param')))
          continue;
        if (isset($attribute->args[1]->value->items[1]->value)) {
          if ($attribute->args[1]->value->items[1]->value->value != '$' . (class_exists(Node\Identifier::class) ? $parameter->var->name : $parameter->name)) {
            $attributeIndex += 1;
            continue;
          }
        } else if ($attributeIndex < $parameterIndex) {
          $attributeIndex += 1;
          continue;
        }
        $attribute->iiData['parentNode'] = $contextNode;
        if (isset($attribute->args[1]->value->items[0]->value))
          $attribute->args[1]->value->items[0]->value->iiData['parentNode'] = $attribute;
        $attribute->iiData['scopeNode'] = $contextNode;
        if (isset($attribute->args[1]->value->items[0]->value))
          $attribute->args[1]->value->items[0]->value->iiData['scopeNode'] = $contextNode;
        $attributes[] = $attribute;
        break;
      }
    }

    foreach ($node->getAttribute('comments', []) as $commentNode) {
      $commentLine = is_object($commentNode) ? $commentNode->getLine() : -1;
      $comment = is_object($commentNode) && method_exists($commentNode, 'getText')
        ? $commentNode->getText()
        : $commentNode
      ;
      foreach (AttributeReader::extractAttributes($comment) as $attribute) {

        // @todo: Rewrite
        $attribute['line'] = count(explode("\n", substr($comment, 0, strpos($comment, $attribute['source'])))) - 1;

        $attributeAst = MetaContext::get(Code::class)->parse('<?php ' . $attribute['phpCode'] . ';');

        assert(count($attributeAst) == 1);
        $attributeNode = $attributeAst[0];

        // @todo: Rethink and remove.
        if ($attributeNode instanceof Node\Stmt\Expression)
          $attributeNode = $attributeNode->expr;

        // @todo: Rethink and remove.
        if ($attributeNode instanceof Node\Expr\Ternary)
          $attributeNode = $attributeNode->else;

        $attributeNode->setAttribute('displayPrint', $attribute['source']);
        $attributeNode->setAttribute('sourcePrint', $attribute['source']);

        if ($node->getAttribute('path', ''))
          $attributeNode->setAttribute('path', (string) $node->getAttribute('path', ''));

        $attributeNode->setAttribute(
          'startLine',
          $commentLine > 0 ? $commentLine + $attribute['line'] : -1
        );
        $attributeNode->setAttribute(
          'endLine',
          $commentLine > 0
            ? $attributeNode->getAttribute('startLine') + $attributeNode->getAttribute('endLine') - 1
            : -1
        );

        $attributeNode->iiData['parentNode'] = $node;
        if (isset($attributeNode->args[1]->value->items[0]->value))
          $attributeNode->args[1]->value->items[0]->value->iiData['parentNode'] = $attributeNode;

        $attributeNode->iiData['scopeNode'] = inference\IsScope::get($node)
          ? $node
          : inference\NodeRelation::scopeNode($node)
        ;
        if (isset($attributeNode->args[1]->value->items[0]->value))
          $attributeNode->args[1]->value->items[0]->value->iiData['scopeNode']
            = inference\IsScope::get($node) ? $node : inference\NodeRelation::scopeNode($node);

        $attributes[] = $attributeNode;

      }
    }

    return $attributes;

  }

}
