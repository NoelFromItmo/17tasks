<?php

namespace phlint;

use \ArrayAccess;

/**
 * Intermediately inferred data.
 *
 * @see /documentation/glossary/intermediatelyInferredData.md
 */
class IIData implements ArrayAccess {

  protected $data = [];

  function offsetExists ($offset) {
    return isset($this->data[$offset]);
  }

  function offsetGet ($offset) {
    return $this->data[$offset];
  }

  function offsetSet ($offset, $value) {
    $this->data[$offset] = $value;
  }

  function offsetUnset ($offset) {
    unset($this->data[$offset]);
  }

  function __debugInfo () {
    return [];
  }

}
