<?php

class Phar extends RecursiveDirectoryIterator implements Countable, ArrayAccess
{
    function __construct(string $fname, int $flags = 0, string $alias = '') {}
    function __destruct() {}
    function addEmptyDir(string $dirname) {}
    function addFile(string $file, string $localname = '') {}
    function addFromString(string $localname, string $contents) {}
    function apiVersion() : string {}
    function buildFromDirectory(string $base_dir, string $regex = '') : array {}
    function buildFromIterator(Iterator $iter, string $base_directory = '') : array {}
    function canCompress(int $type = 0) : bool {}
    function canWrite() : bool {}
    function compress(int $compression, string $extension = '') {}
    function compressAllFilesBZIP2() : bool {}
    function compressAllFilesGZ() : bool {}
    function compressFiles(int $compression) {}
    function convertToData(int $format = 9021976, int $compression = 9021976, string $extension = '') : PharData {}
    function convertToExecutable(int $format = 9021976, int $compression = 9021976, string $extension = '') : Phar {}
    function copy(string $oldfile, string $newfile) : bool {}
    function count() : int {}
    function createDefaultStub(string $indexfile = '', string $webindexfile = '') : string {}
    function decompress(string $extension = '') {}
    function decompressFiles() : bool {}
    function delete(string $entry) : bool {}
    function delMetadata() : bool {}
    function extractTo(string $pathto, $files = null, bool $overwrite = false) : bool {}
    function getAlias() : string {}
    function getMetadata() {}
    function getModified() : bool {}
    function getPath() : string {}
    function getSignature() : array {}
    function getStub() : string {}
    function getSupportedCompression() : array {}
    function getSupportedSignatures() : array {}
    function getVersion() : string {}
    function hasMetadata() : bool {}
    function interceptFileFuncs() {}
    function isBuffering() : bool {}
    function isCompressed() {}
    function isFileFormat(int $format) : bool {}
    function isValidPharFilename(string $filename, bool $executable = true) : bool {}
    function isWritable() : bool {}
    function loadPhar(string $filename, string $alias = '') : bool {}
    function mapPhar(string $alias = '', int $dataoffset = 0) : bool {}
    function mount(string $pharpath, string $externalpath) {}
    function mungServer(array $munglist) {}
    function offsetExists(string $offset) : bool {}
    function offsetGet(string $offset) : int {}
    function offsetSet(string $offset, string $value) {}
    function offsetUnset(string $offset) : bool {}
    function running(bool $retphar = true) : string {}
    function setAlias(string $alias) : bool {}
    function setDefaultStub(string $index = '', string $webindex = '') : bool {}
    function setMetadata($metadata) {}
    function setSignatureAlgorithm(int $sigtype, string $privatekey = '') {}
    function setStub(string $stub, int $len = -1) : bool {}
    function startBuffering() {}
    function stopBuffering() {}
    function uncompressAllFiles() : bool {}
    function unlinkArchive(string $archive) : bool {}
    function webPhar(string $alias = '', string $index = "index.php", string $f404 = '', array $mimetypes = [], callable $rewrites = null) {}
}

class PharData extends RecursiveDirectoryIterator implements Countable, ArrayAccess
{
    function __construct(string $fname, int $flags = 0, string $alias = '', int $format = Phar::TAR) {}
    function __destruct() {}
    function addEmptyDir(string $dirname) {}
    function addFile() {}
    function addFromString(string $localname, string $contents) {}
    function apiVersion() {}
    function buildFromDirectory() {}
    function buildFromIterator(Iterator $iter, string $base_directory = '') : array {}
    function canCompress() {}
    function canWrite() {}
    function compress(int $compression, string $extension = '') {}
    function compressFiles(int $compression) {}
    function convertToData(int $format = 0, int $compression = 0, string $extension = '') : PharData {}
    function convertToExecutable(int $format = 0, int $compression = 0, string $extension = '') : Phar {}
    function copy(string $oldfile, string $newfile) : bool {}
    function count() {}
    function createDefaultStub() {}
    function decompress(string $extension = '') {}
    function decompressFiles() : bool {}
    function delete(string $entry) : bool {}
    function delMetadata() : bool {}
    function extractTo(string $pathto, $files = null, bool $overwrite = false) : bool {}
    function getAlias() {}
    function getMetadata() {}
    function getModified() {}
    function getPath() {}
    function getSignature() {}
    function getStub() {}
    function getSupportedCompression() {}
    function getSupportedSignatures() {}
    function getVersion() {}
    function hasMetadata() {}
    function interceptFileFuncs() {}
    function isBuffering() {}
    function isCompressed() {}
    function isFileFormat() {}
    function isValidPharFilename() {}
    function isWritable() : bool {}
    function loadPhar() {}
    function mapPhar() {}
    function mount() {}
    function mungServer() {}
    function offsetExists() {}
    function offsetGet() {}
    function offsetSet(string $offset, string $value) {}
    function offsetUnset(string $offset) : bool {}
    function running() {}
    function setAlias(string $alias) : bool {}
    function setDefaultStub(string $index = '', string $webindex = '') : bool {}
    function setMetadata() {}
    function setSignatureAlgorithm() {}
    function setStub(string $stub, int $len = -1) : bool {}
    function startBuffering() {}
    function stopBuffering() {}
    function unlinkArchive() {}
    function webPhar() {}
}

class PharException extends Exception {}

class PharFileInfo extends SplFileInfo
{
    function __construct(string $entry) {}
    function __destruct() {}
    function chmod(int $permissions) {}
    function compress(int $compression) : bool {}
    function decompress() : bool {}
    function delMetadata() : bool {}
    function getCompressedSize() : int {}
    function getContent() : string {}
    function getCRC32() : int {}
    function getMetadata() {}
    function getPharFlags() : int {}
    function hasMetadata() : bool {}
    function isCompressed(int $compression_type = 9021976) : bool {}
    function isCompressedBZIP2() : bool {}
    function isCompressedGZ() : bool {}
    function isCRCChecked() : bool {}
    function setCompressedBZIP2() : bool {}
    function setCompressedGZ() : bool {}
    function setMetadata($metadata) {}
    function setUncompressed() : bool {}
}
