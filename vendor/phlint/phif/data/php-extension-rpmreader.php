<?php

/**
 * @param resource $rpmr
 * @return bool
 */
function rpm_close($rpmr) : bool {}

/**
 * @param resource $rpmr
 * @param int $tagnum
 * @return mixed
 */
function rpm_get_tag($rpmr, int $tagnum) {}

/**
 * @param string $filename
 * @return bool
 */
function rpm_is_valid(string $filename) : bool {}

/**
 * @param string $filename
 * @return resource
 */
function rpm_open(string $filename) {}

/**
 * @return string
 */
function rpm_version() : string {}
