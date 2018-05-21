<?php

/**
 * @param resource $link
 * @param string $transaction_id
 * @param array $headers
 * @return bool
 */
function stomp_abort($link, string $transaction_id, array $headers = []) : bool {}

/**
 * @param resource $link
 * @param mixed $msg
 * @param array $headers
 * @return bool
 */
function stomp_ack($link, $msg, array $headers = []) : bool {}

/**
 * @param resource $link
 * @param string $transaction_id
 * @param array $headers
 * @return bool
 */
function stomp_begin($link, string $transaction_id, array $headers = []) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function stomp_close($link) : bool {}

/**
 * @param resource $link
 * @param string $transaction_id
 * @param array $headers
 * @return bool
 */
function stomp_commit($link, string $transaction_id, array $headers = []) : bool {}

/**
 * @param string $broker
 * @param string $username
 * @param string $password
 * @param array $headers
 * @return resource
 */
function stomp_connect(string $broker = ini_get("stomp.default_broker_uri"), string $username = '', string $password = '', array $headers = []) {}

/**
 * @return string
 */
function stomp_connect_error() : string {}

/**
 * @param resource $link
 * @return string
 */
function stomp_error($link) : string {}

/**
 * @param resource $link
 * @return array
 */
function stomp_get_read_timeout($link) : array {}

/**
 * @param resource $link
 * @return string
 */
function stomp_get_session_id($link) : string {}

/**
 * @param resource $link
 * @return bool
 */
function stomp_has_frame($link) : bool {}

/**
 * @param resource $link
 * @return array
 */
function stomp_read_frame($link) : array {}

/**
 * @param resource $link
 * @param string $destination
 * @param mixed $msg
 * @param array $headers
 * @return bool
 */
function stomp_send($link, string $destination, $msg, array $headers = []) : bool {}

/**
 * @param resource $link
 * @param int $seconds
 * @param int $microseconds
 * @return void
 */
function stomp_set_read_timeout($link, int $seconds, int $microseconds = 0) {}

/**
 * @param resource $link
 * @param string $destination
 * @param array $headers
 * @return bool
 */
function stomp_subscribe($link, string $destination, array $headers = []) : bool {}

/**
 * @param resource $link
 * @param string $destination
 * @param array $headers
 * @return bool
 */
function stomp_unsubscribe($link, string $destination, array $headers = []) : bool {}

/**
 * @return string
 */
function stomp_version() : string {}

class Stomp
{
    function __construct(string $broker = ini_get("stomp.default_broker_uri"), string $username = '', string $password = '', array $headers = []) {}
    function __destruct() : bool {}
    function abort(string $transaction_id, array $headers = []) : bool {}
    function ack($msg, array $headers = []) : bool {}
    function begin(string $transaction_id, array $headers = []) : bool {}
    function commit(string $transaction_id, array $headers = []) : bool {}
    function error() : string {}
    function getReadTimeout() : array {}
    function getSessionId() : string {}
    function hasFrame() : bool {}
    function readFrame(string $class_name = "stompFrame") : stompframe {}
    function send(string $destination, $msg, array $headers = []) : bool {}
    function setReadTimeout(int $seconds, int $microseconds = 0) {}
    function subscribe(string $destination, array $headers = []) : bool {}
    function unsubscribe(string $destination, array $headers = []) : bool {}
}

class StompException extends Exception
{
    function getDetails() : string {}
}

class StompFrame
{
    function __construct(string $command = '', array $headers = [], string $body = '') {}
}
