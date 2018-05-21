<?php

/**
 * @param string $file
 * @return bool
 */
function opcache_compile_file(string $file) : bool {}

/**
 * @return array
 */
function opcache_get_configuration() : array {}

/**
 * @param bool $get_scripts
 * @return array
 */
function opcache_get_status(bool $get_scripts = true) : array {}

/**
 * @param string $script
 * @param bool $force
 * @return bool
 */
function opcache_invalidate(string $script, bool $force = false) : bool {}

/**
 * @param string $file
 * @return bool
 */
function opcache_is_script_cached(string $file) : bool {}

/**
 * @return bool
 */
function opcache_reset() : bool {}
