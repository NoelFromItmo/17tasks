<?php

/**
 * @param RarArchive $rarfile
 * @param bool $allow_broken
 * @return bool
 */
function rar_allow_broken_set(RarArchive $rarfile, bool $allow_broken) : bool {}

/**
 * @param RarArchive $rarfile
 * @return bool
 */
function rar_broken_is(RarArchive $rarfile) : bool {}

/**
 * @param RarArchive $rarfile
 * @return bool
 */
function rar_close(RarArchive $rarfile) : bool {}

/**
 * @param RarArchive $rarfile
 * @return string
 */
function rar_comment_get(RarArchive $rarfile) : string {}

/**
 * @param RarArchive $rarfile
 * @param string $entryname
 * @return RarEntry
 */
function rar_entry_get(RarArchive $rarfile, string $entryname) : RarEntry {}

/**
 * @param RarArchive $rarfile
 * @return array
 */
function rar_list(RarArchive $rarfile) : array {}

/**
 * @param string $filename
 * @param string $password
 * @param callable $volume_callback
 * @return RarArchive
 */
function rar_open(string $filename, string $password = null, callable $volume_callback = null) : RarArchive {}

/**
 * @param RarArchive $rarfile
 * @return bool
 */
function rar_solid_is(RarArchive $rarfile) : bool {}

/**
 * @return string
 */
function rar_wrapper_cache_stats() : string {}

final class RarArchive implements Traversable
{
    function __toString() : string {}
    function close() : bool {}
    function getComment() : string {}
    function getEntries() : array {}
    function getEntry(string $entryname) : RarEntry {}
    function isBroken() : bool {}
    function isSolid() : bool {}
    function open(string $filename, string $password = null, callable $volume_callback = null) : RarArchive {}
    function setAllowBroken(bool $allow_broken) : bool {}
}

final class RarEntry
{
    function __toString() : string {}
    function extract(string $dir, string $filepath = "", string $password = null, bool $extended_data = false) : bool {}
    function getAttr() : int {}
    function getCrc() : string {}
    function getFileTime() : string {}
    function getHostOs() : int {}
    function getMethod() : int {}
    function getName() : string {}
    function getPackedSize() : int {}
    function getStream(string $password = '') {}
    function getUnpackedSize() : int {}
    function getVersion() : int {}
    function isDirectory() : bool {}
    function isEncrypted() : bool {}
}

final class RarException extends Exception
{
    function isUsingExceptions() : bool {}
    function setUsingExceptions(bool $using_exceptions) {}
}
