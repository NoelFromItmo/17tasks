<?php

namespace phlint\inference;

class Trusted {

  function getIdentifier () {
    return 'trusted';
  }

  protected $stack = 0;

  protected function resetState () {
    $this->stack = 0;
  }

  function beforeTraverse ($nodes) {
      $this->resetState();
  }

  function beforeNode ($node) {
    if (Trusted::isTrustedNode($node))
      $this->stack += 1;
    if ($this->stack > 0)
      $node->setAttribute('isTrusted', true);
  }

  function afterNode ($node) {
    if (Trusted::isTrustedNode($node))
      $this->stack -= 1;
  }

  static function isTrustedNode ($node) {

    $comments = implode(' ', array_map(function ($comment) {
      if ($comment instanceof Comment) {
        return $comment->getText();
      }
      return $comment;
    }, $node->getAttribute('comments', [])));

    if (preg_match('/(?<![a-z0-9_\-])@trusted(?![a-z0-9_\-])/', $comments))
      return true;

    return false;

  }

}
