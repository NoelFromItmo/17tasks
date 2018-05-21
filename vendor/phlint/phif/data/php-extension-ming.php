<?php

/**
 * @param SWFGradient $gradient
 * @param int $flags
 * @return SWFFill
 */
function addFill(SWFGradient $gradient, int $flags = 0) : SWFFill {}

/**
 * @param string $char
 * @return int
 */
function ming_keypress(string $char) : int {}

/**
 * @param int $threshold
 * @return void
 */
function ming_setcubicthreshold(int $threshold) {}

/**
 * @param float $scale
 * @return void
 */
function ming_setscale(float $scale) {}

/**
 * @param int $level
 * @return void
 */
function ming_setswfcompression(int $level) {}

/**
 * @param int $use
 * @return void
 */
function ming_useconstants(int $use) {}

/**
 * @param int $version
 * @return void
 */
function ming_useswfversion(int $version) {}

/**
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $a
 * @return void
 */
function setLeftFill(int $red, int $green, int $blue, int $a = 0) {}

/**
 * @param int $width
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $a
 * @return void
 */
function setLine(int $width, int $red, int $green, int $blue, int $a = 0) {}

/**
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $a
 * @return void
 */
function setRightFill(int $red, int $green, int $blue, int $a = 0) {}

class SWFAction
{
    function __construct(string $script) {}
}

class SWFBitmap
{
    function __construct($file, $alphafile = null) {}
    function getHeight() : float {}
    function getWidth() : float {}
}

class SWFButton
{
    function __construct() {}
    function addAction(SWFAction $action, int $flags) {}
    function addASound(SWFSound $sound, int $flags) : SWFSoundInstance {}
    function addShape(SWFShape $shape, int $flags) {}
    function setAction(SWFAction $action) {}
    function setDown(SWFShape $shape) {}
    function setHit(SWFShape $shape) {}
    function setMenu(int $flag) {}
    function setOver(SWFShape $shape) {}
    function setUp(SWFShape $shape) {}
}

class SWFDisplayItem
{
    function addAction(SWFAction $action, int $flags) {}
    function addColor(int $red, int $green, int $blue, int $a = 0) {}
    function endMask() {}
    function getRot() : float {}
    function getX() : float {}
    function getXScale() : float {}
    function getXSkew() : float {}
    function getY() : float {}
    function getYScale() : float {}
    function getYSkew() : float {}
    function move(float $dx, float $dy) {}
    function moveTo(float $x, float $y) {}
    function multColor(float $red, float $green, float $blue, float $a = 0) {}
    function remove() {}
    function rotate(float $angle) {}
    function rotateTo(float $angle) {}
    function scale(float $dx, float $dy) {}
    function scaleTo(float $x, float $y = 0) {}
    function setDepth(int $depth) {}
    function setMaskLevel(int $level) {}
    function setMatrix(float $a, float $b, float $c, float $d, float $x, float $y) {}
    function setName(string $name) {}
    function setRatio(float $ratio) {}
    function skewX(float $ddegrees) {}
    function skewXTo(float $degrees) {}
    function skewY(float $ddegrees) {}
    function skewYTo(float $degrees) {}
}

class SWFFill
{
    function moveTo(float $x, float $y) {}
    function rotateTo(float $angle) {}
    function scaleTo(float $x, float $y = 0) {}
    function skewXTo(float $x) {}
    function skewYTo(float $y) {}
}

class SWFFont
{
    function __construct(string $filename) {}
    function getAscent() : float {}
    function getDescent() : float {}
    function getLeading() : float {}
    function getShape(int $code) : string {}
    function getUTF8Width(string $string) : float {}
    function getWidth(string $string) : float {}
}

class SWFFontChar
{
    function addChars(string $char) {}
    function addUTF8Chars(string $char) {}
}

class SWFGradient
{
    function __construct() {}
    function addEntry(float $ratio, int $red, int $green, int $blue, int $alpha = 255) {}
}

class SWFMorph
{
    function __construct() {}
    function getShape1() : SWFShape {}
    function getShape2() : SWFShape {}
}

class SWFMovie
{
    function __construct(int $version = 0) {}
    function add($instance) {}
    function addExport(SWFCharacter $char, string $name) {}
    function addFont(SWFFont $font) {}
    function importChar(string $libswf, string $name) : SWFSprite {}
    function importFont(string $libswf, string $name) : SWFFontChar {}
    function labelFrame(string $label) {}
    function nextFrame() {}
    function output(int $compression = 0) : int {}
    function remove($instance) {}
    function save(string $filename, int $compression = -1) : int {}
    function saveToFile($x, int $compression = -1) : int {}
    function setbackground(int $red, int $green, int $blue) {}
    function setDimension(float $width, float $height) {}
    function setFrames(int $number) {}
    function setRate(float $rate) {}
    function startSound(SWFSound $sound) : SWFSoundInstance {}
    function stopSound(SWFSound $sound) {}
    function streamMP3($mp3file, float $skip = 0) : int {}
    function writeExports() {}
}

class SWFPrebuiltClip
{
    function __construct($file) {}
}

class SWFShape
{
    function __construct() {}
    function addFill(int $red, int $green, int $blue, int $alpha = 255) : SWFFill {}
    function drawArc(float $r, float $startAngle, float $endAngle) {}
    function drawCircle(float $r) {}
    function drawCubic(float $bx, float $by, float $cx, float $cy, float $dx, float $dy) : int {}
    function drawCubicTo(float $bx, float $by, float $cx, float $cy, float $dx, float $dy) : int {}
    function drawCurve(float $controldx, float $controldy, float $anchordx, float $anchordy, float $targetdx = 0, float $targetdy = 0) : int {}
    function drawCurveTo(float $controlx, float $controly, float $anchorx, float $anchory, float $targetx = 0, float $targety = 0) : int {}
    function drawGlyph(SWFFont $font, string $character, int $size = 0) {}
    function drawLine(float $dx, float $dy) {}
    function drawLineTo(float $x, float $y) {}
    function movePen(float $dx, float $dy) {}
    function movePenTo(float $x, float $y) {}
    function setLeftFill(SWFGradient $fill) {}
    function setLine(SWFShape $shape) {}
    function setRightFill(SWFGradient $fill) {}
}

class SWFSound
{
    function __construct(string $filename, int $flags = 0) {}
}

class SWFSoundInstance
{
    function loopCount(int $point) {}
    function loopInPoint(int $point) {}
    function loopOutPoint(int $point) {}
    function noMultiple() {}
}

class SWFSprite
{
    function __construct() {}
    function add($object) {}
    function labelFrame(string $label) {}
    function nextFrame() {}
    function remove($object) {}
    function setFrames(int $number) {}
    function startSound(SWFSound $sount) : SWFSoundInstance {}
    function stopSound(SWFSound $sount) {}
}

class SWFText
{
    function __construct() {}
    function addString(string $string) {}
    function addUTF8String(string $text) {}
    function getAscent() : float {}
    function getDescent() : float {}
    function getLeading() : float {}
    function getUTF8Width(string $string) : float {}
    function getWidth(string $string) : float {}
    function moveTo(float $x, float $y) {}
    function setColor(int $red, int $green, int $blue, int $a = 255) {}
    function setFont(SWFFont $font) {}
    function setHeight(float $height) {}
    function setSpacing(float $spacing) {}
}

class SWFTextField
{
    function __construct(int $flags = 0) {}
    function addChars(string $chars) {}
    function addString(string $string) {}
    function align(int $alignement) {}
    function setBounds(float $width, float $height) {}
    function setColor(int $red, int $green, int $blue, int $a = 255) {}
    function setFont(SWFFont $font) {}
    function setHeight(float $height) {}
    function setIndentation(float $width) {}
    function setLeftMargin(float $width) {}
    function setLineSpacing(float $height) {}
    function setMargins(float $left, float $right) {}
    function setName(string $name) {}
    function setPadding(float $padding) {}
    function setRightMargin(float $width) {}
}

class SWFVideoStream
{
    function __construct(string $file = '') {}
    function getNumFrames() : int {}
    function setDimension(int $x, int $y) {}
}
