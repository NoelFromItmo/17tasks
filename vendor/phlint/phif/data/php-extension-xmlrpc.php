<?php

/**
 * @param string $xml
 * @param string $encoding
 * @return mixed
 */
function xmlrpc_decode(string $xml, string $encoding = "iso-8859-1") {}

/**
 * @param string $xml
 * @param string $method
 * @param string $encoding
 * @return mixed
 */
function xmlrpc_decode_request(string $xml, string &$method, string $encoding = '') {}

/**
 * @param mixed $value
 * @return string
 */
function xmlrpc_encode($value) : string {}

/**
 * @param string $method
 * @param mixed $params
 * @param array $output_options
 * @return string
 */
function xmlrpc_encode_request(string $method, $params, array $output_options = []) : string {}

/**
 * @param mixed $value
 * @return string
 */
function xmlrpc_get_type($value) : string {}

/**
 * @param array $arg
 * @return bool
 */
function xmlrpc_is_fault(array $arg) : bool {}

/**
 * @param string $xml
 * @return array
 */
function xmlrpc_parse_method_descriptions(string $xml) : array {}

/**
 * @param resource $server
 * @param array $desc
 * @return int
 */
function xmlrpc_server_add_introspection_data($server, array $desc) : int {}

/**
 * @param resource $server
 * @param string $xml
 * @param mixed $user_data
 * @param array $output_options
 * @return string
 */
function xmlrpc_server_call_method($server, string $xml, $user_data, array $output_options = []) : string {}

/**
 * @return resource
 */
function xmlrpc_server_create() {}

/**
 * @param resource $server
 * @return bool
 */
function xmlrpc_server_destroy($server) : bool {}

/**
 * @param resource $server
 * @param string $function
 * @return bool
 */
function xmlrpc_server_register_introspection_callback($server, string $function) : bool {}

/**
 * @param resource $server
 * @param string $method_name
 * @param string $function
 * @return bool
 */
function xmlrpc_server_register_method($server, string $method_name, string $function) : bool {}

/**
 * @param string $value
 * @param string $type
 * @return bool
 */
function xmlrpc_set_type(string &$value, string $type) : bool {}
