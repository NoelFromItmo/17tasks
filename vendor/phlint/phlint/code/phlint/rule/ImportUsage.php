<?php

namespace phlint\rule;

use \luka8088\phops\MetaContext;
use \phlint\inference;
use \phlint\NodeConcept;
use \phlint\Result;
use \PhpParser\Node;

/**
 * @see /documentation/rule/importUsage.md
 */
class ImportUsage {

  function getIdentifier () {
    return 'importUsage';
  }

  function getCategories () {
    return [
      'tidy',
    ];
  }

  protected $imports = [];
  protected $usages = [];

  protected function resetState () {
    $this->imports = [];
    $this->usages = [];
  }

  function beforeTraverse(array $nodes) {
      $this->resetState();
  }

  function visitNode (Node $node) {

    if ($node instanceof Node\Stmt\Use_) {
      foreach ($node->uses as $import) {
        assert(!in_array($import->alias, $this->imports));
        $this->imports[class_exists(Node\Identifier::class) ? ($import->alias ? $import->alias->name : $import->name->getLast()) : $import->alias] = $import;
      }
    }

    if ($node instanceof Node\Name) {
      $this->usages[implode('\\', $node->parts)] = $node;
    }

    if ($node instanceof Node\Expr\Variable)
      foreach (inference\Attribute::get($node) as $attribute)
        if ($attribute instanceof Node\Expr\New_ &&
            count($attribute->args) >= 1 &&
            inference\Value::isEqual($attribute->args[0], 'var')) {
          $this->usages[$attribute->args[1]->value->items[0]->value->value] = new Node\Name(
            $attribute->args[1]->value->items[0]->value->value
          );
        }

  }

  function afterNode ($node) {
    if ($node instanceof Node\Stmt\Namespace_)
      $this->resetState();
  }

  function afterTraverse (array $nodes) {

    foreach ($this->imports as $alias => $import) {

      $isImportUsed = false;

      $importAlias = substr(self::sourcePrint($import), strrpos(self::sourcePrint($import), '\\') + 1);

      if (in_array($alias, $this->usages)) {
        $isImportUsed = true;
        continue;
      }

      foreach ($this->usages as $usage) {
        if ($usage->parts[0] == $import->alias) {
          $isImportUsed = true;
          break;
        }
        $useBaseAlias = substr(self::sourcePrint($usage), 0, strpos(self::sourcePrint($usage), '\\'));
        if ($importAlias == $useBaseAlias) {
          $isImportUsed = true;
          break;
        }
      }

      if (!$isImportUsed) {
        MetaContext::get(Result::class)->addViolation(
          $import,
          $this->getIdentifier(),
          'Import Usage',
          ucfirst(NodeConcept::referencePrint($import)) . ' is not used.',
          'Import *' . NodeConcept::sourcePrint($import) . '* is not used.'
        );
      }

    }
  }

  static function sourcePrint ($node) {
    if (is_string($node))
      return $node;
    $prettyPrinter = new \PhpParser\PrettyPrinter\Standard();
    return $prettyPrinter->prettyPrint([$node]);
  }

}
