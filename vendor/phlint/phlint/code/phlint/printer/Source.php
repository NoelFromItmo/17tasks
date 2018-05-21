<?php

namespace phlint\printer;

class Source extends \PhpParser\PrettyPrinter\Standard {

  function pSource ($node) {
    $self = $this;
    return implode('', array_map(function ($node) use ($self) {
      return $self->p($node);
    }, $node->stmts));
  }

  function pCallArgument ($node) {
    return $this->p($node->sourceNode);
  }

  function pScope ($node) {
    return $this->p($node->expression);
  }

  function pYield ($node) {
    assert(false);
  }

}
