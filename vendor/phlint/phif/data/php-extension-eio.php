<?php

/**
 * @param int $delay
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_busy(int $delay, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param resource $req
 * @return void
 */
function eio_cancel($req) {}

/**
 * @param string $path
 * @param int $mode
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_chmod(string $path, int $mode, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param int $uid
 * @param int $gid
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_chown(string $path, int $uid, int $gid = -1, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_close($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param callable $execute
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_custom(callable $execute, int $pri, callable $callback, $data = null) {}

/**
 * @param mixed $fd
 * @param mixed $fd2
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_dup2($fd, $fd2, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @return bool
 */
function eio_event_loop() : bool {}

/**
 * @param mixed $fd
 * @param int $mode
 * @param int $offset
 * @param int $length
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_fallocate($fd, int $mode, int $offset, int $length, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $mode
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_fchmod($fd, int $mode, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $uid
 * @param int $gid
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_fchown($fd, int $uid, int $gid = -1, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_fdatasync($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_fstat($fd, int $pri, callable $callback, $data = null) {}

/**
 * @param mixed $fd
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_fstatvfs($fd, int $pri, callable $callback, $data = null) {}

/**
 * @param mixed $fd
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_fsync($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $offset
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_ftruncate($fd, int $offset = 0, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param float $atime
 * @param float $mtime
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_futime($fd, float $atime, float $mtime, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @return mixed
 */
function eio_get_event_stream() {}

/**
 * @param resource $req
 * @return string
 */
function eio_get_last_error($req) : string {}

/**
 * @param callable $callback
 * @param string $data
 * @return resource
 */
function eio_grp(callable $callback, string $data = null) {}

/**
 * @param resource $grp
 * @param resource $req
 * @return void
 */
function eio_grp_add($grp, $req) {}

/**
 * @param resource $grp
 * @return void
 */
function eio_grp_cancel($grp) {}

/**
 * @param resource $grp
 * @param int $limit
 * @return void
 */
function eio_grp_limit($grp, int $limit) {}

/**
 * @return void
 */
function eio_init() {}

/**
 * @param string $path
 * @param string $new_path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_link(string $path, string $new_path, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_lstat(string $path, int $pri, callable $callback, $data = null) {}

/**
 * @param string $path
 * @param int $mode
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_mkdir(string $path, int $mode, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param int $mode
 * @param int $dev
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_mknod(string $path, int $mode, int $dev, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_nop(int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @return int
 */
function eio_npending() : int {}

/**
 * @return int
 */
function eio_nready() : int {}

/**
 * @return int
 */
function eio_nreqs() : int {}

/**
 * @return int
 */
function eio_nthreads() : int {}

/**
 * @param string $path
 * @param int $flags
 * @param int $mode
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_open(string $path, int $flags, int $mode, int $pri, callable $callback, $data = null) {}

/**
 * @return int
 */
function eio_poll() : int {}

/**
 * @param mixed $fd
 * @param int $length
 * @param int $offset
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_read($fd, int $length, int $offset, int $pri, callable $callback, $data = null) {}

/**
 * @param mixed $fd
 * @param int $offset
 * @param int $length
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_readahead($fd, int $offset, int $length, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param int $flags
 * @param int $pri
 * @param callable $callback
 * @param string $data
 * @return resource
 */
function eio_readdir(string $path, int $flags, int $pri, callable $callback, string $data = null) {}

/**
 * @param string $path
 * @param int $pri
 * @param callable $callback
 * @param string $data
 * @return resource
 */
function eio_readlink(string $path, int $pri, callable $callback, string $data = null) {}

/**
 * @param string $path
 * @param int $pri
 * @param callable $callback
 * @param string $data
 * @return resource
 */
function eio_realpath(string $path, int $pri, callable $callback, string $data = null) {}

/**
 * @param string $path
 * @param string $new_path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_rename(string $path, string $new_path, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_rmdir(string $path, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $offset
 * @param int $whence
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_seek($fd, int $offset, int $whence, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $out_fd
 * @param mixed $in_fd
 * @param int $offset
 * @param int $length
 * @param int $pri
 * @param callable $callback
 * @param string $data
 * @return resource
 */
function eio_sendfile($out_fd, $in_fd, int $offset, int $length, int $pri = 0, callable $callback = null, string $data = '') {}

/**
 * @param int $nthreads
 * @return void
 */
function eio_set_max_idle(int $nthreads) {}

/**
 * @param int $nthreads
 * @return void
 */
function eio_set_max_parallel(int $nthreads) {}

/**
 * @param int $nreqs
 * @return void
 */
function eio_set_max_poll_reqs(int $nreqs) {}

/**
 * @param float $nseconds
 * @return void
 */
function eio_set_max_poll_time(float $nseconds) {}

/**
 * @param string $nthreads
 * @return void
 */
function eio_set_min_parallel(string $nthreads) {}

/**
 * @param string $path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_stat(string $path, int $pri, callable $callback, $data = null) {}

/**
 * @param string $path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_statvfs(string $path, int $pri, callable $callback, $data = null) {}

/**
 * @param string $path
 * @param string $new_path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_symlink(string $path, string $new_path, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_sync(int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $offset
 * @param int $nbytes
 * @param int $flags
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_sync_file_range($fd, int $offset, int $nbytes, int $flags, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_syncfs($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param int $offset
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_truncate(string $path, int $offset = 0, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_unlink(string $path, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param string $path
 * @param float $atime
 * @param float $mtime
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_utime(string $path, float $atime, float $mtime, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}

/**
 * @param mixed $fd
 * @param string $str
 * @param int $length
 * @param int $offset
 * @param int $pri
 * @param callable $callback
 * @param mixed $data
 * @return resource
 */
function eio_write($fd, string $str, int $length = 0, int $offset = 0, int $pri = EIO_PRI_DEFAULT, callable $callback = null, $data = null) {}
