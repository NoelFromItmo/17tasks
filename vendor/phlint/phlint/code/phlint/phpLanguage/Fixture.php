<?php

namespace phlint\phpLanguage;

/**
 * This class holds some PHP specifics which would otherwise have to be
 * hard-coded in various places.
 */
class Fixture {

  /**
   * Values that are considered empty by `empty`.
   * @see http://www.php.net/manual/en/function.empty.php
   */
  static $emptyValues = [
    ['type' => '', 'value' => []],
    ['type' => '', 'value' => null],
    ['type' => 't_bool', 'value' => false],
    ['type' => 't_float', 'value' => 0.0],
    ['type' => 't_int', 'value' => 0],
    ['type' => 't_string', 'value' => ''],
    ['type' => 't_string', 'value' => '0'],
  ];

  /**
   * @see http://php.net/manual/en/language.variables.superglobals.php
   */
  static $superglobals = [
    '_COOKIE',
    '_ENV',
    '_FILES',
    '_GET',
    '_POST',
    '_REQUEST',
    '_SERVER',
    '_SESSION',
    'GLOBALS',
  ];

  /**
   * A list keywords in that, when used for type hinting, do no represent a class.
   * @see http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.types
   */
  static $typeDeclarationNonClassKeywords = [
    'array',
    'bool',
    'callable',
    'float',
    'int',
    'string',
    'void',
  ];

  /**
   * A list of build-in constants which represent a language value.
   * http://php.net/manual/en/language.namespaces.faq.php#language.namespaces.faq.builtinconst
   */
  static $valueConstants = [
    'FALSE',
    'INF',
    'NAN',
    'NULL',
    'TRUE',
  ];

  /**
   * A list of type keywords as defined by phpDoc.
   *
   * @see https://docs.phpdoc.org/references/phpdoc/types.html
   */
  static $phpDocTypeKeywords = [
    'array',
    'bool',
    'boolean',
    'callable',
    'callback',
    'double',
    'false',
    'float',
    'int',
    'integer',
    'mixed',
    'null',
    'object',
    'resource',
    'self',
    'string',
    'true',
    'void',
  ];

  /**
   * Reasons for php function not being isolated.
   * This list maintained mainly for documentation purposes.
   * @see /documentation/glossary/isolation.md
   */
  static $nonIsolatedPhpFunctionsCause = [
    'echo' => 'Appends to standard output or output buffer.',
    'get_html_translation_table' => 'Depends on current *locale* setting.',
    'html_entity_decode' => 'Depends on current *default_charset* ini setting.',
    'htmlentities' => 'Depends on current *default_charset* ini setting.',
    'htmlspecialchars' => 'Depends on current *default_charset* ini setting.',
    'localeconv' => 'Depends on current *locale* setting.',
    'md5_file' => 'Directly accesses file-system.',
    'money_format' => 'Depends on current *locale* setting.',
    'nl_langinfo' => 'Depends on current *locale* setting.',
    'parse_str' => 'Pollutes the current scope in case the second argument is not present.',
    'print' => 'Appends to standard output or output buffer.',
    'printf' => 'Appends to standard output or output buffer.',
    'setlocale' => 'Modifies global state.',
    'sha1_file' => 'Directly accesses file-system.',
    'sscanf' => 'Reads from standard input.',
    'vprintf' => 'Appends to standard output or output buffer.',
  ];

  /**
   * List of php functions that are isolated.
   * @see /documentation/glossary/isolation.md
   *
   * @todo Think about how to specialize sort functions to mark instances with
   *   *$sort_flags == SORT_LOCALE_STRING* as non-isolated because they depend on
   *   current *locale* setting.
   *   Function in question: asort, ksort, sort
   */
  static $isolatedPhpFunctions = [
    'array_diff', // Invokes `__toString` on array values if they are objects.
    'array_diff_assoc', // Invokes `__toString` on array values if they are objects.
    'array_diff_uassoc', // Invokes provided callback.
    'array_diff_ukey', // Invokes provided callback.
    'array_filter', // Invokes provided callback.
    'array_flip', // Invokes `__toString` on array values if they are objects.
    'array_intersect_assoc', // Invokes `__toString` on array values if they are objects.
    'array_intersect_uassoc', // Invokes provided callback.
    'array_pop', // Modifies passed in array.
    'array_push', // Modifies passed in array.
    'array_walk', // Invokes provided callback.
    'asort', // Modifies passed in array.
    'count', // Invokes `count` is case object is passed in.
    'fprintf', // Pushes data to provided resource.
    'ksort' => // Modifies passed in array.
    'preg_replace_callback', // Invokes a callback.
    'similar_text', // Modifies argument value.
    # // @todo: Revisit - not really always isolated as it can sort by locale string.
    #'sort', // Modifies passed in array.
    'sprintf', // Invokes `__toString` on array values if they are objects.
    'str_ireplace', // Modifies argument value.
    'str_replace', // Modifies argument value.
    'uasort', // Invokes provided callback.
    'usort', // Invokes provided callback.
    'vfprintf', // Pushes data to provided resource.
    'vsprintf', // Invokes `__toString` on array values if they are objects.
  ];

  /**
   * List of php functions that are pure.
   * @see /documentation/glossary/purity.md
   */
  static $purePhpFunctions = [
    'addcslashes',
    'addslashes',
    'array_change_key_case',
    'array_chunk',
    'array_column',
    'array_combine',
    'array_count_values',
    'array_diff_key',
    'array_fill',
    'array_fill_keys',
    'array_intersect_key',
    'array_keys',
    'array_values',
    'bin2hex',
    'chop',
    'chr',
    'chunk_split',
    'convert_cyr_string',
    'convert_uudecode',
    'convert_uuencode',
    'count_chars',
    'crc32',
    'crypt',
    'explode',
    'hebrev',
    'hebrevc',
    'hex2bin',
    'htmlspecialchars_decode',
    'implode',
    'join',
    'key',
    'lcfirst',
    'levenshtein',
    'ltrim',
    'md5',
    'metaphone',
    'nl2br',
    'number_format',
    'ord',
    'quoted_printable_decode',
    'quoted_printable_encode',
    'quotemeta',
    'rtrim',
    'sha1',
    'soundex',
    'str_getcsv',
    'str_pad',
    'str_repeat',
    'str_rot13',
    'str_shuffle',
    'str_split',
    'str_word_count',
    'strcasecmp',
    'strchr',
    'strcmp',
    'strcoll',
    'strcspn',
    'strip_tags',
    'stripcslashes',
    'stripos',
    'stripslashes',
    'stristr',
    'strlen',
    'strnatcasecmp',
    'strnatcmp',
    'strncasecmp',
    'strncmp',
    'strpbrk',
    'strpos',
    'strrchr',
    'strrev',
    'strripos',
    'strrpos',
    'strspn',
    'strstr',
    'strtok',
    'strtolower',
    'strtoupper',
    'strtr',
    'substr',
    'substr_compare',
    'substr_count',
    'substr_replace',
    'trim',
    'ucfirst',
    'ucwords',
    'wordwrap',
  ];

}
