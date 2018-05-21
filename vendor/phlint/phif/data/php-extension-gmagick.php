<?php

class Gmagick
{
    function __construct(string $filename = '') {}
    function addimage(Gmagick $source) : Gmagick {}
    function addnoiseimage(int $noise_type) : Gmagick {}
    function annotateimage(GmagickDraw $GmagickDraw, float $x, float $y, float $angle, string $text) : Gmagick {}
    function blurimage(float $radius, float $sigma, int $channel = 0) : Gmagick {}
    function borderimage(GmagickPixel $color, int $width, int $height) : Gmagick {}
    function charcoalimage(float $radius, float $sigma) : Gmagick {}
    function chopimage(int $width, int $height, int $x, int $y) : Gmagick {}
    function clear() : Gmagick {}
    function commentimage(string $comment) : Gmagick {}
    function compositeimage(Gmagick $source, int $COMPOSE, int $x, int $y) : Gmagick {}
    function cropimage(int $width, int $height, int $x, int $y) : Gmagick {}
    function cropthumbnailimage(int $width, int $height) : Gmagick {}
    function current() : Gmagick {}
    function cyclecolormapimage(int $displace) : Gmagick {}
    function deconstructimages() : Gmagick {}
    function despeckleimage() : Gmagick {}
    function destroy() : bool {}
    function drawimage(GmagickDraw $GmagickDraw) : Gmagick {}
    function edgeimage(float $radius) : Gmagick {}
    function embossimage(float $radius, float $sigma) : Gmagick {}
    function enhanceimage() : Gmagick {}
    function equalizeimage() : Gmagick {}
    function flipimage() : Gmagick {}
    function flopimage() : Gmagick {}
    function frameimage(GmagickPixel $color, int $width, int $height, int $inner_bevel, int $outer_bevel) : Gmagick {}
    function gammaimage(float $gamma) : Gmagick {}
    function getcopyright() : string {}
    function getfilename() : string {}
    function getimagebackgroundcolor() : GmagickPixel {}
    function getimageblueprimary() : array {}
    function getimagebordercolor() : GmagickPixel {}
    function getimagechanneldepth(int $channel_type) : int {}
    function getimagecolors() : int {}
    function getimagecolorspace() : int {}
    function getimagecompose() : int {}
    function getimagedelay() : int {}
    function getimagedepth() : int {}
    function getimagedispose() : int {}
    function getimageextrema() : array {}
    function getimagefilename() : string {}
    function getimageformat() : string {}
    function getimagegamma() : float {}
    function getimagegreenprimary() : array {}
    function getimageheight() : int {}
    function getimagehistogram() : array {}
    function getimageindex() : int {}
    function getimageinterlacescheme() : int {}
    function getimageiterations() : int {}
    function getimagematte() : int {}
    function getimagemattecolor() : GmagickPixel {}
    function getimageprofile(string $name) : string {}
    function getimageredprimary() : array {}
    function getimagerenderingintent() : int {}
    function getimageresolution() : array {}
    function getimagescene() : int {}
    function getimagesignature() : string {}
    function getimagetype() : int {}
    function getimageunits() : int {}
    function getimagewhitepoint() : array {}
    function getimagewidth() : int {}
    function getpackagename() : string {}
    function getquantumdepth() : array {}
    function getreleasedate() : string {}
    function getsamplingfactors() : array {}
    function getsize() : array {}
    function getversion() : array {}
    function hasnextimage() {}
    function haspreviousimage() {}
    function implodeimage(float $radius) {}
    function labelimage(string $label) {}
    function levelimage(float $blackPoint, float $gamma, float $whitePoint, int $channel = Gmagick::CHANNEL_DEFAULT) {}
    function magnifyimage() {}
    function mapimage(gmagick $gmagick, bool $dither) : Gmagick {}
    function medianfilterimage(float $radius) {}
    function minifyimage() : Gmagick {}
    function modulateimage(float $brightness, float $saturation, float $hue) : Gmagick {}
    function motionblurimage(float $radius, float $sigma, float $angle) : Gmagick {}
    function newimage(int $width, int $height, string $background, string $format = '') : Gmagick {}
    function nextimage() : bool {}
    function normalizeimage(int $channel = 0) : Gmagick {}
    function oilpaintimage(float $radius) : Gmagick {}
    function previousimage() : bool {}
    function profileimage(string $name, string $profile) : Gmagick {}
    function quantizeimage(int $numColors, int $colorspace, int $treeDepth, bool $dither, bool $measureError) : Gmagick {}
    function quantizeimages(int $numColors, int $colorspace, int $treeDepth, bool $dither, bool $measureError) : Gmagick {}
    function queryfontmetrics(GmagickDraw $draw, string $text) : array {}
    function queryfonts(string $pattern = "*") : array {}
    function queryformats(string $pattern = "*") : array {}
    function radialblurimage(float $angle, int $channel = Gmagick::CHANNEL_DEFAULT) : Gmagick {}
    function raiseimage(int $width, int $height, int $x, int $y, bool $raise) : Gmagick {}
    function read(string $filename) : Gmagick {}
    function readimage(string $filename) : Gmagick {}
    function readimageblob(string $imageContents, string $filename = '') : Gmagick {}
    function readimagefile($fp, string $filename = '') : Gmagick {}
    function reducenoiseimage(float $radius) : Gmagick {}
    function removeimage() : Gmagick {}
    function removeimageprofile(string $name) : string {}
    function resampleimage(float $xResolution, float $yResolution, int $filter, float $blur) : Gmagick {}
    function resizeimage(int $width, int $height, int $filter, float $blur, bool $fit = false) : Gmagick {}
    function rollimage(int $x, int $y) : Gmagick {}
    function rotateimage($color, float $degrees) : Gmagick {}
    function scaleimage(int $width, int $height, bool $fit = false) : Gmagick {}
    function separateimagechannel(int $channel) : Gmagick {}
    function setCompressionQuality(int $quality) : Gmagick {}
    function setfilename(string $filename) : Gmagick {}
    function setimagebackgroundcolor(GmagickPixel $color) : Gmagick {}
    function setimageblueprimary(float $x, float $y) : Gmagick {}
    function setimagebordercolor(GmagickPixel $color) : Gmagick {}
    function setimagechanneldepth(int $channel, int $depth) : Gmagick {}
    function setimagecolorspace(int $colorspace) : Gmagick {}
    function setimagecompose(int $composite) : Gmagick {}
    function setimagedelay(int $delay) : Gmagick {}
    function setimagedepth(int $depth) : Gmagick {}
    function setimagedispose(int $disposeType) : Gmagick {}
    function setimagefilename(string $filename) : Gmagick {}
    function setimageformat(string $imageFormat) : Gmagick {}
    function setimagegamma(float $gamma) : Gmagick {}
    function setimagegreenprimary(float $x, float $y) : Gmagick {}
    function setimageindex(int $index) : Gmagick {}
    function setimageinterlacescheme(int $interlace) : Gmagick {}
    function setimageiterations(int $iterations) : Gmagick {}
    function setimageprofile(string $name, string $profile) : Gmagick {}
    function setimageredprimary(float $x, float $y) : Gmagick {}
    function setimagerenderingintent(int $rendering_intent) : Gmagick {}
    function setimageresolution(float $xResolution, float $yResolution) : Gmagick {}
    function setimagescene(int $scene) : Gmagick {}
    function setimagetype(int $imgType) : Gmagick {}
    function setimageunits(int $resolution) : Gmagick {}
    function setimagewhitepoint(float $x, float $y) : Gmagick {}
    function setsamplingfactors(array $factors) : Gmagick {}
    function setsize(int $columns, int $rows) : Gmagick {}
    function shearimage($color, float $xShear, float $yShear) : Gmagick {}
    function solarizeimage(int $threshold) : Gmagick {}
    function spreadimage(float $radius) : Gmagick {}
    function stripimage() : Gmagick {}
    function swirlimage(float $degrees) : Gmagick {}
    function thumbnailimage(int $width, int $height, bool $fit = false) : Gmagick {}
    function trimimage(float $fuzz) : Gmagick {}
    function writeimage(string $filename, bool $all_frames = false) : Gmagick {}
}

class GmagickDraw
{
    function annotate(float $x, float $y, string $text) : GmagickDraw {}
    function arc(float $sx, float $sy, float $ex, float $ey, float $sd, float $ed) : GmagickDraw {}
    function bezier(array $coordinate_array) : GmagickDraw {}
    function ellipse(float $ox, float $oy, float $rx, float $ry, float $start, float $end) : GmagickDraw {}
    function getfillcolor() : GmagickPixel {}
    function getfillopacity() : float {}
    function getfont() {}
    function getfontsize() : float {}
    function getfontstyle() : int {}
    function getfontweight() : int {}
    function getstrokecolor() : GmagickPixel {}
    function getstrokeopacity() : float {}
    function getstrokewidth() : float {}
    function gettextdecoration() : int {}
    function gettextencoding() {}
    function line(float $sx, float $sy, float $ex, float $ey) : GmagickDraw {}
    function point(float $x, float $y) : GmagickDraw {}
    function polygon(array $coordinates) : GmagickDraw {}
    function polyline(array $coordinate_array) : GmagickDraw {}
    function rectangle(float $x1, float $y1, float $x2, float $y2) : GmagickDraw {}
    function rotate(float $degrees) : GmagickDraw {}
    function roundrectangle(float $x1, float $y1, float $x2, float $y2, float $rx, float $ry) : GmagickDraw {}
    function scale(float $x, float $y) : GmagickDraw {}
    function setfillcolor($color) : GmagickDraw {}
    function setfillopacity(float $fill_opacity) : GmagickDraw {}
    function setfont(string $font) : GmagickDraw {}
    function setfontsize(float $pointsize) : GmagickDraw {}
    function setfontstyle(int $style) : GmagickDraw {}
    function setfontweight(int $weight) : GmagickDraw {}
    function setstrokecolor($color) : GmagickDraw {}
    function setstrokeopacity(float $stroke_opacity) : GmagickDraw {}
    function setstrokewidth(float $width) : GmagickDraw {}
    function settextdecoration(int $decoration) : GmagickDraw {}
    function settextencoding(string $encoding) : GmagickDraw {}
}

class GmagickPixel
{
    function __construct(string $color = '') {}
    function getcolor(bool $as_array = false, bool $normalize_array = false) {}
    function getcolorcount() : int {}
    function getcolorvalue(int $color) : float {}
    function setcolor(string $color) : GmagickPixel {}
    function setcolorvalue(int $color, float $value) : GmagickPixel {}
}
