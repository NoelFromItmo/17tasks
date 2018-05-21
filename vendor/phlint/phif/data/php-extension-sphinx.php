<?php

class SphinxClient
{
    function __construct() {}
    function addQuery(string $query, string $index = "*", string $comment = "") : int {}
    function buildExcerpts(array $docs, string $index, string $words, array $opts = []) : array {}
    function buildKeywords(string $query, string $index, bool $hits) : array {}
    function close() : bool {}
    function escapeString(string $string) : string {}
    function getLastError() : string {}
    function getLastWarning() : string {}
    function open() : bool {}
    function query(string $query, string $index = "*", string $comment = "") : array {}
    function resetFilters() {}
    function resetGroupBy() {}
    function runQueries() : array {}
    function setArrayResult(bool $array_result) : bool {}
    function setConnectTimeout(float $timeout) : bool {}
    function setFieldWeights(array $weights) : bool {}
    function setFilter(string $attribute, array $values, bool $exclude = false) : bool {}
    function setFilterFloatRange(string $attribute, float $min, float $max, bool $exclude = false) : bool {}
    function setFilterRange(string $attribute, int $min, int $max, bool $exclude = false) : bool {}
    function setGeoAnchor(string $attrlat, string $attrlong, float $latitude, float $longitude) : bool {}
    function setGroupBy(string $attribute, int $func, string $groupsort = "@group desc") : bool {}
    function setGroupDistinct(string $attribute) : bool {}
    function setIDRange(int $min, int $max) : bool {}
    function setIndexWeights(array $weights) : bool {}
    function setLimits(int $offset, int $limit, int $max_matches = 0, int $cutoff = 0) : bool {}
    function setMatchMode(int $mode) : bool {}
    function setMaxQueryTime(int $qtime) : bool {}
    function setOverride(string $attribute, int $type, array $values) : bool {}
    function setRankingMode(int $ranker) : bool {}
    function setRetries(int $count, int $delay = 0) : bool {}
    function setSelect(string $clause) : bool {}
    function setServer(string $server, int $port) : bool {}
    function setSortMode(int $mode, string $sortby = '') : bool {}
    function status() : array {}
    function updateAttributes(string $index, array $attributes, array $values, bool $mva = false) : int {}
}
