<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \phlint\phpLanguage;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/phpDoc.md
 */
class PHPDoc {

  function getIdentifier () {
    return 'phpDoc';
  }

  function getCategories () {
    return [
      'default',
    ];
  }

  function getInferences () {
    return [
      'attribute',
      'declarationLink',
      'evaluation',
      'execution',
      'symbol',
      'type',
      'value',
    ];
  }

  function visitNode ($node) {

    if (!inference\IsReachable::get($node))
      return;

    foreach (inference\Attribute::get($node) as $attribute)
      if ($attribute instanceof Node\Expr\New_ &&
          count($attribute->args) >= 1 &&
          (inference\Value::isEqual($attribute->args[0], 'param') || inference\Value::isEqual($attribute->args[0], 'return'))) {

        // @todo: Rethink.
        if ($node instanceof Node\Param && inference\Value::isEqual($attribute->args[0], 'param'))
          continue;

        if (!isset($attribute->args[1]->value->items[0])) {
          #var_dump($attribute->getAttribute('displayPrint', ''));
          #exit;
          MetaContext::get(Result::class)->addViolation(
            $attribute,
            $this->getIdentifier(),
            'PHPDoc',
            'PHPDoc is not valid without a type.',
            'PHPDoc *' . $attribute->getAttribute('displayPrint', '')  . '* is not valid without a type.'
          );
          continue;
        }
        foreach (inference\Value::get($attribute->args[1]->value->items[0]->value) as $value) {
          $type = inference\Value::toString($value)->value;

          $enforceType = function ($type) use (&$enforceType, $attribute) {

            if (inference\Symbol::isArray($type)) {
              $decomposedType = inference\Symbol::decomposeArray($type);
              if ($decomposedType['keySymbol'])
                $enforceType($decomposedType['keySymbol']);
              $enforceType($decomposedType['valueSymbol']);
              return;
            }

            if (inference\Symbol::isMulti($type)) {
              foreach (inference\Symbol::decomposeMulti($type) as $decomposedType)
                $enforceType($decomposedType);
              return;
            }

            if ($type == '$this')
              return;

            if (strpos($type, '$') === 0) {
              MetaContext::get(Result::class)->addViolation(
                $attribute,
                $this->getIdentifier(),
                'PHPDoc',
                'PHPDoc is not valid without a type.',
                'PHPDoc *' . $attribute->getAttribute('displayPrint', '')  . '* is not valid without a type.'
              );
              return;
            }
            if (!preg_match('/\A(\\\\?[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)+\z/', $type)) {
              MetaContext::get(Result::class)->addViolation(
                $attribute,
                $this->getIdentifier(),
                'PHPDoc',
                'PHPDoc ' . MarkdownBuilder::inlineCode($attribute->getAttribute('displayPrint', '')) . ' declared with the type ' . MarkdownBuilder::inlineCode($type) . '.'
                . "\n"
                . 'Type ' . MarkdownBuilder::inlineCode($type) . ' is not valid.',
                'Invalid type *' . $type . '*'
                . ' found in PHPDoc *' . $attribute->getAttribute('displayPrint', '')  . '*.'
              );
              return;
            }
            if (in_array(strtolower($type), phpLanguage\Fixture::$phpDocTypeKeywords)) {
              return;
            }
            foreach (inference\Evaluation::getPHPID($type, $attribute) as $yieldNode)
              if (count(inference\DeclarationLink::get($yieldNode)) == 0)
                MetaContext::get(Result::class)->addViolation(
                  $attribute,
                  $this->getIdentifier(),
                  'PHPDoc',
                  'PHPDoc ' . MarkdownBuilder::inlineCode($attribute->getAttribute('displayPrint', ''))
                  . ' declared with the type ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID($yieldNode)) . '.'
                  . "\n"
                  . 'Type ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID($yieldNode)) . ' is not declared.',
                  'PHPDoc requires undefined type *' . inference\Symbol::phpID($yieldNode) . '*.'
                );

          };

          $enforceType($type);

        }

      }

  }

}
