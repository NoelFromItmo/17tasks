<?php

/**
 * @param string $domain
 * @param string $aliasdomain
 * @return bool
 */
function vpopmail_add_alias_domain(string $domain, string $aliasdomain) : bool {}

/**
 * @param string $olddomain
 * @param string $newdomain
 * @return bool
 */
function vpopmail_add_alias_domain_ex(string $olddomain, string $newdomain) : bool {}

/**
 * @param string $domain
 * @param string $dir
 * @param int $uid
 * @param int $gid
 * @return bool
 */
function vpopmail_add_domain(string $domain, string $dir, int $uid, int $gid) : bool {}

/**
 * @param string $domain
 * @param string $passwd
 * @param string $quota
 * @param string $bounce
 * @param bool $apop
 * @return bool
 */
function vpopmail_add_domain_ex(string $domain, string $passwd, string $quota = '', string $bounce = '', bool $apop = false) : bool {}

/**
 * @param string $user
 * @param string $domain
 * @param string $password
 * @param string $gecos
 * @param bool $apop
 * @return bool
 */
function vpopmail_add_user(string $user, string $domain, string $password, string $gecos = '', bool $apop = false) : bool {}

/**
 * @param string $user
 * @param string $domain
 * @param string $alias
 * @return bool
 */
function vpopmail_alias_add(string $user, string $domain, string $alias) : bool {}

/**
 * @param string $user
 * @param string $domain
 * @return bool
 */
function vpopmail_alias_del(string $user, string $domain) : bool {}

/**
 * @param string $domain
 * @return bool
 */
function vpopmail_alias_del_domain(string $domain) : bool {}

/**
 * @param string $alias
 * @param string $domain
 * @return array
 */
function vpopmail_alias_get(string $alias, string $domain) : array {}

/**
 * @param string $domain
 * @return array
 */
function vpopmail_alias_get_all(string $domain) : array {}

/**
 * @param string $user
 * @param string $domain
 * @param string $password
 * @param string $apop
 * @return bool
 */
function vpopmail_auth_user(string $user, string $domain, string $password, string $apop = '') : bool {}

/**
 * @param string $domain
 * @return bool
 */
function vpopmail_del_domain(string $domain) : bool {}

/**
 * @param string $domain
 * @return bool
 */
function vpopmail_del_domain_ex(string $domain) : bool {}

/**
 * @param string $user
 * @param string $domain
 * @return bool
 */
function vpopmail_del_user(string $user, string $domain) : bool {}

/**
 * @return string
 */
function vpopmail_error() : string {}

/**
 * @param string $user
 * @param string $domain
 * @param string $password
 * @param bool $apop
 * @return bool
 */
function vpopmail_passwd(string $user, string $domain, string $password, bool $apop = false) : bool {}

/**
 * @param string $user
 * @param string $domain
 * @param string $quota
 * @return bool
 */
function vpopmail_set_user_quota(string $user, string $domain, string $quota) : bool {}
