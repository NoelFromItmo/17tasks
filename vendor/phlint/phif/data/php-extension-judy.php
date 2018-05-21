<?php

/**
 * @param Judy $array
 * @return int
 */
function judy_type(Judy $array) : int {}

/**
 * @return string
 */
function judy_version() : string {}

class Judy implements ArrayAccess, Iterator
{
    function __construct(int $judy_type) {}
    function __destruct() {}
    function byCount(int $nth_index) : int {}
    function count(int $index_start = 0, int $index_end = -1) : int {}
    function first($index = null) {}
    function firstEmpty($index = 0) : int {}
    function free() : int {}
    function getType() : int {}
    function last(string $index = '') {}
    function lastEmpty(int $index = -1) : int {}
    function memoryUsage() : int {}
    function next($index) {}
    function nextEmpty(int $index) : int {}
    function offsetExists($offset) : bool {}
    function offsetGet($offset) {}
    function offsetSet($offset, $value) : bool {}
    function offsetUnset($offset) : bool {}
    function prev($index) {}
    function prevEmpty($index) : int {}
    function size() {}
}
