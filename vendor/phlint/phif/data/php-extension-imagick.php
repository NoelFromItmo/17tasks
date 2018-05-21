<?php

class Imagick implements Iterator, Countable
{
    function __construct($files) {}
    function __tostring() : string {}
    function adaptiveblurimage(float $radius, float $sigma, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function adaptiveresizeimage(int $columns, int $rows, bool $bestfit = false) : bool {}
    function adaptivesharpenimage(float $radius, float $sigma, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function adaptivethresholdimage(int $width, int $height, int $offset) : bool {}
    function addimage(Imagick $source) : bool {}
    function addnoiseimage(int $noise_type, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function affinetransformimage(ImagickDraw $matrix) : bool {}
    function animateimages(string $x_server) : bool {}
    function annotateimage(ImagickDraw $draw_settings, float $x, float $y, float $angle, string $text) : bool {}
    function appendimages(bool $stack) : Imagick {}
    function autogammaimage() {}
    function autolevelimage(string $CHANNEL = Imagick::CHANNEL_DEFAULT) {}
    function autoorient() {}
    function averageImages() : Imagick {}
    function blackthresholdimage($threshold) : bool {}
    function blueshiftimage(float $factor = 1.5) {}
    function blurimage(float $radius, float $sigma, int $channel = 0) : bool {}
    function borderimage($bordercolor, int $width, int $height) : bool {}
    function brightnesscontrastimage(string $brightness, string $contrast, int $CHANNEL = Imagick::CHANNEL_DEFAULT) {}
    function calculatecrop() {}
    function charcoalimage(float $radius, float $sigma) : bool {}
    function chopimage(int $width, int $height, int $x, int $y) : bool {}
    function clampimage(string $CHANNEL = Imagick::CHANNEL_DEFAULT) {}
    function clear() : bool {}
    function clipimage() : bool {}
    function clipimagepath(string $pathname, string $inside) {}
    function clippathimage(string $pathname, bool $inside) : bool {}
    function clone() : Imagick {}
    function clutimage(Imagick $lookup_table, float $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function coalesceimages() : Imagick {}
    function colordecisionlistimage() {}
    function colorFloodfillImage($fill, float $fuzz, $bordercolor, int $x, int $y) : bool {}
    function colorizeimage($colorize, $opacity) : bool {}
    function colormatriximage(string $color_matrix) {}
    function combineimages(int $channelType) : Imagick {}
    function commentimage(string $comment) : bool {}
    function compareimagechannels(Imagick $image, int $channelType, int $metricType) : array {}
    function compareimagelayers(int $method) : Imagick {}
    function compareimages(Imagick $compare, int $metric) : array {}
    function compositeimage(Imagick $composite_object, int $composite, int $x, int $y, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function compositeimagegravity() {}
    function contrastimage(bool $sharpen) : bool {}
    function contraststretchimage(float $black_point, float $white_point, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function convolveimage(array $kernel, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function count(string $mode = '') {}
    function cropimage(int $width, int $height, int $x, int $y) : bool {}
    function cropthumbnailimage(int $width, int $height) : bool {}
    function current() : Imagick {}
    function cyclecolormapimage(int $displace) : bool {}
    function decipherimage(string $passphrase) : bool {}
    function deconstructimages() : Imagick {}
    function deleteimageartifact(string $artifact) : bool {}
    function deleteimageproperty(string $name) {}
    function deskewimage(float $threshold) : bool {}
    function despeckleimage() : bool {}
    function destroy() : bool {}
    function displayimage(string $servername) : bool {}
    function displayimages(string $servername) : bool {}
    function distortimage(int $method, array $arguments, bool $bestfit) : bool {}
    function drawimage(ImagickDraw $draw) : bool {}
    function edgeimage(float $radius) : bool {}
    function embossimage(float $radius, float $sigma) : bool {}
    function encipherimage(string $passphrase) : bool {}
    function enhanceimage() : bool {}
    function equalizeimage() : bool {}
    function evaluateimage(int $op, float $constant, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function evaluateimages() {}
    function exportimagepixels(int $x, int $y, int $width, int $height, string $map, int $STORAGE) : array {}
    function extentimage(int $width, int $height, int $x, int $y) : bool {}
    function filter(ImagickKernel $ImagickKernel, int $CHANNEL = Imagick::CHANNEL_DEFAULT) {}
    function flattenImages() : Imagick {}
    function flipimage() : bool {}
    function floodfillpaintimage($fill, float $fuzz, $target, int $x, int $y, bool $invert, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function flopimage() : bool {}
    function forwardfouriertransformimage(bool $magnitude) {}
    function frameimage($matte_color, int $width, int $height, int $inner_bevel, int $outer_bevel) : bool {}
    function functionimage(int $function, array $arguments, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function fximage(string $expression, int $channel = Imagick::CHANNEL_ALL) : Imagick {}
    function gammaimage(float $gamma, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function gaussianblurimage(float $radius, float $sigma, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function getantialias() {}
    function getcolorspace() : int {}
    function getcompression() : int {}
    function getcompressionquality() : int {}
    function getconfigureoptions() {}
    function getcopyright() : string {}
    function getfeatures() {}
    function getfilename() : string {}
    function getfont() : string {}
    function getformat() : string {}
    function getgravity() : int {}
    function gethdrienabled() {}
    function gethomeurl() : string {}
    function getimage() : Imagick {}
    function getimagealphachannel() : int {}
    function getimageartifact(string $artifact) : string {}
    function getImageAttribute(string $key) : string {}
    function getimagebackgroundcolor() : ImagickPixel {}
    function getimageblob() : string {}
    function getimageblueprimary() : array {}
    function getimagebordercolor() : ImagickPixel {}
    function getimagechanneldepth(int $channel) : int {}
    function getimagechanneldistortion(Imagick $reference, int $channel, int $metric) : float {}
    function getimagechanneldistortions(Imagick $reference, int $metric, int $channel = Imagick::CHANNEL_DEFAULT) : float {}
    function getImageChannelExtrema(int $channel) : array {}
    function getimagechannelkurtosis(int $channel = Imagick::CHANNEL_DEFAULT) : array {}
    function getimagechannelmean(int $channel) : array {}
    function getimagechannelrange(int $channel) : array {}
    function getimagechannelstatistics() : array {}
    function getImageClipMask() : Imagick {}
    function getimagecolormapcolor(int $index) : ImagickPixel {}
    function getimagecolors() : int {}
    function getimagecolorspace() : int {}
    function getimagecompose() : int {}
    function getimagecompression() : int {}
    function getimagecompressionquality() : int {}
    function getimagedelay() : int {}
    function getimagedepth() : int {}
    function getimagedispose() : int {}
    function getimagedistortion(MagickWand $reference, int $metric) : float {}
    function getImageExtrema() : array {}
    function getimagefilename() : string {}
    function getimageformat() : string {}
    function getimagegamma() : float {}
    function getimagegeometry() : array {}
    function getimagegravity() : int {}
    function getimagegreenprimary() : array {}
    function getimageheight() : int {}
    function getimagehistogram() : array {}
    function getImageIndex() : int {}
    function getimageinterlacescheme() : int {}
    function getimageinterpolatemethod() : int {}
    function getimageiterations() : int {}
    function getimagelength() : int {}
    function getImageMagickLicense() : string {}
    function getImageMatte() : bool {}
    function getImageMatteColor() : ImagickPixel {}
    function getimagemimetype() : string {}
    function getimageorientation() : int {}
    function getimagepage() : array {}
    function getimagepixelcolor(int $x, int $y) : ImagickPixel {}
    function getimageprofile(string $name) : string {}
    function getimageprofiles(string $pattern = "*", bool $include_values = true) : array {}
    function getimageproperties(string $pattern = "*", bool $include_values = true) : array {}
    function getimageproperty(string $name) : string {}
    function getimageredprimary() : array {}
    function getimageregion(int $width, int $height, int $x, int $y) : Imagick {}
    function getimagerenderingintent() : int {}
    function getimageresolution() : array {}
    function getimagesblob() : string {}
    function getimagescene() : int {}
    function getimagesignature() : string {}
    function getImageSize() : int {}
    function getimagetickspersecond() : int {}
    function getimagetotalinkdensity() : float {}
    function getimagetype() : int {}
    function getimageunits() : int {}
    function getimagevirtualpixelmethod() : int {}
    function getimagewhitepoint() : array {}
    function getimagewidth() : int {}
    function getinterlacescheme() : int {}
    function getiteratorindex() : int {}
    function getnumberimages() : int {}
    function getoption(string $key) : string {}
    function getpackagename() : string {}
    function getpage() : array {}
    function getpixeliterator() : ImagickPixelIterator {}
    function getpixelregioniterator(int $x, int $y, int $columns, int $rows) : ImagickPixelIterator {}
    function getpointsize() : float {}
    function getquantum() : int {}
    function getquantumdepth() : array {}
    function getquantumrange() : array {}
    function getregistry(string $key) : string {}
    function getreleasedate() : string {}
    function getresource(int $type) : int {}
    function getresourcelimit(int $type) : int {}
    function getsamplingfactors() : array {}
    function getsize() : array {}
    function getsizeoffset() : int {}
    function getversion() : array {}
    function haldclutimage(Imagick $clut, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function hasnextimage() : bool {}
    function haspreviousimage() : bool {}
    function identifyformat(string $embedText) {}
    function identifyimage(bool $appendRawOutput = false) : array {}
    function identifyimagetype() {}
    function implodeimage(float $radius) : bool {}
    function importimagepixels(int $x, int $y, int $width, int $height, string $map, int $storage, array $pixels) : bool {}
    function inversefouriertransformimage(string $complement, string $magnitude) {}
    function key() {}
    function labelimage(string $label) : bool {}
    function levelimage(float $blackPoint, float $gamma, float $whitePoint, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function linearstretchimage(float $blackPoint, float $whitePoint) : bool {}
    function liquidrescaleimage(int $width, int $height, float $delta_x, float $rigidity) : bool {}
    function listregistry() : array {}
    function localcontrastimage() {}
    function magnifyimage() : bool {}
    function mapImage(Imagick $map, bool $dither) : bool {}
    function matteFloodfillImage(float $alpha, float $fuzz, $bordercolor, int $x, int $y) : bool {}
    function medianFilterImage(float $radius) : bool {}
    function mergeimagelayers(int $layer_method) : Imagick {}
    function minifyimage() : bool {}
    function modulateimage(float $brightness, float $saturation, float $hue) : bool {}
    function montageimage(ImagickDraw $draw, string $tile_geometry, string $thumbnail_geometry, int $mode, string $frame) : Imagick {}
    function morphimages(int $number_frames) : Imagick {}
    function morphology(int $morphologyMethod, int $iterations, ImagickKernel $ImagickKernel, string $CHANNEL = '') {}
    function mosaicImages() : Imagick {}
    function motionblurimage(float $radius, float $sigma, float $angle, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function negateimage(bool $gray, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function newimage(int $cols, int $rows, $background, string $format = '') : bool {}
    function newpseudoimage(int $columns, int $rows, string $pseudoString) : bool {}
    function next() {}
    function nextimage() : bool {}
    function normalizeimage(int $channel = Imagick::CHANNEL_ALL) : bool {}
    function oilpaintimage(float $radius) : bool {}
    function opaquepaintimage($target, $fill, float $fuzz, bool $invert, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function optimizeimagelayers() : bool {}
    function optimizeimagetransparency() {}
    function orderedPosterizeImage(string $threshold_map, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function paintFloodfillImage($fill, float $fuzz, $bordercolor, int $x, int $y, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function paintOpaqueImage($target, $fill, float $fuzz, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function paintTransparentImage($target, float $alpha, float $fuzz) : bool {}
    function pingimage(string $filename) : bool {}
    function pingimageblob(string $image) : bool {}
    function pingimagefile($filehandle, string $fileName = '') : bool {}
    function polaroidimage(ImagickDraw $properties, float $angle) : bool {}
    function posterizeimage(int $levels, bool $dither) : bool {}
    function previewimages(int $preview) : bool {}
    function previousimage() : bool {}
    function profileimage(string $name, string $profile) : bool {}
    function quantizeimage(int $numberColors, int $colorspace, int $treedepth, bool $dither, bool $measureError) : bool {}
    function quantizeimages(int $numberColors, int $colorspace, int $treedepth, bool $dither, bool $measureError) : bool {}
    function queryfontmetrics(ImagickDraw $properties, string $text, bool $multiline = false) : array {}
    function queryfonts(string $pattern = "*") : array {}
    function queryformats(string $pattern = "*") : array {}
    function radialBlurImage(float $angle, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function raiseimage(int $width, int $height, int $x, int $y, bool $raise) : bool {}
    function randomthresholdimage(float $low, float $high, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function readimage(string $filename) : bool {}
    function readimageblob(string $image, string $filename = '') : bool {}
    function readimagefile($filehandle, string $fileName = null) : bool {}
    function readimages(string $filenames) : Imagick {}
    function recolorImage(array $matrix) : bool {}
    function reduceNoiseImage(float $radius) : bool {}
    function remapimage(Imagick $replacement, int $DITHER) : bool {}
    function removeimage() : bool {}
    function removeimageprofile(string $name) : string {}
    function render() : bool {}
    function resampleimage(float $x_resolution, float $y_resolution, int $filter, float $blur) : bool {}
    function resetimagepage(string $page) : bool {}
    function resetiterator() {}
    function resizeimage(int $columns, int $rows, int $filter, float $blur, bool $bestfit = false) : bool {}
    function rewind() {}
    function rollimage(int $x, int $y) : bool {}
    function rotateimage($background, float $degrees) : bool {}
    function rotationalblurimage(string $angle, string $CHANNEL = Imagick::CHANNEL_DEFAULT) {}
    function roundCorners(float $x_rounding, float $y_rounding, float $stroke_width = 10, float $displace = 5, float $size_correction = -6) : bool {}
    function sampleimage(int $columns, int $rows) : bool {}
    function scaleimage(int $cols, int $rows, bool $bestfit = false) : bool {}
    function segmentimage(int $COLORSPACE, float $cluster_threshold, float $smooth_threshold, bool $verbose = false) : bool {}
    function selectiveblurimage(float $radius, float $sigma, float $threshold, int $CHANNEL) {}
    function separateimagechannel(int $channel) : bool {}
    function sepiatoneimage(float $threshold) : bool {}
    function setantialias() {}
    function setbackgroundcolor($background) : bool {}
    function setcolorspace(int $COLORSPACE) : bool {}
    function setcompression(int $compression) : bool {}
    function setcompressionquality(int $quality) : bool {}
    function setfilename(string $filename) : bool {}
    function setfirstiterator() : bool {}
    function setfont(string $font) : bool {}
    function setformat(string $format) : bool {}
    function setgravity(int $gravity) : bool {}
    function setimage(Imagick $replace) : bool {}
    function setimagealpha() {}
    function setimagealphachannel(int $mode) : bool {}
    function setimageartifact(string $artifact, string $value) : bool {}
    function setImageAttribute(string $key, string $value) {}
    function setimagebackgroundcolor($background) : bool {}
    function setImageBias(float $bias) : bool {}
    function setImageBiasQuantum(string $bias) {}
    function setimageblueprimary(float $x, float $y) : bool {}
    function setimagebordercolor($border) : bool {}
    function setimagechanneldepth(int $channel, int $depth) : bool {}
    function setimagechannelmask() {}
    function setImageClipMask(Imagick $clip_mask) : bool {}
    function setimagecolormapcolor(int $index, ImagickPixel $color) : bool {}
    function setimagecolorspace(int $colorspace) : bool {}
    function setimagecompose(int $compose) : bool {}
    function setimagecompression(int $compression) : bool {}
    function setimagecompressionquality(int $quality) : bool {}
    function setimagedelay(int $delay) : bool {}
    function setimagedepth(int $depth) : bool {}
    function setimagedispose(int $dispose) : bool {}
    function setimageextent(int $columns, int $rows) : bool {}
    function setimagefilename(string $filename) : bool {}
    function setimageformat(string $format) : bool {}
    function setimagegamma(float $gamma) : bool {}
    function setimagegravity(int $gravity) : bool {}
    function setimagegreenprimary(float $x, float $y) : bool {}
    function setImageIndex(int $index) : bool {}
    function setimageinterlacescheme(int $interlace_scheme) : bool {}
    function setImageInterpolateMethod(int $method) : bool {}
    function setimageiterations(int $iterations) : bool {}
    function setimagematte(bool $matte) : bool {}
    function setImageMatteColor($matte) : bool {}
    function setImageOpacity(float $opacity) : bool {}
    function setimageorientation(int $orientation) : bool {}
    function setimagepage(int $width, int $height, int $x, int $y) : bool {}
    function setimageprofile(string $name, string $profile) : bool {}
    function setimageprogressmonitor() {}
    function setimageproperty(string $name, string $value) : bool {}
    function setimageredprimary(float $x, float $y) : bool {}
    function setimagerenderingintent(int $rendering_intent) : bool {}
    function setimageresolution(float $x_resolution, float $y_resolution) : bool {}
    function setimagescene(int $scene) : bool {}
    function setimagetickspersecond(int $ticks_per_second) : bool {}
    function setimagetype(int $image_type) : bool {}
    function setimageunits(int $units) : bool {}
    function setimagevirtualpixelmethod(int $method) : bool {}
    function setimagewhitepoint(float $x, float $y) : bool {}
    function setinterlacescheme(int $interlace_scheme) : bool {}
    function setiteratorindex(int $index) : bool {}
    function setlastiterator() : bool {}
    function setoption(string $key, string $value) : bool {}
    function setpage(int $width, int $height, int $x, int $y) : bool {}
    function setpointsize(float $point_size) : bool {}
    function setprogressmonitor(callable $callback) {}
    function setregistry(string $key, string $value) {}
    function setresolution(float $x_resolution, float $y_resolution) : bool {}
    function setresourcelimit(int $type, int $limit) : bool {}
    function setsamplingfactors(array $factors) : bool {}
    function setsize(int $columns, int $rows) : bool {}
    function setsizeoffset(int $columns, int $rows, int $offset) : bool {}
    function settype(int $image_type) : bool {}
    function shadeimage(bool $gray, float $azimuth, float $elevation) : bool {}
    function shadowimage(float $opacity, float $sigma, int $x, int $y) : bool {}
    function sharpenimage(float $radius, float $sigma, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function shaveimage(int $columns, int $rows) : bool {}
    function shearimage($background, float $x_shear, float $y_shear) : bool {}
    function sigmoidalcontrastimage(bool $sharpen, float $alpha, float $beta, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function similarityimage() {}
    function sketchimage(float $radius, float $sigma, float $angle) : bool {}
    function smushimages(string $stack, string $offset) : Imagick {}
    function solarizeimage(int $threshold) : bool {}
    function sparsecolorimage(int $SPARSE_METHOD, array $arguments, int $channel = Imagick::CHANNEL_DEFAULT) : bool {}
    function spliceimage(int $width, int $height, int $x, int $y) : bool {}
    function spreadimage(float $radius) : bool {}
    function statisticimage(int $type, int $width, int $height, string $CHANNEL = Imagick::CHANNEL_DEFAULT) {}
    function steganoimage(Imagick $watermark_wand, int $offset) : Imagick {}
    function stereoimage(Imagick $offset_wand) : bool {}
    function stripimage() : bool {}
    function subimagematch(Imagick $Imagick, array &$offset = [], float &$similarity = 0) : Imagick {}
    function swirlimage(float $degrees) : bool {}
    function textureimage(Imagick $texture_wand) : Imagick {}
    function thresholdimage(float $threshold, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function thumbnailimage(int $columns, int $rows, bool $bestfit = false, bool $fill = false) : bool {}
    function tintimage($tint, $opacity) : bool {}
    function transformImage(string $crop, string $geometry) : Imagick {}
    function transformimagecolorspace(int $colorspace) : bool {}
    function transparentpaintimage($target, float $alpha, float $fuzz, bool $invert) : bool {}
    function transposeimage() : bool {}
    function transverseimage() : bool {}
    function trimimage(float $fuzz) : bool {}
    function uniqueimagecolors() : bool {}
    function unsharpmaskimage(float $radius, float $sigma, float $amount, float $threshold, int $channel = Imagick::CHANNEL_ALL) : bool {}
    function valid() : bool {}
    function vignetteimage(float $blackPoint, float $whitePoint, int $x, int $y) : bool {}
    function waveimage(float $amplitude, float $length) : bool {}
    function whitethresholdimage($threshold) : bool {}
    function writeimage(string $filename = null) : bool {}
    function writeimagefile($filehandle) : bool {}
    function writeimages(string $filename, bool $adjoin) : bool {}
    function writeimagesfile($filehandle) : bool {}
}

class ImagickDraw
{
    function __construct() {}
    function affine(array $affine) : bool {}
    function alpha() {}
    function annotation(float $x, float $y, string $text) : bool {}
    function arc(float $sx, float $sy, float $ex, float $ey, float $sd, float $ed) : bool {}
    function bezier(array $coordinates) : bool {}
    function circle(float $ox, float $oy, float $px, float $py) : bool {}
    function clear() : bool {}
    function clone() : ImagickDraw {}
    function color(float $x, float $y, int $paintMethod) : bool {}
    function comment(string $comment) : bool {}
    function composite(int $compose, float $x, float $y, float $width, float $height, Imagick $compositeWand) : bool {}
    function destroy() : bool {}
    function ellipse(float $ox, float $oy, float $rx, float $ry, float $start, float $end) : bool {}
    function getbordercolor() {}
    function getclippath() : string {}
    function getcliprule() : int {}
    function getclipunits() : int {}
    function getdensity() {}
    function getfillcolor() : ImagickPixel {}
    function getfillopacity() : float {}
    function getfillrule() : int {}
    function getfont() : string {}
    function getfontfamily() : string {}
    function getfontresolution() {}
    function getfontsize() : float {}
    function getfontstretch() : int {}
    function getfontstyle() : int {}
    function getfontweight() : int {}
    function getgravity() : int {}
    function getopacity() {}
    function getstrokeantialias() : bool {}
    function getstrokecolor() : ImagickPixel {}
    function getstrokedasharray() : array {}
    function getstrokedashoffset() : float {}
    function getstrokelinecap() : int {}
    function getstrokelinejoin() : int {}
    function getstrokemiterlimit() : int {}
    function getstrokeopacity() : float {}
    function getstrokewidth() : float {}
    function gettextalignment() : int {}
    function gettextantialias() : bool {}
    function gettextdecoration() : int {}
    function gettextdirection() {}
    function gettextencoding() : string {}
    function gettextinterlinespacing() : float {}
    function gettextinterwordspacing() : float {}
    function gettextkerning() : float {}
    function gettextundercolor() : ImagickPixel {}
    function getvectorgraphics() : string {}
    function line(float $sx, float $sy, float $ex, float $ey) : bool {}
    function matte(float $x, float $y, int $paintMethod) : bool {}
    function pathclose() : bool {}
    function pathcurvetoabsolute(float $x1, float $y1, float $x2, float $y2, float $x, float $y) : bool {}
    function pathcurvetoquadraticbezierabsolute(float $x1, float $y1, float $x, float $y) : bool {}
    function pathcurvetoquadraticbezierrelative(float $x1, float $y1, float $x, float $y) : bool {}
    function pathcurvetoquadraticbeziersmoothabsolute(float $x, float $y) : bool {}
    function pathcurvetoquadraticbeziersmoothrelative(float $x, float $y) : bool {}
    function pathcurvetorelative(float $x1, float $y1, float $x2, float $y2, float $x, float $y) : bool {}
    function pathcurvetosmoothabsolute(float $x2, float $y2, float $x, float $y) : bool {}
    function pathcurvetosmoothrelative(float $x2, float $y2, float $x, float $y) : bool {}
    function pathellipticarcabsolute(float $rx, float $ry, float $x_axis_rotation, bool $large_arc_flag, bool $sweep_flag, float $x, float $y) : bool {}
    function pathellipticarcrelative(float $rx, float $ry, float $x_axis_rotation, bool $large_arc_flag, bool $sweep_flag, float $x, float $y) : bool {}
    function pathfinish() : bool {}
    function pathlinetoabsolute(float $x, float $y) : bool {}
    function pathlinetohorizontalabsolute(float $x) : bool {}
    function pathlinetohorizontalrelative(float $x) : bool {}
    function pathlinetorelative(float $x, float $y) : bool {}
    function pathlinetoverticalabsolute(float $y) : bool {}
    function pathlinetoverticalrelative(float $y) : bool {}
    function pathmovetoabsolute(float $x, float $y) : bool {}
    function pathmovetorelative(float $x, float $y) : bool {}
    function pathstart() : bool {}
    function point(float $x, float $y) : bool {}
    function polygon(array $coordinates) : bool {}
    function polyline(array $coordinates) : bool {}
    function pop() : bool {}
    function popclippath() : bool {}
    function popdefs() : bool {}
    function poppattern() : bool {}
    function push() : bool {}
    function pushclippath(string $clip_mask_id) : bool {}
    function pushdefs() : bool {}
    function pushpattern(string $pattern_id, float $x, float $y, float $width, float $height) : bool {}
    function rectangle(float $x1, float $y1, float $x2, float $y2) : bool {}
    function render() : bool {}
    function resetvectorgraphics() {}
    function rotate(float $degrees) : bool {}
    function roundrectangle(float $x1, float $y1, float $x2, float $y2, float $rx, float $ry) : bool {}
    function scale(float $x, float $y) : bool {}
    function setbordercolor() {}
    function setclippath(string $clip_mask) : bool {}
    function setcliprule(int $fill_rule) : bool {}
    function setclipunits(int $clip_units) : bool {}
    function setdensity() {}
    function setfillalpha(float $opacity) : bool {}
    function setfillcolor(ImagickPixel $fill_pixel) : bool {}
    function setfillopacity(float $fillOpacity) : bool {}
    function setfillpatternurl(string $fill_url) : bool {}
    function setfillrule(int $fill_rule) : bool {}
    function setfont(string $font_name) : bool {}
    function setfontfamily(string $font_family) : bool {}
    function setfontresolution() {}
    function setfontsize(float $pointsize) : bool {}
    function setfontstretch(int $fontStretch) : bool {}
    function setfontstyle(int $style) : bool {}
    function setfontweight(int $font_weight) : bool {}
    function setgravity(int $gravity) : bool {}
    function setopacity() {}
    function setresolution(string $x_resolution, string $y_resolution) {}
    function setstrokealpha(float $opacity) : bool {}
    function setstrokeantialias(bool $stroke_antialias) : bool {}
    function setstrokecolor(ImagickPixel $stroke_pixel) : bool {}
    function setstrokedasharray(array $dashArray) : bool {}
    function setstrokedashoffset(float $dash_offset) : bool {}
    function setstrokelinecap(int $linecap) : bool {}
    function setstrokelinejoin(int $linejoin) : bool {}
    function setstrokemiterlimit(int $miterlimit) : bool {}
    function setstrokeopacity(float $stroke_opacity) : bool {}
    function setstrokepatternurl(string $stroke_url) : bool {}
    function setstrokewidth(float $stroke_width) : bool {}
    function settextalignment(int $alignment) : bool {}
    function settextantialias(bool $antiAlias) : bool {}
    function settextdecoration(int $decoration) : bool {}
    function settextdirection() {}
    function settextencoding(string $encoding) : bool {}
    function settextinterlinespacing(float $spacing) {}
    function settextinterwordspacing(float $spacing) {}
    function settextkerning(float $kerning) {}
    function settextundercolor(ImagickPixel $under_color) : bool {}
    function setvectorgraphics(string $xml) : bool {}
    function setviewbox(int $x1, int $y1, int $x2, int $y2) : bool {}
    function skewx(float $degrees) : bool {}
    function skewy(float $degrees) : bool {}
    function translate(float $x, float $y) : bool {}
}

class ImagickDrawException extends Exception {}

class ImagickException extends Exception {}

class ImagickKernel
{
    function __construct() {}
    function addkernel(ImagickKernel $ImagickKernel) {}
    function addunitykernel() {}
    function frombuiltin(string $kernelType, string $kernelString) : ImagickKernel {}
    function frommatrix(array $matrix, array $origin = []) : ImagickKernel {}
    function getmatrix() : array {}
    function scale() {}
    function separate() : array {}
}

class ImagickKernelException extends Exception {}

class ImagickPixel
{
    function __construct(string $color = '') {}
    function clear() : bool {}
    function clone() {}
    function destroy() : bool {}
    function getcolor(bool $normalized = false) : array {}
    function getcolorasstring() : string {}
    function getcolorcount() : int {}
    function getcolorquantum() {}
    function getcolorvalue(int $color) : float {}
    function getcolorvaluequantum() {}
    function gethsl() : array {}
    function getindex() : int {}
    function ispixelsimilar(ImagickPixel $color, float $fuzz) : bool {}
    function ispixelsimilarquantum(string $color, string $fuzz = '') : bool {}
    function issimilar(ImagickPixel $color, float $fuzz) : bool {}
    function setcolor(string $color) : bool {}
    function setcolorcount(string $colorCount) {}
    function setcolorfrompixel() {}
    function setcolorvalue(int $color, float $value) : bool {}
    function setcolorvaluequantum(int $color, $value) {}
    function sethsl(float $hue, float $saturation, float $luminosity) : bool {}
    function setindex(int $index) {}
}

class ImagickPixelException extends Exception {}

class ImagickPixelIterator implements Iterator
{
    function __construct(Imagick $wand) {}
    function clear() : bool {}
    function current() {}
    function destroy() : bool {}
    function getcurrentiteratorrow() : array {}
    function getiteratorrow() : int {}
    function getnextiteratorrow() : array {}
    function getpixeliterator() {}
    function getpixelregioniterator() {}
    function getpreviousiteratorrow() : array {}
    function key() {}
    function newpixeliterator(Imagick $wand) : bool {}
    function newpixelregioniterator(Imagick $wand, int $x, int $y, int $columns, int $rows) : bool {}
    function next() {}
    function resetiterator() : bool {}
    function rewind() {}
    function setiteratorfirstrow() : bool {}
    function setiteratorlastrow() : bool {}
    function setiteratorrow(int $row) : bool {}
    function synciterator() : bool {}
    function valid() {}
}

class ImagickPixelIteratorException extends Exception {}
