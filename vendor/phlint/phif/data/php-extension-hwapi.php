<?php

/**
 * @param string $name
 * @param string $value
 * @return HW_API_Attribute
 */
function hwapi_attribute_new(string $name = '', string $value = '') : HW_API_Attribute {}

/**
 * @param string $content
 * @param string $mimetype
 * @return HW_API_Content
 */
function hwapi_content_new(string $content, string $mimetype) : HW_API_Content {}

/**
 * @param string $hostname
 * @param int $port
 * @return HW_API
 */
function hwapi_hgcsp(string $hostname, int $port = 0) : HW_API {}

/**
 * @param array $parameter
 * @return hw_api_object
 */
function hwapi_object_new(array $parameter) : hw_api_object {}
