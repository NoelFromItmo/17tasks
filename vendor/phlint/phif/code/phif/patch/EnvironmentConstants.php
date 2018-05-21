<?php

namespace phif\patch;

use \phif\NodeFacade;
use \PhpParser\Node;

class EnvironmentConstants {

  static function patch ($blueprint) {

    /**
     * These constants can have different values based on the
     * environment in which PHP is being run and what is being
     * loaded.
     * To avoid issues we reset them to a default value for
     * the data type they are in.
     */
    static $environmentConstants = [
      'CURLVERSION_NOW' => 0,
      'DEFAULT_INCLUDE_PATH' => '',
      'DIRECTORY_SEPARATOR' => '',
      'GD_EXTRA_VERSION' => '',
      'GD_VERSION' => '',
      'GMP_MPIR_VERSION' => '',
      'GMP_VERSION' => '',
      'ICONV_IMPL' => '',
      'ICONV_VERSION' => '',
      'INTL_ICU_DATA_VERSION' => '',
      'INTL_ICU_VERSION' => '',
      'LIBEXSLT_DOTTED_VERSION' => '',
      'LIBEXSLT_VERSION' => 0,
      'LIBXML_DOTTED_VERSION' => '',
      'LIBXML_LOADED_VERSION' => '',
      'LIBXML_VERSION' => 0,
      'LIBXSLT_DOTTED_VERSION' => '',
      'LIBXSLT_VERSION' => 0,
      'OPENSSL_VERSION_NUMBER' => 0,
      'OPENSSL_VERSION_TEXT' => '',
      'PCRE_VERSION' => '',
      'PEAR_EXTENSION_DIR' => '',
      'PEAR_INSTALL_DIR' => '',
      'PGSQL_LIBPQ_VERSION' => '',
      'PGSQL_LIBPQ_VERSION_STR' => '',
      'PHP_BINARY' => '',
      'PHP_BINDIR' => '',
      'PHP_CONFIG_FILE_PATH' => '',
      'PHP_DATADIR' => '',
      'PHP_EOL' => '',
      'PHP_EXTENSION_DIR' => '',
      'PHP_EXTRA_VERSION' => '',
      'PHP_LIBDIR' => '',
      'PHP_LOCALSTATEDIR' => '',
      'PHP_MINOR_VERSION' => 0,
      'PHP_OS' => '',
      'PHP_OS_FAMILY' => '',
      'PHP_PREFIX' => '',
      'PHP_RELEASE_VERSION' => 0,
      'PHP_SAPI' => '',
      'PHP_SHLIB_SUFFIX' => '',
      'PHP_SYSCONFDIR' => '',
      'PHP_VERSION' => '',
      'PHP_VERSION_ID' => 0,
      'XML_SAX_IMPL' => '',
      'ZLIB_VERNUM' => 0,
      'ZLIB_VERSION' => '0.0.0',
    ];

    foreach ($environmentConstants as $environmentConstant => $constantValue)
      $blueprint[NodeFacade::identifier($environmentConstant, 'constant') . '.a_value'] = $constantValue;

  }

}
