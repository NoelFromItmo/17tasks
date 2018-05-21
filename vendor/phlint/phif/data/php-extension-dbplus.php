<?php

/**
 * @param resource $relation
 * @param array $tuple
 * @return int
 */
function dbplus_add($relation, array $tuple) : int {}

/**
 * @param string $query
 * @param string $server
 * @param string $dbpath
 * @return resource
 */
function dbplus_aql(string $query, string $server = '', string $dbpath = '') {}

/**
 * @param string $newdir
 * @return string
 */
function dbplus_chdir(string $newdir = '') : string {}

/**
 * @param resource $relation
 * @return mixed
 */
function dbplus_close($relation) {}

/**
 * @param resource $relation
 * @param array $tuple
 * @return int
 */
function dbplus_curr($relation, array &$tuple) : int {}

/**
 * @param int $errno
 * @return string
 */
function dbplus_errcode(int $errno = 0) : string {}

/**
 * @return int
 */
function dbplus_errno() : int {}

/**
 * @param resource $relation
 * @param array $constraints
 * @param mixed $tuple
 * @return int
 */
function dbplus_find($relation, array $constraints, $tuple) : int {}

/**
 * @param resource $relation
 * @param array $tuple
 * @return int
 */
function dbplus_first($relation, array &$tuple) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_flush($relation) : int {}

/**
 * @return int
 */
function dbplus_freealllocks() : int {}

/**
 * @param resource $relation
 * @param string $tuple
 * @return int
 */
function dbplus_freelock($relation, string $tuple) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_freerlocks($relation) : int {}

/**
 * @param resource $relation
 * @param string $tuple
 * @return int
 */
function dbplus_getlock($relation, string $tuple) : int {}

/**
 * @param resource $relation
 * @param int $uniqueid
 * @return int
 */
function dbplus_getunique($relation, int $uniqueid) : int {}

/**
 * @param resource $relation
 * @param string $key
 * @param array $result
 * @return int
 */
function dbplus_info($relation, string $key, array &$result) : int {}

/**
 * @param resource $relation
 * @param array $tuple
 * @return int
 */
function dbplus_last($relation, array &$tuple) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_lockrel($relation) : int {}

/**
 * @param resource $relation
 * @param array $tuple
 * @return int
 */
function dbplus_next($relation, array &$tuple) : int {}

/**
 * @param string $name
 * @return resource
 */
function dbplus_open(string $name) {}

/**
 * @param resource $relation
 * @param array $tuple
 * @return int
 */
function dbplus_prev($relation, array &$tuple) : int {}

/**
 * @param resource $relation
 * @param int $mask
 * @param string $user
 * @param string $group
 * @return int
 */
function dbplus_rchperm($relation, int $mask, string $user, string $group) : int {}

/**
 * @param string $name
 * @param mixed $domlist
 * @param bool $overwrite
 * @return resource
 */
function dbplus_rcreate(string $name, $domlist, bool $overwrite = false) {}

/**
 * @param string $name
 * @param resource $relation
 * @param bool $overwrite
 * @return mixed
 */
function dbplus_rcrtexact(string $name, $relation, bool $overwrite = false) {}

/**
 * @param string $name
 * @param resource $relation
 * @param int $overwrite
 * @return mixed
 */
function dbplus_rcrtlike(string $name, $relation, int $overwrite = 0) {}

/**
 * @param string $relation_name
 * @return array
 */
function dbplus_resolve(string $relation_name) : array {}

/**
 * @param resource $relation
 * @param array $tuple
 * @return int
 */
function dbplus_restorepos($relation, array $tuple) : int {}

/**
 * @param resource $relation
 * @param mixed $domlist
 * @return mixed
 */
function dbplus_rkeys($relation, $domlist) {}

/**
 * @param string $name
 * @return resource
 */
function dbplus_ropen(string $name) {}

/**
 * @param string $query
 * @param string $dbpath
 * @return resource
 */
function dbplus_rquery(string $query, string $dbpath = '') {}

/**
 * @param resource $relation
 * @param string $name
 * @return int
 */
function dbplus_rrename($relation, string $name) : int {}

/**
 * @param resource $relation
 * @param mixed $domlist
 * @param int $type
 * @return mixed
 */
function dbplus_rsecindex($relation, $domlist, int $type) {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_runlink($relation) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_rzap($relation) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_savepos($relation) : int {}

/**
 * @param resource $relation
 * @param string $idx_name
 * @return int
 */
function dbplus_setindex($relation, string $idx_name) : int {}

/**
 * @param resource $relation
 * @param int $idx_number
 * @return int
 */
function dbplus_setindexbynumber($relation, int $idx_number) : int {}

/**
 * @param string $query
 * @param string $server
 * @param string $dbpath
 * @return resource
 */
function dbplus_sql(string $query, string $server = '', string $dbpath = '') {}

/**
 * @param int $sid
 * @param string $script
 * @return string
 */
function dbplus_tcl(int $sid, string $script) : string {}

/**
 * @param resource $relation
 * @param array $tuple
 * @param array $current
 * @return int
 */
function dbplus_tremove($relation, array $tuple, array &$current = []) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_undo($relation) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_undoprepare($relation) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_unlockrel($relation) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_unselect($relation) : int {}

/**
 * @param resource $relation
 * @param array $old
 * @param array $new
 * @return int
 */
function dbplus_update($relation, array $old, array $new) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_xlockrel($relation) : int {}

/**
 * @param resource $relation
 * @return int
 */
function dbplus_xunlockrel($relation) : int {}
