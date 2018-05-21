<?php

/**
 * @param mixed $msgid
 * @return void
 */
function _($msgid) {}

/**
 * @param string $domain
 * @param string $codeset
 * @return string
 */
function bind_textdomain_codeset(string $domain, string $codeset) : string {}

/**
 * @param string $domain
 * @param string $directory
 * @return string
 */
function bindtextdomain(string $domain, string $directory) : string {}

/**
 * @param string $domain
 * @param string $message
 * @param int $category
 * @return string
 */
function dcgettext(string $domain, string $message, int $category) : string {}

/**
 * @param string $domain
 * @param string $msgid1
 * @param string $msgid2
 * @param int $n
 * @param int $category
 * @return string
 */
function dcngettext(string $domain, string $msgid1, string $msgid2, int $n, int $category) : string {}

/**
 * @param string $domain
 * @param string $message
 * @return string
 */
function dgettext(string $domain, string $message) : string {}

/**
 * @param string $domain
 * @param string $msgid1
 * @param string $msgid2
 * @param int $n
 * @return string
 */
function dngettext(string $domain, string $msgid1, string $msgid2, int $n) : string {}

/**
 * @param string $message
 * @return string
 */
function gettext(string $message) : string {}

/**
 * @param string $msgid1
 * @param string $msgid2
 * @param int $n
 * @return string
 */
function ngettext(string $msgid1, string $msgid2, int $n) : string {}

/**
 * @param string $text_domain
 * @return string
 */
function textdomain(string $text_domain) : string {}
