<?php

const TIDY_NODETYPE_ASP = 10;
const TIDY_NODETYPE_CDATA = 8;
const TIDY_NODETYPE_COMMENT = 2;
const TIDY_NODETYPE_DOCTYPE = 1;
const TIDY_NODETYPE_END = 6;
const TIDY_NODETYPE_JSTE = 11;
const TIDY_NODETYPE_PHP = 12;
const TIDY_NODETYPE_PROCINS = 3;
const TIDY_NODETYPE_ROOT = 0;
const TIDY_NODETYPE_SECTION = 9;
const TIDY_NODETYPE_START = 5;
const TIDY_NODETYPE_STARTEND = 7;
const TIDY_NODETYPE_TEXT = 4;
const TIDY_NODETYPE_XMLDECL = 13;
const TIDY_TAG_A = 1;
const TIDY_TAG_ABBR = 2;
const TIDY_TAG_ACRONYM = 3;
const TIDY_TAG_ADDRESS = 4;
const TIDY_TAG_ALIGN = 5;
const TIDY_TAG_APPLET = 6;
const TIDY_TAG_AREA = 7;
const TIDY_TAG_B = 8;
const TIDY_TAG_BASE = 9;
const TIDY_TAG_BASEFONT = 10;
const TIDY_TAG_BDO = 11;
const TIDY_TAG_BGSOUND = 12;
const TIDY_TAG_BIG = 13;
const TIDY_TAG_BLINK = 14;
const TIDY_TAG_BLOCKQUOTE = 15;
const TIDY_TAG_BODY = 16;
const TIDY_TAG_BR = 17;
const TIDY_TAG_BUTTON = 18;
const TIDY_TAG_CAPTION = 19;
const TIDY_TAG_CENTER = 20;
const TIDY_TAG_CITE = 21;
const TIDY_TAG_CODE = 22;
const TIDY_TAG_COL = 23;
const TIDY_TAG_COLGROUP = 24;
const TIDY_TAG_COMMENT = 25;
const TIDY_TAG_DD = 26;
const TIDY_TAG_DEL = 27;
const TIDY_TAG_DFN = 28;
const TIDY_TAG_DIR = 29;
const TIDY_TAG_DIV = 30;
const TIDY_TAG_DL = 31;
const TIDY_TAG_DT = 32;
const TIDY_TAG_EM = 33;
const TIDY_TAG_EMBED = 34;
const TIDY_TAG_FIELDSET = 35;
const TIDY_TAG_FONT = 36;
const TIDY_TAG_FORM = 37;
const TIDY_TAG_FRAME = 38;
const TIDY_TAG_FRAMESET = 39;
const TIDY_TAG_H1 = 40;
const TIDY_TAG_H2 = 41;
const TIDY_TAG_H3 = 42;
const TIDY_TAG_H4 = 43;
const TIDY_TAG_H5 = 44;
const TIDY_TAG_H6 = 45;
const TIDY_TAG_HEAD = 46;
const TIDY_TAG_HR = 47;
const TIDY_TAG_HTML = 48;
const TIDY_TAG_I = 49;
const TIDY_TAG_IFRAME = 50;
const TIDY_TAG_ILAYER = 51;
const TIDY_TAG_IMG = 52;
const TIDY_TAG_INPUT = 53;
const TIDY_TAG_INS = 54;
const TIDY_TAG_ISINDEX = 55;
const TIDY_TAG_KBD = 56;
const TIDY_TAG_KEYGEN = 57;
const TIDY_TAG_LABEL = 58;
const TIDY_TAG_LAYER = 59;
const TIDY_TAG_LEGEND = 60;
const TIDY_TAG_LI = 61;
const TIDY_TAG_LINK = 62;
const TIDY_TAG_LISTING = 63;
const TIDY_TAG_MAP = 64;
const TIDY_TAG_MARQUEE = 66;
const TIDY_TAG_MENU = 67;
const TIDY_TAG_META = 68;
const TIDY_TAG_MULTICOL = 69;
const TIDY_TAG_NOBR = 70;
const TIDY_TAG_NOEMBED = 71;
const TIDY_TAG_NOFRAMES = 72;
const TIDY_TAG_NOLAYER = 73;
const TIDY_TAG_NOSAVE = 74;
const TIDY_TAG_NOSCRIPT = 75;
const TIDY_TAG_OBJECT = 76;
const TIDY_TAG_OL = 77;
const TIDY_TAG_OPTGROUP = 78;
const TIDY_TAG_OPTION = 79;
const TIDY_TAG_P = 80;
const TIDY_TAG_PARAM = 81;
const TIDY_TAG_PLAINTEXT = 83;
const TIDY_TAG_PRE = 84;
const TIDY_TAG_Q = 85;
const TIDY_TAG_RB = 86;
const TIDY_TAG_RBC = 87;
const TIDY_TAG_RP = 88;
const TIDY_TAG_RT = 89;
const TIDY_TAG_RTC = 90;
const TIDY_TAG_RUBY = 91;
const TIDY_TAG_S = 92;
const TIDY_TAG_SAMP = 93;
const TIDY_TAG_SCRIPT = 94;
const TIDY_TAG_SELECT = 95;
const TIDY_TAG_SERVER = 96;
const TIDY_TAG_SERVLET = 97;
const TIDY_TAG_SMALL = 98;
const TIDY_TAG_SPACER = 99;
const TIDY_TAG_SPAN = 100;
const TIDY_TAG_STRIKE = 101;
const TIDY_TAG_STRONG = 102;
const TIDY_TAG_STYLE = 103;
const TIDY_TAG_SUB = 104;
const TIDY_TAG_SUP = 105;
const TIDY_TAG_TABLE = 107;
const TIDY_TAG_TBODY = 108;
const TIDY_TAG_TD = 109;
const TIDY_TAG_TEXTAREA = 110;
const TIDY_TAG_TFOOT = 111;
const TIDY_TAG_TH = 112;
const TIDY_TAG_THEAD = 113;
const TIDY_TAG_TITLE = 114;
const TIDY_TAG_TR = 115;
const TIDY_TAG_TT = 116;
const TIDY_TAG_U = 117;
const TIDY_TAG_UL = 118;
const TIDY_TAG_UNKNOWN = 0;
const TIDY_TAG_VAR = 119;
const TIDY_TAG_WBR = 120;
const TIDY_TAG_XMP = 121;

/**
 * @param string $input
 * @param int $mode
 * @return string
 */
function ob_tidyhandler(string $input, int $mode = 0) : string {}

/**
 * @param tidy $object
 * @return int
 */
function tidy_access_count(tidy $object) : int {}

/**
 * @param tidy $object
 * @return bool
 */
function tidy_clean_repair(tidy $object) : bool {}

/**
 * @param tidy $object
 * @return int
 */
function tidy_config_count(tidy $object) : int {}

/**
 * @param tidy $object
 * @return bool
 */
function tidy_diagnose(tidy $object) : bool {}

/**
 * @param tidy $object
 * @return int
 */
function tidy_error_count(tidy $object) : int {}

/**
 * @param tidy $object
 * @return tidyNode
 */
function tidy_get_body(tidy $object) : tidyNode {}

/**
 * @param tidy $object
 * @return array
 */
function tidy_get_config(tidy $object) : array {}

/**
 * @param tidy $tidy
 * @return string
 */
function tidy_get_error_buffer(tidy $tidy) : string {}

/**
 * @param tidy $object
 * @return tidyNode
 */
function tidy_get_head(tidy $object) : tidyNode {}

/**
 * @param tidy $object
 * @return tidyNode
 */
function tidy_get_html(tidy $object) : tidyNode {}

/**
 * @param tidy $object
 * @return int
 */
function tidy_get_html_ver(tidy $object) : int {}

/**
 * @param tidy $object
 * @param string $optname
 * @return string
 */
function tidy_get_opt_doc(tidy $object, string $optname) : string {}

/**
 * @param tidy $object
 * @return string
 */
function tidy_get_output(tidy $object) : string {}

/**
 * @return string
 */
function tidy_get_release() : string {}

/**
 * @param tidy $object
 * @return tidyNode
 */
function tidy_get_root(tidy $object) : tidyNode {}

/**
 * @param tidy $object
 * @return int
 */
function tidy_get_status(tidy $object) : int {}

/**
 * @param tidy $object
 * @param string $option
 * @return mixed
 */
function tidy_getopt(tidy $object, string $option) {}

/**
 * @param tidy $object
 * @return bool
 */
function tidy_is_xhtml(tidy $object) : bool {}

/**
 * @param tidy $object
 * @return bool
 */
function tidy_is_xml(tidy $object) : bool {}

/**
 * @param string $filename
 * @param string $encoding
 * @return void
 */
function tidy_load_config(string $filename, string $encoding) {}

/**
 * @param string $filename
 * @param mixed $config
 * @param string $encoding
 * @param bool $use_include_path
 * @return tidy
 */
function tidy_parse_file(string $filename, $config = null, string $encoding = '', bool $use_include_path = false) : tidy {}

/**
 * @param string $input
 * @param mixed $config
 * @param string $encoding
 * @return tidy
 */
function tidy_parse_string(string $input, $config = null, string $encoding = '') : tidy {}

/**
 * @param string $filename
 * @param mixed $config
 * @param string $encoding
 * @param bool $use_include_path
 * @return string
 */
function tidy_repair_file(string $filename, $config = null, string $encoding = '', bool $use_include_path = false) : string {}

/**
 * @param string $data
 * @param mixed $config
 * @param string $encoding
 * @return string
 */
function tidy_repair_string(string $data, $config = null, string $encoding = '') : string {}

/**
 * @return bool
 */
function tidy_reset_config() : bool {}

/**
 * @param string $filename
 * @return bool
 */
function tidy_save_config(string $filename) : bool {}

/**
 * @param string $encoding
 * @return bool
 */
function tidy_set_encoding(string $encoding) : bool {}

/**
 * @param string $option
 * @param mixed $value
 * @return bool
 */
function tidy_setopt(string $option, $value) : bool {}

/**
 * @param tidy $object
 * @return int
 */
function tidy_warning_count(tidy $object) : int {}

class tidy
{
    function __construct(string $filename = '', $config = null, string $encoding = '', bool $use_include_path = false) {}
    function body() : tidyNode {}
    function cleanRepair() : bool {}
    function diagnose() : bool {}
    function getConfig() : array {}
    function getHtmlVer() : int {}
    function getOpt(string $option) {}
    function getOptDoc(string $optname) : string {}
    function getRelease() : string {}
    function getStatus() : int {}
    function head() : tidyNode {}
    function html() : tidyNode {}
    function isXhtml() : bool {}
    function isXml() : bool {}
    function parseFile(string $filename, $config = null, string $encoding = '', bool $use_include_path = false) : bool {}
    function parseString(string $input, $config = null, string $encoding = '') : bool {}
    function repairFile(string $filename, $config = null, string $encoding = '', bool $use_include_path = false) : string {}
    function repairString(string $data, $config = null, string $encoding = '') : string {}
    function root() : tidyNode {}
}

class tidyNode
{
    function __construct() {}
    function getParent() : tidyNode {}
    function hasChildren() : bool {}
    function hasSiblings() : bool {}
    function isAsp() : bool {}
    function isComment() : bool {}
    function isHtml() : bool {}
    function isJste() : bool {}
    function isPhp() : bool {}
    function isText() : bool {}
}
