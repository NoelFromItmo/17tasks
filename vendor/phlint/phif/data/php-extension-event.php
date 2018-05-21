<?php

final class Event
{
    function __construct(EventBase $base, $fd, int $what, callable $cb, $arg = null) {}
    function add(float $timeout = 0) : bool {}
    function addSignal(float $timeout = 0) : bool {}
    function addTimer(float $timeout = 0) : bool {}
    function del() : bool {}
    function delSignal() : bool {}
    function delTimer() : bool {}
    function free() {}
    function getSupportedMethods() : array {}
    function pending(int $flags) : bool {}
    function set(EventBase $base, $fd, int $what = 0, callable $cb = null, $arg = null) : bool {}
    function setPriority(int $priority) : bool {}
    function setTimer(EventBase $base, callable $cb, $arg = null) : bool {}
    function signal(EventBase $base, int $signum, callable $cb, $arg = null) : Event {}
    function timer(EventBase $base, callable $cb, $arg = null) : Event {}
}

final class EventBase
{
    function __construct(EventConfig $cfg = null) {}
    function dispatch() {}
    function exit(float $timeout = 0) : bool {}
    function free() {}
    function getFeatures() : int {}
    function getMethod() : string {}
    function getTimeOfDayCached() : float {}
    function gotExit() : bool {}
    function gotStop() : bool {}
    function loop(int $flags = 0) : bool {}
    function priorityInit(int $n_priorities) : bool {}
    function reInit() : bool {}
    function stop() : bool {}
}

class EventBuffer
{
    function __construct() {}
    function add(string $data) : bool {}
    function addBuffer(EventBuffer $buf) : bool {}
    function appendFrom(EventBuffer $buf, int $len) : int {}
    function copyout(string &$data, int $max_bytes) : int {}
    function drain(int $len) : bool {}
    function enableLocking() {}
    function expand(int $len) : bool {}
    function freeze(bool $at_front) : bool {}
    function lock() {}
    function prepend(string $data) : bool {}
    function prependBuffer(EventBuffer $buf) : bool {}
    function pullup(int $size) : string {}
    function read(int $fd, int $howmuch) : int {}
    function readLine(int $eol_style) : string {}
    function search(string $what, int $start = -1, int $end = -1) {}
    function searchEol(int $start = -1, int $eol_style = EventBuffer::EOL_ANY) {}
    function substr(int $start, int $length = 0) : string {}
    function unfreeze(bool $at_front) : bool {}
    function unlock() : bool {}
    function write($fd, int $howmuch = 0) : int {}
}

final class EventBufferEvent
{
    function __construct(EventBase $base, $socket = null, int $options = 0, callable $readcb = null, callable $writecb = null, callable $eventcb = null) {}
    function close() {}
    function connect(string $addr) : bool {}
    function connectHost(EventDnsBase $dns_base, string $hostname, int $port, int $family = EventUtil::AF_UNSPEC) : bool {}
    function createPair(EventBase $base, int $options = 0) : array {}
    function disable(int $events) : bool {}
    function enable(int $events) : bool {}
    function free() {}
    function getDnsErrorString() : string {}
    function getEnabled() : int {}
    function getInput() : EventBuffer {}
    function getOutput() : EventBuffer {}
    function read(int $size) : string {}
    function readBuffer(EventBuffer $buf) : bool {}
    function setCallbacks(callable $readcb, callable $writecb, callable $eventcb, string $arg = '') {}
    function setPriority(int $priority) : bool {}
    function setTimeouts(float $timeout_read, float $timeout_write) : bool {}
    function setWatermark(int $events, int $lowmark, int $highmark) {}
    function sslError() : string {}
    function sslFilter(EventBase $base, EventBufferEvent $underlying, EventSslContext $ctx, int $state, int $options = 0) : EventBufferEvent {}
    function sslGetCipherInfo() : string {}
    function sslGetCipherName() : string {}
    function sslGetCipherVersion() : string {}
    function sslGetProtocol() : string {}
    function sslRenegotiate() {}
    function sslSocket(EventBase $base, $socket, EventSslContext $ctx, int $state, int $options = 0) : EventBufferEvent {}
    function write(string $data) : bool {}
    function writeBuffer(EventBuffer $buf) : bool {}
}

final class EventConfig
{
    function __construct() {}
    function avoidMethod(string $method) : bool {}
    function requireFeatures(int $feature) : bool {}
    function setMaxDispatchInterval(int $max_interval, int $max_callbacks, int $min_priority) {}
}

final class EventDnsBase
{
    function __construct(EventBase $base, bool $initialize) {}
    function addNameserverIp(string $ip) : bool {}
    function addSearch(string $domain) {}
    function clearSearch() {}
    function countNameservers() : int {}
    function loadHosts(string $hosts) : bool {}
    function parseResolvConf(int $flags, string $filename) : bool {}
    function setOption(string $option, string $value) : bool {}
    function setSearchNdots(int $ndots) : bool {}
}

final class EventHttp
{
    function __construct(EventBase $base, EventSslContext $ctx = null) {}
    function accept($socket) : bool {}
    function addServerAlias(string $alias) : bool {}
    function bind(string $address, int $port) {}
    function removeServerAlias(string $alias) : bool {}
    function setAllowedMethods(int $methods) {}
    function setCallback(string $path, string $cb, string $arg = '') {}
    function setDefaultCallback(string $cb, string $arg = '') {}
    function setMaxBodySize(int $value) {}
    function setMaxHeadersSize(int $value) {}
    function setTimeout(int $value) {}
}

class EventHttpConnection
{
    function __construct(EventBase $base, EventDnsBase $dns_base, string $address, int $port, EventSslContext $ctx = null) {}
    function getBase() : EventBase {}
    function getPeer(string &$address, int &$port) {}
    function makeRequest(EventHttpRequest $req, int $type, string $uri) : bool {}
    function setCloseCallback(callable $callback, $data = null) {}
    function setLocalAddress(string $address) {}
    function setLocalPort(int $port) {}
    function setMaxBodySize(string $max_size) {}
    function setMaxHeadersSize(string $max_size) {}
    function setRetries(int $retries) {}
    function setTimeout(int $timeout) {}
}

class EventHttpRequest
{
    function __construct(callable $callback, $data = null) {}
    function addHeader(string $key, string $value, int $type) : bool {}
    function cancel() {}
    function clearHeaders() {}
    function closeConnection() : EventHttpConnection {}
    function findHeader(string $key, string $type) {}
    function free() {}
    function getCommand() {}
    function getHost() : string {}
    function getInputBuffer() : EventBuffer {}
    function getInputHeaders() : array {}
    function getOutputBuffer() : EventBuffer {}
    function getOutputHeaders() {}
    function getResponseCode() : int {}
    function getUri() : string {}
    function removeHeader(string $key, string $type) {}
    function sendError(int $error, string $reason = null) {}
    function sendReply(int $code, string $reason, EventBuffer $buf = null) {}
    function sendReplyChunk(EventBuffer $buf) {}
    function sendReplyEnd() {}
    function sendReplyStart(int $code, string $reason) {}
}

final class EventListener
{
    function __construct(EventBase $base, callable $cb, $data, int $flags, int $backlog, $target) {}
    function disable() : bool {}
    function enable() : bool {}
    function getBase() {}
    function getSocketName(string &$address, &$port = null) : bool {}
    function setCallback(callable $cb, $arg = null) {}
    function setErrorCallback(string $cb) {}
}

final class EventSslContext
{
    function __construct(string $method, string $options) {}
}

final class EventUtil
{
    function __construct() {}
    function getLastSocketErrno($socket = null) : int {}
    function getLastSocketError($socket = null) : string {}
    function getSocketFd($socket) : int {}
    function getSocketName($socket, string &$address, &$port = null) : bool {}
    function setSocketOption($socket, int $level, int $optname, $optval) : bool {}
    function sslRandPoll() {}
}
