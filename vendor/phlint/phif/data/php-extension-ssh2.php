<?php

/**
 * @param resource $session
 * @param string $username
 * @return bool
 */
function ssh2_auth_agent($session, string $username) : bool {}

/**
 * @param resource $session
 * @param string $username
 * @param string $hostname
 * @param string $pubkeyfile
 * @param string $privkeyfile
 * @param string $passphrase
 * @param string $local_username
 * @return bool
 */
function ssh2_auth_hostbased_file($session, string $username, string $hostname, string $pubkeyfile, string $privkeyfile, string $passphrase = '', string $local_username = '') : bool {}

/**
 * @param resource $session
 * @param string $username
 * @return mixed
 */
function ssh2_auth_none($session, string $username) {}

/**
 * @param resource $session
 * @param string $username
 * @param string $password
 * @return bool
 */
function ssh2_auth_password($session, string $username, string $password) : bool {}

/**
 * @param resource $session
 * @param string $username
 * @param string $pubkeyfile
 * @param string $privkeyfile
 * @param string $passphrase
 * @return bool
 */
function ssh2_auth_pubkey_file($session, string $username, string $pubkeyfile, string $privkeyfile, string $passphrase = '') : bool {}

/**
 * @param string $host
 * @param int $port
 * @param array $methods
 * @param array $callbacks
 * @return resource
 */
function ssh2_connect(string $host, int $port = 22, array $methods = [], array $callbacks = []) {}

/**
 * @param resource $session
 * @param string $command
 * @param string $pty
 * @param array $env
 * @param int $width
 * @param int $height
 * @param int $width_height_type
 * @return resource
 */
function ssh2_exec($session, string $command, string $pty = '', array $env = [], int $width = 80, int $height = 25, int $width_height_type = SSH2_TERM_UNIT_CHARS) {}

/**
 * @param resource $channel
 * @param int $streamid
 * @return resource
 */
function ssh2_fetch_stream($channel, int $streamid) {}

/**
 * @param resource $session
 * @param int $flags
 * @return string
 */
function ssh2_fingerprint($session, int $flags = SSH2_FINGERPRINT_MD5 | SSH2_FINGERPRINT_HEX) : string {}

/**
 * @param resource $session
 * @return array
 */
function ssh2_methods_negotiated($session) : array {}

/**
 * @param resource $pkey
 * @param string $algoname
 * @param string $blob
 * @param bool $overwrite
 * @param array $attributes
 * @return bool
 */
function ssh2_publickey_add($pkey, string $algoname, string $blob, bool $overwrite = false, array $attributes = []) : bool {}

/**
 * @param resource $session
 * @return resource
 */
function ssh2_publickey_init($session) {}

/**
 * @param resource $pkey
 * @return array
 */
function ssh2_publickey_list($pkey) : array {}

/**
 * @param resource $pkey
 * @param string $algoname
 * @param string $blob
 * @return bool
 */
function ssh2_publickey_remove($pkey, string $algoname, string $blob) : bool {}

/**
 * @param resource $session
 * @param string $remote_file
 * @param string $local_file
 * @return bool
 */
function ssh2_scp_recv($session, string $remote_file, string $local_file) : bool {}

/**
 * @param resource $session
 * @param string $local_file
 * @param string $remote_file
 * @param int $create_mode
 * @return bool
 */
function ssh2_scp_send($session, string $local_file, string $remote_file, int $create_mode = 0644) : bool {}

/**
 * @param resource $session
 * @return resource
 */
function ssh2_sftp($session) {}

/**
 * @param resource $sftp
 * @param string $filename
 * @param int $mode
 * @return bool
 */
function ssh2_sftp_chmod($sftp, string $filename, int $mode) : bool {}

/**
 * @param resource $sftp
 * @param string $path
 * @return array
 */
function ssh2_sftp_lstat($sftp, string $path) : array {}

/**
 * @param resource $sftp
 * @param string $dirname
 * @param int $mode
 * @param bool $recursive
 * @return bool
 */
function ssh2_sftp_mkdir($sftp, string $dirname, int $mode = 0777, bool $recursive = false) : bool {}

/**
 * @param resource $sftp
 * @param string $link
 * @return string
 */
function ssh2_sftp_readlink($sftp, string $link) : string {}

/**
 * @param resource $sftp
 * @param string $filename
 * @return string
 */
function ssh2_sftp_realpath($sftp, string $filename) : string {}

/**
 * @param resource $sftp
 * @param string $from
 * @param string $to
 * @return bool
 */
function ssh2_sftp_rename($sftp, string $from, string $to) : bool {}

/**
 * @param resource $sftp
 * @param string $dirname
 * @return bool
 */
function ssh2_sftp_rmdir($sftp, string $dirname) : bool {}

/**
 * @param resource $sftp
 * @param string $path
 * @return array
 */
function ssh2_sftp_stat($sftp, string $path) : array {}

/**
 * @param resource $sftp
 * @param string $target
 * @param string $link
 * @return bool
 */
function ssh2_sftp_symlink($sftp, string $target, string $link) : bool {}

/**
 * @param resource $sftp
 * @param string $filename
 * @return bool
 */
function ssh2_sftp_unlink($sftp, string $filename) : bool {}

/**
 * @param resource $session
 * @param string $term_type
 * @param array $env
 * @param int $width
 * @param int $height
 * @param int $width_height_type
 * @return resource
 */
function ssh2_shell($session, string $term_type = "vanilla", array $env = [], int $width = 80, int $height = 25, int $width_height_type = SSH2_TERM_UNIT_CHARS) {}

/**
 * @param resource $session
 * @param string $host
 * @param int $port
 * @return resource
 */
function ssh2_tunnel($session, string $host, int $port) {}
