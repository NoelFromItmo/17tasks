<?php

/**
 * @param bool $summaryonly
 * @return array
 */
function wincache_fcache_fileinfo(bool $summaryonly = false) : array {}

/**
 * @return array
 */
function wincache_fcache_meminfo() : array {}

/**
 * @param string $key
 * @param bool $isglobal
 * @return bool
 */
function wincache_lock(string $key, bool $isglobal = false) : bool {}

/**
 * @param bool $summaryonly
 * @return array
 */
function wincache_ocache_fileinfo(bool $summaryonly = false) : array {}

/**
 * @return array
 */
function wincache_ocache_meminfo() : array {}

/**
 * @param array $files
 * @return bool
 */
function wincache_refresh_if_changed(array $files = null) : bool {}

/**
 * @param bool $summaryonly
 * @return array
 */
function wincache_rplist_fileinfo(bool $summaryonly = false) : array {}

/**
 * @return array
 */
function wincache_rplist_meminfo() : array {}

/**
 * @param bool $summaryonly
 * @return array
 */
function wincache_scache_info(bool $summaryonly = false) : array {}

/**
 * @return array
 */
function wincache_scache_meminfo() : array {}

/**
 * @param array $values
 * @param mixed $unused
 * @param int $ttl
 * @return bool
 */
function wincache_ucache_add(array $values, $unused = null, int $ttl = 0) : bool {}

/**
 * @param string $key
 * @param int $old_value
 * @param int $new_value
 * @return bool
 */
function wincache_ucache_cas(string $key, int $old_value, int $new_value) : bool {}

/**
 * @return bool
 */
function wincache_ucache_clear() : bool {}

/**
 * @param string $key
 * @param int $dec_by
 * @param bool $success
 * @return mixed
 */
function wincache_ucache_dec(string $key, int $dec_by = 1, bool &$success = false) {}

/**
 * @param mixed $key
 * @return bool
 */
function wincache_ucache_delete($key) : bool {}

/**
 * @param string $key
 * @return bool
 */
function wincache_ucache_exists(string $key) : bool {}

/**
 * @param mixed $key
 * @param bool $success
 * @return mixed
 */
function wincache_ucache_get($key, bool &$success = false) {}

/**
 * @param string $key
 * @param int $inc_by
 * @param bool $success
 * @return mixed
 */
function wincache_ucache_inc(string $key, int $inc_by = 1, bool &$success = false) {}

/**
 * @param bool $summaryonly
 * @param string $key
 * @return array
 */
function wincache_ucache_info(bool $summaryonly = false, string $key = null) : array {}

/**
 * @return array
 */
function wincache_ucache_meminfo() : array {}

/**
 * @param array $values
 * @param mixed $unused
 * @param int $ttl
 * @return bool
 */
function wincache_ucache_set(array $values, $unused = null, int $ttl = 0) : bool {}

/**
 * @param string $key
 * @return bool
 */
function wincache_unlock(string $key) : bool {}
