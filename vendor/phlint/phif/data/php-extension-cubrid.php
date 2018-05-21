<?php

/**
 * @param resource $req_identifier
 * @return int
 */
function cubrid_affected_rows($req_identifier = null) : int {}

/**
 * @param resource $req_identifier
 * @param int $bind_index
 * @param mixed $bind_value
 * @param string $bind_value_type
 * @return bool
 */
function cubrid_bind($req_identifier, int $bind_index, $bind_value, string $bind_value_type = '') : bool {}

/**
 * @param resource $conn_identifier
 * @return string
 */
function cubrid_client_encoding($conn_identifier = null) : string {}

/**
 * @param resource $conn_identifier
 * @return bool
 */
function cubrid_close($conn_identifier = null) : bool {}

/**
 * @param resource $req_identifier
 * @return bool
 */
function cubrid_close_prepare($req_identifier) : bool {}

/**
 * @param resource $req_identifier
 * @return bool
 */
function cubrid_close_request($req_identifier) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @return array
 */
function cubrid_col_get($conn_identifier, string $oid, string $attr_name) : array {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @return int
 */
function cubrid_col_size($conn_identifier, string $oid, string $attr_name) : int {}

/**
 * @param resource $req_identifier
 * @return array
 */
function cubrid_column_names($req_identifier) : array {}

/**
 * @param resource $req_identifier
 * @return array
 */
function cubrid_column_types($req_identifier) : array {}

/**
 * @param resource $conn_identifier
 * @return bool
 */
function cubrid_commit($conn_identifier) : bool {}

/**
 * @param string $host
 * @param int $port
 * @param string $dbname
 * @param string $userid
 * @param string $passwd
 * @param bool $new_link
 * @return resource
 */
function cubrid_connect(string $host, int $port, string $dbname, string $userid = '', string $passwd = '', bool $new_link = false) {}

/**
 * @param string $conn_url
 * @param string $userid
 * @param string $passwd
 * @param bool $new_link
 * @return resource
 */
function cubrid_connect_with_url(string $conn_url, string $userid = '', string $passwd = '', bool $new_link = false) {}

/**
 * @param resource $req_identifier
 * @return string
 */
function cubrid_current_oid($req_identifier) : string {}

/**
 * @param resource $result
 * @param int $row_number
 * @return bool
 */
function cubrid_data_seek($result, int $row_number) : bool {}

/**
 * @param array $result
 * @param int $index
 * @return string
 */
function cubrid_db_name(array $result, int $index) : string {}

/**
 * @param resource $conn_identifier
 * @return bool
 */
function cubrid_disconnect($conn_identifier = null) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @return bool
 */
function cubrid_drop($conn_identifier, string $oid) : bool {}

/**
 * @param resource $conn_identifier
 * @return int
 */
function cubrid_errno($conn_identifier = null) : int {}

/**
 * @param resource $connection
 * @return string
 */
function cubrid_error($connection = null) : string {}

/**
 * @return int
 */
function cubrid_error_code() : int {}

/**
 * @return int
 */
function cubrid_error_code_facility() : int {}

/**
 * @return string
 */
function cubrid_error_msg() : string {}

/**
 * @param resource $request_identifier
 * @param int $option
 * @param int $option
 * @return bool
 */
function cubrid_execute($request_identifier, int $option = 0, int $option = 0) : bool {}

/**
 * @param resource $result
 * @param int $type
 * @return mixed
 */
function cubrid_fetch($result, int $type = CUBRID_BOTH) {}

/**
 * @param resource $result
 * @param int $type
 * @return array
 */
function cubrid_fetch_array($result, int $type = CUBRID_BOTH) : array {}

/**
 * @param resource $result
 * @param int $type
 * @return array
 */
function cubrid_fetch_assoc($result, int $type = 0) : array {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return object
 */
function cubrid_fetch_field($result, int $field_offset = 0) {}

/**
 * @param resource $result
 * @return array
 */
function cubrid_fetch_lengths($result) : array {}

/**
 * @param resource $result
 * @param string $class_name
 * @param array $params
 * @param int $type
 * @return object
 */
function cubrid_fetch_object($result, string $class_name = '', array $params = [], int $type = 0) {}

/**
 * @param resource $result
 * @param int $type
 * @return array
 */
function cubrid_fetch_row($result, int $type = 0) : array {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function cubrid_field_flags($result, int $field_offset) : string {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return int
 */
function cubrid_field_len($result, int $field_offset) : int {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function cubrid_field_name($result, int $field_offset) : string {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return bool
 */
function cubrid_field_seek($result, int $field_offset = 0) : bool {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function cubrid_field_table($result, int $field_offset) : string {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function cubrid_field_type($result, int $field_offset) : string {}

/**
 * @param resource $req_identifier
 * @return bool
 */
function cubrid_free_result($req_identifier) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param mixed $attr
 * @return mixed
 */
function cubrid_get($conn_identifier, string $oid, $attr = null) {}

/**
 * @param resource $conn_identifier
 * @return bool
 */
function cubrid_get_autocommit($conn_identifier) : bool {}

/**
 * @param resource $conn_identifier
 * @return string
 */
function cubrid_get_charset($conn_identifier) : string {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @return string
 */
function cubrid_get_class_name($conn_identifier, string $oid) : string {}

/**
 * @return string
 */
function cubrid_get_client_info() : string {}

/**
 * @param resource $conn_identifier
 * @return array
 */
function cubrid_get_db_parameter($conn_identifier) : array {}

/**
 * @param resource $req_identifier
 * @return int
 */
function cubrid_get_query_timeout($req_identifier) : int {}

/**
 * @param resource $conn_identifier
 * @return string
 */
function cubrid_get_server_info($conn_identifier) : string {}

/**
 * @param resource $conn_identifier
 * @return string
 */
function cubrid_insert_id($conn_identifier = null) : string {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @return int
 */
function cubrid_is_instance($conn_identifier, string $oid) : int {}

/**
 * @param resource $conn_identifier
 * @return array
 */
function cubrid_list_dbs($conn_identifier = null) : array {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $file_name
 * @return int
 */
function cubrid_load_from_glo($conn_identifier, string $oid, string $file_name) : int {}

/**
 * @param resource $req_identifier
 * @param int $bind_index
 * @param mixed $bind_value
 * @param string $bind_value_type
 * @return bool
 */
function cubrid_lob2_bind($req_identifier, int $bind_index, $bind_value, string $bind_value_type = '') : bool {}

/**
 * @param resource $lob_identifier
 * @return bool
 */
function cubrid_lob2_close($lob_identifier) : bool {}

/**
 * @param resource $lob_identifier
 * @param string $file_name
 * @return bool
 */
function cubrid_lob2_export($lob_identifier, string $file_name) : bool {}

/**
 * @param resource $lob_identifier
 * @param string $file_name
 * @return bool
 */
function cubrid_lob2_import($lob_identifier, string $file_name) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $type
 * @return resource
 */
function cubrid_lob2_new($conn_identifier = null, string $type = "BLOB") {}

/**
 * @param resource $lob_identifier
 * @param int $len
 * @return string
 */
function cubrid_lob2_read($lob_identifier, int $len) : string {}

/**
 * @param resource $lob_identifier
 * @param int $offset
 * @param int $origin
 * @return bool
 */
function cubrid_lob2_seek($lob_identifier, int $offset, int $origin = CUBRID_CURSOR_CURRENT) : bool {}

/**
 * @param resource $lob_identifier
 * @param string $offset
 * @param int $origin
 * @return bool
 */
function cubrid_lob2_seek64($lob_identifier, string $offset, int $origin = CUBRID_CURSOR_CURRENT) : bool {}

/**
 * @param resource $lob_identifier
 * @return int
 */
function cubrid_lob2_size($lob_identifier) : int {}

/**
 * @param resource $lob_identifier
 * @return string
 */
function cubrid_lob2_size64($lob_identifier) : string {}

/**
 * @param resource $lob_identifier
 * @return int
 */
function cubrid_lob2_tell($lob_identifier) : int {}

/**
 * @param resource $lob_identifier
 * @return string
 */
function cubrid_lob2_tell64($lob_identifier) : string {}

/**
 * @param resource $lob_identifier
 * @param string $buf
 * @return bool
 */
function cubrid_lob2_write($lob_identifier, string $buf) : bool {}

/**
 * @param array $lob_identifier_array
 * @return bool
 */
function cubrid_lob_close(array $lob_identifier_array) : bool {}

/**
 * @param resource $conn_identifier
 * @param resource $lob_identifier
 * @param string $path_name
 * @return bool
 */
function cubrid_lob_export($conn_identifier, $lob_identifier, string $path_name) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $sql
 * @return array
 */
function cubrid_lob_get($conn_identifier, string $sql) : array {}

/**
 * @param resource $conn_identifier
 * @param resource $lob_identifier
 * @return bool
 */
function cubrid_lob_send($conn_identifier, $lob_identifier) : bool {}

/**
 * @param resource $lob_identifier
 * @return string
 */
function cubrid_lob_size($lob_identifier) : string {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @return bool
 */
function cubrid_lock_read($conn_identifier, string $oid) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @return bool
 */
function cubrid_lock_write($conn_identifier, string $oid) : bool {}

/**
 * @param resource $req_identifier
 * @param int $offset
 * @param int $origin
 * @return bool
 */
function cubrid_move_cursor($req_identifier, int $offset, int $origin = CUBRID_CURSOR_CURRENT) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $class_name
 * @param string $file_name
 * @return string
 */
function cubrid_new_glo($conn_identifier, string $class_name, string $file_name) : string {}

/**
 * @param resource $result
 * @return bool
 */
function cubrid_next_result($result) : bool {}

/**
 * @param resource $result
 * @return int
 */
function cubrid_num_cols($result) : int {}

/**
 * @param resource $result
 * @return int
 */
function cubrid_num_fields($result) : int {}

/**
 * @param resource $result
 * @return int
 */
function cubrid_num_rows($result) : int {}

/**
 * @param string $host
 * @param int $port
 * @param string $dbname
 * @param string $userid
 * @param string $passwd
 * @return resource
 */
function cubrid_pconnect(string $host, int $port, string $dbname, string $userid = '', string $passwd = '') {}

/**
 * @param string $conn_url
 * @param string $userid
 * @param string $passwd
 * @return resource
 */
function cubrid_pconnect_with_url(string $conn_url, string $userid = '', string $passwd = '') {}

/**
 * @param resource $conn_identifier
 * @return bool
 */
function cubrid_ping($conn_identifier = null) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $prepare_stmt
 * @param int $option
 * @return resource
 */
function cubrid_prepare($conn_identifier, string $prepare_stmt, int $option = 0) {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr
 * @param mixed $value
 * @return bool
 */
function cubrid_put($conn_identifier, string $oid, string $attr = '', $value = null) : bool {}

/**
 * @param string $query
 * @param resource $conn_identifier
 * @return resource
 */
function cubrid_query(string $query, $conn_identifier = null) {}

/**
 * @param string $unescaped_string
 * @param resource $conn_identifier
 * @return string
 */
function cubrid_real_escape_string(string $unescaped_string, $conn_identifier = null) : string {}

/**
 * @param resource $result
 * @param int $row
 * @param mixed $field
 * @return string
 */
function cubrid_result($result, int $row, $field = 0) : string {}

/**
 * @param resource $conn_identifier
 * @return bool
 */
function cubrid_rollback($conn_identifier) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $file_name
 * @return int
 */
function cubrid_save_to_glo($conn_identifier, string $oid, string $file_name) : int {}

/**
 * @param resource $conn_identifier
 * @param int $schema_type
 * @param string $class_name
 * @param string $attr_name
 * @return array
 */
function cubrid_schema($conn_identifier, int $schema_type, string $class_name = '', string $attr_name = '') : array {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @return int
 */
function cubrid_send_glo($conn_identifier, string $oid) : int {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param int $index
 * @return bool
 */
function cubrid_seq_drop($conn_identifier, string $oid, string $attr_name, int $index) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param int $index
 * @param string $seq_element
 * @return bool
 */
function cubrid_seq_insert($conn_identifier, string $oid, string $attr_name, int $index, string $seq_element) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param int $index
 * @param string $seq_element
 * @return bool
 */
function cubrid_seq_put($conn_identifier, string $oid, string $attr_name, int $index, string $seq_element) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param string $set_element
 * @return bool
 */
function cubrid_set_add($conn_identifier, string $oid, string $attr_name, string $set_element) : bool {}

/**
 * @param resource $conn_identifier
 * @param bool $mode
 * @return bool
 */
function cubrid_set_autocommit($conn_identifier, bool $mode) : bool {}

/**
 * @param resource $conn_identifier
 * @param int $param_type
 * @param int $param_value
 * @return bool
 */
function cubrid_set_db_parameter($conn_identifier, int $param_type, int $param_value) : bool {}

/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param string $set_element
 * @return bool
 */
function cubrid_set_drop($conn_identifier, string $oid, string $attr_name, string $set_element) : bool {}

/**
 * @param resource $req_identifier
 * @param int $timeout
 * @return bool
 */
function cubrid_set_query_timeout($req_identifier, int $timeout) : bool {}

/**
 * @param string $query
 * @param resource $conn_identifier
 * @return resource
 */
function cubrid_unbuffered_query(string $query, $conn_identifier = null) {}

/**
 * @return string
 */
function cubrid_version() : string {}
