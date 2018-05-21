<?php

/**
 * @param string $servicename
 * @param string $machine
 * @return int
 */
function win32_continue_service(string $servicename, string $machine = '') : int {}

/**
 * @param array $details
 * @param string $machine
 * @return mixed
 */
function win32_create_service(array $details, string $machine = '') {}

/**
 * @param string $servicename
 * @param string $machine
 * @return mixed
 */
function win32_delete_service(string $servicename, string $machine = '') {}

/**
 * @return int
 */
function win32_get_last_control_message() : int {}

/**
 * @param string $servicename
 * @param string $machine
 * @return int
 */
function win32_pause_service(string $servicename, string $machine = '') : int {}

/**
 * @param string $servicename
 * @param string $machine
 * @return mixed
 */
function win32_query_service_status(string $servicename, string $machine = '') {}

/**
 * @param int $status
 * @param int $checkpoint
 * @return bool
 */
function win32_set_service_status(int $status, int $checkpoint = 0) : bool {}

/**
 * @param string $servicename
 * @param string $machine
 * @return int
 */
function win32_start_service(string $servicename, string $machine = '') : int {}

/**
 * @param string $name
 * @return mixed
 */
function win32_start_service_ctrl_dispatcher(string $name) {}

/**
 * @param string $servicename
 * @param string $machine
 * @return int
 */
function win32_stop_service(string $servicename, string $machine = '') : int {}
