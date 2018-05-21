<?php

/**
 * @param resource $packet_id
 * @param mixed $var_name
 * @param mixed $__variadic
 * @return bool
 */
function wddx_add_vars($packet_id, $var_name, ...$__variadic) : bool {}

/**
 * @param string $packet
 * @return mixed
 */
function wddx_deserialize(string $packet) {}

/**
 * @param resource $packet_id
 * @return string
 */
function wddx_packet_end($packet_id) : string {}

/**
 * @param string $comment
 * @return resource
 */
function wddx_packet_start(string $comment = '') {}

/**
 * @param mixed $var
 * @param string $comment
 * @return string
 */
function wddx_serialize_value($var, string $comment = '') : string {}

/**
 * @param mixed $var_name
 * @param mixed $__variadic
 * @return string
 */
function wddx_serialize_vars($var_name, ...$__variadic) : string {}
