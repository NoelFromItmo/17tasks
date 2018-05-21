<?php

const FTP_ASCII = 1;
const FTP_AUTORESUME = -1;
const FTP_AUTOSEEK = 1;
const FTP_BINARY = 2;
const FTP_FAILED = 0;
const FTP_FINISHED = 1;
const FTP_IMAGE = 2;
const FTP_MOREDATA = 2;
const FTP_TEXT = 1;
const FTP_TIMEOUT_SEC = 0;
const FTP_USEPASVADDRESS = 2;

/**
 * @param resource $ftp_stream
 * @param int $filesize
 * @param string $result
 * @return bool
 */
function ftp_alloc($ftp_stream, int $filesize, string &$result = '') : bool {}

/**
 * @param resource $ftp
 * @param string $remote_file
 * @param string $local_file
 * @param int $mode
 * @return bool
 */
function ftp_append($ftp, string $remote_file, string $local_file, int $mode = FTP_IMAGE) : bool {}

/**
 * @param resource $ftp_stream
 * @return bool
 */
function ftp_cdup($ftp_stream) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $directory
 * @return bool
 */
function ftp_chdir($ftp_stream, string $directory) : bool {}

/**
 * @param resource $ftp_stream
 * @param int $mode
 * @param string $filename
 * @return int
 */
function ftp_chmod($ftp_stream, int $mode, string $filename) : int {}

/**
 * @param resource $ftp_stream
 * @return bool
 */
function ftp_close($ftp_stream) : bool {}

/**
 * @param string $host
 * @param int $port
 * @param int $timeout
 * @return resource
 */
function ftp_connect(string $host, int $port = 21, int $timeout = 90) {}

/**
 * @param resource $ftp_stream
 * @param string $path
 * @return bool
 */
function ftp_delete($ftp_stream, string $path) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $command
 * @return bool
 */
function ftp_exec($ftp_stream, string $command) : bool {}

/**
 * @param resource $ftp_stream
 * @param resource $handle
 * @param string $remote_file
 * @param int $mode
 * @param int $resumepos
 * @return bool
 */
function ftp_fget($ftp_stream, $handle, string $remote_file, int $mode = FTP_IMAGE, int $resumepos = 0) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $remote_file
 * @param resource $handle
 * @param int $mode
 * @param int $startpos
 * @return bool
 */
function ftp_fput($ftp_stream, string $remote_file, $handle, int $mode = FTP_IMAGE, int $startpos = 0) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $local_file
 * @param string $remote_file
 * @param int $mode
 * @param int $resumepos
 * @return bool
 */
function ftp_get($ftp_stream, string $local_file, string $remote_file, int $mode = FTP_IMAGE, int $resumepos = 0) : bool {}

/**
 * @param resource $ftp_stream
 * @param int $option
 * @return mixed
 */
function ftp_get_option($ftp_stream, int $option) {}

/**
 * @param resource $ftp_stream
 * @param string $username
 * @param string $password
 * @return bool
 */
function ftp_login($ftp_stream, string $username, string $password) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $remote_file
 * @return int
 */
function ftp_mdtm($ftp_stream, string $remote_file) : int {}

/**
 * @param resource $ftp_stream
 * @param string $directory
 * @return string
 */
function ftp_mkdir($ftp_stream, string $directory) : string {}

/**
 * @param resource $ftp_stream
 * @param string $directory
 * @return array
 */
function ftp_mlsd($ftp_stream, string $directory) : array {}

/**
 * @param resource $ftp_stream
 * @return int
 */
function ftp_nb_continue($ftp_stream) : int {}

/**
 * @param resource $ftp_stream
 * @param resource $handle
 * @param string $remote_file
 * @param int $mode
 * @param int $resumepos
 * @return int
 */
function ftp_nb_fget($ftp_stream, $handle, string $remote_file, int $mode = FTP_IMAGE, int $resumepos = 0) : int {}

/**
 * @param resource $ftp_stream
 * @param string $remote_file
 * @param resource $handle
 * @param int $mode
 * @param int $startpos
 * @return int
 */
function ftp_nb_fput($ftp_stream, string $remote_file, $handle, int $mode = FTP_IMAGE, int $startpos = 0) : int {}

/**
 * @param resource $ftp_stream
 * @param string $local_file
 * @param string $remote_file
 * @param int $mode
 * @param int $resumepos
 * @return int
 */
function ftp_nb_get($ftp_stream, string $local_file, string $remote_file, int $mode = FTP_IMAGE, int $resumepos = 0) : int {}

/**
 * @param resource $ftp_stream
 * @param string $remote_file
 * @param string $local_file
 * @param int $mode
 * @param int $startpos
 * @return int
 */
function ftp_nb_put($ftp_stream, string $remote_file, string $local_file, int $mode = FTP_IMAGE, int $startpos = 0) : int {}

/**
 * @param resource $ftp_stream
 * @param string $directory
 * @return array
 */
function ftp_nlist($ftp_stream, string $directory) : array {}

/**
 * @param resource $ftp_stream
 * @param bool $pasv
 * @return bool
 */
function ftp_pasv($ftp_stream, bool $pasv) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $remote_file
 * @param string $local_file
 * @param int $mode
 * @param int $startpos
 * @return bool
 */
function ftp_put($ftp_stream, string $remote_file, string $local_file, int $mode = FTP_IMAGE, int $startpos = 0) : bool {}

/**
 * @param resource $ftp_stream
 * @return string
 */
function ftp_pwd($ftp_stream) : string {}

/**
 * @param mixed $ftp
 * @return void
 */
function ftp_quit($ftp) {}

/**
 * @param resource $ftp_stream
 * @param string $command
 * @return array
 */
function ftp_raw($ftp_stream, string $command) : array {}

/**
 * @param resource $ftp_stream
 * @param string $directory
 * @param bool $recursive
 * @return array
 */
function ftp_rawlist($ftp_stream, string $directory, bool $recursive = false) : array {}

/**
 * @param resource $ftp_stream
 * @param string $oldname
 * @param string $newname
 * @return bool
 */
function ftp_rename($ftp_stream, string $oldname, string $newname) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $directory
 * @return bool
 */
function ftp_rmdir($ftp_stream, string $directory) : bool {}

/**
 * @param resource $ftp_stream
 * @param int $option
 * @param mixed $value
 * @return bool
 */
function ftp_set_option($ftp_stream, int $option, $value) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $command
 * @return bool
 */
function ftp_site($ftp_stream, string $command) : bool {}

/**
 * @param resource $ftp_stream
 * @param string $remote_file
 * @return int
 */
function ftp_size($ftp_stream, string $remote_file) : int {}

/**
 * @param string $host
 * @param int $port
 * @param int $timeout
 * @return resource
 */
function ftp_ssl_connect(string $host, int $port = 21, int $timeout = 90) {}

/**
 * @param resource $ftp_stream
 * @return string
 */
function ftp_systype($ftp_stream) : string {}
