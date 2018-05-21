<?php

namespace phlint\inference;

use \luka8088\phops\MetaContext;
use \phlint\Application;
use \PhpParser\Node;

class Location {

  static function get ($node) {

    if (isset($node->getAttributes()['path']) && $node->getAttributes()['path']) {
      $path = $node->getAttributes()['path'];
      if (realpath($path))
        $path = realpath($path);
      if (MetaContext::get(Application::class)->getParameter('rootPath') && strpos($path, MetaContext::get(Application::class)->getParameter('rootPath')) === 0)
        $path = substr($path, strlen(MetaContext::get(Application::class)->getParameter('rootPath')));
      $path = ltrim(str_replace('\\', '/', $path), '/');
      return 'in ' . $path . ($node->getLine() > 0 ? ':' . $node->getLine() : '');
    }

    if ($node->getLine() > 0)
      return 'on line ' . $node->getLine();

    return '';

  }

}
