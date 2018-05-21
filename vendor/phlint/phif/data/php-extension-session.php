<?php

const PHP_SESSION_ACTIVE = 2;
const PHP_SESSION_DISABLED = 0;
const PHP_SESSION_NONE = 1;

/**
 * @return bool
 */
function session_abort() : bool {}

/**
 * @param string $new_cache_expire
 * @return int
 */
function session_cache_expire(string $new_cache_expire = '') : int {}

/**
 * @param string $cache_limiter
 * @return string
 */
function session_cache_limiter(string $cache_limiter = '') : string {}

/**
 * @return void
 */
function session_commit() {}

/**
 * @param string $prefix
 * @return string
 */
function session_create_id(string $prefix = '') : string {}

/**
 * @param string $data
 * @return bool
 */
function session_decode(string $data) : bool {}

/**
 * @return bool
 */
function session_destroy() : bool {}

/**
 * @return string
 */
function session_encode() : string {}

/**
 * @return int
 */
function session_gc() : int {}

/**
 * @return array
 */
function session_get_cookie_params() : array {}

/**
 * @param string $id
 * @return string
 */
function session_id(string $id = '') : string {}

/**
 * @param string $module
 * @return string
 */
function session_module_name(string $module = '') : string {}

/**
 * @param string $name
 * @return string
 */
function session_name(string $name = '') : string {}

/**
 * @param int $error_level
 * @param string $error_message
 * @return bool
 */
function session_pgsql_add_error(int $error_level, string $error_message = '') : bool {}

/**
 * @param bool $with_error_message
 * @return array
 */
function session_pgsql_get_error(bool $with_error_message = false) : array {}

/**
 * @return string
 */
function session_pgsql_get_field() : string {}

/**
 * @return bool
 */
function session_pgsql_reset() : bool {}

/**
 * @param string $value
 * @return bool
 */
function session_pgsql_set_field(string $value) : bool {}

/**
 * @return array
 */
function session_pgsql_status() : array {}

/**
 * @param bool $delete_old_session
 * @return bool
 */
function session_regenerate_id(bool $delete_old_session = false) : bool {}

/**
 * @return void
 */
function session_register_shutdown() {}

/**
 * @return bool
 */
function session_reset() : bool {}

/**
 * @param string $path
 * @return string
 */
function session_save_path(string $path = '') : string {}

/**
 * @param int $lifetime
 * @param string $path
 * @param string $domain
 * @param bool $secure
 * @param bool $httponly
 * @return bool
 */
function session_set_cookie_params(int $lifetime, string $path = '', string $domain = '', bool $secure = false, bool $httponly = false) : bool {}

/**
 * @param object $sessionhandler
 * @param bool $register_shutdown
 * @param callable $read
 * @param callable $write
 * @param callable $destroy
 * @param callable $gc
 * @param callable $create_sid
 * @param callable $validate_sid
 * @param callable $update_timestamp
 * @return bool
 */
function session_set_save_handler(callable $sessionhandler, bool $register_shutdown = true, callable $read, callable $write, callable $destroy, callable $gc, callable $create_sid = null, callable $validate_sid = null, callable $update_timestamp = null) : bool {}

/**
 * @param array $options
 * @return bool
 */
function session_start(array $options = []) : bool {}

/**
 * @return int
 */
function session_status() : int {}

/**
 * @return bool
 */
function session_unset() : bool {}

/**
 * @return bool
 */
function session_write_close() : bool {}

class SessionHandler implements SessionHandlerInterface, SessionIdInterface
{
    function close() : bool {}
    function create_sid() : string {}
    function destroy(string $session_id) : bool {}
    function gc(int $maxlifetime) : int {}
    function open(string $save_path, string $session_name) : bool {}
    function read(string $session_id) : string {}
    function write(string $session_id, string $session_data) : bool {}
}

interface SessionHandlerInterface
{
    function close() : bool {}
    function destroy(string $session_id) : bool {}
    function gc(int $maxlifetime) : int {}
    function open(string $save_path, string $session_name) : bool {}
    function read(string $session_id) : string {}
    function write(string $session_id, string $session_data) : bool {}
}

interface SessionIdInterface
{
    function create_sid() : string {}
}

interface SessionUpdateTimestampHandlerInterface
{
    function updateTimestamp(string $key, string $val) : bool {}
    function validateId(string $key) : bool {}
}
