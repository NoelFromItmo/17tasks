<?php

class SyncEvent
{
    function __construct(string $name = '', bool $manual = false, bool $prefire = false) {}
    function fire() : bool {}
    function reset() : bool {}
    function wait(int $wait = -1) : bool {}
}

class SyncMutex
{
    function __construct(string $name = '') {}
    function lock(int $wait = -1) : bool {}
    function unlock(bool $all = false) : bool {}
}

class SyncReaderWriter
{
    function __construct(string $name = '', bool $autounlock = true) {}
    function readlock(int $wait = -1) : bool {}
    function readunlock() : bool {}
    function writelock(int $wait = -1) : bool {}
    function writeunlock() : bool {}
}

class SyncSemaphore
{
    function __construct(string $name = '', int $initialval = 1, bool $autounlock = true) {}
    function lock(int $wait = -1) : bool {}
    function unlock(int &$prevcount = 0) : bool {}
}

class SyncSharedMemory
{
    function __construct(string $name, int $size) {}
    function first() : bool {}
    function read(int $start = 0, int $length = 0) {}
    function size() : bool {}
    function write(string $string = '', int $start = 0) {}
}
