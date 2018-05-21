<?php

/**
 * @param string $left_operand
 * @param string $right_operand
 * @param int $scale
 * @return string
 */
function bcadd(string $left_operand, string $right_operand, int $scale = 0) : string {}

/**
 * @param string $left_operand
 * @param string $right_operand
 * @param int $scale
 * @return int
 */
function bccomp(string $left_operand, string $right_operand, int $scale = 0) : int {}

/**
 * @param string $dividend
 * @param string $divisor
 * @param int $scale
 * @return string
 */
function bcdiv(string $dividend, string $divisor, int $scale = 0) : string {}

/**
 * @param string $dividend
 * @param string $modulus
 * @param int $scale
 * @return string
 */
function bcmod(string $dividend, string $modulus, int $scale = 0) : string {}

/**
 * @param string $left_operand
 * @param string $right_operand
 * @param int $scale
 * @return string
 */
function bcmul(string $left_operand, string $right_operand, int $scale = 0) : string {}

/**
 * @param string $base
 * @param string $exponent
 * @param int $scale
 * @return string
 */
function bcpow(string $base, string $exponent, int $scale = 0) : string {}

/**
 * @param string $base
 * @param string $exponent
 * @param string $modulus
 * @param int $scale
 * @return string
 */
function bcpowmod(string $base, string $exponent, string $modulus, int $scale = 0) : string {}

/**
 * @param int $scale
 * @return int
 */
function bcscale(int $scale = 0) : int {}

/**
 * @param string $operand
 * @param int $scale
 * @return string
 */
function bcsqrt(string $operand, int $scale = 0) : string {}

/**
 * @param string $left_operand
 * @param string $right_operand
 * @param int $scale
 * @return string
 */
function bcsub(string $left_operand, string $right_operand, int $scale = 0) : string {}
