<?php

/**
 * @param resource $fp
 * @return string
 */
function mailparse_determine_best_xfer_encoding($fp) : string {}

/**
 * @return resource
 */
function mailparse_msg_create() {}

/**
 * @param resource $mimemail
 * @param string $msgbody
 * @param callable $callbackfunc
 * @return void
 */
function mailparse_msg_extract_part($mimemail, string $msgbody, callable $callbackfunc = null) {}

/**
 * @param resource $mimemail
 * @param mixed $filename
 * @param callable $callbackfunc
 * @return string
 */
function mailparse_msg_extract_part_file($mimemail, $filename, callable $callbackfunc = null) : string {}

/**
 * @param resource $mimemail
 * @param string $filename
 * @param callable $callbackfunc
 * @return string
 */
function mailparse_msg_extract_whole_part_file($mimemail, string $filename, callable $callbackfunc = null) : string {}

/**
 * @param resource $mimemail
 * @return bool
 */
function mailparse_msg_free($mimemail) : bool {}

/**
 * @param resource $mimemail
 * @param string $mimesection
 * @return resource
 */
function mailparse_msg_get_part($mimemail, string $mimesection) {}

/**
 * @param resource $mimemail
 * @return array
 */
function mailparse_msg_get_part_data($mimemail) : array {}

/**
 * @param resource $mimemail
 * @return array
 */
function mailparse_msg_get_structure($mimemail) : array {}

/**
 * @param resource $mimemail
 * @param string $data
 * @return bool
 */
function mailparse_msg_parse($mimemail, string $data) : bool {}

/**
 * @param string $filename
 * @return resource
 */
function mailparse_msg_parse_file(string $filename) {}

/**
 * @param string $addresses
 * @return array
 */
function mailparse_rfc822_parse_addresses(string $addresses) : array {}

/**
 * @param resource $sourcefp
 * @param resource $destfp
 * @param string $encoding
 * @return bool
 */
function mailparse_stream_encode($sourcefp, $destfp, string $encoding) : bool {}

/**
 * @param resource $fp
 * @return array
 */
function mailparse_uudecode_all($fp) : array {}
