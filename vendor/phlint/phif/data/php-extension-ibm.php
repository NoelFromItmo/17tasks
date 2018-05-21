<?php

/**
 * @param resource $connection
 * @param bool $value
 * @return mixed
 */
function db2_autocommit($connection, bool $value = false) {}

/**
 * @param resource $stmt
 * @param int $parameter-number
 * @param string $variable-name
 * @param int $parameter-type
 * @param int $data-type
 * @param int $precision
 * @param int $scale
 * @return bool
 */
function db2_bind_param($stmt, int $parameter-number, string $variable-name, int $parameter-type = 0, int $data-type = 0, int $precision = -1, int $scale = 0) : bool {}

/**
 * @param resource $connection
 * @return object
 */
function db2_client_info($connection) {}

/**
 * @param resource $connection
 * @return bool
 */
function db2_close($connection) : bool {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table-name
 * @param string $column-name
 * @return resource
 */
function db2_column_privileges($connection, string $qualifier = '', string $schema = '', string $table-name = '', string $column-name = '') {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table-name
 * @param string $column-name
 * @return resource
 */
function db2_columns($connection, string $qualifier = '', string $schema = '', string $table-name = '', string $column-name = '') {}

/**
 * @param resource $connection
 * @return bool
 */
function db2_commit($connection) : bool {}

/**
 * @param resource $connection
 * @return string
 */
function db2_conn_error($connection = null) : string {}

/**
 * @param resource $connection
 * @return string
 */
function db2_conn_errormsg($connection = null) : string {}

/**
 * @param string $database
 * @param string $username
 * @param string $password
 * @param array $options
 * @return resource
 */
function db2_connect(string $database, string $username, string $password, array $options = []) {}

/**
 * @param resource $stmt
 * @return int
 */
function db2_cursor_type($stmt) : int {}

/**
 * @param string $string_literal
 * @return string
 */
function db2_escape_string(string $string_literal) : string {}

/**
 * @param resource $connection
 * @param string $statement
 * @param array $options
 * @return resource
 */
function db2_exec($connection, string $statement, array $options = []) {}

/**
 * @param resource $stmt
 * @param array $parameters
 * @return bool
 */
function db2_execute($stmt, array $parameters = []) : bool {}

/**
 * @param resource $stmt
 * @param int $row_number
 * @return array
 */
function db2_fetch_array($stmt, int $row_number = -1) : array {}

/**
 * @param resource $stmt
 * @param int $row_number
 * @return array
 */
function db2_fetch_assoc($stmt, int $row_number = -1) : array {}

/**
 * @param resource $stmt
 * @param int $row_number
 * @return array
 */
function db2_fetch_both($stmt, int $row_number = -1) : array {}

/**
 * @param resource $stmt
 * @param int $row_number
 * @return object
 */
function db2_fetch_object($stmt, int $row_number = -1) {}

/**
 * @param resource $stmt
 * @param int $row_number
 * @return bool
 */
function db2_fetch_row($stmt, int $row_number = 0) : bool {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return int
 */
function db2_field_display_size($stmt, $column) : int {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return string
 */
function db2_field_name($stmt, $column) : string {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return int
 */
function db2_field_num($stmt, $column) : int {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return int
 */
function db2_field_precision($stmt, $column) : int {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return int
 */
function db2_field_scale($stmt, $column) : int {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return string
 */
function db2_field_type($stmt, $column) : string {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return int
 */
function db2_field_width($stmt, $column) : int {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table-name
 * @return resource
 */
function db2_foreign_keys($connection, string $qualifier, string $schema, string $table-name) {}

/**
 * @param resource $stmt
 * @return bool
 */
function db2_free_result($stmt) : bool {}

/**
 * @param resource $stmt
 * @return bool
 */
function db2_free_stmt($stmt) : bool {}

/**
 * @param resource $resource
 * @param string $option
 * @return string
 */
function db2_get_option($resource, string $option) : string {}

/**
 * @param resource $resource
 * @return string
 */
function db2_last_insert_id($resource) : string {}

/**
 * @param resource $stmt
 * @param int $colnum
 * @param int $length
 * @return string
 */
function db2_lob_read($stmt, int $colnum, int $length) : string {}

/**
 * @param resource $stmt
 * @return resource
 */
function db2_next_result($stmt) {}

/**
 * @param resource $stmt
 * @return int
 */
function db2_num_fields($stmt) : int {}

/**
 * @param resource $stmt
 * @return int
 */
function db2_num_rows($stmt) : int {}

/**
 * @param resource $resource
 * @return bool
 */
function db2_pclose($resource) : bool {}

/**
 * @param string $database
 * @param string $username
 * @param string $password
 * @param array $options
 * @return resource
 */
function db2_pconnect(string $database, string $username, string $password, array $options = []) {}

/**
 * @param resource $connection
 * @param string $statement
 * @param array $options
 * @return resource
 */
function db2_prepare($connection, string $statement, array $options = []) {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table-name
 * @return resource
 */
function db2_primary_keys($connection, string $qualifier, string $schema, string $table-name) {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $procedure
 * @param string $parameter
 * @return resource
 */
function db2_procedure_columns($connection, string $qualifier, string $schema, string $procedure, string $parameter) {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $procedure
 * @return resource
 */
function db2_procedures($connection, string $qualifier, string $schema, string $procedure) {}

/**
 * @param resource $stmt
 * @param mixed $column
 * @return mixed
 */
function db2_result($stmt, $column) {}

/**
 * @param resource $connection
 * @return bool
 */
function db2_rollback($connection) : bool {}

/**
 * @param resource $connection
 * @return object
 */
function db2_server_info($connection) {}

/**
 * @param resource $resource
 * @param array $options
 * @param int $type
 * @return bool
 */
function db2_set_option($resource, array $options, int $type) : bool {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table_name
 * @param int $scope
 * @return resource
 */
function db2_special_columns($connection, string $qualifier, string $schema, string $table_name, int $scope) {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table-name
 * @param bool $unique
 * @return resource
 */
function db2_statistics($connection, string $qualifier, string $schema, string $table-name, bool $unique) {}

/**
 * @param resource $stmt
 * @return string
 */
function db2_stmt_error($stmt = null) : string {}

/**
 * @param resource $stmt
 * @return string
 */
function db2_stmt_errormsg($stmt = null) : string {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table_name
 * @return resource
 */
function db2_table_privileges($connection, string $qualifier = '', string $schema = '', string $table_name = '') {}

/**
 * @param resource $connection
 * @param string $qualifier
 * @param string $schema
 * @param string $table-name
 * @param string $table-type
 * @return resource
 */
function db2_tables($connection, string $qualifier = '', string $schema = '', string $table-name = '', string $table-type = '') {}
