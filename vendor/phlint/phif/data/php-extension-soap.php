<?php

const APACHE_MAP = 200;
const SOAP_1_1 = 1;
const SOAP_1_2 = 2;
const SOAP_ACTOR_NEXT = 1;
const SOAP_ACTOR_NONE = 2;
const SOAP_ACTOR_UNLIMATERECEIVER = 3;
const SOAP_AUTHENTICATION_BASIC = 0;
const SOAP_AUTHENTICATION_DIGEST = 1;
const SOAP_COMPRESSION_ACCEPT = 32;
const SOAP_COMPRESSION_DEFLATE = 16;
const SOAP_COMPRESSION_GZIP = 0;
const SOAP_DOCUMENT = 2;
const SOAP_ENC_ARRAY = 300;
const SOAP_ENC_OBJECT = 301;
const SOAP_ENCODED = 1;
const SOAP_FUNCTIONS_ALL = 999;
const SOAP_LITERAL = 2;
const SOAP_PERSISTENCE_REQUEST = 2;
const SOAP_PERSISTENCE_SESSION = 1;
const SOAP_RPC = 1;
const SOAP_SINGLE_ELEMENT_ARRAYS = 1;
const SOAP_SSL_METHOD_SSLv2 = 1;
const SOAP_SSL_METHOD_SSLv23 = 3;
const SOAP_SSL_METHOD_SSLv3 = 2;
const SOAP_SSL_METHOD_TLS = 0;
const SOAP_USE_XSI_ARRAY_TYPE = 4;
const SOAP_WAIT_ONE_WAY_CALLS = 2;
const UNKNOWN_TYPE = 999998;
const WSDL_CACHE_BOTH = 3;
const WSDL_CACHE_DISK = 1;
const WSDL_CACHE_MEMORY = 2;
const WSDL_CACHE_NONE = 0;
const XSD_1999_NAMESPACE = 'http://www.w3.org/1999/XMLSchema';
const XSD_1999_TIMEINSTANT = 401;
const XSD_ANYTYPE = 145;
const XSD_ANYURI = 117;
const XSD_ANYXML = 147;
const XSD_BASE64BINARY = 116;
const XSD_BOOLEAN = 102;
const XSD_BYTE = 137;
const XSD_DATE = 109;
const XSD_DATETIME = 107;
const XSD_DECIMAL = 103;
const XSD_DOUBLE = 105;
const XSD_DURATION = 106;
const XSD_ENTITIES = 130;
const XSD_ENTITY = 129;
const XSD_FLOAT = 104;
const XSD_GDAY = 113;
const XSD_GMONTH = 114;
const XSD_GMONTHDAY = 112;
const XSD_GYEAR = 111;
const XSD_GYEARMONTH = 110;
const XSD_HEXBINARY = 115;
const XSD_ID = 126;
const XSD_IDREF = 127;
const XSD_IDREFS = 128;
const XSD_INT = 135;
const XSD_INTEGER = 131;
const XSD_LANGUAGE = 122;
const XSD_LONG = 134;
const XSD_NAME = 124;
const XSD_NAMESPACE = 'http://www.w3.org/2001/XMLSchema';
const XSD_NCNAME = 125;
const XSD_NEGATIVEINTEGER = 133;
const XSD_NMTOKEN = 123;
const XSD_NMTOKENS = 144;
const XSD_NONNEGATIVEINTEGER = 138;
const XSD_NONPOSITIVEINTEGER = 132;
const XSD_NORMALIZEDSTRING = 120;
const XSD_NOTATION = 119;
const XSD_POSITIVEINTEGER = 143;
const XSD_QNAME = 118;
const XSD_SHORT = 136;
const XSD_STRING = 101;
const XSD_TIME = 108;
const XSD_TOKEN = 121;
const XSD_UNSIGNEDBYTE = 142;
const XSD_UNSIGNEDINT = 140;
const XSD_UNSIGNEDLONG = 139;
const XSD_UNSIGNEDSHORT = 141;

/**
 * @param mixed $object
 * @return bool
 */
function is_soap_fault($object) : bool {}

/**
 * @param bool $handler
 * @return bool
 */
function use_soap_error_handler(bool $handler = true) : bool {}

class SoapClient
{
    function __call(string $function_name, string $arguments) {}
    function __construct($wsdl, array $options = []) {}
    function __doRequest(string $request, string $location, string $action, int $version, int $one_way = 0) : string {}
    function __getCookies() : array {}
    function __getFunctions() : array {}
    function __getLastRequest() : string {}
    function __getLastRequestHeaders() : string {}
    function __getLastResponse() : string {}
    function __getLastResponseHeaders() : string {}
    function __getTypes() : array {}
    function __setCookie(string $name, string $value = '') {}
    function __setLocation(string $new_location = '') : string {}
    function __setSoapHeaders($soapheaders = null) : bool {}
    function __soapCall(string $function_name, array $arguments, array $options = [], $input_headers = null, array &$output_headers = []) {}
    function SoapClient($wsdl, array $options = []) {}
}

class SoapFault extends Exception
{
    function __construct(string $faultcode, string $faultstring, string $faultactor = '', string $detail = '', string $faultname = '', string $headerfault = '') {}
    function __toString() : string {}
    function SoapFault(string $faultcode, string $faultstring, string $faultactor = '', string $detail = '', string $faultname = '', string $headerfault = '') {}
}

class SoapHeader
{
    function __construct(string $namespace, string $name, $data = null, bool $mustunderstand = false, string $actor = '') {}
    function SoapHeader(string $namespace, string $name, $data = null, bool $mustunderstand = false, string $actor = '') {}
}

class SoapParam
{
    function __construct($data, string $name) {}
    function SoapParam($data, string $name) {}
}

class SoapServer
{
    function __construct($wsdl, array $options = []) {}
    function addFunction($functions) {}
    function addSoapHeader(SoapHeader $object) {}
    function fault(string $code, string $string, string $actor = '', string $details = '', string $name = '') {}
    function getFunctions() : array {}
    function handle(string $soap_request = '') {}
    function setClass(string $class_name, $args = null, ...$__variadic) {}
    function setObject($object) {}
    function setPersistence(int $mode) {}
    function SoapServer($wsdl, array $options = []) {}
}

class SoapVar
{
    function __construct($data, string $encoding, string $type_name = '', string $type_namespace = '', string $node_name = '', string $node_namespace = '') {}
    function SoapVar($data, string $encoding, string $type_name = '', string $type_namespace = '', string $node_name = '', string $node_namespace = '') {}
}
