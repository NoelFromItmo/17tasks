<?php

/**
 * @param resource $hconn
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_back($hconn, &$compCode, &$reason) {}

/**
 * @param resource $hconn
 * @param array $beginOptions
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_begin($hconn, array $beginOptions, &$compCode, &$reason) {}

/**
 * @param resource $hconn
 * @param resource $hobj
 * @param int $options
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_close($hconn, $hobj, int $options, &$compCode, &$reason) {}

/**
 * @param resource $hconn
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_cmit($hconn, &$compCode, &$reason) {}

/**
 * @param string $qManagerName
 * @param resource $hconn
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_conn(string $qManagerName, &$hconn, &$compCode, &$reason) {}

/**
 * @param string $qManagerName
 * @param array $connOptions
 * @param resource $hconn
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_connx(string $qManagerName, array &$connOptions, &$hconn, &$compCode, &$reason) {}

/**
 * @param resource $hconn
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_disc($hconn, &$compCode, &$reason) {}

/**
 * @param resource $hConn
 * @param resource $hObj
 * @param array $md
 * @param array $gmo
 * @param int $bufferLength
 * @param string $msg
 * @param int $data_length
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_get($hConn, $hObj, array &$md, array &$gmo, int &$bufferLength, string &$msg, int &$data_length, &$compCode, &$reason) {}

/**
 * @param resource $hconn
 * @param resource $hobj
 * @param int $selectorCount
 * @param array $selectors
 * @param int $intAttrCount
 * @param resource $intAttr
 * @param int $charAttrLength
 * @param resource $charAttr
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_inq($hconn, $hobj, int $selectorCount, array $selectors, int $intAttrCount, &$intAttr, int $charAttrLength, &$charAttr, &$compCode, &$reason) {}

/**
 * @param resource $hconn
 * @param array $objDesc
 * @param int $option
 * @param resource $hobj
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_open($hconn, array &$objDesc, int $option, &$hobj, &$compCode, &$reason) {}

/**
 * @param resource $hConn
 * @param resource $hObj
 * @param array $md
 * @param array $pmo
 * @param string $message
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_put($hConn, $hObj, array &$md, array &$pmo, string $message, &$compCode, &$reason) {}

/**
 * @param resource $hconn
 * @param resource $objDesc
 * @param resource $msgDesc
 * @param resource $pmo
 * @param string $buffer
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_put1($hconn, &$objDesc, &$msgDesc, &$pmo, string $buffer, &$compCode, &$reason) {}

/**
 * @param resource $hConn
 * @param resource $hObj
 * @param int $selectorCount
 * @param array $selectors
 * @param int $intAttrCount
 * @param array $intAttrs
 * @param int $charAttrLength
 * @param array $charAttrs
 * @param resource $compCode
 * @param resource $reason
 * @return void
 */
function mqseries_set($hConn, $hObj, int $selectorCount, array $selectors, int $intAttrCount, array $intAttrs, int $charAttrLength, array $charAttrs, &$compCode, &$reason) {}

/**
 * @param int $reason
 * @return string
 */
function mqseries_strerror(int $reason) : string {}
