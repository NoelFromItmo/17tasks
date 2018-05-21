<?php

/**
 * @param string $filename
 * @return bool
 */
function bcompiler_load(string $filename) : bool {}

/**
 * @param string $filename
 * @return bool
 */
function bcompiler_load_exe(string $filename) : bool {}

/**
 * @param string $class
 * @param string $callback
 * @return bool
 */
function bcompiler_parse_class(string $class, string $callback) : bool {}

/**
 * @param resource $filehandle
 * @return bool
 */
function bcompiler_read($filehandle) : bool {}

/**
 * @param resource $filehandle
 * @param string $className
 * @param string $extends
 * @return bool
 */
function bcompiler_write_class($filehandle, string $className, string $extends = '') : bool {}

/**
 * @param resource $filehandle
 * @param string $constantName
 * @return bool
 */
function bcompiler_write_constant($filehandle, string $constantName) : bool {}

/**
 * @param resource $filehandle
 * @param int $startpos
 * @return bool
 */
function bcompiler_write_exe_footer($filehandle, int $startpos) : bool {}

/**
 * @param resource $filehandle
 * @param string $filename
 * @return bool
 */
function bcompiler_write_file($filehandle, string $filename) : bool {}

/**
 * @param resource $filehandle
 * @return bool
 */
function bcompiler_write_footer($filehandle) : bool {}

/**
 * @param resource $filehandle
 * @param string $functionName
 * @return bool
 */
function bcompiler_write_function($filehandle, string $functionName) : bool {}

/**
 * @param resource $filehandle
 * @param string $fileName
 * @return bool
 */
function bcompiler_write_functions_from_file($filehandle, string $fileName) : bool {}

/**
 * @param resource $filehandle
 * @param string $write_ver
 * @return bool
 */
function bcompiler_write_header($filehandle, string $write_ver = '') : bool {}

/**
 * @param resource $filehandle
 * @param string $filename
 * @return bool
 */
function bcompiler_write_included_filename($filehandle, string $filename) : bool {}
