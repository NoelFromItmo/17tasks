<?php

/**
 * @param string $classname
 * @param string $parentname
 * @return bool
 */
function runkit_class_adopt(string $classname, string $parentname) : bool {}

/**
 * @param string $classname
 * @return bool
 */
function runkit_class_emancipate(string $classname) : bool {}

/**
 * @param string $constname
 * @param mixed $value
 * @return bool
 */
function runkit_constant_add(string $constname, $value) : bool {}

/**
 * @param string $constname
 * @param mixed $newvalue
 * @return bool
 */
function runkit_constant_redefine(string $constname, $newvalue) : bool {}

/**
 * @param string $constname
 * @return bool
 */
function runkit_constant_remove(string $constname) : bool {}

/**
 * @param string $funcname
 * @param Closure $closure
 * @param string $doc_comment
 * @param bool $return_by_reference
 * @param string $doc_comment
 * @return bool
 */
function runkit_function_add(string $funcname, Closure $closure, string $doc_comment = null, bool $return_by_reference = null, string $doc_comment = null) : bool {}

/**
 * @param string $funcname
 * @param string $targetname
 * @return bool
 */
function runkit_function_copy(string $funcname, string $targetname) : bool {}

/**
 * @param string $funcname
 * @param Closure $closure
 * @param string $doc_comment
 * @param bool $return_by_reference
 * @param string $doc_comment
 * @return bool
 */
function runkit_function_redefine(string $funcname, Closure $closure, string $doc_comment = null, bool $return_by_reference = null, string $doc_comment = null) : bool {}

/**
 * @param string $funcname
 * @return bool
 */
function runkit_function_remove(string $funcname) : bool {}

/**
 * @param string $funcname
 * @param string $newname
 * @return bool
 */
function runkit_function_rename(string $funcname, string $newname) : bool {}

/**
 * @param string $filename
 * @param int $flags
 * @return bool
 */
function runkit_import(string $filename, int $flags = RUNKIT_IMPORT_CLASS_METHODS) : bool {}

/**
 * @param string $code
 * @return bool
 */
function runkit_lint(string $code) : bool {}

/**
 * @param string $filename
 * @return bool
 */
function runkit_lint_file(string $filename) : bool {}

/**
 * @param string $classname
 * @param string $methodname
 * @param Closure $closure
 * @param int $flags
 * @param string $doc_comment
 * @param string $doc_comment
 * @return bool
 */
function runkit_method_add(string $classname, string $methodname, Closure $closure, int $flags = RUNKIT_ACC_PUBLIC, string $doc_comment = null, string $doc_comment = null) : bool {}

/**
 * @param string $dClass
 * @param string $dMethod
 * @param string $sClass
 * @param string $sMethod
 * @return bool
 */
function runkit_method_copy(string $dClass, string $dMethod, string $sClass, string $sMethod = '') : bool {}

/**
 * @param string $classname
 * @param string $methodname
 * @param Closure $closure
 * @param int $flags
 * @param string $doc_comment
 * @param string $doc_comment
 * @return bool
 */
function runkit_method_redefine(string $classname, string $methodname, Closure $closure, int $flags = RUNKIT_ACC_PUBLIC, string $doc_comment = null, string $doc_comment = null) : bool {}

/**
 * @param string $classname
 * @param string $methodname
 * @return bool
 */
function runkit_method_remove(string $classname, string $methodname) : bool {}

/**
 * @param string $classname
 * @param string $methodname
 * @param string $newname
 * @return bool
 */
function runkit_method_rename(string $classname, string $methodname, string $newname) : bool {}

/**
 * @return bool
 */
function runkit_return_value_used() : bool {}

/**
 * @param object $sandbox
 * @param mixed $callback
 * @return mixed
 */
function runkit_sandbox_output_handler($sandbox, $callback = null) {}

/**
 * @return array
 */
function runkit_superglobals() : array {}
