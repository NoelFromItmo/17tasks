<?php

/**
 * @return array
 */
function win32_ps_list_procs() : array {}

/**
 * @return array
 */
function win32_ps_stat_mem() : array {}

/**
 * @param int $pid
 * @return array
 */
function win32_ps_stat_proc(int $pid = 0) : array {}
