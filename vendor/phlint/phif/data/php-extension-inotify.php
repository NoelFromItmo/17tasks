<?php

/**
 * @param resource $inotify_instance
 * @param string $pathname
 * @param int $mask
 * @return int
 */
function inotify_add_watch($inotify_instance, string $pathname, int $mask) : int {}

/**
 * @return resource
 */
function inotify_init() {}

/**
 * @param resource $inotify_instance
 * @return int
 */
function inotify_queue_len($inotify_instance) : int {}

/**
 * @param resource $inotify_instance
 * @return array
 */
function inotify_read($inotify_instance) : array {}

/**
 * @param resource $inotify_instance
 * @param int $watch_descriptor
 * @return bool
 */
function inotify_rm_watch($inotify_instance, int $watch_descriptor) : bool {}
