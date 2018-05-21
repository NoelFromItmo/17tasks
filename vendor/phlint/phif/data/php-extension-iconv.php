<?php

const ICONV_IMPL = '';
const ICONV_MIME_DECODE_CONTINUE_ON_ERROR = 2;
const ICONV_MIME_DECODE_STRICT = 1;
const ICONV_VERSION = '';

/**
 * @param string $in_charset
 * @param string $out_charset
 * @param string $str
 * @return string
 */
function iconv(string $in_charset, string $out_charset, string $str) : string {}

/**
 * @param string $type
 * @return mixed
 */
function iconv_get_encoding(string $type = "all") {}

/**
 * @param string $encoded_header
 * @param int $mode
 * @param string $charset
 * @return string
 */
function iconv_mime_decode(string $encoded_header, int $mode = 0, string $charset = ini_get("iconv.internal_encoding")) : string {}

/**
 * @param string $encoded_headers
 * @param int $mode
 * @param string $charset
 * @return array
 */
function iconv_mime_decode_headers(string $encoded_headers, int $mode = 0, string $charset = ini_get("iconv.internal_encoding")) : array {}

/**
 * @param string $field_name
 * @param string $field_value
 * @param array $preferences
 * @return string
 */
function iconv_mime_encode(string $field_name, string $field_value, array $preferences = null) : string {}

/**
 * @param string $type
 * @param string $charset
 * @return bool
 */
function iconv_set_encoding(string $type, string $charset) : bool {}

/**
 * @param string $str
 * @param string $charset
 * @return int
 */
function iconv_strlen(string $str, string $charset = ini_get("iconv.internal_encoding")) : int {}

/**
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @param string $charset
 * @return int
 */
function iconv_strpos(string $haystack, string $needle, int $offset = 0, string $charset = ini_get("iconv.internal_encoding")) : int {}

/**
 * @param string $haystack
 * @param string $needle
 * @param string $charset
 * @return int
 */
function iconv_strrpos(string $haystack, string $needle, string $charset = ini_get("iconv.internal_encoding")) : int {}

/**
 * @param string $str
 * @param int $offset
 * @param int $length
 * @param string $charset
 * @return string
 */
function iconv_substr(string $str, int $offset, int $length = iconv_strlen($str, $charset), string $charset = ini_get("iconv.internal_encoding")) : string {}
