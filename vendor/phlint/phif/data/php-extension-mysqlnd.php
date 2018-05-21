<?php

/**
 * @param mixed $connection
 * @return array
 */
function mysqlnd_memcache_get_config($connection) : array {}

/**
 * @param mixed $mysql_connection
 * @param Memcached $memcache_connection
 * @param string $pattern
 * @param callback $callback
 * @return bool
 */
function mysqlnd_memcache_set($mysql_connection, Memcached $memcache_connection = null, string $pattern = '', callback $callback = null) : bool {}

/**
 * @param mixed $connection
 * @return array
 */
function mysqlnd_ms_dump_servers($connection) : array {}

/**
 * @param mixed $connection
 * @param mixed $table_name
 * @return array
 */
function mysqlnd_ms_fabric_select_global($connection, $table_name) : array {}

/**
 * @param mixed $connection
 * @param mixed $table_name
 * @param mixed $shard_key
 * @return array
 */
function mysqlnd_ms_fabric_select_shard($connection, $table_name, $shard_key) : array {}

/**
 * @param mixed $connection
 * @return string
 */
function mysqlnd_ms_get_last_gtid($connection) : string {}

/**
 * @param mixed $connection
 * @return array
 */
function mysqlnd_ms_get_last_used_connection($connection) : array {}

/**
 * @return array
 */
function mysqlnd_ms_get_stats() : array {}

/**
 * @param string $table_name
 * @param string $wildcard
 * @return bool
 */
function mysqlnd_ms_match_wild(string $table_name, string $wildcard) : bool {}

/**
 * @param string $query
 * @return int
 */
function mysqlnd_ms_query_is_select(string $query) : int {}

/**
 * @param mixed $connection
 * @param int $service_level
 * @param int $service_level_option
 * @param mixed $option_value
 * @return bool
 */
function mysqlnd_ms_set_qos($connection, int $service_level, int $service_level_option = 0, $option_value = null) : bool {}

/**
 * @param string $function
 * @return bool
 */
function mysqlnd_ms_set_user_pick_server(string $function) : bool {}

/**
 * @param mixed $connection
 * @param string $gtrid
 * @param int $timeout
 * @return int
 */
function mysqlnd_ms_xa_begin($connection, string $gtrid, int $timeout = 0) : int {}

/**
 * @param mixed $connection
 * @param string $gtrid
 * @return int
 */
function mysqlnd_ms_xa_commit($connection, string $gtrid) : int {}

/**
 * @param mixed $connection
 * @param string $gtrid
 * @param bool $ignore_max_retries
 * @return int
 */
function mysqlnd_ms_xa_gc($connection, string $gtrid = '', bool $ignore_max_retries = false) : int {}

/**
 * @param mixed $connection
 * @param string $gtrid
 * @return int
 */
function mysqlnd_ms_xa_rollback($connection, string $gtrid) : int {}

/**
 * @return bool
 */
function mysqlnd_qc_clear_cache() : bool {}

/**
 * @return array
 */
function mysqlnd_qc_get_available_handlers() : array {}

/**
 * @return array
 */
function mysqlnd_qc_get_cache_info() : array {}

/**
 * @return array
 */
function mysqlnd_qc_get_core_stats() : array {}

/**
 * @return array
 */
function mysqlnd_qc_get_normalized_query_trace_log() : array {}

/**
 * @return array
 */
function mysqlnd_qc_get_query_trace_log() : array {}

/**
 * @param int $condition_type
 * @param mixed $condition
 * @param mixed $condition_option
 * @return bool
 */
function mysqlnd_qc_set_cache_condition(int $condition_type, $condition, $condition_option) : bool {}

/**
 * @param string $callback
 * @return mixed
 */
function mysqlnd_qc_set_is_select(string $callback) {}

/**
 * @param string $handler
 * @return bool
 */
function mysqlnd_qc_set_storage_handler(string $handler) : bool {}

/**
 * @param string $get_hash
 * @param string $find_query_in_cache
 * @param string $return_to_cache
 * @param string $add_query_to_cache_if_not_exists
 * @param string $query_is_select
 * @param string $update_query_run_time_stats
 * @param string $get_stats
 * @param string $clear_cache
 * @return bool
 */
function mysqlnd_qc_set_user_handlers(string $get_hash, string $find_query_in_cache, string $return_to_cache, string $add_query_to_cache_if_not_exists, string $query_is_select, string $update_query_run_time_stats, string $get_stats, string $clear_cache) : bool {}

/**
 * @param mysqli $mysql_connection
 * @return resource
 */
function mysqlnd_uh_convert_to_mysqlnd(mysqli &$mysql_connection) {}

/**
 * @param MysqlndUhConnection $connection_proxy
 * @param mysqli $mysqli_connection
 * @return bool
 */
function mysqlnd_uh_set_connection_proxy(MysqlndUhConnection &$connection_proxy, mysqli &$mysqli_connection = null) : bool {}

/**
 * @param MysqlndUhStatement $statement_proxy
 * @return bool
 */
function mysqlnd_uh_set_statement_proxy(MysqlndUhStatement &$statement_proxy) : bool {}

class MysqlndUhConnection
{
    function __construct() {}
    function changeUser(mysqlnd_connection $connection, string $user, string $password, string $database, bool $silent, int $passwd_len) : bool {}
    function charsetName(mysqlnd_connection $connection) : string {}
    function close(mysqlnd_connection $connection, int $close_type) : bool {}
    function connect(mysqlnd_connection $connection, string $host, string $use, string $password, string $database, int $port, string $socket, int $mysql_flags) : bool {}
    function endPSession(mysqlnd_connection $connection) : bool {}
    function escapeString(mysqlnd_connection $connection, string $escape_string) : string {}
    function getAffectedRows(mysqlnd_connection $connection) : int {}
    function getErrorNumber(mysqlnd_connection $connection) : int {}
    function getErrorString(mysqlnd_connection $connection) : string {}
    function getFieldCount(mysqlnd_connection $connection) : int {}
    function getHostInformation(mysqlnd_connection $connection) : string {}
    function getLastInsertId(mysqlnd_connection $connection) : int {}
    function getLastMessage(mysqlnd_connection $connection) {}
    function getProtocolInformation(mysqlnd_connection $connection) : string {}
    function getServerInformation(mysqlnd_connection $connection) : string {}
    function getServerStatistics(mysqlnd_connection $connection) : string {}
    function getServerVersion(mysqlnd_connection $connection) : int {}
    function getSqlstate(mysqlnd_connection $connection) : string {}
    function getStatistics(mysqlnd_connection $connection) : array {}
    function getThreadId(mysqlnd_connection $connection) : int {}
    function getWarningCount(mysqlnd_connection $connection) : int {}
    function init(mysqlnd_connection $connection) : bool {}
    function killConnection(mysqlnd_connection $connection, int $pid) : bool {}
    function listFields(mysqlnd_connection $connection, string $table, string $achtung_wild) : array {}
    function listMethod(mysqlnd_connection $connection, string $query, string $achtung_wild, string $par1) {}
    function moreResults(mysqlnd_connection $connection) : bool {}
    function nextResult(mysqlnd_connection $connection) : bool {}
    function ping(mysqlnd_connection $connection) : bool {}
    function query(mysqlnd_connection $connection, string $query) : bool {}
    function queryReadResultsetHeader(mysqlnd_connection $connection, mysqlnd_statement $mysqlnd_stmt) : bool {}
    function reapQuery(mysqlnd_connection $connection) : bool {}
    function refreshServer(mysqlnd_connection $connection, int $options) : bool {}
    function restartPSession(mysqlnd_connection $connection) : bool {}
    function selectDb(mysqlnd_connection $connection, string $database) : bool {}
    function sendClose(mysqlnd_connection $connection) : bool {}
    function sendQuery(mysqlnd_connection $connection, string $query) : bool {}
    function serverDumpDebugInformation(mysqlnd_connection $connection) : bool {}
    function setAutocommit(mysqlnd_connection $connection, int $mode) : bool {}
    function setCharset(mysqlnd_connection $connection, string $charset) : bool {}
    function setClientOption(mysqlnd_connection $connection, int $option, int $value) : bool {}
    function setServerOption(mysqlnd_connection $connection, int $option) {}
    function shutdownServer(string $MYSQLND_UH_RES_MYSQLND_NAME, string $level) {}
    function simpleCommand(mysqlnd_connection $connection, int $command, string $arg, int $ok_packet, bool $silent, bool $ignore_upsert_status) : bool {}
    function simpleCommandHandleResponse(mysqlnd_connection $connection, int $ok_packet, bool $silent, int $command, bool $ignore_upsert_status) : bool {}
    function sslSet(mysqlnd_connection $connection, string $key, string $cert, string $ca, string $capath, string $cipher) : bool {}
    function stmtInit(mysqlnd_connection $connection) {}
    function storeResult(mysqlnd_connection $connection) {}
    function txCommit(mysqlnd_connection $connection) : bool {}
    function txRollback(mysqlnd_connection $connection) : bool {}
    function useResult(mysqlnd_connection $connection) {}
}

class MysqlndUhPreparedStatement
{
    function __construct() {}
    function execute(mysqlnd_prepared_statement $statement) : bool {}
    function prepare(mysqlnd_prepared_statement $statement, string $query) : bool {}
}
