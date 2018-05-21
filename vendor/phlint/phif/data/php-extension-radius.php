<?php

/**
 * @return resource
 */
function radius_acct_open() {}

/**
 * @param resource $radius_handle
 * @param string $hostname
 * @param int $port
 * @param string $secret
 * @param int $timeout
 * @param int $max_tries
 * @return bool
 */
function radius_add_server($radius_handle, string $hostname, int $port, string $secret, int $timeout, int $max_tries) : bool {}

/**
 * @return resource
 */
function radius_auth_open() {}

/**
 * @param resource $radius_handle
 * @return bool
 */
function radius_close($radius_handle) : bool {}

/**
 * @param resource $radius_handle
 * @param string $file
 * @return bool
 */
function radius_config($radius_handle, string $file) : bool {}

/**
 * @param resource $radius_handle
 * @param int $type
 * @return bool
 */
function radius_create_request($radius_handle, int $type) : bool {}

/**
 * @param string $data
 * @return string
 */
function radius_cvt_addr(string $data) : string {}

/**
 * @param string $data
 * @return int
 */
function radius_cvt_int(string $data) : int {}

/**
 * @param string $data
 * @return string
 */
function radius_cvt_string(string $data) : string {}

/**
 * @param resource $radius_handle
 * @param string $mangled
 * @return string
 */
function radius_demangle($radius_handle, string $mangled) : string {}

/**
 * @param resource $radius_handle
 * @param string $mangled
 * @return string
 */
function radius_demangle_mppe_key($radius_handle, string $mangled) : string {}

/**
 * @param resource $radius_handle
 * @return mixed
 */
function radius_get_attr($radius_handle) {}

/**
 * @param string $data
 * @return string
 */
function radius_get_tagged_attr_data(string $data) : string {}

/**
 * @param string $data
 * @return int
 */
function radius_get_tagged_attr_tag(string $data) : int {}

/**
 * @param string $data
 * @return array
 */
function radius_get_vendor_attr(string $data) : array {}

/**
 * @param resource $radius_handle
 * @param int $type
 * @param string $addr
 * @param int $options
 * @param int $tag
 * @return bool
 */
function radius_put_addr($radius_handle, int $type, string $addr, int $options = 0, int $tag = 0) : bool {}

/**
 * @param resource $radius_handle
 * @param int $type
 * @param string $value
 * @param int $options
 * @param int $tag
 * @return bool
 */
function radius_put_attr($radius_handle, int $type, string $value, int $options = 0, int $tag = 0) : bool {}

/**
 * @param resource $radius_handle
 * @param int $type
 * @param int $value
 * @param int $options
 * @param int $tag
 * @return bool
 */
function radius_put_int($radius_handle, int $type, int $value, int $options = 0, int $tag = 0) : bool {}

/**
 * @param resource $radius_handle
 * @param int $type
 * @param string $value
 * @param int $options
 * @param int $tag
 * @return bool
 */
function radius_put_string($radius_handle, int $type, string $value, int $options = 0, int $tag = 0) : bool {}

/**
 * @param resource $radius_handle
 * @param int $vendor
 * @param int $type
 * @param string $addr
 * @return bool
 */
function radius_put_vendor_addr($radius_handle, int $vendor, int $type, string $addr) : bool {}

/**
 * @param resource $radius_handle
 * @param int $vendor
 * @param int $type
 * @param string $value
 * @param int $options
 * @param int $tag
 * @return bool
 */
function radius_put_vendor_attr($radius_handle, int $vendor, int $type, string $value, int $options = 0, int $tag = 0) : bool {}

/**
 * @param resource $radius_handle
 * @param int $vendor
 * @param int $type
 * @param int $value
 * @param int $options
 * @param int $tag
 * @return bool
 */
function radius_put_vendor_int($radius_handle, int $vendor, int $type, int $value, int $options = 0, int $tag = 0) : bool {}

/**
 * @param resource $radius_handle
 * @param int $vendor
 * @param int $type
 * @param string $value
 * @param int $options
 * @param int $tag
 * @return bool
 */
function radius_put_vendor_string($radius_handle, int $vendor, int $type, string $value, int $options = 0, int $tag = 0) : bool {}

/**
 * @param resource $radius_handle
 * @return string
 */
function radius_request_authenticator($radius_handle) : string {}

/**
 * @param resource $radius_handle
 * @param string $data
 * @return string
 */
function radius_salt_encrypt_attr($radius_handle, string $data) : string {}

/**
 * @param resource $radius_handle
 * @return int
 */
function radius_send_request($radius_handle) : int {}

/**
 * @param resource $radius_handle
 * @return string
 */
function radius_server_secret($radius_handle) : string {}

/**
 * @param resource $radius_handle
 * @return string
 */
function radius_strerror($radius_handle) : string {}
