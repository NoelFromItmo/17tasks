<?php

class TokyoTyrant
{
    function __construct(string $host = '', int $port = TokyoTyrant::RDBDEF_PORT, array $options = []) {}
    function add(string $key, $increment, int $type = 0) {}
    function connect(string $host, int $port = TokyoTyrant::RDBDEF_PORT, array $options = []) : TokyoTyrant {}
    function connectUri(string $uri) : TokyoTyrant {}
    function copy(string $path) : TokyoTyrant {}
    function ext(string $name, int $options, string $key, string $value) : string {}
    function fwmKeys(string $prefix, int $max_recs) : array {}
    function get($keys) {}
    function getIterator() : TokyoTyrantIterator {}
    function num() : int {}
    function out($keys) : TokyoTyrant {}
    function put($keys, string $value = null) : TokyoTyrant {}
    function putCat($keys, string $value = '') : TokyoTyrant {}
    function putKeep($keys, string $value = '') : TokyoTyrant {}
    function putNr($keys, string $value = null) : TokyoTyrant {}
    function putShl(string $key, string $value, int $width) {}
    function restore(string $log_dir, int $timestamp, bool $check_consistency = true) {}
    function setMaster(string $host, int $port, int $timestamp, bool $check_consistency = true) {}
    function size(string $key) : int {}
    function stat() : array {}
    function sync() {}
    function tune(float $timeout, int $options = TokyoTyrant::RDBT_RECON) : TokyoTyrant {}
    function vanish() {}
}

class tokyotyrantexception extends Exception {}

class TokyoTyrantIterator implements Iterator
{
    function __construct($object) {}
    function current() {}
    function key() {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}

class TokyoTyrantQuery implements Iterator
{
    function __construct(TokyoTyrantTable $table) {}
    function addCond(string $name, int $op, string $expr) {}
    function count() : int {}
    function current() : array {}
    function hint() : string {}
    function key() : string {}
    function metaSearch(array $queries, int $type) : array {}
    function next() : array {}
    function out() : TokyoTyrantQuery {}
    function rewind() : bool {}
    function search() : array {}
    function setLimit(int $max = 0, int $skip = 0) {}
    function setOrder(string $name, int $type) {}
    function valid() : bool {}
}

class TokyoTyrantTable extends TokyoTyrant
{
    function add(string $key, $increment, string $type = '') {}
    function genUid() : int {}
    function get($keys) : array {}
    function getIterator() : TokyoTyrantIterator {}
    function getQuery() : TokyoTyrantQuery {}
    function out($keys) {}
    function put(string $key, array $columns) : int {}
    function putCat(string $key, array $columns) {}
    function putKeep(string $key, array $columns) {}
    function putNr($keys, string $value = '') {}
    function putShl(string $key, string $value, int $width) {}
    function setIndex(string $column, int $type) {}
}
