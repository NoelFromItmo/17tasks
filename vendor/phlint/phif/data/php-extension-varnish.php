<?php

class VarnishAdmin
{
    function __construct(array $args = []) {}
    function auth() : bool {}
    function ban(string $vcl_regex) : int {}
    function banUrl(string $vcl_regex) : int {}
    function clearPanic() : int {}
    function connect() : bool {}
    function disconnect() : bool {}
    function getPanic() : string {}
    function getParams() : array {}
    function isRunning() : bool {}
    function setCompat(int $compat) {}
    function setHost(string $host) {}
    function setIdent(string $ident) {}
    function setParam(string $name, $value) : int {}
    function setPort(int $port) {}
    function setSecret(string $secret) {}
    function setTimeout(int $timeout) {}
    function start() : int {}
    function stop() : int {}
}

class VarnishLog
{
    function __construct(array $args = []) {}
    function getLine() : array {}
    function getTagName(int $index) : string {}
}

class VarnishStat
{
    function __construct(array $args = []) {}
    function getSnapshot() : array {}
}
