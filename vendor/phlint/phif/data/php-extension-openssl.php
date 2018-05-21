<?php

const OPENSSL_ALGO_MD4 = 3;
const OPENSSL_ALGO_MD5 = 2;
const OPENSSL_ALGO_RMD160 = 10;
const OPENSSL_ALGO_SHA1 = 1;
const OPENSSL_ALGO_SHA224 = 6;
const OPENSSL_ALGO_SHA256 = 7;
const OPENSSL_ALGO_SHA384 = 8;
const OPENSSL_ALGO_SHA512 = 9;
const OPENSSL_CIPHER_3DES = 4;
const OPENSSL_CIPHER_AES_128_CBC = 5;
const OPENSSL_CIPHER_AES_192_CBC = 6;
const OPENSSL_CIPHER_AES_256_CBC = 7;
const OPENSSL_CIPHER_DES = 3;
const OPENSSL_CIPHER_RC2_128 = 1;
const OPENSSL_CIPHER_RC2_40 = 0;
const OPENSSL_CIPHER_RC2_64 = 2;
const OPENSSL_DEFAULT_STREAM_CIPHERS = 'ECDHE-RSA-AES128-GCM-SHA256:ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES256-GCM-SHA384:ECDHE-ECDSA-AES256-GCM-SHA384:DHE-RSA-AES128-GCM-SHA256:DHE-DSS-AES128-GCM-SHA256:kEDH+AESGCM:ECDHE-RSA-AES128-SHA256:ECDHE-ECDSA-AES128-SHA256:ECDHE-RSA-AES128-SHA:ECDHE-ECDSA-AES128-SHA:ECDHE-RSA-AES256-SHA384:ECDHE-ECDSA-AES256-SHA384:ECDHE-RSA-AES256-SHA:ECDHE-ECDSA-AES256-SHA:DHE-RSA-AES128-SHA256:DHE-RSA-AES128-SHA:DHE-DSS-AES128-SHA256:DHE-RSA-AES256-SHA256:DHE-DSS-AES256-SHA:DHE-RSA-AES256-SHA:AES128-GCM-SHA256:AES256-GCM-SHA384:AES128:AES256:HIGH:!SSLv2:!aNULL:!eNULL:!EXPORT:!DES:!MD5:!RC4:!ADH';
const OPENSSL_DONT_ZERO_PAD_KEY = 4;
const OPENSSL_KEYTYPE_DH = 2;
const OPENSSL_KEYTYPE_DSA = 1;
const OPENSSL_KEYTYPE_EC = 3;
const OPENSSL_KEYTYPE_RSA = 0;
const OPENSSL_NO_PADDING = 3;
const OPENSSL_PKCS1_OAEP_PADDING = 4;
const OPENSSL_PKCS1_PADDING = 1;
const OPENSSL_RAW_DATA = 1;
const OPENSSL_SSLV23_PADDING = 2;
const OPENSSL_TLSEXT_SERVER_NAME = 1;
const OPENSSL_VERSION_NUMBER = 0;
const OPENSSL_VERSION_TEXT = '';
const OPENSSL_ZERO_PADDING = 2;
const PKCS7_BINARY = 128;
const PKCS7_DETACHED = 64;
const PKCS7_NOATTR = 256;
const PKCS7_NOCERTS = 2;
const PKCS7_NOCHAIN = 8;
const PKCS7_NOINTERN = 16;
const PKCS7_NOSIGS = 4;
const PKCS7_NOVERIFY = 32;
const PKCS7_TEXT = 1;
const X509_PURPOSE_ANY = 7;
const X509_PURPOSE_CRL_SIGN = 6;
const X509_PURPOSE_NS_SSL_SERVER = 3;
const X509_PURPOSE_SMIME_ENCRYPT = 5;
const X509_PURPOSE_SMIME_SIGN = 4;
const X509_PURPOSE_SSL_CLIENT = 1;
const X509_PURPOSE_SSL_SERVER = 2;

/**
 * @param string $method
 * @return int
 */
function openssl_cipher_iv_length(string $method) : int {}

/**
 * @param mixed $csr
 * @param string $out
 * @param bool $notext
 * @return bool
 */
function openssl_csr_export($csr, string &$out, bool $notext = true) : bool {}

/**
 * @param mixed $csr
 * @param string $outfilename
 * @param bool $notext
 * @return bool
 */
function openssl_csr_export_to_file($csr, string $outfilename, bool $notext = true) : bool {}

/**
 * @param mixed $csr
 * @param bool $use_shortnames
 * @return resource
 */
function openssl_csr_get_public_key($csr, bool $use_shortnames = true) {}

/**
 * @param mixed $csr
 * @param bool $use_shortnames
 * @return array
 */
function openssl_csr_get_subject($csr, bool $use_shortnames = true) : array {}

/**
 * @param array $dn
 * @param resource $privkey
 * @param array $configargs
 * @param array $extraattribs
 * @return mixed
 */
function openssl_csr_new(array $dn, &$privkey, array $configargs = [], array $extraattribs = []) {}

/**
 * @param mixed $csr
 * @param mixed $cacert
 * @param mixed $priv_key
 * @param int $days
 * @param array $configargs
 * @param int $serial
 * @return resource
 */
function openssl_csr_sign($csr, $cacert, $priv_key, int $days, array $configargs = [], int $serial = 0) {}

/**
 * @param string $data
 * @param string $method
 * @param string $key
 * @param int $options
 * @param string $iv
 * @param string $tag
 * @param string $aad
 * @return string
 */
function openssl_decrypt(string $data, string $method, string $key, int $options = 0, string $iv = "", string $tag = "", string $aad = "") : string {}

/**
 * @param string $pub_key
 * @param resource $dh_key
 * @return string
 */
function openssl_dh_compute_key(string $pub_key, $dh_key) : string {}

/**
 * @param string $data
 * @param string $method
 * @param bool $raw_output
 * @return string
 */
function openssl_digest(string $data, string $method, bool $raw_output = false) : string {}

/**
 * @param string $data
 * @param string $method
 * @param string $key
 * @param int $options
 * @param string $iv
 * @param string $tag
 * @param string $aad
 * @param int $tag_length
 * @return string
 */
function openssl_encrypt(string $data, string $method, string $key, int $options = 0, string $iv = "", string &$tag = null, string $aad = "", int $tag_length = 16) : string {}

/**
 * @return string
 */
function openssl_error_string() : string {}

/**
 * @param resource $key_identifier
 * @return void
 */
function openssl_free_key($key_identifier) {}

/**
 * @return array
 */
function openssl_get_cert_locations() : array {}

/**
 * @param bool $aliases
 * @return array
 */
function openssl_get_cipher_methods(bool $aliases = false) : array {}

/**
 * @return array
 */
function openssl_get_curve_names() : array {}

/**
 * @param bool $aliases
 * @return array
 */
function openssl_get_md_methods(bool $aliases = false) : array {}

/**
 * @param mixed $key
 * @param mixed $passphrase
 * @return void
 */
function openssl_get_privatekey($key, $passphrase) {}

/**
 * @param mixed $cert
 * @return void
 */
function openssl_get_publickey($cert) {}

/**
 * @param string $sealed_data
 * @param string $open_data
 * @param string $env_key
 * @param mixed $priv_key_id
 * @param string $method
 * @param string $iv
 * @return bool
 */
function openssl_open(string $sealed_data, string &$open_data, string $env_key, $priv_key_id, string $method = "RC4", string $iv = '') : bool {}

/**
 * @param string $password
 * @param string $salt
 * @param int $key_length
 * @param int $iterations
 * @param string $digest_algorithm
 * @return string
 */
function openssl_pbkdf2(string $password, string $salt, int $key_length, int $iterations, string $digest_algorithm = "sha1") : string {}

/**
 * @param mixed $x509
 * @param string $out
 * @param mixed $priv_key
 * @param string $pass
 * @param array $args
 * @return bool
 */
function openssl_pkcs12_export($x509, string &$out, $priv_key, string $pass, array $args = []) : bool {}

/**
 * @param mixed $x509
 * @param string $filename
 * @param mixed $priv_key
 * @param string $pass
 * @param array $args
 * @return bool
 */
function openssl_pkcs12_export_to_file($x509, string $filename, $priv_key, string $pass, array $args = []) : bool {}

/**
 * @param string $pkcs12
 * @param array $certs
 * @param string $pass
 * @return bool
 */
function openssl_pkcs12_read(string $pkcs12, array &$certs, string $pass) : bool {}

/**
 * @param string $infilename
 * @param string $outfilename
 * @param mixed $recipcert
 * @param mixed $recipkey
 * @return bool
 */
function openssl_pkcs7_decrypt(string $infilename, string $outfilename, $recipcert, $recipkey = null) : bool {}

/**
 * @param string $infile
 * @param string $outfile
 * @param mixed $recipcerts
 * @param array $headers
 * @param int $flags
 * @param int $cipherid
 * @return bool
 */
function openssl_pkcs7_encrypt(string $infile, string $outfile, $recipcerts, array $headers, int $flags = 0, int $cipherid = OPENSSL_CIPHER_RC2_40) : bool {}

/**
 * @param string $infilename
 * @param array $certs
 * @return bool
 */
function openssl_pkcs7_read(string $infilename, array &$certs) : bool {}

/**
 * @param string $infilename
 * @param string $outfilename
 * @param mixed $signcert
 * @param mixed $privkey
 * @param array $headers
 * @param int $flags
 * @param string $extracerts
 * @return bool
 */
function openssl_pkcs7_sign(string $infilename, string $outfilename, $signcert, $privkey, array $headers, int $flags = PKCS7_DETACHED, string $extracerts = '') : bool {}

/**
 * @param string $filename
 * @param int $flags
 * @param string $outfilename
 * @param array $cainfo
 * @param string $extracerts
 * @param string $content
 * @param string $p7bfilename
 * @return mixed
 */
function openssl_pkcs7_verify(string $filename, int $flags, string $outfilename = '', array $cainfo = [], string $extracerts = '', string $content = '', string $p7bfilename = '') {}

/**
 * @param mixed $key
 * @param string $out
 * @param string $passphrase
 * @param array $configargs
 * @return bool
 */
function openssl_pkey_export($key, string &$out, string $passphrase = '', array $configargs = []) : bool {}

/**
 * @param mixed $key
 * @param string $outfilename
 * @param string $passphrase
 * @param array $configargs
 * @return bool
 */
function openssl_pkey_export_to_file($key, string $outfilename, string $passphrase = '', array $configargs = []) : bool {}

/**
 * @param resource $key
 * @return void
 */
function openssl_pkey_free($key) {}

/**
 * @param resource $key
 * @return array
 */
function openssl_pkey_get_details($key) : array {}

/**
 * @param mixed $key
 * @param string $passphrase
 * @return resource
 */
function openssl_pkey_get_private($key, string $passphrase = "") {}

/**
 * @param mixed $certificate
 * @return resource
 */
function openssl_pkey_get_public($certificate) {}

/**
 * @param array $configargs
 * @return resource
 */
function openssl_pkey_new(array $configargs = []) {}

/**
 * @param string $data
 * @param string $decrypted
 * @param mixed $key
 * @param int $padding
 * @return bool
 */
function openssl_private_decrypt(string $data, string &$decrypted, $key, int $padding = OPENSSL_PKCS1_PADDING) : bool {}

/**
 * @param string $data
 * @param string $crypted
 * @param mixed $key
 * @param int $padding
 * @return bool
 */
function openssl_private_encrypt(string $data, string &$crypted, $key, int $padding = OPENSSL_PKCS1_PADDING) : bool {}

/**
 * @param string $data
 * @param string $decrypted
 * @param mixed $key
 * @param int $padding
 * @return bool
 */
function openssl_public_decrypt(string $data, string &$decrypted, $key, int $padding = OPENSSL_PKCS1_PADDING) : bool {}

/**
 * @param string $data
 * @param string $crypted
 * @param mixed $key
 * @param int $padding
 * @return bool
 */
function openssl_public_encrypt(string $data, string &$crypted, $key, int $padding = OPENSSL_PKCS1_PADDING) : bool {}

/**
 * @param int $length
 * @param bool $crypto_strong
 * @return string
 */
function openssl_random_pseudo_bytes(int $length, bool &$crypto_strong = false) : string {}

/**
 * @param string $data
 * @param string $sealed_data
 * @param array $env_keys
 * @param array $pub_key_ids
 * @param string $method
 * @param string $iv
 * @return int
 */
function openssl_seal(string $data, string &$sealed_data, array &$env_keys, array $pub_key_ids, string $method = "RC4", string &$iv = '') : int {}

/**
 * @param string $data
 * @param string $signature
 * @param mixed $priv_key_id
 * @param mixed $signature_alg
 * @return bool
 */
function openssl_sign(string $data, string &$signature, $priv_key_id, $signature_alg = OPENSSL_ALGO_SHA1) : bool {}

/**
 * @param string $spkac
 * @return string
 */
function openssl_spki_export(string &$spkac) : string {}

/**
 * @param string $spkac
 * @return string
 */
function openssl_spki_export_challenge(string &$spkac) : string {}

/**
 * @param resource $privkey
 * @param string $challenge
 * @param int $algorithm
 * @return string
 */
function openssl_spki_new(&$privkey, string &$challenge, int $algorithm = 0) : string {}

/**
 * @param string $spkac
 * @return string
 */
function openssl_spki_verify(string &$spkac) : string {}

/**
 * @param string $data
 * @param string $signature
 * @param mixed $pub_key_id
 * @param mixed $signature_alg
 * @return int
 */
function openssl_verify(string $data, string $signature, $pub_key_id, $signature_alg = OPENSSL_ALGO_SHA1) : int {}

/**
 * @param mixed $cert
 * @param mixed $key
 * @return bool
 */
function openssl_x509_check_private_key($cert, $key) : bool {}

/**
 * @param mixed $x509cert
 * @param int $purpose
 * @param array $cainfo
 * @param string $untrustedfile
 * @return int
 */
function openssl_x509_checkpurpose($x509cert, int $purpose, array $cainfo = [], string $untrustedfile = '') : int {}

/**
 * @param mixed $x509
 * @param string $output
 * @param bool $notext
 * @return bool
 */
function openssl_x509_export($x509, string &$output, bool $notext = true) : bool {}

/**
 * @param mixed $x509
 * @param string $outfilename
 * @param bool $notext
 * @return bool
 */
function openssl_x509_export_to_file($x509, string $outfilename, bool $notext = true) : bool {}

/**
 * @param mixed $x509
 * @param string $hash_algorithm
 * @param bool $raw_output
 * @return string
 */
function openssl_x509_fingerprint($x509, string $hash_algorithm = "sha1", bool $raw_output = false) : string {}

/**
 * @param resource $x509cert
 * @return void
 */
function openssl_x509_free($x509cert) {}

/**
 * @param mixed $x509cert
 * @param bool $shortnames
 * @return array
 */
function openssl_x509_parse($x509cert, bool $shortnames = true) : array {}

/**
 * @param mixed $x509certdata
 * @return resource
 */
function openssl_x509_read($x509certdata) {}
