<?php

/**
 * @param resource $agent
 * @param int $var
 * @param string $val
 * @return bool
 */
function udm_add_search_limit($agent, int $var, string $val) : bool {}

/**
 * @param string $dbaddr
 * @param string $dbmode
 * @return resource
 */
function udm_alloc_agent(string $dbaddr, string $dbmode = '') {}

/**
 * @param array $databases
 * @return resource
 */
function udm_alloc_agent_array(array $databases) {}

/**
 * @return int
 */
function udm_api_version() : int {}

/**
 * @param resource $agent
 * @param string $category
 * @return array
 */
function udm_cat_list($agent, string $category) : array {}

/**
 * @param resource $agent
 * @param string $category
 * @return array
 */
function udm_cat_path($agent, string $category) : array {}

/**
 * @param resource $agent
 * @param string $charset
 * @return bool
 */
function udm_check_charset($agent, string $charset) : bool {}

/**
 * @param resource $agent
 * @return bool
 */
function udm_clear_search_limits($agent) : bool {}

/**
 * @param resource $agent
 * @param string $str
 * @return int
 */
function udm_crc32($agent, string $str) : int {}

/**
 * @param resource $agent
 * @return int
 */
function udm_errno($agent) : int {}

/**
 * @param resource $agent
 * @return string
 */
function udm_error($agent) : string {}

/**
 * @param resource $agent
 * @param string $query
 * @return resource
 */
function udm_find($agent, string $query) {}

/**
 * @param resource $agent
 * @return int
 */
function udm_free_agent($agent) : int {}

/**
 * @param int $agent
 * @return bool
 */
function udm_free_ispell_data(int $agent) : bool {}

/**
 * @param resource $res
 * @return bool
 */
function udm_free_res($res) : bool {}

/**
 * @param resource $agent
 * @return int
 */
function udm_get_doc_count($agent) : int {}

/**
 * @param resource $res
 * @param int $row
 * @param int $field
 * @return string
 */
function udm_get_res_field($res, int $row, int $field) : string {}

/**
 * @param resource $res
 * @param int $param
 * @return string
 */
function udm_get_res_param($res, int $param) : string {}

/**
 * @param resource $agent
 * @param string $str
 * @return int
 */
function udm_hash32($agent, string $str) : int {}

/**
 * @param resource $agent
 * @param int $var
 * @param string $val1
 * @param string $val2
 * @param int $flag
 * @return bool
 */
function udm_load_ispell_data($agent, int $var, string $val1, string $val2, int $flag) : bool {}

/**
 * @param resource $agent
 * @param int $var
 * @param string $val
 * @return bool
 */
function udm_set_agent_param($agent, int $var, string $val) : bool {}
