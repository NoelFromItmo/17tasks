<?php

/**
 * @param array $values
 * @param mixed $unused
 * @param int $ttl
 * @return array
 */
function apc_add(array $values, $unused = null, int $ttl = 0) : array {}

/**
 * @param array $files
 * @param array $user_vars
 * @return string
 */
function apc_bin_dump(array $files = null, array $user_vars = null) : string {}

/**
 * @param array $files
 * @param array $user_vars
 * @param string $filename
 * @param int $flags
 * @param resource $context
 * @return int
 */
function apc_bin_dumpfile(array $files, array $user_vars, string $filename, int $flags = 0, $context = null) : int {}

/**
 * @param string $data
 * @param int $flags
 * @return bool
 */
function apc_bin_load(string $data, int $flags = 0) : bool {}

/**
 * @param string $filename
 * @param resource $context
 * @param int $flags
 * @return bool
 */
function apc_bin_loadfile(string $filename, $context = null, int $flags = 0) : bool {}

/**
 * @param string $cache_type
 * @param bool $limited
 * @return array
 */
function apc_cache_info(string $cache_type = "", bool $limited = false) : array {}

/**
 * @param string $key
 * @param int $old
 * @param int $new
 * @return bool
 */
function apc_cas(string $key, int $old, int $new) : bool {}

/**
 * @param string $cache_type
 * @return bool
 */
function apc_clear_cache(string $cache_type = "") : bool {}

/**
 * @param string $filename
 * @param bool $atomic
 * @return mixed
 */
function apc_compile_file(string $filename, bool $atomic = true) {}

/**
 * @param string $key
 * @param int $step
 * @param bool $success
 * @return int
 */
function apc_dec(string $key, int $step = 1, bool &$success = false) : int {}

/**
 * @param string $key
 * @param array $constants
 * @param bool $case_sensitive
 * @return bool
 */
function apc_define_constants(string $key, array $constants, bool $case_sensitive = true) : bool {}

/**
 * @param string $key
 * @return mixed
 */
function apc_delete(string $key) {}

/**
 * @param mixed $keys
 * @return mixed
 */
function apc_delete_file($keys) {}

/**
 * @param mixed $keys
 * @return mixed
 */
function apc_exists($keys) {}

/**
 * @param mixed $key
 * @param bool $success
 * @return mixed
 */
function apc_fetch($key, bool &$success = false) {}

/**
 * @param string $key
 * @param int $step
 * @param bool $success
 * @return int
 */
function apc_inc(string $key, int $step = 1, bool &$success = false) : int {}

/**
 * @param string $key
 * @param bool $case_sensitive
 * @return bool
 */
function apc_load_constants(string $key, bool $case_sensitive = true) : bool {}

/**
 * @param bool $limited
 * @return array
 */
function apc_sma_info(bool $limited = false) : array {}

/**
 * @param array $values
 * @param mixed $unused
 * @param int $ttl
 * @return array
 */
function apc_store(array $values, $unused = null, int $ttl = 0) : array {}

class APCIterator implements Iterator
{
    function __construct(string $cache, $search = null, int $format = APC_ITER_ALL, int $chunk_size = 100, int $list = APC_LIST_ACTIVE) {}
    function current() {}
    function getTotalCount() : int {}
    function getTotalHits() : int {}
    function getTotalSize() : int {}
    function key() : string {}
    function next() {}
    function rewind() {}
    function valid() {}
}
