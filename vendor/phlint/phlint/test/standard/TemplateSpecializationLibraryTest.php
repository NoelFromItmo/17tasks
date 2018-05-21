<?php

use \phlint\Test as PhlintTest;

class TemplateSpecializationLibraryTest {

  /**
   * Test library template specialization with method call in a condition.
   *
   * @test @internal
   */
  static function unittest_libraryTemplateWithMethodCallInCondition () {
    $linter = PhlintTest::create();

    $linter->addSource('
      class A {
        static function foo ($a) {
          return !empty($a->bar()) && $a->bar() > 0 ? $a->bar() : 0;
        }
        function bar () {
          return ZEND_DEBUG_BUILD ? 0 : 1;
        }
      }
    ', true);

    PhlintTest::assertNoIssues($linter->analyze('
      A::foo(new A());
    '));
  }

}
