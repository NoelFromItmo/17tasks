<?php

const EXIF_USE_MBSTRING = 1;

/**
 * @param string $filename
 * @return int
 */
function exif_imagetype(string $filename) : int {}

/**
 * @param mixed $stream
 * @param string $sections
 * @param bool $arrays
 * @param bool $thumbnail
 * @return array
 */
function exif_read_data($stream, string $sections = null, bool $arrays = false, bool $thumbnail = false) : array {}

/**
 * @param int $index
 * @return string
 */
function exif_tagname(int $index) : string {}

/**
 * @param mixed $stream
 * @param int $width
 * @param int $height
 * @param int $imagetype
 * @return string
 */
function exif_thumbnail($stream, int &$width = 0, int &$height = 0, int &$imagetype = 0) : string {}

/**
 * @param mixed $filename
 * @param mixed $sections_needed
 * @param mixed $sub_arrays
 * @param mixed $read_thumbnail
 * @return void
 */
function read_exif_data($filename, $sections_needed, $sub_arrays, $read_thumbnail) {}
