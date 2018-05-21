<?php

class Collectable
{
    function isGarbage() : bool {}
    function setGarbage() {}
}

class Cond
{
    function broadcast(int $condition) : bool {}
    function create() : int {}
    function destroy(int $condition) : bool {}
    function signal(int $condition) : bool {}
    function wait(int $condition, int $mutex, int $timeout = 0) : bool {}
}

class Mutex
{
    function create(bool $lock = false) : int {}
    function destroy(int $mutex) : bool {}
    function lock(int $mutex) : bool {}
    function trylock(int $mutex) : bool {}
    function unlock(int $mutex, bool $destroy = false) : bool {}
}

class Pool
{
    function __construct(int $size, string $class = '', array $ctor = []) : Pool {}
    function collect(Callable $collector = null) : int {}
    function resize(int $size) {}
    function shutdown() {}
    function submit(Threaded $task) : int {}
    function submitTo(int $worker, Threaded $task) : int {}
}

class Thread extends Threaded implements Countable, Traversable, ArrayAccess
{
    function detach() {}
    function getCreatorId() : int {}
    function getCurrentThread() : Thread {}
    function getCurrentThreadId() : int {}
    function getThreadId() : int {}
    function globally() {}
    function isJoined() : bool {}
    function isStarted() : bool {}
    function join() : bool {}
    function kill() {}
    function start(int $options = 0) : bool {}
}

class Threaded implements Collectable, Traversable, Countable, ArrayAccess
{
    function chunk(int $size, bool $preserve) : array {}
    function count() : int {}
    function extend(string $class) : bool {}
    function from(Closure $run, Closure $construct = null, array $args = []) : Threaded {}
    function getTerminationInfo() : array {}
    function isRunning() : bool {}
    function isTerminated() : bool {}
    function isWaiting() : bool {}
    function lock() : bool {}
    function merge($from, bool $overwrite = false) : bool {}
    function notify() : bool {}
    function notifyOne() : bool {}
    function pop() : bool {}
    function run() {}
    function shift() {}
    function synchronized(Closure $block, ...$__variadic) {}
    function unlock() : bool {}
    function wait(int $timeout = 0) : bool {}
}

class Volatile extends Threaded implements Collectable, Traversable {}

class Worker extends Thread implements Traversable, Countable, ArrayAccess
{
    function collect(Callable $collector = null) : int {}
    function getStacked() : int {}
    function isShutdown() : bool {}
    function isWorking() : bool {}
    function shutdown() : bool {}
    function stack(Threaded &$work) : int {}
    function unstack() : int {}
}
