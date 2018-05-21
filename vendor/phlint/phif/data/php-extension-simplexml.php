<?php

/**
 * @param DOMNode $node
 * @param string $class_name
 * @return SimpleXMLElement
 */
function simplexml_import_dom(DOMNode $node, string $class_name = "SimpleXMLElement") : SimpleXMLElement {}

/**
 * @param string $filename
 * @param string $class_name
 * @param int $options
 * @param string $ns
 * @param bool $is_prefix
 * @return SimpleXMLElement
 */
function simplexml_load_file(string $filename, string $class_name = "SimpleXMLElement", int $options = 0, string $ns = "", bool $is_prefix = false) : SimpleXMLElement {}

/**
 * @param string $data
 * @param string $class_name
 * @param int $options
 * @param string $ns
 * @param bool $is_prefix
 * @return SimpleXMLElement
 */
function simplexml_load_string(string $data, string $class_name = "SimpleXMLElement", int $options = 0, string $ns = "", bool $is_prefix = false) : SimpleXMLElement {}

class SimpleXMLElement implements Traversable
{
    function __construct() {}
    function __toString() : string {}
    function addAttribute(string $name, string $value = '', string $namespace = '') {}
    function addChild(string $name, string $value = '', string $namespace = '') : SimpleXMLElement {}
    function asXML(string $filename = '') {}
    function attributes(string $ns = null, bool $is_prefix = false) : SimpleXMLElement {}
    function children(string $ns = '', bool $is_prefix = false) : SimpleXMLElement {}
    function count() : int {}
    function getDocNamespaces(bool $recursive = false, bool $from_root = true) : array {}
    function getName() : string {}
    function getNamespaces(bool $recursive = false) : array {}
    function registerXPathNamespace(string $prefix, string $ns) : bool {}
    function saveXML() {}
    function xpath(string $path) : array {}
}

class SimpleXMLIterator extends SimpleXMLElement implements RecursiveIterator, Countable
{
    function current() {}
    function getChildren() : SimpleXMLIterator {}
    function hasChildren() : bool {}
    function key() {}
    function next() {}
    function rewind() {}
    function valid() : bool {}
}
