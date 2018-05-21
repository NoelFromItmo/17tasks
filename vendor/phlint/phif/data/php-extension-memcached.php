<?php

class Memcached
{
    function add(string $key, $value, int $expiration = 0) : bool {}
    function addByKey(string $server_key, string $key, $value, int $expiration = 0) : bool {}
    function addServer(string $host, int $port, int $weight = 0) : bool {}
    function addServers(array $servers) : bool {}
    function append(string $key, string $value) : bool {}
    function appendByKey(string $server_key, string $key, string $value) : bool {}
    function cas(float $cas_token, string $key, $value, int $expiration = 0) : bool {}
    function casByKey(float $cas_token, string $server_key, string $key, $value, int $expiration = 0) : bool {}
    function decrement(string $key, int $offset = 1, int $initial_value = 0, int $expiry = 0) : int {}
    function decrementByKey(string $server_key, string $key, int $offset = 1, int $initial_value = 0, int $expiry = 0) : int {}
    function delete(string $key, int $time = 0) : bool {}
    function deleteByKey(string $server_key, string $key, int $time = 0) : bool {}
    function deleteMulti(array $keys, int $time = 0) : array {}
    function deleteMultiByKey(string $server_key, array $keys, int $time = 0) : bool {}
    function fetch() : array {}
    function fetchAll() : array {}
    function flush(int $delay = 0) : bool {}
    function get(string $key, callable $cache_cb = null, int $flags = 0) {}
    function getAllKeys() : array {}
    function getByKey(string $server_key, string $key, callable $cache_cb = null, int $flags = 0) {}
    function getDelayed(array $keys, bool $with_cas = false, callable $value_cb = null) : bool {}
    function getDelayedByKey(string $server_key, array $keys, bool $with_cas = false, callable $value_cb = null) : bool {}
    function getMulti(array $keys, int $flags = 0) {}
    function getMultiByKey(string $server_key, array $keys, int $flags = 0) : array {}
    function getOption(int $option) {}
    function getResultCode() : int {}
    function getResultMessage() : string {}
    function getServerByKey(string $server_key) : array {}
    function getServerList() : array {}
    function getStats() : array {}
    function getVersion() : array {}
    function increment(string $key, int $offset = 1, int $initial_value = 0, int $expiry = 0) : int {}
    function incrementByKey(string $server_key, string $key, int $offset = 1, int $initial_value = 0, int $expiry = 0) : int {}
    function isPersistent() : bool {}
    function isPristine() : bool {}
    function prepend(string $key, string $value) : bool {}
    function prependByKey(string $server_key, string $key, string $value) : bool {}
    function quit() : bool {}
    function replace(string $key, $value, int $expiration = 0) : bool {}
    function replaceByKey(string $server_key, string $key, $value, int $expiration = 0) : bool {}
    function resetServerList() : bool {}
    function set(string $key, $value, int $expiration = 0) : bool {}
    function setByKey(string $server_key, string $key, $value, int $expiration = 0) : bool {}
    function setMulti(array $items, int $expiration = 0) : bool {}
    function setMultiByKey(string $server_key, array $items, int $expiration = 0) : bool {}
    function setOption(int $option, $value) : bool {}
    function setOptions(array $options) : bool {}
    function setSaslAuthData(string $username, string $password) {}
    function touch(string $key, int $expiration) : bool {}
    function touchByKey(string $server_key, string $key, int $expiration) : bool {}
}

class MemcachedException extends RuntimeException {}
