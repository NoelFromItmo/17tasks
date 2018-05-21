<?php

const MYSQLI_ASSOC = 1;
const MYSQLI_ASYNC = 8;
const MYSQLI_AUTO_INCREMENT_FLAG = 512;
const MYSQLI_BINARY_FLAG = 128;
const MYSQLI_BLOB_FLAG = 16;
const MYSQLI_BOTH = 3;
const MYSQLI_CLIENT_CAN_HANDLE_EXPIRED_PASSWORDS = 4194304;
const MYSQLI_CLIENT_COMPRESS = 32;
const MYSQLI_CLIENT_FOUND_ROWS = 2;
const MYSQLI_CLIENT_IGNORE_SPACE = 256;
const MYSQLI_CLIENT_INTERACTIVE = 1024;
const MYSQLI_CLIENT_NO_SCHEMA = 16;
const MYSQLI_CLIENT_SSL = 2048;
const MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT = 64;
const MYSQLI_CLIENT_SSL_VERIFY_SERVER_CERT = 1073741824;
const MYSQLI_CURSOR_TYPE_FOR_UPDATE = 2;
const MYSQLI_CURSOR_TYPE_NO_CURSOR = 0;
const MYSQLI_CURSOR_TYPE_READ_ONLY = 1;
const MYSQLI_CURSOR_TYPE_SCROLLABLE = 4;
const MYSQLI_DATA_TRUNCATED = 101;
const MYSQLI_DEBUG_TRACE_ENABLED = 0;
const MYSQLI_ENUM_FLAG = 256;
const MYSQLI_GROUP_FLAG = 32768;
const MYSQLI_INIT_COMMAND = 3;
const MYSQLI_MULTIPLE_KEY_FLAG = 8;
const MYSQLI_NO_DATA = 100;
const MYSQLI_NO_DEFAULT_VALUE_FLAG = 4096;
const MYSQLI_NOT_NULL_FLAG = 1;
const MYSQLI_NUM = 2;
const MYSQLI_NUM_FLAG = 32768;
const MYSQLI_ON_UPDATE_NOW_FLAG = 8192;
const MYSQLI_OPT_CAN_HANDLE_EXPIRED_PASSWORDS = 37;
const MYSQLI_OPT_CONNECT_TIMEOUT = 0;
const MYSQLI_OPT_INT_AND_FLOAT_NATIVE = 201;
const MYSQLI_OPT_LOCAL_INFILE = 8;
const MYSQLI_OPT_NET_CMD_BUFFER_SIZE = 202;
const MYSQLI_OPT_NET_READ_BUFFER_SIZE = 203;
const MYSQLI_OPT_READ_TIMEOUT = 11;
const MYSQLI_OPT_SSL_VERIFY_SERVER_CERT = 21;
const MYSQLI_PART_KEY_FLAG = 16384;
const MYSQLI_PRI_KEY_FLAG = 2;
const MYSQLI_READ_DEFAULT_FILE = 4;
const MYSQLI_READ_DEFAULT_GROUP = 5;
const MYSQLI_REFRESH_BACKUP_LOG = 2097152;
const MYSQLI_REFRESH_GRANT = 1;
const MYSQLI_REFRESH_HOSTS = 8;
const MYSQLI_REFRESH_LOG = 2;
const MYSQLI_REFRESH_MASTER = 128;
const MYSQLI_REFRESH_SLAVE = 64;
const MYSQLI_REFRESH_STATUS = 16;
const MYSQLI_REFRESH_TABLES = 4;
const MYSQLI_REFRESH_THREADS = 32;
const MYSQLI_REPORT_ALL = 255;
const MYSQLI_REPORT_ERROR = 1;
const MYSQLI_REPORT_INDEX = 4;
const MYSQLI_REPORT_OFF = 0;
const MYSQLI_REPORT_STRICT = 2;
const MYSQLI_SERVER_PS_OUT_PARAMS = 4096;
const MYSQLI_SERVER_PUBLIC_KEY = 35;
const MYSQLI_SERVER_QUERY_NO_GOOD_INDEX_USED = 16;
const MYSQLI_SERVER_QUERY_NO_INDEX_USED = 32;
const MYSQLI_SERVER_QUERY_WAS_SLOW = 2048;
const MYSQLI_SET_CHARSET_DIR = 6;
const MYSQLI_SET_CHARSET_NAME = 7;
const MYSQLI_SET_FLAG = 2048;
const MYSQLI_STMT_ATTR_CURSOR_TYPE = 1;
const MYSQLI_STMT_ATTR_PREFETCH_ROWS = 2;
const MYSQLI_STMT_ATTR_UPDATE_MAX_LENGTH = 0;
const MYSQLI_STORE_RESULT = 0;
const MYSQLI_STORE_RESULT_COPY_DATA = 16;
const MYSQLI_TIMESTAMP_FLAG = 1024;
const MYSQLI_TRANS_COR_AND_CHAIN = 1;
const MYSQLI_TRANS_COR_AND_NO_CHAIN = 2;
const MYSQLI_TRANS_COR_NO_RELEASE = 8;
const MYSQLI_TRANS_COR_RELEASE = 4;
const MYSQLI_TRANS_START_READ_ONLY = 4;
const MYSQLI_TRANS_START_READ_WRITE = 2;
const MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT = 1;
const MYSQLI_TYPE_BIT = 16;
const MYSQLI_TYPE_BLOB = 252;
const MYSQLI_TYPE_CHAR = 1;
const MYSQLI_TYPE_DATE = 10;
const MYSQLI_TYPE_DATETIME = 12;
const MYSQLI_TYPE_DECIMAL = 0;
const MYSQLI_TYPE_DOUBLE = 5;
const MYSQLI_TYPE_ENUM = 247;
const MYSQLI_TYPE_FLOAT = 4;
const MYSQLI_TYPE_GEOMETRY = 255;
const MYSQLI_TYPE_INT24 = 9;
const MYSQLI_TYPE_INTERVAL = 247;
const MYSQLI_TYPE_JSON = 245;
const MYSQLI_TYPE_LONG = 3;
const MYSQLI_TYPE_LONG_BLOB = 251;
const MYSQLI_TYPE_LONGLONG = 8;
const MYSQLI_TYPE_MEDIUM_BLOB = 250;
const MYSQLI_TYPE_NEWDATE = 14;
const MYSQLI_TYPE_NEWDECIMAL = 246;
const MYSQLI_TYPE_NULL = 6;
const MYSQLI_TYPE_SET = 248;
const MYSQLI_TYPE_SHORT = 2;
const MYSQLI_TYPE_STRING = 254;
const MYSQLI_TYPE_TIME = 11;
const MYSQLI_TYPE_TIMESTAMP = 7;
const MYSQLI_TYPE_TINY = 1;
const MYSQLI_TYPE_TINY_BLOB = 249;
const MYSQLI_TYPE_VAR_STRING = 253;
const MYSQLI_TYPE_YEAR = 13;
const MYSQLI_UNIQUE_KEY_FLAG = 4;
const MYSQLI_UNSIGNED_FLAG = 32;
const MYSQLI_USE_RESULT = 1;
const MYSQLI_ZEROFILL_FLAG = 64;

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_affected_rows(mysqli $link) : int {}

/**
 * @param mysqli $link
 * @param bool $mode
 * @return bool
 */
function mysqli_autocommit(mysqli $link, bool $mode) : bool {}

/**
 * @param mysqli $link
 * @param int $flags
 * @param string $name
 * @return bool
 */
function mysqli_begin_transaction(mysqli $link, int $flags = 0, string $name = '') : bool {}

/**
 * @param mysqli $link
 * @param string $user
 * @param string $password
 * @param string $database
 * @return bool
 */
function mysqli_change_user(mysqli $link, string $user, string $password, string $database) : bool {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_character_set_name(mysqli $link) : string {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_close(mysqli $link) : bool {}

/**
 * @param mysqli $link
 * @param int $flags
 * @param string $name
 * @return bool
 */
function mysqli_commit(mysqli $link, int $flags = 0, string $name = '') : bool {}

/**
 * @param string $host
 * @param string $username
 * @param string $passwd
 * @param string $dbname
 * @param int $port
 * @param string $socket
 * @return mysqli
 */
function mysqli_connect(string $host = ini_get("mysqli.default_host"), string $username = ini_get("mysqli.default_user"), string $passwd = ini_get("mysqli.default_pw"), string $dbname = "", int $port = ini_get("mysqli.default_port"), string $socket = ini_get("mysqli.default_socket")) : mysqli {}

/**
 * @return int
 */
function mysqli_connect_errno() : int {}

/**
 * @return string
 */
function mysqli_connect_error() : string {}

/**
 * @param mysqli_result $result
 * @param int $offset
 * @return bool
 */
function mysqli_data_seek(mysqli_result $result, int $offset) : bool {}

/**
 * @param string $message
 * @return bool
 */
function mysqli_debug(string $message) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_disable_reads_from_master(mysqli $link) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_disable_rpl_parse(mysqli $link) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_dump_debug_info(mysqli $link) : bool {}

/**
 * @return void
 */
function mysqli_embedded_server_end() {}

/**
 * @param int $start
 * @param array $arguments
 * @param array $groups
 * @return bool
 */
function mysqli_embedded_server_start(int $start, array $arguments, array $groups) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_enable_reads_from_master(mysqli $link) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_enable_rpl_parse(mysqli $link) : bool {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_errno(mysqli $link) : int {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_error(mysqli $link) : string {}

/**
 * @param mysqli $link
 * @return array
 */
function mysqli_error_list(mysqli $link) : array {}

/**
 * @param mixed $link
 * @param mixed $query
 * @param mixed $resultmode
 * @return void
 */
function mysqli_escape_string($link, $query, $resultmode) {}

/**
 * @param mixed $stmt
 * @return void
 */
function mysqli_execute($stmt) {}

/**
 * @param mysqli_result $result
 * @param int $resulttype
 * @return mixed
 */
function mysqli_fetch_all(mysqli_result $result, int $resulttype = MYSQLI_NUM) {}

/**
 * @param mysqli_result $result
 * @param int $resulttype
 * @return mixed
 */
function mysqli_fetch_array(mysqli_result $result, int $resulttype = MYSQLI_BOTH) {}

/**
 * @param mysqli_result $result
 * @return array
 */
function mysqli_fetch_assoc(mysqli_result $result) : array {}

/**
 * @param mysqli_result $result
 * @return object
 */
function mysqli_fetch_field(mysqli_result $result) {}

/**
 * @param mysqli_result $result
 * @param int $fieldnr
 * @return object
 */
function mysqli_fetch_field_direct(mysqli_result $result, int $fieldnr) {}

/**
 * @param mysqli_result $result
 * @return array
 */
function mysqli_fetch_fields(mysqli_result $result) : array {}

/**
 * @param mysqli_result $result
 * @return array
 */
function mysqli_fetch_lengths(mysqli_result $result) : array {}

/**
 * @param mysqli_result $result
 * @param string $class_name
 * @param array $params
 * @return object
 */
function mysqli_fetch_object(mysqli_result $result, string $class_name = "stdClass", array $params = []) {}

/**
 * @param mysqli_result $result
 * @return mixed
 */
function mysqli_fetch_row(mysqli_result $result) {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_field_count(mysqli $link) : int {}

/**
 * @param mysqli_result $result
 * @param int $fieldnr
 * @return bool
 */
function mysqli_field_seek(mysqli_result $result, int $fieldnr) : bool {}

/**
 * @param mysqli_result $result
 * @return int
 */
function mysqli_field_tell(mysqli_result $result) : int {}

/**
 * @param mysqli_result $result
 * @return void
 */
function mysqli_free_result(mysqli_result $result) {}

/**
 * @return array
 */
function mysqli_get_cache_stats() : array {}

/**
 * @param mysqli $link
 * @return object
 */
function mysqli_get_charset(mysqli $link) {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_get_client_info(mysqli $link) : string {}

/**
 * @return array
 */
function mysqli_get_client_stats() : array {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_get_client_version(mysqli $link) : int {}

/**
 * @param mysqli $link
 * @return array
 */
function mysqli_get_connection_stats(mysqli $link) : array {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_get_host_info(mysqli $link) : string {}

/**
 * @return array
 */
function mysqli_get_links_stats() : array {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_get_proto_info(mysqli $link) : int {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_get_server_info(mysqli $link) : string {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_get_server_version(mysqli $link) : int {}

/**
 * @param mysqli $link
 * @return mysqli_warning
 */
function mysqli_get_warnings(mysqli $link) : mysqli_warning {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_info(mysqli $link) : string {}

/**
 * @return mysqli
 */
function mysqli_init() : mysqli {}

/**
 * @param mysqli $link
 * @return mixed
 */
function mysqli_insert_id(mysqli $link) {}

/**
 * @param mysqli $link
 * @param int $processid
 * @return bool
 */
function mysqli_kill(mysqli $link, int $processid) : bool {}

/**
 * @param mysqli $link
 * @param string $query
 * @return bool
 */
function mysqli_master_query(mysqli $link, string $query) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_more_results(mysqli $link) : bool {}

/**
 * @param mysqli $link
 * @param string $query
 * @return bool
 */
function mysqli_multi_query(mysqli $link, string $query) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_next_result(mysqli $link) : bool {}

/**
 * @param mysqli_result $result
 * @return int
 */
function mysqli_num_fields(mysqli_result $result) : int {}

/**
 * @param mysqli_result $result
 * @return int
 */
function mysqli_num_rows(mysqli_result $result) : int {}

/**
 * @param mysqli $link
 * @param int $option
 * @param mixed $value
 * @return bool
 */
function mysqli_options(mysqli $link, int $option, $value) : bool {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_ping(mysqli $link) : bool {}

/**
 * @param array $read
 * @param array $error
 * @param array $reject
 * @param int $sec
 * @param int $usec
 * @return int
 */
function mysqli_poll(array &$read, array &$error, array &$reject, int $sec, int $usec = 0) : int {}

/**
 * @param mysqli $link
 * @param string $query
 * @return mysqli_stmt
 */
function mysqli_prepare(mysqli $link, string $query) : mysqli_stmt {}

/**
 * @param mysqli $link
 * @param string $query
 * @param int $resultmode
 * @return mixed
 */
function mysqli_query(mysqli $link, string $query, int $resultmode = MYSQLI_STORE_RESULT) {}

/**
 * @param mysqli $link
 * @param string $host
 * @param string $username
 * @param string $passwd
 * @param string $dbname
 * @param int $port
 * @param string $socket
 * @param int $flags
 * @return bool
 */
function mysqli_real_connect(mysqli $link, string $host = '', string $username = '', string $passwd = '', string $dbname = '', int $port = 0, string $socket = '', int $flags = 0) : bool {}

/**
 * @param mysqli $link
 * @param string $escapestr
 * @return string
 */
function mysqli_real_escape_string(mysqli $link, string $escapestr) : string {}

/**
 * @param mysqli $link
 * @param string $query
 * @return bool
 */
function mysqli_real_query(mysqli $link, string $query) : bool {}

/**
 * @param mysqli $link
 * @return mysqli_result
 */
function mysqli_reap_async_query(mysqli $link) : mysqli_result {}

/**
 * @param resource $link
 * @param int $options
 * @return bool
 */
function mysqli_refresh($link, int $options) : bool {}

/**
 * @param mysqli $link
 * @param string $name
 * @return bool
 */
function mysqli_release_savepoint(mysqli $link, string $name) : bool {}

/**
 * @param int $flags
 * @return bool
 */
function mysqli_report(int $flags) : bool {}

/**
 * @param mysqli $link
 * @param int $flags
 * @param string $name
 * @return bool
 */
function mysqli_rollback(mysqli $link, int $flags = 0, string $name = '') : bool {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_rpl_parse_enabled(mysqli $link) : int {}

/**
 * @param mysqli $link
 * @return bool
 */
function mysqli_rpl_probe(mysqli $link) : bool {}

/**
 * @param mysqli $link
 * @param string $query
 * @return int
 */
function mysqli_rpl_query_type(mysqli $link, string $query) : int {}

/**
 * @param mysqli $link
 * @param string $name
 * @return bool
 */
function mysqli_savepoint(mysqli $link, string $name) : bool {}

/**
 * @param mysqli $link
 * @param string $dbname
 * @return bool
 */
function mysqli_select_db(mysqli $link, string $dbname) : bool {}

/**
 * @param mysqli $link
 * @param string $query
 * @return bool
 */
function mysqli_send_query(mysqli $link, string $query) : bool {}

/**
 * @param mysqli $link
 * @param string $charset
 * @return bool
 */
function mysqli_set_charset(mysqli $link, string $charset) : bool {}

/**
 * @param mysqli $link
 * @return void
 */
function mysqli_set_local_infile_default(mysqli $link) {}

/**
 * @param mysqli $link
 * @param callable $read_func
 * @return bool
 */
function mysqli_set_local_infile_handler(mysqli $link, callable $read_func) : bool {}

/**
 * @return void
 */
function mysqli_set_opt() {}

/**
 * @param mysqli $link
 * @param string $query
 * @return bool
 */
function mysqli_slave_query(mysqli $link, string $query) : bool {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_sqlstate(mysqli $link) : string {}

/**
 * @param mysqli $link
 * @param string $key
 * @param string $cert
 * @param string $ca
 * @param string $capath
 * @param string $cipher
 * @return bool
 */
function mysqli_ssl_set(mysqli $link, string $key, string $cert, string $ca, string $capath, string $cipher) : bool {}

/**
 * @param mysqli $link
 * @return string
 */
function mysqli_stat(mysqli $link) : string {}

/**
 * @param mysqli_stmt $stmt
 * @return int
 */
function mysqli_stmt_affected_rows(mysqli_stmt $stmt) : int {}

/**
 * @param mysqli_stmt $stmt
 * @param int $attr
 * @return int
 */
function mysqli_stmt_attr_get(mysqli_stmt $stmt, int $attr) : int {}

/**
 * @param mysqli_stmt $stmt
 * @param int $attr
 * @param int $mode
 * @return bool
 */
function mysqli_stmt_attr_set(mysqli_stmt $stmt, int $attr, int $mode) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @param string $types
 * @param mixed $var1
 * @param mixed $__variadic
 * @return bool
 */
function mysqli_stmt_bind_param(mysqli_stmt $stmt, string $types, &$var1, &...$__variadic) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @param mixed $var1
 * @param mixed $__variadic
 * @return bool
 */
function mysqli_stmt_bind_result(mysqli_stmt $stmt, &$var1, &...$__variadic) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @return bool
 */
function mysqli_stmt_close(mysqli_stmt $stmt) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @param int $offset
 * @return void
 */
function mysqli_stmt_data_seek(mysqli_stmt $stmt, int $offset) {}

/**
 * @param mysqli_stmt $stmt
 * @return int
 */
function mysqli_stmt_errno(mysqli_stmt $stmt) : int {}

/**
 * @param mysqli_stmt $stmt
 * @return string
 */
function mysqli_stmt_error(mysqli_stmt $stmt) : string {}

/**
 * @param mysqli_stmt $stmt
 * @return array
 */
function mysqli_stmt_error_list(mysqli_stmt $stmt) : array {}

/**
 * @param mysqli_stmt $stmt
 * @return bool
 */
function mysqli_stmt_execute(mysqli_stmt $stmt) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @return bool
 */
function mysqli_stmt_fetch(mysqli_stmt $stmt) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @return int
 */
function mysqli_stmt_field_count(mysqli_stmt $stmt) : int {}

/**
 * @param mysqli_stmt $stmt
 * @return void
 */
function mysqli_stmt_free_result(mysqli_stmt $stmt) {}

/**
 * @param mysqli_stmt $stmt
 * @return mysqli_result
 */
function mysqli_stmt_get_result(mysqli_stmt $stmt) : mysqli_result {}

/**
 * @param mysqli_stmt $stmt
 * @return object
 */
function mysqli_stmt_get_warnings(mysqli_stmt $stmt) {}

/**
 * @param mysqli $link
 * @return mysqli_stmt
 */
function mysqli_stmt_init(mysqli $link) : mysqli_stmt {}

/**
 * @param mysqli_stmt $stmt
 * @return mixed
 */
function mysqli_stmt_insert_id(mysqli_stmt $stmt) {}

/**
 * @param mysql_stmt $stmt
 * @return bool
 */
function mysqli_stmt_more_results(mysql_stmt $stmt) : bool {}

/**
 * @param mysql_stmt $stmt
 * @return bool
 */
function mysqli_stmt_next_result(mysql_stmt $stmt) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @return int
 */
function mysqli_stmt_num_rows(mysqli_stmt $stmt) : int {}

/**
 * @param mysqli_stmt $stmt
 * @return int
 */
function mysqli_stmt_param_count(mysqli_stmt $stmt) : int {}

/**
 * @param mysqli_stmt $stmt
 * @param string $query
 * @return bool
 */
function mysqli_stmt_prepare(mysqli_stmt $stmt, string $query) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @return bool
 */
function mysqli_stmt_reset(mysqli_stmt $stmt) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @return mysqli_result
 */
function mysqli_stmt_result_metadata(mysqli_stmt $stmt) : mysqli_result {}

/**
 * @param mysqli_stmt $stmt
 * @param int $param_nr
 * @param string $data
 * @return bool
 */
function mysqli_stmt_send_long_data(mysqli_stmt $stmt, int $param_nr, string $data) : bool {}

/**
 * @param mysqli_stmt $stmt
 * @return string
 */
function mysqli_stmt_sqlstate(mysqli_stmt $stmt) : string {}

/**
 * @param mysqli_stmt $stmt
 * @return bool
 */
function mysqli_stmt_store_result(mysqli_stmt $stmt) : bool {}

/**
 * @param mysqli $link
 * @param int $option
 * @return mysqli_result
 */
function mysqli_store_result(mysqli $link, int $option = 0) : mysqli_result {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_thread_id(mysqli $link) : int {}

/**
 * @return bool
 */
function mysqli_thread_safe() : bool {}

/**
 * @param mysqli $link
 * @return mysqli_result
 */
function mysqli_use_result(mysqli $link) : mysqli_result {}

/**
 * @param mysqli $link
 * @return int
 */
function mysqli_warning_count(mysqli $link) : int {}

class mysqli
{
    function __construct() {}
    function autocommit(bool $mode) : bool {}
    function begin_transaction(int $flags = 0, string $name = '') : bool {}
    function change_user(string $user, string $password, string $database) : bool {}
    function character_set_name() : string {}
    function close() : bool {}
    function commit(int $flags = 0, string $name = '') : bool {}
    function connect(string $host = ini_get("mysqli.default_host"), string $username = ini_get("mysqli.default_user"), string $passwd = ini_get("mysqli.default_pw"), string $dbname = "", int $port = ini_get("mysqli.default_port"), string $socket = ini_get("mysqli.default_socket")) {}
    function debug(string $message) : bool {}
    function disable_reads_from_master() {}
    function dump_debug_info() : bool {}
    function escape_string(string $escapestr) : string {}
    function get_charset() {}
    function get_client_info() : string {}
    function get_connection_stats() : bool {}
    function get_server_info() {}
    function get_warnings() : mysqli_warning {}
    function init() : mysqli {}
    function kill(int $processid) : bool {}
    function more_results() : bool {}
    function multi_query(string $query) : bool {}
    function next_result() : bool {}
    function options(int $option, $value) : bool {}
    function ping() : bool {}
    function poll(array &$read, array &$error, array &$reject, int $sec, int $usec = 0) : int {}
    function prepare(string $query) : mysqli_stmt {}
    function query(string $query, int $resultmode = MYSQLI_STORE_RESULT) {}
    function real_connect(string $host = '', string $username = '', string $passwd = '', string $dbname = '', int $port = 0, string $socket = '', int $flags = 0) : bool {}
    function real_escape_string(string $escapestr) : string {}
    function real_query(string $query) : bool {}
    function reap_async_query() : mysqli_result {}
    function refresh(int $options) : bool {}
    function release_savepoint(string $name) : bool {}
    function rollback(int $flags = 0, string $name = '') : bool {}
    function rpl_query_type(string $query) : int {}
    function savepoint(string $name) : bool {}
    function select_db(string $dbname) : bool {}
    function send_query(string $query) : bool {}
    function set_charset(string $charset) : bool {}
    function set_local_infile_handler(mysqli $link, callable $read_func) : bool {}
    function set_opt() {}
    function ssl_set(string $key, string $cert, string $ca, string $capath, string $cipher) : bool {}
    function stat() : string {}
    function stmt_init() : mysqli_stmt {}
    function store_result(int $option = 0) : mysqli_result {}
    function thread_safe() {}
    function use_result() : mysqli_result {}
}

class mysqli_driver
{
    function embedded_server_end() {}
    function embedded_server_start(int $start, array $arguments, array $groups) : bool {}
}

class mysqli_result implements Traversable
{
    function __construct() {}
    function close() {}
    function data_seek(int $offset) : bool {}
    function fetch_all(int $resulttype = MYSQLI_NUM) {}
    function fetch_array(int $resulttype = MYSQLI_BOTH) {}
    function fetch_assoc() : array {}
    function fetch_field() {}
    function fetch_field_direct(int $fieldnr) {}
    function fetch_fields() : array {}
    function fetch_object(string $class_name = "stdClass", array $params = []) {}
    function fetch_row() {}
    function field_seek(int $fieldnr) : bool {}
    function free() {}
    function free_result() {}
}

class mysqli_sql_exception extends RuntimeException {}

class mysqli_stmt
{
    function __construct() {}
    function attr_get(int $attr) : int {}
    function attr_set(int $attr, int $mode) : bool {}
    function bind_param(string $types, &$var1, &...$__variadic) : bool {}
    function bind_result(&$var1, &...$__variadic) : bool {}
    function close() : bool {}
    function data_seek(int $offset) {}
    function execute() : bool {}
    function fetch() : bool {}
    function free_result() {}
    function get_result() : mysqli_result {}
    function get_server_info() : string {}
    function get_warnings(mysqli_stmt $stmt) {}
    function more_results() : bool {}
    function next_result() : bool {}
    function num_rows() : int {}
    function prepare(string $query) {}
    function reset() : bool {}
    function result_metadata() : mysqli_result {}
    function send_long_data(int $param_nr, string $data) : bool {}
    function store_result() : bool {}
}

class mysqli_warning
{
    function __construct() {}
    function next() {}
}
