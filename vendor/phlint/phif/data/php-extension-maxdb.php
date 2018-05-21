<?php

/**
 * @param resource $link
 * @return int
 */
function maxdb_affected_rows($link) : int {}

/**
 * @param resource $link
 * @param bool $mode
 * @return bool
 */
function maxdb_autocommit($link, bool $mode) : bool {}

/**
 * @param resource $link
 * @param string $user
 * @param string $password
 * @param string $database
 * @return bool
 */
function maxdb_change_user($link, string $user, string $password, string $database) : bool {}

/**
 * @param resource $link
 * @return string
 */
function maxdb_character_set_name($link) : string {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_close($link) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_commit($link) : bool {}

/**
 * @param string $host
 * @param string $username
 * @param string $passwd
 * @param string $dbname
 * @param int $port
 * @param string $socket
 * @return resource
 */
function maxdb_connect(string $host = '', string $username = '', string $passwd = '', string $dbname = '', int $port = 0, string $socket = '') {}

/**
 * @return int
 */
function maxdb_connect_errno() : int {}

/**
 * @return string
 */
function maxdb_connect_error() : string {}

/**
 * @param resource $result
 * @param int $offset
 * @return bool
 */
function maxdb_data_seek($result, int $offset) : bool {}

/**
 * @param string $debug
 * @return void
 */
function maxdb_debug(string $debug) {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_disable_reads_from_master($link) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_disable_rpl_parse($link) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_dump_debug_info($link) : bool {}

/**
 * @param string $dbname
 * @return resource
 */
function maxdb_embedded_connect(string $dbname = '') {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_enable_reads_from_master($link) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_enable_rpl_parse($link) : bool {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_errno($link) : int {}

/**
 * @param resource $link
 * @return string
 */
function maxdb_error($link) : string {}

/**
 * @param resource $result
 * @param int $resulttype
 * @return mixed
 */
function maxdb_fetch_array($result, int $resulttype = 0) {}

/**
 * @param resource $result
 * @return array
 */
function maxdb_fetch_assoc($result) : array {}

/**
 * @param resource $result
 * @return mixed
 */
function maxdb_fetch_field($result) {}

/**
 * @param resource $result
 * @param int $fieldnr
 * @return mixed
 */
function maxdb_fetch_field_direct($result, int $fieldnr) {}

/**
 * @param resource $result
 * @return mixed
 */
function maxdb_fetch_fields($result) {}

/**
 * @param resource $result
 * @return array
 */
function maxdb_fetch_lengths($result) : array {}

/**
 * @param object $result
 * @return object
 */
function maxdb_fetch_object($result) {}

/**
 * @param resource $result
 * @return mixed
 */
function maxdb_fetch_row($result) {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_field_count($link) : int {}

/**
 * @param resource $result
 * @param int $fieldnr
 * @return bool
 */
function maxdb_field_seek($result, int $fieldnr) : bool {}

/**
 * @param resource $result
 * @return int
 */
function maxdb_field_tell($result) : int {}

/**
 * @param resource $result
 * @return void
 */
function maxdb_free_result($result) {}

/**
 * @return string
 */
function maxdb_get_client_info() : string {}

/**
 * @return int
 */
function maxdb_get_client_version() : int {}

/**
 * @param resource $link
 * @return string
 */
function maxdb_get_host_info($link) : string {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_get_proto_info($link) : int {}

/**
 * @param resource $link
 * @return string
 */
function maxdb_get_server_info($link) : string {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_get_server_version($link) : int {}

/**
 * @param resource $link
 * @return string
 */
function maxdb_info($link) : string {}

/**
 * @return resource
 */
function maxdb_init() {}

/**
 * @param resource $link
 * @return mixed
 */
function maxdb_insert_id($link) {}

/**
 * @param resource $link
 * @param int $processid
 * @return bool
 */
function maxdb_kill($link, int $processid) : bool {}

/**
 * @param resource $link
 * @param string $query
 * @return bool
 */
function maxdb_master_query($link, string $query) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_more_results($link) : bool {}

/**
 * @param resource $link
 * @param string $query
 * @return bool
 */
function maxdb_multi_query($link, string $query) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_next_result($link) : bool {}

/**
 * @param resource $result
 * @return int
 */
function maxdb_num_fields($result) : int {}

/**
 * @param resource $result
 * @return int
 */
function maxdb_num_rows($result) : int {}

/**
 * @param resource $link
 * @param int $option
 * @param mixed $value
 * @return bool
 */
function maxdb_options($link, int $option, $value) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_ping($link) : bool {}

/**
 * @param resource $link
 * @param string $query
 * @return resource
 */
function maxdb_prepare($link, string $query) {}

/**
 * @param resource $link
 * @param string $query
 * @param int $resultmode
 * @return mixed
 */
function maxdb_query($link, string $query, int $resultmode = 0) {}

/**
 * @param resource $link
 * @param string $hostname
 * @param string $username
 * @param string $passwd
 * @param string $dbname
 * @param int $port
 * @param string $socket
 * @return bool
 */
function maxdb_real_connect($link, string $hostname = '', string $username = '', string $passwd = '', string $dbname = '', int $port = 0, string $socket = '') : bool {}

/**
 * @param resource $link
 * @param string $escapestr
 * @return string
 */
function maxdb_real_escape_string($link, string $escapestr) : string {}

/**
 * @param resource $link
 * @param string $query
 * @return bool
 */
function maxdb_real_query($link, string $query) : bool {}

/**
 * @param int $flags
 * @return bool
 */
function maxdb_report(int $flags) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_rollback($link) : bool {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_rpl_parse_enabled($link) : int {}

/**
 * @param resource $link
 * @return bool
 */
function maxdb_rpl_probe($link) : bool {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_rpl_query_type($link) : int {}

/**
 * @param resource $link
 * @param string $dbname
 * @return bool
 */
function maxdb_select_db($link, string $dbname) : bool {}

/**
 * @param resource $link
 * @param string $query
 * @return bool
 */
function maxdb_send_query($link, string $query) : bool {}

/**
 * @return void
 */
function maxdb_server_end() {}

/**
 * @param array $server
 * @param array $groups
 * @return bool
 */
function maxdb_server_init(array $server = [], array $groups = []) : bool {}

/**
 * @param resource $link
 * @return string
 */
function maxdb_sqlstate($link) : string {}

/**
 * @param resource $link
 * @param string $key
 * @param string $cert
 * @param string $ca
 * @param string $capath
 * @param string $cipher
 * @return bool
 */
function maxdb_ssl_set($link, string $key, string $cert, string $ca, string $capath, string $cipher) : bool {}

/**
 * @param resource $link
 * @return string
 */
function maxdb_stat($link) : string {}

/**
 * @param resource $stmt
 * @return int
 */
function maxdb_stmt_affected_rows($stmt) : int {}

/**
 * @param resource $stmt
 * @param string $types
 * @param array $var
 * @param mixed $__variadic
 * @return bool
 */
function maxdb_stmt_bind_param($stmt, string $types, array &$var, &...$__variadic) : bool {}

/**
 * @param resource $stmt
 * @param mixed $var1
 * @param mixed $__variadic
 * @return bool
 */
function maxdb_stmt_bind_result($stmt, &$var1, &...$__variadic) : bool {}

/**
 * @param resource $stmt
 * @return bool
 */
function maxdb_stmt_close($stmt) : bool {}

/**
 * @param resource $stmt
 * @param int $param_nr
 * @return bool
 */
function maxdb_stmt_close_long_data($stmt, int $param_nr) : bool {}

/**
 * @param resource $statement
 * @param int $offset
 * @return bool
 */
function maxdb_stmt_data_seek($statement, int $offset) : bool {}

/**
 * @param resource $stmt
 * @return int
 */
function maxdb_stmt_errno($stmt) : int {}

/**
 * @param resource $stmt
 * @return string
 */
function maxdb_stmt_error($stmt) : string {}

/**
 * @param resource $stmt
 * @return bool
 */
function maxdb_stmt_execute($stmt) : bool {}

/**
 * @param resource $stmt
 * @return bool
 */
function maxdb_stmt_fetch($stmt) : bool {}

/**
 * @param resource $stmt
 * @return void
 */
function maxdb_stmt_free_result($stmt) {}

/**
 * @param resource $link
 * @return resource
 */
function maxdb_stmt_init($link) {}

/**
 * @param resource $stmt
 * @return int
 */
function maxdb_stmt_num_rows($stmt) : int {}

/**
 * @param resource $stmt
 * @return int
 */
function maxdb_stmt_param_count($stmt) : int {}

/**
 * @param resource $stmt
 * @param string $query
 * @return bool
 */
function maxdb_stmt_prepare($stmt, string $query) : bool {}

/**
 * @param resource $stmt
 * @return bool
 */
function maxdb_stmt_reset($stmt) : bool {}

/**
 * @param resource $stmt
 * @return resource
 */
function maxdb_stmt_result_metadata($stmt) {}

/**
 * @param resource $stmt
 * @param int $param_nr
 * @param string $data
 * @return bool
 */
function maxdb_stmt_send_long_data($stmt, int $param_nr, string $data) : bool {}

/**
 * @param resource $stmt
 * @return string
 */
function maxdb_stmt_sqlstate($stmt) : string {}

/**
 * @param resource $stmt
 * @return bool
 */
function maxdb_stmt_store_result($stmt) : bool {}

/**
 * @param resource $link
 * @return resource
 */
function maxdb_store_result($link) {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_thread_id($link) : int {}

/**
 * @return bool
 */
function maxdb_thread_safe() : bool {}

/**
 * @param resource $link
 * @return resource
 */
function maxdb_use_result($link) {}

/**
 * @param resource $link
 * @return int
 */
function maxdb_warning_count($link) : int {}
