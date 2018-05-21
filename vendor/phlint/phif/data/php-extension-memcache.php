<?php

const MEMCACHE_COMPRESSED = 2;
const MEMCACHE_HAVE_SESSION = 1;
const MEMCACHE_USER1 = 65536;
const MEMCACHE_USER2 = 131072;
const MEMCACHE_USER3 = 262144;
const MEMCACHE_USER4 = 524288;

/**
 * @return void
 */
function memcache_add() {}

/**
 * @return void
 */
function memcache_add_server() {}

/**
 * @return void
 */
function memcache_append() {}

/**
 * @return void
 */
function memcache_cas() {}

/**
 * @return void
 */
function memcache_close() {}

/**
 * @return void
 */
function memcache_connect() {}

/**
 * @param bool $on_off
 * @return bool
 */
function memcache_debug(bool $on_off) : bool {}

/**
 * @return void
 */
function memcache_decrement() {}

/**
 * @return void
 */
function memcache_delete() {}

/**
 * @return void
 */
function memcache_flush() {}

/**
 * @return void
 */
function memcache_get() {}

/**
 * @return void
 */
function memcache_get_extended_stats() {}

/**
 * @return void
 */
function memcache_get_server_status() {}

/**
 * @return void
 */
function memcache_get_stats() {}

/**
 * @return void
 */
function memcache_get_version() {}

/**
 * @return void
 */
function memcache_increment() {}

/**
 * @return void
 */
function memcache_pconnect() {}

/**
 * @return void
 */
function memcache_prepend() {}

/**
 * @return void
 */
function memcache_replace() {}

/**
 * @return void
 */
function memcache_set() {}

/**
 * @return void
 */
function memcache_set_compress_threshold() {}

/**
 * @return void
 */
function memcache_set_failure_callback() {}

/**
 * @return void
 */
function memcache_set_sasl_auth_data() {}

/**
 * @return void
 */
function memcache_set_server_params() {}

class Memcache extends MemcachePool
{
    function add(string $key, $var, int $flag = 0, int $expire = 0) : bool {}
    function addserver(string $host, int $port = 11211, bool $persistent = false, int $weight = 0, int $timeout = 0, int $retry_interval = 0, bool $status = false, callable $failure_callback = null, int $timeoutms = 0) : bool {}
    function close() : bool {}
    function connect(string $host, int $port = 0, int $timeout = 0) : bool {}
    function decrement(string $key, int $value = 1) : int {}
    function delete(string $key, int $timeout = 0) : bool {}
    function flush() : bool {}
    function get(string $key, int &$flags = 0) : string {}
    function getExtendedStats(string $type = '', int $slabid = 0, int $limit = 100) : array {}
    function getServerStatus(string $host, int $port = 11211) : int {}
    function getStats(string $type = '', int $slabid = 0, int $limit = 100) : array {}
    function getVersion() : string {}
    function increment(string $key, int $value = 1) : int {}
    function pconnect(string $host, int $port = 0, int $timeout = 0) {}
    function replace(string $key, $var, int $flag = 0, int $expire = 0) : bool {}
    function set(string $key, $var, int $flag = 0, int $expire = 0) : bool {}
    function setCompressThreshold(int $threshold, float $min_savings = 0) : bool {}
    function setServerParams(string $host, int $port = 11211, int $timeout = 0, int $retry_interval = false, bool $status = false, callable $failure_callback = null) : bool {}
}

class MemcachePool
{
    function add() {}
    function addserver() {}
    function append() {}
    function cas() {}
    function close() {}
    function connect() {}
    function decrement() {}
    function delete() {}
    function findserver() {}
    function flush() {}
    function get() {}
    function getextendedstats() {}
    function getserverstatus() {}
    function getstats() {}
    function getversion() {}
    function increment() {}
    function prepend() {}
    function replace() {}
    function set() {}
    function setcompressthreshold() {}
    function setfailurecallback() {}
    function setSaslAuthData() {}
    function setserverparams() {}
}
