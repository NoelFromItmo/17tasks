<?php

class HaruAnnotation
{
    function setBorderStyle(float $width, int $dash_on, int $dash_off) : bool {}
    function setHighlightMode(int $mode) : bool {}
    function setIcon(int $icon) : bool {}
    function setOpened(bool $opened) : bool {}
}

class HaruDestination
{
    function setFit() : bool {}
    function setFitB() : bool {}
    function setFitBH(float $top) : bool {}
    function setFitBV(float $left) : bool {}
    function setFitH(float $top) : bool {}
    function setFitR(float $left, float $bottom, float $right, float $top) : bool {}
    function setFitV(float $left) : bool {}
    function setXYZ(float $left, float $top, float $zoom) : bool {}
}

class HaruDoc
{
    function __construct() {}
    function addPage() {}
    function addPageLabel(int $first_page, int $style, int $first_num, string $prefix = "") : bool {}
    function createOutline(string $title, $parent_outline = null, $encoder = null) {}
    function getCurrentEncoder() {}
    function getCurrentPage() {}
    function getEncoder(string $encoding) {}
    function getFont(string $fontname, string $encoding = '') {}
    function getInfoAttr(int $type) : string {}
    function getPageLayout() : int {}
    function getPageMode() : int {}
    function getStreamSize() : int {}
    function insertPage($page) {}
    function loadJPEG(string $filename) {}
    function loadPNG(string $filename, bool $deferred = false) {}
    function loadRaw(string $filename, int $width, int $height, int $color_space) {}
    function loadTTC(string $fontfile, int $index, bool $embed = false) : string {}
    function loadTTF(string $fontfile, bool $embed = false) : string {}
    function loadType1(string $afmfile, string $pfmfile = '') : string {}
    function output() : bool {}
    function readFromStream(int $bytes) : string {}
    function resetError() : bool {}
    function resetStream() : bool {}
    function save(string $file) : bool {}
    function saveToStream() : bool {}
    function setCompressionMode(int $mode) : bool {}
    function setCurrentEncoder(string $encoding) : bool {}
    function setEncryptionMode(int $mode, int $key_len = 5) : bool {}
    function setInfoAttr(int $type, string $info) : bool {}
    function setInfoDateAttr(int $type, int $year, int $month, int $day, int $hour, int $min, int $sec, string $ind, int $off_hour, int $off_min) : bool {}
    function setOpenAction($destination) : bool {}
    function setPageLayout(int $layout) : bool {}
    function setPageMode(int $mode) : bool {}
    function setPagesConfiguration(int $page_per_pages) : bool {}
    function setPassword(string $owner_password, string $user_password) : bool {}
    function setPermission(int $permission) : bool {}
    function useCNSEncodings() : bool {}
    function useCNSFonts() : bool {}
    function useCNTEncodings() : bool {}
    function useCNTFonts() : bool {}
    function useJPEncodings() : bool {}
    function useJPFonts() : bool {}
    function useKREncodings() : bool {}
    function useKRFonts() : bool {}
}

class HaruEncoder
{
    function getByteType(string $text, int $index) : int {}
    function getType() : int {}
    function getUnicode(int $character) : int {}
    function getWritingMode() : int {}
}

class HaruException extends Exception {}

class HaruFont
{
    function getAscent() : int {}
    function getCapHeight() : int {}
    function getDescent() : int {}
    function getEncodingName() : string {}
    function getFontName() : string {}
    function getTextWidth(string $text) : array {}
    function getUnicodeWidth(int $character) : int {}
    function getXHeight() : int {}
    function measureText(string $text, float $width, float $font_size, float $char_space, float $word_space, bool $word_wrap = false) : int {}
}

class HaruImage
{
    function getBitsPerComponent() : int {}
    function getColorSpace() : string {}
    function getHeight() : int {}
    function getSize() : array {}
    function getWidth() : int {}
    function setColorMask(int $rmin, int $rmax, int $gmin, int $gmax, int $bmin, int $bmax) : bool {}
    function setMaskImage($mask_image) : bool {}
}

class HaruOutline
{
    function setDestination($destination) : bool {}
    function setOpened(bool $opened) : bool {}
}

class HaruPage
{
    function arc(float $x, float $y, float $ray, float $ang1, float $ang2) : bool {}
    function beginText() : bool {}
    function circle(float $x, float $y, float $ray) : bool {}
    function closePath() : bool {}
    function concat(float $a, float $b, float $c, float $d, float $x, float $y) : bool {}
    function createDestination() {}
    function createLinkAnnotation(array $rectangle, $destination) {}
    function createTextAnnotation(array $rectangle, string $text, $encoder = null) {}
    function createURLAnnotation(array $rectangle, string $url) {}
    function curveTo(float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) : bool {}
    function curveTo2(float $x2, float $y2, float $x3, float $y3) : bool {}
    function curveTo3(float $x1, float $y1, float $x3, float $y3) : bool {}
    function drawImage($image, float $x, float $y, float $width, float $height) : bool {}
    function ellipse(float $x, float $y, float $xray, float $yray) : bool {}
    function endPath() : bool {}
    function endText() : bool {}
    function eofill() : bool {}
    function eoFillStroke(bool $close_path = false) : bool {}
    function fill() : bool {}
    function fillStroke(bool $close_path = false) : bool {}
    function getCharSpace() : float {}
    function getCMYKFill() : array {}
    function getCMYKStroke() : array {}
    function getCurrentFont() {}
    function getCurrentFontSize() : float {}
    function getCurrentPos() : array {}
    function getCurrentTextPos() : array {}
    function getDash() : array {}
    function getFillingColorSpace() : int {}
    function getFlatness() : float {}
    function getGMode() : int {}
    function getGrayFill() : float {}
    function getGrayStroke() : float {}
    function getHeight() : float {}
    function getHorizontalScaling() : float {}
    function getLineCap() : int {}
    function getLineJoin() : int {}
    function getLineWidth() : float {}
    function getMiterLimit() : float {}
    function getRGBFill() : array {}
    function getRGBStroke() : array {}
    function getStrokingColorSpace() : int {}
    function getTextLeading() : float {}
    function getTextMatrix() : array {}
    function getTextRenderingMode() : int {}
    function getTextRise() : float {}
    function getTextWidth(string $text) : float {}
    function getTransMatrix() : array {}
    function getWidth() : float {}
    function getWordSpace() : float {}
    function lineTo(float $x, float $y) : bool {}
    function measureText(string $text, float $width, bool $wordwrap = false) : int {}
    function moveTextPos(float $x, float $y, bool $set_leading = false) : bool {}
    function moveTo(float $x, float $y) : bool {}
    function moveToNextLine() : bool {}
    function rectangle(float $x, float $y, float $width, float $height) : bool {}
    function setCharSpace(float $char_space) : bool {}
    function setCMYKFill(float $c, float $m, float $y, float $k) : bool {}
    function setCMYKStroke(float $c, float $m, float $y, float $k) : bool {}
    function setDash(array $pattern, int $phase) : bool {}
    function setFlatness(float $flatness) : bool {}
    function setFontAndSize($font, float $size) : bool {}
    function setGrayFill(float $value) : bool {}
    function setGrayStroke(float $value) : bool {}
    function setHeight(float $height) : bool {}
    function setHorizontalScaling(float $scaling) : bool {}
    function setLineCap(int $cap) : bool {}
    function setLineJoin(int $join) : bool {}
    function setLineWidth(float $width) : bool {}
    function setMiterLimit(float $limit) : bool {}
    function setRGBFill(float $r, float $g, float $b) : bool {}
    function setRGBStroke(float $r, float $g, float $b) : bool {}
    function setRotate(int $angle) : bool {}
    function setSize(int $size, int $direction) : bool {}
    function setSlideShow(int $type, float $disp_time, float $trans_time) : bool {}
    function setTextLeading(float $text_leading) : bool {}
    function setTextMatrix(float $a, float $b, float $c, float $d, float $x, float $y) : bool {}
    function setTextRenderingMode(int $mode) : bool {}
    function setTextRise(float $rise) : bool {}
    function setWidth(float $width) : bool {}
    function setWordSpace(float $word_space) : bool {}
    function showText(string $text) : bool {}
    function showTextNextLine(string $text, float $word_space = 0, float $char_space = 0) : bool {}
    function stroke(bool $close_path = false) : bool {}
    function textOut(float $x, float $y, string $text) : bool {}
    function textRect(float $left, float $top, float $right, float $bottom, string $text, int $align = HaruPage::TALIGN_LEFT) : bool {}
}
