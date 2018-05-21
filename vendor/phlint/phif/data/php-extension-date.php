<?php

const DATE_ATOM = 'Y-m-d\\TH:i:sP';
const DATE_COOKIE = 'l, d-M-Y H:i:s T';
const DATE_ISO8601 = 'Y-m-d\\TH:i:sO';
const DATE_RFC1036 = 'D, d M y H:i:s O';
const DATE_RFC1123 = 'D, d M Y H:i:s O';
const DATE_RFC2822 = 'D, d M Y H:i:s O';
const DATE_RFC3339 = 'Y-m-d\\TH:i:sP';
const DATE_RFC3339_EXTENDED = 'Y-m-d\\TH:i:s.vP';
const DATE_RFC7231 = 'D, d M Y H:i:s \\G\\M\\T';
const DATE_RFC822 = 'D, d M y H:i:s O';
const DATE_RFC850 = 'l, d-M-y H:i:s T';
const DATE_RSS = 'D, d M Y H:i:s O';
const DATE_W3C = 'Y-m-d\\TH:i:sP';
const SUNFUNCS_RET_DOUBLE = 2;
const SUNFUNCS_RET_STRING = 1;
const SUNFUNCS_RET_TIMESTAMP = 0;

/**
 * @param int $month
 * @param int $day
 * @param int $year
 * @return bool
 */
function checkdate(int $month, int $day, int $year) : bool {}

/**
 * @param string $format
 * @param int $timestamp
 * @return string
 */
function date(string $format, int $timestamp = 0) : string {}

/**
 * @param DateTime $object
 * @param DateInterval $interval
 * @return DateTime
 */
function date_add(DateTime $object, DateInterval $interval) : DateTime {}

/**
 * @param string $time
 * @param DateTimeZone $timezone
 * @return DateTime
 */
function date_create(string $time = "now", DateTimeZone $timezone = null) : DateTime {}

/**
 * @param string $format
 * @param string $time
 * @param DateTimeZone $timezone
 * @return DateTime
 */
function date_create_from_format(string $format, string $time, DateTimeZone $timezone = null) : DateTime {}

/**
 * @param string $time
 * @param DateTimeZone $timezone
 * @return DateTimeImmutable
 */
function date_create_immutable(string $time = "now", DateTimeZone $timezone = null) : DateTimeImmutable {}

/**
 * @param string $format
 * @param string $time
 * @param DateTimeZone $timezone
 * @return DateTimeImmutable
 */
function date_create_immutable_from_format(string $format, string $time, DateTimeZone $timezone = null) : DateTimeImmutable {}

/**
 * @param DateTime $object
 * @param int $year
 * @param int $month
 * @param int $day
 * @return DateTime
 */
function date_date_set(DateTime $object, int $year, int $month, int $day) : DateTime {}

/**
 * @return string
 */
function date_default_timezone_get() : string {}

/**
 * @param string $timezone_identifier
 * @return bool
 */
function date_default_timezone_set(string $timezone_identifier) : bool {}

/**
 * @param DateTimeInterface $datetime1
 * @param DateTimeInterface $datetime2
 * @param bool $absolute
 * @return DateInterval
 */
function date_diff(DateTimeInterface $datetime1, DateTimeInterface $datetime2, bool $absolute = false) : DateInterval {}

/**
 * @param DateTimeInterface $object
 * @param string $format
 * @return string
 */
function date_format(DateTimeInterface $object, string $format) : string {}

/**
 * @return array
 */
function date_get_last_errors() : array {}

/**
 * @param mixed $time
 * @return void
 */
function date_interval_create_from_date_string($time) {}

/**
 * @param mixed $object
 * @param mixed $format
 * @return void
 */
function date_interval_format($object, $format) {}

/**
 * @param DateTime $object
 * @param int $year
 * @param int $week
 * @param int $day
 * @return DateTime
 */
function date_isodate_set(DateTime $object, int $year, int $week, int $day = 1) : DateTime {}

/**
 * @param DateTime $object
 * @param string $modify
 * @return DateTime
 */
function date_modify(DateTime $object, string $modify) : DateTime {}

/**
 * @param DateTimeInterface $object
 * @return int
 */
function date_offset_get(DateTimeInterface $object) : int {}

/**
 * @param string $date
 * @return array
 */
function date_parse(string $date) : array {}

/**
 * @param string $format
 * @param string $date
 * @return array
 */
function date_parse_from_format(string $format, string $date) : array {}

/**
 * @param DateTime $object
 * @param DateInterval $interval
 * @return DateTime
 */
function date_sub(DateTime $object, DateInterval $interval) : DateTime {}

/**
 * @param int $time
 * @param float $latitude
 * @param float $longitude
 * @return array
 */
function date_sun_info(int $time, float $latitude, float $longitude) : array {}

/**
 * @param int $timestamp
 * @param int $format
 * @param float $latitude
 * @param float $longitude
 * @param float $zenith
 * @param float $gmt_offset
 * @return mixed
 */
function date_sunrise(int $timestamp, int $format = SUNFUNCS_RET_STRING, float $latitude = ini_get("date.default_latitude"), float $longitude = ini_get("date.default_longitude"), float $zenith = ini_get("date.sunrise_zenith"), float $gmt_offset = 0) {}

/**
 * @param int $timestamp
 * @param int $format
 * @param float $latitude
 * @param float $longitude
 * @param float $zenith
 * @param float $gmt_offset
 * @return mixed
 */
function date_sunset(int $timestamp, int $format = SUNFUNCS_RET_STRING, float $latitude = ini_get("date.default_latitude"), float $longitude = ini_get("date.default_longitude"), float $zenith = ini_get("date.sunset_zenith"), float $gmt_offset = 0) {}

/**
 * @param DateTime $object
 * @param int $hour
 * @param int $minute
 * @param int $second
 * @param int $microseconds
 * @return DateTime
 */
function date_time_set(DateTime $object, int $hour, int $minute, int $second = 0, int $microseconds = 0) : DateTime {}

/**
 * @param DateTimeInterface $object
 * @return int
 */
function date_timestamp_get(DateTimeInterface $object) : int {}

/**
 * @param DateTime $object
 * @param int $unixtimestamp
 * @return DateTime
 */
function date_timestamp_set(DateTime $object, int $unixtimestamp) : DateTime {}

/**
 * @param DateTimeInterface $object
 * @return DateTimeZone
 */
function date_timezone_get(DateTimeInterface $object) : DateTimeZone {}

/**
 * @param DateTime $object
 * @param DateTimeZone $timezone
 * @return DateTime
 */
function date_timezone_set(DateTime $object, DateTimeZone $timezone) : DateTime {}

/**
 * @param int $timestamp
 * @return array
 */
function getdate(int $timestamp = 0) : array {}

/**
 * @param string $format
 * @param int $timestamp
 * @return string
 */
function gmdate(string $format, int $timestamp = 0) : string {}

/**
 * @param int $hour
 * @param int $minute
 * @param int $second
 * @param int $month
 * @param int $day
 * @param int $year
 * @param int $is_dst
 * @return int
 */
function gmmktime(int $hour = gmdate("H"), int $minute = gmdate("i"), int $second = gmdate("s"), int $month = gmdate("n"), int $day = gmdate("j"), int $year = gmdate("Y"), int $is_dst = -1) : int {}

/**
 * @param string $format
 * @param int $timestamp
 * @return string
 */
function gmstrftime(string $format, int $timestamp = 0) : string {}

/**
 * @param string $format
 * @param int $timestamp
 * @return int
 */
function idate(string $format, int $timestamp = 0) : int {}

/**
 * @param int $timestamp
 * @param bool $is_associative
 * @return array
 */
function localtime(int $timestamp = 0, bool $is_associative = false) : array {}

/**
 * @param int $hour
 * @param int $minute
 * @param int $second
 * @param int $month
 * @param int $day
 * @param int $year
 * @param int $is_dst
 * @return int
 */
function mktime(int $hour = date("H"), int $minute = date("i"), int $second = date("s"), int $month = date("n"), int $day = date("j"), int $year = date("Y"), int $is_dst = -1) : int {}

/**
 * @param string $format
 * @param int $timestamp
 * @return string
 */
function strftime(string $format, int $timestamp = 0) : string {}

/**
 * @param string $time
 * @param int $now
 * @return int
 */
function strtotime(string $time, int $now = 0) : int {}

/**
 * @return int
 */
function time() : int {}

/**
 * @return array
 */
function timezone_abbreviations_list() : array {}

/**
 * @param int $what
 * @param string $country
 * @return array
 */
function timezone_identifiers_list(int $what = DateTimeZone::ALL, string $country = null) : array {}

/**
 * @param DateTimeZone $object
 * @return array
 */
function timezone_location_get(DateTimeZone $object) : array {}

/**
 * @param string $abbr
 * @param int $gmtOffset
 * @param int $isdst
 * @return string
 */
function timezone_name_from_abbr(string $abbr, int $gmtOffset = -1, int $isdst = -1) : string {}

/**
 * @param DateTimeZone $object
 * @return string
 */
function timezone_name_get(DateTimeZone $object) : string {}

/**
 * @param DateTimeZone $object
 * @param DateTime $datetime
 * @return int
 */
function timezone_offset_get(DateTimeZone $object, DateTimeInterface $datetime) : int {}

/**
 * @param string $timezone
 * @return DateTimeZone
 */
function timezone_open(string $timezone) : DateTimeZone {}

/**
 * @param DateTimeZone $object
 * @param int $timestamp_begin
 * @param int $timestamp_end
 * @return array
 */
function timezone_transitions_get(DateTimeZone $object, int $timestamp_begin = 0, int $timestamp_end = 0) : array {}

/**
 * @return string
 */
function timezone_version_get() : string {}

class DateInterval
{
    function __construct() {}
    function __set_state() {}
    function __wakeup() {}
    function createFromDateString(string $time) : DateInterval {}
    /**
     * @template
     */
    function format(string $format) : string
    {
        if (substr($format, 0, 2) == "%%") {
            return "%" . self::format(substr($format, 2));
        }
        if (substr($format, 0, 2) == "%d") {
            return rand(0, 31) . self::format(substr($format, 2));
        }
        if (substr($format, 0, 2) == "%m") {
            return rand(0, 12) . self::format(substr($format, 2));
        }
        if (strlen($format) == 0) {
            return $format;
        }
        if (strlen($format) == 1) {
            return $format;
        }
        return substr($format, 0, 1) . self::format(substr($format, 1));
    }
}

class DatePeriod implements Traversable
{
    function __construct() {}
    function __set_state() {}
    function __wakeup() {}
    function getDateInterval() : DateInterval {}
    function getEndDate() : DateTimeInterface {}
    function getStartDate() : DateTimeInterface {}
}

class DateTime implements DateTimeInterface
{
    function __construct() {}
    function __set_state(array $array) : DateTime {}
    function __wakeup() {}
    function add(DateInterval $interval) : DateTime {}
    function createFromFormat(string $format, string $time, DateTimeZone $timezone = null) : DateTime {}
    function diff(DateTimeInterface $datetime2, bool $absolute = false) : DateInterval {}
    function format(string $format) : string {}
    function getLastErrors() : array {}
    function getOffset() : int {}
    function getTimestamp() : int {}
    function getTimezone() : DateTimeZone {}
    function modify(string $modify) : DateTime {}
    function setDate(int $year, int $month, int $day) : DateTime {}
    function setISODate(int $year, int $week, int $day = 1) : DateTime {}
    function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0) : DateTime {}
    function setTimestamp(int $unixtimestamp) : DateTime {}
    function setTimezone(DateTimeZone $timezone) : DateTime {}
    function sub(DateInterval $interval) : DateTime {}
}

class DateTimeImmutable implements DateTimeInterface
{
    function __construct() {}
    function __set_state(array $array) : DateTimeImmutable {}
    function __wakeup() {}
    function add(DateInterval $interval) : DateTimeImmutable {}
    function createFromFormat(string $format, string $time, DateTimeZone $timezone = null) : DateTimeImmutable {}
    function createFromMutable(DateTime $datetime) : DateTimeImmutable {}
    function diff(DateTimeInterface $datetime2, bool $absolute = false) : DateInterval {}
    function format(string $format) : string {}
    function getLastErrors() : array {}
    function getOffset() : int {}
    function getTimestamp() : int {}
    function getTimezone() : DateTimeZone {}
    function modify(string $modify) : DateTimeImmutable {}
    function setDate(int $year, int $month, int $day) : DateTimeImmutable {}
    function setISODate(int $year, int $week, int $day = 1) : DateTimeImmutable {}
    function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0) : DateTimeImmutable {}
    function setTimestamp(int $unixtimestamp) : DateTimeImmutable {}
    function setTimezone(DateTimeZone $timezone) : DateTimeImmutable {}
    function sub(DateInterval $interval) : DateTimeImmutable {}
}

interface DateTimeInterface
{
    function diff(DateTimeInterface $datetime2, bool $absolute = false) : DateInterval {}
    function format(string $format) : string {}
    function getOffset() : int {}
    function getTimestamp() : int {}
    function getTimezone() : DateTimeZone {}
    function __wakeup() {}
}

class DateTimeZone
{
    function __construct() {}
    function __set_state() {}
    function __wakeup() {}
    function getLocation() : array {}
    function getName() : string {}
    function getOffset(DateTime $datetime) : int {}
    function getTransitions(int $timestamp_begin = 0, int $timestamp_end = 0) : array {}
    function listAbbreviations() : array {}
    function listIdentifiers(int $what = DateTimeZone::ALL, string $country = null) : array {}
}
