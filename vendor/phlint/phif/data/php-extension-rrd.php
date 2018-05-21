<?php

/**
 * @param string $filename
 * @param array $options
 * @return bool
 */
function rrd_create(string $filename, array $options) : bool {}

/**
 * @return string
 */
function rrd_error() : string {}

/**
 * @param string $filename
 * @param array $options
 * @return array
 */
function rrd_fetch(string $filename, array $options) : array {}

/**
 * @param string $file
 * @param int $raaindex
 * @return int
 */
function rrd_first(string $file, int $raaindex = 0) : int {}

/**
 * @param string $filename
 * @param array $options
 * @return array
 */
function rrd_graph(string $filename, array $options) : array {}

/**
 * @param string $filename
 * @return array
 */
function rrd_info(string $filename) : array {}

/**
 * @param string $filename
 * @return int
 */
function rrd_last(string $filename) : int {}

/**
 * @param string $filename
 * @return array
 */
function rrd_lastupdate(string $filename) : array {}

/**
 * @param string $xml_file
 * @param string $rrd_file
 * @param array $options
 * @return bool
 */
function rrd_restore(string $xml_file, string $rrd_file, array $options = []) : bool {}

/**
 * @param string $filename
 * @param array $options
 * @return bool
 */
function rrd_tune(string $filename, array $options) : bool {}

/**
 * @param string $filename
 * @param array $options
 * @return bool
 */
function rrd_update(string $filename, array $options) : bool {}

/**
 * @return string
 */
function rrd_version() : string {}

/**
 * @param array $options
 * @return array
 */
function rrd_xport(array $options) : array {}

/**
 * @return void
 */
function rrdc_disconnect() {}

class RRDCreator
{
    function __construct(string $path, string $startTime = '', int $step = 0) {}
    function addArchive(string $description) {}
    function addDataSource(string $description) {}
    function save() : bool {}
}

class RRDGraph
{
    function __construct(string $path) {}
    function save() : array {}
    function saveVerbose() : array {}
    function setOptions(array $options) {}
}

class RRDUpdater
{
    function __construct(string $path) {}
    function update(array $values, string $time = '') : bool {}
}
