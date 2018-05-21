<?php

class XMLReader
{
    function close() : bool {}
    function expand(DOMNode $basenode = null) : DOMNode {}
    function getAttribute(string $name) : string {}
    function getAttributeNo(int $index) : string {}
    function getAttributeNs(string $localName, string $namespaceURI) : string {}
    function getParserProperty(int $property) : bool {}
    function isValid() : bool {}
    function lookupNamespace(string $prefix) : string {}
    function moveToAttribute(string $name) : bool {}
    function moveToAttributeNo(int $index) : bool {}
    function moveToAttributeNs(string $localName, string $namespaceURI) : bool {}
    function moveToElement() : bool {}
    function moveToFirstAttribute() : bool {}
    function moveToNextAttribute() : bool {}
    function next(string $localname = '') : bool {}
    function open(string $URI, string $encoding = '', int $options = 0) : bool {}
    function read() : bool {}
    function readInnerXml() : string {}
    function readOuterXml() : string {}
    function readString() : string {}
    function setParserProperty(int $property, bool $value) : bool {}
    function setRelaxNGSchema(string $filename) : bool {}
    function setRelaxNGSchemaSource(string $source) : bool {}
    function setSchema(string $filename) : bool {}
    function XML(string $source, string $encoding = '', int $options = 0) : bool {}
}
