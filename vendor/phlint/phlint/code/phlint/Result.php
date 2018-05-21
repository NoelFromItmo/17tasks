<?php

namespace phlint;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\Violation;
use \PhpParser\Node;

class Result {

  public $violations = [];

  protected $issues = [];

  public $libraryViolations = [];

  function addViolation ($node, $rule, $name, $message, $legacyMessage) {

    assert(count(func_get_args()) == 5);

    if ($node && $node->getAttribute('isTrusted', false))
      return;

    if ($node && !inference\IsReachable::get($node))
      return;

    $violation = new Violation($rule, $name, $message, $legacyMessage, $node, inference\Trace::get($node));

    if (!$violation->getLegacyMessage())
      return;

    if (in_array($violation->getLegacyMessage(), $this->issues))
      return;

    if (in_array($violation->getLegacyMessageWithTrace(), $this->issues))
      return;

    if (in_array($violation->getLegacyMessage(), $this->libraryViolations))
      return;

    $hasLibraryRoot = false;

    foreach (inference\Trace::get($node) as $trace) {
      if (count($trace) == 0)
        continue;
      if (!$trace[0]['node']->getAttribute('isLibrary', false))
        continue;
      $hasLibraryRoot = true;
    }

    if ($hasLibraryRoot)
      return;

    $this->issues[] = $violation->getLegacyMessageWithTrace();
    $this->violations[] = $violation;

    $this->extensionInterface['phlint.analysis.issueFound']($violation);

  }

  function toString () {
    return implode("\n", array_map(function ($entry) {
          return $entry;
      }, array_slice(array_unique($this->issues), 0, 100))) .
      "\n" . (count(array_unique($this->issues)) > 100 ? '...' : '') .
      "\n(" . count(array_unique($this->issues)) . ' issue(s) found)';
  }

}
