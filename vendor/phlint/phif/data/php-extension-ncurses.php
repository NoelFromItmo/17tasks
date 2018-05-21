<?php

/**
 * @param int $ch
 * @return int
 */
function ncurses_addch(int $ch) : int {}

/**
 * @param string $s
 * @param int $n
 * @return int
 */
function ncurses_addchnstr(string $s, int $n) : int {}

/**
 * @param string $s
 * @return int
 */
function ncurses_addchstr(string $s) : int {}

/**
 * @param string $s
 * @param int $n
 * @return int
 */
function ncurses_addnstr(string $s, int $n) : int {}

/**
 * @param string $text
 * @return int
 */
function ncurses_addstr(string $text) : int {}

/**
 * @param int $fg
 * @param int $bg
 * @return int
 */
function ncurses_assume_default_colors(int $fg, int $bg) : int {}

/**
 * @param int $attributes
 * @return int
 */
function ncurses_attroff(int $attributes) : int {}

/**
 * @param int $attributes
 * @return int
 */
function ncurses_attron(int $attributes) : int {}

/**
 * @param int $attributes
 * @return int
 */
function ncurses_attrset(int $attributes) : int {}

/**
 * @return int
 */
function ncurses_baudrate() : int {}

/**
 * @return int
 */
function ncurses_beep() : int {}

/**
 * @param int $attrchar
 * @return int
 */
function ncurses_bkgd(int $attrchar) : int {}

/**
 * @param int $attrchar
 * @return void
 */
function ncurses_bkgdset(int $attrchar) {}

/**
 * @param int $left
 * @param int $right
 * @param int $top
 * @param int $bottom
 * @param int $tl_corner
 * @param int $tr_corner
 * @param int $bl_corner
 * @param int $br_corner
 * @return int
 */
function ncurses_border(int $left, int $right, int $top, int $bottom, int $tl_corner, int $tr_corner, int $bl_corner, int $br_corner) : int {}

/**
 * @param resource $panel
 * @return int
 */
function ncurses_bottom_panel($panel) : int {}

/**
 * @return bool
 */
function ncurses_can_change_color() : bool {}

/**
 * @return bool
 */
function ncurses_cbreak() : bool {}

/**
 * @return bool
 */
function ncurses_clear() : bool {}

/**
 * @return bool
 */
function ncurses_clrtobot() : bool {}

/**
 * @return bool
 */
function ncurses_clrtoeol() : bool {}

/**
 * @param int $color
 * @param int $r
 * @param int $g
 * @param int $b
 * @return int
 */
function ncurses_color_content(int $color, int &$r, int &$g, int &$b) : int {}

/**
 * @param int $pair
 * @return int
 */
function ncurses_color_set(int $pair) : int {}

/**
 * @param int $visibility
 * @return int
 */
function ncurses_curs_set(int $visibility) : int {}

/**
 * @return bool
 */
function ncurses_def_prog_mode() : bool {}

/**
 * @return bool
 */
function ncurses_def_shell_mode() : bool {}

/**
 * @param string $definition
 * @param int $keycode
 * @return int
 */
function ncurses_define_key(string $definition, int $keycode) : int {}

/**
 * @param resource $panel
 * @return bool
 */
function ncurses_del_panel($panel) : bool {}

/**
 * @param int $milliseconds
 * @return int
 */
function ncurses_delay_output(int $milliseconds) : int {}

/**
 * @return bool
 */
function ncurses_delch() : bool {}

/**
 * @return bool
 */
function ncurses_deleteln() : bool {}

/**
 * @param resource $window
 * @return bool
 */
function ncurses_delwin($window) : bool {}

/**
 * @return bool
 */
function ncurses_doupdate() : bool {}

/**
 * @return bool
 */
function ncurses_echo() : bool {}

/**
 * @param int $character
 * @return int
 */
function ncurses_echochar(int $character) : int {}

/**
 * @return int
 */
function ncurses_end() : int {}

/**
 * @return bool
 */
function ncurses_erase() : bool {}

/**
 * @return string
 */
function ncurses_erasechar() : string {}

/**
 * @return void
 */
function ncurses_filter() {}

/**
 * @return bool
 */
function ncurses_flash() : bool {}

/**
 * @return bool
 */
function ncurses_flushinp() : bool {}

/**
 * @return int
 */
function ncurses_getch() : int {}

/**
 * @param resource $window
 * @param int $y
 * @param int $x
 * @return void
 */
function ncurses_getmaxyx($window, int &$y, int &$x) {}

/**
 * @param array $mevent
 * @return bool
 */
function ncurses_getmouse(array &$mevent) : bool {}

/**
 * @param resource $window
 * @param int $y
 * @param int $x
 * @return void
 */
function ncurses_getyx($window, int &$y, int &$x) {}

/**
 * @param int $tenth
 * @return int
 */
function ncurses_halfdelay(int $tenth) : int {}

/**
 * @return bool
 */
function ncurses_has_colors() : bool {}

/**
 * @return bool
 */
function ncurses_has_ic() : bool {}

/**
 * @return bool
 */
function ncurses_has_il() : bool {}

/**
 * @param int $keycode
 * @return int
 */
function ncurses_has_key(int $keycode) : int {}

/**
 * @param resource $panel
 * @return int
 */
function ncurses_hide_panel($panel) : int {}

/**
 * @param int $charattr
 * @param int $n
 * @return int
 */
function ncurses_hline(int $charattr, int $n) : int {}

/**
 * @return string
 */
function ncurses_inch() : string {}

/**
 * @return void
 */
function ncurses_init() {}

/**
 * @param int $color
 * @param int $r
 * @param int $g
 * @param int $b
 * @return int
 */
function ncurses_init_color(int $color, int $r, int $g, int $b) : int {}

/**
 * @param int $pair
 * @param int $fg
 * @param int $bg
 * @return int
 */
function ncurses_init_pair(int $pair, int $fg, int $bg) : int {}

/**
 * @param int $character
 * @return int
 */
function ncurses_insch(int $character) : int {}

/**
 * @param int $count
 * @return int
 */
function ncurses_insdelln(int $count) : int {}

/**
 * @return int
 */
function ncurses_insertln() : int {}

/**
 * @param string $text
 * @return int
 */
function ncurses_insstr(string $text) : int {}

/**
 * @param string $buffer
 * @return int
 */
function ncurses_instr(string &$buffer) : int {}

/**
 * @return bool
 */
function ncurses_isendwin() : bool {}

/**
 * @param int $keycode
 * @param bool $enable
 * @return int
 */
function ncurses_keyok(int $keycode, bool $enable) : int {}

/**
 * @param resource $window
 * @param bool $bf
 * @return int
 */
function ncurses_keypad($window, bool $bf) : int {}

/**
 * @return string
 */
function ncurses_killchar() : string {}

/**
 * @return string
 */
function ncurses_longname() : string {}

/**
 * @param resource $window
 * @param bool $8bit
 * @return int
 */
function ncurses_meta($window, bool $8bit) : int {}

/**
 * @param int $y
 * @param int $x
 * @param bool $toscreen
 * @return bool
 */
function ncurses_mouse_trafo(int &$y, int &$x, bool $toscreen) : bool {}

/**
 * @param int $milliseconds
 * @return int
 */
function ncurses_mouseinterval(int $milliseconds) : int {}

/**
 * @param int $newmask
 * @param int $oldmask
 * @return int
 */
function ncurses_mousemask(int $newmask, int &$oldmask) : int {}

/**
 * @param int $y
 * @param int $x
 * @return int
 */
function ncurses_move(int $y, int $x) : int {}

/**
 * @param resource $panel
 * @param int $startx
 * @param int $starty
 * @return int
 */
function ncurses_move_panel($panel, int $startx, int $starty) : int {}

/**
 * @param int $y
 * @param int $x
 * @param int $c
 * @return int
 */
function ncurses_mvaddch(int $y, int $x, int $c) : int {}

/**
 * @param int $y
 * @param int $x
 * @param string $s
 * @param int $n
 * @return int
 */
function ncurses_mvaddchnstr(int $y, int $x, string $s, int $n) : int {}

/**
 * @param int $y
 * @param int $x
 * @param string $s
 * @return int
 */
function ncurses_mvaddchstr(int $y, int $x, string $s) : int {}

/**
 * @param int $y
 * @param int $x
 * @param string $s
 * @param int $n
 * @return int
 */
function ncurses_mvaddnstr(int $y, int $x, string $s, int $n) : int {}

/**
 * @param int $y
 * @param int $x
 * @param string $s
 * @return int
 */
function ncurses_mvaddstr(int $y, int $x, string $s) : int {}

/**
 * @param int $old_y
 * @param int $old_x
 * @param int $new_y
 * @param int $new_x
 * @return int
 */
function ncurses_mvcur(int $old_y, int $old_x, int $new_y, int $new_x) : int {}

/**
 * @param int $y
 * @param int $x
 * @return int
 */
function ncurses_mvdelch(int $y, int $x) : int {}

/**
 * @param int $y
 * @param int $x
 * @return int
 */
function ncurses_mvgetch(int $y, int $x) : int {}

/**
 * @param int $y
 * @param int $x
 * @param int $attrchar
 * @param int $n
 * @return int
 */
function ncurses_mvhline(int $y, int $x, int $attrchar, int $n) : int {}

/**
 * @param int $y
 * @param int $x
 * @return int
 */
function ncurses_mvinch(int $y, int $x) : int {}

/**
 * @param int $y
 * @param int $x
 * @param int $attrchar
 * @param int $n
 * @return int
 */
function ncurses_mvvline(int $y, int $x, int $attrchar, int $n) : int {}

/**
 * @param resource $window
 * @param int $y
 * @param int $x
 * @param string $text
 * @return int
 */
function ncurses_mvwaddstr($window, int $y, int $x, string $text) : int {}

/**
 * @param int $milliseconds
 * @return int
 */
function ncurses_napms(int $milliseconds) : int {}

/**
 * @param resource $window
 * @return resource
 */
function ncurses_new_panel($window) {}

/**
 * @param int $rows
 * @param int $cols
 * @return resource
 */
function ncurses_newpad(int $rows, int $cols) {}

/**
 * @param int $rows
 * @param int $cols
 * @param int $y
 * @param int $x
 * @return resource
 */
function ncurses_newwin(int $rows, int $cols, int $y, int $x) {}

/**
 * @return bool
 */
function ncurses_nl() : bool {}

/**
 * @return bool
 */
function ncurses_nocbreak() : bool {}

/**
 * @return bool
 */
function ncurses_noecho() : bool {}

/**
 * @return bool
 */
function ncurses_nonl() : bool {}

/**
 * @return void
 */
function ncurses_noqiflush() {}

/**
 * @return bool
 */
function ncurses_noraw() : bool {}

/**
 * @param int $pair
 * @param int $f
 * @param int $b
 * @return int
 */
function ncurses_pair_content(int $pair, int &$f, int &$b) : int {}

/**
 * @param resource $panel
 * @return resource
 */
function ncurses_panel_above($panel) {}

/**
 * @param resource $panel
 * @return resource
 */
function ncurses_panel_below($panel) {}

/**
 * @param resource $panel
 * @return resource
 */
function ncurses_panel_window($panel) {}

/**
 * @param resource $pad
 * @param int $pminrow
 * @param int $pmincol
 * @param int $sminrow
 * @param int $smincol
 * @param int $smaxrow
 * @param int $smaxcol
 * @return int
 */
function ncurses_pnoutrefresh($pad, int $pminrow, int $pmincol, int $sminrow, int $smincol, int $smaxrow, int $smaxcol) : int {}

/**
 * @param resource $pad
 * @param int $pminrow
 * @param int $pmincol
 * @param int $sminrow
 * @param int $smincol
 * @param int $smaxrow
 * @param int $smaxcol
 * @return int
 */
function ncurses_prefresh($pad, int $pminrow, int $pmincol, int $sminrow, int $smincol, int $smaxrow, int $smaxcol) : int {}

/**
 * @param string $text
 * @return int
 */
function ncurses_putp(string $text) : int {}

/**
 * @return void
 */
function ncurses_qiflush() {}

/**
 * @return bool
 */
function ncurses_raw() : bool {}

/**
 * @param int $ch
 * @return int
 */
function ncurses_refresh(int $ch) : int {}

/**
 * @param resource $panel
 * @param resource $window
 * @return int
 */
function ncurses_replace_panel($panel, $window) : int {}

/**
 * @return int
 */
function ncurses_reset_prog_mode() : int {}

/**
 * @return int
 */
function ncurses_reset_shell_mode() : int {}

/**
 * @return bool
 */
function ncurses_resetty() : bool {}

/**
 * @return bool
 */
function ncurses_savetty() : bool {}

/**
 * @param string $filename
 * @return int
 */
function ncurses_scr_dump(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function ncurses_scr_init(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function ncurses_scr_restore(string $filename) : int {}

/**
 * @param string $filename
 * @return int
 */
function ncurses_scr_set(string $filename) : int {}

/**
 * @param int $count
 * @return int
 */
function ncurses_scrl(int $count) : int {}

/**
 * @param resource $panel
 * @return int
 */
function ncurses_show_panel($panel) : int {}

/**
 * @return int
 */
function ncurses_slk_attr() : int {}

/**
 * @param int $intarg
 * @return int
 */
function ncurses_slk_attroff(int $intarg) : int {}

/**
 * @param int $intarg
 * @return int
 */
function ncurses_slk_attron(int $intarg) : int {}

/**
 * @param int $intarg
 * @return int
 */
function ncurses_slk_attrset(int $intarg) : int {}

/**
 * @return bool
 */
function ncurses_slk_clear() : bool {}

/**
 * @param int $intarg
 * @return int
 */
function ncurses_slk_color(int $intarg) : int {}

/**
 * @param int $format
 * @return bool
 */
function ncurses_slk_init(int $format) : bool {}

/**
 * @return bool
 */
function ncurses_slk_noutrefresh() : bool {}

/**
 * @return int
 */
function ncurses_slk_refresh() : int {}

/**
 * @return int
 */
function ncurses_slk_restore() : int {}

/**
 * @param int $labelnr
 * @param string $label
 * @param int $format
 * @return bool
 */
function ncurses_slk_set(int $labelnr, string $label, int $format) : bool {}

/**
 * @return int
 */
function ncurses_slk_touch() : int {}

/**
 * @return int
 */
function ncurses_standend() : int {}

/**
 * @return int
 */
function ncurses_standout() : int {}

/**
 * @return int
 */
function ncurses_start_color() : int {}

/**
 * @return bool
 */
function ncurses_termattrs() : bool {}

/**
 * @return string
 */
function ncurses_termname() : string {}

/**
 * @param int $millisec
 * @return void
 */
function ncurses_timeout(int $millisec) {}

/**
 * @param resource $panel
 * @return int
 */
function ncurses_top_panel($panel) : int {}

/**
 * @param int $fd
 * @return int
 */
function ncurses_typeahead(int $fd) : int {}

/**
 * @param int $keycode
 * @return int
 */
function ncurses_ungetch(int $keycode) : int {}

/**
 * @param array $mevent
 * @return bool
 */
function ncurses_ungetmouse(array $mevent) : bool {}

/**
 * @return void
 */
function ncurses_update_panels() {}

/**
 * @return bool
 */
function ncurses_use_default_colors() : bool {}

/**
 * @param bool $flag
 * @return void
 */
function ncurses_use_env(bool $flag) {}

/**
 * @param bool $flag
 * @return int
 */
function ncurses_use_extended_names(bool $flag) : int {}

/**
 * @param int $intarg
 * @return int
 */
function ncurses_vidattr(int $intarg) : int {}

/**
 * @param int $charattr
 * @param int $n
 * @return int
 */
function ncurses_vline(int $charattr, int $n) : int {}

/**
 * @param resource $window
 * @param int $ch
 * @return int
 */
function ncurses_waddch($window, int $ch) : int {}

/**
 * @param resource $window
 * @param string $str
 * @param int $n
 * @return int
 */
function ncurses_waddstr($window, string $str, int $n = 0) : int {}

/**
 * @param resource $window
 * @param int $attrs
 * @return int
 */
function ncurses_wattroff($window, int $attrs) : int {}

/**
 * @param resource $window
 * @param int $attrs
 * @return int
 */
function ncurses_wattron($window, int $attrs) : int {}

/**
 * @param resource $window
 * @param int $attrs
 * @return int
 */
function ncurses_wattrset($window, int $attrs) : int {}

/**
 * @param resource $window
 * @param int $left
 * @param int $right
 * @param int $top
 * @param int $bottom
 * @param int $tl_corner
 * @param int $tr_corner
 * @param int $bl_corner
 * @param int $br_corner
 * @return int
 */
function ncurses_wborder($window, int $left, int $right, int $top, int $bottom, int $tl_corner, int $tr_corner, int $bl_corner, int $br_corner) : int {}

/**
 * @param resource $window
 * @return int
 */
function ncurses_wclear($window) : int {}

/**
 * @param resource $window
 * @param int $color_pair
 * @return int
 */
function ncurses_wcolor_set($window, int $color_pair) : int {}

/**
 * @param resource $window
 * @return int
 */
function ncurses_werase($window) : int {}

/**
 * @param resource $window
 * @return int
 */
function ncurses_wgetch($window) : int {}

/**
 * @param resource $window
 * @param int $charattr
 * @param int $n
 * @return int
 */
function ncurses_whline($window, int $charattr, int $n) : int {}

/**
 * @param resource $window
 * @param int $y
 * @param int $x
 * @param bool $toscreen
 * @return bool
 */
function ncurses_wmouse_trafo($window, int &$y, int &$x, bool $toscreen) : bool {}

/**
 * @param resource $window
 * @param int $y
 * @param int $x
 * @return int
 */
function ncurses_wmove($window, int $y, int $x) : int {}

/**
 * @param resource $window
 * @return int
 */
function ncurses_wnoutrefresh($window) : int {}

/**
 * @param resource $window
 * @return int
 */
function ncurses_wrefresh($window) : int {}

/**
 * @param resource $window
 * @return int
 */
function ncurses_wstandend($window) : int {}

/**
 * @param resource $window
 * @return int
 */
function ncurses_wstandout($window) : int {}

/**
 * @param resource $window
 * @param int $charattr
 * @param int $n
 * @return int
 */
function ncurses_wvline($window, int $charattr, int $n) : int {}
