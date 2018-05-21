<?php

const MB_CASE_LOWER = 1;
const MB_CASE_TITLE = 2;
const MB_CASE_UPPER = 0;
const MB_OVERLOAD_MAIL = 1;
const MB_OVERLOAD_REGEX = 4;
const MB_OVERLOAD_STRING = 2;

/**
 * @param string $var
 * @param string $encoding
 * @return bool
 */
function mb_check_encoding(string $var = null, string $encoding = '') : bool {}

/**
 * @param int $cp
 * @param string $encoding
 * @return string
 */
function mb_chr(int $cp, string $encoding = '') : string {}

/**
 * @param string $str
 * @param int $mode
 * @param string $encoding
 * @return string
 */
function mb_convert_case(string $str, int $mode, string $encoding = '') : string {}

/**
 * @param string $str
 * @param string $to_encoding
 * @param mixed $from_encoding
 * @return string
 */
function mb_convert_encoding(string $str, string $to_encoding, $from_encoding = null) : string {}

/**
 * @param string $str
 * @param string $option
 * @param string $encoding
 * @return string
 */
function mb_convert_kana(string $str, string $option = "KV", string $encoding = '') : string {}

/**
 * @param string $to_encoding
 * @param mixed $from_encoding
 * @param mixed $vars
 * @param mixed $__variadic
 * @return string
 */
function mb_convert_variables(string $to_encoding, $from_encoding, &$vars, &...$__variadic) : string {}

/**
 * @param string $str
 * @return string
 */
function mb_decode_mimeheader(string $str) : string {}

/**
 * @param string $str
 * @param array $convmap
 * @param string $encoding
 * @param bool $is_hex
 * @return string
 */
function mb_decode_numericentity(string $str, array $convmap, string $encoding = '', bool $is_hex = false) : string {}

/**
 * @param string $str
 * @param mixed $encoding_list
 * @param bool $strict
 * @return string
 */
function mb_detect_encoding(string $str, $encoding_list = null, bool $strict = false) : string {}

/**
 * @param mixed $encoding_list
 * @return mixed
 */
function mb_detect_order($encoding_list = null) {}

/**
 * @param string $str
 * @param string $charset
 * @param string $transfer_encoding
 * @param string $linefeed
 * @param int $indent
 * @return string
 */
function mb_encode_mimeheader(string $str, string $charset = '', string $transfer_encoding = "B", string $linefeed = "\r\n", int $indent = 0) : string {}

/**
 * @param string $str
 * @param array $convmap
 * @param string $encoding
 * @param bool $is_hex
 * @return string
 */
function mb_encode_numericentity(string $str, array $convmap, string $encoding = '', bool $is_hex = false) : string {}

/**
 * @param string $encoding
 * @return array
 */
function mb_encoding_aliases(string $encoding) : array {}

/**
 * @param string $pattern
 * @param string $string
 * @param array $regs
 * @return int
 */
function mb_ereg(string $pattern, string $string, array &$regs = []) : int {}

/**
 * @param string $pattern
 * @param string $string
 * @param string $option
 * @return bool
 */
function mb_ereg_match(string $pattern, string $string, string $option = "msr") : bool {}

/**
 * @param string $pattern
 * @param string $replacement
 * @param string $string
 * @param string $option
 * @return string
 */
function mb_ereg_replace(string $pattern, string $replacement, string $string, string $option = "msr") : string {}

/**
 * @param string $pattern
 * @param callable $callback
 * @param string $string
 * @param string $option
 * @return string
 */
function mb_ereg_replace_callback(string $pattern, callable $callback, string $string, string $option = "msr") : string {}

/**
 * @param string $pattern
 * @param string $option
 * @return bool
 */
function mb_ereg_search(string $pattern = '', string $option = "ms") : bool {}

/**
 * @return int
 */
function mb_ereg_search_getpos() : int {}

/**
 * @return array
 */
function mb_ereg_search_getregs() : array {}

/**
 * @param string $string
 * @param string $pattern
 * @param string $option
 * @return bool
 */
function mb_ereg_search_init(string $string, string $pattern = '', string $option = "msr") : bool {}

/**
 * @param string $pattern
 * @param string $option
 * @return array
 */
function mb_ereg_search_pos(string $pattern = '', string $option = "ms") : array {}

/**
 * @param string $pattern
 * @param string $option
 * @return array
 */
function mb_ereg_search_regs(string $pattern = '', string $option = "ms") : array {}

/**
 * @param int $position
 * @return bool
 */
function mb_ereg_search_setpos(int $position) : bool {}

/**
 * @param string $pattern
 * @param string $string
 * @param array $regs
 * @return int
 */
function mb_eregi(string $pattern, string $string, array &$regs = []) : int {}

/**
 * @param string $pattern
 * @param string $replace
 * @param string $string
 * @param string $option
 * @return string
 */
function mb_eregi_replace(string $pattern, string $replace, string $string, string $option = "msri") : string {}

/**
 * @param string $type
 * @return mixed
 */
function mb_get_info(string $type = "all") {}

/**
 * @param string $type
 * @return mixed
 */
function mb_http_input(string $type = "") {}

/**
 * @param string $encoding
 * @return mixed
 */
function mb_http_output(string $encoding = '') {}

/**
 * @param string $encoding
 * @return mixed
 */
function mb_internal_encoding(string $encoding = '') {}

/**
 * @param string $language
 * @return mixed
 */
function mb_language(string $language = '') {}

/**
 * @return array
 */
function mb_list_encodings() : array {}

/**
 * @param string $str
 * @param string $encoding
 * @return int
 */
function mb_ord(string $str, string $encoding = '') : int {}

/**
 * @param string $contents
 * @param int $status
 * @return string
 */
function mb_output_handler(string $contents, int $status) : string {}

/**
 * @param string $encoded_string
 * @param array $result
 * @return bool
 */
function mb_parse_str(string $encoded_string, array &$result = []) : bool {}

/**
 * @param string $encoding
 * @return string
 */
function mb_preferred_mime_name(string $encoding) : string {}

/**
 * @param string $encoding
 * @return mixed
 */
function mb_regex_encoding(string $encoding = '') {}

/**
 * @param string $options
 * @return string
 */
function mb_regex_set_options(string $options = '') : string {}

/**
 * @param string $str
 * @param string $encoding
 * @return string
 */
function mb_scrub(string $str, string $encoding = '') : string {}

/**
 * @param string $to
 * @param string $subject
 * @param string $message
 * @param mixed $additional_headers
 * @param string $additional_parameter
 * @return bool
 */
function mb_send_mail(string $to, string $subject, string $message, $additional_headers = null, string $additional_parameter = null) : bool {}

/**
 * @param string $pattern
 * @param string $string
 * @param int $limit
 * @return array
 */
function mb_split(string $pattern, string $string, int $limit = -1) : array {}

/**
 * @param string $str
 * @param int $start
 * @param int $length
 * @param string $encoding
 * @return string
 */
function mb_strcut(string $str, int $start, int $length = null, string $encoding = '') : string {}

/**
 * @param string $str
 * @param int $start
 * @param int $width
 * @param string $trimmarker
 * @param string $encoding
 * @return string
 */
function mb_strimwidth(string $str, int $start, int $width, string $trimmarker = "", string $encoding = '') : string {}

/**
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @param string $encoding
 * @return int
 */
function mb_stripos(string $haystack, string $needle, int $offset = 0, string $encoding = '') : int {}

/**
 * @param string $haystack
 * @param string $needle
 * @param bool $before_needle
 * @param string $encoding
 * @return string
 */
function mb_stristr(string $haystack, string $needle, bool $before_needle = false, string $encoding = '') : string {}

/**
 * @param string $str
 * @param string $encoding
 * @return int
 */
function mb_strlen(string $str, string $encoding = '') : int {}

/**
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @param string $encoding
 * @return int
 */
function mb_strpos(string $haystack, string $needle, int $offset = 0, string $encoding = '') : int {}

/**
 * @param string $haystack
 * @param string $needle
 * @param bool $part
 * @param string $encoding
 * @return string
 */
function mb_strrchr(string $haystack, string $needle, bool $part = false, string $encoding = '') : string {}

/**
 * @param string $haystack
 * @param string $needle
 * @param bool $part
 * @param string $encoding
 * @return string
 */
function mb_strrichr(string $haystack, string $needle, bool $part = false, string $encoding = '') : string {}

/**
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @param string $encoding
 * @return int
 */
function mb_strripos(string $haystack, string $needle, int $offset = 0, string $encoding = '') : int {}

/**
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @param string $encoding
 * @return int
 */
function mb_strrpos(string $haystack, string $needle, int $offset = 0, string $encoding = '') : int {}

/**
 * @param string $haystack
 * @param string $needle
 * @param bool $before_needle
 * @param string $encoding
 * @return string
 */
function mb_strstr(string $haystack, string $needle, bool $before_needle = false, string $encoding = '') : string {}

/**
 * @param string $str
 * @param string $encoding
 * @return string
 */
function mb_strtolower(string $str, string $encoding = '') : string {}

/**
 * @param string $str
 * @param string $encoding
 * @return string
 */
function mb_strtoupper(string $str, string $encoding = '') : string {}

/**
 * @param string $str
 * @param string $encoding
 * @return int
 */
function mb_strwidth(string $str, string $encoding = '') : int {}

/**
 * @param mixed $substchar
 * @return mixed
 */
function mb_substitute_character($substchar = null) {}

/**
 * @param string $str
 * @param int $start
 * @param int $length
 * @param string $encoding
 * @return string
 */
function mb_substr(string $str, int $start, int $length = null, string $encoding = '') : string {}

/**
 * @param string $haystack
 * @param string $needle
 * @param string $encoding
 * @return int
 */
function mb_substr_count(string $haystack, string $needle, string $encoding = '') : int {}

/**
 * @param mixed $pattern
 * @param mixed $string
 * @param mixed $registers
 * @return void
 */
function mbereg($pattern, $string, $registers) {}

/**
 * @param mixed $pattern
 * @param mixed $string
 * @param mixed $option
 * @return void
 */
function mbereg_match($pattern, $string, $option) {}

/**
 * @param mixed $pattern
 * @param mixed $replacement
 * @param mixed $string
 * @param mixed $option
 * @return void
 */
function mbereg_replace($pattern, $replacement, $string, $option) {}

/**
 * @param mixed $pattern
 * @param mixed $option
 * @return void
 */
function mbereg_search($pattern, $option) {}

/**
 * @return void
 */
function mbereg_search_getpos() {}

/**
 * @return void
 */
function mbereg_search_getregs() {}

/**
 * @param mixed $string
 * @param mixed $pattern
 * @param mixed $option
 * @return void
 */
function mbereg_search_init($string, $pattern, $option) {}

/**
 * @param mixed $pattern
 * @param mixed $option
 * @return void
 */
function mbereg_search_pos($pattern, $option) {}

/**
 * @param mixed $pattern
 * @param mixed $option
 * @return void
 */
function mbereg_search_regs($pattern, $option) {}

/**
 * @param mixed $position
 * @return void
 */
function mbereg_search_setpos($position) {}

/**
 * @param mixed $pattern
 * @param mixed $string
 * @param mixed $registers
 * @return void
 */
function mberegi($pattern, $string, $registers) {}

/**
 * @param mixed $pattern
 * @param mixed $replacement
 * @param mixed $string
 * @param mixed $option
 * @return void
 */
function mberegi_replace($pattern, $replacement, $string, $option) {}

/**
 * @param mixed $encoding
 * @return void
 */
function mbregex_encoding($encoding) {}

/**
 * @param mixed $pattern
 * @param mixed $string
 * @param mixed $limit
 * @return void
 */
function mbsplit($pattern, $string, $limit) {}
