<?php

class WeakMap implements Countable, ArrayAccess, Iterator
{
    function __construct() {}
    function count() : int {}
    function current() {}
    function key() {}
    function next() {}
    function offsetExists($object) : bool {}
    function offsetGet($object) {}
    function offsetSet($object, $value) {}
    function offsetUnset($object) {}
    function rewind() {}
    function valid() : bool {}
}

class WeakRef
{
    function acquire() : bool {}
    function get() {}
    function release() : bool {}
    function valid() : bool {}
}
