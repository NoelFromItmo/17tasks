<?php

namespace phlint;

use \phlint\node as pnode;
use \phlint\NodeConcept;

class Violation {

  public $rule = '';
  public $name = '';
  public $message = '';
  public $node = null;
  public $traces = [];
  public $tracesPrinted = '';
  public $legacyMessageOriginal = '';
  public $legacyMessage = '';
  public $legacyMessageWithTrace = '';
  public $location = '';
  public $locationSymbol = '';

  function __construct ($rule, $name, $message, $legacyMessage, $node, $traces = []) {
    assert($name != '');
    $this->rule = $rule;
    $this->name = $name;
    $this->legacyMessageOriginal = $legacyMessage;
    $this->message = $message;
    $this->node = $node;
    $this->traces = $traces;
    $this->legacyMessage = self::expandMessageMeta($legacyMessage, $this->node, $this->name);
    $this->location = inference\Location::get($node);
    $this->locationSymbol = inference\LocationSymbol::get($node);
  }

  function getName () {

    $name = $this->name;

    if (rtrim(NodeConcept::displayPrint($this->node), ';') != '')
      $name .= ': ' . rtrim(NodeConcept::displayPrint($this->node), ';');

    $name = trim(preg_replace('/[ \t\r\n]+/s', ' ', $name));

    return $name;

  }

  function toString () {
    return self::print_($this);
  }

  function getLegacyMessage () {
    return $this->legacyMessage;
  }

  function getLegacyMessageWithTrace () {
    if (!$this->legacyMessageWithTrace)
      $this->legacyMessageWithTrace = $this->legacyMessage . (count($this->traces) > 0 ? "\n" . $this->getTracesPrinted() : '');
    return $this->legacyMessageWithTrace;
  }

  function getMessage () {
    return $this->legacyMessage;
  }

  function getTracesPrinted () {
    if (!$this->tracesPrinted)
      $this->tracesPrinted = self::printTraces($this);
    return $this->tracesPrinted;
  }

  static function print_ ($message) {
    $printed = self::expandMessageMeta($message['message'], $message['node']);
    foreach (is_object($message) ? $message->traces : $message['traces'] as $trace) {
      $printed .= "\n  " . 'Trace:';
      foreach (array_reverse($trace) as $offset => $traceMessage)
        $printed .= "\n    " . '#' . ($offset + 1) . ': ' . self::expandMessageMeta($traceMessage['message'], $traceMessage['node']);
    }
    return $printed;
  }

  static function printTraces ($message) {
    $printed = '';
    foreach (is_object($message) ? $message->traces : $message['traces'] as $traceOffset => $trace) {
      if ($traceOffset == 3) {
        $printed .= "\n  " . '(' . (count(is_object($message) ? $message->traces : $message['traces']) - $traceOffset) . ' more trace(es) truncated)';
        break;
      }
      $printed .= "\n  " . 'Trace #' . ($traceOffset + 1) . ':';
      foreach (array_reverse($trace) as $offset => $traceMessage)
        $printed .= "\n    " . '#' . ($offset + 1) . ': ' . self::expandMessageMeta($traceMessage['message'], $traceMessage['node']);
    }
    return substr($printed, 1);
  }

  static function expandMessageMeta ($message, $node, $name = '') {

    if (!is_object($node))
      return $message;

    // @todo: Revisit.
    static $knownIssues = null;
    static $basePath = '';
    if ($knownIssues === null) {
      $knownIssues = [];
      $path = realpath($node->getAttribute('path', ''));
      while ($path) {
        if (is_file($path . '/.knownIssues')) {
          $basePath = substr(realpath($path . '/.knownIssues'), 0, -strlen('.knownIssues'));
          break;
        }
        if (is_file($path . '/.knownPhlintIssues')) {
          $basePath = substr(realpath($path . '/.knownPhlintIssues'), 0, -strlen('.knownPhlintIssues'));
          break;
        }
        if (is_file($path . '/.knownPhlintFalsePositives')) {
          $basePath = substr(realpath($path . '/.knownPhlintFalsePositives'), 0, -strlen('.knownPhlintFalsePositives'));
          break;
        }
        if (!(strlen(dirname($path)) < strlen($path)))
          break;
        $path = dirname($path);
      }
      if (is_file($path . '/.knownIssues'))
        $knownIssues = array_merge($knownIssues, array_filter(preg_split('/\r?\n/s', file_get_contents($path . '/.knownIssues'))));
      if (is_file($path . '/.knownPhlintIssues'))
        $knownIssues = array_merge($knownIssues, array_filter(preg_split('/\r?\n/s', file_get_contents($path . '/.knownPhlintIssues'))));
      if (is_file($path . '/.knownPhlintFalsePositives'))
        $knownIssues = array_merge($knownIssues, array_filter(preg_split('/\r?\n/s', file_get_contents($path . '/.knownPhlintFalsePositives'))));
    }

    $testcase = trim(rtrim(preg_replace('/[ \t\r\n]+/s', ' ', $message), '.'));
    if ($node) {
      $issueLocation = inference\LocationSymbol::get($node);
      if ($issueLocation)
        $testcase = $testcase . ' in ' . $issueLocation;
    }

    // @todo: Revisit.
    if ($basePath)
      $testcase = str_replace($basePath, '', $testcase);

    if (in_array($testcase, $knownIssues))
      return;

    if (in_array('Phlint: ' . $testcase, $knownIssues))
      return;

    $name = trim(preg_replace('/[ \t\r\n]+/s', ' ', $name . ': ' . rtrim(NodeConcept::displayPrint($node), ';')));

    $name = trim($name, ': ');

    if (in_array($name . ' in ' . inference\LocationSymbol::get($node), $knownIssues))
      return;

    if (in_array('Phlint: ' . $name . ' in ' . inference\LocationSymbol::get($node), $knownIssues))
      return;

    if (isset($node->getAttributes()['path']) && $node->getAttributes()['path']) {
      $path = $node->getAttributes()['path'];
      if (realpath($path))
        $path = realpath($path);
      return rtrim($message, '.') . ' in *' . $path . ($node->getLine() > 0 ? ':' . $node->getLine() : '') . '*.';
    }

    if ($node->getLine() > 0)
      return rtrim($message, '.') . ' on line ' . $node->getLine() . '.';

    return $message;
  }

}
