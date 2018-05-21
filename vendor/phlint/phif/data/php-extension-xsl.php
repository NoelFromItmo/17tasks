<?php

const LIBEXSLT_DOTTED_VERSION = '';
const LIBEXSLT_VERSION = 0;
const LIBXSLT_DOTTED_VERSION = '';
const LIBXSLT_VERSION = 0;
const XSL_CLONE_ALWAYS = 1;
const XSL_CLONE_AUTO = 0;
const XSL_CLONE_NEVER = -1;
const XSL_SECPREF_CREATE_DIRECTORY = 8;
const XSL_SECPREF_DEFAULT = 44;
const XSL_SECPREF_NONE = 0;
const XSL_SECPREF_READ_FILE = 2;
const XSL_SECPREF_READ_NETWORK = 16;
const XSL_SECPREF_WRITE_FILE = 4;
const XSL_SECPREF_WRITE_NETWORK = 32;

class XSLTProcessor
{
    function getParameter(string $namespaceURI, string $localName) : string {}
    function getSecurityPrefs() : int {}
    function hasExsltSupport() : bool {}
    function importStylesheet($stylesheet) : bool {}
    function registerPHPFunctions($restrict = null) {}
    function removeParameter(string $namespaceURI, string $localName) : bool {}
    function setParameter(string $namespace, array $options, string $value) : bool {}
    function setProfiling(string $filename) : bool {}
    function setSecurityPrefs(int $securityPrefs) : int {}
    function transformToDoc(DOMNode $doc) : DOMDocument {}
    function transformToUri(DOMDocument $doc, string $uri) : int {}
    function transformToXml($doc) : string {}
}
