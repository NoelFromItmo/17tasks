<?php

/**
 * @param resource $link
 * @return bool
 */
function ingres_autocommit($link) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function ingres_autocommit_state($link) : bool {}

/**
 * @param resource $link
 * @return string
 */
function ingres_charset($link) : string {}

/**
 * @param resource $link
 * @return bool
 */
function ingres_close($link) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function ingres_commit($link) : bool {}

/**
 * @param string $database
 * @param string $username
 * @param string $password
 * @param array $options
 * @return resource
 */
function ingres_connect(string $database = '', string $username = '', string $password = '', array $options = []) {}

/**
 * @param resource $result
 * @return string
 */
function ingres_cursor($result) : string {}

/**
 * @param resource $link
 * @return int
 */
function ingres_errno($link = null) : int {}

/**
 * @param resource $link
 * @return string
 */
function ingres_error($link = null) : string {}

/**
 * @param resource $link
 * @return string
 */
function ingres_errsqlstate($link = null) : string {}

/**
 * @param resource $link
 * @param string $source_string
 * @return string
 */
function ingres_escape_string($link, string $source_string) : string {}

/**
 * @param resource $result
 * @param array $params
 * @param string $types
 * @return bool
 */
function ingres_execute($result, array $params = [], string $types = '') : bool {}

/**
 * @param resource $result
 * @param int $result_type
 * @return array
 */
function ingres_fetch_array($result, int $result_type = 0) : array {}

/**
 * @param resource $result
 * @return array
 */
function ingres_fetch_assoc($result) : array {}

/**
 * @param resource $result
 * @param int $result_type
 * @return object
 */
function ingres_fetch_object($result, int $result_type = 0) {}

/**
 * @param resource $result
 * @return int
 */
function ingres_fetch_proc_return($result) : int {}

/**
 * @param resource $result
 * @return array
 */
function ingres_fetch_row($result) : array {}

/**
 * @param resource $result
 * @param int $index
 * @return int
 */
function ingres_field_length($result, int $index) : int {}

/**
 * @param resource $result
 * @param int $index
 * @return string
 */
function ingres_field_name($result, int $index) : string {}

/**
 * @param resource $result
 * @param int $index
 * @return bool
 */
function ingres_field_nullable($result, int $index) : bool {}

/**
 * @param resource $result
 * @param int $index
 * @return int
 */
function ingres_field_precision($result, int $index) : int {}

/**
 * @param resource $result
 * @param int $index
 * @return int
 */
function ingres_field_scale($result, int $index) : int {}

/**
 * @param resource $result
 * @param int $index
 * @return string
 */
function ingres_field_type($result, int $index) : string {}

/**
 * @param resource $result
 * @return bool
 */
function ingres_free_result($result) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function ingres_next_error($link = null) : bool {}

/**
 * @param resource $result
 * @return int
 */
function ingres_num_fields($result) : int {}

/**
 * @param resource $result
 * @return int
 */
function ingres_num_rows($result) : int {}

/**
 * @param string $database
 * @param string $username
 * @param string $password
 * @param array $options
 * @return resource
 */
function ingres_pconnect(string $database = '', string $username = '', string $password = '', array $options = []) {}

/**
 * @param resource $link
 * @param string $query
 * @return mixed
 */
function ingres_prepare($link, string $query) {}

/**
 * @param resource $link
 * @param string $query
 * @param array $params
 * @param string $types
 * @return mixed
 */
function ingres_query($link, string $query, array $params = [], string $types = '') {}

/**
 * @param resource $result
 * @param int $position
 * @return bool
 */
function ingres_result_seek($result, int $position) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function ingres_rollback($link) : bool {}

/**
 * @param resource $link
 * @param array $options
 * @return bool
 */
function ingres_set_environment($link, array $options) : bool {}

/**
 * @param resource $link
 * @param string $query
 * @param array $params
 * @param string $types
 * @return mixed
 */
function ingres_unbuffered_query($link, string $query, array $params = [], string $types = '') {}
