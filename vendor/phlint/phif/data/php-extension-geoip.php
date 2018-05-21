<?php

/**
 * @param string $hostname
 * @return string
 */
function geoip_asnum_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_continent_code_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_country_code3_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_country_code_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_country_name_by_name(string $hostname) : string {}

/**
 * @param int $database
 * @return string
 */
function geoip_database_info(int $database = GEOIP_COUNTRY_EDITION) : string {}

/**
 * @param int $database
 * @return bool
 */
function geoip_db_avail(int $database) : bool {}

/**
 * @param int $database
 * @return string
 */
function geoip_db_filename(int $database) : string {}

/**
 * @return array
 */
function geoip_db_get_all_info() : array {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_domain_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return int
 */
function geoip_id_by_name(string $hostname) : int {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_isp_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_netspeedcell_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return string
 */
function geoip_org_by_name(string $hostname) : string {}

/**
 * @param string $hostname
 * @return array
 */
function geoip_record_by_name(string $hostname) : array {}

/**
 * @param string $hostname
 * @return array
 */
function geoip_region_by_name(string $hostname) : array {}

/**
 * @param string $country_code
 * @param string $region_code
 * @return string
 */
function geoip_region_name_by_code(string $country_code, string $region_code) : string {}

/**
 * @param string $path
 * @return void
 */
function geoip_setup_custom_directory(string $path) {}

/**
 * @param string $country_code
 * @param string $region_code
 * @return string
 */
function geoip_time_zone_by_country_and_region(string $country_code, string $region_code = '') : string {}
