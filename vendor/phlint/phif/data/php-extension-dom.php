<?php

const DOM_HIERARCHY_REQUEST_ERR = 3;
const DOM_INDEX_SIZE_ERR = 1;
const DOM_INUSE_ATTRIBUTE_ERR = 10;
const DOM_INVALID_ACCESS_ERR = 15;
const DOM_INVALID_CHARACTER_ERR = 5;
const DOM_INVALID_MODIFICATION_ERR = 13;
const DOM_INVALID_STATE_ERR = 11;
const DOM_NAMESPACE_ERR = 14;
const DOM_NO_DATA_ALLOWED_ERR = 6;
const DOM_NO_MODIFICATION_ALLOWED_ERR = 7;
const DOM_NOT_FOUND_ERR = 8;
const DOM_NOT_SUPPORTED_ERR = 9;
const DOM_PHP_ERR = 0;
const DOM_SYNTAX_ERR = 12;
const DOM_VALIDATION_ERR = 16;
const DOM_WRONG_DOCUMENT_ERR = 4;
const DOMSTRING_SIZE_ERR = 2;
const XML_ATTRIBUTE_CDATA = 1;
const XML_ATTRIBUTE_DECL_NODE = 16;
const XML_ATTRIBUTE_ENTITY = 6;
const XML_ATTRIBUTE_ENUMERATION = 9;
const XML_ATTRIBUTE_ID = 2;
const XML_ATTRIBUTE_IDREF = 3;
const XML_ATTRIBUTE_IDREFS = 4;
const XML_ATTRIBUTE_NMTOKEN = 7;
const XML_ATTRIBUTE_NMTOKENS = 8;
const XML_ATTRIBUTE_NODE = 2;
const XML_ATTRIBUTE_NOTATION = 10;
const XML_CDATA_SECTION_NODE = 4;
const XML_COMMENT_NODE = 8;
const XML_DOCUMENT_FRAG_NODE = 11;
const XML_DOCUMENT_NODE = 9;
const XML_DOCUMENT_TYPE_NODE = 10;
const XML_DTD_NODE = 14;
const XML_ELEMENT_DECL_NODE = 15;
const XML_ELEMENT_NODE = 1;
const XML_ENTITY_DECL_NODE = 17;
const XML_ENTITY_NODE = 6;
const XML_ENTITY_REF_NODE = 5;
const XML_HTML_DOCUMENT_NODE = 13;
const XML_LOCAL_NAMESPACE = 18;
const XML_NAMESPACE_DECL_NODE = 18;
const XML_NOTATION_NODE = 12;
const XML_PI_NODE = 7;
const XML_TEXT_NODE = 3;

/**
 * @param SimpleXMLElement $node
 * @return DOMElement
 */
function dom_import_simplexml(SimpleXMLElement $node) : DOMElement {}

class DOMAttr extends DOMNode
{
    function __construct(string $name, string $value = '') {}
    function isId() : bool {}
}

class DOMCdataSection extends DOMText
{
    function __construct() {}
}

class DOMCharacterData extends DOMNode
{
    function appendData(string $data) {}
    function deleteData(int $offset, int $count) {}
    function insertData(int $offset, string $data) {}
    function replaceData(int $offset, int $count, string $data) {}
    function substringData(int $offset, int $count) : string {}
}

class DOMComment extends DOMCharacterData
{
    function __construct(string $value = '') {}
}

class DOMConfiguration
{
    function canSetParameter() {}
    function getParameter() {}
    function setParameter() {}
}

class DOMDocument extends DOMNode
{
    function __construct(string $version = '', string $encoding = '') {}
    function adoptNode() {}
    function createAttribute(string $name) : DOMAttr {}
    function createAttributeNS(string $namespaceURI, string $qualifiedName) : DOMAttr {}
    function createCDATASection(string $data) : DOMCDATASection {}
    function createComment(string $data) : DOMComment {}
    function createDocumentFragment() : DOMDocumentFragment {}
    function createElement(string $name, string $value = '') : DOMElement {}
    function createElementNS(string $namespaceURI, string $qualifiedName, string $value = '') : DOMElement {}
    function createEntityReference(string $name) : DOMEntityReference {}
    function createProcessingInstruction(string $target, string $data = '') : DOMProcessingInstruction {}
    function createTextNode(string $content) : DOMText {}
    function getElementById(string $elementId) : DOMElement {}
    function getElementsByTagName(string $name) : DOMNodeList {}
    function getElementsByTagNameNS(string $namespaceURI, string $localName) : DOMNodeList {}
    function importNode(DOMNode $importedNode, bool $deep = false) : DOMNode {}
    function load(string $filename, int $options = 0) {}
    function loadHTML(string $source, int $options = 0) : bool {}
    function loadHTMLFile(string $filename, int $options = 0) : bool {}
    function loadXML(string $source, int $options = 0) {}
    function normalizeDocument() {}
    function registerNodeClass(string $baseclass, string $extendedclass) : bool {}
    function relaxNGValidate(string $filename) : bool {}
    function relaxNGValidateSource(string $source) : bool {}
    function renameNode() {}
    function save(string $filename, int $options = 0) : int {}
    function saveHTML(DOMNode $node = null) : string {}
    function saveHTMLFile(string $filename) : int {}
    function saveXML(DOMNode $node = null, int $options = 0) : string {}
    function schemaValidate(string $filename, int $flags = 0) : bool {}
    function schemaValidateSource(string $source, int $flags = 0) : bool {}
    function validate() : bool {}
    function xinclude(int $options = 0) : int {}
}

class DOMDocumentFragment extends DOMNode
{
    function __construct() {}
    function appendXML(string $data) : bool {}
}

class DOMDocumentType extends DOMNode {}

class DOMDomError {}

class DOMElement extends DOMNode
{
    function __construct(string $name, string $value = '', string $namespaceURI = '') {}
    function getAttribute(string $name) : string {}
    function getAttributeNode(string $name) : DOMAttr {}
    function getAttributeNodeNS(string $namespaceURI, string $localName) : DOMAttr {}
    function getAttributeNS(string $namespaceURI, string $localName) : string {}
    function getElementsByTagName(string $name) : DOMNodeList {}
    function getElementsByTagNameNS(string $namespaceURI, string $localName) : DOMNodeList {}
    function hasAttribute(string $name) : bool {}
    function hasAttributeNS(string $namespaceURI, string $localName) : bool {}
    function removeAttribute(string $name) : bool {}
    function removeAttributeNode(DOMAttr $oldnode) : bool {}
    function removeAttributeNS(string $namespaceURI, string $localName) : bool {}
    function setAttribute(string $name, string $value) : DOMAttr {}
    function setAttributeNode(DOMAttr $attr) : DOMAttr {}
    function setAttributeNodeNS(DOMAttr $attr) : DOMAttr {}
    function setAttributeNS(string $namespaceURI, string $qualifiedName, string $value) {}
    function setIdAttribute(string $name, bool $isId) {}
    function setIdAttributeNode(DOMAttr $attr, bool $isId) {}
    function setIdAttributeNS(string $namespaceURI, string $localName, bool $isId) {}
}

class DOMEntity extends DOMNode {}

class DOMEntityReference extends DOMNode
{
    function __construct(string $name) {}
}

class DOMErrorHandler
{
    function handleError() {}
}

class DOMException extends Exception {}

class DOMImplementation
{
    function __construct() {}
    function createDocument(string $namespaceURI = null, string $qualifiedName = null, DOMDocumentType $doctype = null) : DOMDocument {}
    function createDocumentType(string $qualifiedName = null, string $publicId = null, string $systemId = null) : DOMDocumentType {}
    function getFeature() {}
    function hasFeature(string $feature, string $version) : bool {}
}

class DOMImplementationList
{
    function item() {}
}

class DOMImplementationSource
{
    function getDomimplementation() {}
    function getDomimplementations() {}
}

class DOMLocator {}

class DOMNamedNodeMap implements Traversable, Countable
{
    function count() {}
    function getNamedItem(string $name) : DOMNode {}
    function getNamedItemNS(string $namespaceURI, string $localName) : DOMNode {}
    function item(int $index) : DOMNode {}
    function removeNamedItem() {}
    function removeNamedItemNS() {}
    function setNamedItem() {}
    function setNamedItemNS() {}
}

class DOMNameList
{
    function getName() {}
    function getNamespaceURI() {}
}

class DOMNameSpaceNode {}

class DOMNode
{
    function appendChild(DOMNode $newnode) : DOMNode {}
    function C14N(bool $exclusive = false, bool $with_comments = false, array $xpath = [], array $ns_prefixes = []) : string {}
    function C14NFile(string $uri, bool $exclusive = false, bool $with_comments = false, array $xpath = [], array $ns_prefixes = []) : int {}
    function cloneNode(bool $deep = false) : DOMNode {}
    function compareDocumentPosition() {}
    function getFeature() {}
    function getLineNo() : int {}
    function getNodePath() : string {}
    function getUserData() {}
    function hasAttributes() : bool {}
    function hasChildNodes() : bool {}
    function insertBefore(DOMNode $newnode, DOMNode $refnode = null) : DOMNode {}
    function isDefaultNamespace(string $namespaceURI) : bool {}
    function isEqualNode() {}
    function isSameNode(DOMNode $node) : bool {}
    function isSupported(string $feature, string $version) : bool {}
    function lookupNamespaceUri(string $prefix) : string {}
    function lookupPrefix(string $namespaceURI) : string {}
    function normalize() {}
    function removeChild(DOMNode $oldnode) : DOMNode {}
    function replaceChild(DOMNode $newnode, DOMNode $oldnode) : DOMNode {}
    function setUserData() {}
}

class DOMNodeList implements Traversable, Countable
{
    function count() : int {}
    function item(int $index) : DOMNode {}
}

class DOMNotation extends DOMNode {}

class DOMProcessingInstruction extends DOMNode
{
    function __construct(string $name, string $value = '') {}
}

class DOMStringExtend
{
    function findOffset16() {}
    function findOffset32() {}
}

class DOMStringList
{
    function item() {}
}

class DOMText extends DOMCharacterData
{
    function __construct() {}
    function isElementContentWhitespace() : bool {}
    function isWhitespaceInElementContent() : bool {}
    function replaceWholeText() {}
    function splitText(int $offset) : DOMText {}
}

class DOMTypeinfo {}

class DOMUserDataHandler
{
    function handle() {}
}

class DOMXPath
{
    function __construct(DOMDocument $doc) {}
    function evaluate(string $expression, DOMNode $contextnode = null, bool $registerNodeNS = true) {}
    function query(string $expression, DOMNode $contextnode = null, bool $registerNodeNS = true) : DOMNodeList {}
    function registerNamespace(string $prefix, string $namespaceURI) : bool {}
    function registerPhpFunctions($restrict = null) {}
}
