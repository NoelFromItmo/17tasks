<?php

/**
 * @return array
 */
function pdo_drivers() : array {}

class PDO
{
    function __construct() {}
    function __sleep() {}
    function __wakeup() {}
    function beginTransaction() : bool {}
    function commit() : bool {}
    function cubrid_schema(int $schema_type, string $table_name = '', string $col_name = '') : array {}
    function errorCode() : string {}
    function errorInfo() : array {}
    function exec(string $statement) : int {}
    function getAttribute(int $attribute) {}
    function getAvailableDrivers() : array {}
    function inTransaction() : bool {}
    function lastInsertId(string $name = null) : string {}
    function pgsqlCopyFromArray(string $table_name, array $rows, string $delimiter = '\\t', string $null_as = "\\\\N", string $fields = '') : bool {}
    function pgsqlCopyFromFile(string $table_name, string $filename, string $delimiter = '\\t', string $null_as = "\\\\N", string $fields = '') : bool {}
    function pgsqlCopyToArray(string $table_name, string $delimiter = '\\t', string $null_as = "\\\\N", string $fields = '') : array {}
    function pgsqlCopyToFile(string $table_name, string $filename, string $delimiter = '\\t', string $null_as = "\\\\N", string $fields = '') : bool {}
    function pgsqlGetNotify(int $result_type = PDO::FETCH_USE_DEFAULT, int $ms_timeout = 0) : array {}
    function pgsqlGetPid() : int {}
    function pgsqlLOBCreate() : string {}
    function pgsqlLOBOpen(string $oid, string $mode = "rb") {}
    function pgsqlLOBUnlink(string $oid) : bool {}
    function prepare(string $statement, array $driver_options = []) : PDOStatement {}
    function query(string $statement, int $PDO::FETCH_INTO, string $object, array $ctorargs) : PDOStatement {}
    function quote(string $string, int $parameter_type = PDO::PARAM_STR) : string {}
    function rollBack() : bool {}
    function setAttribute(int $attribute, $value) : bool {}
    function sqliteCreateAggregate(string $function_name, callable $step_func, callable $finalize_func, int $num_args = 0) : bool {}
    function sqliteCreateCollation(string $name, callable $callback) : bool {}
    function sqliteCreateFunction(string $function_name, callable $callback, int $num_args = -1, int $flags = 0) : bool {}
}

class PDOException extends RuntimeException {}

class PDORow {}

class PDOStatement implements Traversable
{
    function __sleep() {}
    function __wakeup() {}
    function bindColumn($column, &$param, int $type = 0, int $maxlen = 0, $driverdata = null) : bool {}
    function bindParam($parameter, &$variable, int $data_type = PDO::PARAM_STR, int $length = 0, $driver_options = null) : bool {}
    function bindValue($parameter, $value, int $data_type = PDO::PARAM_STR) : bool {}
    function closeCursor() : bool {}
    function columnCount() : int {}
    function debugDumpParams() {}
    function errorCode() : string {}
    function errorInfo() : array {}
    function execute(array $input_parameters = []) : bool {}
    function fetch(int $fetch_style = 0, int $cursor_orientation = PDO::FETCH_ORI_NEXT, int $cursor_offset = 0) {}
    function fetchAll(int $fetch_style = 0, $fetch_argument = null, array $ctor_args = []) : array {}
    function fetchColumn(int $column_number = 0) {}
    function fetchObject(string $class_name = "stdClass", array $ctor_args = []) {}
    function getAttribute(int $attribute) {}
    function getColumnMeta(int $column) : array {}
    function nextRowset() : bool {}
    function rowCount() : int {}
    function setAttribute(int $attribute, $value) : bool {}
    function setFetchMode(int $PDO::FETCH_INTO, string $object, array $ctorargs) : bool {}
}
