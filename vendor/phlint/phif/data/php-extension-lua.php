<?php

class Lua
{
    function __call(callable $lua_func, array $args = [], int $use_self = 0) {}
    function __construct(string $lua_script_file) {}
    function assign(string $name, string $value) {}
    function call(callable $lua_func, array $args = [], int $use_self = 0) {}
    function eval(string $statements) {}
    function getVersion() : string {}
    function include(string $file) {}
    function registerCallback(string $name, callable $function) {}
}

class LuaClosure
{
    function __invoke($arg, ...$__variadic) {}
}
