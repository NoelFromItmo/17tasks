<?php

/**
 * @param resource $bbcode_container
 * @param string $tag_name
 * @param array $tag_rules
 * @return bool
 */
function bbcode_add_element($bbcode_container, string $tag_name, array $tag_rules) : bool {}

/**
 * @param resource $bbcode_container
 * @param string $smiley
 * @param string $replace_by
 * @return bool
 */
function bbcode_add_smiley($bbcode_container, string $smiley, string $replace_by) : bool {}

/**
 * @param array $bbcode_initial_tags
 * @return resource
 */
function bbcode_create(array $bbcode_initial_tags = null) {}

/**
 * @param resource $bbcode_container
 * @return bool
 */
function bbcode_destroy($bbcode_container) : bool {}

/**
 * @param resource $bbcode_container
 * @param string $to_parse
 * @return string
 */
function bbcode_parse($bbcode_container, string $to_parse) : string {}

/**
 * @param resource $bbcode_container
 * @param resource $bbcode_arg_parser
 * @return bool
 */
function bbcode_set_arg_parser($bbcode_container, $bbcode_arg_parser) : bool {}

/**
 * @param resource $bbcode_container
 * @param int $flags
 * @param int $mode
 * @return bool
 */
function bbcode_set_flags($bbcode_container, int $flags, int $mode = BBCODE_SET_FLAGS_SET) : bool {}
