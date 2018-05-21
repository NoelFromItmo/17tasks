<?php

/**
 * @param resource $zip
 * @return void
 */
function zip_close($zip) {}

/**
 * @param resource $zip_entry
 * @return bool
 */
function zip_entry_close($zip_entry) : bool {}

/**
 * @param resource $zip_entry
 * @return int
 */
function zip_entry_compressedsize($zip_entry) : int {}

/**
 * @param resource $zip_entry
 * @return string
 */
function zip_entry_compressionmethod($zip_entry) : string {}

/**
 * @param resource $zip_entry
 * @return int
 */
function zip_entry_filesize($zip_entry) : int {}

/**
 * @param resource $zip_entry
 * @return string
 */
function zip_entry_name($zip_entry) : string {}

/**
 * @param resource $zip
 * @param resource $zip_entry
 * @param string $mode
 * @return bool
 */
function zip_entry_open($zip, $zip_entry, string $mode = '') : bool {}

/**
 * @param resource $zip_entry
 * @param int $length
 * @return string
 */
function zip_entry_read($zip_entry, int $length = 1024) : string {}

/**
 * @param string $filename
 * @return resource
 */
function zip_open(string $filename) {}

/**
 * @param resource $zip
 * @return resource
 */
function zip_read($zip) {}

class ZipArchive implements Countable
{
    function addEmptyDir(string $dirname) : bool {}
    function addFile(string $filename, string $localname = null, int $start = 0, int $length = 0) : bool {}
    function addFromString(string $localname, string $contents) : bool {}
    function addGlob(string $pattern, int $flags = 0, array $options = []) : bool {}
    function addPattern(string $pattern, string $path = ".", array $options = []) : bool {}
    function close() : bool {}
    function count() : int {}
    function deleteIndex(int $index) : bool {}
    function deleteName(string $name) : bool {}
    function extractTo(string $destination, $entries = null) : bool {}
    function getArchiveComment(int $flags = 0) : string {}
    function getCommentIndex(int $index, int $flags = 0) : string {}
    function getCommentName(string $name, int $flags = 0) : string {}
    function getExternalAttributesIndex(int $index, int &$opsys, int &$attr, int $flags = 0) : bool {}
    function getExternalAttributesName(string $name, int &$opsys, int &$attr, int $flags = 0) : bool {}
    function getFromIndex(int $index, int $length = 0, int $flags = 0) : string {}
    function getFromName(string $name, int $length = 0, int $flags = 0) : string {}
    function getNameIndex(int $index, int $flags = 0) : string {}
    function getStatusString() : string {}
    function getStream(string $name) {}
    function locateName(string $name, int $flags = 0) : int {}
    function open(string $filename, int $flags = 0) {}
    function renameIndex(int $index, string $newname) : bool {}
    function renameName(string $name, string $newname) : bool {}
    function setArchiveComment(string $comment) : bool {}
    function setCommentIndex(int $index, string $comment) : bool {}
    function setCommentName(string $name, string $comment) : bool {}
    function setCompressionIndex(int $index, int $comp_method, int $comp_flags = 0) : bool {}
    function setCompressionName(string $name, int $comp_method, int $comp_flags = 0) : bool {}
    function setEncryptionIndex(int $index, string $method, string $password = '') : bool {}
    function setEncryptionName(string $name, int $method, string $password = '') : bool {}
    function setExternalAttributesIndex(int $index, int $opsys, int $attr, int $flags = 0) : bool {}
    function setExternalAttributesName(string $name, int $opsys, int $attr, int $flags = 0) : bool {}
    function setPassword(string $password) : bool {}
    function statIndex(int $index, int $flags = 0) : array {}
    function statName(string $name, int $flags = 0) : array {}
    function unchangeAll() : bool {}
    function unchangeArchive() : bool {}
    function unchangeIndex(int $index) : bool {}
    function unchangeName(string $name) : bool {}
}
