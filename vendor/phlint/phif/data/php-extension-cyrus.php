<?php

/**
 * @param resource $connection
 * @param string $mechlist
 * @param string $service
 * @param string $user
 * @param int $minssf
 * @param int $maxssf
 * @param string $authname
 * @param string $password
 * @return void
 */
function cyrus_authenticate($connection, string $mechlist = '', string $service = '', string $user = '', int $minssf = 0, int $maxssf = 0, string $authname = '', string $password = '') {}

/**
 * @param resource $connection
 * @param array $callbacks
 * @return bool
 */
function cyrus_bind($connection, array $callbacks) : bool {}

/**
 * @param resource $connection
 * @return bool
 */
function cyrus_close($connection) : bool {}

/**
 * @param string $host
 * @param string $port
 * @param int $flags
 * @return resource
 */
function cyrus_connect(string $host = '', string $port = '', int $flags = 0) {}

/**
 * @param resource $connection
 * @param string $query
 * @return array
 */
function cyrus_query($connection, string $query) : array {}

/**
 * @param resource $connection
 * @param string $trigger_name
 * @return bool
 */
function cyrus_unbind($connection, string $trigger_name) : bool {}
