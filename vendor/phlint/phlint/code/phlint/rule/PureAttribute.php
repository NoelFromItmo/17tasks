<?php

namespace phlint\rule;

/**
 * @see /documentation/rule/pureAttribute.md
 */
class PureAttribute {

  function getIdentifier () {
    return 'pureAttribute';
  }

  function getCategories () {
    return [
      'attribute',
      'default',
    ];
  }

  function getInferences () {
    return [
      'attribute',
      'purity',
    ];
  }

  function visitNode ($node) {
    // @todo: Implement
  }

}
