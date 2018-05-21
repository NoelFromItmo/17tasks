<?php

/**
 * @param string $frameId
 * @return string
 */
function id3_get_frame_long_name(string $frameId) : string {}

/**
 * @param string $frameId
 * @return string
 */
function id3_get_frame_short_name(string $frameId) : string {}

/**
 * @param string $genre
 * @return int
 */
function id3_get_genre_id(string $genre) : int {}

/**
 * @return array
 */
function id3_get_genre_list() : array {}

/**
 * @param int $genre_id
 * @return string
 */
function id3_get_genre_name(int $genre_id) : string {}

/**
 * @param string $filename
 * @param int $version
 * @return array
 */
function id3_get_tag(string $filename, int $version = ID3_BEST) : array {}

/**
 * @param string $filename
 * @return int
 */
function id3_get_version(string $filename) : int {}

/**
 * @param string $filename
 * @param int $version
 * @return bool
 */
function id3_remove_tag(string $filename, int $version = ID3_V1_0) : bool {}

/**
 * @param string $filename
 * @param array $tag
 * @param int $version
 * @return bool
 */
function id3_set_tag(string $filename, array $tag, int $version = ID3_V1_0) : bool {}
