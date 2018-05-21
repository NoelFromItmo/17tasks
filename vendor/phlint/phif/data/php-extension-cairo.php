<?php

/**
 * @param CairoContext $context
 * @param CairoPath $path
 * @return void
 */
function cairo_append_path(CairoContext $context, CairoPath $path) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @param float $radius
 * @param float $angle1
 * @param float $angle2
 * @return void
 */
function cairo_arc(CairoContext $context, float $x, float $y, float $radius, float $angle1, float $angle2) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @param float $radius
 * @param float $angle1
 * @param float $angle2
 * @return void
 */
function cairo_arc_negative(CairoContext $context, float $x, float $y, float $radius, float $angle1, float $angle2) {}

/**
 * @return array
 */
function cairo_available_fonts() : array {}

/**
 * @return array
 */
function cairo_available_surfaces() : array {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_clip(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_clip_extents(CairoContext $context) : array {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_clip_preserve(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_clip_rectangle_list(CairoContext $context) : array {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_close_path(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_copy_page(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return CairoPath
 */
function cairo_copy_path(CairoContext $context) : CairoPath {}

/**
 * @param CairoContext $context
 * @return CairoPath
 */
function cairo_copy_path_flat(CairoContext $context) : CairoPath {}

/**
 * @param CairoSurface $surface
 * @return CairoContext
 */
function cairo_create(CairoSurface $surface) : CairoContext {}

/**
 * @param CairoContext $context
 * @param float $x1
 * @param float $y1
 * @param float $x2
 * @param float $y2
 * @param float $x3
 * @param float $y3
 * @return void
 */
function cairo_curve_to(CairoContext $context, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return array
 */
function cairo_device_to_user(CairoContext $context, float $x, float $y) : array {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return array
 */
function cairo_device_to_user_distance(CairoContext $context, float $x, float $y) : array {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_fill(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_fill_extents(CairoContext $context) : array {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_fill_preserve(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_font_extents(CairoContext $context) : array {}

/**
 * @param CairoFontFace $fontface
 * @return int
 */
function cairo_font_face_get_type(CairoFontFace $fontface) : int {}

/**
 * @param CairoFontFace $fontface
 * @return int
 */
function cairo_font_face_status(CairoFontFace $fontface) : int {}

/**
 * @return CairoFontOptions
 */
function cairo_font_options_create() : CairoFontOptions {}

/**
 * @param CairoFontOptions $options
 * @param CairoFontOptions $other
 * @return bool
 */
function cairo_font_options_equal(CairoFontOptions $options, CairoFontOptions $other) : bool {}

/**
 * @param CairoFontOptions $options
 * @return int
 */
function cairo_font_options_get_antialias(CairoFontOptions $options) : int {}

/**
 * @param CairoFontOptions $options
 * @return int
 */
function cairo_font_options_get_hint_metrics(CairoFontOptions $options) : int {}

/**
 * @param CairoFontOptions $options
 * @return int
 */
function cairo_font_options_get_hint_style(CairoFontOptions $options) : int {}

/**
 * @param CairoFontOptions $options
 * @return int
 */
function cairo_font_options_get_subpixel_order(CairoFontOptions $options) : int {}

/**
 * @param CairoFontOptions $options
 * @return int
 */
function cairo_font_options_hash(CairoFontOptions $options) : int {}

/**
 * @param CairoFontOptions $options
 * @param CairoFontOptions $other
 * @return void
 */
function cairo_font_options_merge(CairoFontOptions $options, CairoFontOptions $other) {}

/**
 * @param CairoFontOptions $options
 * @param int $antialias
 * @return void
 */
function cairo_font_options_set_antialias(CairoFontOptions $options, int $antialias) {}

/**
 * @param CairoFontOptions $options
 * @param int $hint_metrics
 * @return void
 */
function cairo_font_options_set_hint_metrics(CairoFontOptions $options, int $hint_metrics) {}

/**
 * @param CairoFontOptions $options
 * @param int $hint_style
 * @return void
 */
function cairo_font_options_set_hint_style(CairoFontOptions $options, int $hint_style) {}

/**
 * @param CairoFontOptions $options
 * @param int $subpixel_order
 * @return void
 */
function cairo_font_options_set_subpixel_order(CairoFontOptions $options, int $subpixel_order) {}

/**
 * @param CairoFontOptions $options
 * @return int
 */
function cairo_font_options_status(CairoFontOptions $options) : int {}

/**
 * @param int $format
 * @param int $width
 * @return int
 */
function cairo_format_stride_for_width(int $format, int $width) : int {}

/**
 * @param CairoContext $context
 * @return int
 */
function cairo_get_antialias(CairoContext $context) : int {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_get_current_point(CairoContext $context) : array {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_get_dash(CairoContext $context) : array {}

/**
 * @param CairoContext $context
 * @return int
 */
function cairo_get_dash_count(CairoContext $context) : int {}

/**
 * @param CairoContext $context
 * @return int
 */
function cairo_get_fill_rule(CairoContext $context) : int {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_font_face(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_font_matrix(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_font_options(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_group_target(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return int
 */
function cairo_get_line_cap(CairoContext $context) : int {}

/**
 * @param CairoContext $context
 * @return int
 */
function cairo_get_line_join(CairoContext $context) : int {}

/**
 * @param CairoContext $context
 * @return float
 */
function cairo_get_line_width(CairoContext $context) : float {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_matrix(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return float
 */
function cairo_get_miter_limit(CairoContext $context) : float {}

/**
 * @param CairoContext $context
 * @return int
 */
function cairo_get_operator(CairoContext $context) : int {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_scaled_font(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_source(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_get_target(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return float
 */
function cairo_get_tolerance(CairoContext $context) : float {}

/**
 * @param CairoContext $context
 * @param array $glyphs
 * @return void
 */
function cairo_glyph_path(CairoContext $context, array $glyphs) {}

/**
 * @param CairoContext $context
 * @return bool
 */
function cairo_has_current_point(CairoContext $context) : bool {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_identity_matrix(CairoContext $context) {}

/**
 * @param int $format
 * @param int $width
 * @param int $height
 * @return CairoImageSurface
 */
function cairo_image_surface_create(int $format, int $width, int $height) : CairoImageSurface {}

/**
 * @param string $data
 * @param int $format
 * @param int $width
 * @param int $height
 * @param int $stride
 * @return CairoImageSurface
 */
function cairo_image_surface_create_for_data(string $data, int $format, int $width, int $height, int $stride = -1) : CairoImageSurface {}

/**
 * @param mixed $file
 * @return CairoImageSurface
 */
function cairo_image_surface_create_from_png($file) : CairoImageSurface {}

/**
 * @param CairoImageSurface $surface
 * @return string
 */
function cairo_image_surface_get_data(CairoImageSurface $surface) : string {}

/**
 * @param CairoImageSurface $surface
 * @return int
 */
function cairo_image_surface_get_format(CairoImageSurface $surface) : int {}

/**
 * @param CairoImageSurface $surface
 * @return int
 */
function cairo_image_surface_get_height(CairoImageSurface $surface) : int {}

/**
 * @param CairoImageSurface $surface
 * @return int
 */
function cairo_image_surface_get_stride(CairoImageSurface $surface) : int {}

/**
 * @param CairoImageSurface $surface
 * @return int
 */
function cairo_image_surface_get_width(CairoImageSurface $surface) : int {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return bool
 */
function cairo_in_fill(CairoContext $context, float $x, float $y) : bool {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return bool
 */
function cairo_in_stroke(CairoContext $context, float $x, float $y) : bool {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_line_to(CairoContext $context, float $x, float $y) {}

/**
 * @param CairoContext $context
 * @param CairoPattern $pattern
 * @return void
 */
function cairo_mask(CairoContext $context, CairoPattern $pattern) {}

/**
 * @param CairoContext $context
 * @param CairoSurface $surface
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_mask_surface(CairoContext $context, CairoSurface $surface, float $x = 0, float $y = 0) {}

/**
 * @param float $xx
 * @param float $yx
 * @param float $xy
 * @param float $yy
 * @param float $x0
 * @param float $y0
 * @return object
 */
function cairo_matrix_init(float $xx = 1.0, float $yx = 0.0, float $xy = 0.0, float $yy = 1.0, float $x0 = 0.0, float $y0 = 0.0) {}

/**
 * @return object
 */
function cairo_matrix_init_identity() {}

/**
 * @param float $radians
 * @return object
 */
function cairo_matrix_init_rotate(float $radians) {}

/**
 * @param float $sx
 * @param float $sy
 * @return object
 */
function cairo_matrix_init_scale(float $sx, float $sy) {}

/**
 * @param float $tx
 * @param float $ty
 * @return object
 */
function cairo_matrix_init_translate(float $tx, float $ty) {}

/**
 * @param CairoMatrix $matrix
 * @return void
 */
function cairo_matrix_invert(CairoMatrix $matrix) {}

/**
 * @param CairoMatrix $matrix1
 * @param CairoMatrix $matrix2
 * @return CairoMatrix
 */
function cairo_matrix_multiply(CairoMatrix $matrix1, CairoMatrix $matrix2) : CairoMatrix {}

/**
 * @param CairoContext $context
 * @param string $radians
 * @return void
 */
function cairo_matrix_rotate(CairoContext $context, string $radians) {}

/**
 * @param CairoContext $context
 * @param float $sx
 * @param float $sy
 * @return void
 */
function cairo_matrix_scale(CairoContext $context, float $sx, float $sy) {}

/**
 * @param CairoMatrix $matrix
 * @param float $dx
 * @param float $dy
 * @return array
 */
function cairo_matrix_transform_distance(CairoMatrix $matrix, float $dx, float $dy) : array {}

/**
 * @param CairoMatrix $matrix
 * @param float $dx
 * @param float $dy
 * @return array
 */
function cairo_matrix_transform_point(CairoMatrix $matrix, float $dx, float $dy) : array {}

/**
 * @param CairoMatrix $matrix
 * @param float $tx
 * @param float $ty
 * @return void
 */
function cairo_matrix_translate(CairoMatrix $matrix, float $tx, float $ty) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_move_to(CairoContext $context, float $x, float $y) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_new_path(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_new_sub_path(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_paint(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @param float $alpha
 * @return void
 */
function cairo_paint_with_alpha(CairoContext $context, float $alpha) {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_path_extents(CairoContext $context) : array {}

/**
 * @param CairoGradientPattern $pattern
 * @param float $offset
 * @param float $red
 * @param float $green
 * @param float $blue
 * @return void
 */
function cairo_pattern_add_color_stop_rgb(CairoGradientPattern $pattern, float $offset, float $red, float $green, float $blue) {}

/**
 * @param CairoGradientPattern $pattern
 * @param float $offset
 * @param float $red
 * @param float $green
 * @param float $blue
 * @param float $alpha
 * @return void
 */
function cairo_pattern_add_color_stop_rgba(CairoGradientPattern $pattern, float $offset, float $red, float $green, float $blue, float $alpha) {}

/**
 * @param CairoSurface $surface
 * @return CairoPattern
 */
function cairo_pattern_create_for_surface(CairoSurface $surface) : CairoPattern {}

/**
 * @param float $x0
 * @param float $y0
 * @param float $x1
 * @param float $y1
 * @return CairoPattern
 */
function cairo_pattern_create_linear(float $x0, float $y0, float $x1, float $y1) : CairoPattern {}

/**
 * @param float $x0
 * @param float $y0
 * @param float $r0
 * @param float $x1
 * @param float $y1
 * @param float $r1
 * @return CairoPattern
 */
function cairo_pattern_create_radial(float $x0, float $y0, float $r0, float $x1, float $y1, float $r1) : CairoPattern {}

/**
 * @param float $red
 * @param float $green
 * @param float $blue
 * @return CairoPattern
 */
function cairo_pattern_create_rgb(float $red, float $green, float $blue) : CairoPattern {}

/**
 * @param float $red
 * @param float $green
 * @param float $blue
 * @param float $alpha
 * @return CairoPattern
 */
function cairo_pattern_create_rgba(float $red, float $green, float $blue, float $alpha) : CairoPattern {}

/**
 * @param CairoGradientPattern $pattern
 * @return int
 */
function cairo_pattern_get_color_stop_count(CairoGradientPattern $pattern) : int {}

/**
 * @param CairoGradientPattern $pattern
 * @param int $index
 * @return array
 */
function cairo_pattern_get_color_stop_rgba(CairoGradientPattern $pattern, int $index) : array {}

/**
 * @param string $pattern
 * @return int
 */
function cairo_pattern_get_extend(string $pattern) : int {}

/**
 * @param CairoSurfacePattern $pattern
 * @return int
 */
function cairo_pattern_get_filter(CairoSurfacePattern $pattern) : int {}

/**
 * @param CairoLinearGradient $pattern
 * @return array
 */
function cairo_pattern_get_linear_points(CairoLinearGradient $pattern) : array {}

/**
 * @param CairoPattern $pattern
 * @return CairoMatrix
 */
function cairo_pattern_get_matrix(CairoPattern $pattern) : CairoMatrix {}

/**
 * @param CairoRadialGradient $pattern
 * @return array
 */
function cairo_pattern_get_radial_circles(CairoRadialGradient $pattern) : array {}

/**
 * @param CairoSolidPattern $pattern
 * @return array
 */
function cairo_pattern_get_rgba(CairoSolidPattern $pattern) : array {}

/**
 * @param CairoSurfacePattern $pattern
 * @return CairoSurface
 */
function cairo_pattern_get_surface(CairoSurfacePattern $pattern) : CairoSurface {}

/**
 * @param CairoPattern $pattern
 * @return int
 */
function cairo_pattern_get_type(CairoPattern $pattern) : int {}

/**
 * @param string $pattern
 * @param string $extend
 * @return void
 */
function cairo_pattern_set_extend(string $pattern, string $extend) {}

/**
 * @param CairoSurfacePattern $pattern
 * @param int $filter
 * @return void
 */
function cairo_pattern_set_filter(CairoSurfacePattern $pattern, int $filter) {}

/**
 * @param CairoPattern $pattern
 * @param CairoMatrix $matrix
 * @return void
 */
function cairo_pattern_set_matrix(CairoPattern $pattern, CairoMatrix $matrix) {}

/**
 * @param CairoPattern $pattern
 * @return int
 */
function cairo_pattern_status(CairoPattern $pattern) : int {}

/**
 * @param string $file
 * @param float $width
 * @param float $height
 * @return CairoPdfSurface
 */
function cairo_pdf_surface_create(string $file, float $width, float $height) : CairoPdfSurface {}

/**
 * @param CairoPdfSurface $surface
 * @param float $width
 * @param float $height
 * @return void
 */
function cairo_pdf_surface_set_size(CairoPdfSurface $surface, float $width, float $height) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_pop_group(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_pop_group_to_source(CairoContext $context) {}

/**
 * @return array
 */
function cairo_ps_get_levels() : array {}

/**
 * @param int $level
 * @return string
 */
function cairo_ps_level_to_string(int $level) : string {}

/**
 * @param string $file
 * @param float $width
 * @param float $height
 * @return CairoPsSurface
 */
function cairo_ps_surface_create(string $file, float $width, float $height) : CairoPsSurface {}

/**
 * @param CairoPsSurface $surface
 * @return void
 */
function cairo_ps_surface_dsc_begin_page_setup(CairoPsSurface $surface) {}

/**
 * @param CairoPsSurface $surface
 * @return void
 */
function cairo_ps_surface_dsc_begin_setup(CairoPsSurface $surface) {}

/**
 * @param CairoPsSurface $surface
 * @param string $comment
 * @return void
 */
function cairo_ps_surface_dsc_comment(CairoPsSurface $surface, string $comment) {}

/**
 * @param CairoPsSurface $surface
 * @return bool
 */
function cairo_ps_surface_get_eps(CairoPsSurface $surface) : bool {}

/**
 * @param CairoPsSurface $surface
 * @param int $level
 * @return void
 */
function cairo_ps_surface_restrict_to_level(CairoPsSurface $surface, int $level) {}

/**
 * @param CairoPsSurface $surface
 * @param bool $level
 * @return void
 */
function cairo_ps_surface_set_eps(CairoPsSurface $surface, bool $level) {}

/**
 * @param CairoPsSurface $surface
 * @param float $width
 * @param float $height
 * @return void
 */
function cairo_ps_surface_set_size(CairoPsSurface $surface, float $width, float $height) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_push_group(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @param int $content
 * @return void
 */
function cairo_push_group_with_content(CairoContext $context, int $content) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @param float $width
 * @param float $height
 * @return void
 */
function cairo_rectangle(CairoContext $context, float $x, float $y, float $width, float $height) {}

/**
 * @param CairoContext $context
 * @param float $x1
 * @param float $y1
 * @param float $x2
 * @param float $y2
 * @param float $x3
 * @param float $y3
 * @return void
 */
function cairo_rel_curve_to(CairoContext $context, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_rel_line_to(CairoContext $context, float $x, float $y) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_rel_move_to(CairoContext $context, float $x, float $y) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_reset_clip(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_restore(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @param float $angle
 * @return void
 */
function cairo_rotate(CairoContext $context, float $angle) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_save(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_scale(CairoContext $context, float $x, float $y) {}

/**
 * @param CairoFontFace $fontface
 * @param CairoMatrix $matrix
 * @param CairoMatrix $ctm
 * @param CairoFontOptions $fontoptions
 * @return CairoScaledFont
 */
function cairo_scaled_font_create(CairoFontFace $fontface, CairoMatrix $matrix, CairoMatrix $ctm, CairoFontOptions $fontoptions) : CairoScaledFont {}

/**
 * @param CairoScaledFont $scaledfont
 * @return array
 */
function cairo_scaled_font_extents(CairoScaledFont $scaledfont) : array {}

/**
 * @param CairoScaledFont $scaledfont
 * @return CairoMatrix
 */
function cairo_scaled_font_get_ctm(CairoScaledFont $scaledfont) : CairoMatrix {}

/**
 * @param CairoScaledFont $scaledfont
 * @return CairoFontFace
 */
function cairo_scaled_font_get_font_face(CairoScaledFont $scaledfont) : CairoFontFace {}

/**
 * @param CairoScaledFont $scaledfont
 * @return CairoFontOptions
 */
function cairo_scaled_font_get_font_matrix(CairoScaledFont $scaledfont) : CairoFontOptions {}

/**
 * @param CairoScaledFont $scaledfont
 * @return CairoFontOptions
 */
function cairo_scaled_font_get_font_options(CairoScaledFont $scaledfont) : CairoFontOptions {}

/**
 * @param CairoScaledFont $scaledfont
 * @return CairoMatrix
 */
function cairo_scaled_font_get_scale_matrix(CairoScaledFont $scaledfont) : CairoMatrix {}

/**
 * @param CairoScaledFont $scaledfont
 * @return int
 */
function cairo_scaled_font_get_type(CairoScaledFont $scaledfont) : int {}

/**
 * @param CairoScaledFont $scaledfont
 * @param array $glyphs
 * @return array
 */
function cairo_scaled_font_glyph_extents(CairoScaledFont $scaledfont, array $glyphs) : array {}

/**
 * @param CairoScaledFont $scaledfont
 * @return int
 */
function cairo_scaled_font_status(CairoScaledFont $scaledfont) : int {}

/**
 * @param CairoScaledFont $scaledfont
 * @param string $text
 * @return array
 */
function cairo_scaled_font_text_extents(CairoScaledFont $scaledfont, string $text) : array {}

/**
 * @param CairoContext $context
 * @param string $family
 * @param int $slant
 * @param int $weight
 * @return void
 */
function cairo_select_font_face(CairoContext $context, string $family, int $slant = 0, int $weight = 0) {}

/**
 * @param CairoContext $context
 * @param int $antialias
 * @return void
 */
function cairo_set_antialias(CairoContext $context, int $antialias = 0) {}

/**
 * @param CairoContext $context
 * @param array $dashes
 * @param float $offset
 * @return void
 */
function cairo_set_dash(CairoContext $context, array $dashes, float $offset = 0) {}

/**
 * @param CairoContext $context
 * @param int $setting
 * @return void
 */
function cairo_set_fill_rule(CairoContext $context, int $setting) {}

/**
 * @param CairoContext $context
 * @param CairoFontFace $fontface
 * @return void
 */
function cairo_set_font_face(CairoContext $context, CairoFontFace $fontface) {}

/**
 * @param CairoContext $context
 * @param CairoMatrix $matrix
 * @return void
 */
function cairo_set_font_matrix(CairoContext $context, CairoMatrix $matrix) {}

/**
 * @param CairoContext $context
 * @param CairoFontOptions $fontoptions
 * @return void
 */
function cairo_set_font_options(CairoContext $context, CairoFontOptions $fontoptions) {}

/**
 * @param CairoContext $context
 * @param float $size
 * @return void
 */
function cairo_set_font_size(CairoContext $context, float $size) {}

/**
 * @param CairoContext $context
 * @param int $setting
 * @return void
 */
function cairo_set_line_cap(CairoContext $context, int $setting) {}

/**
 * @param CairoContext $context
 * @param int $setting
 * @return void
 */
function cairo_set_line_join(CairoContext $context, int $setting) {}

/**
 * @param CairoContext $context
 * @param float $width
 * @return void
 */
function cairo_set_line_width(CairoContext $context, float $width) {}

/**
 * @param CairoContext $context
 * @param CairoMatrix $matrix
 * @return void
 */
function cairo_set_matrix(CairoContext $context, CairoMatrix $matrix) {}

/**
 * @param CairoContext $context
 * @param float $limit
 * @return void
 */
function cairo_set_miter_limit(CairoContext $context, float $limit) {}

/**
 * @param CairoContext $context
 * @param int $setting
 * @return void
 */
function cairo_set_operator(CairoContext $context, int $setting) {}

/**
 * @param CairoContext $context
 * @param CairoScaledFont $scaledfont
 * @return void
 */
function cairo_set_scaled_font(CairoContext $context, CairoScaledFont $scaledfont) {}

/**
 * @param CairoContext $context
 * @param float $red
 * @param float $green
 * @param float $blue
 * @param float $alpha
 * @return void
 */
function cairo_set_source(CairoContext $context, float $red, float $green, float $blue, float $alpha) {}

/**
 * @param CairoContext $context
 * @param CairoSurface $surface
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_set_source_surface(CairoContext $context, CairoSurface $surface, float $x = 0, float $y = 0) {}

/**
 * @param CairoContext $context
 * @param float $tolerance
 * @return void
 */
function cairo_set_tolerance(CairoContext $context, float $tolerance) {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_show_page(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @param string $text
 * @return void
 */
function cairo_show_text(CairoContext $context, string $text) {}

/**
 * @param CairoContext $context
 * @return int
 */
function cairo_status(CairoContext $context) : int {}

/**
 * @param int $status
 * @return string
 */
function cairo_status_to_string(int $status) : string {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_stroke(CairoContext $context) {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_stroke_extents(CairoContext $context) : array {}

/**
 * @param CairoContext $context
 * @return void
 */
function cairo_stroke_preserve(CairoContext $context) {}

/**
 * @param CairoSurface $surface
 * @return void
 */
function cairo_surface_copy_page(CairoSurface $surface) {}

/**
 * @param CairoSurface $surface
 * @param int $content
 * @param float $width
 * @param float $height
 * @return CairoSurface
 */
function cairo_surface_create_similar(CairoSurface $surface, int $content, float $width, float $height) : CairoSurface {}

/**
 * @param CairoSurface $surface
 * @return void
 */
function cairo_surface_finish(CairoSurface $surface) {}

/**
 * @param CairoSurface $surface
 * @return void
 */
function cairo_surface_flush(CairoSurface $surface) {}

/**
 * @param CairoSurface $surface
 * @return int
 */
function cairo_surface_get_content(CairoSurface $surface) : int {}

/**
 * @param CairoSurface $surface
 * @return array
 */
function cairo_surface_get_device_offset(CairoSurface $surface) : array {}

/**
 * @param CairoSurface $surface
 * @return CairoFontOptions
 */
function cairo_surface_get_font_options(CairoSurface $surface) : CairoFontOptions {}

/**
 * @param CairoSurface $surface
 * @return int
 */
function cairo_surface_get_type(CairoSurface $surface) : int {}

/**
 * @param CairoSurface $surface
 * @return void
 */
function cairo_surface_mark_dirty(CairoSurface $surface) {}

/**
 * @param CairoSurface $surface
 * @param float $x
 * @param float $y
 * @param float $width
 * @param float $height
 * @return void
 */
function cairo_surface_mark_dirty_rectangle(CairoSurface $surface, float $x, float $y, float $width, float $height) {}

/**
 * @param CairoSurface $surface
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_surface_set_device_offset(CairoSurface $surface, float $x, float $y) {}

/**
 * @param CairoSurface $surface
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_surface_set_fallback_resolution(CairoSurface $surface, float $x, float $y) {}

/**
 * @param CairoSurface $surface
 * @return void
 */
function cairo_surface_show_page(CairoSurface $surface) {}

/**
 * @param CairoSurface $surface
 * @return int
 */
function cairo_surface_status(CairoSurface $surface) : int {}

/**
 * @param CairoSurface $surface
 * @param resource $stream
 * @return void
 */
function cairo_surface_write_to_png(CairoSurface $surface, $stream) {}

/**
 * @return array
 */
function cairo_svg_get_versions() : array {}

/**
 * @param string $file
 * @param float $width
 * @param float $height
 * @return CairoSvgSurface
 */
function cairo_svg_surface_create(string $file, float $width, float $height) : CairoSvgSurface {}

/**
 * @param CairoSvgSurface $surface
 * @param int $version
 * @return void
 */
function cairo_svg_surface_restrict_to_version(CairoSvgSurface $surface, int $version) {}

/**
 * @param int $version
 * @return string
 */
function cairo_svg_version_to_string(int $version) : string {}

/**
 * @param CairoContext $context
 * @return array
 */
function cairo_text_extents(CairoContext $context) : array {}

/**
 * @param CairoContext $context
 * @param string $text
 * @return void
 */
function cairo_text_path(CairoContext $context, string $text) {}

/**
 * @param CairoContext $context
 * @param CairoMatrix $matrix
 * @return void
 */
function cairo_transform(CairoContext $context, CairoMatrix $matrix) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return void
 */
function cairo_translate(CairoContext $context, float $x, float $y) {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return array
 */
function cairo_user_to_device(CairoContext $context, float $x, float $y) : array {}

/**
 * @param CairoContext $context
 * @param float $x
 * @param float $y
 * @return array
 */
function cairo_user_to_device_distance(CairoContext $context, float $x, float $y) : array {}

/**
 * @return int
 */
function cairo_version() : int {}

/**
 * @return string
 */
function cairo_version_string() : string {}

class Cairo
{
    function availableFonts() : array {}
    function availableSurfaces() : array {}
    function statusToString(int $status) : string {}
    function version() : int {}
    function versionString() : string {}
}

class CairoContext
{
    function __construct(CairoSurface $surface) {}
    function appendPath(CairoPath $path) {}
    function arc(float $x, float $y, float $radius, float $angle1, float $angle2) {}
    function arcNegative(float $x, float $y, float $radius, float $angle1, float $angle2) {}
    function clip() {}
    function clipExtents() : array {}
    function clipPreserve() {}
    function clipRectangleList() : array {}
    function closePath() {}
    function copyPage() {}
    function copyPath() : CairoPath {}
    function copyPathFlat() : CairoPath {}
    function curveTo(float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) {}
    function deviceToUser(float $x, float $y) : array {}
    function deviceToUserDistance(float $x, float $y) : array {}
    function fill() {}
    function fillExtents() : array {}
    function fillPreserve() {}
    function fontExtents() : array {}
    function getAntialias() : int {}
    function getCurrentPoint() : array {}
    function getDash() : array {}
    function getDashCount() : int {}
    function getFillRule() : int {}
    function getFontFace() {}
    function getFontMatrix() {}
    function getFontOptions() {}
    function getGroupTarget() {}
    function getLineCap() : int {}
    function getLineJoin() : int {}
    function getLineWidth() : float {}
    function getMatrix() {}
    function getMiterLimit() : float {}
    function getOperator() : int {}
    function getScaledFont() {}
    function getSource() {}
    function getTarget() {}
    function getTolerance() : float {}
    function glyphPath(array $glyphs) {}
    function hasCurrentPoint() : bool {}
    function identityMatrix() {}
    function inFill(float $x, float $y) : bool {}
    function inStroke(float $x, float $y) : bool {}
    function lineTo(float $x, float $y) {}
    function mask(CairoPattern $pattern) {}
    function maskSurface(CairoSurface $surface, float $x = 0, float $y = 0) {}
    function moveTo(float $x, float $y) {}
    function newPath() {}
    function newSubPath() {}
    function paint() {}
    function paintWithAlpha(float $alpha) {}
    function pathExtents() : array {}
    function popGroup() {}
    function popGroupToSource() {}
    function pushGroup() {}
    function pushGroupWithContent(int $content) {}
    function rectangle(float $x, float $y, float $width, float $height) {}
    function relCurveTo(float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) {}
    function relLineTo(float $x, float $y) {}
    function relMoveTo(float $x, float $y) {}
    function resetClip() {}
    function restore() {}
    function rotate(float $angle) {}
    function save() {}
    function scale(float $x, float $y) {}
    function selectFontFace(string $family, int $slant = 0, int $weight = 0) {}
    function setAntialias(int $antialias = 0) {}
    function setDash(array $dashes, float $offset = 0) {}
    function setFillRule(int $setting) {}
    function setFontFace(CairoFontFace $fontface) {}
    function setFontMatrix(CairoMatrix $matrix) {}
    function setFontOptions(CairoFontOptions $fontoptions) {}
    function setFontSize(float $size) {}
    function setLineCap(int $setting) {}
    function setLineJoin(int $setting) {}
    function setLineWidth(float $width) {}
    function setMatrix(CairoMatrix $matrix) {}
    function setMiterLimit(float $limit) {}
    function setOperator(int $setting) {}
    function setScaledFont(CairoScaledFont $scaledfont) {}
    function setSource(CairoPattern $pattern) {}
    function setSourceRGB(float $red, float $green, float $blue) {}
    function setSourceRGBA(float $red, float $green, float $blue, float $alpha) {}
    function setSourceSurface(CairoSurface $surface, float $x = 0, float $y = 0) {}
    function setTolerance(float $tolerance) {}
    function showPage() {}
    function showText(string $text) {}
    function status() : int {}
    function stroke() {}
    function strokeExtents() : array {}
    function strokePreserve() {}
    function textExtents(string $text) : array {}
    function textPath(string $string) {}
    function transform(CairoMatrix $matrix) {}
    function translate(float $x, float $y) {}
    function userToDevice(float $x, float $y) : array {}
    function userToDeviceDistance(float $x, float $y) : array {}
}

class CairoException extends Exception {}

class CairoFontFace
{
    function __construct() {}
    function getType() : int {}
    function status() : int {}
}

class CairoFontOptions
{
    function __construct() {}
    function equal(CairoFontOptions $other) : bool {}
    function getAntialias() : int {}
    function getHintMetrics() : int {}
    function getHintStyle() : int {}
    function getSubpixelOrder() : int {}
    function hash() : int {}
    function merge(CairoFontOptions $other) {}
    function setAntialias(int $antialias) {}
    function setHintMetrics(int $hint_metrics) {}
    function setHintStyle(int $hint_style) {}
    function setSubpixelOrder(int $subpixel_order) {}
    function status() : int {}
}

class CairoFormat
{
    function strideForWidth(int $format, int $width) : int {}
}

class CairoGradientPattern extends CairoPattern
{
    function addColorStopRgb(float $offset, float $red, float $green, float $blue) {}
    function addColorStopRgba(float $offset, float $red, float $green, float $blue, float $alpha) {}
    function getColorStopCount() : int {}
    function getColorStopRgba(int $index) : array {}
    function getExtend() : int {}
    function setExtend(int $extend) {}
}

class CairoImageSurface extends CairoSurface
{
    function __construct(int $format, int $width, int $height) {}
    function createForData(string $data, int $format, int $width, int $height) {}
    function createFromPng(string $file) : CairoImageSurface {}
    function getData() : string {}
    function getFormat() : int {}
    function getHeight() : int {}
    function getStride() : int {}
    function getWidth() : int {}
}

class CairoLinearGradient extends CairoGradientPattern
{
    function __construct(float $x0, float $y0, float $x1, float $y1) {}
    function getPoints() : array {}
}

class CairoMatrix
{
    function __construct(float $xx = 1.0, float $yx = 0.0, float $xy = 0.0, float $yy = 1.0, float $x0 = 0.0, float $y0 = 0.0) {}
    function initIdentity() {}
    function initRotate(float $radians) {}
    function initScale(float $sx, float $sy) {}
    function initTranslate(float $tx, float $ty) {}
    function invert() {}
    function multiply(CairoMatrix $matrix1, CairoMatrix $matrix2) : CairoMatrix {}
    function rotate(float $radians) {}
    function scale(float $sx, float $sy) {}
    function transformDistance(float $dx, float $dy) : array {}
    function transformPoint(float $dx, float $dy) : array {}
    function translate(float $tx, float $ty) {}
}

class CairoPattern
{
    function __construct() {}
    function getMatrix() {}
    function getType() : int {}
    function setMatrix(CairoMatrix $matrix) {}
    function status() : int {}
}

class CairoPdfSurface extends CairoSurface
{
    function __construct(string $file, float $width, float $height) {}
    function setSize(float $width, float $height) {}
}

class CairoPsSurface extends CairoSurface
{
    function __construct(string $file, float $width, float $height) {}
    function dscBeginPageSetup() {}
    function dscBeginSetup() {}
    function dscComment(string $comment) {}
    function getEps() : bool {}
    function getLevels() : array {}
    function levelToString(int $level) : string {}
    function restrictToLevel(int $level) {}
    function setEps(bool $level) {}
    function setSize(float $width, float $height) {}
}

class CairoRadialGradient extends CairoGradientPattern
{
    function __construct(float $x0, float $y0, float $r0, float $x1, float $y1, float $r1) {}
    function getCircles() : array {}
}

class CairoScaledFont
{
    function __construct(CairoFontFace $font_face, CairoMatrix $matrix, CairoMatrix $ctm, CairoFontOptions $options) {}
    function extents() : array {}
    function getCtm() : CairoMatrix {}
    function getFontFace() {}
    function getFontMatrix() {}
    function getFontOptions() {}
    function getScaleMatrix() {}
    function getType() : int {}
    function glyphExtents(array $glyphs) : array {}
    function status() : int {}
    function textExtents(string $text) : array {}
}

class CairoSolidPattern extends CairoPattern
{
    function __construct(float $red, float $green, float $blue, float $alpha = 0) {}
    function getRgba() : array {}
}

class CairoSurface
{
    function __construct() {}
    function copyPage() {}
    function createSimilar(CairoSurface $other, int $content, string $width, string $height) {}
    function finish() {}
    function flush() {}
    function getContent() : int {}
    function getDeviceOffset() : array {}
    function getFontOptions() {}
    function getType() : int {}
    function markDirty() {}
    function markDirtyRectangle(float $x, float $y, float $width, float $height) {}
    function setDeviceOffset(float $x, float $y) {}
    function setFallbackResolution(float $x, float $y) {}
    function showPage() {}
    function status() : int {}
    function writeToPng(string $file) {}
}

class CairoSurfacePattern extends CairoPattern
{
    function __construct(CairoSurface $surface) {}
    function getExtend() : int {}
    function getFilter() : int {}
    function getSurface() {}
    function setExtend(int $extend) {}
    function setFilter(int $filter) {}
}

class CairoSvgSurface extends CairoSurface
{
    function __construct(string $file, float $width, float $height) {}
    function getVersions() : array {}
    function restrictToVersion(int $version) {}
    function versionToString(int $version) : string {}
}

class CairoToyFontFace extends CairoFontFace {}
