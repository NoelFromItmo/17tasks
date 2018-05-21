<?php

/**
 * @param resource $shmid
 * @return void
 */
function shmop_close($shmid) {}

/**
 * @param resource $shmid
 * @return bool
 */
function shmop_delete($shmid) : bool {}

/**
 * @param int $key
 * @param string $flags
 * @param int $mode
 * @param int $size
 * @return resource
 */
function shmop_open(int $key, string $flags, int $mode, int $size) {}

/**
 * @param resource $shmid
 * @param int $start
 * @param int $count
 * @return string
 */
function shmop_read($shmid, int $start, int $count) : string {}

/**
 * @param resource $shmid
 * @return int
 */
function shmop_size($shmid) : int {}

/**
 * @param resource $shmid
 * @param string $data
 * @param int $offset
 * @return int
 */
function shmop_write($shmid, string $data, int $offset) : int {}
