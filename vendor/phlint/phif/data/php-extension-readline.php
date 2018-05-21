<?php

const READLINE_LIB = 'libedit';

/**
 * @param string $prompt
 * @return string
 */
function readline(string $prompt = '') : string {}

/**
 * @param string $line
 * @return bool
 */
function readline_add_history(string $line) : bool {}

/**
 * @return bool
 */
function readline_clear_history() : bool {}

/**
 * @param callable $function
 * @return bool
 */
function readline_completion_function(callable $function) : bool {}

/**
 * @param string $varname
 * @param string $newvalue
 * @return mixed
 */
function readline_info(string $varname = '', string $newvalue = '') {}

/**
 * @param string $filename
 * @return bool
 */
function readline_read_history(string $filename = '') : bool {}

/**
 * @param string $filename
 * @return bool
 */
function readline_write_history(string $filename = '') : bool {}
