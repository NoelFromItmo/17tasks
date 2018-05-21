<?php

/**
 * @param string $string
 * @return bool
 */
function is_tainted(string $string) : bool {}

/**
 * @param string $string
 * @param string $__variadic
 * @return bool
 */
function taint(string &$string, string ...$__variadic) : bool {}

/**
 * @param string $string
 * @param string $__variadic
 * @return bool
 */
function untaint(string &$string, string ...$__variadic) : bool {}
