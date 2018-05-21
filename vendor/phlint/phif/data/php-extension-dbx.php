<?php

/**
 * @param object $link_identifier
 * @return int
 */
function dbx_close($link_identifier) : int {}

/**
 * @param array $row_a
 * @param array $row_b
 * @param string $column_key
 * @param int $flags
 * @return int
 */
function dbx_compare(array $row_a, array $row_b, string $column_key, int $flags = DBX_CMP_ASC | DBX_CMP_NATIVE) : int {}

/**
 * @param mixed $module
 * @param string $host
 * @param string $database
 * @param string $username
 * @param string $password
 * @param int $persistent
 * @return object
 */
function dbx_connect($module, string $host, string $database, string $username, string $password, int $persistent = 0) {}

/**
 * @param object $link_identifier
 * @return string
 */
function dbx_error($link_identifier) : string {}

/**
 * @param object $link_identifier
 * @param string $text
 * @return string
 */
function dbx_escape_string($link_identifier, string $text) : string {}

/**
 * @param object $result_identifier
 * @return mixed
 */
function dbx_fetch_row($result_identifier) {}

/**
 * @param object $link_identifier
 * @param string $sql_statement
 * @param int $flags
 * @return mixed
 */
function dbx_query($link_identifier, string $sql_statement, int $flags = 0) {}

/**
 * @param object $result
 * @param string $user_compare_function
 * @return bool
 */
function dbx_sort($result, string $user_compare_function) : bool {}
