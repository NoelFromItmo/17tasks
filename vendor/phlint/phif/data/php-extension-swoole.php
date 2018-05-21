<?php

/**
 * @param string $hostname
 * @param callable $callback
 * @return bool
 */
function swoole_async_dns_lookup(string $hostname, callable $callback) : bool {}

/**
 * @param string $filename
 * @param callable $callback
 * @param int $chunk_size
 * @param int $offset
 * @return bool
 */
function swoole_async_read(string $filename, callable $callback, int $chunk_size = 65536, int $offset = 0) : bool {}

/**
 * @param string $filename
 * @param callable $callback
 * @return bool
 */
function swoole_async_readfile(string $filename, callable $callback) : bool {}

/**
 * @param array $settings
 * @return void
 */
function swoole_async_set(array $settings) {}

/**
 * @param string $filename
 * @param string $content
 * @param integer $offset
 * @param callable $callback
 * @return bool
 */
function swoole_async_write(string $filename, string $content, int $offset = 0, callable $callback = null) : bool {}

/**
 * @param string $filename
 * @param string $content
 * @param callable $callback
 * @param int $flags
 * @return bool
 */
function swoole_async_writefile(string $filename, string $content, callable $callback = null, int $flags = 0) : bool {}

/**
 * @param array $read_array
 * @param array $write_array
 * @param array $error_array
 * @param float $timeout
 * @return int
 */
function swoole_client_select(array &$read_array, array &$write_array, array &$error_array, float $timeout = 0.5) : int {}

/**
 * @return int
 */
function swoole_cpu_num() : int {}

/**
 * @return int
 */
function swoole_errno() : int {}

/**
 * @param int $fd
 * @param callable $read_callback
 * @param callable $write_callback
 * @param int $events
 * @return int
 */
function swoole_event_add(int $fd, callable $read_callback = null, callable $write_callback = null, int $events = 0) : int {}

/**
 * @param callable $callback
 * @return bool
 */
function swoole_event_defer(callable $callback) : bool {}

/**
 * @param int $fd
 * @return bool
 */
function swoole_event_del(int $fd) : bool {}

/**
 * @return void
 */
function swoole_event_exit() {}

/**
 * @param int $fd
 * @param callable $read_callback
 * @param callable $write_callback
 * @param int $events
 * @return bool
 */
function swoole_event_set(int $fd, callable $read_callback = null, callable $write_callback = null, int $events = 0) : bool {}

/**
 * @return void
 */
function swoole_event_wait() {}

/**
 * @param int $fd
 * @param string $data
 * @return bool
 */
function swoole_event_write(int $fd, string $data) : bool {}

/**
 * @return array
 */
function swoole_get_local_ip() : array {}

/**
 * @return int
 */
function swoole_last_error() : int {}

/**
 * @param string $filename
 * @return mixed
 */
function swoole_load_module(string $filename) {}

/**
 * @param array $read_array
 * @param array $write_array
 * @param array $error_array
 * @param float $timeout
 * @return int
 */
function swoole_select(array &$read_array, array &$write_array, array &$error_array, float $timeout = 0) : int {}

/**
 * @param string $process_name
 * @param int $size
 * @return void
 */
function swoole_set_process_name(string $process_name, int $size = 128) {}

/**
 * @param int $errno
 * @param int $error_type
 * @return string
 */
function swoole_strerror(int $errno, int $error_type = 0) : string {}

/**
 * @param int $ms
 * @param callable $callback
 * @param mixed $param
 * @return int
 */
function swoole_timer_after(int $ms, callable $callback, $param = null) : int {}

/**
 * @param integer $timer_id
 * @return void
 */
function swoole_timer_clear(int $timer_id) {}

/**
 * @param int $timer_id
 * @return bool
 */
function swoole_timer_exists(int $timer_id) : bool {}

/**
 * @param int $ms
 * @param callable $callback
 * @param mixed $param
 * @return int
 */
function swoole_timer_tick(int $ms, callable $callback, $param = null) : int {}

/**
 * @return string
 */
function swoole_version() : string {}
