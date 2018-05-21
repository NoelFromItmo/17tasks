<?php

const SQLITE3_ASSOC = 1;
const SQLITE3_BLOB = 4;
const SQLITE3_BOTH = 3;
const SQLITE3_DETERMINISTIC = 2048;
const SQLITE3_FLOAT = 2;
const SQLITE3_INTEGER = 1;
const SQLITE3_NULL = 5;
const SQLITE3_NUM = 2;
const SQLITE3_OPEN_CREATE = 4;
const SQLITE3_OPEN_READONLY = 1;
const SQLITE3_OPEN_READWRITE = 2;
const SQLITE3_TEXT = 3;

class SQLite3
{
    function __construct(string $filename, int $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, string $encryption_key = null) {}
    function busyTimeout(int $msecs) : bool {}
    function changes() : int {}
    function close() : bool {}
    function createAggregate(string $name, $step_callback, $final_callback, int $argument_count = -1) : bool {}
    function createCollation(string $name, callable $callback) : bool {}
    function createFunction(string $name, $callback, int $argument_count = -1, int $flags = 0) : bool {}
    function enableExceptions(bool $enableExceptions = false) : bool {}
    function escapeString(string $value) : string {}
    function exec(string $query) : bool {}
    function lastErrorCode() : int {}
    function lastErrorMsg() : string {}
    function lastInsertRowID() : int {}
    function loadExtension(string $shared_library) : bool {}
    function open(string $filename, int $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, string $encryption_key = null) {}
    function openBlob(string $table, string $column, int $rowid, string $dbname = "main", int $flags = SQLITE3_OPEN_READONLY) {}
    function prepare(string $query) : SQLite3Stmt {}
    function query(string $query) : SQLite3Result {}
    function querySingle(string $query, bool $entire_row = false) {}
    function version() : array {}
}

class SQLite3Result
{
    function __construct() {}
    function columnName(int $column_number) : string {}
    function columnType(int $column_number) : int {}
    function fetchArray(int $mode = SQLITE3_BOTH) : array {}
    function finalize() : bool {}
    function numColumns() : int {}
    function reset() : bool {}
}

class SQLite3Stmt
{
    function __construct() {}
    function bindParam($sql_param, &$param, int $type = 0) : bool {}
    function bindValue($sql_param, $value, int $type = 0) : bool {}
    function clear() : bool {}
    function close() : bool {}
    function execute() : SQLite3Result {}
    function paramCount() : int {}
    function readOnly() : bool {}
    function reset() : bool {}
}
