<?php

/**
 * @param int $debug_level
 * @return bool
 */
function apd_breakpoint(int $debug_level) : bool {}

/**
 * @return array
 */
function apd_callstack() : array {}

/**
 * @param string $warning
 * @param string $delimiter
 * @return void
 */
function apd_clunk(string $warning, string $delimiter = "<BR />") {}

/**
 * @param int $debug_level
 * @return bool
 */
function apd_continue(int $debug_level) : bool {}

/**
 * @param string $warning
 * @param string $delimiter
 * @return void
 */
function apd_croak(string $warning, string $delimiter = "<BR />") {}

/**
 * @return void
 */
function apd_dump_function_table() {}

/**
 * @return array
 */
function apd_dump_persistent_resources() : array {}

/**
 * @return array
 */
function apd_dump_regular_resources() : array {}

/**
 * @param string $output
 * @return bool
 */
function apd_echo(string $output) : bool {}

/**
 * @return array
 */
function apd_get_active_symbols() : array {}

/**
 * @param string $dump_directory
 * @param string $fragment
 * @return string
 */
function apd_set_pprof_trace(string $dump_directory = ini_get("apd.dumpdir"), string $fragment = "pprof") : string {}

/**
 * @param int $debug_level
 * @return void
 */
function apd_set_session(int $debug_level) {}

/**
 * @param int $debug_level
 * @param string $dump_directory
 * @return void
 */
function apd_set_session_trace(int $debug_level, string $dump_directory = ini_get("apd.dumpdir")) {}

/**
 * @param string $tcp_server
 * @param int $socket_type
 * @param int $port
 * @param int $debug_level
 * @return bool
 */
function apd_set_session_trace_socket(string $tcp_server, int $socket_type, int $port, int $debug_level) : bool {}

/**
 * @param string $function_name
 * @param string $function_args
 * @param string $function_code
 * @return bool
 */
function override_function(string $function_name, string $function_args, string $function_code) : bool {}

/**
 * @param string $original_name
 * @param string $new_name
 * @return bool
 */
function rename_function(string $original_name, string $new_name) : bool {}
