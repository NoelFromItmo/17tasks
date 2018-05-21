<?php

namespace phif;

use \PhpParser\Node;

class NodeFacade
{

  /**
   * Generates a static symbol identifier from a Node or a node name.
   *
   * @param Node|string $node Node or a node name.
   * @param string $group If $node is a `Node\Name` it is not always possible
   *   to determinate the symbol identifier group solely based on it. That is
   *   why this argument can be used for hinting.
   *
   * @see https://gitlab.com/luka8088/phlint/blob/master/documentation/glossary/symbolIdentifierGroup.md
   */
  static function identifier ($node, $group = '') {

    if (is_string($node)) {
      if (strpos($node, '\\') !== false || strpos($node, '::') !== false) {
        $namespaceParts = explode('\\', trim($node, '\\'));
        $classParts = explode('::', end($namespaceParts));
        $namespace_ = array_map(function ($part) {
          return NodeFacade::identifier($part, 'namespace');
        }, array_slice($namespaceParts, 0, -1));
        $class_ = array_map(function ($part) {
          return NodeFacade::identifier($part, 'class');
        }, array_slice(array_reverse($classParts), 1));
        $construct = array_map(function ($part) use ($group) {
          return NodeFacade::identifier($part, $group);
        }, array_slice($classParts, -1));
        return implode('.', array_merge($namespace_, $class_, $construct));
      }
      if ($group == 'class')
        return 'c_' . strtolower($node);
      if ($group == 'constant')
        return 'd_' . $node;
      if ($group == 'function')
        return 'f_' . strtolower($node);
      if ($group == 'namespace')
        return 'n_' . strtolower($node);
      if ($group == 'variable')
        return 'v_' . $node;
      return '';
    }

    if ($node instanceof Node\Const_)
      return NodeFacade::identifier($node->name, 'constant');

    if ($node instanceof Node\Name)
      return NodeFacade::identifier($node->toString(), $group);

    if ($node instanceof Node\Param)
      return NodeFacade::identifier($node->var, 'variable');

    if ($node instanceof Node\Stmt\Catch_)
      return NodeFacade::identifier($node->var, 'variable');

    if ($node instanceof Node\Stmt\Class_)
      return NodeFacade::identifier($node->name, 'class');

    if ($node instanceof Node\Stmt\ClassMethod)
      return NodeFacade::identifier($node->name, 'function');

    if ($node instanceof Node\Stmt\Function_)
      return NodeFacade::identifier($node->name, 'function');

    if ($node instanceof Node\Stmt\Interface_)
      return NodeFacade::identifier($node->name, 'class');

    if ($node instanceof Node\Stmt\Namespace_)
      return NodeFacade::identifier($node->name ? $node->name : '', 'namespace');

    if ($node instanceof Node\Stmt\PropertyProperty)
      return NodeFacade::identifier($node->name, 'variable');

    if ($node instanceof Node\Stmt\StaticVar)
      return NodeFacade::identifier($node->name, 'variable');

    if ($node instanceof Node\Stmt\Trait_)
      return NodeFacade::identifier($node->name, 'class');

    if ($node instanceof Node\Stmt\UseUse)
      return NodeFacade::identifier($node->name, $group);

    return '';

  }

}
