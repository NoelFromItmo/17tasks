<?php

namespace phif\patch;

use \phif\NodeFacade;
use \phif\Parser;
use \PhpParser\Comment;
use \PhpParser\Node;

class Declaration {

  static function patch ($blueprint) {

    $blueprint['c_arrayiterator.f_uasort.p_0.a_type'] = '';
    $blueprint['c_arrayiterator.f_uksort.p_0.a_type'] = '';

    $blueprint['f_assert.p_1.a_phpDocType'] = 'Throwable|string';
    $blueprint['f_assert.p_1.a_type'] = '';

    $blueprint['c_dateinterval.f_format.a_template'] = true;

    /**
     * @todo: Handle multiple signatures.
     */
    $blueprint['c_memcache.f_get.a_returnType'] = 'string';
    $blueprint['c_memcache.f_get.p_0.a_name'] = 'key';
    $blueprint['c_memcache.f_get.p_0.a_type'] = 'string';
    $blueprint['c_memcache.f_get.p_1.a_defaultValue'] = new Node\Scalar\LNumber(0);
    $blueprint['c_memcache.f_get.p_1.a_type'] = 'int';

    if (false)
    $blueprint['f_date.a_template'] = true;

    $blueprint['f_getenv.a_phpDocReturnType'] = 'mixed';
    $blueprint['f_getenv.a_returnType'] = '';
    $blueprint['f_getenv.p_0.a_defaultValue'] = new Node\Scalar\String_('');

    $blueprint['f_hash_hmac_algos.a_phpDocReturnType'] = 'array';
    $blueprint['f_hash_hmac_algos.a_returnType'] = 'array';

    $blueprint['f_implode.a_phpDocReturnType'] = 'string';
    $blueprint['f_implode.p_0.a_name'] = 'glue';
    $blueprint['f_implode.p_0.a_phpDocType'] = 'array|string';
    $blueprint['f_implode.p_0.a_type'] = '';
    $blueprint['f_implode.p_1.a_defaultValue'] = new Node\Scalar\String_('');
    $blueprint['f_implode.p_1.a_name'] = 'pieces';
    $blueprint['f_implode.p_1.a_phpDocType'] = 'array|string';
    $blueprint['f_implode.p_1.a_type'] = '';

    $blueprint['f_is_a.p_0.a_phpDocType'] = 'mixed';
    $blueprint['f_is_a.p_0.a_type'] = '';

    $blueprint['f_memcache_add.a_aliasOf'] = 'c_memcache.f_add';

    $blueprint['f_join.a_phpDocReturnType'] = 'string';
    $blueprint['f_join.p_0.a_name'] = 'glue';
    $blueprint['f_join.p_0.a_phpDocType'] = 'array|string';
    $blueprint['f_join.p_0.a_type'] = '';
    $blueprint['f_join.p_1.a_defaultValue'] = new Node\Scalar\String_('');
    $blueprint['f_join.p_1.a_name'] = 'pieces';
    $blueprint['f_join.p_1.a_phpDocType'] = 'array|string';
    $blueprint['f_join.p_1.a_type'] = '';

    $blueprint['f_setlocale.p_1.a_phpDocType'] = 'array|string';
    $blueprint['f_setlocale.p_1.a_type'] = '';

    $blueprint['f_sizeof.a_aliasOf'] = 'f_count';

    /**
     * @todo: Handle multiple signatures.
     */
    $blueprint['f_strtok.p_0.a_name'] = 'str';
    $blueprint['f_strtok.p_1.a_defaultValue'] = new Node\Scalar\String_('');
    $blueprint['f_strtok.p_1.a_name'] = 'token';

    /**
     * @todo: Handle multiple signatures.
     */
    $blueprint['f_strtr.p_1.a_type'] = '';
    $blueprint['f_strtr.p_1.a_name'] = 'from';
    $blueprint['f_strtr.p_2.a_defaultValue'] = new Node\Scalar\String_('');

    /**
     * @todo: Handle multiple signatures.
     */
    // max
    // memcache
    // min
    // setlocale
    // implode
    // stream_context_set_option
    // strtok
    // strtr
    $blueprint['f_max.p_0.a_isVariadic'] = false;
    $blueprint['f_max.p_0.a_type'] = '';
    $blueprint['f_min.p_0.a_isVariadic'] = false;
    $blueprint['f_min.p_0.a_type'] = '';

    /**
     * Patching @out variables.
     *
     * @see http://php.net/manual/en/function.preg-match.php
     */
    $blueprint['f_preg_match.p_2.a_out'] = ' ';

    /**
     * Patching @out variables.
     *
     * @see http://php.net/manual/en/function.preg-match-all.php
     */
    $blueprint['f_preg_match_all.p_2.a_out'] = ' ';

    /** @see http://php.net/manual/en/function.printf.php */
    $blueprint['f_printf.p_1.a_defaultValue'] = null;
    $blueprint['f_printf.p_1.a_isVariadic'] = true;
    $blueprint['f_printf.p_1.a_phpDocType'] = 'float|int|string';
    $blueprint['f_printf.p_2.a_isRemoved'] = true;

    /** @see http://php.net/manual/en/function.sprintf.php */
    $blueprint['f_sprintf.p_1.a_defaultValue'] = null;
    $blueprint['f_sprintf.p_1.a_isVariadic'] = true;
    $blueprint['f_sprintf.p_1.a_phpDocType'] = 'float|int|string';
    $blueprint['f_sprintf.p_2.a_isRemoved'] = true;

    /** @see http://php.net/manual/en/memcache.get.php */
    $blueprint['f_memcache_get.p_0.a_isRemoved'] = true;
    $blueprint['f_memcache_get.p_1.a_isRemoved'] = true;
    $blueprint['f_memcache_get.p_2.a_isRemoved'] = true;
    $blueprint['f_memcache_get.p_3.a_isRemoved'] = true;

  }

}
