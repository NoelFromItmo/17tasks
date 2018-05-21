<?php

/**
 * @param string $http_method
 * @param string $uri
 * @param array $request_parameters
 * @return string
 */
function oauth_get_sbs(string $http_method, string $uri, array $request_parameters = []) : string {}

/**
 * @param string $uri
 * @return string
 */
function oauth_urlencode(string $uri) : string {}

class OAuth
{
    function __construct(string $consumer_key, string $consumer_secret, string $signature_method = OAUTH_SIG_METHOD_HMACSHA1, int $auth_type = 0) {}
    function __destruct() {}
    function disableDebug() : bool {}
    function disableRedirects() : bool {}
    function disableSSLChecks() : bool {}
    function enableDebug() : bool {}
    function enableRedirects() : bool {}
    function enableSSLChecks() : bool {}
    function fetch(string $protected_resource_url, array $extra_parameters = [], string $http_method = '', array $http_headers = []) {}
    function generateSignature(string $http_method, string $url, $extra_parameters = null) : string {}
    function getAccessToken(string $access_token_url, string $auth_session_handle = '', string $verifier_token = '', string $http_method = '') : array {}
    function getCAPath() : array {}
    function getLastResponse() : string {}
    function getLastResponseHeaders() : string {}
    function getLastResponseInfo() : array {}
    function getRequestHeader(string $http_method, string $url, $extra_parameters = null) : string {}
    function getRequestToken(string $request_token_url, string $callback_url = '', string $http_method = '') : array {}
    function setAuthType(int $auth_type) : bool {}
    function setCAPath(string $ca_path = '', string $ca_info = '') {}
    function setNonce(string $nonce) {}
    function setRequestEngine(int $reqengine) {}
    function setRSACertificate(string $cert) {}
    function setSSLChecks(int $sslcheck) : bool {}
    function setTimestamp(string $timestamp) {}
    function setToken(string $token, string $token_secret) : bool {}
    function setVersion(string $version) : bool {}
}

class OAuthException extends Exception {}

class OAuthProvider
{
    function __construct(array $params_array = []) {}
    function addRequiredParameter(string $req_params) : bool {}
    function callconsumerHandler() {}
    function callTimestampNonceHandler() {}
    function calltokenHandler() {}
    function checkOAuthRequest(string $uri = '', string $method = '') {}
    function consumerHandler(callable $callback_function) {}
    function generateToken(int $size, bool $strong = false) : string {}
    function is2LeggedEndpoint($params_array) {}
    function isRequestTokenEndpoint(bool $will_issue_request_token) {}
    function removeRequiredParameter(string $req_params) : bool {}
    function reportProblem(string $oauthexception, bool $send_headers = true) : string {}
    function setParam(string $param_key, $param_val = null) : bool {}
    function setRequestTokenPath(string $path) : bool {}
    function timestampNonceHandler(callable $callback_function) {}
    function tokenHandler(callable $callback_function) {}
}
