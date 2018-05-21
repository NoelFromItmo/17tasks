<?php

const CL_EXPUNGE = 32768;
const CP_MOVE = 2;
const CP_UID = 1;
const ENC7BIT = 0;
const ENC8BIT = 1;
const ENCBASE64 = 3;
const ENCBINARY = 2;
const ENCOTHER = 5;
const ENCQUOTEDPRINTABLE = 4;
const FT_INTERNAL = 8;
const FT_NOT = 4;
const FT_PEEK = 2;
const FT_PREFETCHTEXT = 32;
const FT_UID = 1;
const IMAP_CLOSETIMEOUT = 4;
const IMAP_GC_ELT = 1;
const IMAP_GC_ENV = 2;
const IMAP_GC_TEXTS = 4;
const IMAP_OPENTIMEOUT = 1;
const IMAP_READTIMEOUT = 2;
const IMAP_WRITETIMEOUT = 3;
const LATT_HASCHILDREN = 32;
const LATT_HASNOCHILDREN = 64;
const LATT_MARKED = 4;
const LATT_NOINFERIORS = 1;
const LATT_NOSELECT = 2;
const LATT_REFERRAL = 16;
const LATT_UNMARKED = 8;
const NIL = 0;
const OP_ANONYMOUS = 4;
const OP_DEBUG = 1;
const OP_EXPUNGE = 128;
const OP_HALFOPEN = 64;
const OP_PROTOTYPE = 32;
const OP_READONLY = 2;
const OP_SECURE = 256;
const OP_SHORTCACHE = 8;
const OP_SILENT = 16;
const SA_ALL = 31;
const SA_MESSAGES = 1;
const SA_RECENT = 2;
const SA_UIDNEXT = 8;
const SA_UIDVALIDITY = 16;
const SA_UNSEEN = 4;
const SE_FREE = 2;
const SE_NOPREFETCH = 4;
const SE_UID = 1;
const SO_FREE = 8;
const SO_NOSERVER = 16;
const SORTARRIVAL = 1;
const SORTCC = 5;
const SORTDATE = 0;
const SORTFROM = 2;
const SORTSIZE = 6;
const SORTSUBJECT = 3;
const SORTTO = 4;
const ST_SET = 4;
const ST_SILENT = 2;
const ST_UID = 1;
const TYPEAPPLICATION = 3;
const TYPEAUDIO = 4;
const TYPEIMAGE = 5;
const TYPEMESSAGE = 2;
const TYPEMODEL = 7;
const TYPEMULTIPART = 1;
const TYPEOTHER = 8;
const TYPETEXT = 0;
const TYPEVIDEO = 6;

/**
 * @param string $string
 * @return string
 */
function imap_8bit(string $string) : string {}

/**
 * @return array
 */
function imap_alerts() : array {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @param string $message
 * @param string $options
 * @param string $internal_date
 * @return bool
 */
function imap_append($imap_stream, string $mailbox, string $message, string $options = null, string $internal_date = null) : bool {}

/**
 * @param string $text
 * @return string
 */
function imap_base64(string $text) : string {}

/**
 * @param string $string
 * @return string
 */
function imap_binary(string $string) : string {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param int $options
 * @return string
 */
function imap_body($imap_stream, int $msg_number, int $options = 0) : string {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param string $section
 * @return object
 */
function imap_bodystruct($imap_stream, int $msg_number, string $section) {}

/**
 * @param resource $imap_stream
 * @return object
 */
function imap_check($imap_stream) {}

/**
 * @param resource $imap_stream
 * @param string $sequence
 * @param string $flag
 * @param int $options
 * @return bool
 */
function imap_clearflag_full($imap_stream, string $sequence, string $flag, int $options = 0) : bool {}

/**
 * @param resource $imap_stream
 * @param int $flag
 * @return bool
 */
function imap_close($imap_stream, int $flag = 0) : bool {}

/**
 * @param mixed $stream_id
 * @param mixed $mailbox
 * @return void
 */
function imap_create($stream_id, $mailbox) {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @return bool
 */
function imap_createmailbox($imap_stream, string $mailbox) : bool {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param int $options
 * @return bool
 */
function imap_delete($imap_stream, int $msg_number, int $options = 0) : bool {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @return bool
 */
function imap_deletemailbox($imap_stream, string $mailbox) : bool {}

/**
 * @return array
 */
function imap_errors() : array {}

/**
 * @param resource $imap_stream
 * @return bool
 */
function imap_expunge($imap_stream) : bool {}

/**
 * @param resource $imap_stream
 * @param string $sequence
 * @param int $options
 * @return array
 */
function imap_fetch_overview($imap_stream, string $sequence, int $options = 0) : array {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param string $section
 * @param int $options
 * @return string
 */
function imap_fetchbody($imap_stream, int $msg_number, string $section, int $options = 0) : string {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param int $options
 * @return string
 */
function imap_fetchheader($imap_stream, int $msg_number, int $options = 0) : string {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param string $section
 * @param int $options
 * @return string
 */
function imap_fetchmime($imap_stream, int $msg_number, string $section, int $options = 0) : string {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param int $options
 * @return object
 */
function imap_fetchstructure($imap_stream, int $msg_number, int $options = 0) {}

/**
 * @param mixed $stream_id
 * @param mixed $msg_no
 * @param mixed $options
 * @return void
 */
function imap_fetchtext($stream_id, $msg_no, $options) {}

/**
 * @param resource $imap_stream
 * @param int $caches
 * @return bool
 */
function imap_gc($imap_stream, int $caches) : bool {}

/**
 * @param resource $imap_stream
 * @param string $quota_root
 * @return array
 */
function imap_get_quota($imap_stream, string $quota_root) : array {}

/**
 * @param resource $imap_stream
 * @param string $quota_root
 * @return array
 */
function imap_get_quotaroot($imap_stream, string $quota_root) : array {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @return array
 */
function imap_getacl($imap_stream, string $mailbox) : array {}

/**
 * @param resource $imap_stream
 * @param string $ref
 * @param string $pattern
 * @return array
 */
function imap_getmailboxes($imap_stream, string $ref, string $pattern) : array {}

/**
 * @param resource $imap_stream
 * @param string $ref
 * @param string $pattern
 * @return array
 */
function imap_getsubscribed($imap_stream, string $ref, string $pattern) : array {}

/**
 * @param mixed $stream_id
 * @param mixed $msg_no
 * @param mixed $from_length
 * @param mixed $subject_length
 * @param mixed $default_host
 * @return void
 */
function imap_header($stream_id, $msg_no, $from_length, $subject_length, $default_host) {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param int $fromlength
 * @param int $subjectlength
 * @param string $defaulthost
 * @return object
 */
function imap_headerinfo($imap_stream, int $msg_number, int $fromlength = 0, int $subjectlength = 0, string $defaulthost = null) {}

/**
 * @param resource $imap_stream
 * @return array
 */
function imap_headers($imap_stream) : array {}

/**
 * @return string
 */
function imap_last_error() : string {}

/**
 * @param resource $imap_stream
 * @param string $ref
 * @param string $pattern
 * @return array
 */
function imap_list($imap_stream, string $ref, string $pattern) : array {}

/**
 * @param mixed $stream_id
 * @param mixed $ref
 * @param mixed $pattern
 * @return void
 */
function imap_listmailbox($stream_id, $ref, $pattern) {}

/**
 * @param resource $imap_stream
 * @param string $ref
 * @param string $pattern
 * @param string $content
 * @return array
 */
function imap_listscan($imap_stream, string $ref, string $pattern, string $content) : array {}

/**
 * @param mixed $stream_id
 * @param mixed $ref
 * @param mixed $pattern
 * @return void
 */
function imap_listsubscribed($stream_id, $ref, $pattern) {}

/**
 * @param resource $imap_stream
 * @param string $ref
 * @param string $pattern
 * @return array
 */
function imap_lsub($imap_stream, string $ref, string $pattern) : array {}

/**
 * @param string $to
 * @param string $subject
 * @param string $message
 * @param string $additional_headers
 * @param string $cc
 * @param string $bcc
 * @param string $rpath
 * @return bool
 */
function imap_mail(string $to, string $subject, string $message, string $additional_headers = null, string $cc = null, string $bcc = null, string $rpath = null) : bool {}

/**
 * @param array $envelope
 * @param array $body
 * @return string
 */
function imap_mail_compose(array $envelope, array $body) : string {}

/**
 * @param resource $imap_stream
 * @param string $msglist
 * @param string $mailbox
 * @param int $options
 * @return bool
 */
function imap_mail_copy($imap_stream, string $msglist, string $mailbox, int $options = 0) : bool {}

/**
 * @param resource $imap_stream
 * @param string $msglist
 * @param string $mailbox
 * @param int $options
 * @return bool
 */
function imap_mail_move($imap_stream, string $msglist, string $mailbox, int $options = 0) : bool {}

/**
 * @param resource $imap_stream
 * @return object
 */
function imap_mailboxmsginfo($imap_stream) {}

/**
 * @param string $text
 * @return array
 */
function imap_mime_header_decode(string $text) : array {}

/**
 * @param resource $imap_stream
 * @param int $uid
 * @return int
 */
function imap_msgno($imap_stream, int $uid) : int {}

/**
 * @param string $in
 * @return string
 */
function imap_mutf7_to_utf8(string $in) : string {}

/**
 * @param resource $imap_stream
 * @return int
 */
function imap_num_msg($imap_stream) : int {}

/**
 * @param resource $imap_stream
 * @return int
 */
function imap_num_recent($imap_stream) : int {}

/**
 * @param string $mailbox
 * @param string $username
 * @param string $password
 * @param int $options
 * @param int $n_retries
 * @param array $params
 * @return resource
 */
function imap_open(string $mailbox, string $username, string $password, int $options = 0, int $n_retries = 0, array $params = null) {}

/**
 * @param resource $imap_stream
 * @return bool
 */
function imap_ping($imap_stream) : bool {}

/**
 * @param string $string
 * @return string
 */
function imap_qprint(string $string) : string {}

/**
 * @param mixed $stream_id
 * @param mixed $old_name
 * @param mixed $new_name
 * @return void
 */
function imap_rename($stream_id, $old_name, $new_name) {}

/**
 * @param resource $imap_stream
 * @param string $old_mbox
 * @param string $new_mbox
 * @return bool
 */
function imap_renamemailbox($imap_stream, string $old_mbox, string $new_mbox) : bool {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @param int $options
 * @param int $n_retries
 * @return bool
 */
function imap_reopen($imap_stream, string $mailbox, int $options = 0, int $n_retries = 0) : bool {}

/**
 * @param string $address
 * @param string $default_host
 * @return array
 */
function imap_rfc822_parse_adrlist(string $address, string $default_host) : array {}

/**
 * @param string $headers
 * @param string $defaulthost
 * @return object
 */
function imap_rfc822_parse_headers(string $headers, string $defaulthost = "UNKNOWN") {}

/**
 * @param string $mailbox
 * @param string $host
 * @param string $personal
 * @return string
 */
function imap_rfc822_write_address(string $mailbox, string $host, string $personal) : string {}

/**
 * @param resource $imap_stream
 * @param mixed $file
 * @param int $msg_number
 * @param string $part_number
 * @param int $options
 * @return bool
 */
function imap_savebody($imap_stream, $file, int $msg_number, string $part_number = "", int $options = 0) : bool {}

/**
 * @param mixed $stream_id
 * @param mixed $ref
 * @param mixed $pattern
 * @param mixed $content
 * @return void
 */
function imap_scan($stream_id, $ref, $pattern, $content) {}

/**
 * @param mixed $stream_id
 * @param mixed $ref
 * @param mixed $pattern
 * @param mixed $content
 * @return void
 */
function imap_scanmailbox($stream_id, $ref, $pattern, $content) {}

/**
 * @param resource $imap_stream
 * @param string $criteria
 * @param int $options
 * @param string $charset
 * @return array
 */
function imap_search($imap_stream, string $criteria, int $options = SE_FREE, string $charset = null) : array {}

/**
 * @param resource $imap_stream
 * @param string $quota_root
 * @param int $quota_limit
 * @return bool
 */
function imap_set_quota($imap_stream, string $quota_root, int $quota_limit) : bool {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @param string $id
 * @param string $rights
 * @return bool
 */
function imap_setacl($imap_stream, string $mailbox, string $id, string $rights) : bool {}

/**
 * @param resource $imap_stream
 * @param string $sequence
 * @param string $flag
 * @param int $options
 * @return bool
 */
function imap_setflag_full($imap_stream, string $sequence, string $flag, int $options = NIL) : bool {}

/**
 * @param resource $imap_stream
 * @param int $criteria
 * @param int $reverse
 * @param int $options
 * @param string $search_criteria
 * @param string $charset
 * @return array
 */
function imap_sort($imap_stream, int $criteria, int $reverse, int $options = 0, string $search_criteria = null, string $charset = null) : array {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @param int $options
 * @return object
 */
function imap_status($imap_stream, string $mailbox, int $options) {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @return bool
 */
function imap_subscribe($imap_stream, string $mailbox) : bool {}

/**
 * @param resource $imap_stream
 * @param int $options
 * @return array
 */
function imap_thread($imap_stream, int $options = SE_FREE) : array {}

/**
 * @param int $timeout_type
 * @param int $timeout
 * @return mixed
 */
function imap_timeout(int $timeout_type, int $timeout = -1) {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @return int
 */
function imap_uid($imap_stream, int $msg_number) : int {}

/**
 * @param resource $imap_stream
 * @param int $msg_number
 * @param int $flags
 * @return bool
 */
function imap_undelete($imap_stream, int $msg_number, int $flags = 0) : bool {}

/**
 * @param resource $imap_stream
 * @param string $mailbox
 * @return bool
 */
function imap_unsubscribe($imap_stream, string $mailbox) : bool {}

/**
 * @param string $text
 * @return string
 */
function imap_utf7_decode(string $text) : string {}

/**
 * @param string $data
 * @return string
 */
function imap_utf7_encode(string $data) : string {}

/**
 * @param string $mime_encoded_text
 * @return string
 */
function imap_utf8(string $mime_encoded_text) : string {}

/**
 * @param string $in
 * @return string
 */
function imap_utf8_to_mutf7(string $in) : string {}
