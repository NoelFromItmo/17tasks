<?php

/**
 * @param mixed $data
 * @param int $encoding
 * @param int $linebreak
 * @param array $callbacks
 * @return string
 */
function yaml_emit($data, int $encoding = YAML_ANY_ENCODING, int $linebreak = YAML_ANY_BREAK, array $callbacks = null) : string {}

/**
 * @param string $filename
 * @param mixed $data
 * @param int $encoding
 * @param int $linebreak
 * @param array $callbacks
 * @return bool
 */
function yaml_emit_file(string $filename, $data, int $encoding = YAML_ANY_ENCODING, int $linebreak = YAML_ANY_BREAK, array $callbacks = null) : bool {}

/**
 * @param string $input
 * @param int $pos
 * @param int $ndocs
 * @param array $callbacks
 * @return mixed
 */
function yaml_parse(string $input, int $pos = 0, int &$ndocs = 0, array $callbacks = null) {}

/**
 * @param string $filename
 * @param int $pos
 * @param int $ndocs
 * @param array $callbacks
 * @return mixed
 */
function yaml_parse_file(string $filename, int $pos = 0, int &$ndocs = 0, array $callbacks = null) {}

/**
 * @param string $url
 * @param int $pos
 * @param int $ndocs
 * @param array $callbacks
 * @return mixed
 */
function yaml_parse_url(string $url, int $pos = 0, int &$ndocs = 0, array $callbacks = null) {}
