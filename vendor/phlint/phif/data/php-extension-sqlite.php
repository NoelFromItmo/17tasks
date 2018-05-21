<?php

/**
 * @param string $query
 * @param resource $dbhandle
 * @param int $result_type
 * @param bool $decode_binary
 * @return array
 */
function sqlite_array_query(string $query, string $dbhandle, int $result_type = SQLITE_BOTH, bool $decode_binary = true) : array {}

/**
 * @param resource $dbhandle
 * @param int $milliseconds
 * @return void
 */
function sqlite_busy_timeout($dbhandle, int $milliseconds) {}

/**
 * @param resource $dbhandle
 * @return int
 */
function sqlite_changes($dbhandle) : int {}

/**
 * @param resource $dbhandle
 * @return void
 */
function sqlite_close($dbhandle) {}

/**
 * @param resource $result
 * @param mixed $index_or_name
 * @param bool $decode_binary
 * @return mixed
 */
function sqlite_column($result, $index_or_name, bool $decode_binary = true) {}

/**
 * @param resource $dbhandle
 * @param string $function_name
 * @param callable $step_func
 * @param callable $finalize_func
 * @param int $num_args
 * @return void
 */
function sqlite_create_aggregate($dbhandle, string $function_name, callable $step_func, callable $finalize_func, int $num_args = -1) {}

/**
 * @param resource $dbhandle
 * @param string $function_name
 * @param callable $callback
 * @param int $num_args
 * @return void
 */
function sqlite_create_function($dbhandle, string $function_name, callable $callback, int $num_args = -1) {}

/**
 * @param resource $result
 * @param int $result_type
 * @param bool $decode_binary
 * @return array
 */
function sqlite_current($result, int $result_type = SQLITE_BOTH, bool $decode_binary = true) : array {}

/**
 * @param int $error_code
 * @return string
 */
function sqlite_error_string(int $error_code) : string {}

/**
 * @param string $item
 * @return string
 */
function sqlite_escape_string(string $item) : string {}

/**
 * @param string $query
 * @param resource $dbhandle
 * @param string $error_msg
 * @return bool
 */
function sqlite_exec(string $query, string $dbhandle, string &$error_msg = '') : bool {}

/**
 * @param string $filename
 * @param int $mode
 * @param string $error_message
 * @return SQLiteDatabase
 */
function sqlite_factory(string $filename, int $mode = 0666, string &$error_message = '') : SQLiteDatabase {}

/**
 * @param resource $result
 * @param int $result_type
 * @param bool $decode_binary
 * @return array
 */
function sqlite_fetch_all($result, int $result_type = SQLITE_BOTH, bool $decode_binary = true) : array {}

/**
 * @param resource $result
 * @param int $result_type
 * @param bool $decode_binary
 * @return array
 */
function sqlite_fetch_array($result, int $result_type = SQLITE_BOTH, bool $decode_binary = true) : array {}

/**
 * @param string $table_name
 * @param resource $dbhandle
 * @param int $result_type
 * @return array
 */
function sqlite_fetch_column_types(string $table_name, $dbhandle, int $result_type = SQLITE_ASSOC) : array {}

/**
 * @param resource $result
 * @param string $class_name
 * @param array $ctor_params
 * @param bool $decode_binary
 * @return object
 */
function sqlite_fetch_object($result, string $class_name = '', array $ctor_params = [], bool $decode_binary = true) {}

/**
 * @param resource $result
 * @param bool $decode_binary
 * @return string
 */
function sqlite_fetch_single($result, bool $decode_binary = true) : string {}

/**
 * @param resource $result
 * @param int $field_index
 * @return string
 */
function sqlite_field_name($result, int $field_index) : string {}

/**
 * @param resource $result
 * @return bool
 */
function sqlite_has_more($result) : bool {}

/**
 * @param resource $result
 * @return bool
 */
function sqlite_has_prev($result) : bool {}

/**
 * @param resource $dbhandle
 * @return int
 */
function sqlite_last_error($dbhandle) : int {}

/**
 * @param resource $dbhandle
 * @return int
 */
function sqlite_last_insert_rowid($dbhandle) : int {}

/**
 * @return string
 */
function sqlite_libencoding() : string {}

/**
 * @return string
 */
function sqlite_libversion() : string {}

/**
 * @param resource $result
 * @return bool
 */
function sqlite_next($result) : bool {}

/**
 * @param resource $result
 * @return int
 */
function sqlite_num_fields($result) : int {}

/**
 * @param resource $result
 * @return int
 */
function sqlite_num_rows($result) : int {}

/**
 * @param string $filename
 * @param int $mode
 * @param string $error_message
 * @return resource
 */
function sqlite_open(string $filename, int $mode = 0666, string &$error_message = '') {}

/**
 * @param string $filename
 * @param int $mode
 * @param string $error_message
 * @return resource
 */
function sqlite_popen(string $filename, int $mode = 0666, string &$error_message = '') {}

/**
 * @param resource $result
 * @return bool
 */
function sqlite_prev($result) : bool {}

/**
 * @param string $query
 * @param resource $dbhandle
 * @param int $result_type
 * @param string $error_msg
 * @return resource
 */
function sqlite_query(string $query, string $dbhandle, int $result_type = SQLITE_BOTH, string &$error_msg = '') {}

/**
 * @param resource $result
 * @return bool
 */
function sqlite_rewind($result) : bool {}

/**
 * @param resource $result
 * @param int $rownum
 * @return bool
 */
function sqlite_seek($result, int $rownum) : bool {}

/**
 * @param resource $db
 * @param string $query
 * @param bool $first_row_only
 * @param bool $decode_binary
 * @return array
 */
function sqlite_single_query($db, string $query, bool $first_row_only = false, bool $decode_binary = false) : array {}

/**
 * @param string $data
 * @return string
 */
function sqlite_udf_decode_binary(string $data) : string {}

/**
 * @param string $data
 * @return string
 */
function sqlite_udf_encode_binary(string $data) : string {}

/**
 * @param string $query
 * @param resource $dbhandle
 * @param int $result_type
 * @param string $error_msg
 * @return resource
 */
function sqlite_unbuffered_query(string $query, string $dbhandle, int $result_type = SQLITE_BOTH, string &$error_msg = '') {}

/**
 * @param resource $result
 * @return bool
 */
function sqlite_valid($result) : bool {}
