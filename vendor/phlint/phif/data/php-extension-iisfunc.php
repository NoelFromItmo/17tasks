<?php

/**
 * @param string $path
 * @param string $comment
 * @param string $server_ip
 * @param int $port
 * @param string $host_name
 * @param int $rights
 * @param int $start_server
 * @return int
 */
function iis_add_server(string $path, string $comment, string $server_ip, int $port, string $host_name, int $rights, int $start_server) : int {}

/**
 * @param int $server_instance
 * @param string $virtual_path
 * @return int
 */
function iis_get_dir_security(int $server_instance, string $virtual_path) : int {}

/**
 * @param int $server_instance
 * @param string $virtual_path
 * @param string $script_extension
 * @return string
 */
function iis_get_script_map(int $server_instance, string $virtual_path, string $script_extension) : string {}

/**
 * @param string $comment
 * @return int
 */
function iis_get_server_by_comment(string $comment) : int {}

/**
 * @param string $path
 * @return int
 */
function iis_get_server_by_path(string $path) : int {}

/**
 * @param int $server_instance
 * @param string $virtual_path
 * @return int
 */
function iis_get_server_rights(int $server_instance, string $virtual_path) : int {}

/**
 * @param string $service_id
 * @return int
 */
function iis_get_service_state(string $service_id) : int {}

/**
 * @param int $server_instance
 * @return int
 */
function iis_remove_server(int $server_instance) : int {}

/**
 * @param int $server_instance
 * @param string $virtual_path
 * @param string $application_scope
 * @return int
 */
function iis_set_app_settings(int $server_instance, string $virtual_path, string $application_scope) : int {}

/**
 * @param int $server_instance
 * @param string $virtual_path
 * @param int $directory_flags
 * @return int
 */
function iis_set_dir_security(int $server_instance, string $virtual_path, int $directory_flags) : int {}

/**
 * @param int $server_instance
 * @param string $virtual_path
 * @param string $script_extension
 * @param string $engine_path
 * @param int $allow_scripting
 * @return int
 */
function iis_set_script_map(int $server_instance, string $virtual_path, string $script_extension, string $engine_path, int $allow_scripting) : int {}

/**
 * @param int $server_instance
 * @param string $virtual_path
 * @param int $directory_flags
 * @return int
 */
function iis_set_server_rights(int $server_instance, string $virtual_path, int $directory_flags) : int {}

/**
 * @param int $server_instance
 * @return int
 */
function iis_start_server(int $server_instance) : int {}

/**
 * @param string $service_id
 * @return int
 */
function iis_start_service(string $service_id) : int {}

/**
 * @param int $server_instance
 * @return int
 */
function iis_stop_server(int $server_instance) : int {}

/**
 * @param string $service_id
 * @return int
 */
function iis_stop_service(string $service_id) : int {}
