<?php

/**
 * @param resource $context
 * @return string
 */
function gupnp_context_get_host_ip($context) : string {}

/**
 * @param resource $context
 * @return int
 */
function gupnp_context_get_port($context) : int {}

/**
 * @param resource $context
 * @return int
 */
function gupnp_context_get_subscription_timeout($context) : int {}

/**
 * @param resource $context
 * @param string $local_path
 * @param string $server_path
 * @return bool
 */
function gupnp_context_host_path($context, string $local_path, string $server_path) : bool {}

/**
 * @param string $host_ip
 * @param int $port
 * @return resource
 */
function gupnp_context_new(string $host_ip = '', int $port = 0) {}

/**
 * @param resource $context
 * @param int $timeout
 * @return void
 */
function gupnp_context_set_subscription_timeout($context, int $timeout) {}

/**
 * @param resource $context
 * @param int $timeout
 * @param mixed $callback
 * @param mixed $arg
 * @return bool
 */
function gupnp_context_timeout_add($context, int $timeout, $callback, $arg = null) : bool {}

/**
 * @param resource $context
 * @param string $server_path
 * @return bool
 */
function gupnp_context_unhost_path($context, string $server_path) : bool {}

/**
 * @param resource $cpoint
 * @return bool
 */
function gupnp_control_point_browse_start($cpoint) : bool {}

/**
 * @param resource $cpoint
 * @return bool
 */
function gupnp_control_point_browse_stop($cpoint) : bool {}

/**
 * @param resource $cpoint
 * @param int $signal
 * @param mixed $callback
 * @param mixed $arg
 * @return bool
 */
function gupnp_control_point_callback_set($cpoint, int $signal, $callback, $arg = null) : bool {}

/**
 * @param resource $context
 * @param string $target
 * @return resource
 */
function gupnp_control_point_new($context, string $target) {}

/**
 * @param resource $root_device
 * @param int $signal
 * @param string $action_name
 * @param mixed $callback
 * @param mixed $arg
 * @return bool
 */
function gupnp_device_action_callback_set($root_device, int $signal, string $action_name, $callback, $arg = null) : bool {}

/**
 * @param resource $root_device
 * @return array
 */
function gupnp_device_info_get($root_device) : array {}

/**
 * @param resource $root_device
 * @param string $type
 * @return resource
 */
function gupnp_device_info_get_service($root_device, string $type) {}

/**
 * @param resource $root_device
 * @return bool
 */
function gupnp_root_device_get_available($root_device) : bool {}

/**
 * @param resource $root_device
 * @return string
 */
function gupnp_root_device_get_relative_location($root_device) : string {}

/**
 * @param resource $context
 * @param string $location
 * @param string $description_dir
 * @return resource
 */
function gupnp_root_device_new($context, string $location, string $description_dir) {}

/**
 * @param resource $root_device
 * @param bool $available
 * @return bool
 */
function gupnp_root_device_set_available($root_device, bool $available) : bool {}

/**
 * @param resource $root_device
 * @return bool
 */
function gupnp_root_device_start($root_device) : bool {}

/**
 * @param resource $root_device
 * @return bool
 */
function gupnp_root_device_stop($root_device) : bool {}

/**
 * @param resource $action
 * @param string $name
 * @param int $type
 * @return mixed
 */
function gupnp_service_action_get($action, string $name, int $type) {}

/**
 * @param resource $action
 * @return bool
 */
function gupnp_service_action_return($action) : bool {}

/**
 * @param resource $action
 * @param int $error_code
 * @param string $error_description
 * @return bool
 */
function gupnp_service_action_return_error($action, int $error_code, string $error_description = '') : bool {}

/**
 * @param resource $action
 * @param string $name
 * @param int $type
 * @param mixed $value
 * @return bool
 */
function gupnp_service_action_set($action, string $name, int $type, $value) : bool {}

/**
 * @param resource $service
 * @return bool
 */
function gupnp_service_freeze_notify($service) : bool {}

/**
 * @param resource $proxy
 * @return array
 */
function gupnp_service_info_get($proxy) : array {}

/**
 * @param resource $proxy
 * @param mixed $callback
 * @param mixed $arg
 * @return mixed
 */
function gupnp_service_info_get_introspection($proxy, $callback = null, $arg = null) {}

/**
 * @param resource $introspection
 * @param string $variable_name
 * @return array
 */
function gupnp_service_introspection_get_state_variable($introspection, string $variable_name) : array {}

/**
 * @param resource $service
 * @param string $name
 * @param int $type
 * @param mixed $value
 * @return bool
 */
function gupnp_service_notify($service, string $name, int $type, $value) : bool {}

/**
 * @param resource $proxy
 * @param string $action
 * @param string $name
 * @param int $type
 * @return mixed
 */
function gupnp_service_proxy_action_get($proxy, string $action, string $name, int $type) {}

/**
 * @param resource $proxy
 * @param string $action
 * @param string $name
 * @param mixed $value
 * @param int $type
 * @return bool
 */
function gupnp_service_proxy_action_set($proxy, string $action, string $name, $value, int $type) : bool {}

/**
 * @param resource $proxy
 * @param string $value
 * @param int $type
 * @param mixed $callback
 * @param mixed $arg
 * @return bool
 */
function gupnp_service_proxy_add_notify($proxy, string $value, int $type, $callback, $arg = null) : bool {}

/**
 * @param resource $proxy
 * @param int $signal
 * @param mixed $callback
 * @param mixed $arg
 * @return bool
 */
function gupnp_service_proxy_callback_set($proxy, int $signal, $callback, $arg = null) : bool {}

/**
 * @param resource $proxy
 * @return bool
 */
function gupnp_service_proxy_get_subscribed($proxy) : bool {}

/**
 * @param resource $proxy
 * @param string $value
 * @return bool
 */
function gupnp_service_proxy_remove_notify($proxy, string $value) : bool {}

/**
 * @param resource $proxy
 * @param string $action
 * @param array $in_params
 * @param array $out_params
 * @return array
 */
function gupnp_service_proxy_send_action($proxy, string $action, array $in_params, array $out_params) : array {}

/**
 * @param resource $proxy
 * @param bool $subscribed
 * @return bool
 */
function gupnp_service_proxy_set_subscribed($proxy, bool $subscribed) : bool {}

/**
 * @param resource $service
 * @return bool
 */
function gupnp_service_thaw_notify($service) : bool {}
