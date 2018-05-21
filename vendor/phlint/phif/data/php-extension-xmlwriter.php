<?php

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_attribute($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_cdata($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_comment($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_document($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_dtd($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_dtd_attlist($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_dtd_element($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_dtd_entity($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_element($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_end_pi($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @param bool $empty
 * @return mixed
 */
function xmlwriter_flush($xmlwriter, bool $empty = true) {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_full_end_element($xmlwriter) : bool {}

/**
 * @return resource
 */
function xmlwriter_open_memory() {}

/**
 * @param string $uri
 * @return resource
 */
function xmlwriter_open_uri(string $uri) {}

/**
 * @param resource $xmlwriter
 * @param bool $flush
 * @return string
 */
function xmlwriter_output_memory($xmlwriter, bool $flush = true) : string {}

/**
 * @param resource $xmlwriter
 * @param bool $indent
 * @return bool
 */
function xmlwriter_set_indent($xmlwriter, bool $indent) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $indentString
 * @return bool
 */
function xmlwriter_set_indent_string($xmlwriter, string $indentString) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @return bool
 */
function xmlwriter_start_attribute($xmlwriter, string $name) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $prefix
 * @param string $name
 * @param string $uri
 * @return bool
 */
function xmlwriter_start_attribute_ns($xmlwriter, string $prefix, string $name, string $uri) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_start_cdata($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @return bool
 */
function xmlwriter_start_comment($xmlwriter) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $version
 * @param string $encoding
 * @param string $standalone
 * @return bool
 */
function xmlwriter_start_document($xmlwriter, string $version = 1.0, string $encoding = null, string $standalone = '') : bool {}

/**
 * @param resource $xmlwriter
 * @param string $qualifiedName
 * @param string $publicId
 * @param string $systemId
 * @return bool
 */
function xmlwriter_start_dtd($xmlwriter, string $qualifiedName, string $publicId = '', string $systemId = '') : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @return bool
 */
function xmlwriter_start_dtd_attlist($xmlwriter, string $name) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $qualifiedName
 * @return bool
 */
function xmlwriter_start_dtd_element($xmlwriter, string $qualifiedName) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @param bool $isparam
 * @return bool
 */
function xmlwriter_start_dtd_entity($xmlwriter, string $name, bool $isparam) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @return bool
 */
function xmlwriter_start_element($xmlwriter, string $name) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $prefix
 * @param string $name
 * @param string $uri
 * @return bool
 */
function xmlwriter_start_element_ns($xmlwriter, string $prefix, string $name, string $uri) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $target
 * @return bool
 */
function xmlwriter_start_pi($xmlwriter, string $target) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $content
 * @return bool
 */
function xmlwriter_text($xmlwriter, string $content) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @param string $value
 * @return bool
 */
function xmlwriter_write_attribute($xmlwriter, string $name, string $value) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $prefix
 * @param string $name
 * @param string $uri
 * @param string $content
 * @return bool
 */
function xmlwriter_write_attribute_ns($xmlwriter, string $prefix, string $name, string $uri, string $content) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $content
 * @return bool
 */
function xmlwriter_write_cdata($xmlwriter, string $content) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $content
 * @return bool
 */
function xmlwriter_write_comment($xmlwriter, string $content) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @param string $publicId
 * @param string $systemId
 * @param string $subset
 * @return bool
 */
function xmlwriter_write_dtd($xmlwriter, string $name, string $publicId = '', string $systemId = '', string $subset = '') : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @param string $content
 * @return bool
 */
function xmlwriter_write_dtd_attlist($xmlwriter, string $name, string $content) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @param string $content
 * @return bool
 */
function xmlwriter_write_dtd_element($xmlwriter, string $name, string $content) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @param string $content
 * @param bool $pe
 * @param string $pubid
 * @param string $sysid
 * @param string $ndataid
 * @return bool
 */
function xmlwriter_write_dtd_entity($xmlwriter, string $name, string $content, bool $pe, string $pubid, string $sysid, string $ndataid) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $name
 * @param string $content
 * @return bool
 */
function xmlwriter_write_element($xmlwriter, string $name, string $content = '') : bool {}

/**
 * @param resource $xmlwriter
 * @param string $prefix
 * @param string $name
 * @param string $uri
 * @param string $content
 * @return bool
 */
function xmlwriter_write_element_ns($xmlwriter, string $prefix, string $name, string $uri, string $content = '') : bool {}

/**
 * @param resource $xmlwriter
 * @param string $target
 * @param string $content
 * @return bool
 */
function xmlwriter_write_pi($xmlwriter, string $target, string $content) : bool {}

/**
 * @param resource $xmlwriter
 * @param string $content
 * @return bool
 */
function xmlwriter_write_raw($xmlwriter, string $content) : bool {}

class XMLWriter
{
    function endAttribute() : bool {}
    function endCdata() : bool {}
    function endComment() : bool {}
    function endDocument() : bool {}
    function endDtd() : bool {}
    function endDtdAttlist() : bool {}
    function endDtdElement() : bool {}
    function endDtdEntity() : bool {}
    function endElement() : bool {}
    function endPi() : bool {}
    function flush(bool $empty = true) {}
    function fullEndElement() : bool {}
    function openMemory() : bool {}
    function openUri(string $uri) : bool {}
    function outputMemory(bool $flush = true) : string {}
    function setIndent(bool $indent) : bool {}
    function setIndentString(string $indentString) : bool {}
    function startAttribute(string $name) : bool {}
    function startAttributeNs(string $prefix, string $name, string $uri) : bool {}
    function startCdata() : bool {}
    function startComment() : bool {}
    function startDocument(string $version = 1.0, string $encoding = null, string $standalone = '') : bool {}
    function startDtd(string $qualifiedName, string $publicId = '', string $systemId = '') : bool {}
    function startDtdAttlist(string $name) : bool {}
    function startDtdElement(string $qualifiedName) : bool {}
    function startDtdEntity(string $name, bool $isparam) : bool {}
    function startElement(string $name) : bool {}
    function startElementNs(string $prefix, string $name, string $uri) : bool {}
    function startPi(string $target) : bool {}
    function text(string $content) : bool {}
    function writeAttribute(string $name, string $value) : bool {}
    function writeAttributeNs(string $prefix, string $name, string $uri, string $content) : bool {}
    function writeCdata(string $content) : bool {}
    function writeComment(string $content) : bool {}
    function writeDtd(string $name, string $publicId = '', string $systemId = '', string $subset = '') : bool {}
    function writeDtdAttlist(string $name, string $content) : bool {}
    function writeDtdElement(string $name, string $content) : bool {}
    function writeDtdEntity(string $name, string $content, bool $pe, string $pubid, string $sysid, string $ndataid) : bool {}
    function writeElement(string $name, string $content = '') : bool {}
    function writeElementNs(string $prefix, string $name, string $uri, string $content = '') : bool {}
    function writePi(string $target, string $content) : bool {}
    function writeRaw(string $content) : bool {}
}
