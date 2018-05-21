<?php

/**
 * @param resource $event
 * @param int $timeout
 * @return bool
 */
function event_add($event, int $timeout = -1) : bool {}

/**
 * @param resource $event_base
 * @return void
 */
function event_base_free($event_base) {}

/**
 * @param resource $event_base
 * @param int $flags
 * @return int
 */
function event_base_loop($event_base, int $flags = 0) : int {}

/**
 * @param resource $event_base
 * @return bool
 */
function event_base_loopbreak($event_base) : bool {}

/**
 * @param resource $event_base
 * @param int $timeout
 * @return bool
 */
function event_base_loopexit($event_base, int $timeout = -1) : bool {}

/**
 * @return resource
 */
function event_base_new() {}

/**
 * @param resource $event_base
 * @param int $npriorities
 * @return bool
 */
function event_base_priority_init($event_base, int $npriorities) : bool {}

/**
 * @param resource $event_base
 * @return bool
 */
function event_base_reinit($event_base) : bool {}

/**
 * @param resource $event
 * @param resource $event_base
 * @return bool
 */
function event_base_set($event, $event_base) : bool {}

/**
 * @param resource $bevent
 * @param resource $event_base
 * @return bool
 */
function event_buffer_base_set($bevent, $event_base) : bool {}

/**
 * @param resource $bevent
 * @param int $events
 * @return bool
 */
function event_buffer_disable($bevent, int $events) : bool {}

/**
 * @param resource $bevent
 * @param int $events
 * @return bool
 */
function event_buffer_enable($bevent, int $events) : bool {}

/**
 * @param resource $bevent
 * @param resource $fd
 * @return void
 */
function event_buffer_fd_set($bevent, $fd) {}

/**
 * @param resource $bevent
 * @return void
 */
function event_buffer_free($bevent) {}

/**
 * @param resource $stream
 * @param mixed $readcb
 * @param mixed $writecb
 * @param mixed $errorcb
 * @param mixed $arg
 * @return resource
 */
function event_buffer_new($stream, $readcb, $writecb, $errorcb, $arg = null) {}

/**
 * @param resource $bevent
 * @param int $priority
 * @return bool
 */
function event_buffer_priority_set($bevent, int $priority) : bool {}

/**
 * @param resource $bevent
 * @param int $data_size
 * @return string
 */
function event_buffer_read($bevent, int $data_size) : string {}

/**
 * @param resource $event
 * @param mixed $readcb
 * @param mixed $writecb
 * @param mixed $errorcb
 * @param mixed $arg
 * @return bool
 */
function event_buffer_set_callback($event, $readcb, $writecb, $errorcb, $arg = null) : bool {}

/**
 * @param resource $bevent
 * @param int $read_timeout
 * @param int $write_timeout
 * @return void
 */
function event_buffer_timeout_set($bevent, int $read_timeout, int $write_timeout) {}

/**
 * @param resource $bevent
 * @param int $events
 * @param int $lowmark
 * @param int $highmark
 * @return void
 */
function event_buffer_watermark_set($bevent, int $events, int $lowmark, int $highmark) {}

/**
 * @param resource $bevent
 * @param string $data
 * @param int $data_size
 * @return bool
 */
function event_buffer_write($bevent, string $data, int $data_size = -1) : bool {}

/**
 * @param resource $event
 * @return bool
 */
function event_del($event) : bool {}

/**
 * @param resource $event
 * @return void
 */
function event_free($event) {}

/**
 * @return resource
 */
function event_new() {}

/**
 * @param resource $event
 * @param int $priority
 * @return bool
 */
function event_priority_set($event, int $priority) : bool {}

/**
 * @param resource $event
 * @param mixed $fd
 * @param int $events
 * @param mixed $callback
 * @param mixed $arg
 * @return bool
 */
function event_set($event, $fd, int $events, $callback, $arg = null) : bool {}

/**
 * @param resource $event
 * @param callable $callback
 * @param mixed $arg
 * @return bool
 */
function event_timer_set($event, callable $callback, $arg = null) : bool {}
