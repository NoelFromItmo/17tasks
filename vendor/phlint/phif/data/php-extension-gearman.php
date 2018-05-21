<?php

class GearmanClient
{
    function __construct() {}
    function addOptions(int $options) : bool {}
    function addServer(string $host = "127.0.0.1", int $port = 4730) : bool {}
    function addServers(string $servers = "127.0.0.1:4730") : bool {}
    function addTask(string $function_name, string $workload, &$context = null, string $unique = '') : GearmanTask {}
    function addTaskBackground(string $function_name, string $workload, &$context = null, string $unique = '') : GearmanTask {}
    function addTaskHigh(string $function_name, string $workload, &$context = null, string $unique = '') : GearmanTask {}
    function addTaskHighBackground(string $function_name, string $workload, &$context = null, string $unique = '') : GearmanTask {}
    function addTaskLow(string $function_name, string $workload, &$context = null, string $unique = '') : GearmanTask {}
    function addTaskLowBackground(string $function_name, string $workload, &$context = null, string $unique = '') : GearmanTask {}
    function addTaskStatus(string $job_handle, string &$context = '') : GearmanTask {}
    function clearCallbacks() : bool {}
    function clone() : GearmanClient {}
    function context() : string {}
    function data() : string {}
    function do(string $function_name, string $workload, string $unique = '') : string {}
    function doBackground(string $function_name, string $workload, string $unique = '') : string {}
    function doHigh(string $function_name, string $workload, string $unique = '') : string {}
    function doHighBackground(string $function_name, string $workload, string $unique = '') : string {}
    function doJobHandle() : string {}
    function doLow(string $function_name, string $workload, string $unique = '') : string {}
    function doLowBackground(string $function_name, string $workload, string $unique = '') : string {}
    function doNormal(string $function_name, string $workload, string $unique = '') : string {}
    function doStatus() : array {}
    function echo(string $workload) : bool {}
    function error() : string {}
    function getErrno() : int {}
    function jobStatus(string $job_handle) : array {}
    function ping(string $workload) : bool {}
    function removeOptions(int $options) : bool {}
    function returnCode() : int {}
    function runTasks() : bool {}
    function setClientCallback(callable $callback) {}
    function setCompleteCallback(callable $callback) : bool {}
    function setContext(string $context) : bool {}
    function setCreatedCallback(string $callback) : bool {}
    function setData(string $data) : bool {}
    function setDataCallback(callable $callback) : bool {}
    function setExceptionCallback(callable $callback) : bool {}
    function setFailCallback(callable $callback) : bool {}
    function setOptions(int $options) : bool {}
    function setStatusCallback(callable $callback) : bool {}
    function setTimeout(int $timeout) : bool {}
    function setWarningCallback(callable $callback) : bool {}
    function setWorkloadCallback(callable $callback) : bool {}
    function timeout() : int {}
}

class GearmanException extends Exception {}

class GearmanJob
{
    function __construct() {}
    function complete(string $result) : bool {}
    function data(string $data) : bool {}
    function exception(string $exception) : bool {}
    function fail() : bool {}
    function functionName() : string {}
    function handle() : string {}
    function returnCode() : int {}
    function sendComplete(string $result) : bool {}
    function sendData(string $data) : bool {}
    function sendException(string $exception) : bool {}
    function sendFail() : bool {}
    function sendStatus(int $numerator, int $denominator) : bool {}
    function sendWarning(string $warning) : bool {}
    function setReturn(int $gearman_return_t) : bool {}
    function status(int $numerator, int $denominator) : bool {}
    function unique() : string {}
    function warning(string $warning) : bool {}
    function workload() : string {}
    function workloadSize() : int {}
}

class GearmanTask
{
    function __construct() {}
    function create() : GearmanTask {}
    function data() : string {}
    function dataSize() : int {}
    function function() : string {}
    function functionName() : string {}
    function isKnown() : bool {}
    function isRunning() : bool {}
    function jobHandle() : string {}
    function recvData(int $data_len) : array {}
    function returnCode() : int {}
    function sendData(string $data) : int {}
    function sendWorkload(string $data) : int {}
    function taskDenominator() : int {}
    function taskNumerator() : int {}
    function unique() : string {}
    function uuid() : string {}
}

class GearmanWorker
{
    function __construct() {}
    function addFunction(string $function_name, callable $function, &$context = null, int $timeout = 0) : bool {}
    function addOptions(int $option) : bool {}
    function addServer(string $host = "127.0.0.1", int $port = 4730) : bool {}
    function addServers(string $servers) : bool {}
    function clone() {}
    function echo(string $workload) : bool {}
    function error() : string {}
    function getErrno() : int {}
    function options() : int {}
    function register(string $function_name, int $timeout = 0) : bool {}
    function removeOptions(int $option) : bool {}
    function returnCode() : int {}
    function setId(string $id) : bool {}
    function setOptions(int $option) : bool {}
    function setTimeout(int $timeout) : bool {}
    function timeout() : int {}
    function unregister(string $function_name) : bool {}
    function unregisterAll() : bool {}
    function wait() : bool {}
    function work() : bool {}
}
