<?php

/**
 * @param string $filename
 * @return array
 */
function classkit_import(string $filename) : array {}

/**
 * @param string $classname
 * @param string $methodname
 * @param string $args
 * @param string $code
 * @param int $flags
 * @return bool
 */
function classkit_method_add(string $classname, string $methodname, string $args, string $code, int $flags = CLASSKIT_ACC_PUBLIC) : bool {}

/**
 * @param string $dClass
 * @param string $dMethod
 * @param string $sClass
 * @param string $sMethod
 * @return bool
 */
function classkit_method_copy(string $dClass, string $dMethod, string $sClass, string $sMethod = '') : bool {}

/**
 * @param string $classname
 * @param string $methodname
 * @param string $args
 * @param string $code
 * @param int $flags
 * @return bool
 */
function classkit_method_redefine(string $classname, string $methodname, string $args, string $code, int $flags = CLASSKIT_ACC_PUBLIC) : bool {}

/**
 * @param string $classname
 * @param string $methodname
 * @return bool
 */
function classkit_method_remove(string $classname, string $methodname) : bool {}

/**
 * @param string $classname
 * @param string $methodname
 * @param string $newname
 * @return bool
 */
function classkit_method_rename(string $classname, string $methodname, string $newname) : bool {}
