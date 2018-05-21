<?php

namespace phlint\autoload;

use \luka8088\ExtensionCall;
use \luka8088\phops\MetaContext;
use \phlint\Code;

class Callback {

  protected $callback;

  function __construct ($callback) {
    $this->callback = $callback;
  }

  /** @ExtensionCall("phlint.phpAutoloadClass") */
  function __invoke ($class) {
    $path = call_user_func($this->callback, $class);
    if (is_file($path))
      MetaContext::get(Code::class)->load([[
        'path' => $path,
        'source' => file_get_contents($path),
        'isLibrary' => true,
      ]]);
  }

}
