<?php

/**
 * @param resource $statement
 * @param string $name
 * @param array $var_array
 * @param int $max_table_length
 * @param int $max_item_length
 * @param int $type
 * @return bool
 */
function oci_bind_array_by_name($statement, string $name, array &$var_array, int $max_table_length, int $max_item_length = -1, int $type = SQLT_AFC) : bool {}

/**
 * @param resource $statement
 * @param string $bv_name
 * @param mixed $variable
 * @param int $maxlength
 * @param int $type
 * @return bool
 */
function oci_bind_by_name($statement, string $bv_name, &$variable, int $maxlength = -1, int $type = SQLT_CHR) : bool {}

/**
 * @param resource $statement
 * @return bool
 */
function oci_cancel($statement) : bool {}

/**
 * @return string
 */
function oci_client_version() : string {}

/**
 * @param resource $connection
 * @return bool
 */
function oci_close($connection) : bool {}

/**
 * @param resource $connection
 * @return bool
 */
function oci_commit($connection) : bool {}

/**
 * @param string $username
 * @param string $password
 * @param string $connection_string
 * @param string $character_set
 * @param int $session_mode
 * @return resource
 */
function oci_connect(string $username, string $password, string $connection_string = '', string $character_set = '', int $session_mode = 0) {}

/**
 * @param resource $statement
 * @param string $column_name
 * @param mixed $variable
 * @param int $type
 * @return bool
 */
function oci_define_by_name($statement, string $column_name, &$variable, int $type = SQLT_CHR) : bool {}

/**
 * @param resource $resource
 * @return array
 */
function oci_error($resource = null) : array {}

/**
 * @param resource $statement
 * @param int $mode
 * @return bool
 */
function oci_execute($statement, int $mode = OCI_COMMIT_ON_SUCCESS) : bool {}

/**
 * @param resource $statement
 * @return bool
 */
function oci_fetch($statement) : bool {}

/**
 * @param resource $statement
 * @param array $output
 * @param int $skip
 * @param int $maxrows
 * @param int $flags
 * @return int
 */
function oci_fetch_all($statement, array &$output, int $skip = 0, int $maxrows = -1, int $flags = OCI_FETCHSTATEMENT_BY_COLUMN + OCI_ASSOC) : int {}

/**
 * @param resource $statement
 * @param int $mode
 * @return array
 */
function oci_fetch_array($statement, int $mode = 0) : array {}

/**
 * @param resource $statement
 * @return array
 */
function oci_fetch_assoc($statement) : array {}

/**
 * @param resource $statement
 * @return object
 */
function oci_fetch_object($statement) {}

/**
 * @param resource $statement
 * @return array
 */
function oci_fetch_row($statement) : array {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return bool
 */
function oci_field_is_null($statement, $field) : bool {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return string
 */
function oci_field_name($statement, $field) : string {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return int
 */
function oci_field_precision($statement, $field) : int {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return int
 */
function oci_field_scale($statement, $field) : int {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return int
 */
function oci_field_size($statement, $field) : int {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return mixed
 */
function oci_field_type($statement, $field) {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return int
 */
function oci_field_type_raw($statement, $field) : int {}

/**
 * @param resource $descriptor
 * @return bool
 */
function oci_free_descriptor($descriptor) : bool {}

/**
 * @param resource $statement
 * @return bool
 */
function oci_free_statement($statement) : bool {}

/**
 * @param resource $statement
 * @return resource
 */
function oci_get_implicit_resultset($statement) {}

/**
 * @param bool $onoff
 * @return void
 */
function oci_internal_debug(bool $onoff) {}

/**
 * @param OCI-Lob $lob_to
 * @param OCI-Lob $lob_from
 * @param int $length
 * @return bool
 */
function oci_lob_copy(OCI-Lob $lob_to, OCI-Lob $lob_from, int $length = 0) : bool {}

/**
 * @param OCI-Lob $lob1
 * @param OCI-Lob $lob2
 * @return bool
 */
function oci_lob_is_equal(OCI-Lob $lob1, OCI-Lob $lob2) : bool {}

/**
 * @param resource $connection
 * @param string $tdo
 * @param string $schema
 * @return OCI-Collection
 */
function oci_new_collection($connection, string $tdo, string $schema = null) : OCI-Collection {}

/**
 * @param string $username
 * @param string $password
 * @param string $connection_string
 * @param string $character_set
 * @param int $session_mode
 * @return resource
 */
function oci_new_connect(string $username, string $password, string $connection_string = '', string $character_set = '', int $session_mode = 0) {}

/**
 * @param resource $connection
 * @return resource
 */
function oci_new_cursor($connection) {}

/**
 * @param resource $connection
 * @param int $type
 * @return OCI-Lob
 */
function oci_new_descriptor($connection, int $type = OCI_DTYPE_LOB) : OCI-Lob {}

/**
 * @param resource $statement
 * @return int
 */
function oci_num_fields($statement) : int {}

/**
 * @param resource $statement
 * @return int
 */
function oci_num_rows($statement) : int {}

/**
 * @param resource $connection
 * @param string $sql_text
 * @return resource
 */
function oci_parse($connection, string $sql_text) {}

/**
 * @param string $dbname
 * @param string $username
 * @param string $old_password
 * @param string $new_password
 * @return resource
 */
function oci_password_change(string $dbname, string $username, string $old_password, string $new_password) : bool {}

/**
 * @param string $username
 * @param string $password
 * @param string $connection_string
 * @param string $character_set
 * @param int $session_mode
 * @return resource
 */
function oci_pconnect(string $username, string $password, string $connection_string = '', string $character_set = '', int $session_mode = 0) {}

/**
 * @param resource $connection
 * @param mixed $callbackFn
 * @return bool
 */
function oci_register_taf_callback($connection, $callbackFn = null) : bool {}

/**
 * @param resource $statement
 * @param mixed $field
 * @return mixed
 */
function oci_result($statement, $field) {}

/**
 * @param resource $connection
 * @return bool
 */
function oci_rollback($connection) : bool {}

/**
 * @param resource $connection
 * @return string
 */
function oci_server_version($connection) : string {}

/**
 * @param resource $connection
 * @param string $action_name
 * @return bool
 */
function oci_set_action($connection, string $action_name) : bool {}

/**
 * @param resource $connection
 * @param string $client_identifier
 * @return bool
 */
function oci_set_client_identifier($connection, string $client_identifier) : bool {}

/**
 * @param resource $connection
 * @param string $client_info
 * @return bool
 */
function oci_set_client_info($connection, string $client_info) : bool {}

/**
 * @param string $edition
 * @return bool
 */
function oci_set_edition(string $edition) : bool {}

/**
 * @param resource $connection
 * @param string $module_name
 * @return bool
 */
function oci_set_module_name($connection, string $module_name) : bool {}

/**
 * @param resource $statement
 * @param int $rows
 * @return bool
 */
function oci_set_prefetch($statement, int $rows) : bool {}

/**
 * @param resource $statement
 * @return string
 */
function oci_statement_type($statement) : string {}

/**
 * @param resource $connection
 * @return bool
 */
function oci_unregister_taf_callback($connection) : bool {}

class OCI-Collection
{
    function append($value) : bool {}
    function assign(OCI-Collection $from) : bool {}
    function assignElem(int $index, $value) : bool {}
    function free() : bool {}
    function getElem(int $index) {}
    function max() : int {}
    function size() : int {}
    function trim(int $num) : bool {}
}

class OCI-Lob
{
    function append(OCI-Lob $lob_from) : bool {}
    function close() : bool {}
    function eof() : bool {}
    function erase(int $offset = 0, int $length = 0) : int {}
    function export(string $filename, int $start = 0, int $length = 0) : bool {}
    function flush(int $flag = 0) : bool {}
    function free() : bool {}
    function getBuffering() : bool {}
    function import(string $filename) : bool {}
    function load() : string {}
    function read(int $length) : string {}
    function rewind() : bool {}
    function save(string $data, int $offset = 0) : bool {}
    function seek(int $offset, int $whence = OCI_SEEK_SET) : bool {}
    function setBuffering(bool $on_off) : bool {}
    function size() : int {}
    function tell() : int {}
    function truncate(int $length = 0) : bool {}
    function write(string $data, int $length = 0) : int {}
    function writeTemporary(string $data, int $lob_type = OCI_TEMP_CLOB) : bool {}
}
