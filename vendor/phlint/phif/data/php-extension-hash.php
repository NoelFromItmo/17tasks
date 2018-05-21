<?php

const HASH_HMAC = 1;
const MHASH_ADLER32 = 18;
const MHASH_CRC32 = 0;
const MHASH_CRC32B = 9;
const MHASH_FNV132 = 29;
const MHASH_FNV164 = 31;
const MHASH_FNV1A32 = 30;
const MHASH_FNV1A64 = 32;
const MHASH_GOST = 8;
const MHASH_HAVAL128 = 13;
const MHASH_HAVAL160 = 12;
const MHASH_HAVAL192 = 11;
const MHASH_HAVAL224 = 10;
const MHASH_HAVAL256 = 3;
const MHASH_JOAAT = 33;
const MHASH_MD2 = 28;
const MHASH_MD4 = 16;
const MHASH_MD5 = 1;
const MHASH_RIPEMD128 = 23;
const MHASH_RIPEMD160 = 5;
const MHASH_RIPEMD256 = 24;
const MHASH_RIPEMD320 = 25;
const MHASH_SHA1 = 2;
const MHASH_SHA224 = 19;
const MHASH_SHA256 = 17;
const MHASH_SHA384 = 21;
const MHASH_SHA512 = 20;
const MHASH_SNEFRU256 = 27;
const MHASH_TIGER = 7;
const MHASH_TIGER128 = 14;
const MHASH_TIGER160 = 15;
const MHASH_WHIRLPOOL = 22;

/**
 * @param string $algo
 * @param string $data
 * @param bool $raw_output
 * @return string
 */
function hash(string $algo, string $data, bool $raw_output = false) : string {}

/**
 * @return array
 */
function hash_algos() : array {}

/**
 * @param HashContext $context
 * @return HashContext
 */
function hash_copy(HashContext $context) : HashContext {}

/**
 * @param string $known_string
 * @param string $user_string
 * @return bool
 */
function hash_equals(string $known_string, string $user_string) : bool {}

/**
 * @param string $algo
 * @param string $filename
 * @param bool $raw_output
 * @return string
 */
function hash_file(string $algo, string $filename, bool $raw_output = false) : string {}

/**
 * @param HashContext $context
 * @param bool $raw_output
 * @return string
 */
function hash_final(HashContext $context, bool $raw_output = false) : string {}

/**
 * @param string $algo
 * @param string $ikm
 * @param int $length
 * @param string $info
 * @param string $salt
 * @return string
 */
function hash_hkdf(string $algo, string $ikm, int $length = 0, string $info = '', string $salt = '') : string {}

/**
 * @param string $algo
 * @param string $data
 * @param string $key
 * @param bool $raw_output
 * @return string
 */
function hash_hmac(string $algo, string $data, string $key, bool $raw_output = false) : string {}

/**
 * @return array
 */
function hash_hmac_algos() : array {}

/**
 * @param string $algo
 * @param string $filename
 * @param string $key
 * @param bool $raw_output
 * @return string
 */
function hash_hmac_file(string $algo, string $filename, string $key, bool $raw_output = false) : string {}

/**
 * @param string $algo
 * @param int $options
 * @param string $key
 * @return HashContext
 */
function hash_init(string $algo, int $options = 0, string $key = null) : HashContext {}

/**
 * @param string $algo
 * @param string $password
 * @param string $salt
 * @param int $iterations
 * @param int $length
 * @param bool $raw_output
 * @return string
 */
function hash_pbkdf2(string $algo, string $password, string $salt, int $iterations, int $length = 0, bool $raw_output = false) : string {}

/**
 * @param HashContext $context
 * @param string $data
 * @return bool
 */
function hash_update(HashContext $context, string $data) : bool {}

/**
 * @param HashContext $hcontext
 * @param string $filename
 * @param resource $scontext
 * @return bool
 */
function hash_update_file(HashContext $hcontext, string $filename, $scontext = null) : bool {}

/**
 * @param HashContext $context
 * @param resource $handle
 * @param int $length
 * @return int
 */
function hash_update_stream(HashContext $context, $handle, int $length = -1) : int {}

/**
 * @param int $hash
 * @param string $data
 * @param string $key
 * @return string
 */
function mhash(int $hash, string $data, string $key = '') : string {}

/**
 * @return int
 */
function mhash_count() : int {}

/**
 * @param int $hash
 * @return int
 */
function mhash_get_block_size(int $hash) : int {}

/**
 * @param int $hash
 * @return string
 */
function mhash_get_hash_name(int $hash) : string {}

/**
 * @param int $hash
 * @param string $password
 * @param string $salt
 * @param int $bytes
 * @return string
 */
function mhash_keygen_s2k(int $hash, string $password, string $salt, int $bytes) : string {}

class HashContext
{
    function __construct() {}
}
