<?php

namespace phlint\inference;

use \luka8088\phops\MetaContext;
use \phlint\Application;
use \phlint\data;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \PhpParser\Node;

class LocationSymbol {

  static function get ($node) {
    $location = '';
    $context = $node;
    while ($context && (!(NodeConcept::isDeclarationNode($context) || NodeConcept::isDefinitionNode($context)) || !inference\Symbol::phpID($context)))
      $context = inference\NodeRelation::contextNode($context);
    if ($context)
      $location = NodeConcept::constructTypeName($context) . ' ' . inference\Symbol::phpID($context);
    if (!$location && trim($node->getAttribute('path', ''))) {
      $path = trim($node->getAttribute('path', ''));
      if (realpath($path))
        $path = realpath($path);
      if (MetaContext::get(Application::class)->getParameter('rootPath') && strpos($path, MetaContext::get(Application::class)->getParameter('rootPath')) === 0)
        $path = substr($path, strlen(MetaContext::get(Application::class)->getParameter('rootPath')));
      $path = ltrim(str_replace('\\', '/', $path), '/');
      $location = 'file ' . $path;
    }
    return $location;
  }

}
