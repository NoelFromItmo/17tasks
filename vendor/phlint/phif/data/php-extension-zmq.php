<?php

class ZMQ
{
    function __construct() {}
}

class ZMQContext
{
    function __construct(int $io_threads = 1, bool $is_persistent = true) {}
    function getOpt(string $key) {}
    function getSocket(int $type, string $persistent_id = null, callback $on_new_socket = null) : ZMQSocket {}
    function isPersistent() : bool {}
    function setOpt(int $key, $value) : ZMQContext {}
}

class ZMQDevice
{
    function __construct(ZMQSocket $frontend, ZMQSocket $backend, ZMQSocket $listener = null) {}
    function getIdleTimeout() : ZMQDevice {}
    function getTimerTimeout() : ZMQDevice {}
    function run() {}
    function setIdleCallback(callable $cb_func, int $timeout, $user_data = null) : ZMQDevice {}
    function setIdleTimeout(int $timeout) : ZMQDevice {}
    function setTimerCallback(callable $cb_func, int $timeout, $user_data = null) : ZMQDevice {}
    function setTimerTimeout(int $timeout) : ZMQDevice {}
}

class ZMQPoll
{
    function add($entry, int $type) : string {}
    function clear() : ZMQPoll {}
    function count() : int {}
    function getLastErrors() : array {}
    function poll(array &$readable, array &$writable, int $timeout = -1) : int {}
    function remove($item) : bool {}
}

class ZMQSocket
{
    function __construct(ZMQContext $context, int $type, string $persistent_id = null, callback $on_new_socket = null) {}
    function bind(string $dsn, bool $force = false) : ZMQSocket {}
    function connect(string $dsn, bool $force = false) : ZMQSocket {}
    function disconnect(string $dsn) : ZMQSocket {}
    function getEndpoints() : array {}
    function getPersistentId() : string {}
    function getSocketType() : int {}
    function getSockOpt(string $key) {}
    function isPersistent() : bool {}
    function recv(int $mode = 0) : string {}
    function recvMulti(int $mode = 0) : string {}
    function send(array $message, int $mode = 0) : ZMQSocket {}
    function setSockOpt(int $key, $value) : ZMQSocket {}
    function unbind(string $dsn) : ZMQSocket {}
}
