<?php

namespace phlint\report;

use \luka8088\ExtensionCall;
use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\Output;
use \phlint\Violation;
use \PhpParser\Node;

class Console {

  /** @ExtensionCall("phlint.analysis.issueFound") */
  function issueFound ($violation) {

    if (!$violation->rule) {
      MetaContext::get(Output::class)->__invoke($violation->getLegacyMessageWithTrace() . "\n");
      return;
    }

    MetaContext::get(Output::class)->__invoke(self::processMarkdown(
      ''
      . "\n  \x1b[91m✖\x1b[0m \x1b[37;1m" . $violation->getName() . ' ' . $violation->location . "\x1b[0m"
      . "\n    " . str_replace("\n", "\n    ", $violation->message)
      . ($violation->getTracesPrinted() ? "\n    " . str_replace("\n", "\n    ", $violation->getTracesPrinted()) : '')
      . "\n    " . 'Rule documentation: https://gitlab.com/phlint/phlint/blob/master/documentation/rule/' . $violation->rule . '.md'
      . "\n"
    ));

  }

  static function processMarkdown ($source) {
    $result = $source;
    $result = preg_replace('/``(.*?)``/', '\x1b[96m\1\x1b[0m', $result);
    $result = preg_replace('/`(.*?)`/', "\x1b[96m\\1\x1b[0m", $result);
    $result = preg_replace('/(?i)((http|https)\:\/\/[^ \t\r\n\(\)\<\>\*\;]+)/', "\x1b[93m\\1\x1b[0m", $result);
    return $result;
  }

}
