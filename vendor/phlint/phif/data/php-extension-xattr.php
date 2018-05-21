<?php

/**
 * @param string $filename
 * @param string $name
 * @param int $flags
 * @return string
 */
function xattr_get(string $filename, string $name, int $flags = 0) : string {}

/**
 * @param string $filename
 * @param int $flags
 * @return array
 */
function xattr_list(string $filename, int $flags = 0) : array {}

/**
 * @param string $filename
 * @param string $name
 * @param int $flags
 * @return bool
 */
function xattr_remove(string $filename, string $name, int $flags = 0) : bool {}

/**
 * @param string $filename
 * @param string $name
 * @param string $value
 * @param int $flags
 * @return bool
 */
function xattr_set(string $filename, string $name, string $value, int $flags = 0) : bool {}

/**
 * @param string $filename
 * @param int $flags
 * @return bool
 */
function xattr_supported(string $filename, int $flags = 0) : bool {}
