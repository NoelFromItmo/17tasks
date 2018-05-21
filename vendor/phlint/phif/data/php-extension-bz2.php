<?php

/**
 * @param resource $bz
 * @return int
 */
function bzclose($bz) : int {}

/**
 * @param string $source
 * @param int $blocksize
 * @param int $workfactor
 * @return mixed
 */
function bzcompress(string $source, int $blocksize = 4, int $workfactor = 0) {}

/**
 * @param string $source
 * @param int $small
 * @return mixed
 */
function bzdecompress(string $source, int $small = 0) {}

/**
 * @param resource $bz
 * @return int
 */
function bzerrno($bz) : int {}

/**
 * @param resource $bz
 * @return array
 */
function bzerror($bz) : array {}

/**
 * @param resource $bz
 * @return string
 */
function bzerrstr($bz) : string {}

/**
 * @param resource $bz
 * @return bool
 */
function bzflush($bz) : bool {}

/**
 * @param mixed $file
 * @param string $mode
 * @return resource
 */
function bzopen($file, string $mode) {}

/**
 * @param resource $bz
 * @param int $length
 * @return string
 */
function bzread($bz, int $length = 1024) : string {}

/**
 * @param resource $bz
 * @param string $data
 * @param int $length
 * @return int
 */
function bzwrite($bz, string $data, int $length = 0) : int {}
