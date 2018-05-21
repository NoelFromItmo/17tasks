<?php

/**
 * @return string
 */
function solr_get_version() : string {}

final class SolrClient
{
    function __construct(array $clientOptions) {}
    function __destruct() {}
    function addDocument(SolrInputDocument $doc, bool $overwrite = true, int $commitWithin = 0) : SolrUpdateResponse {}
    function addDocuments(array $docs, bool $overwrite = true, int $commitWithin = 0) {}
    function commit(bool $softCommit = false, bool $waitSearcher = true, bool $expungeDeletes = false) : SolrUpdateResponse {}
    function deleteById(string $id) : SolrUpdateResponse {}
    function deleteByIds(array $ids) : SolrUpdateResponse {}
    function deleteByQueries(array $queries) : SolrUpdateResponse {}
    function deleteByQuery(string $query) : SolrUpdateResponse {}
    function getById(string $id) : SolrQueryResponse {}
    function getByIds(array $ids) : SolrQueryResponse {}
    function getDebug() : string {}
    function getOptions() : array {}
    function optimize(int $maxSegments = 1, bool $softCommit = true, bool $waitSearcher = true) : SolrUpdateResponse {}
    function ping() : SolrPingResponse {}
    function query(SolrParams $query) : SolrQueryResponse {}
    function request(string $raw_request) : SolrUpdateResponse {}
    function rollback() : SolrUpdateResponse {}
    function setResponseWriter(string $responseWriter) {}
    function setServlet(int $type, string $value) : bool {}
    function system() {}
    function threads() {}
}

class SolrClientException extends SolrException
{
    function getInternalInfo() : array {}
}

class SolrCollapseFunction
{
    function __toString() : string {}
    function getField() : string {}
    function getHint() : string {}
    function getMax() : string {}
    function getMin() : string {}
    function getNullPolicy() : string {}
    function getSize() : int {}
    function setField(string $fieldName) : SolrCollapseFunction {}
    function setHint(string $hint) : SolrCollapseFunction {}
    function setMax(string $max) : SolrCollapseFunction {}
    function setMin(string $min) : SolrCollapseFunction {}
    function setNullPolicy(string $nullPolicy) : SolrCollapseFunction {}
    function setSize(int $size) : SolrCollapseFunction {}
}

final class SolrDocument implements ArrayAccess, Iterator, Serializable
{
    function __clone() {}
    function __construct() {}
    function __destruct() {}
    function __get(string $fieldName) : SolrDocumentField {}
    function __isset(string $fieldName) : bool {}
    function __set(string $fieldName, string $fieldValue) : bool {}
    function __unset(string $fieldName) : bool {}
    function addField(string $fieldName, string $fieldValue) : bool {}
    function clear() : bool {}
    function current() : SolrDocumentField {}
    function deleteField(string $fieldName) : bool {}
    function fieldExists(string $fieldName) : bool {}
    function getChildDocuments() : array {}
    function getChildDocumentsCount() : int {}
    function getField(string $fieldName) : SolrDocumentField {}
    function getFieldCount() : int {}
    function getFieldNames() : array {}
    function getInputDocument() : SolrInputDocument {}
    function hasChildDocuments() : bool {}
    function key() : string {}
    function merge(SolrDocument $sourceDoc, bool $overwrite = true) : bool {}
    function next() {}
    function offsetExists(string $fieldName) : bool {}
    function offsetGet(string $fieldName) : SolrDocumentField {}
    function offsetSet(string $fieldName, string $fieldValue) {}
    function offsetUnset(string $fieldName) {}
    function reset() : bool {}
    function rewind() {}
    function serialize() : string {}
    function sort(int $sortOrderBy, int $sortDirection = SolrDocument::SORT_ASC) : bool {}
    function toArray() : array {}
    function unserialize(string $serialized) {}
    function valid() : bool {}
}

final class SolrDocumentField
{
    function __construct() {}
    function __destruct() {}
}

class SolrException extends Exception
{
    function getInternalInfo() : array {}
}

final class SolrGenericResponse extends SolrResponse
{
    function __construct() {}
    function __destruct() {}
}

class SolrIllegalArgumentException extends SolrException
{
    function getInternalInfo() : array {}
}

class SolrIllegalOperationException extends SolrException
{
    function getInternalInfo() : array {}
}

final class SolrInputDocument
{
    function __clone() {}
    function __construct() {}
    function __destruct() {}
    function addChildDocument(SolrInputDocument $child) {}
    function addChildDocuments(array &$docs) {}
    function addField(string $fieldName, string $fieldValue, float $fieldBoostValue = 0.0) : bool {}
    function clear() : bool {}
    function deleteField(string $fieldName) : bool {}
    function fieldExists(string $fieldName) : bool {}
    function getBoost() : float {}
    function getChildDocuments() : array {}
    function getChildDocumentsCount() : int {}
    function getField(string $fieldName) : SolrDocumentField {}
    function getFieldBoost(string $fieldName) : float {}
    function getFieldCount() : int {}
    function getFieldNames() : array {}
    function hasChildDocuments() : bool {}
    function merge(SolrInputDocument $sourceDoc, bool $overwrite = true) : bool {}
    function reset() : bool {}
    function setBoost(float $documentBoostValue) : bool {}
    function setFieldBoost(string $fieldName, float $fieldBoostValue) : bool {}
    function sort(int $sortOrderBy, int $sortDirection = SolrInputDocument::SORT_ASC) : bool {}
    function toArray() : array {}
}

class SolrModifiableParams extends SolrParams implements Serializable
{
    function __construct() {}
    function __destruct() {}
}

final class SolrObject implements ArrayAccess
{
    function __construct() {}
    function __destruct() {}
    function getPropertyNames() : array {}
    function offsetExists(string $property_name) : bool {}
    function offsetGet(string $property_name) {}
    function offsetSet(string $property_name, string $property_value) {}
    function offsetUnset(string $property_name) {}
}

abstract class SolrParams implements Serializable
{
    function add(string $name, string $value) : SolrParams {}
    function addParam(string $name, string $value) : SolrParams {}
    function get(string $param_name) {}
    function getParam(string $param_name = '') {}
    function getParams() : array {}
    function getPreparedParams() : array {}
    function serialize() : string {}
    function set(string $name, string $value) {}
    function setParam(string $name, string $value) : SolrParams {}
    function toString(bool $url_encode = false) : string {}
    function unserialize(string $serialized) {}
}

final class SolrPingResponse extends SolrResponse
{
    function __construct() {}
    function __destruct() {}
    function getResponse() : string {}
}

class SolrQuery extends SolrModifiableParams implements Serializable
{
    function __construct(string $q = '') {}
    function __destruct() {}
    function addExpandFilterQuery(string $fq) : SolrQuery {}
    function addExpandSortField(string $field, string $order = '') : SolrQuery {}
    function addFacetDateField(string $dateField) : SolrQuery {}
    function addFacetDateOther(string $value, string $field_override = '') : SolrQuery {}
    function addFacetField(string $field) : SolrQuery {}
    function addFacetQuery(string $facetQuery) : SolrQuery {}
    function addField(string $field) : SolrQuery {}
    function addFilterQuery(string $fq) : SolrQuery {}
    function addGroupField(string $value) : SolrQuery {}
    function addGroupFunction(string $value) : SolrQuery {}
    function addGroupQuery(string $value) : SolrQuery {}
    function addGroupSortField(string $field, int $order = 0) : SolrQuery {}
    function addHighlightField(string $field) : SolrQuery {}
    function addMltField(string $field) : SolrQuery {}
    function addMltQueryField(string $field, float $boost) : SolrQuery {}
    function addSortField(string $field, int $order = SolrQuery::ORDER_DESC) : SolrQuery {}
    function addStatsFacet(string $field) : SolrQuery {}
    function addStatsField(string $field) : SolrQuery {}
    function collapse(SolrCollapseFunction $collapseFunction) : SolrQuery {}
    function getExpand() : bool {}
    function getExpandFilterQueries() : array {}
    function getExpandQuery() : array {}
    function getExpandRows() : int {}
    function getExpandSortFields() : array {}
    function getFacet() : bool {}
    function getFacetDateEnd(string $field_override = '') : string {}
    function getFacetDateFields() : array {}
    function getFacetDateGap(string $field_override = '') : string {}
    function getFacetDateHardEnd(string $field_override = '') : string {}
    function getFacetDateOther(string $field_override = '') : array {}
    function getFacetDateStart(string $field_override = '') : string {}
    function getFacetFields() : array {}
    function getFacetLimit(string $field_override = '') : int {}
    function getFacetMethod(string $field_override = '') : string {}
    function getFacetMinCount(string $field_override = '') : int {}
    function getFacetMissing(string $field_override = '') : bool {}
    function getFacetOffset(string $field_override = '') : int {}
    function getFacetPrefix(string $field_override = '') : string {}
    function getFacetQueries() : array {}
    function getFacetSort(string $field_override = '') : int {}
    function getFields() : array {}
    function getFilterQueries() : array {}
    function getGroup() : bool {}
    function getGroupCachePercent() : int {}
    function getGroupFacet() : bool {}
    function getGroupFields() : array {}
    function getGroupFormat() : string {}
    function getGroupFunctions() : array {}
    function getGroupLimit() : int {}
    function getGroupMain() : bool {}
    function getGroupNGroups() : bool {}
    function getGroupOffset() : int {}
    function getGroupQueries() : array {}
    function getGroupSortFields() : array {}
    function getGroupTruncate() : bool {}
    function getHighlight() : bool {}
    function getHighlightAlternateField(string $field_override = '') : string {}
    function getHighlightFields() : array {}
    function getHighlightFormatter(string $field_override = '') : string {}
    function getHighlightFragmenter(string $field_override = '') : string {}
    function getHighlightFragsize(string $field_override = '') : int {}
    function getHighlightHighlightMultiTerm() : bool {}
    function getHighlightMaxAlternateFieldLength(string $field_override = '') : int {}
    function getHighlightMaxAnalyzedChars() : int {}
    function getHighlightMergeContiguous(string $field_override = '') : bool {}
    function getHighlightRegexMaxAnalyzedChars() : int {}
    function getHighlightRegexPattern() : string {}
    function getHighlightRegexSlop() : float {}
    function getHighlightRequireFieldMatch() : bool {}
    function getHighlightSimplePost(string $field_override = '') : string {}
    function getHighlightSimplePre(string $field_override = '') : string {}
    function getHighlightSnippets(string $field_override = '') : int {}
    function getHighlightUsePhraseHighlighter() : bool {}
    function getMlt() : bool {}
    function getMltBoost() : bool {}
    function getMltCount() : int {}
    function getMltFields() : array {}
    function getMltMaxNumQueryTerms() : int {}
    function getMltMaxNumTokens() : int {}
    function getMltMaxWordLength() : int {}
    function getMltMinDocFrequency() : int {}
    function getMltMinTermFrequency() : int {}
    function getMltMinWordLength() : int {}
    function getMltQueryFields() : array {}
    function getQuery() : string {}
    function getRows() : int {}
    function getSortFields() : array {}
    function getStart() : int {}
    function getStats() : bool {}
    function getStatsFacets() : array {}
    function getStatsFields() : array {}
    function getTerms() : bool {}
    function getTermsField() : string {}
    function getTermsIncludeLowerBound() : bool {}
    function getTermsIncludeUpperBound() : bool {}
    function getTermsLimit() : int {}
    function getTermsLowerBound() : string {}
    function getTermsMaxCount() : int {}
    function getTermsMinCount() : int {}
    function getTermsPrefix() : string {}
    function getTermsReturnRaw() : bool {}
    function getTermsSort() : int {}
    function getTermsUpperBound() : string {}
    function getTimeAllowed() : int {}
    function removeExpandFilterQuery(string $fq) : SolrQuery {}
    function removeExpandSortField(string $field) : SolrQuery {}
    function removeFacetDateField(string $field) : SolrQuery {}
    function removeFacetDateOther(string $value, string $field_override = '') : SolrQuery {}
    function removeFacetField(string $field) : SolrQuery {}
    function removeFacetQuery(string $value) : SolrQuery {}
    function removeField(string $field) : SolrQuery {}
    function removeFilterQuery(string $fq) : SolrQuery {}
    function removeHighlightField(string $field) : SolrQuery {}
    function removeMltField(string $field) : SolrQuery {}
    function removeMltQueryField(string $queryField) : SolrQuery {}
    function removeSortField(string $field) : SolrQuery {}
    function removeStatsFacet(string $value) : SolrQuery {}
    function removeStatsField(string $field) : SolrQuery {}
    function setEchoHandler(bool $flag) : SolrQuery {}
    function setEchoParams(string $type) : SolrQuery {}
    function setExpand(bool $value) : SolrQuery {}
    function setExpandQuery(string $q) : SolrQuery {}
    function setExpandRows(int $value) : SolrQuery {}
    function setExplainOther(string $query) : SolrQuery {}
    function setFacet(bool $flag) : SolrQuery {}
    function setFacetDateEnd(string $value, string $field_override = '') : SolrQuery {}
    function setFacetDateGap(string $value, string $field_override = '') : SolrQuery {}
    function setFacetDateHardEnd(bool $value, string $field_override = '') : SolrQuery {}
    function setFacetDateStart(string $value, string $field_override = '') : SolrQuery {}
    function setFacetEnumCacheMinDefaultFrequency(int $frequency, string $field_override = '') : SolrQuery {}
    function setFacetLimit(int $limit, string $field_override = '') : SolrQuery {}
    function setFacetMethod(string $method, string $field_override = '') : SolrQuery {}
    function setFacetMinCount(int $mincount, string $field_override = '') : SolrQuery {}
    function setFacetMissing(bool $flag, string $field_override = '') : SolrQuery {}
    function setFacetOffset(int $offset, string $field_override = '') : SolrQuery {}
    function setFacetPrefix(string $prefix, string $field_override = '') : SolrQuery {}
    function setFacetSort(int $facetSort, string $field_override = '') : SolrQuery {}
    function setGroup(bool $value) : SolrQuery {}
    function setGroupCachePercent(int $percent) : SolrQuery {}
    function setGroupFacet(bool $value) : SolrQuery {}
    function setGroupFormat(string $value) : SolrQuery {}
    function setGroupLimit(int $value) : SolrQuery {}
    function setGroupMain(string $value) : SolrQuery {}
    function setGroupNGroups(bool $value) : SolrQuery {}
    function setGroupOffset(int $value) : SolrQuery {}
    function setGroupTruncate(bool $value) : SolrQuery {}
    function setHighlight(bool $flag) : SolrQuery {}
    function setHighlightAlternateField(string $field, string $field_override = '') : SolrQuery {}
    function setHighlightFormatter(string $formatter, string $field_override = '') : SolrQuery {}
    function setHighlightFragmenter(string $fragmenter, string $field_override = '') : SolrQuery {}
    function setHighlightFragsize(int $size, string $field_override = '') : SolrQuery {}
    function setHighlightHighlightMultiTerm(bool $flag) : SolrQuery {}
    function setHighlightMaxAlternateFieldLength(int $fieldLength, string $field_override = '') : SolrQuery {}
    function setHighlightMaxAnalyzedChars(int $value) : SolrQuery {}
    function setHighlightMergeContiguous(bool $flag, string $field_override = '') : SolrQuery {}
    function setHighlightRegexMaxAnalyzedChars(int $maxAnalyzedChars) : SolrQuery {}
    function setHighlightRegexPattern(string $value) : SolrQuery {}
    function setHighlightRegexSlop(float $factor) : SolrQuery {}
    function setHighlightRequireFieldMatch(bool $flag) : SolrQuery {}
    function setHighlightSimplePost(string $simplePost, string $field_override = '') : SolrQuery {}
    function setHighlightSimplePre(string $simplePre, string $field_override = '') : SolrQuery {}
    function setHighlightSnippets(int $value, string $field_override = '') : SolrQuery {}
    function setHighlightUsePhraseHighlighter(bool $flag) : SolrQuery {}
    function setMlt(bool $flag) : SolrQuery {}
    function setMltBoost(bool $flag) : SolrQuery {}
    function setMltCount(int $count) : SolrQuery {}
    function setMltMaxNumQueryTerms(int $value) : SolrQuery {}
    function setMltMaxNumTokens(int $value) : SolrQuery {}
    function setMltMaxWordLength(int $maxWordLength) : SolrQuery {}
    function setMltMinDocFrequency(int $minDocFrequency) : SolrQuery {}
    function setMltMinTermFrequency(int $minTermFrequency) : SolrQuery {}
    function setMltMinWordLength(int $minWordLength) : SolrQuery {}
    function setOmitHeader(bool $flag) : SolrQuery {}
    function setQuery(string $query) : SolrQuery {}
    function setRows(int $rows) : SolrQuery {}
    function setShowDebugInfo(bool $flag) : SolrQuery {}
    function setStart(int $start) : SolrQuery {}
    function setStats(bool $flag) : SolrQuery {}
    function setTerms(bool $flag) : SolrQuery {}
    function setTermsField(string $fieldname) : SolrQuery {}
    function setTermsIncludeLowerBound(bool $flag) : SolrQuery {}
    function setTermsIncludeUpperBound(bool $flag) : SolrQuery {}
    function setTermsLimit(int $limit) : SolrQuery {}
    function setTermsLowerBound(string $lowerBound) : SolrQuery {}
    function setTermsMaxCount(int $frequency) : SolrQuery {}
    function setTermsMinCount(int $frequency) : SolrQuery {}
    function setTermsPrefix(string $prefix) : SolrQuery {}
    function setTermsReturnRaw(bool $flag) : SolrQuery {}
    function setTermsSort(int $sortType) : SolrQuery {}
    function setTermsUpperBound(string $upperBound) : SolrQuery {}
    function setTimeAllowed(int $timeAllowed) : SolrQuery {}
}

final class SolrQueryResponse extends SolrResponse
{
    function __construct() {}
    function __destruct() {}
}

abstract class SolrResponse
{
    function getDigestedResponse() : string {}
    function getHttpStatus() : int {}
    function getHttpStatusMessage() : string {}
    function getRawRequest() : string {}
    function getRawRequestHeaders() : string {}
    function getRawResponse() : string {}
    function getRawResponseHeaders() : string {}
    function getRequestUrl() : string {}
    function getResponse() : SolrObject {}
    function setParseMode(int $parser_mode = 0) : bool {}
    function success() : bool {}
}

class SolrServerException extends SolrException
{
    function getInternalInfo() : array {}
}

final class SolrUpdateResponse extends SolrResponse
{
    function __construct() {}
    function __destruct() {}
}

abstract class SolrUtils
{
    function digestXmlResponse(string $xmlresponse, int $parse_mode = 0) : SolrObject {}
    function escapeQueryChars(string $str) : string {}
    function getSolrVersion() : string {}
    function queryPhrase(string $str) : string {}
}
