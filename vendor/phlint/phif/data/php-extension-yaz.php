<?php

/**
 * @param resource $id
 * @return string
 */
function yaz_addinfo($id) : string {}

/**
 * @param resource $id
 * @param array $config
 * @return void
 */
function yaz_ccl_conf($id, array $config) {}

/**
 * @param resource $id
 * @param string $query
 * @param array $result
 * @return bool
 */
function yaz_ccl_parse($id, string $query, array &$result) : bool {}

/**
 * @param resource $id
 * @return bool
 */
function yaz_close($id) : bool {}

/**
 * @param string $zurl
 * @param mixed $options
 * @return mixed
 */
function yaz_connect(string $zurl, $options = null) {}

/**
 * @param resource $id
 * @param string $databases
 * @return bool
 */
function yaz_database($id, string $databases) : bool {}

/**
 * @param resource $id
 * @param string $elementset
 * @return bool
 */
function yaz_element($id, string $elementset) : bool {}

/**
 * @param resource $id
 * @return int
 */
function yaz_errno($id) : int {}

/**
 * @param resource $id
 * @return string
 */
function yaz_error($id) : string {}

/**
 * @param resource $id
 * @param string $type
 * @param array $args
 * @return void
 */
function yaz_es($id, string $type, array $args) {}

/**
 * @param resource $id
 * @return array
 */
function yaz_es_result($id) : array {}

/**
 * @param resource $id
 * @param string $name
 * @return string
 */
function yaz_get_option($id, string $name) : string {}

/**
 * @param resource $id
 * @param array $searchresult
 * @return int
 */
function yaz_hits($id, array &$searchresult = []) : int {}

/**
 * @param resource $id
 * @param array $args
 * @return void
 */
function yaz_itemorder($id, array $args) {}

/**
 * @param resource $id
 * @return bool
 */
function yaz_present($id) : bool {}

/**
 * @param resource $id
 * @param int $start
 * @param int $number
 * @return void
 */
function yaz_range($id, int $start, int $number) {}

/**
 * @param resource $id
 * @param int $pos
 * @param string $type
 * @return string
 */
function yaz_record($id, int $pos, string $type) : string {}

/**
 * @param resource $id
 * @param string $type
 * @param string $startterm
 * @param array $flags
 * @return void
 */
function yaz_scan($id, string $type, string $startterm, array $flags = []) {}

/**
 * @param resource $id
 * @param array $result
 * @return array
 */
function yaz_scan_result($id, array &$result = []) : array {}

/**
 * @param resource $id
 * @param string $schema
 * @return void
 */
function yaz_schema($id, string $schema) {}

/**
 * @param resource $id
 * @param string $type
 * @param string $query
 * @return bool
 */
function yaz_search($id, string $type, string $query) : bool {}

/**
 * @param resource $id
 * @param array $options
 * @param string $value
 * @return void
 */
function yaz_set_option($id, array $options, string $value) {}

/**
 * @param resource $id
 * @param string $criteria
 * @return void
 */
function yaz_sort($id, string $criteria) {}

/**
 * @param resource $id
 * @param string $syntax
 * @return void
 */
function yaz_syntax($id, string $syntax) {}

/**
 * @param array $options
 * @return mixed
 */
function yaz_wait(array &$options = []) {}
