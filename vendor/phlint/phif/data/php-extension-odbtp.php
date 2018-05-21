<?php

/**
 * @param resource $stmt
 * @param string $param_name
 * @param mixed $var
 * @param int $type
 * @param bool $is_output
 * @param bool $is_null
 * @param int $maxlen
 * @return bool
 */
function mssql_bind($stmt, string $param_name, &$var, int $type, bool $is_output = false, bool $is_null = false, int $maxlen = -1) : bool {}

/**
 * @param resource $link_identifier
 * @return bool
 */
function mssql_close($link_identifier = null) : bool {}

/**
 * @param string $servername
 * @param string $username
 * @param string $password
 * @param bool $new_link
 * @return resource
 */
function mssql_connect(string $servername = '', string $username = '', string $password = '', bool $new_link = false) {}

/**
 * @param resource $result_identifier
 * @param int $row_number
 * @return bool
 */
function mssql_data_seek($result_identifier, int $row_number) : bool {}

/**
 * @param resource $stmt
 * @param bool $skip_results
 * @return mixed
 */
function mssql_execute($stmt, bool $skip_results = false) {}

/**
 * @param resource $result
 * @param int $result_type
 * @return array
 */
function mssql_fetch_array($result, int $result_type = MSSQL_BOTH) : array {}

/**
 * @param resource $result_id
 * @return array
 */
function mssql_fetch_assoc($result_id) : array {}

/**
 * @param resource $result
 * @return int
 */
function mssql_fetch_batch($result) : int {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return object
 */
function mssql_fetch_field($result, int $field_offset = -1) {}

/**
 * @param resource $result
 * @return object
 */
function mssql_fetch_object($result) {}

/**
 * @param resource $result
 * @return array
 */
function mssql_fetch_row($result) : array {}

/**
 * @param resource $result
 * @param int $offset
 * @return int
 */
function mssql_field_length($result, int $offset = -1) : int {}

/**
 * @param resource $result
 * @param int $offset
 * @return string
 */
function mssql_field_name($result, int $offset = -1) : string {}

/**
 * @param resource $result
 * @param int $field_offset
 * @return bool
 */
function mssql_field_seek($result, int $field_offset) : bool {}

/**
 * @param resource $result
 * @param int $offset
 * @return string
 */
function mssql_field_type($result, int $offset = -1) : string {}

/**
 * @param resource $result
 * @return bool
 */
function mssql_free_result($result) : bool {}

/**
 * @param resource $stmt
 * @return bool
 */
function mssql_free_statement($stmt) : bool {}

/**
 * @return string
 */
function mssql_get_last_message() : string {}

/**
 * @param string $binary
 * @param bool $short_format
 * @return string
 */
function mssql_guid_string(string $binary, bool $short_format = false) : string {}

/**
 * @param string $sp_name
 * @param resource $link_identifier
 * @return resource
 */
function mssql_init(string $sp_name, $link_identifier = null) {}

/**
 * @param int $severity
 * @return void
 */
function mssql_min_error_severity(int $severity) {}

/**
 * @param int $severity
 * @return void
 */
function mssql_min_message_severity(int $severity) {}

/**
 * @param resource $result_id
 * @return bool
 */
function mssql_next_result($result_id) : bool {}

/**
 * @param resource $result
 * @return int
 */
function mssql_num_fields($result) : int {}

/**
 * @param resource $result
 * @return int
 */
function mssql_num_rows($result) : int {}

/**
 * @param string $servername
 * @param string $username
 * @param string $password
 * @param bool $new_link
 * @return resource
 */
function mssql_pconnect(string $servername = '', string $username = '', string $password = '', bool $new_link = false) {}

/**
 * @param string $query
 * @param resource $link_identifier
 * @param int $batch_size
 * @return mixed
 */
function mssql_query(string $query, $link_identifier = null, int $batch_size = 0) {}

/**
 * @param resource $result
 * @param int $row
 * @param mixed $field
 * @return string
 */
function mssql_result($result, int $row, $field) : string {}

/**
 * @param resource $link_identifier
 * @return int
 */
function mssql_rows_affected($link_identifier) : int {}

/**
 * @param string $database_name
 * @param resource $link_identifier
 * @return bool
 */
function mssql_select_db(string $database_name, $link_identifier = null) : bool {}
