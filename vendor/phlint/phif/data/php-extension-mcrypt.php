<?php

const MCRYPT_3DES = 'tripledes';
const MCRYPT_ARCFOUR = 'arcfour';
const MCRYPT_ARCFOUR_IV = 'arcfour-iv';
const MCRYPT_BLOWFISH = 'blowfish';
const MCRYPT_BLOWFISH_COMPAT = 'blowfish-compat';
const MCRYPT_CAST_128 = 'cast-128';
const MCRYPT_CAST_256 = 'cast-256';
const MCRYPT_CRYPT = 'crypt';
const MCRYPT_DECRYPT = 1;
const MCRYPT_DES = 'des';
const MCRYPT_DEV_RANDOM = 0;
const MCRYPT_DEV_URANDOM = 1;
const MCRYPT_ENCRYPT = 0;
const MCRYPT_ENIGNA = 'crypt';
const MCRYPT_GOST = 'gost';
const MCRYPT_IDEA = 'idea';
const MCRYPT_LOKI97 = 'loki97';
const MCRYPT_MARS = 'mars';
const MCRYPT_MODE_CBC = 'cbc';
const MCRYPT_MODE_CFB = 'cfb';
const MCRYPT_MODE_ECB = 'ecb';
const MCRYPT_MODE_NOFB = 'nofb';
const MCRYPT_MODE_OFB = 'ofb';
const MCRYPT_MODE_STREAM = 'stream';
const MCRYPT_PANAMA = 'panama';
const MCRYPT_RAND = 2;
const MCRYPT_RC2 = 'rc2';
const MCRYPT_RC6 = 'rc6';
const MCRYPT_RIJNDAEL_128 = 'rijndael-128';
const MCRYPT_RIJNDAEL_192 = 'rijndael-192';
const MCRYPT_RIJNDAEL_256 = 'rijndael-256';
const MCRYPT_SAFER128 = 'safer-sk128';
const MCRYPT_SAFER64 = 'safer-sk64';
const MCRYPT_SAFERPLUS = 'saferplus';
const MCRYPT_SERPENT = 'serpent';
const MCRYPT_SKIPJACK = 'skipjack';
const MCRYPT_THREEWAY = 'threeway';
const MCRYPT_TRIPLEDES = 'tripledes';
const MCRYPT_TWOFISH = 'twofish';
const MCRYPT_WAKE = 'wake';
const MCRYPT_XTEA = 'xtea';

/**
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @param string $iv
 * @return string
 */
function mcrypt_cbc(string $cipher, string $key, string $data, int $mode, string $iv = '') : string {}

/**
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @param string $iv
 * @return string
 */
function mcrypt_cfb(string $cipher, string $key, string $data, int $mode, string $iv = '') : string {}

/**
 * @param int $size
 * @param int $source
 * @return string
 */
function mcrypt_create_iv(int $size, int $source = MCRYPT_DEV_URANDOM) : string {}

/**
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param string $mode
 * @param string $iv
 * @return string
 */
function mcrypt_decrypt(string $cipher, string $key, string $data, string $mode, string $iv = '') : string {}

/**
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @param string $iv
 * @return string
 */
function mcrypt_ecb(string $cipher, string $key, string $data, int $mode, string $iv = '') : string {}

/**
 * @param resource $td
 * @return string
 */
function mcrypt_enc_get_algorithms_name($td) : string {}

/**
 * @param resource $td
 * @return int
 */
function mcrypt_enc_get_block_size($td) : int {}

/**
 * @param resource $td
 * @return int
 */
function mcrypt_enc_get_iv_size($td) : int {}

/**
 * @param resource $td
 * @return int
 */
function mcrypt_enc_get_key_size($td) : int {}

/**
 * @param resource $td
 * @return string
 */
function mcrypt_enc_get_modes_name($td) : string {}

/**
 * @param resource $td
 * @return array
 */
function mcrypt_enc_get_supported_key_sizes($td) : array {}

/**
 * @param resource $td
 * @return bool
 */
function mcrypt_enc_is_block_algorithm($td) : bool {}

/**
 * @param resource $td
 * @return bool
 */
function mcrypt_enc_is_block_algorithm_mode($td) : bool {}

/**
 * @param resource $td
 * @return bool
 */
function mcrypt_enc_is_block_mode($td) : bool {}

/**
 * @param resource $td
 * @return int
 */
function mcrypt_enc_self_test($td) : int {}

/**
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param string $mode
 * @param string $iv
 * @return string
 */
function mcrypt_encrypt(string $cipher, string $key, string $data, string $mode, string $iv = '') : string {}

/**
 * @param resource $td
 * @param string $data
 * @return string
 */
function mcrypt_generic($td, string $data) : string {}

/**
 * @param resource $td
 * @return bool
 */
function mcrypt_generic_deinit($td) : bool {}

/**
 * @param resource $td
 * @return bool
 */
function mcrypt_generic_end($td) : bool {}

/**
 * @param resource $td
 * @param string $key
 * @param string $iv
 * @return int
 */
function mcrypt_generic_init($td, string $key, string $iv) : int {}

/**
 * @param string $cipher
 * @param string $mode
 * @return int
 */
function mcrypt_get_block_size(string $cipher, string $mode) : int {}

/**
 * @param string $cipher
 * @return string
 */
function mcrypt_get_cipher_name(string $cipher) : string {}

/**
 * @param string $cipher
 * @param string $mode
 * @return int
 */
function mcrypt_get_iv_size(string $cipher, string $mode) : int {}

/**
 * @param string $cipher
 * @param string $mode
 * @return int
 */
function mcrypt_get_key_size(string $cipher, string $mode) : int {}

/**
 * @param string $lib_dir
 * @return array
 */
function mcrypt_list_algorithms(string $lib_dir = ini_get("mcrypt.algorithms_dir")) : array {}

/**
 * @param string $lib_dir
 * @return array
 */
function mcrypt_list_modes(string $lib_dir = ini_get("mcrypt.modes_dir")) : array {}

/**
 * @param resource $td
 * @return bool
 */
function mcrypt_module_close($td) : bool {}

/**
 * @param string $algorithm
 * @param string $lib_dir
 * @return int
 */
function mcrypt_module_get_algo_block_size(string $algorithm, string $lib_dir = '') : int {}

/**
 * @param string $algorithm
 * @param string $lib_dir
 * @return int
 */
function mcrypt_module_get_algo_key_size(string $algorithm, string $lib_dir = '') : int {}

/**
 * @param string $algorithm
 * @param string $lib_dir
 * @return array
 */
function mcrypt_module_get_supported_key_sizes(string $algorithm, string $lib_dir = '') : array {}

/**
 * @param string $algorithm
 * @param string $lib_dir
 * @return bool
 */
function mcrypt_module_is_block_algorithm(string $algorithm, string $lib_dir = '') : bool {}

/**
 * @param string $mode
 * @param string $lib_dir
 * @return bool
 */
function mcrypt_module_is_block_algorithm_mode(string $mode, string $lib_dir = '') : bool {}

/**
 * @param string $mode
 * @param string $lib_dir
 * @return bool
 */
function mcrypt_module_is_block_mode(string $mode, string $lib_dir = '') : bool {}

/**
 * @param string $algorithm
 * @param string $algorithm_directory
 * @param string $mode
 * @param string $mode_directory
 * @return resource
 */
function mcrypt_module_open(string $algorithm, string $algorithm_directory, string $mode, string $mode_directory) {}

/**
 * @param string $algorithm
 * @param string $lib_dir
 * @return bool
 */
function mcrypt_module_self_test(string $algorithm, string $lib_dir = '') : bool {}

/**
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @param string $iv
 * @return string
 */
function mcrypt_ofb(string $cipher, string $key, string $data, int $mode, string $iv = '') : string {}

/**
 * @param resource $td
 * @param string $data
 * @return string
 */
function mdecrypt_generic($td, string $data) : string {}
