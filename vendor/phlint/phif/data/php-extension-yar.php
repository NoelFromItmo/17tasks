<?php

class Yar_Client
{
    function __call(string $method, array $parameters) {}
    function __construct(string $url, array $options = []) {}
    function setOpt(int $name, $value) : Yar_Client {}
}

class Yar_Client_Exception extends Exception
{
    function getType() : string {}
}

class Yar_Concurrent_Client
{
    function call(string $uri, string $method, array $parameters = [], callable $callback = null, callable $error_callback = null, array $options = []) : int {}
    function loop(callable $callback = null, callable $error_callback = null) : bool {}
    function reset() : bool {}
}

class Yar_Server
{
    function __construct(Object $obj) {}
    function handle() : bool {}
}

class Yar_Server_Exception extends Exception
{
    function getType() : string {}
}
