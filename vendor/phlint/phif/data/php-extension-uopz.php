<?php

/**
 * @param bool $allow
 * @return void
 */
function uopz_allow_exit(bool $allow) {}

/**
 * @param string $class
 * @param string $function
 * @return void
 */
function uopz_backup(string $class = '', string $function = '') {}

/**
 * @param string $name
 * @param array $classes
 * @param array $methods
 * @param array $properties
 * @param int $flags
 * @return void
 */
function uopz_compose(string $name, array $classes, array $methods = [], array $properties = [], int $flags = 0) {}

/**
 * @param string $class
 * @param string $function
 * @return Closure
 */
function uopz_copy(string $class = '', string $function = '') : Closure {}

/**
 * @param string $class
 * @param string $function
 * @return void
 */
function uopz_delete(string $class = '', string $function = '') {}

/**
 * @param string $class
 * @param string $parent
 * @return bool
 */
function uopz_extend(string $class, string $parent) : bool {}

/**
 * @param string $class
 * @param string $function
 * @param int $flags
 * @return int
 */
function uopz_flags(string $class = '', string $function = '', int $flags = 0) : int {}

/**
 * @param string $class
 * @param string $function
 * @param Closure $handler
 * @param int $modifiers
 * @return void
 */
function uopz_function(string $class = '', string $function = '', Closure $handler = null, int $modifiers = 0) {}

/**
 * @return mixed
 */
function uopz_get_exit_status() {}

/**
 * @param string $class
 * @return mixed
 */
function uopz_get_mock(string $class) {}

/**
 * @param string $class
 * @param string $function
 * @return mixed
 */
function uopz_get_return(string $class = '', string $function = '') {}

/**
 * @param string $class
 * @param string $interface
 * @return bool
 */
function uopz_implement(string $class, string $interface) : bool {}

/**
 * @param int $opcode
 * @param Callable $callable
 * @return void
 */
function uopz_overload(int $opcode, Callable $callable) {}

/**
 * @param string $class
 * @param string $constant
 * @param mixed $value
 * @return bool
 */
function uopz_redefine(string $class = '', string $constant = '', $value = null) : bool {}

/**
 * @param string $class
 * @param string $function
 * @param string $rename
 * @return void
 */
function uopz_rename(string $class = '', string $function = '', string $rename = '') {}

/**
 * @param string $class
 * @param string $function
 * @return void
 */
function uopz_restore(string $class = '', string $function = '') {}

/**
 * @param string $class
 * @param mixed $mock
 * @return void
 */
function uopz_set_mock(string $class, $mock) {}

/**
 * @param string $class
 * @param string $function
 * @param mixed $value
 * @param bool $execute
 * @return bool
 */
function uopz_set_return(string $class = '', string $function = '', $value = null, bool $execute = false) : bool {}

/**
 * @param string $class
 * @param string $constant
 * @return bool
 */
function uopz_undefine(string $class = '', string $constant = '') : bool {}

/**
 * @param string $class
 * @return void
 */
function uopz_unset_mock(string $class) {}

/**
 * @param string $class
 * @param string $function
 * @return bool
 */
function uopz_unset_return(string $class = '', string $function = '') : bool {}
