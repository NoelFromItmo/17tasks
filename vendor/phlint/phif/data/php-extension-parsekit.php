<?php

/**
 * @param string $filename
 * @param array $errors
 * @param int $options
 * @return array
 */
function parsekit_compile_file(string $filename, array &$errors = [], int $options = PARSEKIT_QUIET) : array {}

/**
 * @param string $phpcode
 * @param array $errors
 * @param int $options
 * @return array
 */
function parsekit_compile_string(string $phpcode, array &$errors = [], int $options = PARSEKIT_QUIET) : array {}

/**
 * @param mixed $function
 * @return array
 */
function parsekit_func_arginfo($function) : array {}
