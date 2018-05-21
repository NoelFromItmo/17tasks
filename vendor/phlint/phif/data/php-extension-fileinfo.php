<?php

const FILEINFO_CONTINUE = 32;
const FILEINFO_DEVICES = 8;
const FILEINFO_EXTENSION = 16777216;
const FILEINFO_MIME = 1040;
const FILEINFO_MIME_ENCODING = 1024;
const FILEINFO_MIME_TYPE = 16;
const FILEINFO_NONE = 0;
const FILEINFO_PRESERVE_ATIME = 128;
const FILEINFO_RAW = 256;
const FILEINFO_SYMLINK = 2;

/**
 * @param resource $finfo
 * @param string $string
 * @param int $options
 * @param resource $context
 * @return string
 */
function finfo_buffer($finfo, string $string, int $options = FILEINFO_NONE, $context = null) : string {}

/**
 * @param resource $finfo
 * @return bool
 */
function finfo_close($finfo) : bool {}

/**
 * @param resource $finfo
 * @param string $file_name
 * @param int $options
 * @param resource $context
 * @return string
 */
function finfo_file($finfo, string $file_name, int $options = FILEINFO_NONE, $context = null) : string {}

/**
 * @param int $options
 * @param string $magic_file
 * @return resource
 */
function finfo_open(int $options = FILEINFO_NONE, string $magic_file = null) {}

/**
 * @param resource $finfo
 * @param int $options
 * @return bool
 */
function finfo_set_flags($finfo, int $options) : bool {}

/**
 * @param string $filename
 * @return string
 */
function mime_content_type(string $filename) : string {}

class finfo
{
    function buffer(string $string, int $options = FILEINFO_NONE, $context = null) : string {}
    function file(string $file_name, int $options = FILEINFO_NONE, $context = null) : string {}
    function finfo() {}
    function set_flags(int $options) : bool {}
}
