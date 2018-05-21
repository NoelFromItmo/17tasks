<?php

const DEBUG_BACKTRACE_IGNORE_ARGS = 2;
const DEBUG_BACKTRACE_PROVIDE_OBJECT = 1;
const DEFAULT_INCLUDE_PATH = '';
const E_ALL = 32767;
const E_COMPILE_ERROR = 64;
const E_COMPILE_WARNING = 128;
const E_CORE_ERROR = 16;
const E_CORE_WARNING = 32;
const E_DEPRECATED = 8192;
const E_ERROR = 1;
const E_NOTICE = 8;
const E_PARSE = 4;
const E_RECOVERABLE_ERROR = 4096;
const E_STRICT = 2048;
const E_USER_DEPRECATED = 16384;
const E_USER_ERROR = 256;
const E_USER_NOTICE = 1024;
const E_USER_WARNING = 512;
const E_WARNING = 2;
const PEAR_EXTENSION_DIR = '';
const PEAR_INSTALL_DIR = '';
const PHP_BINARY = '';
const PHP_BINDIR = '';
const PHP_CONFIG_FILE_PATH = '';
const PHP_CONFIG_FILE_SCAN_DIR = '';
const PHP_DATADIR = '';
const PHP_DEBUG = 0;
const PHP_EOL = '';
const PHP_EXTENSION_DIR = '';
const PHP_EXTRA_VERSION = '';
const PHP_FD_SETSIZE = 256;
const PHP_FLOAT_DIG = 15;
const PHP_FLOAT_EPSILON = 2.220446049250313E-16;
const PHP_FLOAT_MAX = 1.7976931348623157E+308;
const PHP_FLOAT_MIN = 2.2250738585072014E-308;
const PHP_INT_MAX = 9223372036854775807;
const PHP_INT_MIN = -9.223372036854776E+18;
const PHP_INT_SIZE = 8;
const PHP_LIBDIR = '';
const PHP_LOCALSTATEDIR = '';
const PHP_MAJOR_VERSION = 7;
const PHP_MAXPATHLEN = 2048;
const PHP_MINOR_VERSION = 0;
const PHP_OS = '';
const PHP_OS_FAMILY = '';
const PHP_OUTPUT_HANDLER_CLEAN = 2;
const PHP_OUTPUT_HANDLER_CLEANABLE = 16;
const PHP_OUTPUT_HANDLER_CONT = 0;
const PHP_OUTPUT_HANDLER_DISABLED = 8192;
const PHP_OUTPUT_HANDLER_END = 8;
const PHP_OUTPUT_HANDLER_FINAL = 8;
const PHP_OUTPUT_HANDLER_FLUSH = 4;
const PHP_OUTPUT_HANDLER_FLUSHABLE = 32;
const PHP_OUTPUT_HANDLER_REMOVABLE = 64;
const PHP_OUTPUT_HANDLER_START = 1;
const PHP_OUTPUT_HANDLER_STARTED = 4096;
const PHP_OUTPUT_HANDLER_STDFLAGS = 112;
const PHP_OUTPUT_HANDLER_WRITE = 0;
const PHP_PREFIX = '';
const PHP_RELEASE_VERSION = 0;
const PHP_SAPI = '';
const PHP_SHLIB_SUFFIX = '';
const PHP_SYSCONFDIR = '';
const PHP_VERSION = '';
const PHP_VERSION_ID = 0;
const PHP_WINDOWS_NT_DOMAIN_CONTROLLER = 2;
const PHP_WINDOWS_NT_SERVER = 3;
const PHP_WINDOWS_NT_WORKSTATION = 1;
const PHP_WINDOWS_VERSION_BUILD = 10586;
const PHP_WINDOWS_VERSION_MAJOR = 10;
const PHP_WINDOWS_VERSION_MINOR = 0;
const PHP_WINDOWS_VERSION_PLATFORM = 2;
const PHP_WINDOWS_VERSION_PRODUCTTYPE = 1;
const PHP_WINDOWS_VERSION_SP_MAJOR = 0;
const PHP_WINDOWS_VERSION_SP_MINOR = 0;
const PHP_WINDOWS_VERSION_SUITEMASK = 256;
const PHP_ZTS = 1;
const STDERR = NULL;
const STDIN = NULL;
const STDOUT = NULL;
const UPLOAD_ERR_CANT_WRITE = 7;
const UPLOAD_ERR_EXTENSION = 8;
const UPLOAD_ERR_FORM_SIZE = 2;
const UPLOAD_ERR_INI_SIZE = 1;
const UPLOAD_ERR_NO_FILE = 4;
const UPLOAD_ERR_NO_TMP_DIR = 6;
const UPLOAD_ERR_OK = 0;
const UPLOAD_ERR_PARTIAL = 3;

/**
 * @param string $original
 * @param string $alias
 * @param bool $autoload
 * @return bool
 */
function class_alias(string $original, string $alias, bool $autoload = true) : bool {}

/**
 * @param string $class_name
 * @param bool $autoload
 * @return bool
 */
function class_exists(string $class_name, bool $autoload = true) : bool {}

/**
 * @param string $args
 * @param string $code
 * @return string
 */
function create_function(string $args, string $code) : string {}

/**
 * @param int $options
 * @param int $limit
 * @return array
 */
function debug_backtrace(int $options = DEBUG_BACKTRACE_PROVIDE_OBJECT, int $limit = 0) : array {}

/**
 * @param int $options
 * @param int $limit
 * @return void
 */
function debug_print_backtrace(int $options = 0, int $limit = 0) {}

/**
 * @param string $name
 * @param mixed $value
 * @param bool $case_insensitive
 * @return bool
 */
function define(string $name, $value, bool $case_insensitive = false) : bool {}

/**
 * @param string $name
 * @return bool
 */
function defined(string $name) : bool {}

/**
 * @param array $array
 * @return array
 */
function each(array &$array) : array {}

/**
 * @param int $level
 * @return int
 */
function error_reporting(int $level = 0) : int {}

/**
 * @param string $name
 * @return bool
 */
function extension_loaded(string $name) : bool {}

/**
 * @param int $arg_num
 * @return mixed
 */
function func_get_arg(int $arg_num) {}

/**
 * @return array
 */
function func_get_args() : array {}

/**
 * @return int
 */
function func_num_args() : int {}

/**
 * @param string $function_name
 * @return bool
 */
function function_exists(string $function_name) : bool {}

/**
 * @return int
 */
function gc_collect_cycles() : int {}

/**
 * @return void
 */
function gc_disable() {}

/**
 * @return void
 */
function gc_enable() {}

/**
 * @return bool
 */
function gc_enabled() : bool {}

/**
 * @return int
 */
function gc_mem_caches() : int {}

/**
 * @return string
 */
function get_called_class() : string {}

/**
 * @param object $object
 * @return string
 */
function get_class($object = null) : string {}

/**
 * @param mixed $class_name
 * @return array
 */
function get_class_methods($class_name) : array {}

/**
 * @param string $class_name
 * @return array
 */
function get_class_vars(string $class_name) : array {}

/**
 * @return array
 */
function get_declared_classes() : array {}

/**
 * @return array
 */
function get_declared_interfaces() : array {}

/**
 * @return array
 */
function get_declared_traits() : array {}

/**
 * @param bool $categorize
 * @return array
 */
function get_defined_constants(bool $categorize = false) : array {}

/**
 * @param bool $exclude_disabled
 * @return array
 */
function get_defined_functions(bool $exclude_disabled = false) : array {}

/**
 * @return array
 */
function get_defined_vars() : array {}

/**
 * @param string $module_name
 * @return array
 */
function get_extension_funcs(string $module_name) : array {}

/**
 * @return array
 */
function get_included_files() : array {}

/**
 * @param bool $zend_extensions
 * @return array
 */
function get_loaded_extensions(bool $zend_extensions = false) : array {}

/**
 * @param object $object
 * @return array
 */
function get_object_vars($object) : array {}

/**
 * @param mixed $object
 * @return string
 */
function get_parent_class($object = null) : string {}

/**
 * @return void
 */
function get_required_files() {}

/**
 * @param resource $handle
 * @return string
 */
function get_resource_type($handle) : string {}

/**
 * @param string $type
 * @return array
 */
function get_resources(string $type = '') : array {}

/**
 * @param string $interface_name
 * @param bool $autoload
 * @return bool
 */
function interface_exists(string $interface_name, bool $autoload = true) : bool {}

/**
 * @param mixed $object
 * @param string $class_name
 * @param bool $allow_string
 * @return bool
 */
function is_a($object, string $class_name, bool $allow_string = false) : bool {}

/**
 * @param mixed $object
 * @param string $class_name
 * @param bool $allow_string
 * @return bool
 */
function is_subclass_of($object, string $class_name, bool $allow_string = true) : bool {}

/**
 * @param mixed $object
 * @param string $method_name
 * @return bool
 */
function method_exists($object, string $method_name) : bool {}

/**
 * @param mixed $class
 * @param string $property
 * @return bool
 */
function property_exists($class, string $property) : bool {}

/**
 * @return bool
 */
function restore_error_handler() : bool {}

/**
 * @return bool
 */
function restore_exception_handler() : bool {}

/**
 * @param callable $error_handler
 * @param int $error_types
 * @return mixed
 */
function set_error_handler(callable $error_handler, int $error_types = E_ALL | E_STRICT) {}

/**
 * @param callable $exception_handler
 * @return callable
 */
function set_exception_handler(callable $exception_handler) : callable {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @return int
 */
function strcasecmp(string $str1, string $str2) : int {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @return int
 */
function strcmp(string $str1, string $str2) : int {}

/**
 * @pure
 * @param string $string
 * @return int
 */
function strlen(string $string) : int {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @param int $len
 * @return int
 */
function strncasecmp(string $str1, string $str2, int $len) : int {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @param int $len
 * @return int
 */
function strncmp(string $str1, string $str2, int $len) : int {}

/**
 * @param string $traitname
 * @param bool $autoload
 * @return bool
 */
function trait_exists(string $traitname, bool $autoload = false) : bool {}

/**
 * @param string $error_msg
 * @param int $error_type
 * @return bool
 */
function trigger_error(string $error_msg, int $error_type = E_USER_NOTICE) : bool {}

/**
 * @param mixed $message
 * @param mixed $error_type
 * @return void
 */
function user_error($message, $error_type) {}

/**
 * @return string
 */
function zend_version() : string {}

class ArgumentCountError extends TypeError {}

class ArithmeticError extends Error {}

interface ArrayAccess
{
    function offsetExists($offset) : bool {}
    function offsetGet($offset) {}
    function offsetSet($offset, $value) {}
    function offsetUnset($offset) {}
}

class ClosedGeneratorException extends Exception {}

class Closure
{
    function __construct() {}
    function bind(Closure $closure, $newthis, $newscope = "static") : Closure {}
    function bindTo($newthis, $newscope = "static") : Closure {}
    function call($newthis, ...$__variadic) {}
    function fromCallable(callable $callable) : Closure {}
}

interface Countable
{
    function count() : int {}
}

class DivisionByZeroError extends ArithmeticError {}

class Error implements Throwable
{
    function __clone() {}
    function __construct() {}
    function __toString() : string {}
    function __wakeup() {}
    function getCode() {}
    function getFile() : string {}
    function getLine() : int {}
    function getMessage() : string {}
    function getPrevious() : Throwable {}
    function getTrace() : array {}
    function getTraceAsString() : string {}
}

class ErrorException extends Exception
{
    function __construct() {}
    function getSeverity() : int {}
}

class Exception implements Throwable
{
    function __clone() {}
    function __construct() {}
    function __toString() : string {}
    function __wakeup() {}
    function getCode() {}
    function getFile() : string {}
    function getLine() : int {}
    function getMessage() : string {}
    function getPrevious() : Throwable {}
    function getTrace() : array {}
    function getTraceAsString() : string {}
}

class Generator implements Iterator
{
    function __wakeup() {}
    function current() {}
    function getReturn() {}
    function key() {}
    function next() {}
    function rewind() {}
    function send($value) {}
    function throw(Throwable $exception) {}
    function valid() : bool {}
}

interface Iterator extends Traversable
{
    function current() {}
    function key() : scalar {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}

interface IteratorAggregate extends Traversable
{
    function getIterator() : Traversable {}
}

class ParseError extends Error {}

interface Serializable
{
    function serialize() : string {}
    function unserialize(string $serialized) {}
}

class stdClass {}

interface Throwable
{
    function getMessage() : string {}
    function getCode() : int {}
    function getFile() : string {}
    function getLine() : int {}
    function getTrace() : array {}
    function getTraceAsString() : string {}
    function getPrevious() : Throwable {}
    function __toString() : string {}
}

interface Traversable {}

class TypeError extends Error {}
