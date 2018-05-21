<?php

/**
 * @return resource
 */
function openal_buffer_create() {}

/**
 * @param resource $buffer
 * @param int $format
 * @param string $data
 * @param int $freq
 * @return bool
 */
function openal_buffer_data($buffer, int $format, string $data, int $freq) : bool {}

/**
 * @param resource $buffer
 * @return bool
 */
function openal_buffer_destroy($buffer) : bool {}

/**
 * @param resource $buffer
 * @param int $property
 * @return int
 */
function openal_buffer_get($buffer, int $property) : int {}

/**
 * @param resource $buffer
 * @param string $wavfile
 * @return bool
 */
function openal_buffer_loadwav($buffer, string $wavfile) : bool {}

/**
 * @param resource $device
 * @return resource
 */
function openal_context_create($device) {}

/**
 * @param resource $context
 * @return bool
 */
function openal_context_current($context) : bool {}

/**
 * @param resource $context
 * @return bool
 */
function openal_context_destroy($context) : bool {}

/**
 * @param resource $context
 * @return bool
 */
function openal_context_process($context) : bool {}

/**
 * @param resource $context
 * @return bool
 */
function openal_context_suspend($context) : bool {}

/**
 * @param resource $device
 * @return bool
 */
function openal_device_close($device) : bool {}

/**
 * @param string $device_desc
 * @return resource
 */
function openal_device_open(string $device_desc = '') {}

/**
 * @param int $property
 * @return mixed
 */
function openal_listener_get(int $property) {}

/**
 * @param int $property
 * @param mixed $setting
 * @return bool
 */
function openal_listener_set(int $property, $setting) : bool {}

/**
 * @return resource
 */
function openal_source_create() {}

/**
 * @param resource $source
 * @return bool
 */
function openal_source_destroy($source) : bool {}

/**
 * @param resource $source
 * @param int $property
 * @return mixed
 */
function openal_source_get($source, int $property) {}

/**
 * @param resource $source
 * @return bool
 */
function openal_source_pause($source) : bool {}

/**
 * @param resource $source
 * @return bool
 */
function openal_source_play($source) : bool {}

/**
 * @param resource $source
 * @return bool
 */
function openal_source_rewind($source) : bool {}

/**
 * @param resource $source
 * @param int $property
 * @param mixed $setting
 * @return bool
 */
function openal_source_set($source, int $property, $setting) : bool {}

/**
 * @param resource $source
 * @return bool
 */
function openal_source_stop($source) : bool {}

/**
 * @param resource $source
 * @param int $format
 * @param int $rate
 * @return resource
 */
function openal_stream($source, int $format, int $rate) {}
