<?php

/**
 * @param resource $identifier
 * @param string $fingerprint
 * @param string $passphrase
 * @return bool
 */
function gnupg_adddecryptkey($identifier, string $fingerprint, string $passphrase) : bool {}

/**
 * @param resource $identifier
 * @param string $fingerprint
 * @return bool
 */
function gnupg_addencryptkey($identifier, string $fingerprint) : bool {}

/**
 * @param resource $identifier
 * @param string $fingerprint
 * @param string $passphrase
 * @return bool
 */
function gnupg_addsignkey($identifier, string $fingerprint, string $passphrase = '') : bool {}

/**
 * @param resource $identifier
 * @return bool
 */
function gnupg_cleardecryptkeys($identifier) : bool {}

/**
 * @param resource $identifier
 * @return bool
 */
function gnupg_clearencryptkeys($identifier) : bool {}

/**
 * @param resource $identifier
 * @return bool
 */
function gnupg_clearsignkeys($identifier) : bool {}

/**
 * @param resource $identifier
 * @param string $text
 * @return string
 */
function gnupg_decrypt($identifier, string $text) : string {}

/**
 * @param resource $identifier
 * @param string $text
 * @param string $plaintext
 * @return array
 */
function gnupg_decryptverify($identifier, string $text, string &$plaintext) : array {}

/**
 * @param resource $identifier
 * @param string $plaintext
 * @return string
 */
function gnupg_encrypt($identifier, string $plaintext) : string {}

/**
 * @param resource $identifier
 * @param string $plaintext
 * @return string
 */
function gnupg_encryptsign($identifier, string $plaintext) : string {}

/**
 * @param resource $identifier
 * @param string $fingerprint
 * @return string
 */
function gnupg_export($identifier, string $fingerprint) : string {}

/**
 * @param resource $identifier
 * @return string
 */
function gnupg_geterror($identifier) : string {}

/**
 * @param resource $identifier
 * @return int
 */
function gnupg_getprotocol($identifier) : int {}

/**
 * @param resource $identifier
 * @param string $keydata
 * @return array
 */
function gnupg_import($identifier, string $keydata) : array {}

/**
 * @return resource
 */
function gnupg_init() {}

/**
 * @param resource $identifier
 * @param string $pattern
 * @return array
 */
function gnupg_keyinfo($identifier, string $pattern) : array {}

/**
 * @param resource $identifier
 * @param int $armor
 * @return bool
 */
function gnupg_setarmor($identifier, int $armor) : bool {}

/**
 * @param resource $identifier
 * @param int $errormode
 * @return void
 */
function gnupg_seterrormode($identifier, int $errormode) {}

/**
 * @param resource $identifier
 * @param int $signmode
 * @return bool
 */
function gnupg_setsignmode($identifier, int $signmode) : bool {}

/**
 * @param resource $identifier
 * @param string $plaintext
 * @return string
 */
function gnupg_sign($identifier, string $plaintext) : string {}

/**
 * @param resource $identifier
 * @param string $signed_text
 * @param string $signature
 * @param string $plaintext
 * @return array
 */
function gnupg_verify($identifier, string $signed_text, string $signature, string &$plaintext = '') : array {}
