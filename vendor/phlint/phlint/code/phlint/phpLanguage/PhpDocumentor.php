<?php

namespace phlint\phpLanguage;

use \PhpParser\Node;

/**
 * Holds some PHP Documentor specifics which would otherwise have to be
 * hard-coded in various places.
 *
 * @see https://www.phpdoc.org/
 */
class PhpDocumentor {

  /**
   * @param string $phpDocType Any PHP Documentor type.
   * @param string $expression A PHP expression that is being constrained.
   * @return Node A PHP expression that constrains the $expression to $phpDocType.
   *
   * @see https://www.phpdoc.org/docs/latest/references/phpdoc/types.html
   */
  static function expressionConstraint ($phpDocType, $expression) {

    if ($phpDocType == 'object')
      return 'is_object(' . $expression . ')';

    // @todo: Fix template specialization related performance issues and re-enable.
    return '';

    return 'is_a(' . $expression . ', ' . var_export($phpDocType, true) . ', true)';

  }

}
