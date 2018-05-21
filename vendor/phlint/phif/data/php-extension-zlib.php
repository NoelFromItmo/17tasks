<?php

const FORCE_DEFLATE = 15;
const FORCE_GZIP = 31;
const ZLIB_BLOCK = 5;
const ZLIB_BUF_ERROR = -5;
const ZLIB_DATA_ERROR = -3;
const ZLIB_DEFAULT_STRATEGY = 0;
const ZLIB_ENCODING_DEFLATE = 15;
const ZLIB_ENCODING_GZIP = 31;
const ZLIB_ENCODING_RAW = -15;
const ZLIB_ERRNO = -1;
const ZLIB_FILTERED = 1;
const ZLIB_FINISH = 4;
const ZLIB_FIXED = 4;
const ZLIB_FULL_FLUSH = 3;
const ZLIB_HUFFMAN_ONLY = 2;
const ZLIB_MEM_ERROR = -4;
const ZLIB_NEED_DICT = 2;
const ZLIB_NO_FLUSH = 0;
const ZLIB_OK = 0;
const ZLIB_PARTIAL_FLUSH = 1;
const ZLIB_RLE = 3;
const ZLIB_STREAM_END = 1;
const ZLIB_STREAM_ERROR = -2;
const ZLIB_SYNC_FLUSH = 2;
const ZLIB_VERNUM = 0;
const ZLIB_VERSION = '0.0.0';
const ZLIB_VERSION_ERROR = -6;

/**
 * @param resource $context
 * @param string $data
 * @param int $flush_mode
 * @return string
 */
function deflate_add($context, string $data, int $flush_mode = ZLIB_SYNC_FLUSH) : string {}

/**
 * @param int $encoding
 * @param array $options
 * @return resource
 */
function deflate_init(int $encoding, array $options = []) {}

/**
 * @param resource $zp
 * @return bool
 */
function gzclose($zp) : bool {}

/**
 * @param string $data
 * @param int $level
 * @param int $encoding
 * @return string
 */
function gzcompress(string $data, int $level = -1, int $encoding = ZLIB_ENCODING_DEFLATE) : string {}

/**
 * @param string $data
 * @param int $length
 * @return string
 */
function gzdecode(string $data, int $length = 0) : string {}

/**
 * @param string $data
 * @param int $level
 * @param int $encoding
 * @return string
 */
function gzdeflate(string $data, int $level = -1, int $encoding = ZLIB_ENCODING_RAW) : string {}

/**
 * @param string $data
 * @param int $level
 * @param int $encoding_mode
 * @return string
 */
function gzencode(string $data, int $level = -1, int $encoding_mode = FORCE_GZIP) : string {}

/**
 * @param resource $zp
 * @return int
 */
function gzeof($zp) : int {}

/**
 * @param string $filename
 * @param int $use_include_path
 * @return array
 */
function gzfile(string $filename, int $use_include_path = 0) : array {}

/**
 * @param resource $zp
 * @return string
 */
function gzgetc($zp) : string {}

/**
 * @param resource $zp
 * @param int $length
 * @return string
 */
function gzgets($zp, int $length = 0) : string {}

/**
 * @param resource $zp
 * @param int $length
 * @param string $allowable_tags
 * @return string
 */
function gzgetss($zp, int $length, string $allowable_tags = '') : string {}

/**
 * @param string $data
 * @param int $length
 * @return string
 */
function gzinflate(string $data, int $length = 0) : string {}

/**
 * @param string $filename
 * @param string $mode
 * @param int $use_include_path
 * @return resource
 */
function gzopen(string $filename, string $mode, int $use_include_path = 0) {}

/**
 * @param resource $zp
 * @return int
 */
function gzpassthru($zp) : int {}

/**
 * @param mixed $fp
 * @param mixed $str
 * @param mixed $length
 * @return void
 */
function gzputs($fp, $str, $length) {}

/**
 * @param resource $zp
 * @param int $length
 * @return string
 */
function gzread($zp, int $length) : string {}

/**
 * @param resource $zp
 * @return bool
 */
function gzrewind($zp) : bool {}

/**
 * @param resource $zp
 * @param int $offset
 * @param int $whence
 * @return int
 */
function gzseek($zp, int $offset, int $whence = SEEK_SET) : int {}

/**
 * @param resource $zp
 * @return int
 */
function gztell($zp) : int {}

/**
 * @param string $data
 * @param int $length
 * @return string
 */
function gzuncompress(string $data, int $length = 0) : string {}

/**
 * @param resource $zp
 * @param string $string
 * @param int $length
 * @return int
 */
function gzwrite($zp, string $string, int $length = 0) : int {}

/**
 * @param resource $context
 * @param string $encoded_data
 * @param int $flush_mode
 * @return string
 */
function inflate_add($context, string $encoded_data, int $flush_mode = ZLIB_SYNC_FLUSH) : string {}

/**
 * @param resource $resource
 * @return int
 */
function inflate_get_read_len($resource) : int {}

/**
 * @param resource $resource
 * @return int
 */
function inflate_get_status($resource) : int {}

/**
 * @param int $encoding
 * @param array $options
 * @return resource
 */
function inflate_init(int $encoding, array $options = []) {}

/**
 * @param string $buffer
 * @param int $mode
 * @return string
 */
function ob_gzhandler(string $buffer, int $mode) : string {}

/**
 * @param string $filename
 * @param int $use_include_path
 * @return int
 */
function readgzfile(string $filename, int $use_include_path = 0) : int {}

/**
 * @param string $data
 * @param string $max_decoded_len
 * @return string
 */
function zlib_decode(string $data, string $max_decoded_len = '') : string {}

/**
 * @param string $data
 * @param int $encoding
 * @param int $level
 * @return string
 */
function zlib_encode(string $data, int $encoding, int $level = -1) : string {}

/**
 * @return string
 */
function zlib_get_coding_type() : string {}
