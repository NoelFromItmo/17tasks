<?php

const LDAP_CONTROL_ASSERT = '1.3.6.1.1.12';
const LDAP_CONTROL_DONTUSECOPY = '1.3.6.1.1.22';
const LDAP_CONTROL_MANAGEDSAIT = '2.16.840.1.113730.3.4.2';
const LDAP_CONTROL_PAGEDRESULTS = '1.2.840.113556.1.4.319';
const LDAP_CONTROL_PASSWORDPOLICYREQUEST = '1.3.6.1.4.1.42.2.27.8.5.1';
const LDAP_CONTROL_PASSWORDPOLICYRESPONSE = '1.3.6.1.4.1.42.2.27.8.5.1';
const LDAP_CONTROL_POST_READ = '1.3.6.1.1.13.2';
const LDAP_CONTROL_PRE_READ = '1.3.6.1.1.13.1';
const LDAP_CONTROL_PROXY_AUTHZ = '2.16.840.1.113730.3.4.18';
const LDAP_CONTROL_SORTREQUEST = '1.2.840.113556.1.4.473';
const LDAP_CONTROL_SORTRESPONSE = '1.2.840.113556.1.4.474';
const LDAP_CONTROL_SUBENTRIES = '1.3.6.1.4.1.4203.1.10.1';
const LDAP_CONTROL_SYNC = '1.3.6.1.4.1.4203.1.9.1.1';
const LDAP_CONTROL_SYNC_DONE = '1.3.6.1.4.1.4203.1.9.1.3';
const LDAP_CONTROL_SYNC_STATE = '1.3.6.1.4.1.4203.1.9.1.2';
const LDAP_CONTROL_VALUESRETURNFILTER = '1.2.826.0.1.3344810.2.3';
const LDAP_CONTROL_VLVREQUEST = '2.16.840.1.113730.3.4.9';
const LDAP_CONTROL_VLVRESPONSE = '2.16.840.1.113730.3.4.10';
const LDAP_CONTROL_X_DOMAIN_SCOPE = '1.2.840.113556.1.4.1339';
const LDAP_CONTROL_X_EXTENDED_DN = '1.2.840.113556.1.4.529';
const LDAP_CONTROL_X_INCREMENTAL_VALUES = '1.2.840.113556.1.4.802';
const LDAP_CONTROL_X_PERMISSIVE_MODIFY = '1.2.840.113556.1.4.1413';
const LDAP_CONTROL_X_SEARCH_OPTIONS = '1.2.840.113556.1.4.1340';
const LDAP_CONTROL_X_TREE_DELETE = '1.2.840.113556.1.4.805';
const LDAP_DEREF_ALWAYS = 3;
const LDAP_DEREF_FINDING = 2;
const LDAP_DEREF_NEVER = 0;
const LDAP_DEREF_SEARCHING = 1;
const LDAP_ESCAPE_DN = 2;
const LDAP_ESCAPE_FILTER = 1;
const LDAP_EXOP_MODIFY_PASSWD = '1.3.6.1.4.1.4203.1.11.1';
const LDAP_EXOP_REFRESH = '1.3.6.1.4.1.1466.101.119.1';
const LDAP_EXOP_START_TLS = '1.3.6.1.4.1.1466.20037';
const LDAP_EXOP_TURN = '1.3.6.1.1.19';
const LDAP_EXOP_WHO_AM_I = '1.3.6.1.4.1.4203.1.11.3';
const LDAP_MODIFY_BATCH_ADD = 1;
const LDAP_MODIFY_BATCH_ATTRIB = 'attrib';
const LDAP_MODIFY_BATCH_MODTYPE = 'modtype';
const LDAP_MODIFY_BATCH_REMOVE = 2;
const LDAP_MODIFY_BATCH_REMOVE_ALL = 18;
const LDAP_MODIFY_BATCH_REPLACE = 3;
const LDAP_MODIFY_BATCH_VALUES = 'values';
const LDAP_OPT_CLIENT_CONTROLS = 19;
const LDAP_OPT_DEBUG_LEVEL = 20481;
const LDAP_OPT_DEREF = 2;
const LDAP_OPT_DIAGNOSTIC_MESSAGE = 50;
const LDAP_OPT_ERROR_NUMBER = 49;
const LDAP_OPT_ERROR_STRING = 50;
const LDAP_OPT_HOST_NAME = 48;
const LDAP_OPT_MATCHED_DN = 51;
const LDAP_OPT_NETWORK_TIMEOUT = 20485;
const LDAP_OPT_PROTOCOL_VERSION = 17;
const LDAP_OPT_REFERRALS = 8;
const LDAP_OPT_RESTART = 9;
const LDAP_OPT_SERVER_CONTROLS = 18;
const LDAP_OPT_SIZELIMIT = 3;
const LDAP_OPT_TIMELIMIT = 4;
const LDAP_OPT_TIMEOUT = 20482;
const LDAP_OPT_X_KEEPALIVE_IDLE = 25344;
const LDAP_OPT_X_KEEPALIVE_INTERVAL = 25346;
const LDAP_OPT_X_KEEPALIVE_PROBES = 25345;
const LDAP_OPT_X_SASL_AUTHCID = 24834;
const LDAP_OPT_X_SASL_AUTHZID = 24835;
const LDAP_OPT_X_SASL_MECH = 24832;
const LDAP_OPT_X_SASL_NOCANON = 24843;
const LDAP_OPT_X_SASL_REALM = 24833;
const LDAP_OPT_X_SASL_USERNAME = 24844;
const LDAP_OPT_X_TLS_ALLOW = 3;
const LDAP_OPT_X_TLS_CACERTDIR = 24579;
const LDAP_OPT_X_TLS_CACERTFILE = 24578;
const LDAP_OPT_X_TLS_CERTFILE = 24580;
const LDAP_OPT_X_TLS_CIPHER_SUITE = 24584;
const LDAP_OPT_X_TLS_CRL_ALL = 2;
const LDAP_OPT_X_TLS_CRL_NONE = 0;
const LDAP_OPT_X_TLS_CRL_PEER = 1;
const LDAP_OPT_X_TLS_CRLCHECK = 24587;
const LDAP_OPT_X_TLS_CRLFILE = 24592;
const LDAP_OPT_X_TLS_DEMAND = 2;
const LDAP_OPT_X_TLS_DHFILE = 24590;
const LDAP_OPT_X_TLS_HARD = 1;
const LDAP_OPT_X_TLS_KEYFILE = 24581;
const LDAP_OPT_X_TLS_NEVER = 0;
const LDAP_OPT_X_TLS_PACKAGE = 24593;
const LDAP_OPT_X_TLS_PROTOCOL_MIN = 24583;
const LDAP_OPT_X_TLS_PROTOCOL_SSL2 = 512;
const LDAP_OPT_X_TLS_PROTOCOL_SSL3 = 768;
const LDAP_OPT_X_TLS_PROTOCOL_TLS1_0 = 769;
const LDAP_OPT_X_TLS_PROTOCOL_TLS1_1 = 770;
const LDAP_OPT_X_TLS_PROTOCOL_TLS1_2 = 771;
const LDAP_OPT_X_TLS_RANDOM_FILE = 24585;
const LDAP_OPT_X_TLS_REQUIRE_CERT = 24582;
const LDAP_OPT_X_TLS_TRY = 4;

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param array $entry
 * @param array $serverctrls
 * @return bool
 */
function ldap_add($link_identifier, string $dn, array $entry, array $serverctrls = []) : bool {}

/**
 * @param resource $link_identifier
 * @param string $bind_rdn
 * @param string $bind_password
 * @return bool
 */
function ldap_bind($link_identifier, string $bind_rdn = null, string $bind_password = null) : bool {}

/**
 * @param mixed $link_identifier
 * @return void
 */
function ldap_close($link_identifier) {}

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param string $attribute
 * @param string $value
 * @param array $serverctrls
 * @return mixed
 */
function ldap_compare($link_identifier, string $dn, string $attribute, string $value, array $serverctrls = []) {}

/**
 * @param string $host
 * @param int $port
 * @return resource
 */
function ldap_connect(string $host = null, int $port = 389) {}

/**
 * @param resource $link
 * @param int $pagesize
 * @param bool $iscritical
 * @param string $cookie
 * @return bool
 */
function ldap_control_paged_result($link, int $pagesize, bool $iscritical = false, string $cookie = "") : bool {}

/**
 * @param resource $link
 * @param resource $result
 * @param string $cookie
 * @param int $estimated
 * @return bool
 */
function ldap_control_paged_result_response($link, $result, string &$cookie = '', int &$estimated = 0) : bool {}

/**
 * @param resource $link_identifier
 * @param resource $result_identifier
 * @return int
 */
function ldap_count_entries($link_identifier, $result_identifier) : int {}

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param array $serverctrls
 * @return bool
 */
function ldap_delete($link_identifier, string $dn, array $serverctrls = []) : bool {}

/**
 * @param string $dn
 * @return string
 */
function ldap_dn2ufn(string $dn) : string {}

/**
 * @param int $errno
 * @return string
 */
function ldap_err2str(int $errno) : string {}

/**
 * @param resource $link_identifier
 * @return int
 */
function ldap_errno($link_identifier) : int {}

/**
 * @param resource $link_identifier
 * @return string
 */
function ldap_error($link_identifier) : string {}

/**
 * @param string $value
 * @param string $ignore
 * @param int $flags
 * @return string
 */
function ldap_escape(string $value, string $ignore = '', int $flags = 0) : string {}

/**
 * @param resource $link
 * @param string $reqoid
 * @param string $reqdata
 * @param array $servercontrols
 * @param string $retdata
 * @param string $retoid
 * @return mixed
 */
function ldap_exop($link, string $reqoid, string $reqdata = '', array $servercontrols = [], string &$retdata = '', string &$retoid = '') {}

/**
 * @param resource $link
 * @param string $user
 * @param string $oldpw
 * @param string $newpw
 * @param array $serverctrls
 * @return mixed
 */
function ldap_exop_passwd($link, string $user = '', string $oldpw = '', string $newpw = '', array &$serverctrls = []) {}

/**
 * @param resource $link
 * @return string
 */
function ldap_exop_whoami($link) : string {}

/**
 * @param string $dn
 * @param int $with_attrib
 * @return array
 */
function ldap_explode_dn(string $dn, int $with_attrib) : array {}

/**
 * @param resource $link_identifier
 * @param resource $result_entry_identifier
 * @return string
 */
function ldap_first_attribute($link_identifier, $result_entry_identifier) : string {}

/**
 * @param resource $link_identifier
 * @param resource $result_identifier
 * @return resource
 */
function ldap_first_entry($link_identifier, $result_identifier) {}

/**
 * @param resource $link
 * @param resource $result
 * @return resource
 */
function ldap_first_reference($link, $result) {}

/**
 * @param resource $result_identifier
 * @return bool
 */
function ldap_free_result($result_identifier) : bool {}

/**
 * @param resource $link_identifier
 * @param resource $result_entry_identifier
 * @return array
 */
function ldap_get_attributes($link_identifier, $result_entry_identifier) : array {}

/**
 * @param resource $link_identifier
 * @param resource $result_entry_identifier
 * @return string
 */
function ldap_get_dn($link_identifier, $result_entry_identifier) : string {}

/**
 * @param resource $link_identifier
 * @param resource $result_identifier
 * @return array
 */
function ldap_get_entries($link_identifier, $result_identifier) : array {}

/**
 * @param resource $link_identifier
 * @param int $option
 * @param mixed $retval
 * @return bool
 */
function ldap_get_option($link_identifier, int $option, &$retval) : bool {}

/**
 * @param resource $link_identifier
 * @param resource $result_entry_identifier
 * @param string $attribute
 * @return array
 */
function ldap_get_values($link_identifier, $result_entry_identifier, string $attribute) : array {}

/**
 * @param resource $link_identifier
 * @param resource $result_entry_identifier
 * @param string $attribute
 * @return array
 */
function ldap_get_values_len($link_identifier, $result_entry_identifier, string $attribute) : array {}

/**
 * @param resource $link_identifier
 * @param string $base_dn
 * @param string $filter
 * @param array $attributes
 * @param int $attrsonly
 * @param int $sizelimit
 * @param int $timelimit
 * @param int $deref
 * @param array $serverctrls
 * @return resource
 */
function ldap_list($link_identifier, string $base_dn, string $filter, array $attributes = [], int $attrsonly = 0, int $sizelimit = 0, int $timelimit = 0, int $deref = 0, array $serverctrls = []) {}

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param array $entry
 * @param array $serverctrls
 * @return bool
 */
function ldap_mod_add($link_identifier, string $dn, array $entry, array $serverctrls = []) : bool {}

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param array $entry
 * @param array $serverctrls
 * @return bool
 */
function ldap_mod_del($link_identifier, string $dn, array $entry, array $serverctrls = []) : bool {}

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param array $entry
 * @param array $serverctrls
 * @return bool
 */
function ldap_mod_replace($link_identifier, string $dn, array $entry, array $serverctrls = []) : bool {}

/**
 * @param mixed $link_identifier
 * @param mixed $dn
 * @param mixed $entry
 * @return void
 */
function ldap_modify($link_identifier, $dn, $entry) {}

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param array $entry
 * @param array $serverctrls
 * @return bool
 */
function ldap_modify_batch($link_identifier, string $dn, array $entry, array $serverctrls = []) : bool {}

/**
 * @param resource $link_identifier
 * @param resource $result_entry_identifier
 * @return string
 */
function ldap_next_attribute($link_identifier, $result_entry_identifier) : string {}

/**
 * @param resource $link_identifier
 * @param resource $result_entry_identifier
 * @return resource
 */
function ldap_next_entry($link_identifier, $result_entry_identifier) {}

/**
 * @param resource $link
 * @param resource $entry
 * @return resource
 */
function ldap_next_reference($link, $entry) {}

/**
 * @param resource $link
 * @param resource $result
 * @param string $retdata
 * @param string $retoid
 * @return bool
 */
function ldap_parse_exop($link, $result, string &$retdata = '', string &$retoid = '') : bool {}

/**
 * @param resource $link
 * @param resource $entry
 * @param array $referrals
 * @return bool
 */
function ldap_parse_reference($link, $entry, array &$referrals) : bool {}

/**
 * @param resource $link
 * @param resource $result
 * @param int $errcode
 * @param string $matcheddn
 * @param string $errmsg
 * @param array $referrals
 * @param array $serverctrls
 * @return bool
 */
function ldap_parse_result($link, $result, int &$errcode, string &$matcheddn = '', string &$errmsg = '', array &$referrals = [], array &$serverctrls = []) : bool {}

/**
 * @param resource $link_identifier
 * @param string $base_dn
 * @param string $filter
 * @param array $attributes
 * @param int $attrsonly
 * @param int $sizelimit
 * @param int $timelimit
 * @param int $deref
 * @param array $serverctrls
 * @return resource
 */
function ldap_read($link_identifier, string $base_dn, string $filter, array $attributes = [], int $attrsonly = 0, int $sizelimit = 0, int $timelimit = 0, int $deref = 0, array $serverctrls = []) {}

/**
 * @param resource $link_identifier
 * @param string $dn
 * @param string $newrdn
 * @param string $newparent
 * @param bool $deleteoldrdn
 * @param array $serverctrls
 * @return bool
 */
function ldap_rename($link_identifier, string $dn, string $newrdn, string $newparent, bool $deleteoldrdn, array $serverctrls = []) : bool {}

/**
 * @param resource $link
 * @param string $binddn
 * @param string $password
 * @param string $sasl_mech
 * @param string $sasl_realm
 * @param string $sasl_authc_id
 * @param string $sasl_authz_id
 * @param string $props
 * @return bool
 */
function ldap_sasl_bind($link, string $binddn = null, string $password = null, string $sasl_mech = null, string $sasl_realm = null, string $sasl_authc_id = null, string $sasl_authz_id = null, string $props = null) : bool {}

/**
 * @param resource $link_identifier
 * @param string $base_dn
 * @param string $filter
 * @param array $attributes
 * @param int $attrsonly
 * @param int $sizelimit
 * @param int $timelimit
 * @param int $deref
 * @param array $serverctrls
 * @return resource
 */
function ldap_search($link_identifier, string $base_dn, string $filter, array $attributes = [], int $attrsonly = 0, int $sizelimit = 0, int $timelimit = 0, int $deref = 0, array $serverctrls = []) {}

/**
 * @param resource $link_identifier
 * @param int $option
 * @param mixed $newval
 * @return bool
 */
function ldap_set_option($link_identifier, int $option, $newval) : bool {}

/**
 * @param resource $link
 * @param resource $result
 * @param string $sortfilter
 * @return bool
 */
function ldap_sort($link, $result, string $sortfilter) : bool {}

/**
 * @param resource $link
 * @return bool
 */
function ldap_start_tls($link) : bool {}

/**
 * @param resource $link_identifier
 * @return bool
 */
function ldap_unbind($link_identifier) : bool {}
