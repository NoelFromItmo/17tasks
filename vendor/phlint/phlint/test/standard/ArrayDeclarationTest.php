<?php

use \phlint\Test as PhlintTest;

class ArrayDeclarationTest {

  /**
   * Test duplicate array keys.
   *
   * @test @internal
   */
  static function unittest_duplicateArrayKeys () {
    PhlintTest::assertIssues('
      $a = [

        0 => 0,
        "0" => 0,
        0.0 => 0,
        0.9 => 0,
        false => 0,

        1 => 1,
        "1" => 1,
        1.1 => 1,
        1.9 => 1,
        true => 1,

        2 => 2,
        2.2 => 2,
        2.9 => 2,
        "2" => 2,

        100 => 100,
        "100" => 100,

        "00" => "00",
        "01" => "01",
        "02" => "02",
        "0.0" => "0.0",
        "1.0" => "1.0",
        "0.1" => "0.1",

        "a" => "a",
        "a" => "a",

        "b" => "b",
        "b" => "b",

        "" => "",
        null => "",

      ];
    ', [
      '
        Duplicate Array Declaration Key: "0" on line 4
        Array contains multiple entries with the key `0`.
      ',
      '
        Duplicate Array Declaration Key: 0.0 on line 5
        Array contains multiple entries with the key `0`.
      ',
      '
        Duplicate Array Declaration Key: 0.9 on line 6
        Array contains multiple entries with the key `0`.
      ',
      '
        Duplicate Array Declaration Key: false on line 7
        Array contains multiple entries with the key `0`.
      ',
      '
        Duplicate Array Declaration Key: "1" on line 10
        Array contains multiple entries with the key `1`.
      ',
      '
        Duplicate Array Declaration Key: 1.1 on line 11
        Array contains multiple entries with the key `1`.
      ',
      '
        Duplicate Array Declaration Key: 1.9 on line 12
        Array contains multiple entries with the key `1`.
      ',
      '
        Duplicate Array Declaration Key: true on line 13
        Array contains multiple entries with the key `1`.
      ',
      '
        Duplicate Array Declaration Key: 2.2 on line 16
        Array contains multiple entries with the key `2`.
      ',
      '
        Duplicate Array Declaration Key: 2.9 on line 17
        Array contains multiple entries with the key `2`.
      ',
      '
        Duplicate Array Declaration Key: "2" on line 18
        Array contains multiple entries with the key `2`.
      ',
      '
        Duplicate Array Declaration Key: "100" on line 21
        Array contains multiple entries with the key `100`.
      ',
      '
        Duplicate Array Declaration Key: "a" on line 31
        Array contains multiple entries with the key `"a"`.
      ',
      '
        Duplicate Array Declaration Key: "b" on line 34
        Array contains multiple entries with the key `"b"`.
      ',
      '
        Duplicate Array Declaration Key: null on line 37
        Array contains multiple entries with the key `\'\'`.
      ',
    ]);
  }

}
