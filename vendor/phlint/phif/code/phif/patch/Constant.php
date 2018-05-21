<?php

namespace phif\patch;

use \Phif;
use \phif\NodeFacade;
use \PhpParser\Node;

class Constant {

  static function patch ($blueprint) {

    $constants = [
      'MCRYPT_3DES' => 'tripledes',
      'MCRYPT_ARCFOUR' => 'arcfour',
      'MCRYPT_ARCFOUR_IV' => 'arcfour-iv',
      'MCRYPT_BLOWFISH' => 'blowfish',
      'MCRYPT_BLOWFISH_COMPAT' => 'blowfish-compat',
      'MCRYPT_CAST_128' => 'cast-128',
      'MCRYPT_CAST_256' => 'cast-256',
      'MCRYPT_CRYPT' => 'crypt',
      'MCRYPT_DECRYPT' => 1,
      'MCRYPT_DES' => 'des',
      'MCRYPT_DEV_RANDOM' => 0,
      'MCRYPT_DEV_URANDOM' => 1,
      'MCRYPT_ENCRYPT' => 0,
      'MCRYPT_ENIGNA' => 'crypt',
      'MCRYPT_GOST' => 'gost',
      'MCRYPT_IDEA' => 'idea',
      'MCRYPT_LOKI97' => 'loki97',
      'MCRYPT_MARS' => 'mars',
      'MCRYPT_MODE_CBC' => 'cbc',
      'MCRYPT_MODE_CFB' => 'cfb',
      'MCRYPT_MODE_ECB' => 'ecb',
      'MCRYPT_MODE_NOFB' => 'nofb',
      'MCRYPT_MODE_OFB' => 'ofb',
      'MCRYPT_MODE_STREAM' => 'stream',
      'MCRYPT_PANAMA' => 'panama',
      'MCRYPT_RAND' => 2,
      'MCRYPT_RC2' => 'rc2',
      'MCRYPT_RC6' => 'rc6',
      'MCRYPT_RIJNDAEL_128' => 'rijndael-128',
      'MCRYPT_RIJNDAEL_192' => 'rijndael-192',
      'MCRYPT_RIJNDAEL_256' => 'rijndael-256',
      'MCRYPT_SAFER128' => 'safer-sk128',
      'MCRYPT_SAFER64' => 'safer-sk64',
      'MCRYPT_SAFERPLUS' => 'saferplus',
      'MCRYPT_SERPENT' => 'serpent',
      'MCRYPT_SKIPJACK' => 'skipjack',
      'MCRYPT_THREEWAY' => 'threeway',
      'MCRYPT_TRIPLEDES' => 'tripledes',
      'MCRYPT_TWOFISH' => 'twofish',
      'MCRYPT_WAKE' => 'wake',
      'MCRYPT_XTEA' => 'xtea',
    ];

    foreach ($constants as $constantName => $constantValue) {
      $blueprint[NodeFacade::identifier($constantName, 'constant') . '.a_construct'] = 'constant';
      $blueprint[NodeFacade::identifier($constantName, 'constant') . '.a_name'] = $constantName;
      $blueprint[NodeFacade::identifier($constantName, 'constant') . '.a_sourceLibrary']
        = Phif::sourceLibrary(substr($constantName, 0, strpos($constantName, '_')));
      $blueprint[NodeFacade::identifier($constantName, 'constant') . '.a_symbol']
        = NodeFacade::identifier($constantName, 'constant');
      $blueprint[NodeFacade::identifier($constantName, 'constant') . '.a_value'] = $constantValue;
    }

  }

}
