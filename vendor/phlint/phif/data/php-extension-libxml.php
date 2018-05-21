<?php

const LIBXML_BIGLINES = 4194304;
const LIBXML_COMPACT = 65536;
const LIBXML_DOTTED_VERSION = '';
const LIBXML_DTDATTR = 8;
const LIBXML_DTDLOAD = 4;
const LIBXML_DTDVALID = 16;
const LIBXML_ERR_ERROR = 2;
const LIBXML_ERR_FATAL = 3;
const LIBXML_ERR_NONE = 0;
const LIBXML_ERR_WARNING = 1;
const LIBXML_HTML_NODEFDTD = 4;
const LIBXML_HTML_NOIMPLIED = 8192;
const LIBXML_LOADED_VERSION = '';
const LIBXML_NOBLANKS = 256;
const LIBXML_NOCDATA = 16384;
const LIBXML_NOEMPTYTAG = 4;
const LIBXML_NOENT = 2;
const LIBXML_NOERROR = 32;
const LIBXML_NONET = 2048;
const LIBXML_NOWARNING = 64;
const LIBXML_NOXMLDECL = 2;
const LIBXML_NSCLEAN = 8192;
const LIBXML_PARSEHUGE = 524288;
const LIBXML_PEDANTIC = 128;
const LIBXML_SCHEMA_CREATE = 1;
const LIBXML_VERSION = 0;
const LIBXML_XINCLUDE = 1024;

/**
 * @return void
 */
function libxml_clear_errors() {}

/**
 * @param bool $disable
 * @return bool
 */
function libxml_disable_entity_loader(bool $disable = true) : bool {}

/**
 * @return array
 */
function libxml_get_errors() : array {}

/**
 * @return LibXMLError
 */
function libxml_get_last_error() : LibXMLError {}

/**
 * @param callable $resolver_function
 * @return bool
 */
function libxml_set_external_entity_loader(callable $resolver_function) : bool {}

/**
 * @param resource $streams_context
 * @return void
 */
function libxml_set_streams_context($streams_context) {}

/**
 * @param bool $use_errors
 * @return bool
 */
function libxml_use_internal_errors(bool $use_errors = false) : bool {}

class LibXMLError {}
