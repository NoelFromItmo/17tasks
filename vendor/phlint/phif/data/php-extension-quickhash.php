<?php

class QuickHashIntHash
{
    function __construct(int $size, int $options = 0) {}
    function add(int $key, int $value = 0) : bool {}
    function delete(int $key) : bool {}
    function exists(int $key) : bool {}
    function get(int $key) : int {}
    function getSize() : int {}
    function loadFromFile(string $filename, int $options = 0) : QuickHashIntHash {}
    function loadFromString(string $contents, int $options = 0) : QuickHashIntHash {}
    function saveToFile(string $filename) {}
    function saveToString() : string {}
    function set(int $key, int $value) : bool {}
    function update(int $key, int $value) : bool {}
}

class QuickHashIntSet
{
    function __construct(int $size, int $options = 0) {}
    function add(int $key) : bool {}
    function delete(int $key) : bool {}
    function exists(int $key) : bool {}
    function getSize() : int {}
    function loadFromFile(string $filename, int $size = 0, int $options = 0) : QuickHashIntSet {}
    function loadFromString(string $contents, int $size = 0, int $options = 0) : QuickHashIntSet {}
    function saveToFile(string $filename) {}
    function saveToString() : string {}
}

class QuickHashIntStringHash
{
    function __construct(int $size, int $options = 0) {}
    function add(int $key, string $value) : bool {}
    function delete(int $key) : bool {}
    function exists(int $key) : bool {}
    function get(int $key) {}
    function getSize() : int {}
    function loadFromFile(string $filename, int $size = 0, int $options = 0) : QuickHashIntStringHash {}
    function loadFromString(string $contents, int $size = 0, int $options = 0) : QuickHashIntStringHash {}
    function saveToFile(string $filename) {}
    function saveToString() : string {}
    function set(int $key, string $value) : int {}
    function update(int $key, string $value) : bool {}
}
