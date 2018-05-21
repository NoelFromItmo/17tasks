<?php

/**
 * @param string $path
 * @param bool $recursive
 * @param bool $force
 * @return bool
 */
function svn_add(string $path, bool $recursive = true, bool $force = false) : bool {}

/**
 * @param string $key
 * @return string
 */
function svn_auth_get_parameter(string $key) : string {}

/**
 * @param string $key
 * @param string $value
 * @return void
 */
function svn_auth_set_parameter(string $key, string $value) {}

/**
 * @param string $repository_url
 * @param int $revision_no
 * @return array
 */
function svn_blame(string $repository_url, int $revision_no = SVN_REVISION_HEAD) : array {}

/**
 * @param string $repos_url
 * @param int $revision_no
 * @return string
 */
function svn_cat(string $repos_url, int $revision_no = 0) : string {}

/**
 * @param string $repos
 * @param string $targetpath
 * @param int $revision
 * @param int $flags
 * @return bool
 */
function svn_checkout(string $repos, string $targetpath, int $revision = 0, int $flags = 0) : bool {}

/**
 * @param string $workingdir
 * @return bool
 */
function svn_cleanup(string $workingdir) : bool {}

/**
 * @return string
 */
function svn_client_version() : string {}

/**
 * @param string $log
 * @param array $targets
 * @param bool $recursive
 * @return array
 */
function svn_commit(string $log, array $targets, bool $recursive = true) : array {}

/**
 * @param string $path
 * @param bool $force
 * @return bool
 */
function svn_delete(string $path, bool $force = false) : bool {}

/**
 * @param string $path1
 * @param int $rev1
 * @param string $path2
 * @param int $rev2
 * @return array
 */
function svn_diff(string $path1, int $rev1, string $path2, int $rev2) : array {}

/**
 * @param string $frompath
 * @param string $topath
 * @param bool $working_copy
 * @param int $revision_no
 * @return bool
 */
function svn_export(string $frompath, string $topath, bool $working_copy = true, int $revision_no = -1) : bool {}

/**
 * @param resource $txn
 * @return bool
 */
function svn_fs_abort_txn($txn) : bool {}

/**
 * @param resource $root
 * @param string $path
 * @return resource
 */
function svn_fs_apply_text($root, string $path) {}

/**
 * @param resource $repos
 * @param int $rev
 * @return resource
 */
function svn_fs_begin_txn2($repos, int $rev) {}

/**
 * @param resource $root
 * @param string $path
 * @param string $name
 * @param string $value
 * @return bool
 */
function svn_fs_change_node_prop($root, string $path, string $name, string $value) : bool {}

/**
 * @param resource $fsroot
 * @param string $path
 * @return int
 */
function svn_fs_check_path($fsroot, string $path) : int {}

/**
 * @param resource $root1
 * @param string $path1
 * @param resource $root2
 * @param string $path2
 * @return bool
 */
function svn_fs_contents_changed($root1, string $path1, $root2, string $path2) : bool {}

/**
 * @param resource $from_root
 * @param string $from_path
 * @param resource $to_root
 * @param string $to_path
 * @return bool
 */
function svn_fs_copy($from_root, string $from_path, $to_root, string $to_path) : bool {}

/**
 * @param resource $root
 * @param string $path
 * @return bool
 */
function svn_fs_delete($root, string $path) : bool {}

/**
 * @param resource $fsroot
 * @param string $path
 * @return array
 */
function svn_fs_dir_entries($fsroot, string $path) : array {}

/**
 * @param resource $fsroot
 * @param string $path
 * @return resource
 */
function svn_fs_file_contents($fsroot, string $path) {}

/**
 * @param resource $fsroot
 * @param string $path
 * @return int
 */
function svn_fs_file_length($fsroot, string $path) : int {}

/**
 * @param resource $root
 * @param string $path
 * @return bool
 */
function svn_fs_is_dir($root, string $path) : bool {}

/**
 * @param resource $root
 * @param string $path
 * @return bool
 */
function svn_fs_is_file($root, string $path) : bool {}

/**
 * @param resource $root
 * @param string $path
 * @return bool
 */
function svn_fs_make_dir($root, string $path) : bool {}

/**
 * @param resource $root
 * @param string $path
 * @return bool
 */
function svn_fs_make_file($root, string $path) : bool {}

/**
 * @param resource $fsroot
 * @param string $path
 * @return int
 */
function svn_fs_node_created_rev($fsroot, string $path) : int {}

/**
 * @param resource $fsroot
 * @param string $path
 * @param string $propname
 * @return string
 */
function svn_fs_node_prop($fsroot, string $path, string $propname) : string {}

/**
 * @param resource $root1
 * @param string $path1
 * @param resource $root2
 * @param string $path2
 * @return bool
 */
function svn_fs_props_changed($root1, string $path1, $root2, string $path2) : bool {}

/**
 * @param resource $fs
 * @param int $revnum
 * @param string $propname
 * @return string
 */
function svn_fs_revision_prop($fs, int $revnum, string $propname) : string {}

/**
 * @param resource $fs
 * @param int $revnum
 * @return resource
 */
function svn_fs_revision_root($fs, int $revnum) {}

/**
 * @param resource $txn
 * @return resource
 */
function svn_fs_txn_root($txn) {}

/**
 * @param resource $fs
 * @return int
 */
function svn_fs_youngest_rev($fs) : int {}

/**
 * @param string $path
 * @param string $url
 * @param bool $nonrecursive
 * @return bool
 */
function svn_import(string $path, string $url, bool $nonrecursive) : bool {}

/**
 * @param string $repos_url
 * @param int $start_revision
 * @param int $end_revision
 * @param int $limit
 * @param int $flags
 * @return array
 */
function svn_log(string $repos_url, int $start_revision = 0, int $end_revision = 0, int $limit = 0, int $flags = SVN_DISCOVER_CHANGED_PATHS | SVN_STOP_ON_COPY) : array {}

/**
 * @param string $repos_url
 * @param int $revision_no
 * @param bool $recurse
 * @param bool $peg
 * @return array
 */
function svn_ls(string $repos_url, int $revision_no = SVN_REVISION_HEAD, bool $recurse = false, bool $peg = false) : array {}

/**
 * @param string $path
 * @param string $log_message
 * @return bool
 */
function svn_mkdir(string $path, string $log_message = '') : bool {}

/**
 * @param string $path
 * @param array $config
 * @param array $fsconfig
 * @return resource
 */
function svn_repos_create(string $path, array $config = [], array $fsconfig = []) {}

/**
 * @param resource $repos
 * @return resource
 */
function svn_repos_fs($repos) {}

/**
 * @param resource $repos
 * @param int $rev
 * @param string $author
 * @param string $log_msg
 * @return resource
 */
function svn_repos_fs_begin_txn_for_commit($repos, int $rev, string $author, string $log_msg) {}

/**
 * @param resource $txn
 * @return int
 */
function svn_repos_fs_commit_txn($txn) : int {}

/**
 * @param string $repospath
 * @param string $destpath
 * @param bool $cleanlogs
 * @return bool
 */
function svn_repos_hotcopy(string $repospath, string $destpath, bool $cleanlogs) : bool {}

/**
 * @param string $path
 * @return resource
 */
function svn_repos_open(string $path) {}

/**
 * @param string $path
 * @return bool
 */
function svn_repos_recover(string $path) : bool {}

/**
 * @param string $path
 * @param bool $recursive
 * @return bool
 */
function svn_revert(string $path, bool $recursive = false) : bool {}

/**
 * @param string $path
 * @param int $flags
 * @return array
 */
function svn_status(string $path, int $flags = 0) : array {}

/**
 * @param string $path
 * @param int $revno
 * @param bool $recurse
 * @return int
 */
function svn_update(string $path, int $revno = SVN_REVISION_HEAD, bool $recurse = true) : int {}
