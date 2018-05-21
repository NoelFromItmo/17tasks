<?php

const GMP_BIG_ENDIAN = 8;
const GMP_LITTLE_ENDIAN = 4;
const GMP_LSW_FIRST = 2;
const GMP_MPIR_VERSION = '';
const GMP_MSW_FIRST = 1;
const GMP_NATIVE_ENDIAN = 16;
const GMP_ROUND_MINUSINF = 2;
const GMP_ROUND_PLUSINF = 1;
const GMP_ROUND_ZERO = 0;
const GMP_VERSION = '';

/**
 * @param GMP $a
 * @return GMP
 */
function gmp_abs(GMP $a) : GMP {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_add(GMP $a, GMP $b) : GMP {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_and(GMP $a, GMP $b) : GMP {}

/**
 * @param GMP $a
 * @param int $index
 * @return void
 */
function gmp_clrbit(GMP $a, int $index) {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return int
 */
function gmp_cmp(GMP $a, GMP $b) : int {}

/**
 * @param GMP $a
 * @return GMP
 */
function gmp_com(GMP $a) : GMP {}

/**
 * @param mixed $a
 * @param mixed $b
 * @param mixed $round
 * @return void
 */
function gmp_div($a, $b, $round) {}

/**
 * @param GMP $a
 * @param GMP $b
 * @param int $round
 * @return GMP
 */
function gmp_div_q(GMP $a, GMP $b, int $round = GMP_ROUND_ZERO) : GMP {}

/**
 * @param GMP $n
 * @param GMP $d
 * @param int $round
 * @return array
 */
function gmp_div_qr(GMP $n, GMP $d, int $round = GMP_ROUND_ZERO) : array {}

/**
 * @param GMP $n
 * @param GMP $d
 * @param int $round
 * @return GMP
 */
function gmp_div_r(GMP $n, GMP $d, int $round = GMP_ROUND_ZERO) : GMP {}

/**
 * @param GMP $n
 * @param GMP $d
 * @return GMP
 */
function gmp_divexact(GMP $n, GMP $d) : GMP {}

/**
 * @param GMP $gmpnumber
 * @param int $word_size
 * @param int $options
 * @return string
 */
function gmp_export(GMP $gmpnumber, int $word_size = 1, int $options = GMP_MSW_FIRST | GMP_NATIVE_ENDIAN) : string {}

/**
 * @param mixed $a
 * @return GMP
 */
function gmp_fact($a) : GMP {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_gcd(GMP $a, GMP $b) : GMP {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return array
 */
function gmp_gcdext(GMP $a, GMP $b) : array {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return int
 */
function gmp_hamdist(GMP $a, GMP $b) : int {}

/**
 * @param string $data
 * @param int $word_size
 * @param int $options
 * @return GMP
 */
function gmp_import(string $data, int $word_size = 1, int $options = GMP_MSW_FIRST | GMP_NATIVE_ENDIAN) : GMP {}

/**
 * @param mixed $number
 * @param int $base
 * @return GMP
 */
function gmp_init($number, int $base = 0) : GMP {}

/**
 * @param GMP $gmpnumber
 * @return int
 */
function gmp_intval(GMP $gmpnumber) : int {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_invert(GMP $a, GMP $b) : GMP {}

/**
 * @param GMP $a
 * @param GMP $p
 * @return int
 */
function gmp_jacobi(GMP $a, GMP $p) : int {}

/**
 * @param GMP $a
 * @param GMP $p
 * @return int
 */
function gmp_legendre(GMP $a, GMP $p) : int {}

/**
 * @param GMP $n
 * @param GMP $d
 * @return GMP
 */
function gmp_mod(GMP $n, GMP $d) : GMP {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_mul(GMP $a, GMP $b) : GMP {}

/**
 * @param GMP $a
 * @return GMP
 */
function gmp_neg(GMP $a) : GMP {}

/**
 * @param int $a
 * @return GMP
 */
function gmp_nextprime(int $a) : GMP {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_or(GMP $a, GMP $b) : GMP {}

/**
 * @param GMP $a
 * @return bool
 */
function gmp_perfect_square(GMP $a) : bool {}

/**
 * @param GMP $a
 * @return int
 */
function gmp_popcount(GMP $a) : int {}

/**
 * @param GMP $base
 * @param int $exp
 * @return GMP
 */
function gmp_pow(GMP $base, int $exp) : GMP {}

/**
 * @param GMP $base
 * @param GMP $exp
 * @param GMP $mod
 * @return GMP
 */
function gmp_powm(GMP $base, GMP $exp, GMP $mod) : GMP {}

/**
 * @param GMP $a
 * @param int $reps
 * @return int
 */
function gmp_prob_prime(GMP $a, int $reps = 10) : int {}

/**
 * @param int $limiter
 * @return GMP
 */
function gmp_random(int $limiter = 20) : GMP {}

/**
 * @param int $bits
 * @return GMP
 */
function gmp_random_bits(int $bits) : GMP {}

/**
 * @param GMP $min
 * @param GMP $max
 * @return GMP
 */
function gmp_random_range(GMP $min, GMP $max) : GMP {}

/**
 * @param mixed $seed
 * @return void
 */
function gmp_random_seed($seed) {}

/**
 * @param GMP $a
 * @param int $nth
 * @return GMP
 */
function gmp_root(GMP $a, int $nth) : GMP {}

/**
 * @param GMP $a
 * @param int $nth
 * @return array
 */
function gmp_rootrem(GMP $a, int $nth) : array {}

/**
 * @param GMP $a
 * @param int $start
 * @return int
 */
function gmp_scan0(GMP $a, int $start) : int {}

/**
 * @param GMP $a
 * @param int $start
 * @return int
 */
function gmp_scan1(GMP $a, int $start) : int {}

/**
 * @param GMP $a
 * @param int $index
 * @param bool $bit_on
 * @return void
 */
function gmp_setbit(GMP $a, int $index, bool $bit_on = true) {}

/**
 * @param GMP $a
 * @return int
 */
function gmp_sign(GMP $a) : int {}

/**
 * @param GMP $a
 * @return GMP
 */
function gmp_sqrt(GMP $a) : GMP {}

/**
 * @param GMP $a
 * @return array
 */
function gmp_sqrtrem(GMP $a) : array {}

/**
 * @param GMP $gmpnumber
 * @param int $base
 * @return string
 */
function gmp_strval(GMP $gmpnumber, int $base = 10) : string {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_sub(GMP $a, GMP $b) : GMP {}

/**
 * @param GMP $a
 * @param int $index
 * @return bool
 */
function gmp_testbit(GMP $a, int $index) : bool {}

/**
 * @param GMP $a
 * @param GMP $b
 * @return GMP
 */
function gmp_xor(GMP $a, GMP $b) : GMP {}

class GMP implements Serializable {}
