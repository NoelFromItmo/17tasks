<?php

/**
 * @param resource $broker
 * @return array
 */
function enchant_broker_describe($broker) : array {}

/**
 * @param resource $broker
 * @param string $tag
 * @return bool
 */
function enchant_broker_dict_exists($broker, string $tag) : bool {}

/**
 * @param resource $broker
 * @return bool
 */
function enchant_broker_free($broker) : bool {}

/**
 * @param resource $dict
 * @return bool
 */
function enchant_broker_free_dict($dict) : bool {}

/**
 * @param resource $broker
 * @param int $dict_type
 * @return bool
 */
function enchant_broker_get_dict_path($broker, int $dict_type) : bool {}

/**
 * @param resource $broker
 * @return string
 */
function enchant_broker_get_error($broker) : string {}

/**
 * @return resource
 */
function enchant_broker_init() {}

/**
 * @param resource $broker
 * @return mixed
 */
function enchant_broker_list_dicts($broker) {}

/**
 * @param resource $broker
 * @param string $tag
 * @return resource
 */
function enchant_broker_request_dict($broker, string $tag) {}

/**
 * @param resource $broker
 * @param string $filename
 * @return resource
 */
function enchant_broker_request_pwl_dict($broker, string $filename) {}

/**
 * @param resource $broker
 * @param int $dict_type
 * @param string $value
 * @return bool
 */
function enchant_broker_set_dict_path($broker, int $dict_type, string $value) : bool {}

/**
 * @param resource $broker
 * @param string $tag
 * @param string $ordering
 * @return bool
 */
function enchant_broker_set_ordering($broker, string $tag, string $ordering) : bool {}

/**
 * @param resource $dict
 * @param string $word
 * @return void
 */
function enchant_dict_add_to_personal($dict, string $word) {}

/**
 * @param resource $dict
 * @param string $word
 * @return void
 */
function enchant_dict_add_to_session($dict, string $word) {}

/**
 * @param resource $dict
 * @param string $word
 * @return bool
 */
function enchant_dict_check($dict, string $word) : bool {}

/**
 * @param resource $dict
 * @return mixed
 */
function enchant_dict_describe($dict) {}

/**
 * @param resource $dict
 * @return string
 */
function enchant_dict_get_error($dict) : string {}

/**
 * @param resource $dict
 * @param string $word
 * @return bool
 */
function enchant_dict_is_in_session($dict, string $word) : bool {}

/**
 * @param resource $dict
 * @param string $word
 * @param array $suggestions
 * @return bool
 */
function enchant_dict_quick_check($dict, string $word, array &$suggestions = []) : bool {}

/**
 * @param resource $dict
 * @param string $mis
 * @param string $cor
 * @return void
 */
function enchant_dict_store_replacement($dict, string $mis, string $cor) {}

/**
 * @param resource $dict
 * @param string $word
 * @return array
 */
function enchant_dict_suggest($dict, string $word) : array {}
