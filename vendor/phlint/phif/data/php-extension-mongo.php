<?php

/**
 * @param string $bson
 * @return array
 */
function bson_decode(string $bson) : array {}

/**
 * @param mixed $anything
 * @return string
 */
function bson_encode($anything) : string {}

/**
 * @param array $server
 * @param array $writeOptions
 * @param array $deleteOptions
 * @param array $protocolOptions
 * @return void
 */
function log_cmd_delete(array $server, array $writeOptions, array $deleteOptions, array $protocolOptions) {}

/**
 * @param array $server
 * @param array $document
 * @param array $writeOptions
 * @param array $protocolOptions
 * @return void
 */
function log_cmd_insert(array $server, array $document, array $writeOptions, array $protocolOptions) {}

/**
 * @param array $server
 * @param array $writeOptions
 * @param array $updateOptions
 * @param array $protocolOptions
 * @return void
 */
function log_cmd_update(array $server, array $writeOptions, array $updateOptions, array $protocolOptions) {}

/**
 * @param array $server
 * @param array $info
 * @return void
 */
function log_getmore(array $server, array $info) {}

/**
 * @param array $server
 * @param array $info
 * @return void
 */
function log_killcursor(array $server, array $info) {}

/**
 * @param array $server
 * @param array $messageHeaders
 * @param array $operationHeaders
 * @return void
 */
function log_reply(array $server, array $messageHeaders, array $operationHeaders) {}

/**
 * @param array $server
 * @param array $writeOptions
 * @param array $batch
 * @param array $protocolOptions
 * @return void
 */
function log_write_batch(array $server, array $writeOptions, array $batch, array $protocolOptions) {}

class Mongo extends MongoClient
{
    function connectUtil() : bool {}
    function getPoolSize() : int {}
    function getSlave() : string {}
    function getSlaveOkay() : bool {}
    function poolDebug() : array {}
    function setPoolSize(int $size) : bool {}
    function setSlaveOkay(bool $ok = true) : bool {}
    function switchSlave() : string {}
}

class MongoBinData
{
    function __construct(string $data, int $type = 0) {}
    function __toString() : string {}
}

class MongoClient
{
    function __get(string $dbname) : MongoDB {}
    function __toString() : string {}
    function close($connection = null) : bool {}
    function connect() : bool {}
    function dropDB($db) : array {}
    function getConnections() : array {}
    function getHosts() : array {}
    function getReadPreference() : array {}
    function getWriteConcern() : array {}
    function killCursor(string $server_hash, $id) : bool {}
    function listDBs() : array {}
    function selectCollection(string $db, string $collection) : MongoCollection {}
    function selectDB(string $name) : MongoDB {}
    function setReadPreference(string $read_preference, array $tags = []) : bool {}
    function setWriteConcern($w, int $wtimeout = 0) : bool {}
}

class MongoCode
{
    function __construct(string $code, array $scope = []) {}
    function __toString() : string {}
}

class MongoCollection
{
    function __construct(MongoDB $db, string $name) {}
    function __get(string $name) : MongoCollection {}
    function __toString() : string {}
    function aggregate(array $op, array $op = [], array ...$__variadic) : array {}
    function aggregateCursor(array $command, array $options = []) : MongoCommandCursor {}
    function batchInsert(array $a, array $options = []) {}
    function count(array $query = [], array $options = []) : int {}
    function createDBRef($document_or_id) : array {}
    function createIndex(array $keys, array $options = []) : bool {}
    function deleteIndex($keys) : array {}
    function deleteIndexes() : array {}
    function distinct(string $key, array $query = []) : array {}
    function drop() : array {}
    function ensureIndex($key|keys, array $options = []) : bool {}
    function find(array $query = [], array $fields = []) : MongoCursor {}
    function findAndModify(array $query, array $update = [], array $fields = [], array $options = []) : array {}
    function findOne(array $query = [], array $fields = [], array $options = []) : array {}
    function getDBRef(array $ref) : array {}
    function getIndexInfo() : array {}
    function getName() : string {}
    function getReadPreference() : array {}
    function getSlaveOkay() : bool {}
    function getWriteConcern() : array {}
    function group($keys, array $initial, MongoCode $reduce, array $options = []) : array {}
    function insert($document, array $options = []) {}
    function parallelCollectionScan(int $num_cursors = 0) : array[MongoCommandCursor] {}
    function remove(array $criteria = [], array $options = []) {}
    function save($document, array $options = []) {}
    function setReadPreference(string $read_preference, array $tags = []) : bool {}
    function setSlaveOkay(bool $ok = true) : bool {}
    function setWriteConcern($w, int $wtimeout = 0) : bool {}
    function toIndexString($keys) : string {}
    function update(array $criteria, array $new_object, array $options = []) {}
    function validate(bool $scan_data = false) : array {}
}

class MongoCommandCursor implements MongoCursorInterface, Iterator
{
    function __construct(MongoClient $connection, string $ns, array $command) {}
    function batchSize(int $batchSize) : MongoCommandCursor {}
    function createFromDocument(MongoClient $connection, string $hash, array $document) : MongoCommandCursor {}
    function current() : array {}
    function dead() : bool {}
    function getReadPreference() : array {}
    function info() : array {}
    function key() : int {}
    function next() {}
    function rewind() : array {}
    function setReadPreference(string $read_preference, array $tags = []) : MongoCommandCursor {}
    function timeout(int $ms) : MongoCommandCursor {}
    function valid() : bool {}
}

class MongoConnectionException extends MongoException {}

class MongoCursor implements MongoCursorInterface, Iterator
{
    function __construct(MongoClient $connection, string $ns, array $query = [], array $fields = []) {}
    function addOption(string $key, $value) : MongoCursor {}
    function awaitData(bool $wait = true) : MongoCursor {}
    function batchSize(int $batchSize) : MongoCursor {}
    function count(bool $foundOnly = false) : int {}
    function current() : array {}
    function dead() : bool {}
    function doQuery() {}
    function explain() : array {}
    function fields(array $f) : MongoCursor {}
    function getNext() : array {}
    function getReadPreference() : array {}
    function hasNext() : bool {}
    function hint($index) : MongoCursor {}
    function immortal(bool $liveForever = true) : MongoCursor {}
    function info() : array {}
    function key() {}
    function limit(int $num) : MongoCursor {}
    function maxTimeMS(int $ms) : MongoCursor {}
    function next() : array {}
    function partial(bool $okay = true) : MongoCursor {}
    function reset() {}
    function rewind() {}
    function setFlag(int $flag, bool $set = true) : MongoCursor {}
    function setReadPreference(string $read_preference, array $tags = []) : MongoCursor {}
    function skip(int $num) : MongoCursor {}
    function slaveOkay(bool $okay = true) : MongoCursor {}
    function snapshot() : MongoCursor {}
    function sort(array $fields) : MongoCursor {}
    function tailable(bool $tail = true) : MongoCursor {}
    function timeout(int $ms) : MongoCursor {}
    function valid() : bool {}
}

class MongoCursorException extends MongoException
{
    function getHost() : string {}
}

class MongoCursorInterface extends Iterator
{
    function batchSize(int $batchSize) : MongoCursorInterface {}
    function dead() : bool {}
    function getReadPreference() : array {}
    function info() : array {}
    function setReadPreference(string $read_preference, array $tags = []) : MongoCursorInterface {}
    function timeout(int $ms) : MongoCursorInterface {}
}

class MongoCursorTimeoutException extends MongoCursorException {}

class MongoDate
{
    function __construct(int $sec = 0, int $usec = 0) {}
    function __toString() : string {}
    function toDateTime() : DateTime {}
}

class MongoDB
{
    function __construct(MongoClient $conn, string $name) {}
    function __get(string $name) : MongoCollection {}
    function __toString() : string {}
    function authenticate(string $username, string $password) : array {}
    function command(array $command, array $options = [], string &$hash = '') : array {}
    function createCollection(string $name, array $options = []) : MongoCollection {}
    function createDBRef(string $collection, $document_or_id) : array {}
    function drop() : array {}
    function dropCollection($coll) : array {}
    function execute($code, array $args = []) : array {}
    function forceError() : bool {}
    function getCollectionInfo(array $options = []) : array {}
    function getCollectionNames(array $options = []) : array {}
    function getDBRef(array $ref) : array {}
    function getGridFS(string $prefix = "fs") : MongoGridFS {}
    function getProfilingLevel() : int {}
    function getReadPreference() : array {}
    function getSlaveOkay() : bool {}
    function getWriteConcern() : array {}
    function lastError() : array {}
    function listCollections(array $options = []) : array {}
    function prevError() : array {}
    function repair(bool $preserve_cloned_files = false, bool $backup_original_files = false) : array {}
    function resetError() : array {}
    function selectCollection(string $name) : MongoCollection {}
    function setProfilingLevel(int $level) : int {}
    function setReadPreference(string $read_preference, array $tags = []) : bool {}
    function setSlaveOkay(bool $ok = true) : bool {}
    function setWriteConcern($w, int $wtimeout = 0) : bool {}
}

class MongoDBRef
{
    function create(string $collection, $id, string $database = '') : array {}
    function get(MongoDB $db, array $ref) : array {}
    function isRef($ref) : bool {}
}

class MongoDeleteBatch extends MongoWriteBatch
{
    function __construct(MongoCollection $collection, array $write_options = []) {}
}

class MongoDuplicateKeyException extends MongoWriteConcernException {}

class MongoException extends Exception {}

class MongoExecutionTimeoutException extends MongoException {}

class MongoGridFS
{
    function __construct(MongoDB $db, string $prefix = "fs", $chunks = "fs") {}
    function delete($id) {}
    function drop() : array {}
    function find(array $query = [], array $fields = []) : MongoGridFSCursor {}
    function findOne($query = null, $fields = null) : MongoGridFSFile {}
    function get($id) : MongoGridFSFile {}
    function put(string $filename, array $metadata = [], array $options = []) {}
    function remove(array $criteria = [], array $options = []) {}
    function storeBytes(string $bytes, array $metadata = [], array $options = []) {}
    function storeFile($filename, array $metadata = [], array $options = []) {}
    function storeUpload(string $name, array $metadata = []) {}
}

class MongoGridFSException extends MongoException {}

class MongoGridFSFile
{
    function __construct(MongoGridFS $gridfs, array $file) {}
    function getBytes() : string {}
    function getFilename() : string {}
    function getResource() {}
    function getSize() : int {}
    function write(string $filename = null) : int {}
}

class MongoId
{
    function __construct($id = null) {}
    function __set_state(array $props) : MongoId {}
    function __toString() : string {}
    function getHostname() : string {}
    function getInc() : int {}
    function getPID() : int {}
    function getTimestamp() : int {}
    function isValid($value) : bool {}
}

class MongoInsertBatch extends MongoWriteBatch
{
    function __construct(MongoCollection $collection, array $write_options = []) {}
}

class MongoInt32
{
    function __construct(string $value) {}
    function __toString() : string {}
}

class MongoInt64
{
    function __construct(string $value) {}
    function __toString() : string {}
}

class MongoLog
{
    function getCallback() : callable {}
    function getLevel() : int {}
    function getModule() : int {}
    function setCallback(callable $log_function) {}
    function setLevel(int $level) {}
    function setModule(int $module) {}
}

class MongoMaxKey {}

class MongoMinKey {}

class MongoPool
{
    function getSize() : int {}
    function info() : array {}
    function setSize(int $size) : bool {}
}

class MongoProtocolException extends MongoException {}

class MongoRegex
{
    function __construct(string $regex) {}
    function __toString() : string {}
}

class MongoResultException extends MongoException
{
    function getDocument() : array {}
}

class MongoTimestamp
{
    function __construct(int $sec = 0, int $inc = 0) {}
    function __toString() : string {}
}

class MongoUpdateBatch extends MongoWriteBatch
{
    function __construct(MongoCollection $collection, array $write_options = []) {}
}

class MongoWriteBatch
{
    function add(array $item) : bool {}
    function execute(array $write_options) : array {}
}

class MongoWriteConcernException extends MongoCursorException
{
    function getDocument() : array {}
}
