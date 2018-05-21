<?php

const APC_ITER_ALL = 4294967295;
const APC_ITER_ATIME = 128;
const APC_ITER_CTIME = 32;
const APC_ITER_DTIME = 64;
const APC_ITER_KEY = 2;
const APC_ITER_MEM_SIZE = 512;
const APC_ITER_MTIME = 16;
const APC_ITER_NONE = 0;
const APC_ITER_NUM_HITS = 8;
const APC_ITER_REFCOUNT = 256;
const APC_ITER_TTL = 1024;
const APC_ITER_TYPE = 1;
const APC_ITER_VALUE = 4;
const APC_LIST_ACTIVE = 1;
const APC_LIST_DELETED = 2;

/**
 * @param array $values
 * @param mixed $unused
 * @param int $ttl
 * @return array
 */
function apcu_add(array $values, $unused = null, int $ttl = 0) : array {}

/**
 * @param bool $limited
 * @return array
 */
function apcu_cache_info(bool $limited = false) : array {}

/**
 * @param string $key
 * @param int $old
 * @param int $new
 * @return bool
 */
function apcu_cas(string $key, int $old, int $new) : bool {}

/**
 * @return bool
 */
function apcu_clear_cache() : bool {}

/**
 * @param string $key
 * @param int $step
 * @param bool $success
 * @return int
 */
function apcu_dec(string $key, int $step = 1, bool &$success = false) : int {}

/**
 * @param mixed $key
 * @return bool
 */
function apcu_delete($key) : bool {}

/**
 * @return void
 */
function apcu_enabled() {}

/**
 * @param string $key
 * @param callable $generator
 * @param int $ttl
 * @return mixed
 */
function apcu_entry(string $key, callable $generator, int $ttl = 0) {}

/**
 * @param mixed $keys
 * @return mixed
 */
function apcu_exists($keys) {}

/**
 * @param mixed $key
 * @param bool $success
 * @return mixed
 */
function apcu_fetch($key, bool &$success = false) {}

/**
 * @param string $key
 * @param int $step
 * @param bool $success
 * @return int
 */
function apcu_inc(string $key, int $step = 1, bool &$success = false) : int {}

/**
 * @param mixed $key
 * @return void
 */
function apcu_key_info($key) {}

/**
 * @param bool $limited
 * @return array
 */
function apcu_sma_info(bool $limited = false) : array {}

/**
 * @param array $values
 * @param mixed $unused
 * @param int $ttl
 * @return array
 */
function apcu_store(array $values, $unused = null, int $ttl = 0) : array {}

class APCuIterator implements Iterator
{
    function __construct($search = null, int $format = APC_ITER_ALL, int $chunk_size = 100, int $list = APC_LIST_ACTIVE) {}
    function current() {}
    function getTotalCount() : int {}
    function getTotalHits() : int {}
    function getTotalSize() : int {}
    function key() : string {}
    function next() {}
    function rewind() {}
    function valid() {}
}
