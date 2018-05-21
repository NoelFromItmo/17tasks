<?php

/**
 * @param string $password
 * @param string $username
 * @param string $gecos
 * @param resource $dictionary
 * @return bool
 */
function crack_check(string $password, string $username, string $gecos, $dictionary) : bool {}

/**
 * @param resource $dictionary
 * @return bool
 */
function crack_closedict($dictionary = null) : bool {}

/**
 * @return string
 */
function crack_getlastmessage() : string {}

/**
 * @param string $dictionary
 * @return resource
 */
function crack_opendict(string $dictionary) {}
