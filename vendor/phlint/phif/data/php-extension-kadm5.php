<?php

/**
 * @param resource $handle
 * @param string $principal
 * @param string $password
 * @return bool
 */
function kadm5_chpass_principal($handle, string $principal, string $password) : bool {}

/**
 * @param resource $handle
 * @param string $principal
 * @param string $password
 * @param array $options
 * @return bool
 */
function kadm5_create_principal($handle, string $principal, string $password = '', array $options = []) : bool {}

/**
 * @param resource $handle
 * @param string $principal
 * @return bool
 */
function kadm5_delete_principal($handle, string $principal) : bool {}

/**
 * @param resource $handle
 * @return bool
 */
function kadm5_destroy($handle) : bool {}

/**
 * @param resource $handle
 * @return bool
 */
function kadm5_flush($handle) : bool {}

/**
 * @param resource $handle
 * @return array
 */
function kadm5_get_policies($handle) : array {}

/**
 * @param resource $handle
 * @param string $principal
 * @return array
 */
function kadm5_get_principal($handle, string $principal) : array {}

/**
 * @param resource $handle
 * @return array
 */
function kadm5_get_principals($handle) : array {}

/**
 * @param string $admin_server
 * @param string $realm
 * @param string $principal
 * @param string $password
 * @return resource
 */
function kadm5_init_with_password(string $admin_server, string $realm, string $principal, string $password) {}

/**
 * @param resource $handle
 * @param string $principal
 * @param array $options
 * @return bool
 */
function kadm5_modify_principal($handle, string $principal, array $options) : bool {}
