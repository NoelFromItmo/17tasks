<?php

const PCRE_VERSION = '';
const PREG_BACKTRACK_LIMIT_ERROR = 2;
const PREG_BAD_UTF8_ERROR = 4;
const PREG_BAD_UTF8_OFFSET_ERROR = 5;
const PREG_GREP_INVERT = 1;
const PREG_INTERNAL_ERROR = 1;
const PREG_JIT_STACKLIMIT_ERROR = 6;
const PREG_NO_ERROR = 0;
const PREG_OFFSET_CAPTURE = 256;
const PREG_PATTERN_ORDER = 1;
const PREG_RECURSION_LIMIT_ERROR = 3;
const PREG_SET_ORDER = 2;
const PREG_SPLIT_DELIM_CAPTURE = 2;
const PREG_SPLIT_NO_EMPTY = 1;
const PREG_SPLIT_OFFSET_CAPTURE = 4;
const PREG_UNMATCHED_AS_NULL = 512;

/**
 * @param mixed $pattern
 * @param mixed $replacement
 * @param mixed $subject
 * @param int $limit
 * @param int $count
 * @return mixed
 */
function preg_filter($pattern, $replacement, $subject, int $limit = -1, int &$count = 0) {}

/**
 * @param string $pattern
 * @param array $input
 * @param int $flags
 * @return array
 */
function preg_grep(string $pattern, array $input, int $flags = 0) : array {}

/**
 * @return int
 */
function preg_last_error() : int {}

/**
 * @param string $pattern
 * @param string $subject
 * @param array $matches
 * @param int $flags
 * @param int $offset
 * @return int
 */
function preg_match(string $pattern, string $subject, /** @out */ array &$matches = [], int $flags = 0, int $offset = 0) : int {}

/**
 * @param string $pattern
 * @param string $subject
 * @param array $matches
 * @param int $flags
 * @param int $offset
 * @return int
 */
function preg_match_all(string $pattern, string $subject, /** @out */ array &$matches = [], int $flags = PREG_PATTERN_ORDER, int $offset = 0) : int {}

/**
 * @param string $str
 * @param string $delimiter
 * @return string
 */
function preg_quote(string $str, string $delimiter = null) : string {}

/**
 * @param mixed $pattern
 * @param mixed $replacement
 * @param mixed $subject
 * @param int $limit
 * @param int $count
 * @return mixed
 */
function preg_replace($pattern, $replacement, $subject, int $limit = -1, int &$count = 0) {}

/**
 * @isolated Invokes a callback.
 * @param mixed $pattern
 * @param callable $callback
 * @param mixed $subject
 * @param int $limit
 * @param int $count
 * @return mixed
 */
function preg_replace_callback($pattern, callable $callback, $subject, int $limit = -1, int &$count = 0) {}

/**
 * @param array $patterns_and_callbacks
 * @param mixed $subject
 * @param int $limit
 * @param int $count
 * @return mixed
 */
function preg_replace_callback_array(array $patterns_and_callbacks, $subject, int $limit = -1, int &$count = 0) {}

/**
 * @param string $pattern
 * @param string $subject
 * @param int $limit
 * @param int $flags
 * @return array
 */
function preg_split(string $pattern, string $subject, int $limit = -1, int $flags = 0) : array {}
