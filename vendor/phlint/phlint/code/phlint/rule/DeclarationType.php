<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\MarkdownBuilder;
use \phlint\NodeConcept;
use \phlint\phpLanguage;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/declarationType.md
 */
class DeclarationType {

  function getIdentifier () {
    return 'declarationType';
  }

  function getCategories () {
    return [
      'default',
    ];
  }

  function getInferences () {
    return [
      'declarationLink',
      'symbol',
      'templateSpecialization',
      'type',
    ];
  }

  function visitNode ($node) {

    if ($node instanceof Node\Stmt\Catch_)
      foreach ($node->types as $type)
        $this->checkType($type, $node);

    if ($node instanceof Node\Stmt\Function_) {
      $this->checkType($node->returnType, $node);
      foreach ($node->params as $parameter)
        $this->checkType($parameter->type, $node);
    }

  }

  function checkType ($type, $node) {

    if ($type instanceof Node\Identifier) {
      $this->checkType($type->name, $node);
      return;
    }

    if ($type instanceof Node\NullableType) {
      $this->checkType($type->type, $node);
      return;
    }

    if (is_string($type) && !in_array(strtolower($type), phpLanguage\Fixture::$typeDeclarationNonClassKeywords))
      MetaContext::get(Result::class)->addViolation(
        $node,
        $this->getIdentifier(),
        'Declaration Type',
        'Type ' . MarkdownBuilder::inlineCode($type) . ' is invalid.',
        'Invalid type *' . $type . '* in declaration.'
      );

    if (is_object($type)) {
      if (count(inference\DeclarationLink::get($type)) == 0)
        MetaContext::get(Result::class)->addViolation(
          $node,
          $this->getIdentifier(),
          'Declaration Type',
          'Type ' . MarkdownBuilder::inlineCode(inference\Symbol::phpID(inference\NameEvaluation::get($type, 'auto')))
          . ' is undefined.',
          'Type declaration requires undefined *'
          . inference\Symbol::phpID(inference\NameEvaluation::get($type, 'auto')) . '*.'
        );
    }

  }

}
