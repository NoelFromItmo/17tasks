<?php

namespace phlint\report;

use \luka8088\ExtensionCall;
use \luka8088\phops as op;
use \phlint\inference;
use \phlint\NodeConcept;

class JUnit {

  protected $output = null;

  function __construct ($output) {
    $this->output = $output;
  }

  /** @ExtensionCall("phlint.analysis.begin") */
  function beginAnalysis () {
    rewind($this->output);
    fwrite(
      $this->output,
      '<?xml version="1.0" encoding="UTF-8" ?>' . "\n" .
      '  <testsuites>' . "\n" .
      '    <testsuite name="Phlint">' . "\n" .
      '      <testcase name="OK"></testcase>' . "\n"
    );
  }

  /** @ExtensionCall("phlint.analysis.issueFound") */
  function issueFound ($violation) {

    $message = $violation->getName() . ' ' . $violation->location
      . "\n" . $violation->message
      . "\n" . 'Rule documentation: https://gitlab.com/phlint/phlint/blob/master/documentation/rule/' . $violation->rule . '.md';

    fwrite(
      $this->output,
      '      <testcase name="' . self::xmlEncode($violation->getName()
        . ($violation->locationSymbol ? ' in ' . $violation->locationSymbol : '')) . '">' . "\n" .
      '        <failure message="' . self::xmlEncode($violation->getName() . ' ' . $violation->location) . '">' .
                self::xmlEncode(rtrim(
                  $violation->message
                  . ($violation->getTracesPrinted() ? "\n" . $violation->getTracesPrinted() : '')
                  . "\n" . 'Rule documentation: https://gitlab.com/phlint/phlint/blob/master/documentation/rule/' . $violation->rule . '.md'
                , "\n")) .
              '</failure>' . "\n" .
      '      </testcase>' . "\n"
    );

  }

  /** @ExtensionCall("phlint.analysis.end") */
  function endAnalysis () {
    fwrite(
      $this->output,
      '  </testsuite>' . "\n" .
      '</testsuites>' . "\n"
    );
  }

  static function xmlEncode ($string) {
    return htmlspecialchars($string, ENT_QUOTES | ENT_DISALLOWED);
  }

}
