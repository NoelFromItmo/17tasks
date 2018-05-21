<?php

namespace phif\patch;

use \phif\NodeFacade;
use \phif\Parser;
use \PhpParser\Node;

class Logic {

  static function patch ($blueprint) {

    $blueprint['c_dateinterval.f_format.s_default'] = '
      if (substr($format, 0, 2) == "%%")
        return "%" . self::format(substr($format, 2));
      if (substr($format, 0, 2) == "%d")
        return rand(0, 31) . self::format(substr($format, 2));
      if (substr($format, 0, 2) == "%m")
        return rand(0, 12) . self::format(substr($format, 2));
      if (strlen($format) == 0)
        return $format;
      if (strlen($format) == 1)
        return $format;
      return substr($format, 0, 1) . self::format(substr($format, 1));
    ';

    if (false)
    $blueprint['f_date.s_default'] = '
      #if (substr($format, 0, 1) == "a")
      #  return ["am", "pm"][rand(0, 1)] . date(substr($format, 1));
      #if (substr($format, 0, 1) == "A")
      #  return ["AM", "PM"][rand(0, 1)] . date(substr($format, 1));
      #if (substr($format, 0, 1) == "B")
      #  return rand(0, 9) . rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "c")
      #  return date("Y-m-d\TH:i:sP") . date(substr($format, 1));
      #if (substr($format, 0, 1) == "D")
      #  return ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"][rand(0, 6)] . date(substr($format, 1));
      #if (substr($format, 0, 1) == "d")
      #  return rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "e")
      #  return timezone_identifiers_list()[array_rand(timezone_identifiers_list())] . date(substr($format, 1));
      #if (substr($format, 0, 1) == "F")
      #  return [
      #    "January", "February", "March", "April", "May", "June",
      #    "July", "August", "September", "October", "November", "December"
      #  ][rand(0, 11)] . date(substr($format, 1));
      #if (substr($format, 0, 1) == "G")
      #  return rand(0, 23) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "g")
      #  return rand(1, 12) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "H")
      #  return str_pad(rand(0, 23), 2, 0, STR_PAD_LEFT) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "h")
      #  return str_pad(rand(1, 12), 2, 0, STR_PAD_LEFT) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "I")
      #  return rand(0, 1) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "i")
      #  return str_pad(rand(0, 59), 2, 0, STR_PAD_LEFT) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "j")
      #  return rand(1, 31) . date(substr($format, 1));
      if (substr($format, 0, 1) == "l")
        return ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"][rand(0, 6)]
          . date(substr($format, 1));
      #if (substr($format, 0, 1) == "L")
      #  return rand(0, 1) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "M")
      #  return ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"][rand(0, 11)]
      #    . date(substr($format, 1));
      #if (substr($format, 0, 1) == "m")
      #  return rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      if (substr($format, 0, 1) == "n")
        return rand(1, 12) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "N")
      #  return rand(1, 7) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "O")
      #  return "+0" . rand(0, 9) . "00" . date(substr($format, 1));
      #if (substr($format, 0, 1) == "o")
      #  return rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "P")
      #  return "+0" . rand(0, 9) . ":00" . date(substr($format, 1));
      #if (substr($format, 0, 1) == "r")
      #  return date("D, j M Y H:i:s O") . date(substr($format, 1));
      #if (substr($format, 0, 1) == "S")
      #  return ["st", "nd", "rd", "th"][rand(0, 3)] . date(substr($format, 1));
      #if (substr($format, 0, 1) == "s")
      #  return str_pad(rand(0, 59), 2, 0, STR_PAD_LEFT) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "T")
      #  return strtoupper(array_keys(timezone_abbreviations_list())
      #    [array_rand(array_keys(timezone_abbreviations_list()))]) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "t")
      #  return rand(28, 31) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "U")
      #  return rand() . date(substr($format, 1));
      #if (substr($format, 0, 1) == "u")
      #  return rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "v")
      #  return rand(0, 9) . rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "w")
      #  return rand(0, 6) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "W")
      #  return rand(1, 53) . date(substr($format, 1));
      if (substr($format, 0, 1) == "Y")
        return rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "y")
      #  return rand(0, 9) . rand(0, 9) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "Z")
      #  return rand(-43200, 50400) . date(substr($format, 1));
      #if (substr($format, 0, 1) == "z")
      #  return rand(0, 365) . date(substr($format, 1));
      if (strlen($format) == 0)
        return $format;
      if (strlen($format) == 1)
        return $format;
      return substr($format, 0, 1) . date(substr($format, 1));
    ';

    // @todo: Implement and enable.
    #$blueprint['f_implode.s_default'] = Parser::parse('<?php
    #  assert((is_string($glue) && is_array($pieces)) || (is_array($glue) && is_string($pieces)));
    #')[0];

    static $usingSortLocaleConstant = [
      'f_array_multisort',
      'f_arsort',
      'f_asort',
      'f_krsort',
      'f_ksort',
      'f_rsort',
      'f_sort',
    ];

    foreach ($usingSortLocaleConstant as $symbol) {
      $blueprint[$symbol . '.s_sortLocaleIsolationBreach'] = Parser::parse('<?php
        if ($sort_flags === SORT_LOCALE_STRING) {
          /** @__isolationBreach(\'Depends on the current locale.\') */
        }
      ')[0];
    }

    $blueprint['f_array_diff.a_isolated'] = 'Invokes `__toString` on array values if they are objects.';

    $blueprint['f_setlocale.s_isolationBreach'] = Parser::parse('<?php
      /** @__isolationBreach(\'Modifies global state.\') */
    ')[0];

  }

}
