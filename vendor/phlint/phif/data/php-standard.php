<?php

/** @var array */ $_COOKIE = [];
/** @var array */ $_ENV = [];
/** @var array */ $_FILES = [];
/** @var array */ $_GET = [];
/** @var array */ $_POST = [];
/** @var array */ $_REQUEST = [];
/** @var array */ $_SERVER = [];
/** @var array */ $_SESSION = [];
/** @var array */ $GLOBALS = [];

const ARRAY_FILTER_USE_BOTH = 1;
const ARRAY_FILTER_USE_KEY = 2;
const ASSERT_ACTIVE = 1;
const ASSERT_BAIL = 3;
const ASSERT_CALLBACK = 2;
const ASSERT_EXCEPTION = 6;
const ASSERT_QUIET_EVAL = 5;
const ASSERT_WARNING = 4;
const CASE_LOWER = 0;
const CASE_UPPER = 1;
const CHAR_MAX = 127;
const CONNECTION_ABORTED = 1;
const CONNECTION_NORMAL = 0;
const CONNECTION_TIMEOUT = 2;
const COUNT_NORMAL = 0;
const COUNT_RECURSIVE = 1;
const CREDITS_ALL = 4294967295;
const CREDITS_DOCS = 16;
const CREDITS_FULLPAGE = 32;
const CREDITS_GENERAL = 2;
const CREDITS_GROUP = 1;
const CREDITS_MODULES = 8;
const CREDITS_QA = 64;
const CREDITS_SAPI = 4;
const CRYPT_BLOWFISH = 1;
const CRYPT_EXT_DES = 1;
const CRYPT_MD5 = 1;
const CRYPT_SALT_LENGTH = 123;
const CRYPT_SHA256 = 1;
const CRYPT_SHA512 = 1;
const CRYPT_STD_DES = 1;
const DIRECTORY_SEPARATOR = '';
const DNS_A = 1;
const DNS_A6 = 16777216;
const DNS_AAAA = 134217728;
const DNS_ALL = 251721779;
const DNS_ANY = 268435456;
const DNS_CAA = 8192;
const DNS_CNAME = 16;
const DNS_HINFO = 4096;
const DNS_MX = 16384;
const DNS_NAPTR = 67108864;
const DNS_NS = 2;
const DNS_PTR = 2048;
const DNS_SOA = 32;
const DNS_SRV = 33554432;
const DNS_TXT = 32768;
const ENT_COMPAT = 2;
const ENT_DISALLOWED = 128;
const ENT_HTML401 = 0;
const ENT_HTML5 = 48;
const ENT_IGNORE = 4;
const ENT_NOQUOTES = 0;
const ENT_QUOTES = 3;
const ENT_SUBSTITUTE = 8;
const ENT_XHTML = 32;
const ENT_XML1 = 16;
const EXTR_IF_EXISTS = 6;
const EXTR_OVERWRITE = 0;
const EXTR_PREFIX_ALL = 3;
const EXTR_PREFIX_IF_EXISTS = 5;
const EXTR_PREFIX_INVALID = 4;
const EXTR_PREFIX_SAME = 2;
const EXTR_REFS = 256;
const EXTR_SKIP = 1;
const FILE_APPEND = 8;
const FILE_BINARY = 0;
const FILE_IGNORE_NEW_LINES = 2;
const FILE_NO_DEFAULT_CONTEXT = 16;
const FILE_SKIP_EMPTY_LINES = 4;
const FILE_TEXT = 0;
const FILE_USE_INCLUDE_PATH = 1;
const FNM_CASEFOLD = 16;
const FNM_NOESCAPE = 1;
const FNM_PATHNAME = 2;
const FNM_PERIOD = 4;
const GLOB_AVAILABLE_FLAGS = 1073746108;
const GLOB_BRACE = 128;
const GLOB_ERR = 4;
const GLOB_MARK = 8;
const GLOB_NOCHECK = 16;
const GLOB_NOESCAPE = 4096;
const GLOB_NOSORT = 32;
const GLOB_ONLYDIR = 1073741824;
const HTML_ENTITIES = 1;
const HTML_SPECIALCHARS = 0;
const IMAGETYPE_BMP = 6;
const IMAGETYPE_COUNT = 19;
const IMAGETYPE_GIF = 1;
const IMAGETYPE_ICO = 17;
const IMAGETYPE_IFF = 14;
const IMAGETYPE_JB2 = 12;
const IMAGETYPE_JP2 = 10;
const IMAGETYPE_JPC = 9;
const IMAGETYPE_JPEG = 2;
const IMAGETYPE_JPEG2000 = 9;
const IMAGETYPE_JPX = 11;
const IMAGETYPE_PNG = 3;
const IMAGETYPE_PSD = 5;
const IMAGETYPE_SWC = 13;
const IMAGETYPE_SWF = 4;
const IMAGETYPE_TIFF_II = 7;
const IMAGETYPE_TIFF_MM = 8;
const IMAGETYPE_UNKNOWN = 0;
const IMAGETYPE_WBMP = 15;
const IMAGETYPE_WEBP = 18;
const IMAGETYPE_XBM = 16;
const INFO_ALL = 4294967295;
const INFO_CONFIGURATION = 4;
const INFO_CREDITS = 2;
const INFO_ENVIRONMENT = 16;
const INFO_GENERAL = 1;
const INFO_LICENSE = 64;
const INFO_MODULES = 8;
const INFO_VARIABLES = 32;
const INI_ALL = 7;
const INI_PERDIR = 2;
const INI_SCANNER_NORMAL = 0;
const INI_SCANNER_RAW = 1;
const INI_SCANNER_TYPED = 2;
const INI_SYSTEM = 4;
const INI_USER = 1;
const LC_ALL = 0;
const LC_COLLATE = 1;
const LC_CTYPE = 2;
const LC_MONETARY = 3;
const LC_NUMERIC = 4;
const LC_TIME = 5;
const LOCK_EX = 2;
const LOCK_NB = 4;
const LOCK_SH = 1;
const LOCK_UN = 3;
const LOG_ALERT = 1;
const LOG_AUTH = 32;
const LOG_AUTHPRIV = 80;
const LOG_CONS = 2;
const LOG_CRIT = 1;
const LOG_CRON = 72;
const LOG_DAEMON = 24;
const LOG_DEBUG = 6;
const LOG_EMERG = 1;
const LOG_ERR = 4;
const LOG_INFO = 6;
const LOG_KERN = 0;
const LOG_LPR = 48;
const LOG_MAIL = 16;
const LOG_NDELAY = 8;
const LOG_NEWS = 56;
const LOG_NOTICE = 6;
const LOG_NOWAIT = 16;
const LOG_ODELAY = 4;
const LOG_PERROR = 32;
const LOG_PID = 1;
const LOG_SYSLOG = 40;
const LOG_USER = 8;
const LOG_UUCP = 64;
const LOG_WARNING = 5;
const M_1_PI = 0.3183098861837907;
const M_2_PI = 0.6366197723675814;
const M_2_SQRTPI = 1.1283791670955126;
const M_E = 2.718281828459045;
const M_EULER = 0.5772156649015329;
const M_LN10 = 2.302585092994046;
const M_LN2 = 0.6931471805599453;
const M_LNPI = 1.1447298858494002;
const M_LOG10E = 0.4342944819032518;
const M_LOG2E = 1.4426950408889634;
const M_PI = 3.141592653589793;
const M_PI_2 = 1.5707963267948966;
const M_PI_4 = 0.7853981633974483;
const M_SQRT1_2 = 0.7071067811865476;
const M_SQRT2 = 1.4142135623730951;
const M_SQRT3 = 1.7320508075688772;
const M_SQRTPI = 1.772453850905516;
const MT_RAND_MT19937 = 0;
const MT_RAND_PHP = 1;
const PASSWORD_ARGON2_DEFAULT_MEMORY_COST = 1024;
const PASSWORD_ARGON2_DEFAULT_THREADS = 2;
const PASSWORD_ARGON2_DEFAULT_TIME_COST = 2;
const PASSWORD_ARGON2I = 2;
const PASSWORD_BCRYPT = 1;
const PASSWORD_BCRYPT_DEFAULT_COST = 10;
const PASSWORD_DEFAULT = 1;
const PATH_SEPARATOR = ';';
const PATHINFO_BASENAME = 2;
const PATHINFO_DIRNAME = 1;
const PATHINFO_EXTENSION = 4;
const PATHINFO_FILENAME = 8;
const PHP_QUERY_RFC1738 = 1;
const PHP_QUERY_RFC3986 = 2;
const PHP_ROUND_HALF_DOWN = 2;
const PHP_ROUND_HALF_EVEN = 3;
const PHP_ROUND_HALF_ODD = 4;
const PHP_ROUND_HALF_UP = 1;
const PHP_URL_FRAGMENT = 7;
const PHP_URL_HOST = 1;
const PHP_URL_PASS = 4;
const PHP_URL_PATH = 5;
const PHP_URL_PORT = 2;
const PHP_URL_QUERY = 6;
const PHP_URL_SCHEME = 0;
const PHP_URL_USER = 3;
const PSFS_ERR_FATAL = 0;
const PSFS_FEED_ME = 1;
const PSFS_FLAG_FLUSH_CLOSE = 2;
const PSFS_FLAG_FLUSH_INC = 1;
const PSFS_FLAG_NORMAL = 0;
const PSFS_PASS_ON = 2;
const SCANDIR_SORT_ASCENDING = 0;
const SCANDIR_SORT_DESCENDING = 1;
const SCANDIR_SORT_NONE = 2;
const SEEK_CUR = 1;
const SEEK_END = 2;
const SEEK_SET = 0;
const SORT_ASC = 4;
const SORT_DESC = 3;
const SORT_FLAG_CASE = 8;
const SORT_LOCALE_STRING = 5;
const SORT_NATURAL = 6;
const SORT_NUMERIC = 1;
const SORT_REGULAR = 0;
const SORT_STRING = 2;
const STR_PAD_BOTH = 2;
const STR_PAD_LEFT = 0;
const STR_PAD_RIGHT = 1;
const STREAM_BUFFER_FULL = 2;
const STREAM_BUFFER_LINE = 1;
const STREAM_BUFFER_NONE = 0;
const STREAM_CAST_AS_STREAM = 0;
const STREAM_CAST_FOR_SELECT = 3;
const STREAM_CLIENT_ASYNC_CONNECT = 2;
const STREAM_CLIENT_CONNECT = 4;
const STREAM_CLIENT_PERSISTENT = 1;
const STREAM_CRYPTO_METHOD_ANY_CLIENT = 63;
const STREAM_CRYPTO_METHOD_ANY_SERVER = 62;
const STREAM_CRYPTO_METHOD_SSLv23_CLIENT = 57;
const STREAM_CRYPTO_METHOD_SSLv23_SERVER = 56;
const STREAM_CRYPTO_METHOD_SSLv2_CLIENT = 3;
const STREAM_CRYPTO_METHOD_SSLv2_SERVER = 2;
const STREAM_CRYPTO_METHOD_SSLv3_CLIENT = 5;
const STREAM_CRYPTO_METHOD_SSLv3_SERVER = 4;
const STREAM_CRYPTO_METHOD_TLS_CLIENT = 57;
const STREAM_CRYPTO_METHOD_TLS_SERVER = 56;
const STREAM_CRYPTO_METHOD_TLSv1_0_CLIENT = 9;
const STREAM_CRYPTO_METHOD_TLSv1_0_SERVER = 8;
const STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT = 17;
const STREAM_CRYPTO_METHOD_TLSv1_1_SERVER = 16;
const STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT = 33;
const STREAM_CRYPTO_METHOD_TLSv1_2_SERVER = 32;
const STREAM_FILTER_ALL = 3;
const STREAM_FILTER_READ = 1;
const STREAM_FILTER_WRITE = 2;
const STREAM_IGNORE_URL = 2;
const STREAM_IPPROTO_ICMP = 1;
const STREAM_IPPROTO_IP = 0;
const STREAM_IPPROTO_RAW = 255;
const STREAM_IPPROTO_TCP = 6;
const STREAM_IPPROTO_UDP = 17;
const STREAM_IS_URL = 1;
const STREAM_META_ACCESS = 6;
const STREAM_META_GROUP = 5;
const STREAM_META_GROUP_NAME = 4;
const STREAM_META_OWNER = 3;
const STREAM_META_OWNER_NAME = 2;
const STREAM_META_TOUCH = 1;
const STREAM_MKDIR_RECURSIVE = 1;
const STREAM_MUST_SEEK = 16;
const STREAM_NOTIFY_AUTH_REQUIRED = 3;
const STREAM_NOTIFY_AUTH_RESULT = 10;
const STREAM_NOTIFY_COMPLETED = 8;
const STREAM_NOTIFY_CONNECT = 2;
const STREAM_NOTIFY_FAILURE = 9;
const STREAM_NOTIFY_FILE_SIZE_IS = 5;
const STREAM_NOTIFY_MIME_TYPE_IS = 4;
const STREAM_NOTIFY_PROGRESS = 7;
const STREAM_NOTIFY_REDIRECTED = 6;
const STREAM_NOTIFY_RESOLVE = 1;
const STREAM_NOTIFY_SEVERITY_ERR = 2;
const STREAM_NOTIFY_SEVERITY_INFO = 0;
const STREAM_NOTIFY_SEVERITY_WARN = 1;
const STREAM_OOB = 1;
const STREAM_OPTION_BLOCKING = 1;
const STREAM_OPTION_READ_BUFFER = 2;
const STREAM_OPTION_READ_TIMEOUT = 4;
const STREAM_OPTION_WRITE_BUFFER = 3;
const STREAM_PEEK = 2;
const STREAM_PF_INET = 2;
const STREAM_PF_INET6 = 23;
const STREAM_PF_UNIX = 1;
const STREAM_REPORT_ERRORS = 8;
const STREAM_SERVER_BIND = 4;
const STREAM_SERVER_LISTEN = 8;
const STREAM_SHUT_RD = 0;
const STREAM_SHUT_RDWR = 2;
const STREAM_SHUT_WR = 1;
const STREAM_SOCK_DGRAM = 2;
const STREAM_SOCK_RAW = 3;
const STREAM_SOCK_RDM = 4;
const STREAM_SOCK_SEQPACKET = 5;
const STREAM_SOCK_STREAM = 1;
const STREAM_URL_STAT_LINK = 1;
const STREAM_URL_STAT_QUIET = 2;
const STREAM_USE_PATH = 1;

/**
 * @param mixed $number
 * @return number
 */
function abs($number) {}

/**
 * @param float $arg
 * @return float
 */
function acos(float $arg) : float {}

/**
 * @param float $arg
 * @return float
 */
function acosh(float $arg) : float {}

/**
 * @pure
 * @param string $str
 * @param string $charlist
 * @return string
 */
function addcslashes(string $str, string $charlist) : string {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function addslashes(string $str) : string {}

/**
 * @pure
 * @param array $array
 * @param int $case
 * @return array
 */
function array_change_key_case(array $array, int $case = CASE_LOWER) : array {}

/**
 * @pure
 * @param array $array
 * @param int $size
 * @param bool $preserve_keys
 * @return array
 */
function array_chunk(array $array, int $size, bool $preserve_keys = false) : array {}

/**
 * @pure
 * @param array $input
 * @param mixed $column_key
 * @param mixed $index_key
 * @return array
 */
function array_column(array $input, $column_key, $index_key = null) : array {}

/**
 * @pure
 * @param array $keys
 * @param array $values
 * @return array
 */
function array_combine(array $keys, array $values) : array {}

/**
 * @pure
 * @param array $array
 * @return array
 */
function array_count_values(array $array) : array {}

/**
 * @isolated Invokes `__toString` on array values if they are objects.
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_diff(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @isolated Invokes `__toString` on array values if they are objects.
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_diff_assoc(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @pure
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_diff_key(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @isolated Invokes provided callback.
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $key_compare_func
 * @return array
 */
function array_diff_uassoc(array $array1, array $array2, array ...$__variadic, callable $key_compare_func = null) : array {}

/**
 * @isolated Invokes provided callback.
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $key_compare_func
 * @return array
 */
function array_diff_ukey(array $array1, array $array2, array ...$__variadic, callable $key_compare_func = null) : array {}

/**
 * @pure
 * @param int $start_index
 * @param int $num
 * @param mixed $value
 * @return array
 */
function array_fill(int $start_index, int $num, $value) : array {}

/**
 * @pure
 * @param array $keys
 * @param mixed $value
 * @return array
 */
function array_fill_keys(array $keys, $value) : array {}

/**
 * @isolated Invokes provided callback.
 * @param array $array
 * @param callable $callback
 * @param int $flag
 * @return array
 */
function array_filter(array $array, callable $callback = null, int $flag = 0) : array {}

/**
 * @isolated Invokes `__toString` on array values if they are objects.
 * @param array $array
 * @return array
 */
function array_flip(array $array) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_intersect(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @isolated Invokes `__toString` on array values if they are objects.
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_intersect_assoc(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @pure
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_intersect_key(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @isolated Invokes provided callback.
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $key_compare_func
 * @return array
 */
function array_intersect_uassoc(array $array1, array $array2, array ...$__variadic, callable $key_compare_func = null) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $key_compare_func
 * @return array
 */
function array_intersect_ukey(array $array1, array $array2, array ...$__variadic, callable $key_compare_func = null) : array {}

/**
 * @pure
 * @param mixed $key
 * @param array $array
 * @return bool
 */
function array_key_exists($key, array $array) : bool {}

/**
 * @pure
 * @param array $array
 * @param mixed $search_value
 * @param bool $strict
 * @return array
 */
function array_keys(array $array, $search_value = null, bool $strict = false) : array {}

/**
 * @param callable $callback
 * @param array $array1
 * @param array $__variadic
 * @return array
 */
function array_map(callable $callback, array $array1, array ...$__variadic) : array {}

/**
 * @param array $array1
 * @param array $__variadic
 * @return array
 */
function array_merge(array $array1, array ...$__variadic) : array {}

/**
 * @param array $array1
 * @param array $__variadic
 * @return array
 */
function array_merge_recursive(array $array1, array ...$__variadic) : array {}

/**
 * @param array $array1
 * @param mixed $array1_sort_order
 * @param mixed $array1_sort_flags
 * @param mixed $__variadic
 * @return bool
 */
function array_multisort(array &$array1, $array1_sort_order = SORT_ASC, $array1_sort_flags = SORT_REGULAR, ...$__variadic) : bool
{
    if ($sort_flags === SORT_LOCALE_STRING) {
        /** @__isolationBreach('Depends on the current locale.') */
    }
}

/**
 * @param array $array
 * @param int $size
 * @param mixed $value
 * @return array
 */
function array_pad(array $array, int $size, $value) : array {}

/**
 * @isolated Modifies passed in array.
 * @param array $array
 * @return mixed
 */
function array_pop(array &$array) {}

/**
 * @param array $array
 * @return number
 */
function array_product(array $array) {}

/**
 * @isolated Modifies passed in array.
 * @param array $array
 * @param mixed $__variadic
 * @return int
 */
function array_push(array &$array, ...$__variadic) : int {}

/**
 * @param array $array
 * @param int $num
 * @return mixed
 */
function array_rand(array $array, int $num = 1) {}

/**
 * @param array $array
 * @param callable $callback
 * @param mixed $initial
 * @return mixed
 */
function array_reduce(array $array, callable $callback, $initial = null) {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_replace(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @return array
 */
function array_replace_recursive(array $array1, array $array2, array ...$__variadic) : array {}

/**
 * @param array $array
 * @param bool $preserve_keys
 * @return array
 */
function array_reverse(array $array, bool $preserve_keys = false) : array {}

/**
 * @param mixed $needle
 * @param array $haystack
 * @param bool $strict
 * @return mixed
 */
function array_search($needle, array $haystack, bool $strict = false) {}

/**
 * @param array $array
 * @return mixed
 */
function array_shift(array &$array) {}

/**
 * @param array $array
 * @param int $offset
 * @param int $length
 * @param bool $preserve_keys
 * @return array
 */
function array_slice(array $array, int $offset, int $length = null, bool $preserve_keys = false) : array {}

/**
 * @param array $input
 * @param int $offset
 * @param int $length
 * @param mixed $replacement
 * @return array
 */
function array_splice(array &$input, int $offset, int $length = count($input), $replacement = null) : array {}

/**
 * @param array $array
 * @return number
 */
function array_sum(array $array) {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $value_compare_func
 * @return array
 */
function array_udiff(array $array1, array $array2, array ...$__variadic, callable $value_compare_func = null) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $value_compare_func
 * @return array
 */
function array_udiff_assoc(array $array1, array $array2, array ...$__variadic, callable $value_compare_func = null) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $value_compare_func
 * @param callable $key_compare_func
 * @return array
 */
function array_udiff_uassoc(array $array1, array $array2, array ...$__variadic, callable $value_compare_func = null, callable $key_compare_func = null) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $value_compare_func
 * @return array
 */
function array_uintersect(array $array1, array $array2, array ...$__variadic, callable $value_compare_func = null) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $value_compare_func
 * @return array
 */
function array_uintersect_assoc(array $array1, array $array2, array ...$__variadic, callable $value_compare_func = null) : array {}

/**
 * @param array $array1
 * @param array $array2
 * @param array $__variadic
 * @param callable $value_compare_func
 * @param callable $key_compare_func
 * @return array
 */
function array_uintersect_uassoc(array $array1, array $array2, array ...$__variadic, callable $value_compare_func = null, callable $key_compare_func = null) : array {}

/**
 * @param array $array
 * @param int $sort_flags
 * @return array
 */
function array_unique(array $array, int $sort_flags = SORT_STRING) : array {}

/**
 * @param array $array
 * @param mixed $__variadic
 * @return int
 */
function array_unshift(array &$array, ...$__variadic) : int {}

/**
 * @pure
 * @param array $array
 * @return array
 */
function array_values(array $array) : array {}

/**
 * @isolated Invokes provided callback.
 * @param array $array
 * @param callable $callback
 * @param mixed $userdata
 * @return bool
 */
function array_walk(array &$array, callable $callback, $userdata = null) : bool {}

/**
 * @param array $array
 * @param callable $callback
 * @param mixed $userdata
 * @return bool
 */
function array_walk_recursive(array &$array, callable $callback, $userdata = null) : bool {}

/**
 * @param array $array
 * @param int $sort_flags
 * @return bool
 */
function arsort(array &$array, int $sort_flags = SORT_REGULAR) : bool
{
    if ($sort_flags === SORT_LOCALE_STRING) {
        /** @__isolationBreach('Depends on the current locale.') */
    }
}

/**
 * @param float $arg
 * @return float
 */
function asin(float $arg) : float {}

/**
 * @param float $arg
 * @return float
 */
function asinh(float $arg) : float {}

/**
 * @isolated Modifies passed in array.
 * @param array $array
 * @param int $sort_flags
 * @return bool
 */
function asort(array &$array, int $sort_flags = SORT_REGULAR) : bool
{
    if ($sort_flags === SORT_LOCALE_STRING) {
        /** @__isolationBreach('Depends on the current locale.') */
    }
}

/**
 * @param mixed $assertion
 * @param Throwable|string $exception
 * @return bool
 */
function assert($assertion, $exception = null) : bool {}

/**
 * @param int $what
 * @param mixed $value
 * @return mixed
 */
function assert_options(int $what, $value = null) {}

/**
 * @param float $arg
 * @return float
 */
function atan(float $arg) : float {}

/**
 * @param float $y
 * @param float $x
 * @return float
 */
function atan2(float $y, float $x) : float {}

/**
 * @param float $arg
 * @return float
 */
function atanh(float $arg) : float {}

/**
 * @param string $data
 * @param bool $strict
 * @return string
 */
function base64_decode(string $data, bool $strict = false) : string {}

/**
 * @param string $data
 * @return string
 */
function base64_encode(string $data) : string {}

/**
 * @param string $number
 * @param int $frombase
 * @param int $tobase
 * @return string
 */
function base_convert(string $number, int $frombase, int $tobase) : string {}

/**
 * @param string $path
 * @param string $suffix
 * @return string
 */
function basename(string $path, string $suffix = '') : string {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function bin2hex(string $str) : string {}

/**
 * @param string $binary_string
 * @return number
 */
function bindec(string $binary_string) {}

/**
 * @param mixed $var
 * @return bool
 */
function boolval($var) : bool {}

/**
 * @param callable $callback
 * @param mixed $parameter
 * @param mixed $__variadic
 * @return mixed
 */
function call_user_func(callable $callback, $parameter = null, ...$__variadic) {}

/**
 * @param callable $callback
 * @param array $param_arr
 * @return mixed
 */
function call_user_func_array(callable $callback, array $param_arr) {}

/**
 * @param float $value
 * @return float
 */
function ceil(float $value) : float {}

/**
 * @param string $directory
 * @return bool
 */
function chdir(string $directory) : bool {}

/**
 * @param string $host
 * @param string $type
 * @return bool
 */
function checkdnsrr(string $host, string $type = "MX") : bool {}

/**
 * @param string $filename
 * @param mixed $group
 * @return bool
 */
function chgrp(string $filename, $group) : bool {}

/**
 * @param string $filename
 * @param int $mode
 * @return bool
 */
function chmod(string $filename, int $mode) : bool {}

/**
 * @pure
 * @param mixed $str
 * @param mixed $character_mask
 * @return void
 */
function chop($str, $character_mask) {}

/**
 * @param string $filename
 * @param mixed $user
 * @return bool
 */
function chown(string $filename, $user) : bool {}

/**
 * @pure
 * @param int $ascii
 * @return string
 */
function chr(int $ascii) : string {}

/**
 * @pure
 * @param string $body
 * @param int $chunklen
 * @param string $end
 * @return string
 */
function chunk_split(string $body, int $chunklen = 76, string $end = "\r\n") : string {}

/**
 * @param bool $clear_realpath_cache
 * @param string $filename
 * @return void
 */
function clearstatcache(bool $clear_realpath_cache = false, string $filename = '') {}

/**
 * @return string
 */
function cli_get_process_title() : string {}

/**
 * @param string $title
 * @return bool
 */
function cli_set_process_title(string $title) : bool {}

/**
 * @param resource $dir_handle
 * @return void
 */
function closedir($dir_handle = null) {}

/**
 * @return bool
 */
function closelog() : bool {}

/**
 * @param mixed $varname1
 * @param mixed $__variadic
 * @return array
 */
function compact($varname1, ...$__variadic) : array {}

/**
 * @return int
 */
function connection_aborted() : int {}

/**
 * @return int
 */
function connection_status() : int {}

/**
 * @param string $name
 * @return mixed
 */
function constant(string $name) {}

/**
 * @pure
 * @param string $str
 * @param string $from
 * @param string $to
 * @return string
 */
function convert_cyr_string(string $str, string $from, string $to) : string {}

/**
 * @pure
 * @param string $data
 * @return string
 */
function convert_uudecode(string $data) : string {}

/**
 * @pure
 * @param string $data
 * @return string
 */
function convert_uuencode(string $data) : string {}

/**
 * @param string $source
 * @param string $dest
 * @param resource $context
 * @return bool
 */
function copy(string $source, string $dest, $context = null) : bool {}

/**
 * @param float $arg
 * @return float
 */
function cos(float $arg) : float {}

/**
 * @param float $arg
 * @return float
 */
function cosh(float $arg) : float {}

/**
 * @isolated Invokes `count` is case object is passed in.
 * @param mixed $array_or_countable
 * @param int $mode
 * @return int
 */
function count($array_or_countable, int $mode = COUNT_NORMAL) : int {}

/**
 * @pure
 * @param string $string
 * @param int $mode
 * @return mixed
 */
function count_chars(string $string, int $mode = 0) {}

/**
 * @pure
 * @param string $str
 * @return int
 */
function crc32(string $str) : int {}

/**
 * @pure
 * @param string $str
 * @param string $salt
 * @return string
 */
function crypt(string $str, string $salt = '') : string {}

/**
 * @param array $array
 * @return mixed
 */
function current(array $array) {}

/**
 * @param mixed $variable
 * @param mixed $__variadic
 * @return void
 */
function debug_zval_dump($variable, ...$__variadic) {}

/**
 * @param int $number
 * @return string
 */
function decbin(int $number) : string {}

/**
 * @param int $number
 * @return string
 */
function dechex(int $number) : string {}

/**
 * @param int $number
 * @return string
 */
function decoct(int $number) : string {}

/**
 * @param float $number
 * @return float
 */
function deg2rad(float $number) : float {}

/**
 * @param string $directory
 * @param resource $context
 * @return Directory
 */
function dir(string $directory, $context = null) : Directory {}

/**
 * @param string $path
 * @param int $levels
 * @return string
 */
function dirname(string $path, int $levels = 1) : string {}

/**
 * @param string $directory
 * @return float
 */
function disk_free_space(string $directory) : float {}

/**
 * @param string $directory
 * @return float
 */
function disk_total_space(string $directory) : float {}

/**
 * @param mixed $path
 * @return void
 */
function diskfreespace($path) {}

/**
 * @param string $library
 * @return bool
 */
function dl(string $library) : bool {}

/**
 * @param mixed $host
 * @param mixed $type
 * @return void
 */
function dns_check_record($host, $type) {}

/**
 * @param mixed $hostname
 * @param mixed $mxhosts
 * @param mixed $weight
 * @return void
 */
function dns_get_mx($hostname, $mxhosts, $weight) {}

/**
 * @param string $hostname
 * @param int $type
 * @param array $authns
 * @param array $addtl
 * @param bool $raw
 * @return array
 */
function dns_get_record(string $hostname, int $type = DNS_ANY, array &$authns = [], array &$addtl = [], bool $raw = false) : array {}

/**
 * @param mixed $var
 * @return void
 */
function doubleval($var) {}

/**
 * @param array $array
 * @return mixed
 */
function end(array &$array) {}

/**
 * @return void
 */
function error_clear_last() {}

/**
 * @return array
 */
function error_get_last() : array {}

/**
 * @param string $message
 * @param int $message_type
 * @param string $destination
 * @param string $extra_headers
 * @return bool
 */
function error_log(string $message, int $message_type = 0, string $destination = '', string $extra_headers = '') : bool {}

/**
 * @param string $arg
 * @return string
 */
function escapeshellarg(string $arg) : string {}

/**
 * @param string $command
 * @return string
 */
function escapeshellcmd(string $command) : string {}

/**
 * @param string $command
 * @param array $output
 * @param int $return_var
 * @return string
 */
function exec(string $command, array &$output = [], int &$return_var = 0) : string {}

/**
 * @param float $arg
 * @return float
 */
function exp(float $arg) : float {}

/**
 * @pure
 * @param string $delimiter
 * @param string $string
 * @param int $limit
 * @return array
 */
function explode(string $delimiter, string $string, int $limit = PHP_INT_MAX) : array {}

/**
 * @param float $arg
 * @return float
 */
function expm1(float $arg) : float {}

/**
 * @param array $array
 * @param int $flags
 * @param string $prefix
 * @return int
 */
function extract(array &$array, int $flags = EXTR_OVERWRITE, string $prefix = null) : int {}

/**
 * @param string $addr
 * @return int
 */
function ezmlm_hash(string $addr) : int {}

/**
 * @param resource $handle
 * @return bool
 */
function fclose($handle) : bool {}

/**
 * @param resource $handle
 * @return bool
 */
function feof($handle) : bool {}

/**
 * @param resource $handle
 * @return bool
 */
function fflush($handle) : bool {}

/**
 * @param resource $handle
 * @return string
 */
function fgetc($handle) : string {}

/**
 * @param resource $handle
 * @param int $length
 * @param string $delimiter
 * @param string $enclosure
 * @param string $escape
 * @return array
 */
function fgetcsv($handle, int $length = 0, string $delimiter = ",", string $enclosure = '"', string $escape = "\\") : array {}

/**
 * @param resource $handle
 * @param int $length
 * @return string
 */
function fgets($handle, int $length = 0) : string {}

/**
 * @param resource $handle
 * @param int $length
 * @param string $allowable_tags
 * @return string
 */
function fgetss($handle, int $length = 0, string $allowable_tags = '') : string {}

/**
 * @param string $filename
 * @param int $flags
 * @param resource $context
 * @return array
 */
function file(string $filename, int $flags = 0, $context = null) : array {}

/**
 * @param string $filename
 * @return bool
 */
function file_exists(string $filename) : bool {}

/**
 * @param string $filename
 * @param bool $use_include_path
 * @param resource $context
 * @param int $offset
 * @param int $maxlen
 * @return string
 */
function file_get_contents(string $filename, bool $use_include_path = false, $context = null, int $offset = 0, int $maxlen = 0) : string {}

/**
 * @param string $filename
 * @param mixed $data
 * @param int $flags
 * @param resource $context
 * @return int
 */
function file_put_contents(string $filename, $data, int $flags = 0, $context = null) : int {}

/**
 * @param string $filename
 * @return int
 */
function fileatime(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function filectime(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function filegroup(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function fileinode(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function filemtime(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function fileowner(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function fileperms(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function filesize(string $filename) : int {}

/**
 * @param string $filename
 * @return string
 */
function filetype(string $filename) : string {}

/**
 * @param mixed $var
 * @return float
 */
function floatval($var) : float {}

/**
 * @param resource $handle
 * @param int $operation
 * @param int $wouldblock
 * @return bool
 */
function flock($handle, int $operation, int &$wouldblock = 0) : bool {}

/**
 * @param float $value
 * @return float
 */
function floor(float $value) : float {}

/**
 * @return void
 */
function flush() {}

/**
 * @param float $x
 * @param float $y
 * @return float
 */
function fmod(float $x, float $y) : float {}

/**
 * @param string $pattern
 * @param string $string
 * @param int $flags
 * @return bool
 */
function fnmatch(string $pattern, string $string, int $flags = 0) : bool {}

/**
 * @param string $filename
 * @param string $mode
 * @param bool $use_include_path
 * @param resource $context
 * @return resource
 */
function fopen(string $filename, string $mode, bool $use_include_path = false, $context = null) {}

/**
 * @param callable $function
 * @param mixed $parameter
 * @param mixed $__variadic
 * @return mixed
 */
function forward_static_call(callable $function, $parameter = null, ...$__variadic) {}

/**
 * @param callable $function
 * @param array $parameters
 * @return mixed
 */
function forward_static_call_array(callable $function, array $parameters) {}

/**
 * @param resource $handle
 * @return int
 */
function fpassthru($handle) : int {}

/**
 * @isolated Pushes data to provided resource.
 * @param resource $handle
 * @param string $format
 * @param mixed $args
 * @param mixed $__variadic
 * @return int
 */
function fprintf($handle, string $format, $args = null, ...$__variadic) : int {}

/**
 * @param resource $handle
 * @param array $fields
 * @param string $delimiter
 * @param string $enclosure
 * @param string $escape_char
 * @return int
 */
function fputcsv($handle, array $fields, string $delimiter = ",", string $enclosure = '"', string $escape_char = "\\") : int {}

/**
 * @param mixed $fp
 * @param mixed $str
 * @param mixed $length
 * @return void
 */
function fputs($fp, $str, $length) {}

/**
 * @param resource $handle
 * @param int $length
 * @return string
 */
function fread($handle, int $length) : string {}

/**
 * @param resource $handle
 * @param string $format
 * @param mixed $__variadic
 * @return mixed
 */
function fscanf($handle, string $format, &...$__variadic) {}

/**
 * @param resource $handle
 * @param int $offset
 * @param int $whence
 * @return int
 */
function fseek($handle, int $offset, int $whence = SEEK_SET) : int {}

/**
 * @param string $hostname
 * @param int $port
 * @param int $errno
 * @param string $errstr
 * @param float $timeout
 * @return resource
 */
function fsockopen(string $hostname, int $port = -1, int &$errno = 0, string &$errstr = '', float $timeout = ini_get("default_socket_timeout")) {}

/**
 * @param resource $handle
 * @return array
 */
function fstat($handle) : array {}

/**
 * @param resource $handle
 * @return int
 */
function ftell($handle) : int {}

/**
 * @param string $pathname
 * @param string $proj
 * @return int
 */
function ftok(string $pathname, string $proj) : int {}

/**
 * @param resource $handle
 * @param int $size
 * @return bool
 */
function ftruncate($handle, int $size) : bool {}

/**
 * @param resource $handle
 * @param string $string
 * @param int $length
 * @return int
 */
function fwrite($handle, string $string, int $length = 0) : int {}

/**
 * @param string $user_agent
 * @param bool $return_array
 * @return mixed
 */
function get_browser(string $user_agent = '', bool $return_array = false) {}

/**
 * @param string $option
 * @return mixed
 */
function get_cfg_var(string $option) {}

/**
 * @return string
 */
function get_current_user() : string {}

/**
 * @param string $url
 * @param int $format
 * @param resource $context
 * @return array
 */
function get_headers(string $url, int $format = 0, $context = null) : array {}

/**
 * @param int $table
 * @param int $flags
 * @param string $encoding
 * @return array
 */
function get_html_translation_table(int $table = HTML_SPECIALCHARS, int $flags = ENT_COMPAT | ENT_HTML401, string $encoding = "UTF-8") : array {}

/**
 * @return string
 */
function get_include_path() : string {}

/**
 * @return bool
 */
function get_magic_quotes_gpc() : bool {}

/**
 * @return bool
 */
function get_magic_quotes_runtime() : bool {}

/**
 * @param string $filename
 * @param bool $use_include_path
 * @return array
 */
function get_meta_tags(string $filename, bool $use_include_path = false) : array {}

/**
 * @return string
 */
function getcwd() : string {}

/**
 * @param string $varname
 * @param bool $local_only
 * @return mixed
 */
function getenv(string $varname = '', bool $local_only = false) {}

/**
 * @param string $ip_address
 * @return string
 */
function gethostbyaddr(string $ip_address) : string {}

/**
 * @param string $hostname
 * @return string
 */
function gethostbyname(string $hostname) : string {}

/**
 * @param string $hostname
 * @return array
 */
function gethostbynamel(string $hostname) : array {}

/**
 * @return string
 */
function gethostname() : string {}

/**
 * @param string $filename
 * @param array $imageinfo
 * @return array
 */
function getimagesize(string $filename, array &$imageinfo = []) : array {}

/**
 * @param string $imagedata
 * @param array $imageinfo
 * @return array
 */
function getimagesizefromstring(string $imagedata, array &$imageinfo = []) : array {}

/**
 * @return int
 */
function getlastmod() : int {}

/**
 * @param string $hostname
 * @param array $mxhosts
 * @param array $weight
 * @return bool
 */
function getmxrr(string $hostname, array &$mxhosts, array &$weight = []) : bool {}

/**
 * @return int
 */
function getmygid() : int {}

/**
 * @return int
 */
function getmyinode() : int {}

/**
 * @return int
 */
function getmypid() : int {}

/**
 * @return int
 */
function getmyuid() : int {}

/**
 * @param string $options
 * @param array $longopts
 * @param int $optind
 * @return array
 */
function getopt(string $options, array $longopts = [], int &$optind = 0) : array {}

/**
 * @param string $name
 * @return int
 */
function getprotobyname(string $name) : int {}

/**
 * @param int $number
 * @return string
 */
function getprotobynumber(int $number) : string {}

/**
 * @return int
 */
function getrandmax() : int {}

/**
 * @param int $who
 * @return array
 */
function getrusage(int $who = 0) : array {}

/**
 * @param string $service
 * @param string $protocol
 * @return int
 */
function getservbyname(string $service, string $protocol) : int {}

/**
 * @param int $port
 * @param string $protocol
 * @return string
 */
function getservbyport(int $port, string $protocol) : string {}

/**
 * @param bool $return_float
 * @return mixed
 */
function gettimeofday(bool $return_float = false) {}

/**
 * @param mixed $var
 * @return string
 */
function gettype($var) : string {}

/**
 * @param string $pattern
 * @param int $flags
 * @return array
 */
function glob(string $pattern, int $flags = 0) : array {}

/**
 * @param string $header
 * @param bool $replace
 * @param int $http_response_code
 * @return void
 */
function header(string $header, bool $replace = true, int $http_response_code = 0) {}

/**
 * @param callable $callback
 * @return bool
 */
function header_register_callback(callable $callback) : bool {}

/**
 * @param string $name
 * @return void
 */
function header_remove(string $name = '') {}

/**
 * @return array
 */
function headers_list() : array {}

/**
 * @param string $file
 * @param int $line
 * @return bool
 */
function headers_sent(string &$file = '', int &$line = 0) : bool {}

/**
 * @pure
 * @param string $hebrew_text
 * @param int $max_chars_per_line
 * @return string
 */
function hebrev(string $hebrew_text, int $max_chars_per_line = 0) : string {}

/**
 * @pure
 * @param string $hebrew_text
 * @param int $max_chars_per_line
 * @return string
 */
function hebrevc(string $hebrew_text, int $max_chars_per_line = 0) : string {}

/**
 * @pure
 * @param string $data
 * @return string
 */
function hex2bin(string $data) : string {}

/**
 * @param string $hex_string
 * @return number
 */
function hexdec(string $hex_string) {}

/**
 * @param string $filename
 * @param bool $return
 * @return mixed
 */
function highlight_file(string $filename, bool $return = false) {}

/**
 * @param string $str
 * @param bool $return
 * @return mixed
 */
function highlight_string(string $str, bool $return = false) {}

/**
 * @param string $string
 * @param int $flags
 * @param string $encoding
 * @return string
 */
function html_entity_decode(string $string, int $flags = ENT_COMPAT | ENT_HTML401, string $encoding = ini_get("default_charset")) : string {}

/**
 * @param string $string
 * @param int $flags
 * @param string $encoding
 * @param bool $double_encode
 * @return string
 */
function htmlentities(string $string, int $flags = ENT_COMPAT | ENT_HTML401, string $encoding = ini_get("default_charset"), bool $double_encode = true) : string {}

/**
 * @param string $string
 * @param int $flags
 * @param string $encoding
 * @param bool $double_encode
 * @return string
 */
function htmlspecialchars(string $string, int $flags = ENT_COMPAT | ENT_HTML401, string $encoding = ini_get("default_charset"), bool $double_encode = true) : string {}

/**
 * @pure
 * @param string $string
 * @param int $flags
 * @return string
 */
function htmlspecialchars_decode(string $string, int $flags = ENT_COMPAT | ENT_HTML401) : string {}

/**
 * @param mixed $query_data
 * @param string $numeric_prefix
 * @param string $arg_separator
 * @param int $enc_type
 * @return string
 */
function http_build_query($query_data, string $numeric_prefix = '', string $arg_separator = '', int $enc_type = PHP_QUERY_RFC1738) : string {}

/**
 * @param int $response_code
 * @return mixed
 */
function http_response_code(int $response_code = 0) {}

/**
 * @param float $x
 * @param float $y
 * @return float
 */
function hypot(float $x, float $y) : float {}

/**
 * @param bool $value
 * @return int
 */
function ignore_user_abort(bool $value = false) : int {}

/**
 * @param int $imagetype
 * @param bool $include_dot
 * @return string
 */
function image_type_to_extension(int $imagetype, bool $include_dot = true) : string {}

/**
 * @param int $imagetype
 * @return string
 */
function image_type_to_mime_type(int $imagetype) : string {}

/**
 * @pure
 * @param array|string $glue
 * @param array|string $pieces
 * @return string
 */
function implode($glue, $pieces = '') : string {}

/**
 * @param mixed $needle
 * @param array $haystack
 * @param bool $strict
 * @return bool
 */
function in_array($needle, array $haystack, bool $strict = false) : bool {}

/**
 * @param string $in_addr
 * @return string
 */
function inet_ntop(string $in_addr) : string {}

/**
 * @param string $address
 * @return string
 */
function inet_pton(string $address) : string {}

/**
 * @param mixed $varname
 * @param mixed $newvalue
 * @return void
 */
function ini_alter($varname, $newvalue) {}

/**
 * @param string $varname
 * @return string
 */
function ini_get(string $varname) : string {}

/**
 * @param string $extension
 * @param bool $details
 * @return array
 */
function ini_get_all(string $extension = '', bool $details = true) : array {}

/**
 * @param string $varname
 * @return void
 */
function ini_restore(string $varname) {}

/**
 * @param string $varname
 * @param string $newvalue
 * @return string
 */
function ini_set(string $varname, string $newvalue) : string {}

/**
 * @param int $dividend
 * @param int $divisor
 * @return int
 */
function intdiv(int $dividend, int $divisor) : int {}

/**
 * @param mixed $var
 * @param int $base
 * @return int
 */
function intval($var, int $base = 10) : int {}

/**
 * @param string $ip_address
 * @return int
 */
function ip2long(string $ip_address) : int {}

/**
 * @param string $iptcdata
 * @param string $jpeg_file_name
 * @param int $spool
 * @return mixed
 */
function iptcembed(string $iptcdata, string $jpeg_file_name, int $spool = 0) {}

/**
 * @param string $iptcblock
 * @return array
 */
function iptcparse(string $iptcblock) : array {}

/**
 * @pure
 * @param mixed $var
 * @return bool
 */
function is_array($var) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_bool($var) : bool {}

/**
 * @param mixed $var
 * @param bool $syntax_only
 * @param string $callable_name
 * @return bool
 */
function is_callable($var, bool $syntax_only = false, string &$callable_name = '') : bool {}

/**
 * @param string $filename
 * @return bool
 */
function is_dir(string $filename) : bool {}

/**
 * @param mixed $var
 * @return void
 */
function is_double($var) {}

/**
 * @param string $filename
 * @return bool
 */
function is_executable(string $filename) : bool {}

/**
 * @param string $filename
 * @return bool
 */
function is_file(string $filename) : bool {}

/**
 * @param float $val
 * @return bool
 */
function is_finite(float $val) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_float($var) : bool {}

/**
 * @param float $val
 * @return bool
 */
function is_infinite(float $val) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_int($var) : bool {}

/**
 * @param mixed $var
 * @return void
 */
function is_integer($var) {}

/**
 * @param mixed $var
 * @return bool
 */
function is_iterable($var) : bool {}

/**
 * @param string $filename
 * @return bool
 */
function is_link(string $filename) : bool {}

/**
 * @param mixed $var
 * @return void
 */
function is_long($var) {}

/**
 * @param float $val
 * @return bool
 */
function is_nan(float $val) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_null($var) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_numeric($var) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_object($var) : bool {}

/**
 * @param string $filename
 * @return bool
 */
function is_readable(string $filename) : bool {}

/**
 * @param mixed $var
 * @return void
 */
function is_real($var) {}

/**
 * @param mixed $var
 * @return bool
 */
function is_resource($var) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_scalar($var) : bool {}

/**
 * @param mixed $var
 * @return bool
 */
function is_string($var) : bool {}

/**
 * @param string $filename
 * @return bool
 */
function is_uploaded_file(string $filename) : bool {}

/**
 * @param string $filename
 * @return bool
 */
function is_writable(string $filename) : bool {}

/**
 * @param mixed $filename
 * @return void
 */
function is_writeable($filename) {}

/**
 * @pure
 * @param array|string $glue
 * @param array|string $pieces
 * @return string
 */
function join($glue, $pieces = '') {}

/**
 * @pure
 * @param array $array
 * @return mixed
 */
function key(array $array) {}

/**
 * @param mixed $key
 * @param mixed $search
 * @return void
 */
function key_exists($key, $search) {}

/**
 * @param array $array
 * @param int $sort_flags
 * @return bool
 */
function krsort(array &$array, int $sort_flags = SORT_REGULAR) : bool
{
    if ($sort_flags === SORT_LOCALE_STRING) {
        /** @__isolationBreach('Depends on the current locale.') */
    }
}

/**
 * @isolated Modifies passed in array.
 * @param array $array
 * @param int $sort_flags
 * @return bool
 */
function ksort(array &$array, int $sort_flags = SORT_REGULAR) : bool
{
    if ($sort_flags === SORT_LOCALE_STRING) {
        /** @__isolationBreach('Depends on the current locale.') */
    }
}

/**
 * @pure
 * @param string $str
 * @return string
 */
function lcfirst(string $str) : string {}

/**
 * @return float
 */
function lcg_value() : float {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @param int $cost_ins
 * @param int $cost_rep
 * @param int $cost_del
 * @return int
 */
function levenshtein(string $str1, string $str2, int $cost_ins, int $cost_rep, int $cost_del) : int {}

/**
 * @param string $target
 * @param string $link
 * @return bool
 */
function link(string $target, string $link) : bool {}

/**
 * @param string $path
 * @return int
 */
function linkinfo(string $path) : int {}

/**
 * @return array
 */
function localeconv() : array {}

/**
 * @param float $arg
 * @param float $base
 * @return float
 */
function log(float $arg, float $base = M_E) : float {}

/**
 * @param float $arg
 * @return float
 */
function log10(float $arg) : float {}

/**
 * @param float $number
 * @return float
 */
function log1p(float $number) : float {}

/**
 * @param int $proper_address
 * @return string
 */
function long2ip(int $proper_address) : string {}

/**
 * @param string $filename
 * @return array
 */
function lstat(string $filename) : array {}

/**
 * @pure
 * @param string $str
 * @param string $character_mask
 * @return string
 */
function ltrim(string $str, string $character_mask = '') : string {}

/**
 * @param string $to
 * @param string $subject
 * @param string $message
 * @param mixed $additional_headers
 * @param string $additional_parameters
 * @return bool
 */
function mail(string $to, string $subject, string $message, $additional_headers = null, string $additional_parameters = '') : bool {}

/**
 * @param mixed $value1
 * @param mixed $value2
 * @param mixed $__variadic
 * @return mixed
 */
function max($value1, $value2, ...$__variadic) {}

/**
 * @pure
 * @param string $str
 * @param bool $raw_output
 * @return string
 */
function md5(string $str, bool $raw_output = false) : string {}

/**
 * @param string $filename
 * @param bool $raw_output
 * @return string
 */
function md5_file(string $filename, bool $raw_output = false) : string {}

/**
 * @param bool $real_usage
 * @return int
 */
function memory_get_peak_usage(bool $real_usage = false) : int {}

/**
 * @param bool $real_usage
 * @return int
 */
function memory_get_usage(bool $real_usage = false) : int {}

/**
 * @pure
 * @param string $str
 * @param int $phonemes
 * @return string
 */
function metaphone(string $str, int $phonemes = 0) : string {}

/**
 * @param bool $get_as_float
 * @return mixed
 */
function microtime(bool $get_as_float = false) {}

/**
 * @param mixed $value1
 * @param mixed $value2
 * @param mixed $__variadic
 * @return mixed
 */
function min($value1, $value2, ...$__variadic) {}

/**
 * @param string $pathname
 * @param int $mode
 * @param bool $recursive
 * @param resource $context
 * @return bool
 */
function mkdir(string $pathname, int $mode = 0777, bool $recursive = false, $context = null) : bool {}

/**
 * @param string $filename
 * @param string $destination
 * @return bool
 */
function move_uploaded_file(string $filename, string $destination) : bool {}

/**
 * @return int
 */
function mt_getrandmax() : int {}

/**
 * @param int $min
 * @param int $max
 * @return int
 */
function mt_rand(int $min, int $max) : int {}

/**
 * @param int $seed
 * @param int $mode
 * @return void
 */
function mt_srand(int $seed = 0, int $mode = MT_RAND_MT19937) {}

/**
 * @param array $array
 * @return bool
 */
function natcasesort(array &$array) : bool {}

/**
 * @param array $array
 * @return bool
 */
function natsort(array &$array) : bool {}

/**
 * @param array $array
 * @return mixed
 */
function next(array &$array) {}

/**
 * @pure
 * @param string $string
 * @param bool $is_xhtml
 * @return string
 */
function nl2br(string $string, bool $is_xhtml = true) : string {}

/**
 * @pure
 * @param float $number
 * @param int $decimals
 * @param string $dec_point
 * @param string $thousands_sep
 * @return string
 */
function number_format(float $number, int $decimals = 0, string $dec_point, string $thousands_sep) : string {}

/**
 * @return void
 */
function ob_clean() {}

/**
 * @return bool
 */
function ob_end_clean() : bool {}

/**
 * @return bool
 */
function ob_end_flush() : bool {}

/**
 * @return void
 */
function ob_flush() {}

/**
 * @return string
 */
function ob_get_clean() : string {}

/**
 * @return string
 */
function ob_get_contents() : string {}

/**
 * @return string
 */
function ob_get_flush() : string {}

/**
 * @return int
 */
function ob_get_length() : int {}

/**
 * @return int
 */
function ob_get_level() : int {}

/**
 * @param bool $full_status
 * @return array
 */
function ob_get_status(bool $full_status = false) : array {}

/**
 * @param int $flag
 * @return void
 */
function ob_implicit_flush(int $flag = 1) {}

/**
 * @return array
 */
function ob_list_handlers() : array {}

/**
 * @param callable $output_callback
 * @param int $chunk_size
 * @param int $flags
 * @return bool
 */
function ob_start(callable $output_callback = null, int $chunk_size = 0, int $flags = PHP_OUTPUT_HANDLER_STDFLAGS) : bool {}

/**
 * @param string $octal_string
 * @return number
 */
function octdec(string $octal_string) {}

/**
 * @param string $path
 * @param resource $context
 * @return resource
 */
function opendir(string $path, $context = null) {}

/**
 * @param string $ident
 * @param int $option
 * @param int $facility
 * @return bool
 */
function openlog(string $ident, int $option, int $facility) : bool {}

/**
 * @pure
 * @param string $string
 * @return int
 */
function ord(string $string) : int {}

/**
 * @param string $name
 * @param string $value
 * @return bool
 */
function output_add_rewrite_var(string $name, string $value) : bool {}

/**
 * @return bool
 */
function output_reset_rewrite_vars() : bool {}

/**
 * @param string $format
 * @param mixed $args
 * @param mixed $__variadic
 * @return string
 */
function pack(string $format, $args = null, ...$__variadic) : string {}

/**
 * @param string $filename
 * @param bool $process_sections
 * @param int $scanner_mode
 * @return array
 */
function parse_ini_file(string $filename, bool $process_sections = false, int $scanner_mode = INI_SCANNER_NORMAL) : array {}

/**
 * @param string $ini
 * @param bool $process_sections
 * @param int $scanner_mode
 * @return array
 */
function parse_ini_string(string $ini, bool $process_sections = false, int $scanner_mode = INI_SCANNER_NORMAL) : array {}

/**
 * @param string $encoded_string
 * @param array $result
 * @return void
 */
function parse_str(string $encoded_string, array &$result = []) {}

/**
 * @param string $url
 * @param int $component
 * @return mixed
 */
function parse_url(string $url, int $component = -1) {}

/**
 * @param string $command
 * @param int $return_var
 * @return void
 */
function passthru(string $command, int &$return_var = 0) {}

/**
 * @param string $hash
 * @return array
 */
function password_get_info(string $hash) : array {}

/**
 * @param string $password
 * @param int $algo
 * @param array $options
 * @return string
 */
function password_hash(string $password, int $algo, array $options = []) : string {}

/**
 * @param string $hash
 * @param int $algo
 * @param array $options
 * @return bool
 */
function password_needs_rehash(string $hash, int $algo, array $options = []) : bool {}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function password_verify(string $password, string $hash) : bool {}

/**
 * @param string $path
 * @param int $options
 * @return mixed
 */
function pathinfo(string $path, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME) {}

/**
 * @param resource $handle
 * @return int
 */
function pclose($handle) : int {}

/**
 * @param string $hostname
 * @param int $port
 * @param int $errno
 * @param string $errstr
 * @param float $timeout
 * @return resource
 */
function pfsockopen(string $hostname, int $port = -1, int &$errno = 0, string &$errstr = '', float $timeout = ini_get("default_socket_timeout")) {}

/**
 * @return string
 */
function php_ini_loaded_file() : string {}

/**
 * @return string
 */
function php_ini_scanned_files() : string {}

/**
 * @return string
 */
function php_sapi_name() : string {}

/**
 * @param string $filename
 * @return string
 */
function php_strip_whitespace(string $filename) : string {}

/**
 * @param string $mode
 * @return string
 */
function php_uname(string $mode = "a") : string {}

/**
 * @param int $flag
 * @return bool
 */
function phpcredits(int $flag = CREDITS_ALL) : bool {}

/**
 * @param int $what
 * @return bool
 */
function phpinfo(int $what = INFO_ALL) : bool {}

/**
 * @param string $extension
 * @return string
 */
function phpversion(string $extension = '') : string {}

/**
 * @return float
 */
function pi() : float {}

/**
 * @param string $command
 * @param string $mode
 * @return resource
 */
function popen(string $command, string $mode) {}

/**
 * @param mixed $arg
 * @return void
 */
function pos($arg) {}

/**
 * @param number $base
 * @param number $exp
 * @return number
 */
function pow($base, $exp) {}

/**
 * @param array $array
 * @return mixed
 */
function prev(array &$array) {}

/**
 * @param mixed $expression
 * @param bool $return
 * @return mixed
 */
function print_r($expression, bool $return = false) {}

/**
 * @param string $format
 * @param float|int|string $args
 * @return int
 */
function printf(string $format, ...$args) : int {}

/**
 * @param resource $process
 * @return int
 */
function proc_close($process) : int {}

/**
 * @param resource $process
 * @return array
 */
function proc_get_status($process) : array {}

/**
 * @param int $increment
 * @return bool
 */
function proc_nice(int $increment) : bool {}

/**
 * @param string $cmd
 * @param array $descriptorspec
 * @param array $pipes
 * @param string $cwd
 * @param array $env
 * @param array $other_options
 * @return resource
 */
function proc_open(string $cmd, array $descriptorspec, array &$pipes, string $cwd = '', array $env = [], array $other_options = []) {}

/**
 * @param resource $process
 * @param int $signal
 * @return bool
 */
function proc_terminate($process, int $signal = 15) : bool {}

/**
 * @param string $setting
 * @return bool
 */
function putenv(string $setting) : bool {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function quoted_printable_decode(string $str) : string {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function quoted_printable_encode(string $str) : string {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function quotemeta(string $str) : string {}

/**
 * @param float $number
 * @return float
 */
function rad2deg(float $number) : float {}

/**
 * @param int $min
 * @param int $max
 * @return int
 */
function rand(int $min, int $max) : int {}

/**
 * @param int $length
 * @return string
 */
function random_bytes(int $length) : string {}

/**
 * @param int $min
 * @param int $max
 * @return int
 */
function random_int(int $min, int $max) : int {}

/**
 * @param mixed $start
 * @param mixed $end
 * @param number $step
 * @return array
 */
function range($start, $end, $step = 1) : array {}

/**
 * @param string $str
 * @return string
 */
function rawurldecode(string $str) : string {}

/**
 * @param string $str
 * @return string
 */
function rawurlencode(string $str) : string {}

/**
 * @param resource $dir_handle
 * @return string
 */
function readdir($dir_handle = null) : string {}

/**
 * @param string $filename
 * @param bool $use_include_path
 * @param resource $context
 * @return int
 */
function readfile(string $filename, bool $use_include_path = false, $context = null) : int {}

/**
 * @param string $path
 * @return string
 */
function readlink(string $path) : string {}

/**
 * @param string $path
 * @return string
 */
function realpath(string $path) : string {}

/**
 * @return array
 */
function realpath_cache_get() : array {}

/**
 * @return int
 */
function realpath_cache_size() : int {}

/**
 * @param callable $callback
 * @param mixed $parameter
 * @param mixed $__variadic
 * @return void
 */
function register_shutdown_function(callable $callback, $parameter = null, ...$__variadic) {}

/**
 * @param callable $function
 * @param mixed $arg
 * @param mixed $__variadic
 * @return bool
 */
function register_tick_function(callable $function, $arg = null, ...$__variadic) : bool {}

/**
 * @param string $oldname
 * @param string $newname
 * @param resource $context
 * @return bool
 */
function rename(string $oldname, string $newname, $context = null) : bool {}

/**
 * @param array $array
 * @return mixed
 */
function reset(array &$array) {}

/**
 * @return void
 */
function restore_include_path() {}

/**
 * @param resource $handle
 * @return bool
 */
function rewind($handle) : bool {}

/**
 * @param resource $dir_handle
 * @return void
 */
function rewinddir($dir_handle = null) {}

/**
 * @param string $dirname
 * @param resource $context
 * @return bool
 */
function rmdir(string $dirname, $context = null) : bool {}

/**
 * @param float $val
 * @param int $precision
 * @param int $mode
 * @return float
 */
function round(float $val, int $precision = 0, int $mode = PHP_ROUND_HALF_UP) : float {}

/**
 * @param array $array
 * @param int $sort_flags
 * @return bool
 */
function rsort(array &$array, int $sort_flags = SORT_REGULAR) : bool
{
    if ($sort_flags === SORT_LOCALE_STRING) {
        /** @__isolationBreach('Depends on the current locale.') */
    }
}

/**
 * @pure
 * @param string $str
 * @param string $character_mask
 * @return string
 */
function rtrim(string $str, string $character_mask = '') : string {}

/**
 * @param int|string $in_codepage
 * @param int|string $out_codepage
 * @param string $subject
 * @return string
 */
function sapi_windows_cp_conv($in_codepage, $out_codepage, string $subject) : string {}

/**
 * @param string $kind
 * @return int
 */
function sapi_windows_cp_get(string $kind) : int {}

/**
 * @return bool
 */
function sapi_windows_cp_is_utf8() : bool {}

/**
 * @param int $cp
 * @return bool
 */
function sapi_windows_cp_set(int $cp) : bool {}

/**
 * @param mixed $stream
 * @param mixed $enable
 * @return void
 */
function sapi_windows_vt100_support($stream, $enable) {}

/**
 * @param string $directory
 * @param int $sorting_order
 * @param resource $context
 * @return array
 */
function scandir(string $directory, int $sorting_order = SCANDIR_SORT_ASCENDING, $context = null) : array {}

/**
 * @param mixed $value
 * @return string
 */
function serialize($value) : string {}

/**
 * @param mixed $fp
 * @param mixed $buffer
 * @return void
 */
function set_file_buffer($fp, $buffer) {}

/**
 * @param string $new_include_path
 * @return string
 */
function set_include_path(string $new_include_path) : string {}

/**
 * @param int $seconds
 * @return bool
 */
function set_time_limit(int $seconds) : bool {}

/**
 * @param string $name
 * @param string $value
 * @param int $expire
 * @param string $path
 * @param string $domain
 * @param bool $secure
 * @param bool $httponly
 * @return bool
 */
function setcookie(string $name, string $value = "", int $expire = 0, string $path = "", string $domain = "", bool $secure = false, bool $httponly = false) : bool {}

/**
 * @param int $category
 * @param array|string $locale
 * @param string $__variadic
 * @return string
 */
function setlocale(int $category, $locale, string ...$__variadic) : string
{
    /** @__isolationBreach('Modifies global state.') */
}

/**
 * @param string $name
 * @param string $value
 * @param int $expire
 * @param string $path
 * @param string $domain
 * @param bool $secure
 * @param bool $httponly
 * @return bool
 */
function setrawcookie(string $name, string $value = '', int $expire = 0, string $path = '', string $domain = '', bool $secure = false, bool $httponly = false) : bool {}

/**
 * @param mixed $var
 * @param string $type
 * @return bool
 */
function settype(&$var, string $type) : bool {}

/**
 * @pure
 * @param string $str
 * @param bool $raw_output
 * @return string
 */
function sha1(string $str, bool $raw_output = false) : string {}

/**
 * @param string $filename
 * @param bool $raw_output
 * @return string
 */
function sha1_file(string $filename, bool $raw_output = false) : string {}

/**
 * @param string $cmd
 * @return string
 */
function shell_exec(string $cmd) : string {}

/**
 * @param mixed $file_name
 * @param mixed $return
 * @return void
 */
function show_source($file_name, $return) {}

/**
 * @param array $array
 * @return bool
 */
function shuffle(array &$array) : bool {}

/**
 * @isolated Modifies argument value.
 * @param string $first
 * @param string $second
 * @param float $percent
 * @return int
 */
function similar_text(string $first, string $second, float &$percent = 0) : int {}

/**
 * @param float $arg
 * @return float
 */
function sin(float $arg) : float {}

/**
 * @param float $arg
 * @return float
 */
function sinh(float $arg) : float {}

/**
 * @isolated Invokes `count` is case object is passed in.
 * @param mixed $array_or_countable
 * @param int $mode
 * @return int
 */
function sizeof($array_or_countable, int $mode = COUNT_NORMAL) : int {}

/**
 * @param int $seconds
 * @return int
 */
function sleep(int $seconds) : int {}

/**
 * @param mixed $fp
 * @return void
 */
function socket_get_status($fp) {}

/**
 * @param mixed $socket
 * @param mixed $mode
 * @return void
 */
function socket_set_blocking($socket, $mode) {}

/**
 * @param mixed $stream
 * @param mixed $seconds
 * @param mixed $microseconds
 * @return void
 */
function socket_set_timeout($stream, $seconds, $microseconds) {}

/**
 * @param array $array
 * @param int $sort_flags
 * @return bool
 */
function sort(array &$array, int $sort_flags = SORT_REGULAR) : bool
{
    if ($sort_flags === SORT_LOCALE_STRING) {
        /** @__isolationBreach('Depends on the current locale.') */
    }
}

/**
 * @pure
 * @param string $str
 * @return string
 */
function soundex(string $str) : string {}

/**
 * @isolated Invokes `__toString` on array values if they are objects.
 * @param string $format
 * @param float|int|string $args
 * @return string
 */
function sprintf(string $format, ...$args) : string {}

/**
 * @param float $arg
 * @return float
 */
function sqrt(float $arg) : float {}

/**
 * @param int $seed
 * @param mixed $mode
 * @return void
 */
function srand(int $seed = 0, $mode) {}

/**
 * @param string $str
 * @param string $format
 * @param mixed $__variadic
 * @return mixed
 */
function sscanf(string $str, string $format, &...$__variadic) {}

/**
 * @param string $filename
 * @return array
 */
function stat(string $filename) : array {}

/**
 * @pure
 * @param string $input
 * @param string $delimiter
 * @param string $enclosure
 * @param string $escape
 * @return array
 */
function str_getcsv(string $input, string $delimiter = ",", string $enclosure = '"', string $escape = "\\") : array {}

/**
 * @isolated Modifies argument value.
 * @param mixed $search
 * @param mixed $replace
 * @param mixed $subject
 * @param int $count
 * @return mixed
 */
function str_ireplace($search, $replace, $subject, int &$count = 0) {}

/**
 * @pure
 * @param string $input
 * @param int $pad_length
 * @param string $pad_string
 * @param int $pad_type
 * @return string
 */
function str_pad(string $input, int $pad_length, string $pad_string = " ", int $pad_type = STR_PAD_RIGHT) : string {}

/**
 * @pure
 * @param string $input
 * @param int $multiplier
 * @return string
 */
function str_repeat(string $input, int $multiplier) : string {}

/**
 * @isolated Modifies argument value.
 * @param mixed $search
 * @param mixed $replace
 * @param mixed $subject
 * @param int $count
 * @return mixed
 */
function str_replace($search, $replace, $subject, int &$count = 0) {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function str_rot13(string $str) : string {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function str_shuffle(string $str) : string {}

/**
 * @pure
 * @param string $string
 * @param int $split_length
 * @return array
 */
function str_split(string $string, int $split_length = 1) : array {}

/**
 * @pure
 * @param string $string
 * @param int $format
 * @param string $charlist
 * @return mixed
 */
function str_word_count(string $string, int $format = 0, string $charlist = '') {}

/**
 * @pure
 * @param mixed $haystack
 * @param mixed $needle
 * @param mixed $part
 * @return void
 */
function strchr($haystack, $needle, $part) {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @return int
 */
function strcoll(string $str1, string $str2) : int {}

/**
 * @pure
 * @param string $subject
 * @param string $mask
 * @param int $start
 * @param int $length
 * @return int
 */
function strcspn(string $subject, string $mask, int $start = 0, int $length = 0) : int {}

/**
 * @param resource $brigade
 * @param object $bucket
 * @return void
 */
function stream_bucket_append($brigade, $bucket) {}

/**
 * @param resource $brigade
 * @return object
 */
function stream_bucket_make_writeable($brigade) {}

/**
 * @param resource $stream
 * @param string $buffer
 * @return object
 */
function stream_bucket_new($stream, string $buffer) {}

/**
 * @param resource $brigade
 * @param object $bucket
 * @return void
 */
function stream_bucket_prepend($brigade, $bucket) {}

/**
 * @param array $options
 * @param array $params
 * @return resource
 */
function stream_context_create(array $options = [], array $params = []) {}

/**
 * @param array $options
 * @return resource
 */
function stream_context_get_default(array $options = []) {}

/**
 * @param resource $stream_or_context
 * @return array
 */
function stream_context_get_options($stream_or_context) : array {}

/**
 * @param resource $stream_or_context
 * @return array
 */
function stream_context_get_params($stream_or_context) : array {}

/**
 * @param array $options
 * @return resource
 */
function stream_context_set_default(array $options) {}

/**
 * @param resource $stream_or_context
 * @param array $options
 * @param string $option
 * @param mixed $value
 * @return bool
 */
function stream_context_set_option($stream_or_context, array $options, string $option, $value) : bool {}

/**
 * @param resource $stream_or_context
 * @param array $params
 * @return bool
 */
function stream_context_set_params($stream_or_context, array $params) : bool {}

/**
 * @param resource $source
 * @param resource $dest
 * @param int $maxlength
 * @param int $offset
 * @return int
 */
function stream_copy_to_stream($source, $dest, int $maxlength = -1, int $offset = 0) : int {}

/**
 * @param resource $stream
 * @param string $filtername
 * @param int $read_write
 * @param mixed $params
 * @return resource
 */
function stream_filter_append($stream, string $filtername, int $read_write = 0, $params = null) {}

/**
 * @param resource $stream
 * @param string $filtername
 * @param int $read_write
 * @param mixed $params
 * @return resource
 */
function stream_filter_prepend($stream, string $filtername, int $read_write = 0, $params = null) {}

/**
 * @param string $filtername
 * @param string $classname
 * @return bool
 */
function stream_filter_register(string $filtername, string $classname) : bool {}

/**
 * @param resource $stream_filter
 * @return bool
 */
function stream_filter_remove($stream_filter) : bool {}

/**
 * @param resource $handle
 * @param int $maxlength
 * @param int $offset
 * @return string
 */
function stream_get_contents($handle, int $maxlength = -1, int $offset = -1) : string {}

/**
 * @return array
 */
function stream_get_filters() : array {}

/**
 * @param resource $handle
 * @param int $length
 * @param string $ending
 * @return string
 */
function stream_get_line($handle, int $length, string $ending = '') : string {}

/**
 * @param resource $stream
 * @return array
 */
function stream_get_meta_data($stream) : array {}

/**
 * @return array
 */
function stream_get_transports() : array {}

/**
 * @return array
 */
function stream_get_wrappers() : array {}

/**
 * @param mixed $stream_or_url
 * @return bool
 */
function stream_is_local($stream_or_url) : bool {}

/**
 * @param resource $stream
 * @return bool
 */
function stream_isatty($stream) : bool {}

/**
 * @param mixed $protocol
 * @param mixed $classname
 * @param mixed $flags
 * @return void
 */
function stream_register_wrapper($protocol, $classname, $flags) {}

/**
 * @param string $filename
 * @return string
 */
function stream_resolve_include_path(string $filename) : string {}

/**
 * @param array $read
 * @param array $write
 * @param array $except
 * @param int $tv_sec
 * @param int $tv_usec
 * @return int
 */
function stream_select(array &$read, array &$write, array &$except, int $tv_sec, int $tv_usec = 0) : int {}

/**
 * @param resource $stream
 * @param bool $mode
 * @return bool
 */
function stream_set_blocking($stream, bool $mode) : bool {}

/**
 * @param resource $fp
 * @param int $chunk_size
 * @return int
 */
function stream_set_chunk_size($fp, int $chunk_size) : int {}

/**
 * @param resource $stream
 * @param int $buffer
 * @return int
 */
function stream_set_read_buffer($stream, int $buffer) : int {}

/**
 * @param resource $stream
 * @param int $seconds
 * @param int $microseconds
 * @return bool
 */
function stream_set_timeout($stream, int $seconds, int $microseconds = 0) : bool {}

/**
 * @param resource $stream
 * @param int $buffer
 * @return int
 */
function stream_set_write_buffer($stream, int $buffer) : int {}

/**
 * @param resource $server_socket
 * @param float $timeout
 * @param string $peername
 * @return resource
 */
function stream_socket_accept($server_socket, float $timeout = ini_get("default_socket_timeout"), string &$peername = '') {}

/**
 * @param string $remote_socket
 * @param int $errno
 * @param string $errstr
 * @param float $timeout
 * @param int $flags
 * @param resource $context
 * @return resource
 */
function stream_socket_client(string $remote_socket, int &$errno = 0, string &$errstr = '', float $timeout = ini_get("default_socket_timeout"), int $flags = STREAM_CLIENT_CONNECT, $context = null) {}

/**
 * @param resource $stream
 * @param bool $enable
 * @param int $crypto_type
 * @param resource $session_stream
 * @return mixed
 */
function stream_socket_enable_crypto($stream, bool $enable, int $crypto_type = 0, $session_stream = null) {}

/**
 * @param resource $handle
 * @param bool $want_peer
 * @return string
 */
function stream_socket_get_name($handle, bool $want_peer) : string {}

/**
 * @param int $domain
 * @param int $type
 * @param int $protocol
 * @return array
 */
function stream_socket_pair(int $domain, int $type, int $protocol) : array {}

/**
 * @param resource $socket
 * @param int $length
 * @param int $flags
 * @param string $address
 * @return string
 */
function stream_socket_recvfrom($socket, int $length, int $flags = 0, string &$address = '') : string {}

/**
 * @param resource $socket
 * @param string $data
 * @param int $flags
 * @param string $address
 * @return int
 */
function stream_socket_sendto($socket, string $data, int $flags = 0, string $address = '') : int {}

/**
 * @param string $local_socket
 * @param int $errno
 * @param string $errstr
 * @param int $flags
 * @param resource $context
 * @return resource
 */
function stream_socket_server(string $local_socket, int &$errno = 0, string &$errstr = '', int $flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, $context = null) {}

/**
 * @param resource $stream
 * @param int $how
 * @return bool
 */
function stream_socket_shutdown($stream, int $how) : bool {}

/**
 * @param resource $stream
 * @return bool
 */
function stream_supports_lock($stream) : bool {}

/**
 * @param string $protocol
 * @param string $classname
 * @param int $flags
 * @return bool
 */
function stream_wrapper_register(string $protocol, string $classname, int $flags = 0) : bool {}

/**
 * @param string $protocol
 * @return bool
 */
function stream_wrapper_restore(string $protocol) : bool {}

/**
 * @param string $protocol
 * @return bool
 */
function stream_wrapper_unregister(string $protocol) : bool {}

/**
 * @pure
 * @param string $str
 * @param string $allowable_tags
 * @return string
 */
function strip_tags(string $str, string $allowable_tags = '') : string {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function stripcslashes(string $str) : string {}

/**
 * @pure
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @return int
 */
function stripos(string $haystack, string $needle, int $offset = 0) : int {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function stripslashes(string $str) : string {}

/**
 * @pure
 * @param string $haystack
 * @param mixed $needle
 * @param bool $before_needle
 * @return string
 */
function stristr(string $haystack, $needle, bool $before_needle = false) : string {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @return int
 */
function strnatcasecmp(string $str1, string $str2) : int {}

/**
 * @pure
 * @param string $str1
 * @param string $str2
 * @return int
 */
function strnatcmp(string $str1, string $str2) : int {}

/**
 * @pure
 * @param string $haystack
 * @param string $char_list
 * @return string
 */
function strpbrk(string $haystack, string $char_list) : string {}

/**
 * @pure
 * @param string $haystack
 * @param mixed $needle
 * @param int $offset
 * @return int
 */
function strpos(string $haystack, $needle, int $offset = 0) : int {}

/**
 * @pure
 * @param string $haystack
 * @param mixed $needle
 * @return string
 */
function strrchr(string $haystack, $needle) : string {}

/**
 * @pure
 * @param string $string
 * @return string
 */
function strrev(string $string) : string {}

/**
 * @pure
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @return int
 */
function strripos(string $haystack, string $needle, int $offset = 0) : int {}

/**
 * @pure
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @return int
 */
function strrpos(string $haystack, string $needle, int $offset = 0) : int {}

/**
 * @pure
 * @param string $subject
 * @param string $mask
 * @param int $start
 * @param int $length
 * @return int
 */
function strspn(string $subject, string $mask, int $start = 0, int $length = 0) : int {}

/**
 * @pure
 * @param string $haystack
 * @param mixed $needle
 * @param bool $before_needle
 * @return string
 */
function strstr(string $haystack, $needle, bool $before_needle = false) : string {}

/**
 * @pure
 * @param string $str
 * @param string $token
 * @return string
 */
function strtok(string $str, string $token = '') : string {}

/**
 * @pure
 * @param string $string
 * @return string
 */
function strtolower(string $string) : string {}

/**
 * @pure
 * @param string $string
 * @return string
 */
function strtoupper(string $string) : string {}

/**
 * @pure
 * @param string $str
 * @param array $from
 * @param string $to
 * @return string
 */
function strtr(string $str, $from, string $to = '') : string {}

/**
 * @param mixed $var
 * @return string
 */
function strval($var) : string {}

/**
 * @pure
 * @param string $string
 * @param int $start
 * @param int $length
 * @return string
 */
function substr(string $string, int $start, int $length = 0) : string {}

/**
 * @pure
 * @param string $main_str
 * @param string $str
 * @param int $offset
 * @param int $length
 * @param bool $case_insensitivity
 * @return int
 */
function substr_compare(string $main_str, string $str, int $offset, int $length = 0, bool $case_insensitivity = false) : int {}

/**
 * @pure
 * @param string $haystack
 * @param string $needle
 * @param int $offset
 * @param int $length
 * @return int
 */
function substr_count(string $haystack, string $needle, int $offset = 0, int $length = 0) : int {}

/**
 * @pure
 * @param mixed $string
 * @param mixed $replacement
 * @param mixed $start
 * @param mixed $length
 * @return mixed
 */
function substr_replace($string, $replacement, $start, $length = null) {}

/**
 * @param string $target
 * @param string $link
 * @return bool
 */
function symlink(string $target, string $link) : bool {}

/**
 * @return string
 */
function sys_get_temp_dir() : string {}

/**
 * @param int $priority
 * @param string $message
 * @return bool
 */
function syslog(int $priority, string $message) : bool {}

/**
 * @param string $command
 * @param int $return_var
 * @return string
 */
function system(string $command, int &$return_var = 0) : string {}

/**
 * @param float $arg
 * @return float
 */
function tan(float $arg) : float {}

/**
 * @param float $arg
 * @return float
 */
function tanh(float $arg) : float {}

/**
 * @param string $dir
 * @param string $prefix
 * @return string
 */
function tempnam(string $dir, string $prefix) : string {}

/**
 * @param int $seconds
 * @param int $nanoseconds
 * @return mixed
 */
function time_nanosleep(int $seconds, int $nanoseconds) {}

/**
 * @param float $timestamp
 * @return bool
 */
function time_sleep_until(float $timestamp) : bool {}

/**
 * @return resource
 */
function tmpfile() {}

/**
 * @param string $filename
 * @param int $time
 * @param int $atime
 * @return bool
 */
function touch(string $filename, int $time = 0, int $atime = 0) : bool {}

/**
 * @pure
 * @param string $str
 * @param string $character_mask
 * @return string
 */
function trim(string $str, string $character_mask = "") : string {}

/**
 * @isolated Invokes provided callback.
 * @param array $array
 * @param callable $value_compare_func
 * @return bool
 */
function uasort(array &$array, callable $value_compare_func) : bool {}

/**
 * @pure
 * @param string $str
 * @return string
 */
function ucfirst(string $str) : string {}

/**
 * @pure
 * @param string $str
 * @param string $delimiters
 * @return string
 */
function ucwords(string $str, string $delimiters = "") : string {}

/**
 * @param array $array
 * @param callable $key_compare_func
 * @return bool
 */
function uksort(array &$array, callable $key_compare_func) : bool {}

/**
 * @param int $mask
 * @return int
 */
function umask(int $mask = 0) : int {}

/**
 * @param string $prefix
 * @param bool $more_entropy
 * @return string
 */
function uniqid(string $prefix = "", bool $more_entropy = false) : string {}

/**
 * @param string $filename
 * @param resource $context
 * @return bool
 */
function unlink(string $filename, $context = null) : bool {}

/**
 * @param string $format
 * @param string $data
 * @param int $offset
 * @return array
 */
function unpack(string $format, string $data, int $offset = 0) : array {}

/**
 * @param string $function_name
 * @return void
 */
function unregister_tick_function(string $function_name) {}

/**
 * @param string $str
 * @param array $options
 * @return mixed
 */
function unserialize(string $str, array $options = []) {}

/**
 * @param string $str
 * @return string
 */
function urldecode(string $str) : string {}

/**
 * @param string $str
 * @return string
 */
function urlencode(string $str) : string {}

/**
 * @param int $micro_seconds
 * @return void
 */
function usleep(int $micro_seconds) {}

/**
 * @isolated Invokes provided callback.
 * @param array $array
 * @param callable $value_compare_func
 * @return bool
 */
function usort(array &$array, callable $value_compare_func) : bool {}

/**
 * @param string $data
 * @return string
 */
function utf8_decode(string $data) : string {}

/**
 * @param string $data
 * @return string
 */
function utf8_encode(string $data) : string {}

/**
 * @param mixed $expression
 * @param mixed $__variadic
 * @return void
 */
function var_dump($expression, ...$__variadic) {}

/**
 * @param mixed $expression
 * @param bool $return
 * @return mixed
 */
function var_export($expression, bool $return = false) {}

/**
 * @param string $version1
 * @param string $version2
 * @param string $operator
 * @return bool
 */
function version_compare(string $version1, string $version2, string $operator) : bool {}

/**
 * @isolated Pushes data to provided resource.
 * @param resource $handle
 * @param string $format
 * @param array $args
 * @return int
 */
function vfprintf($handle, string $format, array $args) : int {}

/**
 * @param string $format
 * @param array $args
 * @return int
 */
function vprintf(string $format, array $args) : int {}

/**
 * @isolated Invokes `__toString` on array values if they are objects.
 * @param string $format
 * @param array $args
 * @return string
 */
function vsprintf(string $format, array $args) : string {}

/**
 * @pure
 * @param string $str
 * @param int $width
 * @param string $break
 * @param bool $cut
 * @return string
 */
function wordwrap(string $str, int $width = 75, string $break = "\n", bool $cut = false) : string {}

class __PHP_Incomplete_Class {}

class AssertionError extends Error {}

class Directory
{
    function close($dir_handle = null) {}
    function read($dir_handle = null) : string {}
    function rewind($dir_handle = null) {}
}

class php_user_filter
{
    function filter($in, $out, int &$consumed, bool $closing) : int {}
    function onClose() {}
    function onCreate() : bool {}
}
