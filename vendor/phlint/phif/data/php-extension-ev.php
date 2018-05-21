<?php

final class Ev
{
    function backend() : int {}
    function depth() : int {}
    function embeddableBackends() {}
    function feedSignal(int $signum) {}
    function feedSignalEvent(int $signum) {}
    function iteration() : int {}
    function now() : float {}
    function nowUpdate() {}
    function recommendedBackends() {}
    function resume() {}
    function run(int $flags = 0) {}
    function sleep(float $seconds) {}
    function stop(int $how = 0) {}
    function supportedBackends() {}
    function suspend() {}
    function time() : float {}
    function verify() {}
}

class EvCheck extends EvWatcher
{
    function __construct(callable $callback, $data = null, int $priority = 0) {}
    function createStopped(string $callback, string $data = '', string $priority = '') {}
}

class EvChild extends EvWatcher
{
    function __construct(int $pid, bool $trace, callable $callback, $data = null, int $priority = 0) {}
    function createStopped(int $pid, bool $trace, callable $callback, $data = null, int $priority = 0) {}
    function set(int $pid, bool $trace) {}
}

class EvEmbed extends EvWatcher
{
    function __construct($other, callable $callback = null, $data = null, int $priority = 0) {}
    function createStopped($other, callable $callback = null, $data = null, int $priority = 0) {}
    function set($other) {}
    function sweep() {}
}

class EvFork extends EvWatcher
{
    function __construct(callable $callback, $data = null, int $priority = 0) {}
    function createStopped(string $callback, string $data = '', string $priority = '') {}
}

class EvIdle extends EvWatcher
{
    function __construct(callable $callback, $data = null, int $priority = 0) {}
    function createStopped(string $callback, $data = null, int $priority = 0) {}
}

class EvIo extends EvWatcher
{
    function __construct($fd, int $events, callable $callback, $data = null, int $priority = 0) {}
    function createStopped($fd, int $events, callable $callback, $data = null, int $priority = 0) : EvIo {}
    function set($fd, int $events) {}
}

final class EvLoop
{
    function __construct(int $flags = 0, $data = null, float $io_interval = 0.0, float $timeout_interval = 0.0) {}
    function backend() : int {}
    function check(string $callback, string $data = '', string $priority = '') : EvCheck {}
    function child(string $pid, string $trace, string $callback, string $data = '', string $priority = '') : EvChild {}
    function defaultLoop(int $flags = Ev::FLAG_AUTO, $data = null, float $io_interval = 0.0, float $timeout_interval = 0.0) : EvLoop {}
    function embed(string $other, string $callback = '', string $data = '', string $priority = '') : EvEmbed {}
    function fork(callable $callback, $data = null, int $priority = 0) : EvFork {}
    function idle(callable $callback, $data = null, int $priority = 0) : EvIdle {}
    function invokePending() {}
    function io($fd, int $events, callable $callback, $data = null, int $priority = 0) : EvIo {}
    function loopFork() {}
    function now() : float {}
    function nowUpdate() {}
    function periodic(float $offset, float $interval, callable $callback, $data = null, int $priority = 0) : EvPeriodic {}
    function prepare(callable $callback, $data = null, int $priority = 0) : EvPrepare {}
    function resume() {}
    function run(int $flags = 0) {}
    function signal(int $signum, callable $callback, $data = null, int $priority = 0) : EvSignal {}
    function stat(string $path, float $interval, callable $callback, $data = null, int $priority = 0) : EvStat {}
    function stop(int $how = 0) {}
    function suspend() {}
    function timer(float $after, float $repeat, callable $callback, $data = null, int $priority = 0) : EvTimer {}
    function verify() {}
}

class EvPeriodic extends EvWatcher
{
    function __construct(float $offset, string $interval, callable $reschedule_cb, callable $callback, $data = null, int $priority = 0) {}
    function again() {}
    function at() : float {}
    function createStopped(float $offset, float $interval, callable $reschedule_cb, callable $callback, $data = null, int $priority = 0) : EvPeriodic {}
    function set(float $offset, float $interval) {}
}

class EvPrepare extends EvWatcher
{
    function __construct(string $callback, string $data = '', string $priority = '') {}
    function createStopped(callable $callback, $data = null, int $priority = 0) : EvPrepare {}
}

class EvSignal extends EvWatcher
{
    function __construct(int $signum, callable $callback, $data = null, int $priority = 0) {}
    function createStopped(int $signum, callable $callback, $data = null, int $priority = 0) : EvSignal {}
    function set(int $signum) {}
}

class EvStat extends EvWatcher
{
    function __construct(string $path, float $interval, callable $callback, $data = null, int $priority = 0) {}
    function attr() : array {}
    function createStopped(string $path, float $interval, callable $callback, $data = null, int $priority = 0) {}
    function prev() {}
    function set(string $path, float $interval) {}
    function stat() : bool {}
}

class EvTimer extends EvWatcher
{
    function __construct(float $after, float $repeat, callable $callback, $data = null, int $priority = 0) {}
    function again() {}
    function createStopped(float $after, float $repeat, callable $callback, $data = null, int $priority = 0) : EvTimer {}
    function set(float $after, float $repeat) {}
}

abstract class EvWatcher
{
    function __construct() {}
    function clear() : int {}
    function feed(int $revents) {}
    function getLoop() : EvLoop {}
    function invoke(int $revents) {}
    function keepalive(bool $value = false) : bool {}
    function setCallback(callable $callback) {}
    function start() {}
    function stop() {}
}
