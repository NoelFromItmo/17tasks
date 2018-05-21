<?php

const AF_INET = 2;
const AF_INET6 = 23;
const AF_UNIX = 1;
const AI_ADDRCONFIG = 1024;
const AI_CANONNAME = 2;
const AI_NUMERICHOST = 4;
const AI_NUMERICSERV = 8;
const AI_PASSIVE = 1;
const IP_MULTICAST_IF = 9;
const IP_MULTICAST_LOOP = 11;
const IP_MULTICAST_TTL = 10;
const IPPROTO_IP = 0;
const IPPROTO_IPV6 = 41;
const IPV6_HOPLIMIT = 21;
const IPV6_MULTICAST_HOPS = 10;
const IPV6_MULTICAST_IF = 9;
const IPV6_MULTICAST_LOOP = 11;
const IPV6_PKTINFO = 19;
const IPV6_RECVHOPLIMIT = 21;
const IPV6_RECVPKTINFO = 19;
const IPV6_RECVTCLASS = 40;
const IPV6_TCLASS = 39;
const IPV6_UNICAST_HOPS = 4;
const IPV6_V6ONLY = 27;
const MCAST_BLOCK_SOURCE = 43;
const MCAST_JOIN_GROUP = 41;
const MCAST_JOIN_SOURCE_GROUP = 45;
const MCAST_LEAVE_GROUP = 42;
const MCAST_LEAVE_SOURCE_GROUP = 46;
const MCAST_UNBLOCK_SOURCE = 44;
const MSG_CTRUNC = 512;
const MSG_DONTROUTE = 4;
const MSG_ERRQUEUE = 4096;
const MSG_OOB = 1;
const MSG_PEEK = 2;
const MSG_TRUNC = 256;
const MSG_WAITALL = 8;
const PHP_BINARY_READ = 2;
const PHP_NORMAL_READ = 1;
const SO_BROADCAST = 32;
const SO_DEBUG = 1;
const SO_DONTROUTE = 16;
const SO_ERROR = 4103;
const SO_KEEPALIVE = 8;
const SO_LINGER = 128;
const SO_OOBINLINE = 256;
const SO_RCVBUF = 4098;
const SO_RCVLOWAT = 4100;
const SO_RCVTIMEO = 4102;
const SO_REUSEADDR = 4;
const SO_SNDBUF = 4097;
const SO_SNDLOWAT = 4099;
const SO_SNDTIMEO = 4101;
const SO_TYPE = 4104;
const SOCK_DGRAM = 2;
const SOCK_RAW = 3;
const SOCK_RDM = 4;
const SOCK_SEQPACKET = 5;
const SOCK_STREAM = 1;
const SOCKET_EACCES = 10013;
const SOCKET_EADDRINUSE = 10048;
const SOCKET_EADDRNOTAVAIL = 10049;
const SOCKET_EAFNOSUPPORT = 10047;
const SOCKET_EALREADY = 10037;
const SOCKET_EBADF = 10009;
const SOCKET_ECONNABORTED = 10053;
const SOCKET_ECONNREFUSED = 10061;
const SOCKET_ECONNRESET = 10054;
const SOCKET_EDESTADDRREQ = 10039;
const SOCKET_EDISCON = 10101;
const SOCKET_EDQUOT = 10069;
const SOCKET_EFAULT = 10014;
const SOCKET_EHOSTDOWN = 10064;
const SOCKET_EHOSTUNREACH = 10065;
const SOCKET_EINPROGRESS = 10036;
const SOCKET_EINTR = 10004;
const SOCKET_EINVAL = 10022;
const SOCKET_EISCONN = 10056;
const SOCKET_ELOOP = 10062;
const SOCKET_EMFILE = 10024;
const SOCKET_EMSGSIZE = 10040;
const SOCKET_ENAMETOOLONG = 10063;
const SOCKET_ENETDOWN = 10050;
const SOCKET_ENETRESET = 10052;
const SOCKET_ENETUNREACH = 10051;
const SOCKET_ENOBUFS = 10055;
const SOCKET_ENOPROTOOPT = 10042;
const SOCKET_ENOTCONN = 10057;
const SOCKET_ENOTEMPTY = 10066;
const SOCKET_ENOTSOCK = 10038;
const SOCKET_EOPNOTSUPP = 10045;
const SOCKET_EPFNOSUPPORT = 10046;
const SOCKET_EPROCLIM = 10067;
const SOCKET_EPROTONOSUPPORT = 10043;
const SOCKET_EPROTOTYPE = 10041;
const SOCKET_EREMOTE = 10071;
const SOCKET_ESHUTDOWN = 10058;
const SOCKET_ESOCKTNOSUPPORT = 10044;
const SOCKET_ESTALE = 10070;
const SOCKET_ETIMEDOUT = 10060;
const SOCKET_ETOOMANYREFS = 10059;
const SOCKET_EUSERS = 10068;
const SOCKET_EWOULDBLOCK = 10035;
const SOCKET_HOST_NOT_FOUND = 11001;
const SOCKET_NO_ADDRESS = 11004;
const SOCKET_NO_DATA = 11004;
const SOCKET_NO_RECOVERY = 11003;
const SOCKET_NOTINITIALISED = 10093;
const SOCKET_SYSNOTREADY = 10091;
const SOCKET_TRY_AGAIN = 11002;
const SOCKET_VERNOTSUPPORTED = 10092;
const SOL_SOCKET = 65535;
const SOL_TCP = 6;
const SOL_UDP = 17;
const SOMAXCONN = 2147483647;
const TCP_NODELAY = 1;

/**
 * @param resource $socket
 * @return resource
 */
function socket_accept($socket) {}

/**
 * @param resource $addr
 * @return resource
 */
function socket_addrinfo_bind($addr) {}

/**
 * @param resource $addr
 * @return resource
 */
function socket_addrinfo_connect($addr) {}

/**
 * @param resource $addr
 * @return array
 */
function socket_addrinfo_explain($addr) : array {}

/**
 * @param string $host
 * @param string $service
 * @param array $hints
 * @return array
 */
function socket_addrinfo_lookup(string $host, string $service = '', array $hints = []) : array {}

/**
 * @param resource $socket
 * @param string $address
 * @param int $port
 * @return bool
 */
function socket_bind($socket, string $address, int $port = 0) : bool {}

/**
 * @param resource $socket
 * @return void
 */
function socket_clear_error($socket = null) {}

/**
 * @param resource $socket
 * @return void
 */
function socket_close($socket) {}

/**
 * @param int $level
 * @param int $type
 * @param int $n
 * @return int
 */
function socket_cmsg_space(int $level, int $type, int $n = 0) : int {}

/**
 * @param resource $socket
 * @param string $address
 * @param int $port
 * @return bool
 */
function socket_connect($socket, string $address, int $port = 0) : bool {}

/**
 * @param int $domain
 * @param int $type
 * @param int $protocol
 * @return resource
 */
function socket_create(int $domain, int $type, int $protocol) {}

/**
 * @param int $port
 * @param int $backlog
 * @return resource
 */
function socket_create_listen(int $port, int $backlog = 128) {}

/**
 * @param int $domain
 * @param int $type
 * @param int $protocol
 * @param array $fd
 * @return bool
 */
function socket_create_pair(int $domain, int $type, int $protocol, array &$fd) : bool {}

/**
 * @param resource $socket
 * @return resource
 */
function socket_export_stream($socket) {}

/**
 * @param resource $socket
 * @param int $level
 * @param int $optname
 * @return mixed
 */
function socket_get_option($socket, int $level, int $optname) {}

/**
 * @param mixed $socket
 * @param mixed $level
 * @param mixed $optname
 * @return void
 */
function socket_getopt($socket, $level, $optname) {}

/**
 * @param resource $socket
 * @param string $address
 * @param int $port
 * @return bool
 */
function socket_getpeername($socket, string &$address, int &$port = 0) : bool {}

/**
 * @param resource $socket
 * @param string $addr
 * @param int $port
 * @return bool
 */
function socket_getsockname($socket, string &$addr, int &$port = 0) : bool {}

/**
 * @param resource $stream
 * @return resource
 */
function socket_import_stream($stream) {}

/**
 * @param resource $socket
 * @return int
 */
function socket_last_error($socket = null) : int {}

/**
 * @param resource $socket
 * @param int $backlog
 * @return bool
 */
function socket_listen($socket, int $backlog = 0) : bool {}

/**
 * @param resource $socket
 * @param int $length
 * @param int $type
 * @return string
 */
function socket_read($socket, int $length, int $type = PHP_BINARY_READ) : string {}

/**
 * @param resource $socket
 * @param string $buf
 * @param int $len
 * @param int $flags
 * @return int
 */
function socket_recv($socket, string &$buf, int $len, int $flags) : int {}

/**
 * @param resource $socket
 * @param string $buf
 * @param int $len
 * @param int $flags
 * @param string $name
 * @param int $port
 * @return int
 */
function socket_recvfrom($socket, string &$buf, int $len, int $flags, string &$name, int &$port = 0) : int {}

/**
 * @param resource $socket
 * @param string $message
 * @param int $flags
 * @return int
 */
function socket_recvmsg($socket, string &$message, int $flags = 0) : int {}

/**
 * @param array $read
 * @param array $write
 * @param array $except
 * @param int $tv_sec
 * @param int $tv_usec
 * @return int
 */
function socket_select(array &$read, array &$write, array &$except, int $tv_sec, int $tv_usec = 0) : int {}

/**
 * @param resource $socket
 * @param string $buf
 * @param int $len
 * @param int $flags
 * @return int
 */
function socket_send($socket, string $buf, int $len, int $flags) : int {}

/**
 * @param resource $socket
 * @param array $message
 * @param int $flags
 * @return int
 */
function socket_sendmsg($socket, array $message, int $flags = 0) : int {}

/**
 * @param resource $socket
 * @param string $buf
 * @param int $len
 * @param int $flags
 * @param string $addr
 * @param int $port
 * @return int
 */
function socket_sendto($socket, string $buf, int $len, int $flags, string $addr, int $port = 0) : int {}

/**
 * @param resource $socket
 * @return bool
 */
function socket_set_block($socket) : bool {}

/**
 * @param resource $socket
 * @return bool
 */
function socket_set_nonblock($socket) : bool {}

/**
 * @param resource $socket
 * @param int $level
 * @param int $optname
 * @param mixed $optval
 * @return bool
 */
function socket_set_option($socket, int $level, int $optname, $optval) : bool {}

/**
 * @param mixed $socket
 * @param mixed $level
 * @param mixed $optname
 * @param mixed $optval
 * @return void
 */
function socket_setopt($socket, $level, $optname, $optval) {}

/**
 * @param resource $socket
 * @param int $how
 * @return bool
 */
function socket_shutdown($socket, int $how = 2) : bool {}

/**
 * @param int $errno
 * @return string
 */
function socket_strerror(int $errno) : string {}

/**
 * @param resource $socket
 * @param string $buffer
 * @param int $length
 * @return int
 */
function socket_write($socket, string $buffer, int $length = 0) : int {}
