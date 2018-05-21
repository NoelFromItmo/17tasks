<?php

namespace phlint\inference;

use \luka8088\phops as op;
use \phlint\IIData;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\NodeTraverser;
use \phlint\phpLanguage;
use \PhpParser\Comment;
use \PhpParser\Node;

/**
 * @see /documentation/constraint/index.md
 */
class Constraint {

  function getIdentifier () {
    return 'constraint';
  }

  static function get ($node) {
    if (!isset($node->iiData['constraints']))
      $node->iiData['constraints'] = inference\Constraint::lookup($node);
    return $node->iiData['constraints'];
  }

  static function lookup ($node) {

    $constraints = [];

    foreach (inference\Constraint::processConstraints($node) as $constraint)
      $constraints[] = $constraint;

    foreach ($node->params as $parameter)
      foreach (inference\Constraint::processConstraints($parameter) as $constraint)
        $constraints[] = $constraint;

    if ($node->returnType instanceof Node)
      foreach (inference\Constraint::processConstraints($node->returnType) as $constraint)
        $constraints[] = $constraint;

    return $constraints;

  }

  static function processConstraints ($node) {

    $constraints = [];

    foreach (inference\Attribute::get($node) as $attribute) {

      if ($attribute instanceof Node\Expr\New_ &&
          count($attribute->args) >= 2 &&
          inference\Value::isEqual($attribute->args[0], 'constraint')) {

        $constraint = $attribute->args[1]->value->items[0]->value;

        $constraint->setAttribute('isGenerated', true);
        $constraint->setAttribute('isConstraint', true);

        $constraint->setAttribute('constructTypeName', 'constraint');

        $constraint->setAttribute('displayPrint', $attribute->getAttribute('displayPrint', ''));
        $constraint->setAttribute('startLine', $attribute->getAttribute('startLine', -1));
        $constraint->setAttribute('endLine', $attribute->getAttribute('endLine', -1));

        $constraints[] = $constraint;

      }

    }

    return $constraints;

  }

}
