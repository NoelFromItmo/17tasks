<?php

const PGSQL_ASSOC = 1;
const PGSQL_BAD_RESPONSE = 5;
const PGSQL_BOTH = 3;
const PGSQL_COMMAND_OK = 1;
const PGSQL_CONNECT_ASYNC = 4;
const PGSQL_CONNECT_FORCE_NEW = 2;
const PGSQL_CONNECTION_AUTH_OK = 5;
const PGSQL_CONNECTION_AWAITING_RESPONSE = 4;
const PGSQL_CONNECTION_BAD = 1;
const PGSQL_CONNECTION_MADE = 3;
const PGSQL_CONNECTION_OK = 0;
const PGSQL_CONNECTION_SETENV = 6;
const PGSQL_CONNECTION_STARTED = 2;
const PGSQL_CONV_FORCE_NULL = 4;
const PGSQL_CONV_IGNORE_DEFAULT = 2;
const PGSQL_CONV_IGNORE_NOT_NULL = 8;
const PGSQL_COPY_IN = 4;
const PGSQL_COPY_OUT = 3;
const PGSQL_DIAG_CONTEXT = 87;
const PGSQL_DIAG_INTERNAL_POSITION = 112;
const PGSQL_DIAG_INTERNAL_QUERY = 113;
const PGSQL_DIAG_MESSAGE_DETAIL = 68;
const PGSQL_DIAG_MESSAGE_HINT = 72;
const PGSQL_DIAG_MESSAGE_PRIMARY = 77;
const PGSQL_DIAG_SEVERITY = 83;
const PGSQL_DIAG_SOURCE_FILE = 70;
const PGSQL_DIAG_SOURCE_FUNCTION = 82;
const PGSQL_DIAG_SOURCE_LINE = 76;
const PGSQL_DIAG_SQLSTATE = 67;
const PGSQL_DIAG_STATEMENT_POSITION = 80;
const PGSQL_DML_ASYNC = 1024;
const PGSQL_DML_ESCAPE = 4096;
const PGSQL_DML_EXEC = 512;
const PGSQL_DML_NO_CONV = 256;
const PGSQL_DML_STRING = 2048;
const PGSQL_EMPTY_QUERY = 0;
const PGSQL_ERRORS_DEFAULT = 1;
const PGSQL_ERRORS_TERSE = 0;
const PGSQL_ERRORS_VERBOSE = 2;
const PGSQL_FATAL_ERROR = 7;
const PGSQL_LIBPQ_VERSION = '';
const PGSQL_LIBPQ_VERSION_STR = '';
const PGSQL_NONFATAL_ERROR = 6;
const PGSQL_NOTICE_ALL = 2;
const PGSQL_NOTICE_CLEAR = 3;
const PGSQL_NOTICE_LAST = 1;
const PGSQL_NUM = 2;
const PGSQL_POLLING_ACTIVE = 4;
const PGSQL_POLLING_FAILED = 0;
const PGSQL_POLLING_OK = 3;
const PGSQL_POLLING_READING = 1;
const PGSQL_POLLING_WRITING = 2;
const PGSQL_SEEK_CUR = 1;
const PGSQL_SEEK_END = 2;
const PGSQL_SEEK_SET = 0;
const PGSQL_STATUS_LONG = 1;
const PGSQL_STATUS_STRING = 2;
const PGSQL_TRANSACTION_ACTIVE = 1;
const PGSQL_TRANSACTION_IDLE = 0;
const PGSQL_TRANSACTION_INERROR = 3;
const PGSQL_TRANSACTION_INTRANS = 2;
const PGSQL_TRANSACTION_UNKNOWN = 4;
const PGSQL_TUPLES_OK = 2;

/**
 * @param resource $result
 * @return int
 */
function pg_affected_rows($result) : int {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_cancel_query($connection) : bool {}

/**
 * @param resource $connection
 * @return string
 */
function pg_client_encoding($connection = null) : string {}

/**
 * @param mixed $connection
 * @return void
 */
function pg_clientencoding($connection) {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_close($connection = null) : bool {}

/**
 * @param mixed $result
 * @return void
 */
function pg_cmdtuples($result) {}

/**
 * @param string $connection_string
 * @param int $connect_type
 * @param mixed $host
 * @param mixed $port
 * @param mixed $options
 * @param mixed $tty
 * @param mixed $database
 * @return resource
 */
function pg_connect(string $connection_string, int $connect_type = 0, $host, $port, $options, $tty, $database) {}

/**
 * @param resource $connection
 * @return int
 */
function pg_connect_poll($connection) : int {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_connection_busy($connection) : bool {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_connection_reset($connection) : bool {}

/**
 * @param resource $connection
 * @return int
 */
function pg_connection_status($connection) : int {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_consume_input($connection) : bool {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param array $assoc_array
 * @param int $options
 * @return array
 */
function pg_convert($connection, string $table_name, array $assoc_array, int $options = 0) : array {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param array $rows
 * @param string $delimiter
 * @param string $null_as
 * @return bool
 */
function pg_copy_from($connection, string $table_name, array $rows, string $delimiter = '', string $null_as = '') : bool {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param string $delimiter
 * @param string $null_as
 * @return array
 */
function pg_copy_to($connection, string $table_name, string $delimiter = '', string $null_as = '') : array {}

/**
 * @param resource $connection
 * @return string
 */
function pg_dbname($connection = null) : string {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param array $assoc_array
 * @param int $options
 * @return mixed
 */
function pg_delete($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC) {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_end_copy($connection = null) : bool {}

/**
 * @param mixed $connection
 * @return void
 */
function pg_errormessage($connection) {}

/**
 * @param resource $connection
 * @param string $data
 * @return string
 */
function pg_escape_bytea($connection = null, string $data = '') : string {}

/**
 * @param resource $connection
 * @param string $data
 * @return string
 */
function pg_escape_identifier($connection = null, string $data = '') : string {}

/**
 * @param resource $connection
 * @param string $data
 * @return string
 */
function pg_escape_literal($connection = null, string $data = '') : string {}

/**
 * @param resource $connection
 * @param string $data
 * @return string
 */
function pg_escape_string($connection = null, string $data = '') : string {}

/**
 * @param mixed $connection
 * @param mixed $query
 * @return void
 */
function pg_exec($connection, $query) {}

/**
 * @param resource $connection
 * @param string $stmtname
 * @param array $params
 * @return resource
 */
function pg_execute($connection = null, string $stmtname = '', array $params = []) {}

/**
 * @param resource $result
 * @param int $result_type
 * @return array
 */
function pg_fetch_all($result, int $result_type = PGSQL_ASSOC) : array {}

/**
 * @param resource $result
 * @param int $column
 * @return array
 */
function pg_fetch_all_columns($result, int $column = 0) : array {}

/**
 * @param resource $result
 * @param int $row
 * @param int $result_type
 * @return array
 */
function pg_fetch_array($result, int $row = 0, int $result_type = PGSQL_BOTH) : array {}

/**
 * @param resource $result
 * @param int $row
 * @return array
 */
function pg_fetch_assoc($result, int $row = 0) : array {}

/**
 * @param resource $result
 * @param int $row
 * @param string $class_name
 * @param array $params
 * @param mixed $ctor_params
 * @return object
 */
function pg_fetch_object($result, int $row = 0, string $class_name = '', array $params = [], $ctor_params) {}

/**
 * @param resource $result
 * @param mixed $field
 * @param mixed $field
 * @return string
 */
function pg_fetch_result($result, int $field, $field) : string {}

/**
 * @param resource $result
 * @param int $row
 * @param mixed $result_type
 * @return array
 */
function pg_fetch_row($result, int $row = 0, $result_type) : array {}

/**
 * @param resource $result
 * @param mixed $field
 * @param mixed $field
 * @return int
 */
function pg_field_is_null($result, int $field, $field) : int {}

/**
 * @param resource $result
 * @param int $field_number
 * @return string
 */
function pg_field_name($result, int $field_number) : string {}

/**
 * @param resource $result
 * @param string $field_name
 * @return int
 */
function pg_field_num($result, string $field_name) : int {}

/**
 * @param resource $result
 * @param mixed $field_name_or_number
 * @param mixed $field_name_or_number
 * @return int
 */
function pg_field_prtlen($result, int $field_name_or_number, $field_name_or_number) : int {}

/**
 * @param resource $result
 * @param int $field_number
 * @return int
 */
function pg_field_size($result, int $field_number) : int {}

/**
 * @param resource $result
 * @param int $field_number
 * @param bool $oid_only
 * @return mixed
 */
function pg_field_table($result, int $field_number, bool $oid_only = false) {}

/**
 * @param resource $result
 * @param int $field_number
 * @return string
 */
function pg_field_type($result, int $field_number) : string {}

/**
 * @param resource $result
 * @param int $field_number
 * @return int
 */
function pg_field_type_oid($result, int $field_number) : int {}

/**
 * @param mixed $result
 * @param mixed $row
 * @param mixed $field_name_or_number
 * @return void
 */
function pg_fieldisnull($result, $row, $field_name_or_number) {}

/**
 * @param mixed $result
 * @param mixed $field_number
 * @return void
 */
function pg_fieldname($result, $field_number) {}

/**
 * @param mixed $result
 * @param mixed $field_name
 * @return void
 */
function pg_fieldnum($result, $field_name) {}

/**
 * @param mixed $result
 * @param mixed $row
 * @param mixed $field_name_or_number
 * @return void
 */
function pg_fieldprtlen($result, $row, $field_name_or_number) {}

/**
 * @param mixed $result
 * @param mixed $field_number
 * @return void
 */
function pg_fieldsize($result, $field_number) {}

/**
 * @param mixed $result
 * @param mixed $field_number
 * @return void
 */
function pg_fieldtype($result, $field_number) {}

/**
 * @param resource $connection
 * @return mixed
 */
function pg_flush($connection) {}

/**
 * @param resource $result
 * @return bool
 */
function pg_free_result($result) : bool {}

/**
 * @param mixed $result
 * @return void
 */
function pg_freeresult($result) {}

/**
 * @param resource $connection
 * @param int $result_type
 * @return array
 */
function pg_get_notify($connection, int $result_type = 0) : array {}

/**
 * @param resource $connection
 * @return int
 */
function pg_get_pid($connection) : int {}

/**
 * @param resource $connection
 * @return resource
 */
function pg_get_result($connection = null) {}

/**
 * @param mixed $result
 * @return void
 */
function pg_getlastoid($result) {}

/**
 * @param resource $connection
 * @return string
 */
function pg_host($connection = null) : string {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param array $assoc_array
 * @param int $options
 * @return mixed
 */
function pg_insert($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC) {}

/**
 * @param resource $connection
 * @return string
 */
function pg_last_error($connection = null) : string {}

/**
 * @param resource $connection
 * @param int $option
 * @return mixed
 */
function pg_last_notice($connection, int $option = PGSQL_NOTICE_LAST) {}

/**
 * @param resource $result
 * @return string
 */
function pg_last_oid($result) : string {}

/**
 * @param resource $large_object
 * @return bool
 */
function pg_lo_close($large_object) : bool {}

/**
 * @param mixed $object_id
 * @param mixed $object_id
 * @return int
 */
function pg_lo_create($object_id = null, $object_id = null) : int {}

/**
 * @param resource $connection
 * @param int $oid
 * @param string $pathname
 * @return bool
 */
function pg_lo_export($connection = null, int $oid = 0, string $pathname = '') : bool {}

/**
 * @param resource $connection
 * @param string $pathname
 * @param mixed $object_id
 * @return int
 */
function pg_lo_import($connection = null, string $pathname = '', $object_id = null) : int {}

/**
 * @param resource $connection
 * @param int $oid
 * @param string $mode
 * @return resource
 */
function pg_lo_open($connection, int $oid, string $mode) {}

/**
 * @param resource $large_object
 * @param int $len
 * @return string
 */
function pg_lo_read($large_object, int $len = 8192) : string {}

/**
 * @param resource $large_object
 * @return int
 */
function pg_lo_read_all($large_object) : int {}

/**
 * @param resource $large_object
 * @param int $offset
 * @param int $whence
 * @return bool
 */
function pg_lo_seek($large_object, int $offset, int $whence = PGSQL_SEEK_CUR) : bool {}

/**
 * @param resource $large_object
 * @return int
 */
function pg_lo_tell($large_object) : int {}

/**
 * @param resource $large_object
 * @param int $size
 * @return bool
 */
function pg_lo_truncate($large_object, int $size) : bool {}

/**
 * @param resource $connection
 * @param int $oid
 * @return bool
 */
function pg_lo_unlink($connection, int $oid) : bool {}

/**
 * @param resource $large_object
 * @param string $data
 * @param int $len
 * @return int
 */
function pg_lo_write($large_object, string $data, int $len = 0) : int {}

/**
 * @param mixed $large_object
 * @return void
 */
function pg_loclose($large_object) {}

/**
 * @param mixed $connection
 * @param mixed $large_object_id
 * @return void
 */
function pg_locreate($connection, $large_object_id) {}

/**
 * @param mixed $connection
 * @param mixed $objoid
 * @param mixed $filename
 * @return void
 */
function pg_loexport($connection, $objoid, $filename) {}

/**
 * @param mixed $connection
 * @param mixed $filename
 * @param mixed $large_object_oid
 * @return void
 */
function pg_loimport($connection, $filename, $large_object_oid) {}

/**
 * @param mixed $connection
 * @param mixed $large_object_oid
 * @param mixed $mode
 * @return void
 */
function pg_loopen($connection, $large_object_oid, $mode) {}

/**
 * @param mixed $large_object
 * @param mixed $len
 * @return void
 */
function pg_loread($large_object, $len) {}

/**
 * @param mixed $large_object
 * @return void
 */
function pg_loreadall($large_object) {}

/**
 * @param mixed $connection
 * @param mixed $large_object_oid
 * @return void
 */
function pg_lounlink($connection, $large_object_oid) {}

/**
 * @param mixed $large_object
 * @param mixed $buf
 * @param mixed $len
 * @return void
 */
function pg_lowrite($large_object, $buf, $len) {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param bool $extended
 * @return array
 */
function pg_meta_data($connection, string $table_name, bool $extended = false) : array {}

/**
 * @param resource $result
 * @return int
 */
function pg_num_fields($result) : int {}

/**
 * @param resource $result
 * @return int
 */
function pg_num_rows($result) : int {}

/**
 * @param mixed $result
 * @return void
 */
function pg_numfields($result) {}

/**
 * @param mixed $result
 * @return void
 */
function pg_numrows($result) {}

/**
 * @param resource $connection
 * @return string
 */
function pg_options($connection = null) : string {}

/**
 * @param resource $connection
 * @param string $param_name
 * @return string
 */
function pg_parameter_status($connection = null, string $param_name = '') : string {}

/**
 * @param string $connection_string
 * @param int $connect_type
 * @param mixed $port
 * @param mixed $options
 * @param mixed $tty
 * @param mixed $database
 * @return resource
 */
function pg_pconnect(string $connection_string, int $connect_type = 0, $port, $options, $tty, $database) {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_ping($connection = null) : bool {}

/**
 * @param resource $connection
 * @return int
 */
function pg_port($connection = null) : int {}

/**
 * @param resource $connection
 * @param string $stmtname
 * @param string $query
 * @return resource
 */
function pg_prepare($connection = null, string $stmtname = '', string $query = '') {}

/**
 * @param resource $connection
 * @param string $data
 * @return bool
 */
function pg_put_line($connection = null, string $data = '') : bool {}

/**
 * @param resource $connection
 * @param string $query
 * @return resource
 */
function pg_query($connection = null, string $query = '') {}

/**
 * @param resource $connection
 * @param string $query
 * @param array $params
 * @return resource
 */
function pg_query_params($connection = null, string $query = '', array $params = []) {}

/**
 * @param mixed $connection
 * @return void
 */
function pg_result($connection) {}

/**
 * @param resource $result
 * @return string
 */
function pg_result_error($result) : string {}

/**
 * @param resource $result
 * @param int $fieldcode
 * @return string
 */
function pg_result_error_field($result, int $fieldcode) : string {}

/**
 * @param resource $result
 * @param int $offset
 * @return bool
 */
function pg_result_seek($result, int $offset) : bool {}

/**
 * @param resource $result
 * @param int $type
 * @return mixed
 */
function pg_result_status($result, int $type = PGSQL_STATUS_LONG) {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param array $assoc_array
 * @param int $options
 * @param int $result_type
 * @return mixed
 */
function pg_select($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC, int $result_type = PGSQL_ASSOC) {}

/**
 * @param resource $connection
 * @param string $stmtname
 * @param array $params
 * @return bool
 */
function pg_send_execute($connection, string $stmtname, array $params) : bool {}

/**
 * @param resource $connection
 * @param string $stmtname
 * @param string $query
 * @return bool
 */
function pg_send_prepare($connection, string $stmtname, string $query) : bool {}

/**
 * @param resource $connection
 * @param string $query
 * @return bool
 */
function pg_send_query($connection, string $query) : bool {}

/**
 * @param resource $connection
 * @param string $query
 * @param array $params
 * @return bool
 */
function pg_send_query_params($connection, string $query, array $params) : bool {}

/**
 * @param resource $connection
 * @param string $encoding
 * @return int
 */
function pg_set_client_encoding($connection = null, string $encoding = '') : int {}

/**
 * @param resource $connection
 * @param int $verbosity
 * @return int
 */
function pg_set_error_verbosity($connection = null, int $verbosity = 0) : int {}

/**
 * @param mixed $connection
 * @param mixed $encoding
 * @return void
 */
function pg_setclientencoding($connection, $encoding) {}

/**
 * @param resource $connection
 * @return resource
 */
function pg_socket($connection) {}

/**
 * @param string $pathname
 * @param string $mode
 * @param resource $connection
 * @return bool
 */
function pg_trace(string $pathname, string $mode = "w", $connection = null) : bool {}

/**
 * @param resource $connection
 * @return int
 */
function pg_transaction_status($connection) : int {}

/**
 * @param resource $connection
 * @return string
 */
function pg_tty($connection = null) : string {}

/**
 * @param string $data
 * @return string
 */
function pg_unescape_bytea(string $data) : string {}

/**
 * @param resource $connection
 * @return bool
 */
function pg_untrace($connection = null) : bool {}

/**
 * @param resource $connection
 * @param string $table_name
 * @param array $data
 * @param array $condition
 * @param int $options
 * @return mixed
 */
function pg_update($connection, string $table_name, array $data, array $condition, int $options = PGSQL_DML_EXEC) {}

/**
 * @param resource $connection
 * @return array
 */
function pg_version($connection = null) : array {}
