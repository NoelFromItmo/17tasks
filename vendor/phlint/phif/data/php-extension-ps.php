<?php

/**
 * @param resource $psdoc
 * @param string $text
 * @param int $parent
 * @param int $open
 * @return int
 */
function ps_add_bookmark($psdoc, string $text, int $parent = 0, int $open = 0) : int {}

/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $filename
 * @return bool
 */
function ps_add_launchlink($psdoc, float $llx, float $lly, float $urx, float $ury, string $filename) : bool {}

/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param int $page
 * @param string $dest
 * @return bool
 */
function ps_add_locallink($psdoc, float $llx, float $lly, float $urx, float $ury, int $page, string $dest) : bool {}

/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $contents
 * @param string $title
 * @param string $icon
 * @param int $open
 * @return bool
 */
function ps_add_note($psdoc, float $llx, float $lly, float $urx, float $ury, string $contents, string $title, string $icon, int $open) : bool {}

/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $filename
 * @param int $page
 * @param string $dest
 * @return bool
 */
function ps_add_pdflink($psdoc, float $llx, float $lly, float $urx, float $ury, string $filename, int $page, string $dest) : bool {}

/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $url
 * @return bool
 */
function ps_add_weblink($psdoc, float $llx, float $lly, float $urx, float $ury, string $url) : bool {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $radius
 * @param float $alpha
 * @param float $beta
 * @return bool
 */
function ps_arc($psdoc, float $x, float $y, float $radius, float $alpha, float $beta) : bool {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $radius
 * @param float $alpha
 * @param float $beta
 * @return bool
 */
function ps_arcn($psdoc, float $x, float $y, float $radius, float $alpha, float $beta) : bool {}

/**
 * @param resource $psdoc
 * @param float $width
 * @param float $height
 * @return bool
 */
function ps_begin_page($psdoc, float $width, float $height) : bool {}

/**
 * @param resource $psdoc
 * @param float $width
 * @param float $height
 * @param float $xstep
 * @param float $ystep
 * @param int $painttype
 * @return int
 */
function ps_begin_pattern($psdoc, float $width, float $height, float $xstep, float $ystep, int $painttype) : int {}

/**
 * @param resource $psdoc
 * @param float $width
 * @param float $height
 * @return int
 */
function ps_begin_template($psdoc, float $width, float $height) : int {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $radius
 * @return bool
 */
function ps_circle($psdoc, float $x, float $y, float $radius) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_clip($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_close($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @param int $imageid
 * @return void
 */
function ps_close_image($psdoc, int $imageid) {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_closepath($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_closepath_stroke($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @param string $text
 * @return bool
 */
function ps_continue_text($psdoc, string $text) : bool {}

/**
 * @param resource $psdoc
 * @param float $x1
 * @param float $y1
 * @param float $x2
 * @param float $y2
 * @param float $x3
 * @param float $y3
 * @return bool
 */
function ps_curveto($psdoc, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_delete($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_end_page($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_end_pattern($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_end_template($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_fill($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_fill_stroke($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @param string $fontname
 * @param string $encoding
 * @param bool $embed
 * @return int
 */
function ps_findfont($psdoc, string $fontname, string $encoding, bool $embed = false) : int {}

/**
 * @param resource $psdoc
 * @return string
 */
function ps_get_buffer($psdoc) : string {}

/**
 * @param resource $psdoc
 * @param string $name
 * @param float $modifier
 * @return string
 */
function ps_get_parameter($psdoc, string $name, float $modifier = 0) : string {}

/**
 * @param resource $psdoc
 * @param string $name
 * @param float $modifier
 * @return float
 */
function ps_get_value($psdoc, string $name, float $modifier = 0) : float {}

/**
 * @param resource $psdoc
 * @param string $text
 * @return array
 */
function ps_hyphenate($psdoc, string $text) : array {}

/**
 * @param resource $psdoc
 * @param string $file
 * @return bool
 */
function ps_include_file($psdoc, string $file) : bool {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @return bool
 */
function ps_lineto($psdoc, float $x, float $y) : bool {}

/**
 * @param resource $psdoc
 * @param string $name
 * @param int $reserved
 * @return int
 */
function ps_makespotcolor($psdoc, string $name, int $reserved = 0) : int {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @return bool
 */
function ps_moveto($psdoc, float $x, float $y) : bool {}

/**
 * @return resource
 */
function ps_new() {}

/**
 * @param resource $psdoc
 * @param string $filename
 * @return bool
 */
function ps_open_file($psdoc, string $filename = '') : bool {}

/**
 * @param resource $psdoc
 * @param string $type
 * @param string $source
 * @param string $data
 * @param int $lenght
 * @param int $width
 * @param int $height
 * @param int $components
 * @param int $bpc
 * @param string $params
 * @return int
 */
function ps_open_image($psdoc, string $type, string $source, string $data, int $lenght, int $width, int $height, int $components, int $bpc, string $params) : int {}

/**
 * @param resource $psdoc
 * @param string $type
 * @param string $filename
 * @param string $stringparam
 * @param int $intparam
 * @return int
 */
function ps_open_image_file($psdoc, string $type, string $filename, string $stringparam = '', int $intparam = 0) : int {}

/**
 * @param resource $psdoc
 * @param int $gd
 * @return int
 */
function ps_open_memory_image($psdoc, int $gd) : int {}

/**
 * @param resource $psdoc
 * @param int $imageid
 * @param float $x
 * @param float $y
 * @param float $scale
 * @return bool
 */
function ps_place_image($psdoc, int $imageid, float $x, float $y, float $scale) : bool {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $width
 * @param float $height
 * @return bool
 */
function ps_rect($psdoc, float $x, float $y, float $width, float $height) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_restore($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @param float $rot
 * @return bool
 */
function ps_rotate($psdoc, float $rot) : bool {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_save($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @return bool
 */
function ps_scale($psdoc, float $x, float $y) : bool {}

/**
 * @param resource $psdoc
 * @param float $red
 * @param float $green
 * @param float $blue
 * @return bool
 */
function ps_set_border_color($psdoc, float $red, float $green, float $blue) : bool {}

/**
 * @param resource $psdoc
 * @param float $black
 * @param float $white
 * @return bool
 */
function ps_set_border_dash($psdoc, float $black, float $white) : bool {}

/**
 * @param resource $psdoc
 * @param string $style
 * @param float $width
 * @return bool
 */
function ps_set_border_style($psdoc, string $style, float $width) : bool {}

/**
 * @param resource $p
 * @param string $key
 * @param string $val
 * @return bool
 */
function ps_set_info($p, string $key, string $val) : bool {}

/**
 * @param resource $psdoc
 * @param string $name
 * @param string $value
 * @return bool
 */
function ps_set_parameter($psdoc, string $name, string $value) : bool {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @return bool
 */
function ps_set_text_pos($psdoc, float $x, float $y) : bool {}

/**
 * @param resource $psdoc
 * @param string $name
 * @param float $value
 * @return bool
 */
function ps_set_value($psdoc, string $name, float $value) : bool {}

/**
 * @param resource $psdoc
 * @param string $type
 * @param string $colorspace
 * @param float $c1
 * @param float $c2
 * @param float $c3
 * @param float $c4
 * @return bool
 */
function ps_setcolor($psdoc, string $type, string $colorspace, float $c1, float $c2, float $c3, float $c4) : bool {}

/**
 * @param resource $psdoc
 * @param float $on
 * @param float $off
 * @return bool
 */
function ps_setdash($psdoc, float $on, float $off) : bool {}

/**
 * @param resource $psdoc
 * @param float $value
 * @return bool
 */
function ps_setflat($psdoc, float $value) : bool {}

/**
 * @param resource $psdoc
 * @param int $fontid
 * @param float $size
 * @return bool
 */
function ps_setfont($psdoc, int $fontid, float $size) : bool {}

/**
 * @param resource $psdoc
 * @param float $gray
 * @return bool
 */
function ps_setgray($psdoc, float $gray) : bool {}

/**
 * @param resource $psdoc
 * @param int $type
 * @return bool
 */
function ps_setlinecap($psdoc, int $type) : bool {}

/**
 * @param resource $psdoc
 * @param int $type
 * @return bool
 */
function ps_setlinejoin($psdoc, int $type) : bool {}

/**
 * @param resource $psdoc
 * @param float $width
 * @return bool
 */
function ps_setlinewidth($psdoc, float $width) : bool {}

/**
 * @param resource $psdoc
 * @param float $value
 * @return bool
 */
function ps_setmiterlimit($psdoc, float $value) : bool {}

/**
 * @param resource $psdoc
 * @param int $mode
 * @return bool
 */
function ps_setoverprintmode($psdoc, int $mode) : bool {}

/**
 * @param resource $psdoc
 * @param float $arr
 * @return bool
 */
function ps_setpolydash($psdoc, float $arr) : bool {}

/**
 * @param resource $psdoc
 * @param string $type
 * @param float $x0
 * @param float $y0
 * @param float $x1
 * @param float $y1
 * @param float $c1
 * @param float $c2
 * @param float $c3
 * @param float $c4
 * @param string $optlist
 * @return int
 */
function ps_shading($psdoc, string $type, float $x0, float $y0, float $x1, float $y1, float $c1, float $c2, float $c3, float $c4, string $optlist) : int {}

/**
 * @param resource $psdoc
 * @param int $shadingid
 * @param string $optlist
 * @return int
 */
function ps_shading_pattern($psdoc, int $shadingid, string $optlist) : int {}

/**
 * @param resource $psdoc
 * @param int $shadingid
 * @return bool
 */
function ps_shfill($psdoc, int $shadingid) : bool {}

/**
 * @param resource $psdoc
 * @param string $text
 * @return bool
 */
function ps_show($psdoc, string $text) : bool {}

/**
 * @param resource $psdoc
 * @param string $text
 * @param int $len
 * @return bool
 */
function ps_show2($psdoc, string $text, int $len) : bool {}

/**
 * @param resource $psdoc
 * @param string $text
 * @param float $left
 * @param float $bottom
 * @param float $width
 * @param float $height
 * @param string $hmode
 * @param string $feature
 * @return int
 */
function ps_show_boxed($psdoc, string $text, float $left, float $bottom, float $width, float $height, string $hmode, string $feature = '') : int {}

/**
 * @param resource $psdoc
 * @param string $text
 * @param float $x
 * @param float $y
 * @return bool
 */
function ps_show_xy($psdoc, string $text, float $x, float $y) : bool {}

/**
 * @param resource $psdoc
 * @param string $text
 * @param int $len
 * @param float $xcoor
 * @param float $ycoor
 * @return bool
 */
function ps_show_xy2($psdoc, string $text, int $len, float $xcoor, float $ycoor) : bool {}

/**
 * @param resource $psdoc
 * @param string $text
 * @param int $fontid
 * @param float $size
 * @return array
 */
function ps_string_geometry($psdoc, string $text, int $fontid = 0, float $size = 0.0) : array {}

/**
 * @param resource $psdoc
 * @param string $text
 * @param int $fontid
 * @param float $size
 * @return float
 */
function ps_stringwidth($psdoc, string $text, int $fontid = 0, float $size = 0.0) : float {}

/**
 * @param resource $psdoc
 * @return bool
 */
function ps_stroke($psdoc) : bool {}

/**
 * @param resource $psdoc
 * @param int $ord
 * @return bool
 */
function ps_symbol($psdoc, int $ord) : bool {}

/**
 * @param resource $psdoc
 * @param int $ord
 * @param int $fontid
 * @return string
 */
function ps_symbol_name($psdoc, int $ord, int $fontid = 0) : string {}

/**
 * @param resource $psdoc
 * @param int $ord
 * @param int $fontid
 * @param float $size
 * @return float
 */
function ps_symbol_width($psdoc, int $ord, int $fontid = 0, float $size = 0.0) : float {}

/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @return bool
 */
function ps_translate($psdoc, float $x, float $y) : bool {}
