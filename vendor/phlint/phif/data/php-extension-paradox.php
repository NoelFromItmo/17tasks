<?php

/**
 * @param resource $pxdoc
 * @return bool
 */
function px_close($pxdoc) : bool {}

/**
 * @param resource $pxdoc
 * @param resource $file
 * @param array $fielddesc
 * @return bool
 */
function px_create_fp($pxdoc, $file, array $fielddesc) : bool {}

/**
 * @param resource $pxdoc
 * @param int $value
 * @param string $format
 * @return string
 */
function px_date2string($pxdoc, int $value, string $format) : string {}

/**
 * @param resource $pxdoc
 * @return bool
 */
function px_delete($pxdoc) : bool {}

/**
 * @param resource $pxdoc
 * @param int $num
 * @return bool
 */
function px_delete_record($pxdoc, int $num) : bool {}

/**
 * @param resource $pxdoc
 * @param int $fieldno
 * @return array
 */
function px_get_field($pxdoc, int $fieldno) : array {}

/**
 * @param resource $pxdoc
 * @return array
 */
function px_get_info($pxdoc) : array {}

/**
 * @param resource $pxdoc
 * @param string $name
 * @return string
 */
function px_get_parameter($pxdoc, string $name) : string {}

/**
 * @param resource $pxdoc
 * @param int $num
 * @param int $mode
 * @return array
 */
function px_get_record($pxdoc, int $num, int $mode = 0) : array {}

/**
 * @param resource $pxdoc
 * @param int $mode
 * @return array
 */
function px_get_schema($pxdoc, int $mode = 0) : array {}

/**
 * @param resource $pxdoc
 * @param string $name
 * @return float
 */
function px_get_value($pxdoc, string $name) : float {}

/**
 * @param resource $pxdoc
 * @param array $data
 * @return int
 */
function px_insert_record($pxdoc, array $data) : int {}

/**
 * @return resource
 */
function px_new() {}

/**
 * @param resource $pxdoc
 * @return int
 */
function px_numfields($pxdoc) : int {}

/**
 * @param resource $pxdoc
 * @return int
 */
function px_numrecords($pxdoc) : int {}

/**
 * @param resource $pxdoc
 * @param resource $file
 * @return bool
 */
function px_open_fp($pxdoc, $file) : bool {}

/**
 * @param resource $pxdoc
 * @param array $record
 * @param int $recpos
 * @return bool
 */
function px_put_record($pxdoc, array $record, int $recpos = -1) : bool {}

/**
 * @param resource $pxdoc
 * @param int $num
 * @param int $mode
 * @return array
 */
function px_retrieve_record($pxdoc, int $num, int $mode = 0) : array {}

/**
 * @param resource $pxdoc
 * @param string $filename
 * @return bool
 */
function px_set_blob_file($pxdoc, string $filename) : bool {}

/**
 * @param resource $pxdoc
 * @param string $name
 * @param string $value
 * @return bool
 */
function px_set_parameter($pxdoc, string $name, string $value) : bool {}

/**
 * @param resource $pxdoc
 * @param string $name
 * @return void
 */
function px_set_tablename($pxdoc, string $name) {}

/**
 * @param resource $pxdoc
 * @param string $encoding
 * @return bool
 */
function px_set_targetencoding($pxdoc, string $encoding) : bool {}

/**
 * @param resource $pxdoc
 * @param string $name
 * @param float $value
 * @return bool
 */
function px_set_value($pxdoc, string $name, float $value) : bool {}

/**
 * @param resource $pxdoc
 * @param float $value
 * @param string $format
 * @return string
 */
function px_timestamp2string($pxdoc, float $value, string $format) : string {}

/**
 * @param resource $pxdoc
 * @param array $data
 * @param int $num
 * @return bool
 */
function px_update_record($pxdoc, array $data, int $num) : bool {}
