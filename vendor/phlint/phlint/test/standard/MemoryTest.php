<?php

use \phlint\Test as PhlintTest;

class MemoryTest {

  /**
   * Test that simulated symbol propagation through a significant
   * number of scopes takes a reasonable time and memory to complete.
   *
   * @test @internal
   */
  static function unittest_repeatingScopes () {
    PhlintTest::assertNoIssues('
      function foo ($bar) {
        if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
          if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
            if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
              if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
                if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
                  if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
                    if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
                      if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
                        if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1)
                          if (1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1 && 1) {}
      }
    ');
  }

}
