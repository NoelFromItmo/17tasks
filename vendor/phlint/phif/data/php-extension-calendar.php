<?php

const CAL_DOW_DAYNO = 0;
const CAL_DOW_LONG = 1;
const CAL_DOW_SHORT = 2;
const CAL_EASTER_ALWAYS_GREGORIAN = 2;
const CAL_EASTER_ALWAYS_JULIAN = 3;
const CAL_EASTER_DEFAULT = 0;
const CAL_EASTER_ROMAN = 1;
const CAL_FRENCH = 3;
const CAL_GREGORIAN = 0;
const CAL_JEWISH = 2;
const CAL_JEWISH_ADD_ALAFIM = 4;
const CAL_JEWISH_ADD_ALAFIM_GERESH = 2;
const CAL_JEWISH_ADD_GERESHAYIM = 8;
const CAL_JULIAN = 1;
const CAL_MONTH_FRENCH = 5;
const CAL_MONTH_GREGORIAN_LONG = 1;
const CAL_MONTH_GREGORIAN_SHORT = 0;
const CAL_MONTH_JEWISH = 4;
const CAL_MONTH_JULIAN_LONG = 3;
const CAL_MONTH_JULIAN_SHORT = 2;
const CAL_NUM_CALS = 4;

/**
 * @param int $calendar
 * @param int $month
 * @param int $year
 * @return int
 */
function cal_days_in_month(int $calendar, int $month, int $year) : int {}

/**
 * @param int $jd
 * @param int $calendar
 * @return array
 */
function cal_from_jd(int $jd, int $calendar) : array {}

/**
 * @param int $calendar
 * @return array
 */
function cal_info(int $calendar = -1) : array {}

/**
 * @param int $calendar
 * @param int $month
 * @param int $day
 * @param int $year
 * @return int
 */
function cal_to_jd(int $calendar, int $month, int $day, int $year) : int {}

/**
 * @param int $year
 * @return int
 */
function easter_date(int $year = date("Y")) : int {}

/**
 * @param int $year
 * @param int $method
 * @return int
 */
function easter_days(int $year = date("Y"), int $method = CAL_EASTER_DEFAULT) : int {}

/**
 * @param int $month
 * @param int $day
 * @param int $year
 * @return int
 */
function frenchtojd(int $month, int $day, int $year) : int {}

/**
 * @param int $month
 * @param int $day
 * @param int $year
 * @return int
 */
function gregoriantojd(int $month, int $day, int $year) : int {}

/**
 * @param int $julianday
 * @param int $mode
 * @return mixed
 */
function jddayofweek(int $julianday, int $mode = CAL_DOW_DAYNO) {}

/**
 * @param int $julianday
 * @param int $mode
 * @return string
 */
function jdmonthname(int $julianday, int $mode) : string {}

/**
 * @param int $juliandaycount
 * @return string
 */
function jdtofrench(int $juliandaycount) : string {}

/**
 * @param int $julianday
 * @return string
 */
function jdtogregorian(int $julianday) : string {}

/**
 * @param int $juliandaycount
 * @param bool $hebrew
 * @param int $fl
 * @return string
 */
function jdtojewish(int $juliandaycount, bool $hebrew = false, int $fl = 0) : string {}

/**
 * @param int $julianday
 * @return string
 */
function jdtojulian(int $julianday) : string {}

/**
 * @param int $jday
 * @return int
 */
function jdtounix(int $jday) : int {}

/**
 * @param int $month
 * @param int $day
 * @param int $year
 * @return int
 */
function jewishtojd(int $month, int $day, int $year) : int {}

/**
 * @param int $month
 * @param int $day
 * @param int $year
 * @return int
 */
function juliantojd(int $month, int $day, int $year) : int {}

/**
 * @param int $timestamp
 * @return int
 */
function unixtojd(int $timestamp = 0) : int {}
