<?php

/**
 * @param resource $pdfdoc
 * @param int $id
 * @return bool
 */
function PDF_activate_item($pdfdoc, int $id) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $filename
 * @return bool
 */
function PDF_add_launchlink($pdfdoc, float $llx, float $lly, float $urx, float $ury, string $filename) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $lowerleftx
 * @param float $lowerlefty
 * @param float $upperrightx
 * @param float $upperrighty
 * @param int $page
 * @param string $dest
 * @return bool
 */
function PDF_add_locallink($pdfdoc, float $lowerleftx, float $lowerlefty, float $upperrightx, float $upperrighty, int $page, string $dest) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $name
 * @param string $optlist
 * @return bool
 */
function PDF_add_nameddest($pdfdoc, string $name, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
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
function PDF_add_note($pdfdoc, float $llx, float $lly, float $urx, float $ury, string $contents, string $title, string $icon, int $open) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $bottom_left_x
 * @param float $bottom_left_y
 * @param float $up_right_x
 * @param float $up_right_y
 * @param string $filename
 * @param int $page
 * @param string $dest
 * @return bool
 */
function PDF_add_pdflink($pdfdoc, float $bottom_left_x, float $bottom_left_y, float $up_right_x, float $up_right_y, string $filename, int $page, string $dest) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $table
 * @param int $column
 * @param int $row
 * @param string $text
 * @param string $optlist
 * @return int
 */
function PDF_add_table_cell($pdfdoc, int $table, int $column, int $row, string $text, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param int $textflow
 * @param string $text
 * @param string $optlist
 * @return int
 */
function PDF_add_textflow($pdfdoc, int $textflow, string $text, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param int $image
 * @return bool
 */
function PDF_add_thumbnail($pdfdoc, int $image) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $lowerleftx
 * @param float $lowerlefty
 * @param float $upperrightx
 * @param float $upperrighty
 * @param string $url
 * @return bool
 */
function PDF_add_weblink($pdfdoc, float $lowerleftx, float $lowerlefty, float $upperrightx, float $upperrighty, string $url) : bool {}

/**
 * @param resource $p
 * @param float $x
 * @param float $y
 * @param float $r
 * @param float $alpha
 * @param float $beta
 * @return bool
 */
function PDF_arc($p, float $x, float $y, float $r, float $alpha, float $beta) : bool {}

/**
 * @param resource $p
 * @param float $x
 * @param float $y
 * @param float $r
 * @param float $alpha
 * @param float $beta
 * @return bool
 */
function PDF_arcn($p, float $x, float $y, float $r, float $alpha, float $beta) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $filename
 * @param string $description
 * @param string $author
 * @param string $mimetype
 * @param string $icon
 * @return bool
 */
function PDF_attach_file($pdfdoc, float $llx, float $lly, float $urx, float $ury, string $filename, string $description, string $author, string $mimetype, string $icon) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $filename
 * @param string $optlist
 * @return int
 */
function PDF_begin_document($pdfdoc, string $filename, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param string $filename
 * @param float $a
 * @param float $b
 * @param float $c
 * @param float $d
 * @param float $e
 * @param float $f
 * @param string $optlist
 * @return bool
 */
function PDF_begin_font($pdfdoc, string $filename, float $a, float $b, float $c, float $d, float $e, float $f, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $glyphname
 * @param float $wx
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @return bool
 */
function PDF_begin_glyph($pdfdoc, string $glyphname, float $wx, float $llx, float $lly, float $urx, float $ury) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $tag
 * @param string $optlist
 * @return int
 */
function PDF_begin_item($pdfdoc, string $tag, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param int $layer
 * @return bool
 */
function PDF_begin_layer($pdfdoc, int $layer) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $width
 * @param float $height
 * @return bool
 */
function PDF_begin_page($pdfdoc, float $width, float $height) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $width
 * @param float $height
 * @param string $optlist
 * @return bool
 */
function PDF_begin_page_ext($pdfdoc, float $width, float $height, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $width
 * @param float $height
 * @param float $xstep
 * @param float $ystep
 * @param int $painttype
 * @return int
 */
function PDF_begin_pattern($pdfdoc, float $width, float $height, float $xstep, float $ystep, int $painttype) : int {}

/**
 * @param resource $pdfdoc
 * @param float $width
 * @param float $height
 * @return int
 */
function PDF_begin_template($pdfdoc, float $width, float $height) : int {}

/**
 * @param resource $pdfdoc
 * @param float $width
 * @param float $height
 * @param string $optlist
 * @return int
 */
function PDF_begin_template_ext($pdfdoc, float $width, float $height, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param float $x
 * @param float $y
 * @param float $r
 * @return bool
 */
function PDF_circle($pdfdoc, float $x, float $y, float $r) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_clip($p) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_close($p) : bool {}

/**
 * @param resource $p
 * @param int $image
 * @return bool
 */
function PDF_close_image($p, int $image) : bool {}

/**
 * @param resource $p
 * @param int $doc
 * @return bool
 */
function PDF_close_pdi($p, int $doc) : bool {}

/**
 * @param resource $p
 * @param int $page
 * @return bool
 */
function PDF_close_pdi_page($p, int $page) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_closepath($p) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_closepath_fill_stroke($p) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_closepath_stroke($p) : bool {}

/**
 * @param resource $p
 * @param float $a
 * @param float $b
 * @param float $c
 * @param float $d
 * @param float $e
 * @param float $f
 * @return bool
 */
function PDF_concat($p, float $a, float $b, float $c, float $d, float $e, float $f) : bool {}

/**
 * @param resource $p
 * @param string $text
 * @return bool
 */
function PDF_continue_text($p, string $text) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $username
 * @param string $optlist
 * @return int
 */
function PDF_create_3dview($pdfdoc, string $username, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param string $type
 * @param string $optlist
 * @return int
 */
function PDF_create_action($pdfdoc, string $type, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $type
 * @param string $optlist
 * @return bool
 */
function PDF_create_annotation($pdfdoc, float $llx, float $lly, float $urx, float $ury, string $type, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $text
 * @param string $optlist
 * @return int
 */
function PDF_create_bookmark($pdfdoc, string $text, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $name
 * @param string $type
 * @param string $optlist
 * @return bool
 */
function PDF_create_field($pdfdoc, float $llx, float $lly, float $urx, float $ury, string $name, string $type, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $name
 * @param string $optlist
 * @return bool
 */
function PDF_create_fieldgroup($pdfdoc, string $name, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $optlist
 * @return int
 */
function PDF_create_gstate($pdfdoc, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param string $filename
 * @param string $data
 * @param string $optlist
 * @return bool
 */
function PDF_create_pvf($pdfdoc, string $filename, string $data, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $text
 * @param string $optlist
 * @return int
 */
function PDF_create_textflow($pdfdoc, string $text, string $optlist) : int {}

/**
 * @param resource $p
 * @param float $x1
 * @param float $y1
 * @param float $x2
 * @param float $y2
 * @param float $x3
 * @param float $y3
 * @return bool
 */
function PDF_curveto($p, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $name
 * @param string $optlist
 * @return int
 */
function PDF_define_layer($pdfdoc, string $name, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @return bool
 */
function PDF_delete($pdfdoc) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $filename
 * @return int
 */
function PDF_delete_pvf($pdfdoc, string $filename) : int {}

/**
 * @param resource $pdfdoc
 * @param int $table
 * @param string $optlist
 * @return bool
 */
function PDF_delete_table($pdfdoc, int $table, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $textflow
 * @return bool
 */
function PDF_delete_textflow($pdfdoc, int $textflow) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $encoding
 * @param int $slot
 * @param string $glyphname
 * @param int $uv
 * @return bool
 */
function PDF_encoding_set_char($pdfdoc, string $encoding, int $slot, string $glyphname, int $uv) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $optlist
 * @return bool
 */
function PDF_end_document($pdfdoc, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @return bool
 */
function PDF_end_font($pdfdoc) : bool {}

/**
 * @param resource $pdfdoc
 * @return bool
 */
function PDF_end_glyph($pdfdoc) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $id
 * @return bool
 */
function PDF_end_item($pdfdoc, int $id) : bool {}

/**
 * @param resource $pdfdoc
 * @return bool
 */
function PDF_end_layer($pdfdoc) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_end_page($p) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $optlist
 * @return bool
 */
function PDF_end_page_ext($pdfdoc, string $optlist) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_end_pattern($p) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_end_template($p) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_endpath($p) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_fill($p) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $page
 * @param string $blockname
 * @param int $image
 * @param string $optlist
 * @return int
 */
function PDF_fill_imageblock($pdfdoc, int $page, string $blockname, int $image, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param int $page
 * @param string $blockname
 * @param int $contents
 * @param string $optlist
 * @return int
 */
function PDF_fill_pdfblock($pdfdoc, int $page, string $blockname, int $contents, string $optlist) : int {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_fill_stroke($p) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $page
 * @param string $blockname
 * @param string $text
 * @param string $optlist
 * @return int
 */
function PDF_fill_textblock($pdfdoc, int $page, string $blockname, string $text, string $optlist) : int {}

/**
 * @param resource $p
 * @param string $fontname
 * @param string $encoding
 * @param int $embed
 * @return int
 */
function PDF_findfont($p, string $fontname, string $encoding, int $embed) : int {}

/**
 * @param resource $pdfdoc
 * @param int $image
 * @param float $x
 * @param float $y
 * @param string $optlist
 * @return bool
 */
function PDF_fit_image($pdfdoc, int $image, float $x, float $y, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $page
 * @param float $x
 * @param float $y
 * @param string $optlist
 * @return bool
 */
function PDF_fit_pdi_page($pdfdoc, int $page, float $x, float $y, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $table
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $optlist
 * @return string
 */
function PDF_fit_table($pdfdoc, int $table, float $llx, float $lly, float $urx, float $ury, string $optlist) : string {}

/**
 * @param resource $pdfdoc
 * @param int $textflow
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $optlist
 * @return string
 */
function PDF_fit_textflow($pdfdoc, int $textflow, float $llx, float $lly, float $urx, float $ury, string $optlist) : string {}

/**
 * @param resource $pdfdoc
 * @param string $text
 * @param float $x
 * @param float $y
 * @param string $optlist
 * @return bool
 */
function PDF_fit_textline($pdfdoc, string $text, float $x, float $y, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @return string
 */
function PDF_get_apiname($pdfdoc) : string {}

/**
 * @param resource $p
 * @return string
 */
function PDF_get_buffer($p) : string {}

/**
 * @param resource $pdfdoc
 * @return string
 */
function PDF_get_errmsg($pdfdoc) : string {}

/**
 * @param resource $pdfdoc
 * @return int
 */
function PDF_get_errnum($pdfdoc) : int {}

/**
 * @return int
 */
function PDF_get_majorversion() : int {}

/**
 * @return int
 */
function PDF_get_minorversion() : int {}

/**
 * @param resource $p
 * @param string $key
 * @param float $modifier
 * @return string
 */
function PDF_get_parameter($p, string $key, float $modifier) : string {}

/**
 * @param resource $p
 * @param string $key
 * @param int $doc
 * @param int $page
 * @param int $reserved
 * @return string
 */
function PDF_get_pdi_parameter($p, string $key, int $doc, int $page, int $reserved) : string {}

/**
 * @param resource $p
 * @param string $key
 * @param int $doc
 * @param int $page
 * @param int $reserved
 * @return float
 */
function PDF_get_pdi_value($p, string $key, int $doc, int $page, int $reserved) : float {}

/**
 * @param resource $p
 * @param string $key
 * @param float $modifier
 * @return float
 */
function PDF_get_value($p, string $key, float $modifier) : float {}

/**
 * @param resource $pdfdoc
 * @param int $font
 * @param string $keyword
 * @param string $optlist
 * @return float
 */
function PDF_info_font($pdfdoc, int $font, string $keyword, string $optlist) : float {}

/**
 * @param resource $pdfdoc
 * @param string $boxname
 * @param int $num
 * @param string $keyword
 * @return float
 */
function PDF_info_matchbox($pdfdoc, string $boxname, int $num, string $keyword) : float {}

/**
 * @param resource $pdfdoc
 * @param int $table
 * @param string $keyword
 * @return float
 */
function PDF_info_table($pdfdoc, int $table, string $keyword) : float {}

/**
 * @param resource $pdfdoc
 * @param int $textflow
 * @param string $keyword
 * @return float
 */
function PDF_info_textflow($pdfdoc, int $textflow, string $keyword) : float {}

/**
 * @param resource $pdfdoc
 * @param string $text
 * @param string $keyword
 * @param string $optlist
 * @return float
 */
function PDF_info_textline($pdfdoc, string $text, string $keyword, string $optlist) : float {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_initgraphics($p) : bool {}

/**
 * @param resource $p
 * @param float $x
 * @param float $y
 * @return bool
 */
function PDF_lineto($p, float $x, float $y) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $filename
 * @param string $optlist
 * @return int
 */
function PDF_load_3ddata($pdfdoc, string $filename, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param string $fontname
 * @param string $encoding
 * @param string $optlist
 * @return int
 */
function PDF_load_font($pdfdoc, string $fontname, string $encoding, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param string $profilename
 * @param string $optlist
 * @return int
 */
function PDF_load_iccprofile($pdfdoc, string $profilename, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param string $imagetype
 * @param string $filename
 * @param string $optlist
 * @return int
 */
function PDF_load_image($pdfdoc, string $imagetype, string $filename, string $optlist) : int {}

/**
 * @param resource $p
 * @param string $spotname
 * @return int
 */
function PDF_makespotcolor($p, string $spotname) : int {}

/**
 * @param resource $p
 * @param float $x
 * @param float $y
 * @return bool
 */
function PDF_moveto($p, float $x, float $y) : bool {}

/**
 * @return resource
 */
function PDF_new() {}

/**
 * @param resource $pdfdoc
 * @param string $filename
 * @param int $width
 * @param int $height
 * @param int $BitReverse
 * @param int $k
 * @param int $Blackls1
 * @return int
 */
function PDF_open_ccitt($pdfdoc, string $filename, int $width, int $height, int $BitReverse, int $k, int $Blackls1) : int {}

/**
 * @param resource $p
 * @param string $filename
 * @return bool
 */
function PDF_open_file($p, string $filename) : bool {}

/**
 * @param resource $p
 * @param string $imagetype
 * @param string $source
 * @param string $data
 * @param int $length
 * @param int $width
 * @param int $height
 * @param int $components
 * @param int $bpc
 * @param string $params
 * @return int
 */
function PDF_open_image($p, string $imagetype, string $source, string $data, int $length, int $width, int $height, int $components, int $bpc, string $params) : int {}

/**
 * @param resource $p
 * @param string $imagetype
 * @param string $filename
 * @param string $stringparam
 * @param int $intparam
 * @return int
 */
function PDF_open_image_file($p, string $imagetype, string $filename, string $stringparam, int $intparam) : int {}

/**
 * @param resource $p
 * @param resource $image
 * @return int
 */
function PDF_open_memory_image($p, $image) : int {}

/**
 * @param resource $pdfdoc
 * @param string $filename
 * @param string $optlist
 * @param int $len
 * @return int
 */
function PDF_open_pdi($pdfdoc, string $filename, string $optlist, int $len) : int {}

/**
 * @param resource $p
 * @param string $filename
 * @param string $optlist
 * @return int
 */
function PDF_open_pdi_document($p, string $filename, string $optlist) : int {}

/**
 * @param resource $p
 * @param int $doc
 * @param int $pagenumber
 * @param string $optlist
 * @return int
 */
function PDF_open_pdi_page($p, int $doc, int $pagenumber, string $optlist) : int {}

/**
 * @param resource $p
 * @param int $doc
 * @param string $path
 * @return float
 */
function PDF_pcos_get_number($p, int $doc, string $path) : float {}

/**
 * @param resource $p
 * @param int $doc
 * @param string $optlist
 * @param string $path
 * @return string
 */
function PDF_pcos_get_stream($p, int $doc, string $optlist, string $path) : string {}

/**
 * @param resource $p
 * @param int $doc
 * @param string $path
 * @return string
 */
function PDF_pcos_get_string($p, int $doc, string $path) : string {}

/**
 * @param resource $pdfdoc
 * @param int $image
 * @param float $x
 * @param float $y
 * @param float $scale
 * @return bool
 */
function PDF_place_image($pdfdoc, int $image, float $x, float $y, float $scale) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $page
 * @param float $x
 * @param float $y
 * @param float $sx
 * @param float $sy
 * @return bool
 */
function PDF_place_pdi_page($pdfdoc, int $page, float $x, float $y, float $sx, float $sy) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $doc
 * @param int $page
 * @param string $optlist
 * @return int
 */
function PDF_process_pdi($pdfdoc, int $doc, int $page, string $optlist) : int {}

/**
 * @param resource $p
 * @param float $x
 * @param float $y
 * @param float $width
 * @param float $height
 * @return bool
 */
function PDF_rect($p, float $x, float $y, float $width, float $height) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_restore($p) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $optlist
 * @return bool
 */
function PDF_resume_page($pdfdoc, string $optlist) : bool {}

/**
 * @param resource $p
 * @param float $phi
 * @return bool
 */
function PDF_rotate($p, float $phi) : bool {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_save($p) : bool {}

/**
 * @param resource $p
 * @param float $sx
 * @param float $sy
 * @return bool
 */
function PDF_scale($p, float $sx, float $sy) : bool {}

/**
 * @param resource $p
 * @param float $red
 * @param float $green
 * @param float $blue
 * @return bool
 */
function PDF_set_border_color($p, float $red, float $green, float $blue) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $black
 * @param float $white
 * @return bool
 */
function PDF_set_border_dash($pdfdoc, float $black, float $white) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $style
 * @param float $width
 * @return bool
 */
function PDF_set_border_style($pdfdoc, string $style, float $width) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $gstate
 * @return bool
 */
function PDF_set_gstate($pdfdoc, int $gstate) : bool {}

/**
 * @param resource $p
 * @param string $key
 * @param string $value
 * @return bool
 */
function PDF_set_info($p, string $key, string $value) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $type
 * @param string $optlist
 * @return bool
 */
function PDF_set_layer_dependency($pdfdoc, string $type, string $optlist) : bool {}

/**
 * @param resource $p
 * @param string $key
 * @param string $value
 * @return bool
 */
function PDF_set_parameter($p, string $key, string $value) : bool {}

/**
 * @param resource $p
 * @param float $x
 * @param float $y
 * @return bool
 */
function PDF_set_text_pos($p, float $x, float $y) : bool {}

/**
 * @param resource $p
 * @param string $key
 * @param float $value
 * @return bool
 */
function PDF_set_value($p, string $key, float $value) : bool {}

/**
 * @param resource $p
 * @param string $fstype
 * @param string $colorspace
 * @param float $c1
 * @param float $c2
 * @param float $c3
 * @param float $c4
 * @return bool
 */
function PDF_setcolor($p, string $fstype, string $colorspace, float $c1, float $c2, float $c3, float $c4) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $b
 * @param float $w
 * @return bool
 */
function PDF_setdash($pdfdoc, float $b, float $w) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $optlist
 * @return bool
 */
function PDF_setdashpattern($pdfdoc, string $optlist) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $flatness
 * @return bool
 */
function PDF_setflat($pdfdoc, float $flatness) : bool {}

/**
 * @param resource $pdfdoc
 * @param int $font
 * @param float $fontsize
 * @return bool
 */
function PDF_setfont($pdfdoc, int $font, float $fontsize) : bool {}

/**
 * @param resource $p
 * @param float $g
 * @return bool
 */
function PDF_setgray($p, float $g) : bool {}

/**
 * @param resource $p
 * @param float $g
 * @return bool
 */
function PDF_setgray_fill($p, float $g) : bool {}

/**
 * @param resource $p
 * @param float $g
 * @return bool
 */
function PDF_setgray_stroke($p, float $g) : bool {}

/**
 * @param resource $p
 * @param int $linecap
 * @return bool
 */
function PDF_setlinecap($p, int $linecap) : bool {}

/**
 * @param resource $p
 * @param int $value
 * @return bool
 */
function PDF_setlinejoin($p, int $value) : bool {}

/**
 * @param resource $p
 * @param float $width
 * @return bool
 */
function PDF_setlinewidth($p, float $width) : bool {}

/**
 * @param resource $p
 * @param float $a
 * @param float $b
 * @param float $c
 * @param float $d
 * @param float $e
 * @param float $f
 * @return bool
 */
function PDF_setmatrix($p, float $a, float $b, float $c, float $d, float $e, float $f) : bool {}

/**
 * @param resource $pdfdoc
 * @param float $miter
 * @return bool
 */
function PDF_setmiterlimit($pdfdoc, float $miter) : bool {}

/**
 * @param resource $p
 * @param float $red
 * @param float $green
 * @param float $blue
 * @return bool
 */
function PDF_setrgbcolor($p, float $red, float $green, float $blue) : bool {}

/**
 * @param resource $p
 * @param float $red
 * @param float $green
 * @param float $blue
 * @return bool
 */
function PDF_setrgbcolor_fill($p, float $red, float $green, float $blue) : bool {}

/**
 * @param resource $p
 * @param float $red
 * @param float $green
 * @param float $blue
 * @return bool
 */
function PDF_setrgbcolor_stroke($p, float $red, float $green, float $blue) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $shtype
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
function PDF_shading($pdfdoc, string $shtype, float $x0, float $y0, float $x1, float $y1, float $c1, float $c2, float $c3, float $c4, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param int $shading
 * @param string $optlist
 * @return int
 */
function PDF_shading_pattern($pdfdoc, int $shading, string $optlist) : int {}

/**
 * @param resource $pdfdoc
 * @param int $shading
 * @return bool
 */
function PDF_shfill($pdfdoc, int $shading) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $text
 * @return bool
 */
function PDF_show($pdfdoc, string $text) : bool {}

/**
 * @param resource $p
 * @param string $text
 * @param float $left
 * @param float $top
 * @param float $width
 * @param float $height
 * @param string $mode
 * @param string $feature
 * @return int
 */
function PDF_show_boxed($p, string $text, float $left, float $top, float $width, float $height, string $mode, string $feature) : int {}

/**
 * @param resource $p
 * @param string $text
 * @param float $x
 * @param float $y
 * @return bool
 */
function PDF_show_xy($p, string $text, float $x, float $y) : bool {}

/**
 * @param resource $p
 * @param float $alpha
 * @param float $beta
 * @return bool
 */
function PDF_skew($p, float $alpha, float $beta) : bool {}

/**
 * @param resource $p
 * @param string $text
 * @param int $font
 * @param float $fontsize
 * @return float
 */
function PDF_stringwidth($p, string $text, int $font, float $fontsize) : float {}

/**
 * @param resource $p
 * @return bool
 */
function PDF_stroke($p) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $optlist
 * @return bool
 */
function PDF_suspend_page($pdfdoc, string $optlist) : bool {}

/**
 * @param resource $p
 * @param float $tx
 * @param float $ty
 * @return bool
 */
function PDF_translate($p, float $tx, float $ty) : bool {}

/**
 * @param resource $pdfdoc
 * @param string $utf16string
 * @return string
 */
function PDF_utf16_to_utf8($pdfdoc, string $utf16string) : string {}

/**
 * @param resource $pdfdoc
 * @param string $utf32string
 * @param string $ordering
 * @return string
 */
function PDF_utf32_to_utf16($pdfdoc, string $utf32string, string $ordering) : string {}

/**
 * @param resource $pdfdoc
 * @param string $utf8string
 * @param string $ordering
 * @return string
 */
function PDF_utf8_to_utf16($pdfdoc, string $utf8string, string $ordering) : string {}
