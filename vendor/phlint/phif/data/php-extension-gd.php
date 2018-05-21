<?php

const GD_BUNDLED = 1;
const GD_EXTRA_VERSION = '';
const GD_MAJOR_VERSION = 2;
const GD_MINOR_VERSION = 0;
const GD_RELEASE_VERSION = 35;
const GD_VERSION = '';
const IMG_AFFINE_ROTATE = 2;
const IMG_AFFINE_SCALE = 1;
const IMG_AFFINE_SHEAR_HORIZONTAL = 3;
const IMG_AFFINE_SHEAR_VERTICAL = 4;
const IMG_AFFINE_TRANSLATE = 0;
const IMG_ARC_CHORD = 1;
const IMG_ARC_EDGED = 4;
const IMG_ARC_NOFILL = 2;
const IMG_ARC_PIE = 0;
const IMG_ARC_ROUNDED = 0;
const IMG_BELL = 1;
const IMG_BESSEL = 2;
const IMG_BICUBIC = 4;
const IMG_BICUBIC_FIXED = 5;
const IMG_BILINEAR_FIXED = 3;
const IMG_BLACKMAN = 6;
const IMG_BMP = 64;
const IMG_BOX = 7;
const IMG_BSPLINE = 8;
const IMG_CATMULLROM = 9;
const IMG_COLOR_BRUSHED = -3;
const IMG_COLOR_STYLED = -2;
const IMG_COLOR_STYLEDBRUSHED = -4;
const IMG_COLOR_TILED = -5;
const IMG_COLOR_TRANSPARENT = -6;
const IMG_CROP_BLACK = 2;
const IMG_CROP_DEFAULT = 0;
const IMG_CROP_SIDES = 4;
const IMG_CROP_THRESHOLD = 5;
const IMG_CROP_TRANSPARENT = 1;
const IMG_CROP_WHITE = 3;
const IMG_EFFECT_ALPHABLEND = 1;
const IMG_EFFECT_MULTIPLY = 4;
const IMG_EFFECT_NORMAL = 2;
const IMG_EFFECT_OVERLAY = 3;
const IMG_EFFECT_REPLACE = 0;
const IMG_FILTER_BRIGHTNESS = 2;
const IMG_FILTER_COLORIZE = 4;
const IMG_FILTER_CONTRAST = 3;
const IMG_FILTER_EDGEDETECT = 5;
const IMG_FILTER_EMBOSS = 6;
const IMG_FILTER_GAUSSIAN_BLUR = 7;
const IMG_FILTER_GRAYSCALE = 1;
const IMG_FILTER_MEAN_REMOVAL = 9;
const IMG_FILTER_NEGATE = 0;
const IMG_FILTER_PIXELATE = 11;
const IMG_FILTER_SELECTIVE_BLUR = 8;
const IMG_FILTER_SMOOTH = 10;
const IMG_FLIP_BOTH = 3;
const IMG_FLIP_HORIZONTAL = 1;
const IMG_FLIP_VERTICAL = 2;
const IMG_GAUSSIAN = 10;
const IMG_GD2_COMPRESSED = 2;
const IMG_GD2_RAW = 1;
const IMG_GENERALIZED_CUBIC = 11;
const IMG_GIF = 1;
const IMG_HAMMING = 13;
const IMG_HANNING = 14;
const IMG_HERMITE = 12;
const IMG_JPEG = 2;
const IMG_JPG = 2;
const IMG_MITCHELL = 15;
const IMG_NEAREST_NEIGHBOUR = 16;
const IMG_PNG = 4;
const IMG_POWER = 17;
const IMG_QUADRATIC = 18;
const IMG_SINC = 19;
const IMG_TRIANGLE = 20;
const IMG_WBMP = 8;
const IMG_WEBP = 32;
const IMG_WEIGHTED4 = 21;
const IMG_XPM = 16;
const PNG_ALL_FILTERS = 248;
const PNG_FILTER_AVG = 64;
const PNG_FILTER_NONE = 8;
const PNG_FILTER_PAETH = 128;
const PNG_FILTER_SUB = 16;
const PNG_FILTER_UP = 32;
const PNG_NO_FILTER = 0;

/**
 * @return array
 */
function gd_info() : array {}

/**
 * @param resource $image
 * @param string $filename
 * @param int $threshold
 * @return bool
 */
function image2wbmp($image, string $filename = '', int $threshold = 0) : bool {}

/**
 * @param resource $image
 * @param array $affine
 * @param array $clip
 * @return resource
 */
function imageaffine($image, array $affine, array $clip = []) {}

/**
 * @param array $m1
 * @param array $m2
 * @return array
 */
function imageaffinematrixconcat(array $m1, array $m2) : array {}

/**
 * @param int $type
 * @param mixed $options
 * @return array
 */
function imageaffinematrixget(int $type, $options = null) : array {}

/**
 * @param resource $image
 * @param bool $blendmode
 * @return bool
 */
function imagealphablending($image, bool $blendmode) : bool {}

/**
 * @param resource $image
 * @param bool $enabled
 * @return bool
 */
function imageantialias($image, bool $enabled) : bool {}

/**
 * @param resource $image
 * @param int $cx
 * @param int $cy
 * @param int $width
 * @param int $height
 * @param int $start
 * @param int $end
 * @param int $color
 * @return bool
 */
function imagearc($image, int $cx, int $cy, int $width, int $height, int $start, int $end, int $color) : bool {}

/**
 * @param resource $image
 * @param mixed $to
 * @param bool $compressed
 * @return bool
 */
function imagebmp($image, $to = null, bool $compressed = true) : bool {}

/**
 * @param resource $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $c
 * @param int $color
 * @return bool
 */
function imagechar($image, int $font, int $x, int $y, string $c, int $color) : bool {}

/**
 * @param resource $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $c
 * @param int $color
 * @return bool
 */
function imagecharup($image, int $font, int $x, int $y, string $c, int $color) : bool {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @return int
 */
function imagecolorallocate($image, int $red, int $green, int $blue) : int {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $alpha
 * @return int
 */
function imagecolorallocatealpha($image, int $red, int $green, int $blue, int $alpha) : int {}

/**
 * @param resource $image
 * @param int $x
 * @param int $y
 * @return int
 */
function imagecolorat($image, int $x, int $y) : int {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @return int
 */
function imagecolorclosest($image, int $red, int $green, int $blue) : int {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $alpha
 * @return int
 */
function imagecolorclosestalpha($image, int $red, int $green, int $blue, int $alpha) : int {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @return int
 */
function imagecolorclosesthwb($image, int $red, int $green, int $blue) : int {}

/**
 * @param resource $image
 * @param int $color
 * @return bool
 */
function imagecolordeallocate($image, int $color) : bool {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @return int
 */
function imagecolorexact($image, int $red, int $green, int $blue) : int {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $alpha
 * @return int
 */
function imagecolorexactalpha($image, int $red, int $green, int $blue, int $alpha) : int {}

/**
 * @param resource $image1
 * @param resource $image2
 * @return bool
 */
function imagecolormatch($image1, $image2) : bool {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @return int
 */
function imagecolorresolve($image, int $red, int $green, int $blue) : int {}

/**
 * @param resource $image
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $alpha
 * @return int
 */
function imagecolorresolvealpha($image, int $red, int $green, int $blue, int $alpha) : int {}

/**
 * @param resource $image
 * @param int $index
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $alpha
 * @return void
 */
function imagecolorset($image, int $index, int $red, int $green, int $blue, int $alpha = 0) {}

/**
 * @param resource $image
 * @param int $index
 * @return array
 */
function imagecolorsforindex($image, int $index) : array {}

/**
 * @param resource $image
 * @return int
 */
function imagecolorstotal($image) : int {}

/**
 * @param resource $image
 * @param int $color
 * @return int
 */
function imagecolortransparent($image, int $color = 0) : int {}

/**
 * @param resource $image
 * @param array $matrix
 * @param float $div
 * @param float $offset
 * @return bool
 */
function imageconvolution($image, array $matrix, float $div, float $offset) : bool {}

/**
 * @param resource $dst_im
 * @param resource $src_im
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $src_w
 * @param int $src_h
 * @return bool
 */
function imagecopy($dst_im, $src_im, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_w, int $src_h) : bool {}

/**
 * @param resource $dst_im
 * @param resource $src_im
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $src_w
 * @param int $src_h
 * @param int $pct
 * @return bool
 */
function imagecopymerge($dst_im, $src_im, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_w, int $src_h, int $pct) : bool {}

/**
 * @param resource $dst_im
 * @param resource $src_im
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $src_w
 * @param int $src_h
 * @param int $pct
 * @return bool
 */
function imagecopymergegray($dst_im, $src_im, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_w, int $src_h, int $pct) : bool {}

/**
 * @param resource $dst_image
 * @param resource $src_image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $dst_w
 * @param int $dst_h
 * @param int $src_w
 * @param int $src_h
 * @return bool
 */
function imagecopyresampled($dst_image, $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_w, int $dst_h, int $src_w, int $src_h) : bool {}

/**
 * @param resource $dst_image
 * @param resource $src_image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $dst_w
 * @param int $dst_h
 * @param int $src_w
 * @param int $src_h
 * @return bool
 */
function imagecopyresized($dst_image, $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_w, int $dst_h, int $src_w, int $src_h) : bool {}

/**
 * @param int $width
 * @param int $height
 * @return resource
 */
function imagecreate(int $width, int $height) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefrombmp(string $filename) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromgd(string $filename) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromgd2(string $filename) {}

/**
 * @param string $filename
 * @param int $srcX
 * @param int $srcY
 * @param int $width
 * @param int $height
 * @return resource
 */
function imagecreatefromgd2part(string $filename, int $srcX, int $srcY, int $width, int $height) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromgif(string $filename) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromjpeg(string $filename) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefrompng(string $filename) {}

/**
 * @param string $image
 * @return resource
 */
function imagecreatefromstring(string $image) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromwbmp(string $filename) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromwebp(string $filename) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromxbm(string $filename) {}

/**
 * @param string $filename
 * @return resource
 */
function imagecreatefromxpm(string $filename) {}

/**
 * @param int $width
 * @param int $height
 * @return resource
 */
function imagecreatetruecolor(int $width, int $height) {}

/**
 * @param resource $image
 * @param array $rect
 * @return resource
 */
function imagecrop($image, array $rect) {}

/**
 * @param resource $image
 * @param int $mode
 * @param float $threshold
 * @param int $color
 * @return resource
 */
function imagecropauto($image, int $mode = -1, float $threshold = 0.5, int $color = -1) {}

/**
 * @param resource $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
 * @return bool
 */
function imagedashedline($image, int $x1, int $y1, int $x2, int $y2, int $color) : bool {}

/**
 * @param resource $image
 * @return bool
 */
function imagedestroy($image) : bool {}

/**
 * @param resource $image
 * @param int $cx
 * @param int $cy
 * @param int $width
 * @param int $height
 * @param int $color
 * @return bool
 */
function imageellipse($image, int $cx, int $cy, int $width, int $height, int $color) : bool {}

/**
 * @param resource $image
 * @param int $x
 * @param int $y
 * @param int $color
 * @return bool
 */
function imagefill($image, int $x, int $y, int $color) : bool {}

/**
 * @param resource $image
 * @param int $cx
 * @param int $cy
 * @param int $width
 * @param int $height
 * @param int $start
 * @param int $end
 * @param int $color
 * @param int $style
 * @return bool
 */
function imagefilledarc($image, int $cx, int $cy, int $width, int $height, int $start, int $end, int $color, int $style) : bool {}

/**
 * @param resource $image
 * @param int $cx
 * @param int $cy
 * @param int $width
 * @param int $height
 * @param int $color
 * @return bool
 */
function imagefilledellipse($image, int $cx, int $cy, int $width, int $height, int $color) : bool {}

/**
 * @param resource $image
 * @param array $points
 * @param int $num_points
 * @param int $color
 * @return bool
 */
function imagefilledpolygon($image, array $points, int $num_points, int $color) : bool {}

/**
 * @param resource $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
 * @return bool
 */
function imagefilledrectangle($image, int $x1, int $y1, int $x2, int $y2, int $color) : bool {}

/**
 * @param resource $image
 * @param int $x
 * @param int $y
 * @param int $border
 * @param int $color
 * @return bool
 */
function imagefilltoborder($image, int $x, int $y, int $border, int $color) : bool {}

/**
 * @param resource $image
 * @param int $filtertype
 * @param int $arg1
 * @param int $arg2
 * @param int $arg3
 * @param int $arg4
 * @return bool
 */
function imagefilter($image, int $filtertype, int $arg1 = 0, int $arg2 = 0, int $arg3 = 0, int $arg4 = 0) : bool {}

/**
 * @param resource $image
 * @param int $mode
 * @return bool
 */
function imageflip($image, int $mode) : bool {}

/**
 * @param int $font
 * @return int
 */
function imagefontheight(int $font) : int {}

/**
 * @param int $font
 * @return int
 */
function imagefontwidth(int $font) : int {}

/**
 * @param float $size
 * @param float $angle
 * @param string $fontfile
 * @param string $text
 * @param array $extrainfo
 * @return array
 */
function imageftbbox(float $size, float $angle, string $fontfile, string $text, array $extrainfo = []) : array {}

/**
 * @param resource $image
 * @param float $size
 * @param float $angle
 * @param int $x
 * @param int $y
 * @param int $color
 * @param string $fontfile
 * @param string $text
 * @param array $extrainfo
 * @return array
 */
function imagefttext($image, float $size, float $angle, int $x, int $y, int $color, string $fontfile, string $text, array $extrainfo = []) : array {}

/**
 * @param resource $image
 * @param float $inputgamma
 * @param float $outputgamma
 * @return bool
 */
function imagegammacorrect($image, float $inputgamma, float $outputgamma) : bool {}

/**
 * @param resource $image
 * @param mixed $to
 * @return bool
 */
function imagegd($image, $to = null) : bool {}

/**
 * @param resource $image
 * @param mixed $to
 * @param int $chunk_size
 * @param int $type
 * @return bool
 */
function imagegd2($image, $to = null, int $chunk_size = 128, int $type = IMG_GD2_RAW) : bool {}

/**
 * @param resource $im
 * @return array
 */
function imagegetclip($im) : array {}

/**
 * @param resource $image
 * @param mixed $to
 * @return bool
 */
function imagegif($image, $to = null) : bool {}

/**
 * @return resource
 */
function imagegrabscreen() {}

/**
 * @param int $window_handle
 * @param int $client_area
 * @return resource
 */
function imagegrabwindow(int $window_handle, int $client_area = 0) {}

/**
 * @param resource $image
 * @param int $interlace
 * @return int
 */
function imageinterlace($image, int $interlace = 0) : int {}

/**
 * @param resource $image
 * @return bool
 */
function imageistruecolor($image) : bool {}

/**
 * @param resource $image
 * @param mixed $to
 * @param int $quality
 * @return bool
 */
function imagejpeg($image, $to = null, int $quality = 0) : bool {}

/**
 * @param resource $image
 * @param int $effect
 * @return bool
 */
function imagelayereffect($image, int $effect) : bool {}

/**
 * @param resource $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
 * @return bool
 */
function imageline($image, int $x1, int $y1, int $x2, int $y2, int $color) : bool {}

/**
 * @param string $file
 * @return int
 */
function imageloadfont(string $file) : int {}

/**
 * @param resource $image
 * @param array $points
 * @param int $num_points
 * @param int $color
 * @return bool
 */
function imageopenpolygon($image, array $points, int $num_points, int $color) : bool {}

/**
 * @param resource $destination
 * @param resource $source
 * @return void
 */
function imagepalettecopy($destination, $source) {}

/**
 * @param resource $src
 * @return bool
 */
function imagepalettetotruecolor($src) : bool {}

/**
 * @param resource $image
 * @param mixed $to
 * @param int $quality
 * @param int $filters
 * @return bool
 */
function imagepng($image, $to = null, int $quality = 0, int $filters = 0) : bool {}

/**
 * @param resource $image
 * @param array $points
 * @param int $num_points
 * @param int $color
 * @return bool
 */
function imagepolygon($image, array $points, int $num_points, int $color) : bool {}

/**
 * @param resource $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
 * @return bool
 */
function imagerectangle($image, int $x1, int $y1, int $x2, int $y2, int $color) : bool {}

/**
 * @param resource $image
 * @param int $res_x
 * @param int $res_y
 * @return mixed
 */
function imageresolution($image, int $res_x = 0, int $res_y = 0) {}

/**
 * @param resource $image
 * @param float $angle
 * @param int $bgd_color
 * @param int $ignore_transparent
 * @return resource
 */
function imagerotate($image, float $angle, int $bgd_color, int $ignore_transparent = 0) {}

/**
 * @param resource $image
 * @param bool $saveflag
 * @return bool
 */
function imagesavealpha($image, bool $saveflag) : bool {}

/**
 * @param resource $image
 * @param int $new_width
 * @param int $new_height
 * @param int $mode
 * @return resource
 */
function imagescale($image, int $new_width, int $new_height = -1, int $mode = IMG_BILINEAR_FIXED) {}

/**
 * @param resource $image
 * @param resource $brush
 * @return bool
 */
function imagesetbrush($image, $brush) : bool {}

/**
 * @param resource $im
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @return bool
 */
function imagesetclip($im, int $x1, int $y1, int $x2, int $y2) : bool {}

/**
 * @param resource $image
 * @param int $method
 * @return bool
 */
function imagesetinterpolation($image, int $method = IMG_BILINEAR_FIXED) : bool {}

/**
 * @param resource $image
 * @param int $x
 * @param int $y
 * @param int $color
 * @return bool
 */
function imagesetpixel($image, int $x, int $y, int $color) : bool {}

/**
 * @param resource $image
 * @param array $style
 * @return bool
 */
function imagesetstyle($image, array $style) : bool {}

/**
 * @param resource $image
 * @param int $thickness
 * @return bool
 */
function imagesetthickness($image, int $thickness) : bool {}

/**
 * @param resource $image
 * @param resource $tile
 * @return bool
 */
function imagesettile($image, $tile) : bool {}

/**
 * @param resource $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $string
 * @param int $color
 * @return bool
 */
function imagestring($image, int $font, int $x, int $y, string $string, int $color) : bool {}

/**
 * @param resource $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $string
 * @param int $color
 * @return bool
 */
function imagestringup($image, int $font, int $x, int $y, string $string, int $color) : bool {}

/**
 * @param resource $image
 * @return int
 */
function imagesx($image) : int {}

/**
 * @param resource $image
 * @return int
 */
function imagesy($image) : int {}

/**
 * @param resource $image
 * @param bool $dither
 * @param int $ncolors
 * @return bool
 */
function imagetruecolortopalette($image, bool $dither, int $ncolors) : bool {}

/**
 * @param float $size
 * @param float $angle
 * @param string $fontfile
 * @param string $text
 * @return array
 */
function imagettfbbox(float $size, float $angle, string $fontfile, string $text) : array {}

/**
 * @param resource $image
 * @param float $size
 * @param float $angle
 * @param int $x
 * @param int $y
 * @param int $color
 * @param string $fontfile
 * @param string $text
 * @return array
 */
function imagettftext($image, float $size, float $angle, int $x, int $y, int $color, string $fontfile, string $text) : array {}

/**
 * @return int
 */
function imagetypes() : int {}

/**
 * @param resource $image
 * @param mixed $to
 * @param int $foreground
 * @return bool
 */
function imagewbmp($image, $to = null, int $foreground = 0) : bool {}

/**
 * @param resource $image
 * @param mixed $to
 * @param int $quality
 * @return bool
 */
function imagewebp($image, $to = null, int $quality = 80) : bool {}

/**
 * @param resource $image
 * @param string $filename
 * @param int $foreground
 * @return bool
 */
function imagexbm($image, string $filename, int $foreground = 0) : bool {}

/**
 * @param string $jpegname
 * @param string $wbmpname
 * @param int $dest_height
 * @param int $dest_width
 * @param int $threshold
 * @return bool
 */
function jpeg2wbmp(string $jpegname, string $wbmpname, int $dest_height, int $dest_width, int $threshold) : bool {}

/**
 * @param string $pngname
 * @param string $wbmpname
 * @param int $dest_height
 * @param int $dest_width
 * @param int $threshold
 * @return bool
 */
function png2wbmp(string $pngname, string $wbmpname, int $dest_height, int $dest_width, int $threshold) : bool {}
