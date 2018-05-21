<?php

/**
 * @return void
 */
function newt_bell() {}

/**
 * @param int $left
 * @param int $top
 * @param string $text
 * @return resource
 */
function newt_button(int $left, int $top, string $text) {}

/**
 * @param array $buttons
 * @return resource
 */
function newt_button_bar(array &$buttons) {}

/**
 * @param int $width
 * @param int $height
 * @param string $title
 * @return int
 */
function newt_centered_window(int $width, int $height, string $title = '') : int {}

/**
 * @param int $left
 * @param int $top
 * @param string $text
 * @param string $def_value
 * @param string $seq
 * @return resource
 */
function newt_checkbox(int $left, int $top, string $text, string $def_value, string $seq = '') {}

/**
 * @param resource $checkbox
 * @return string
 */
function newt_checkbox_get_value($checkbox) : string {}

/**
 * @param resource $checkbox
 * @param int $flags
 * @param int $sense
 * @return void
 */
function newt_checkbox_set_flags($checkbox, int $flags, int $sense) {}

/**
 * @param resource $checkbox
 * @param string $value
 * @return void
 */
function newt_checkbox_set_value($checkbox, string $value) {}

/**
 * @param int $left
 * @param int $top
 * @param int $height
 * @param int $flags
 * @return resource
 */
function newt_checkbox_tree(int $left, int $top, int $height, int $flags = 0) {}

/**
 * @param resource $checkboxtree
 * @param string $text
 * @param mixed $data
 * @param int $flags
 * @param int $index
 * @param int $__variadic
 * @return void
 */
function newt_checkbox_tree_add_item($checkboxtree, string $text, $data, int $flags, int $index, int ...$__variadic) {}

/**
 * @param resource $checkboxtree
 * @param mixed $data
 * @return array
 */
function newt_checkbox_tree_find_item($checkboxtree, $data) : array {}

/**
 * @param resource $checkboxtree
 * @return mixed
 */
function newt_checkbox_tree_get_current($checkboxtree) {}

/**
 * @param resource $checkboxtree
 * @param mixed $data
 * @return string
 */
function newt_checkbox_tree_get_entry_value($checkboxtree, $data) : string {}

/**
 * @param resource $checkboxtree
 * @param string $seqnum
 * @return array
 */
function newt_checkbox_tree_get_multi_selection($checkboxtree, string $seqnum) : array {}

/**
 * @param resource $checkboxtree
 * @return array
 */
function newt_checkbox_tree_get_selection($checkboxtree) : array {}

/**
 * @param int $left
 * @param int $top
 * @param int $height
 * @param string $seq
 * @param int $flags
 * @return resource
 */
function newt_checkbox_tree_multi(int $left, int $top, int $height, string $seq, int $flags = 0) {}

/**
 * @param resource $checkboxtree
 * @param mixed $data
 * @return void
 */
function newt_checkbox_tree_set_current($checkboxtree, $data) {}

/**
 * @param resource $checkboxtree
 * @param mixed $data
 * @param string $text
 * @return void
 */
function newt_checkbox_tree_set_entry($checkboxtree, $data, string $text) {}

/**
 * @param resource $checkboxtree
 * @param mixed $data
 * @param string $value
 * @return void
 */
function newt_checkbox_tree_set_entry_value($checkboxtree, $data, string $value) {}

/**
 * @param resource $checkbox_tree
 * @param int $width
 * @return void
 */
function newt_checkbox_tree_set_width($checkbox_tree, int $width) {}

/**
 * @return void
 */
function newt_clear_key_buffer() {}

/**
 * @return void
 */
function newt_cls() {}

/**
 * @param int $left
 * @param int $top
 * @param string $text
 * @return resource
 */
function newt_compact_button(int $left, int $top, string $text) {}

/**
 * @param resource $component
 * @param mixed $func_name
 * @param mixed $data
 * @return void
 */
function newt_component_add_callback($component, $func_name, $data) {}

/**
 * @param resource $component
 * @param bool $takes_focus
 * @return void
 */
function newt_component_takes_focus($component, bool $takes_focus) {}

/**
 * @param int $cols
 * @param int $rows
 * @return resource
 */
function newt_create_grid(int $cols, int $rows) {}

/**
 * @return void
 */
function newt_cursor_off() {}

/**
 * @return void
 */
function newt_cursor_on() {}

/**
 * @param int $microseconds
 * @return void
 */
function newt_delay(int $microseconds) {}

/**
 * @param resource $form
 * @return void
 */
function newt_draw_form($form) {}

/**
 * @param int $left
 * @param int $top
 * @param string $text
 * @return void
 */
function newt_draw_root_text(int $left, int $top, string $text) {}

/**
 * @param int $left
 * @param int $top
 * @param int $width
 * @param string $init_value
 * @param int $flags
 * @return resource
 */
function newt_entry(int $left, int $top, int $width, string $init_value = '', int $flags = 0) {}

/**
 * @param resource $entry
 * @return string
 */
function newt_entry_get_value($entry) : string {}

/**
 * @param resource $entry
 * @param string $value
 * @param bool $cursor_at_end
 * @return void
 */
function newt_entry_set($entry, string $value, bool $cursor_at_end = false) {}

/**
 * @param resource $entry
 * @param callable $filter
 * @param mixed $data
 * @return void
 */
function newt_entry_set_filter($entry, callable $filter, $data) {}

/**
 * @param resource $entry
 * @param int $flags
 * @param int $sense
 * @return void
 */
function newt_entry_set_flags($entry, int $flags, int $sense) {}

/**
 * @return int
 */
function newt_finished() : int {}

/**
 * @param resource $vert_bar
 * @param string $help
 * @param int $flags
 * @return resource
 */
function newt_form($vert_bar = null, string $help = '', int $flags = 0) {}

/**
 * @param resource $form
 * @param resource $component
 * @return void
 */
function newt_form_add_component($form, $component) {}

/**
 * @param resource $form
 * @param array $components
 * @return void
 */
function newt_form_add_components($form, array $components) {}

/**
 * @param resource $form
 * @param int $key
 * @return void
 */
function newt_form_add_hot_key($form, int $key) {}

/**
 * @param resource $form
 * @return void
 */
function newt_form_destroy($form) {}

/**
 * @param resource $form
 * @return resource
 */
function newt_form_get_current($form) {}

/**
 * @param resource $form
 * @param array $exit_struct
 * @return void
 */
function newt_form_run($form, array &$exit_struct) {}

/**
 * @param resource $from
 * @param int $background
 * @return void
 */
function newt_form_set_background($from, int $background) {}

/**
 * @param resource $form
 * @param int $height
 * @return void
 */
function newt_form_set_height($form, int $height) {}

/**
 * @param resource $form
 * @return void
 */
function newt_form_set_size($form) {}

/**
 * @param resource $form
 * @param int $milliseconds
 * @return void
 */
function newt_form_set_timer($form, int $milliseconds) {}

/**
 * @param resource $form
 * @param int $width
 * @return void
 */
function newt_form_set_width($form, int $width) {}

/**
 * @param resource $form
 * @param resource $stream
 * @param int $flags
 * @return void
 */
function newt_form_watch_fd($form, $stream, int $flags = 0) {}

/**
 * @param int $cols
 * @param int $rows
 * @return void
 */
function newt_get_screen_size(int &$cols, int &$rows) {}

/**
 * @param resource $grid
 * @param resource $form
 * @param bool $recurse
 * @return void
 */
function newt_grid_add_components_to_form($grid, $form, bool $recurse) {}

/**
 * @param resource $text
 * @param resource $middle
 * @param resource $buttons
 * @return resource
 */
function newt_grid_basic_window($text, $middle, $buttons) {}

/**
 * @param resource $grid
 * @param bool $recurse
 * @return void
 */
function newt_grid_free($grid, bool $recurse) {}

/**
 * @param resouce $grid
 * @param int $width
 * @param int $height
 * @return void
 */
function newt_grid_get_size(resouce $grid, int &$width, int &$height) {}

/**
 * @param int $element1_type
 * @param resource $element1
 * @param int $__variadic
 * @param resource $__variadic
 * @return resource
 */
function newt_grid_h_close_stacked(int $element1_type, $element1, int $__variadic, ...$__variadic) {}

/**
 * @param int $element1_type
 * @param resource $element1
 * @param int $__variadic
 * @param resource $__variadic
 * @return resource
 */
function newt_grid_h_stacked(int $element1_type, $element1, int $__variadic, ...$__variadic) {}

/**
 * @param resource $grid
 * @param int $left
 * @param int $top
 * @return void
 */
function newt_grid_place($grid, int $left, int $top) {}

/**
 * @param resource $grid
 * @param int $col
 * @param int $row
 * @param int $type
 * @param resource $val
 * @param int $pad_left
 * @param int $pad_top
 * @param int $pad_right
 * @param int $pad_bottom
 * @param int $anchor
 * @param int $flags
 * @return void
 */
function newt_grid_set_field($grid, int $col, int $row, int $type, $val, int $pad_left, int $pad_top, int $pad_right, int $pad_bottom, int $anchor, int $flags = 0) {}

/**
 * @param resource $text
 * @param resource $middle
 * @param resource $buttons
 * @return resource
 */
function newt_grid_simple_window($text, $middle, $buttons) {}

/**
 * @param int $element1_type
 * @param resource $element1
 * @param int $__variadic
 * @param resource $__variadic
 * @return resource
 */
function newt_grid_v_close_stacked(int $element1_type, $element1, int $__variadic, ...$__variadic) {}

/**
 * @param int $element1_type
 * @param resource $element1
 * @param int $__variadic
 * @param resource $__variadic
 * @return resource
 */
function newt_grid_v_stacked(int $element1_type, $element1, int $__variadic, ...$__variadic) {}

/**
 * @param resource $grid
 * @param string $title
 * @return void
 */
function newt_grid_wrapped_window($grid, string $title) {}

/**
 * @param resource $grid
 * @param string $title
 * @param int $left
 * @param int $top
 * @return void
 */
function newt_grid_wrapped_window_at($grid, string $title, int $left, int $top) {}

/**
 * @return int
 */
function newt_init() : int {}

/**
 * @param int $left
 * @param int $top
 * @param string $text
 * @return resource
 */
function newt_label(int $left, int $top, string $text) {}

/**
 * @param resource $label
 * @param string $text
 * @return void
 */
function newt_label_set_text($label, string $text) {}

/**
 * @param int $left
 * @param int $top
 * @param int $height
 * @param int $flags
 * @return resource
 */
function newt_listbox(int $left, int $top, int $height, int $flags = 0) {}

/**
 * @param resource $listbox
 * @param string $text
 * @param mixed $data
 * @return void
 */
function newt_listbox_append_entry($listbox, string $text, $data) {}

/**
 * @param resource $listobx
 * @return void
 */
function newt_listbox_clear($listobx) {}

/**
 * @param resource $listbox
 * @return void
 */
function newt_listbox_clear_selection($listbox) {}

/**
 * @param resource $listbox
 * @param mixed $key
 * @return void
 */
function newt_listbox_delete_entry($listbox, $key) {}

/**
 * @param resource $listbox
 * @return string
 */
function newt_listbox_get_current($listbox) : string {}

/**
 * @param resource $listbox
 * @return array
 */
function newt_listbox_get_selection($listbox) : array {}

/**
 * @param resource $listbox
 * @param string $text
 * @param mixed $data
 * @param mixed $key
 * @return void
 */
function newt_listbox_insert_entry($listbox, string $text, $data, $key) {}

/**
 * @param resource $listbox
 * @return int
 */
function newt_listbox_item_count($listbox) : int {}

/**
 * @param resource $listbox
 * @param mixed $key
 * @param int $sense
 * @return void
 */
function newt_listbox_select_item($listbox, $key, int $sense) {}

/**
 * @param resource $listbox
 * @param int $num
 * @return void
 */
function newt_listbox_set_current($listbox, int $num) {}

/**
 * @param resource $listbox
 * @param mixed $key
 * @return void
 */
function newt_listbox_set_current_by_key($listbox, $key) {}

/**
 * @param resource $listbox
 * @param int $num
 * @param mixed $data
 * @return void
 */
function newt_listbox_set_data($listbox, int $num, $data) {}

/**
 * @param resource $listbox
 * @param int $num
 * @param string $text
 * @return void
 */
function newt_listbox_set_entry($listbox, int $num, string $text) {}

/**
 * @param resource $listbox
 * @param int $width
 * @return void
 */
function newt_listbox_set_width($listbox, int $width) {}

/**
 * @param int $left
 * @param int $top
 * @param string $text
 * @param bool $is_default
 * @param resouce $prev_item
 * @param mixed $data
 * @param int $flags
 * @return resource
 */
function newt_listitem(int $left, int $top, string $text, bool $is_default, resouce $prev_item, $data, int $flags = 0) {}

/**
 * @param resource $item
 * @return mixed
 */
function newt_listitem_get_data($item) {}

/**
 * @param resource $item
 * @param string $text
 * @return void
 */
function newt_listitem_set($item, string $text) {}

/**
 * @param int $left
 * @param int $top
 * @param int $width
 * @param int $height
 * @param string $title
 * @return int
 */
function newt_open_window(int $left, int $top, int $width, int $height, string $title = '') : int {}

/**
 * @return void
 */
function newt_pop_help_line() {}

/**
 * @return void
 */
function newt_pop_window() {}

/**
 * @param string $text
 * @return void
 */
function newt_push_help_line(string $text = '') {}

/**
 * @param resource $set_member
 * @return resource
 */
function newt_radio_get_current($set_member) {}

/**
 * @param int $left
 * @param int $top
 * @param string $text
 * @param bool $is_default
 * @param resource $prev_button
 * @return resource
 */
function newt_radiobutton(int $left, int $top, string $text, bool $is_default, $prev_button = null) {}

/**
 * @return void
 */
function newt_redraw_help_line() {}

/**
 * @param string $text
 * @param int $width
 * @param int $flex_down
 * @param int $flex_up
 * @param int $actual_width
 * @param int $actual_height
 * @return string
 */
function newt_reflow_text(string $text, int $width, int $flex_down, int $flex_up, int &$actual_width, int &$actual_height) : string {}

/**
 * @return void
 */
function newt_refresh() {}

/**
 * @param bool $redraw
 * @return void
 */
function newt_resize_screen(bool $redraw = false) {}

/**
 * @return void
 */
function newt_resume() {}

/**
 * @param resource $form
 * @return resource
 */
function newt_run_form($form) {}

/**
 * @param int $left
 * @param int $top
 * @param int $width
 * @param int $full_value
 * @return resource
 */
function newt_scale(int $left, int $top, int $width, int $full_value) {}

/**
 * @param resource $scale
 * @param int $amount
 * @return void
 */
function newt_scale_set($scale, int $amount) {}

/**
 * @param resource $scrollbar
 * @param int $where
 * @param int $total
 * @return void
 */
function newt_scrollbar_set($scrollbar, int $where, int $total) {}

/**
 * @param mixed $function
 * @return void
 */
function newt_set_help_callback($function) {}

/**
 * @param callable $function
 * @param mixed $data
 * @return void
 */
function newt_set_suspend_callback(callable $function, $data) {}

/**
 * @return void
 */
function newt_suspend() {}

/**
 * @param int $left
 * @param int $top
 * @param int $width
 * @param int $height
 * @param int $flags
 * @return resource
 */
function newt_textbox(int $left, int $top, int $width, int $height, int $flags = 0) {}

/**
 * @param resource $textbox
 * @return int
 */
function newt_textbox_get_num_lines($textbox) : int {}

/**
 * @param int $left
 * @param int $top
 * @param char $*text
 * @param int $width
 * @param int $flex_down
 * @param int $flex_up
 * @param int $flags
 * @return resource
 */
function newt_textbox_reflowed(int $left, int $top, char $*text, int $width, int $flex_down, int $flex_up, int $flags = 0) {}

/**
 * @param resource $textbox
 * @param int $height
 * @return void
 */
function newt_textbox_set_height($textbox, int $height) {}

/**
 * @param resource $textbox
 * @param string $text
 * @return void
 */
function newt_textbox_set_text($textbox, string $text) {}

/**
 * @param int $left
 * @param int $top
 * @param int $height
 * @param int $normal_colorset
 * @param int $thumb_colorset
 * @return resource
 */
function newt_vertical_scrollbar(int $left, int $top, int $height, int $normal_colorset = 0, int $thumb_colorset = 0) {}

/**
 * @return void
 */
function newt_wait_for_key() {}

/**
 * @param string $title
 * @param string $button1_text
 * @param string $button2_text
 * @param string $format
 * @param mixed $args
 * @param mixed $__variadic
 * @return int
 */
function newt_win_choice(string $title, string $button1_text, string $button2_text, string $format, $args = null, ...$__variadic) : int {}

/**
 * @param string $title
 * @param string $text
 * @param int $suggested_width
 * @param int $flex_down
 * @param int $flex_up
 * @param int $data_width
 * @param array $items
 * @param string $button1
 * @param string $__variadic
 * @return int
 */
function newt_win_entries(string $title, string $text, int $suggested_width, int $flex_down, int $flex_up, int $data_width, array &$items, string $button1, string ...$__variadic) : int {}

/**
 * @param string $title
 * @param string $text
 * @param int $suggestedWidth
 * @param int $flexDown
 * @param int $flexUp
 * @param int $maxListHeight
 * @param array $items
 * @param int $listItem
 * @param string $button1
 * @param string $__variadic
 * @return int
 */
function newt_win_menu(string $title, string $text, int $suggestedWidth, int $flexDown, int $flexUp, int $maxListHeight, array $items, int &$listItem, string $button1 = '', string ...$__variadic) : int {}

/**
 * @param string $title
 * @param string $button_text
 * @param string $format
 * @param mixed $args
 * @param mixed $__variadic
 * @return void
 */
function newt_win_message(string $title, string $button_text, string $format, $args = null, ...$__variadic) {}

/**
 * @param string $title
 * @param string $button_text
 * @param string $format
 * @param array $args
 * @return void
 */
function newt_win_messagev(string $title, string $button_text, string $format, array $args) {}

/**
 * @param string $title
 * @param string $button1_text
 * @param string $button2_text
 * @param string $button3_text
 * @param string $format
 * @param mixed $args
 * @param mixed $__variadic
 * @return int
 */
function newt_win_ternary(string $title, string $button1_text, string $button2_text, string $button3_text, string $format, $args = null, ...$__variadic) : int {}
