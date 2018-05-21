<?php

class Zookeeper
{
    function addAuth(string $scheme, string $cert, callable $completion_cb = null) : bool {}
    function connect(string $host, callable $watcher_cb = null, int $recv_timeout = 10000) {}
    function create(string $path, string $value, array $acls, int $flags = null) : string {}
    function delete(string $path, int $version = -1) : bool {}
    function exists(string $path, callable $watcher_cb = null) : bool {}
    function get(string $path, callable $watcher_cb = null, array &$stat = null, int $max_size = 0) : string {}
    function getAcl(string $path) : array {}
    function getChildren(string $path, callable $watcher_cb = null) : array {}
    function getClientId() : int {}
    function getRecvTimeout() : int {}
    function getState() : int {}
    function isRecoverable() : bool {}
    function set(string $path, string $value, int $version = -1, array &$stat = null) : bool {}
    function setAcl(string $path, int $version, array $acl) : bool {}
    function setDebugLevel(int $logLevel) : bool {}
    function setDeterministicConnOrder(bool $yesOrNo) : bool {}
    function setLogStream($stream) : bool {}
    function setWatcher(callable $watcher_cb) : bool {}
}
