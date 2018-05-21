<?php

namespace phlint\inference;

use \luka8088\ExtensionCall;
use \luka8088\phops\MetaContext;
use \phlint\Code;
use \phlint\inference;
use \phlint\node as pnode;
use \PhpParser\Node;

class Include_ {

  function getIdentifier () {
    return 'include';
  }

  function getDependencies () {
    return [
      'value',
    ];
  }

  /** @ExtensionCall("phlint.inference.simulateNode") */
  static function simulateNode ($node) {

    if ($node instanceof Node\Expr\Include_)
      foreach (inference\Value::get($node->expr) as $value) {

        if (!($value instanceof Node\Scalar\String_))
          continue;

        $path = $value->value;

        if (!is_file($path))
          continue;

        $isLibrary = true;

        foreach (MetaContext::get(Code::class)->acode as $acode) {
          if (strpos(str_replace('\\', '/', $path . '/'), str_replace('\\', '/', $acode['path'] . '/')) === 0)
            $isLibrary = false;
          if (strpos(str_replace('\\', '/', realpath($path) . '/'), str_replace('\\', '/', realpath($acode['path']) . '/')) === 0)
            $isLibrary = false;
        }

        MetaContext::get(Code::class)->load([[
          'path' => $path,
          'source' => '',
          'isLibrary' => $isLibrary,
        ]]);

      }

  }

}
