<?php

/**
 * @param mixed $class
 * @param bool $autoload
 * @return array
 */
function class_implements($class, bool $autoload = true) : array {}

/**
 * @param mixed $class
 * @param bool $autoload
 * @return array
 */
function class_parents($class, bool $autoload = true) : array {}

/**
 * @param mixed $class
 * @param bool $autoload
 * @return array
 */
function class_uses($class, bool $autoload = true) : array {}

/**
 * @param Traversable $iterator
 * @param callable $function
 * @param array $args
 * @return int
 */
function iterator_apply(Traversable $iterator, callable $function, array $args = null) : int {}

/**
 * @param Traversable $iterator
 * @return int
 */
function iterator_count(Traversable $iterator) : int {}

/**
 * @param Traversable $iterator
 * @param bool $use_keys
 * @return array
 */
function iterator_to_array(Traversable $iterator, bool $use_keys = true) : array {}

/**
 * @param string $class_name
 * @param string $file_extensions
 * @return void
 */
function spl_autoload(string $class_name, string $file_extensions = '') {}

/**
 * @param string $class_name
 * @return void
 */
function spl_autoload_call(string $class_name) {}

/**
 * @param string $file_extensions
 * @return string
 */
function spl_autoload_extensions(string $file_extensions = '') : string {}

/**
 * @return array
 */
function spl_autoload_functions() : array {}

/**
 * @param callable $autoload_function
 * @param bool $throw
 * @param bool $prepend
 * @return bool
 */
function spl_autoload_register(callable $autoload_function = null, bool $throw = true, bool $prepend = false) : bool {}

/**
 * @param mixed $autoload_function
 * @return bool
 */
function spl_autoload_unregister($autoload_function) : bool {}

/**
 * @return array
 */
function spl_classes() : array {}

/**
 * @param object $obj
 * @return string
 */
function spl_object_hash($obj) : string {}

/**
 * @param object $obj
 * @return int
 */
function spl_object_id($obj) : int {}

class AppendIterator extends IteratorIterator implements OuterIterator
{
    function __construct() {}
    function append(Iterator $iterator) {}
    function current() {}
    function getArrayIterator() : ArrayIterator {}
    function getInnerIterator() : Iterator {}
    function getIteratorIndex() : int {}
    function key() : scalar {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}

class ArrayIterator implements ArrayAccess, SeekableIterator, Countable, Serializable
{
    function __construct($array = null, int $flags = 0) {}
    function append($value) {}
    function asort() {}
    function count() : int {}
    function current() {}
    function getArrayCopy() : array {}
    function getFlags() {}
    function key() {}
    function ksort() {}
    function natcasesort() {}
    function natsort() {}
    function next() {}
    function offsetExists(string $index) {}
    function offsetGet(string $index) {}
    function offsetSet(string $index, string $newval) {}
    function offsetUnset(string $index) {}
    function rewind() {}
    function seek(int $position) {}
    function serialize() : string {}
    function setFlags(string $flags) {}
    function uasort($cmp_function) {}
    function uksort($cmp_function) {}
    function unserialize(string $serialized) : string {}
    function valid() : bool {}
}

class ArrayObject implements IteratorAggregate, ArrayAccess, Serializable, Countable
{
    function __construct() {}
    function append($value) {}
    function asort() {}
    function count() : int {}
    function exchangeArray($input) : array {}
    function getArrayCopy() : array {}
    function getFlags() : int {}
    function getIterator() : ArrayIterator {}
    function getIteratorClass() : string {}
    function ksort() {}
    function natcasesort() {}
    function natsort() {}
    function offsetExists($index) : bool {}
    function offsetGet($index) {}
    function offsetSet($index, $newval) {}
    function offsetUnset($index) {}
    function serialize() : string {}
    function setFlags(int $flags) {}
    function setIteratorClass(string $iterator_class) {}
    function uasort(callable $cmp_function) {}
    function uksort(callable $cmp_function) {}
    function unserialize(string $serialized) {}
}

class BadFunctionCallException extends LogicException {}

class BadMethodCallException extends BadFunctionCallException {}

class CachingIterator extends IteratorIterator implements OuterIterator, ArrayAccess, Countable
{
    function __construct(Iterator $iterator, int $flags = self::CALL_TOSTRING) {}
    function __toString() {}
    function count() : int {}
    function current() {}
    function getCache() : array {}
    function getFlags() : int {}
    function getInnerIterator() : Iterator {}
    function hasNext() {}
    function key() : scalar {}
    function next() {}
    function offsetExists(string $index) {}
    function offsetGet(string $index) {}
    function offsetSet(string $index, string $newval) {}
    function offsetUnset(string $index) {}
    function rewind() {}
    function setFlags(int $flags) {}
    function valid() {}
}

class CallbackFilterIterator extends FilterIterator implements OuterIterator
{
    function __construct() {}
    function accept() : string {}
}

class DirectoryIterator extends SplFileInfo implements SeekableIterator
{
    function __construct() {}
    function __toString() : string {}
    function current() : DirectoryIterator {}
    function getATime() : int {}
    function getBasename(string $suffix = '') : string {}
    function getCTime() : int {}
    function getExtension() : string {}
    function getFilename() : string {}
    function getGroup() : int {}
    function getInode() : int {}
    function getMTime() : int {}
    function getOwner() : int {}
    function getPath() : string {}
    function getPathname() : string {}
    function getPerms() : int {}
    function getSize() : int {}
    function getType() : string {}
    function isDir() : bool {}
    function isDot() : bool {}
    function isExecutable() : bool {}
    function isFile() : bool {}
    function isLink() : bool {}
    function isReadable() : bool {}
    function isWritable() : bool {}
    function key() : string {}
    function next() {}
    function rewind() {}
    function seek(int $position) {}
    function valid() : bool {}
}

class DomainException extends LogicException {}

class EmptyIterator implements Iterator
{
    function current() {}
    function key() : scalar {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}

class FilesystemIterator extends DirectoryIterator implements SeekableIterator
{
    function __construct(string $path, int $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS) {}
    function current() {}
    function getFlags() : int {}
    function key() : string {}
    function next() {}
    function rewind() {}
    function setFlags(int $flags = 0) {}
}

abstract class FilterIterator extends IteratorIterator implements OuterIterator
{
    function __construct(Iterator $iterator) {}
    function accept() : bool {}
    function current() {}
    function getInnerIterator() : Iterator {}
    function key() {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}

class GlobIterator extends FilesystemIterator implements SeekableIterator, Countable
{
    function __construct(string $pattern, int $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO) {}
    function count() : int {}
}

class InfiniteIterator extends IteratorIterator implements OuterIterator
{
    function __construct(Iterator $iterator) {}
    function next() {}
}

class InvalidArgumentException extends LogicException {}

class IteratorIterator implements OuterIterator
{
    function __construct(Traversable $iterator) {}
    function current() {}
    function getInnerIterator() : Traversable {}
    function key() : scalar {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}

class LengthException extends LogicException {}

class LimitIterator extends IteratorIterator implements OuterIterator
{
    function __construct(Iterator $iterator, int $offset = 0, int $count = -1) {}
    function current() {}
    function getInnerIterator() : Iterator {}
    function getPosition() : int {}
    function key() {}
    function next() {}
    function rewind() {}
    function seek(int $position) : int {}
    function valid() : bool {}
}

class LogicException extends Exception {}

class MultipleIterator implements Iterator
{
    function __construct() {}
    function attachIterator(Iterator $iterator, string $infos = '') {}
    function containsIterator(Iterator $iterator) : bool {}
    function countIterators() : int {}
    function current() : array {}
    function detachIterator(Iterator $iterator) {}
    function getFlags() : int {}
    function key() : array {}
    function next() {}
    function rewind() {}
    function setFlags(int $flags) {}
    function valid() : bool {}
}

class NoRewindIterator extends IteratorIterator
{
    function __construct(Iterator $iterator) {}
    function current() {}
    function getInnerIterator() : iterator {}
    function key() {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}

interface OuterIterator extends Iterator
{
    function getInnerIterator() : Iterator {}
}

class OutOfBoundsException extends RuntimeException {}

class OutOfRangeException extends LogicException {}

class OverflowException extends RuntimeException {}

class ParentIterator extends RecursiveFilterIterator implements RecursiveIterator, OuterIterator
{
    function __construct(RecursiveIterator $iterator) {}
    function accept() : bool {}
    function getChildren() : ParentIterator {}
    function hasChildren() : bool {}
    function next() {}
    function rewind() {}
}

class RangeException extends RuntimeException {}

class RecursiveArrayIterator extends ArrayIterator implements RecursiveIterator
{
    function getChildren() : RecursiveArrayIterator {}
    function hasChildren() : bool {}
}

class RecursiveCachingIterator extends CachingIterator implements Countable, ArrayAccess, OuterIterator, RecursiveIterator
{
    function __construct(Iterator $iterator, string $flags = self::CALL_TOSTRING) {}
    function getChildren() : RecursiveCachingIterator {}
    function hasChildren() : bool {}
}

class RecursiveCallbackFilterIterator extends CallbackFilterIterator implements OuterIterator, RecursiveIterator
{
    function __construct() {}
    function getChildren() : RecursiveCallbackFilterIterator {}
    function hasChildren() : bool {}
}

class RecursiveDirectoryIterator extends FilesystemIterator implements SeekableIterator, RecursiveIterator
{
    function __construct(string $path, int $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO) {}
    function getChildren() {}
    function getSubPath() : string {}
    function getSubPathname() : string {}
    function hasChildren(bool $allow_links = false) : bool {}
    function key() : string {}
    function next() {}
    function rewind() {}
}

abstract class RecursiveFilterIterator extends FilterIterator implements OuterIterator, RecursiveIterator
{
    function __construct(RecursiveIterator $iterator) {}
    function getChildren() : RecursiveFilterIterator {}
    function hasChildren() : bool {}
}

interface RecursiveIterator extends Iterator
{
    function getChildren() : RecursiveIterator {}
    function hasChildren() : bool {}
}

class RecursiveIteratorIterator implements OuterIterator
{
    function __construct(Traversable $iterator, int $mode = RecursiveIteratorIterator::LEAVES_ONLY, int $flags = 0) {}
    function beginChildren() {}
    function beginIteration() {}
    function callGetChildren() : RecursiveIterator {}
    function callHasChildren() : bool {}
    function current() {}
    function endChildren() {}
    function endIteration() {}
    function getDepth() : int {}
    function getInnerIterator() : iterator {}
    function getMaxDepth() {}
    function getSubIterator(int $level = 0) : RecursiveIterator {}
    function key() {}
    function next() {}
    function nextElement() {}
    function rewind() {}
    function setMaxDepth(int $max_depth = -1) {}
    function valid() : bool {}
}

class RecursiveRegexIterator extends RegexIterator implements RecursiveIterator
{
    function __construct() {}
    function accept() {}
    function getChildren() : RecursiveRegexIterator {}
    function hasChildren() : bool {}
}

class RecursiveTreeIterator extends RecursiveIteratorIterator implements OuterIterator
{
    function __construct($it, int $flags = RecursiveTreeIterator::BYPASS_KEY, int $cit_flags = CachingIterator::CATCH_GET_CHILD, int $mode = RecursiveIteratorIterator::SELF_FIRST) {}
    function beginChildren() {}
    function beginIteration() : RecursiveIterator {}
    function callGetChildren() : RecursiveIterator {}
    function callHasChildren() : bool {}
    function current() : string {}
    function endChildren() {}
    function endIteration() {}
    function getEntry() : string {}
    function getPostfix() : string {}
    function getPrefix() : string {}
    function key() : string {}
    function next() {}
    function nextElement() {}
    function rewind() {}
    function setPostfix(string $postfix) {}
    function setPrefixPart(int $part, string $value) {}
    function valid() : bool {}
}

class RegexIterator extends FilterIterator
{
    function __construct() {}
    function accept() : bool {}
    function getFlags() : int {}
    function getMode() : int {}
    function getPregFlags() : int {}
    function getRegex() : string {}
    function setFlags(int $flags) {}
    function setMode(int $mode) {}
    function setPregFlags(int $preg_flags) {}
}

class RuntimeException extends Exception {}

interface SeekableIterator extends Iterator
{
    function seek(int $position) {}
}

class SplBool extends SplEnum {}

class SplDoublyLinkedList implements Iterator, ArrayAccess, Countable, Serializable
{
    function add($index, $newval) {}
    function bottom() {}
    function count() : int {}
    function current() {}
    function getIteratorMode() : int {}
    function isEmpty() : bool {}
    function key() {}
    function next() {}
    function offsetExists($index) : bool {}
    function offsetGet($index) {}
    function offsetSet($index, $newval) {}
    function offsetUnset($index) {}
    function pop() {}
    function prev() {}
    function push($value) {}
    function rewind() {}
    function serialize() : string {}
    function setIteratorMode(int $mode) {}
    function shift() {}
    function top() {}
    function unserialize(string $serialized) {}
    function unshift($value) {}
    function valid() : bool {}
}

class SplEnum extends SplType
{
    function getConstList(bool $include_default = false) : array {}
}

class SplFileInfo
{
    function __construct(string $file_name) {}
    function __toString() {}
    function _bad_state_ex() {}
    function getATime() : int {}
    function getBasename(string $suffix = '') : string {}
    function getCTime() : int {}
    function getExtension() : string {}
    function getFileInfo(string $class_name = '') : SplFileInfo {}
    function getFilename() : string {}
    function getGroup() : int {}
    function getInode() : int {}
    function getLinkTarget() : string {}
    function getMTime() : int {}
    function getOwner() : int {}
    function getPath() : string {}
    function getPathInfo(string $class_name = '') : SplFileInfo {}
    function getPathname() : string {}
    function getPerms() : int {}
    function getRealPath() : string {}
    function getSize() : int {}
    function getType() : string {}
    function isDir() : bool {}
    function isExecutable() : bool {}
    function isFile() : bool {}
    function isLink() : bool {}
    function isReadable() : bool {}
    function isWritable() : bool {}
    function openFile(string $open_mode = "r", bool $use_include_path = false, $context = null) : SplFileObject {}
    function setFileClass(string $class_name = "SplFileObject") {}
    function setInfoClass(string $class_name = "SplFileInfo") {}
}

class SplFileObject extends SplFileInfo implements RecursiveIterator, SeekableIterator
{
    function __construct() {}
    function __toString() {}
    function current() {}
    function eof() : bool {}
    function fflush() : bool {}
    function fgetc() : string {}
    function fgetcsv(string $delimiter = ",", string $enclosure = "\"", string $escape = "\\") : array {}
    function fgets() : string {}
    function fgetss(string $allowable_tags = '') : string {}
    function flock(int $operation, int &$wouldblock = 0) : bool {}
    function fpassthru() : int {}
    function fputcsv(array $fields, string $delimiter = ",", string $enclosure = '"', string $escape = "\\") : int {}
    function fread(int $length) : string {}
    function fscanf(string $format, &...$__variadic) {}
    function fseek(int $offset, int $whence = SEEK_SET) : int {}
    function fstat() : array {}
    function ftell() : int {}
    function ftruncate(int $size) : bool {}
    function fwrite(string $str, int $length = 0) : int {}
    function getChildren() {}
    function getCsvControl() : array {}
    function getCurrentLine() {}
    function getFlags() : int {}
    function getMaxLineLen() : int {}
    function hasChildren() : bool {}
    function key() : int {}
    function next() {}
    function rewind() {}
    function seek(int $line_pos) {}
    function setCsvControl(string $delimiter = ",", string $enclosure = "\"", string $escape = "\\") {}
    function setFlags(int $flags) {}
    function setMaxLineLen(int $max_len) {}
    function valid() : bool {}
}

class SplFixedArray implements Iterator, ArrayAccess, Countable
{
    function __construct() {}
    function __wakeup() {}
    function count() : int {}
    function current() {}
    function fromArray(array $array, bool $save_indexes = true) : SplFixedArray {}
    function getSize() : int {}
    function key() : int {}
    function next() {}
    function offsetExists(int $index) : bool {}
    function offsetGet(int $index) {}
    function offsetSet(int $index, $newval) {}
    function offsetUnset(int $index) {}
    function rewind() {}
    function setSize(int $size) : bool {}
    function toArray() : array {}
    function valid() : bool {}
}

class SplFloat extends SplType {}

abstract class SplHeap implements Iterator, Countable
{
    function compare($value1, $value2) : int {}
    function count() : int {}
    function current() {}
    function extract() {}
    function insert($value) {}
    function isCorrupted() : bool {}
    function isEmpty() : bool {}
    function key() {}
    function next() {}
    function recoverFromCorruption() {}
    function rewind() {}
    function top() {}
    function valid() : bool {}
}

class SplInt extends SplType {}

class SplMaxHeap extends SplHeap implements Iterator, Countable
{
    function compare($value1, $value2) : int {}
}

class SplMinHeap extends SplHeap implements Iterator, Countable
{
    function compare($value1, $value2) : int {}
}

class SplObjectStorage implements Countable, Iterator, Serializable, ArrayAccess
{
    function addAll(SplObjectStorage $storage) {}
    function attach($object, $data = null) {}
    function contains($object) : bool {}
    function count() : int {}
    function current() {}
    function detach($object) {}
    function getHash($object) : string {}
    function getInfo() {}
    function key() : int {}
    function next() {}
    function offsetExists($object) : bool {}
    function offsetGet($object) {}
    function offsetSet($object, $data = null) {}
    function offsetUnset($object) {}
    function removeAll(SplObjectStorage $storage) {}
    function removeAllExcept(SplObjectStorage $storage) {}
    function rewind() {}
    function serialize() : string {}
    function setInfo($data) {}
    function unserialize(string $serialized) {}
    function valid() : bool {}
}

interface SplObserver
{
    function update(SplSubject $subject) {}
}

class SplPriorityQueue implements Iterator, Countable
{
    function compare($priority1, $priority2) : int {}
    function count() : int {}
    function current() {}
    function extract() {}
    function getExtractFlags() : int {}
    function insert($value, $priority) {}
    function isCorrupted() : bool {}
    function isEmpty() : bool {}
    function key() {}
    function next() {}
    function recoverFromCorruption() {}
    function rewind() {}
    function setExtractFlags(int $flags) {}
    function top() {}
    function valid() : bool {}
}

class SplQueue extends SplDoublyLinkedList implements Iterator, ArrayAccess, Countable
{
    function dequeue() {}
    function enqueue($value) {}
    function setIteratorMode(int $mode) {}
}

class SplStack extends SplDoublyLinkedList implements Iterator, ArrayAccess, Countable
{
    function setIteratorMode(int $mode) {}
}

class SplString extends SplType {}

interface SplSubject
{
    function attach(SplObserver $observer) {}
    function detach(SplObserver $observer) {}
    function notify() {}
}

class SplTempFileObject extends SplFileObject implements SeekableIterator, RecursiveIterator
{
    function __construct(int $max_memory = 0) {}
}

abstract class SplType
{
    function __construct($initial_value = null, bool $strict = false) {}
}

class UnderflowException extends RuntimeException {}

class UnexpectedValueException extends RuntimeException {}
