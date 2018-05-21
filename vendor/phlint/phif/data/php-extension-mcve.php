<?php

/**
 * @param resource $conn
 * @param int $identifier
 * @return int
 */
function m_checkstatus($conn, int $identifier) : int {}

/**
 * @param resource $conn
 * @param int $array
 * @return int
 */
function m_completeauthorizations($conn, int &$array) : int {}

/**
 * @param resource $conn
 * @return int
 */
function m_connect($conn) : int {}

/**
 * @param resource $conn
 * @return string
 */
function m_connectionerror($conn) : string {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return bool
 */
function m_deletetrans($conn, int $identifier) : bool {}

/**
 * @param resource $conn
 * @return bool
 */
function m_destroyconn($conn) : bool {}

/**
 * @return void
 */
function m_destroyengine() {}

/**
 * @param resource $conn
 * @param int $identifier
 * @param string $column
 * @param int $row
 * @return string
 */
function m_getcell($conn, int $identifier, string $column, int $row) : string {}

/**
 * @param resource $conn
 * @param int $identifier
 * @param int $column
 * @param int $row
 * @return string
 */
function m_getcellbynum($conn, int $identifier, int $column, int $row) : string {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return string
 */
function m_getcommadelimited($conn, int $identifier) : string {}

/**
 * @param resource $conn
 * @param int $identifier
 * @param int $column_num
 * @return string
 */
function m_getheader($conn, int $identifier, int $column_num) : string {}

/**
 * @return resource
 */
function m_initconn() {}

/**
 * @param string $location
 * @return int
 */
function m_initengine(string $location) : int {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return int
 */
function m_iscommadelimited($conn, int $identifier) : int {}

/**
 * @param resource $conn
 * @param int $secs
 * @return bool
 */
function m_maxconntimeout($conn, int $secs) : bool {}

/**
 * @param resource $conn
 * @return int
 */
function m_monitor($conn) : int {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return int
 */
function m_numcolumns($conn, int $identifier) : int {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return int
 */
function m_numrows($conn, int $identifier) : int {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return int
 */
function m_parsecommadelimited($conn, int $identifier) : int {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return array
 */
function m_responsekeys($conn, int $identifier) : array {}

/**
 * @param resource $conn
 * @param int $identifier
 * @param string $key
 * @return string
 */
function m_responseparam($conn, int $identifier, string $key) : string {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return int
 */
function m_returnstatus($conn, int $identifier) : int {}

/**
 * @param resource $conn
 * @param int $tf
 * @return int
 */
function m_setblocking($conn, int $tf) : int {}

/**
 * @param resource $conn
 * @param string $directory
 * @return int
 */
function m_setdropfile($conn, string $directory) : int {}

/**
 * @param resource $conn
 * @param string $host
 * @param int $port
 * @return int
 */
function m_setip($conn, string $host, int $port) : int {}

/**
 * @param resource $conn
 * @param string $host
 * @param int $port
 * @return int
 */
function m_setssl($conn, string $host, int $port) : int {}

/**
 * @param resource $conn
 * @param string $cafile
 * @return int
 */
function m_setssl_cafile($conn, string $cafile) : int {}

/**
 * @param resource $conn
 * @param string $sslkeyfile
 * @param string $sslcertfile
 * @return int
 */
function m_setssl_files($conn, string $sslkeyfile, string $sslcertfile) : int {}

/**
 * @param resource $conn
 * @param int $seconds
 * @return int
 */
function m_settimeout($conn, int $seconds) : int {}

/**
 * @param string $filename
 * @return string
 */
function m_sslcert_gen_hash(string $filename) : string {}

/**
 * @param resource $conn
 * @return int
 */
function m_transactionssent($conn) : int {}

/**
 * @param resource $conn
 * @return int
 */
function m_transinqueue($conn) : int {}

/**
 * @param resource $conn
 * @param int $identifier
 * @param string $key
 * @param string $value
 * @return int
 */
function m_transkeyval($conn, int $identifier, string $key, string $value) : int {}

/**
 * @param resource $conn
 * @return int
 */
function m_transnew($conn) : int {}

/**
 * @param resource $conn
 * @param int $identifier
 * @return int
 */
function m_transsend($conn, int $identifier) : int {}

/**
 * @param int $microsecs
 * @return int
 */
function m_uwait(int $microsecs) : int {}

/**
 * @param resource $conn
 * @param int $tf
 * @return int
 */
function m_validateidentifier($conn, int $tf) : int {}

/**
 * @param resource $conn
 * @param int $tf
 * @return bool
 */
function m_verifyconnection($conn, int $tf) : bool {}

/**
 * @param resource $conn
 * @param int $tf
 * @return bool
 */
function m_verifysslcert($conn, int $tf) : bool {}
