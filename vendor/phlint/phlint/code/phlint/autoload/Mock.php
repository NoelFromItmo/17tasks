<?php

namespace phlint\autoload;

use \luka8088\ExtensionCall;
use \luka8088\phops\MetaContext;
use \phlint\Code;

class Mock {

  function __construct ($data) {
    $this->data = $data;
  }

  /** @ExtensionCall("phlint.phpAutoloadClass") */
  function __invoke ($class) {
    if (isset($this->data[$class]))
      MetaContext::get(Code::class)->load([[
        'path' => 'mock:' . $class,
        'source' => $this->data[$class],
        'isLibrary' => true,
      ]]);
  }

}
