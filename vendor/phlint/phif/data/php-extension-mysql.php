<?php

/**
 * @param resource $link_identifier
 * @return int
 */
function mysql_affected_rows(resource $link_identifier = null) : int {}

/**
 * @param resource $link_identifier
 * @return string
 */
function mysql_client_encoding(resource $link_identifier = null) : string {}

/**
 * @param resource $link_identifier
 * @return bool
 */
function mysql_close(resource $link_identifier = null) : bool {}

/**
 * @param string $server
 * @param string $username
 * @param string $password
 * @param bool $new_link
 * @param int $client_flags
 * @return resource
 */
function mysql_connect(string $server = ini_get("mysql.default_host"), string $username = ini_get("mysql.default_user"), string $password = ini_get("mysql.default_password"), bool $new_link = false, int $client_flags = 0) : resource {}

/**
 * @param string $database_name
 * @param resource $link_identifier
 * @return bool
 */
function mysql_create_db(string $database_name, resource $link_identifier = null) : bool {}

/**
 * @param resource $result
 * @param int $row_number
 * @return bool
 */
function mysql_data_seek(resource $result, int $row_number) : bool {}

/**
 * @param resource $result
 * @param int $row
 * @param mixed $field
 * @return string
 */
function mysql_db_name(resource $result, int $row, $field = null) : string {}

/**
 * @param string $database
 * @param string $query
 * @param resource $link_identifier
 * @return resource
 */
function mysql_db_query(string $database, string $query, resource $link_identifier = null) : resource {}

/**
 * @param string $database_name
 * @param resource $link_identifier
 * @return bool
 */
function mysql_drop_db(string $database_name, resource $link_identifier = null) : bool {}

/**
 * @param resource $link_identifier
 * @return int
 */
function mysql_errno(resource $link_identifier = null) : int {}

/**
 * @param resource $link_identifier
 * @return string
 */
function mysql_error(resource $link_identifier = null) : string {}

/**
 * @param string $unescaped_string
 * @return string
 */
function mysql_escape_string(string $unescaped_string) : string {}

/**
 * @param resource $result
 * @param int $result_type
 * @return array
 */
function mysql_fetch_array(resource $result, int $result_type = MYSQL_BOTH) : array {}

/**
 * @param resource $result
 * @return array
 */
function mysql_fetch_assoc(resource $result) : array {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return object
 */
function mysql_fetch_field(resource $result, int $field_offset = 0) {}

/**
 * @param resource $result
 * @return array
 */
function mysql_fetch_lengths(resource $result) : array {}

/**
 * @param resource $result
 * @param string $class_name
 * @param array $params
 * @return object
 */
function mysql_fetch_object(resource $result, string $class_name = '', array $params = []) {}

/**
 * @param resource $result
 * @return array
 */
function mysql_fetch_row(resource $result) : array {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function mysql_field_flags(resource $result, int $field_offset) : string {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return int
 */
function mysql_field_len(resource $result, int $field_offset) : int {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function mysql_field_name(resource $result, int $field_offset) : string {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return bool
 */
function mysql_field_seek(resource $result, int $field_offset) : bool {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function mysql_field_table(resource $result, int $field_offset) : string {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 */
function mysql_field_type(resource $result, int $field_offset) : string {}

/**
 * @param resource $result
 * @return bool
 */
function mysql_free_result(resource $result) : bool {}

/**
 * @return string
 */
function mysql_get_client_info() : string {}

/**
 * @param resource $link_identifier
 * @return string
 */
function mysql_get_host_info(resource $link_identifier = null) : string {}

/**
 * @param resource $link_identifier
 * @return int
 */
function mysql_get_proto_info(resource $link_identifier = null) : int {}

/**
 * @param resource $link_identifier
 * @return string
 */
function mysql_get_server_info(resource $link_identifier = null) : string {}

/**
 * @param resource $link_identifier
 * @return string
 */
function mysql_info(resource $link_identifier = null) : string {}

/**
 * @param resource $link_identifier
 * @return int
 */
function mysql_insert_id(resource $link_identifier = null) : int {}

/**
 * @param resource $link_identifier
 * @return resource
 */
function mysql_list_dbs(resource $link_identifier = null) : resource {}

/**
 * @param string $database_name
 * @param string $table_name
 * @param resource $link_identifier
 * @return resource
 */
function mysql_list_fields(string $database_name, string $table_name, resource $link_identifier = null) : resource {}

/**
 * @param resource $link_identifier
 * @return resource
 */
function mysql_list_processes(resource $link_identifier = null) : resource {}

/**
 * @param string $database
 * @param resource $link_identifier
 * @return resource
 */
function mysql_list_tables(string $database, resource $link_identifier = null) : resource {}

/**
 * @param resource $result
 * @return int
 */
function mysql_num_fields(resource $result) : int {}

/**
 * @param resource $result
 * @return int
 */
function mysql_num_rows(resource $result) : int {}

/**
 * @param string $server
 * @param string $username
 * @param string $password
 * @param int $client_flags
 * @return resource
 */
function mysql_pconnect(string $server = ini_get("mysql.default_host"), string $username = ini_get("mysql.default_user"), string $password = ini_get("mysql.default_password"), int $client_flags = 0) : resource {}

/**
 * @param resource $link_identifier
 * @return bool
 */
function mysql_ping(resource $link_identifier = null) : bool {}

/**
 * @param string $query
 * @param resource $link_identifier
 * @return mixed
 */
function mysql_query(string $query, resource $link_identifier = null) {}

/**
 * @param string $unescaped_string
 * @param resource $link_identifier
 * @return string
 */
function mysql_real_escape_string(string $unescaped_string, resource $link_identifier = null) : string {}

/**
 * @param resource $result
 * @param int $row
 * @param mixed $field
 * @return string
 */
function mysql_result(resource $result, int $row, $field = 0) : string {}

/**
 * @param string $database_name
 * @param resource $link_identifier
 * @return bool
 */
function mysql_select_db(string $database_name, resource $link_identifier = null) : bool {}

/**
 * @param string $charset
 * @param resource $link_identifier
 * @return bool
 */
function mysql_set_charset(string $charset, resource $link_identifier = null) : bool {}

/**
 * @param resource $link_identifier
 * @return string
 */
function mysql_stat(resource $link_identifier = null) : string {}

/**
 * @param resource $result
 * @param int $i
 * @return string
 */
function mysql_tablename(resource $result, int $i) : string {}

/**
 * @param resource $link_identifier
 * @return int
 */
function mysql_thread_id(resource $link_identifier = null) : int {}

/**
 * @param string $query
 * @param resource $link_identifier
 * @return resource
 */
function mysql_unbuffered_query(string $query, resource $link_identifier = null) : resource {}
