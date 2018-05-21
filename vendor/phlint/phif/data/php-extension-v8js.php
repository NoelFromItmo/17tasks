<?php

class V8Js
{
    function __construct(string $object_name = "PHP", array $variables = [], array $extensions = [], bool $report_uncaught_exceptions = true) {}
    function executeString(string $script, string $identifier = "V8Js::executeString()", int $flags = V8Js::FLAG_NONE) {}
    function getExtensions() : array {}
    function getPendingException() : V8JsException {}
    function registerExtension(string $extension_name, string $script, array $dependencies = [], bool $auto_enable = false) : bool {}
}

class V8JsException extends Exception
{
    function getJsFileName() : string {}
    function getJsLineNumber() : int {}
    function getJsSourceLine() : string {}
    function getJsTrace() : string {}
}
