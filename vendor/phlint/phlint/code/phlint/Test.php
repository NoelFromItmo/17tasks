<?php

namespace phlint;

use \phlint\Application;
use \phlint\NodeConcept;
use \RecursiveDirectoryIterator;
use \RecursiveIteratorIterator;

class Test {

  /** @internal */
  public static $importStandardLibrary = true;

  static function create () {
    $phlint = Application::create();
    $phlint->importStandardLibrary = self::$importStandardLibrary;
    $phlint->enableRule('all');
    return $phlint;
  }

  static function assertIssues ($code, $expectedIssues = []) {
    $GLOBALS['phlintExperimental'] = true;
    $result = is_string($code) ? self::create()->analyze($code) : $code;
    $minimizeMessage = function ($message) { return trim(str_replace('> ', '>', str_replace(' <', '<', preg_replace('/(?is)[ \t\r\n]+/', ' ', $message)))); };
    $missingIssues = [];
    $unexpectedIssues = [];
    $renderViolation = function ($violation, $legacy = false) {
      // @todo: Remove legacy
      if (!$violation->rule || $legacy)
        return $violation->getLegacyMessageWithTrace();
      return $violation->getName() . ' ' . $violation->location
        . "\n" . $violation->message
        . "\n" . $violation->getTracesPrinted()
      ;
    };
    $updatedMessages = false;
    if ($updatedMessages) {
      $testFilePath = (new \ReflectionClass(debug_backtrace()[1]['class']))->getFileName();
      $testFileSource = file_get_contents($testFilePath);
    }
    foreach ($expectedIssues as $expectedIssue) {
      $expectedIssueFound = false;
      foreach ($result->violations as $violation) {
        if ($updatedMessages)
          if ($violation->rule && $minimizeMessage($renderViolation($violation, true)) == $minimizeMessage($expectedIssue))
            $testFileSource = str_replace($expectedIssue, "\n        " . str_replace("\n", "\n        ", trim($renderViolation($violation))) . "\n      ", $testFileSource);
        if ($minimizeMessage($renderViolation($violation)) == $minimizeMessage($expectedIssue))
          $expectedIssueFound = true;
      }
      if (!$expectedIssueFound)
        $missingIssues[] = $expectedIssue;
    }
    foreach ($result->violations as $violation) {
      $unexpectedIssueFound = true;
      foreach ($expectedIssues as $expectedIssue)
        if ($minimizeMessage($renderViolation($violation)) == $minimizeMessage($expectedIssue))
          $unexpectedIssueFound = false;
      if ($unexpectedIssueFound)
        $unexpectedIssues[] = $renderViolation($violation);
    }
    if ($updatedMessages)
      file_put_contents($testFilePath, $testFileSource);
    assert(
      count($result->violations) == count($expectedIssues) && count($missingIssues) == 0,
      count($result->violations) . " issues found when " . count($expectedIssues) . " expected.\n" .
      (count($missingIssues) > 0 ? 'Expected issue(s) not found: ' . implode("\n", $missingIssues) . "\n" : '') .
      (count($unexpectedIssues) > 0 ? 'Unexpected issues(s) found: ' . implode("\n", $unexpectedIssues) . "\n" : '') .
      "Result:\n" . implode("\n\n", array_map($renderViolation, $result->violations))
      . (is_string($code) ? "\n\nFor code:\n" . $code . "\n" : '')
    );
  }

  static function assertNoIssues ($code) {
    assert(count(func_get_args()) == 1);
    self::assertIssues($code, []);
  }

  static function assertEquals ($actual, $expected) {
    $minimizeMessage = function ($message) { return trim(str_replace('> ', '>', str_replace(' <', '<', preg_replace('/(?is)[ \t\r\n]+/', ' ', $message)))); };
    assert(
      $minimizeMessage($actual) == $minimizeMessage($expected),
      "Actual:\n" . $actual . "\n\nExpected:\n" . $expected . "\n"
    );
  }

  static function mockFilesystem ($path, $files) {

    if (file_exists($path)) {

      $existingFiles = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
      );

      foreach ($existingFiles as $existingFile) {
        if ($existingFile->isDir())
          rmdir($existingFile->getRealPath());
        else
          unlink($existingFile->getRealPath());
      }

    }

    foreach ($files as $file => $contents) {
      if (!file_exists($path . '/' . dirname($file)))
        mkdir($path . '/' . dirname($file), 0777, true);
      file_put_contents($path . '/' . $file, $contents);
    }

  }

}
