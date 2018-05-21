<?php

namespace phif\extractor;

use \Phif;
use \phif\NodeFacade;
use \phif\Parser;
use \PhpParser\Comment;
use \PhpParser\Node;
use \ReflectionFunction;
use \ReflectionClass;

class Reflection {

  static function extract ($blueprint) {

    foreach (get_defined_constants(true) as $category => $constants) {

      if ($category == 'user')
        continue;

      foreach ($constants as $name => $constantValue) {

        $symbol = NodeFacade::identifier($name, 'constant');

        $blueprint[$symbol . '.a_construct'] = 'constant';
        $blueprint[$symbol . '.a_symbol'] = $symbol;
        $blueprint[$symbol . '.a_name'] = $name;
        $blueprint[$symbol . '.a_value'] = $constantValue;

        if (!isset($blueprint[$symbol . '.a_sourceLibrary']) ||
            $blueprint[$symbol . '.a_sourceLibrary'] == 'php-standard')
          $blueprint[$symbol . '.a_sourceLibrary'] = Phif::sourceLibrary($category);

      }

    }

    $internalFunctions = get_defined_functions()['internal'];

    foreach ($internalFunctions as $functionName) {

      $functionReflection = new ReflectionFunction($functionName);

      if (!$functionReflection->isInternal())
        continue;

      $symbol = NodeFacade::identifier($functionName, 'function');

      $blueprint[$symbol . '.a_construct'] = 'function';
      $blueprint[$symbol . '.a_symbol'] = $symbol;
      $blueprint[$symbol . '.a_name'] = $functionName;

      if (!isset($blueprint[$symbol . '.a_sourceLibrary']) ||
          $blueprint[$symbol . '.a_sourceLibrary'] == 'php-standard')
        $blueprint[$symbol . '.a_sourceLibrary'] = Phif::sourceLibrary($functionReflection);

      foreach ($functionReflection->getParameters() as $parameterIndex => $parameterReflection) {

        $parameterSymbol = $symbol . '.p_' . $parameterIndex;

        $blueprint[$parameterSymbol . '.a_construct'] = 'parameter';
        $blueprint[$parameterSymbol . '.a_symbol'] = $parameterSymbol;

        if (!isset($blueprint[$parameterSymbol . '.a_name']))
          $blueprint[$parameterSymbol . '.a_name'] = $parameterReflection->getName();

        $parameter = new Node\Param(new Node\Expr\Variable($parameterReflection->getName()));

        if (method_exists($parameterReflection, 'hasType') && $parameterReflection->hasType())
          $blueprint[$parameterSymbol . '.a_type'] = $parameterReflection->getType()->__toString();

        if (!isset($blueprint[$parameterSymbol . '.a_isVariadic']))
          $blueprint[$parameterSymbol . '.a_isVariadic'] = $parameterReflection->isVariadic();

        if ($parameterReflection->isDefaultValueAvailable())
          $blueprint[$parameterSymbol . '.a_defaultValue'] = $parameterReflection->getDefaultValue();
      }

    }

    $internalClasses = array_merge(get_declared_classes(), get_declared_interfaces());

    foreach ($internalClasses as $className) {

      $classReflection = new ReflectionClass($className);

      if (!$classReflection->isInternal())
        continue;

      $symbol = NodeFacade::identifier($className, 'class');

      $blueprint[$symbol . '.a_construct'] = $classReflection->isInterface() ? 'interface' : 'class';
      $blueprint[$symbol . '.a_symbol'] = $symbol;
      $blueprint[$symbol . '.a_name'] = $className;

      if (!isset($blueprint[$symbol . '.a_sourceLibrary']) ||
          $blueprint[$symbol . '.a_sourceLibrary'] == 'php-standard')
        $blueprint[$symbol . '.a_sourceLibrary'] = Phif::sourceLibrary($classReflection);

      if (!$classReflection->isInterface())
      if ($classReflection->getParentClass())
        $blueprint[$symbol . '.a_extends'] = $classReflection->getParentClass()->getName();

      foreach ($classReflection->getInterfaceNames() as $interface_) {
        if ($classReflection->getParentClass() && $classReflection->getParentClass()->implementsInterface($interface_))
          continue;
        $hasInterface = false;
        foreach ($classReflection->getInterfaceNames() as $alternativeInterface) {
          if ($interface_ == $alternativeInterface)
            continue;
          if (!(new ReflectionClass($alternativeInterface))->implementsInterface($interface_))
            continue;
          $hasInterface = true;
        }
        if ($hasInterface)
          continue;
        $blueprint[
            $symbol . '.a_' . ($classReflection->isInterface() ? 'extends' : 'implements')
            . '_' . sha1(NodeFacade::identifier($interface_, 'class'))
        ] = [
          'a_construct' => 'class',
          'a_name' => $interface_,
        ];
      }

      foreach ($classReflection->getMethods() as $methodReflection) {

        if (!$methodReflection->isInternal())
          continue;

        if ($methodReflection->getDeclaringClass()->getName() != $className)
          continue;

        $methodSymbol = NodeFacade::identifier($className . '::' . $methodReflection->getName(), 'function');

        $blueprint[$methodSymbol . '.a_construct'] = 'function';
        $blueprint[$methodSymbol . '.a_symbol'] = $methodSymbol;
        $blueprint[$methodSymbol . '.a_name'] = $methodReflection->getName();

        if (!isset($blueprint[$methodSymbol . '.a_sourceLibrary']))
          $blueprint[$methodSymbol . '.a_sourceLibrary'] = Phif::sourceLibrary($methodReflection);

      }

    }

  }

}
