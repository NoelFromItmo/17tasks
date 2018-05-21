<?php

namespace phif\extractor;

use \DOMDocument;
use \Phif;
use \phif\NodeFacade;
use \phif\Parser;
use \PhpParser\Comment;
use \PhpParser\Node;
use \ReflectionFunction;
use \SimpleXMLElement;

class Documentation {

  static function extract ($blueprint) {

    libxml_use_internal_errors(true);

    $document = new DOMDocument();
    $document->loadHTML(file_get_contents(Phif::documentationPath()));

    $documentation = new SimpleXMLElement($document->saveXML());

    $functionXpath = '//*[contains(concat(" ", @class, " "), " refsect1 ")]' .
        '/*[contains(concat(" ", @class, " "), " methodsynopsis ")]';

    $i = 0;

    #if (false)
    foreach ($documentation->xpath($functionXpath) as $functionNode) {
      self::extractDocumentationFunction($blueprint, $functionNode);
      echo '4';
      $i += 1;

      #if ($i > 100)
      #  break;

    }

    $i = 0;

    #if (false)
    foreach ($documentation->xpath('//*[contains(concat(" ", @class, " "), " classsynopsis ")]') as $classNode) {
      self::extractDocumentationClass($blueprint, $classNode);
      echo '5';
      $i += 1;

      #if ($i > 100)
      #  break;

    }

  }

  static function extractDocumentationFunction ($blueprint, $functionNode) {

    $fullyQualifiedName = self::getNodeText(
      $functionNode->xpath('(.//*[contains(concat(" ", @class, " "), " methodname ")])[1]')
    );

    Documentation::extractDocumentationFunctionName($blueprint, $fullyQualifiedName);

    $symbol = NodeFacade::identifier($fullyQualifiedName, 'function');

    $blueprint[$symbol . '.a_construct'] = 'function';
    $blueprint[$symbol . '.a_symbol'] = $symbol;
    $blueprint[$symbol . '.a_name'] = current(array_slice(preg_split('/\\\\|::/', $fullyQualifiedName), -1));

    #if (count($functionNode->xpath('../../..//*[contains(concat(" ", @class, " "), " verinfo ")]')) > 0) {
      $versionInfo = trim(self::getNodeText($functionNode->xpath('../../..//*[contains(concat(" ", @class, " "), " verinfo ")]')), '() ');

      // @todo: Introduced version.
      #$versionInfo = str_replace(',', '|', $versionInfo);
      #$versionInfo = preg_replace_callback('/(?is)PHP ([0-9]+)( \>\= ([0-9\.]+))?/', function ($match) { return '^' . (isset($match[3]) ? $match[3] : $match[1]); }, $versionInfo);

      if (preg_match('/(?is)PECL ([a-z0-9]+)/', $versionInfo, $match)) {
        $blueprint[$symbol . '.a_sourceLibrary'] = Phif::sourceLibrary($match[1]);
      } else if (strpos($versionInfo, 'PHP') !== false) {
        #$blueprint[$symbol . '.a_sourceLibrary'] = Phif::sourceLibrary('standard');
      } else {
        #var_dump($function_);
        #var_dump($versionInfo);
        #exit;
      }

      // 'standard' by default
      // @todo: Rethink.
      #if (!$function_->getAttribute('source-library'))
      #  $function_->setAttribute('source-library', 'php-standard');

    #}

    if (count($functionNode->xpath('./*[contains(concat(" ", @class, " "), " type ")]')) > 0) {
      $returnType = self::getNodeText($functionNode->xpath('./*[contains(concat(" ", @class, " "), " type ")]'));
      $blueprint[$symbol . '.a_phpDocReturnType'] = $returnType;
      if (!in_array($returnType, ['', 'number', 'mixed', 'object', 'false', 'mixed', 'null', 'object', 'resource', 'self', 'true', 'void']) && strpos($returnType, '|') === false)
        $blueprint[$symbol . '.a_returnType'] = $returnType == 'integer' ? 'int' : $returnType;
    }

    $parameterIndex = 0;

    foreach ($functionNode->xpath('.//*[contains(concat(" ", @class, " "), " methodparam ")]') as $parameterNode) {

      if (self::getNodeText($parameterNode) == 'void')
        continue;

      $parameterSymbol = $symbol . '.p_' . $parameterIndex;
      $parameterIndex += 1;

      $blueprint[$parameterSymbol . '.a_construct'] = 'parameter';
      $blueprint[$parameterSymbol . '.a_symbol'] = $parameterSymbol;

      $parameterName = self::getNodeText($parameterNode->xpath('.//*' . self::hasClass('parameter')));
      $parameterName = trim(str_replace(['&', '$'], '', $parameterName));

      if ($parameterName == '...') {
        $blueprint[$parameterSymbol . '.a_isVariadic'] = true;
        if ($parameterIndex > 0)
          $blueprint[$symbol . '.p_' . ($parameterIndex - 2) . '.a_isVariadic'] = false;
        $parameterName = '__variadic';
      }

      $blueprint[$parameterSymbol . '.a_name'] = trim($parameterName, ' "\'');

      if (count($parameterNode->xpath('.//*' . self::hasClass('reference'))) > 0)
        $blueprint[$parameterSymbol . '.a_byRef'] = true;

      $type = '';
      if (count($parameterNode->xpath('.//*[contains(concat(" ", @class, " "), " type ")]')) > 0) {
        $type = trim(html_entity_decode(strip_tags($parameterNode->xpath('.//*[contains(concat(" ", @class, " "), " type ")]')[0]->asXML()), ENT_QUOTES | ENT_HTML5));
        $blueprint[$parameterSymbol . '.a_phpDocType'] = $type;
        if (!in_array($type, ['', 'number', 'mixed', 'object', 'false', 'mixed', 'null', 'object', 'resource', 'self', 'true', 'void']) && strpos($type, '|') === false)
          $blueprint[$parameterSymbol . '.a_type'] = $type == 'integer' ? 'int' : $type;
      }

      if (!isset($blueprint[$parameterSymbol . '.a_isVariadic']) || !$blueprint[$parameterSymbol . '.a_isVariadic']) {

        if (count($parameterNode->xpath('preceding-sibling::node()[contains(self::node(), "[")]')) > 0) {

          $defaultValue = new Node\Expr\ConstFetch(new Node\Name('null'));

          switch ($type) {
            case 'array':
              $defaultValue = new Node\Expr\Array_([], ['kind' => 2]);
              #var_dump($defaultValue);
              #exit;
              break;
            case 'callable':
              $defaultValue = new Node\Expr\ConstFetch(new Node\Name('null'));
              break;
            case 'mixed':
              $defaultValue = new Node\Expr\ConstFetch(new Node\Name('null'));
              break;
            case 'null':
              break;
            case 'bool':
            case 'boolean':
              $defaultValue = new Node\Expr\ConstFetch(new Node\Name('false'));
              break;
            case 'str':
            case 'string':
              $defaultValue = new Node\Scalar\String_('');
              break;
            case 'int':
            case 'integer':
            case 'float':
              $defaultValue = new Node\Scalar\LNumber(0);
              break;
          }

          if (count($parameterNode->xpath('.//*[contains(concat(" ", @class, " "), " initializer ")]')) > 0) {

            $initializer = html_entity_decode(strip_tags($parameterNode
              ->xpath('.//*[contains(concat(" ", @class, " "), " initializer ")]')[0]->asXML()),
            ENT_QUOTES | ENT_HTML5);

            if (trim($initializer) == '= NULL')
              $initializer = '= null';

            if (trim($initializer) == '= TRUE')
              $initializer = '= true';

            if (trim($initializer) == '= FALSE')
              $initializer = '= false';

            // Fix for http://php.net/manual/en/snmp.setsecurity.php
            if (trim($initializer) == '=')
              $initializer = '';

            // Fix for http://php.net/manual/en/function.fgetcsv.php
            if (trim($initializer) == '= "\\"')
              $initializer = '= "\\\\"';

            // Fix for http://php.net/manual/en/function.trim.php
            if (trim($initializer) == '= " \\t\\n\\r\\0\\x0B"')
              $initializer = '= ""';

            // Fix for http://php.net/manual/en/function.ucwords.php
            if (trim($initializer) == '= " \\t\\r\\n\\f\\v"')
              $initializer = '= ""';

            // Fix for http://php.net/manual/en/gearmanclient.addserver.php
            if (trim($initializer) == '= 127.0.0.1')
              $initializer = '= "127.0.0.1"';

            // Fix for http://php.net/manual/en/gearmanclient.addservers.php
            if (trim($initializer) == '= 127.0.0.1:4730')
              $initializer = '= "127.0.0.1:4730"';

            // Fix for http://php.net/manual/en/mongodb-driver-manager.construct.php
            if (trim($initializer) == '= "mongodb://127.0.0.1/')
              $initializer = '= "mongodb://127.0.0.1/"';

            if ($initializer && strpos(strrev($initializer), strrev('()')) !== 0) {

              try {

              $defaultValue = Parser::parse('<?php $x ' . $initializer . ';')[0]->expr->expr;

              } catch (\Exception $e) {
                // Todo: Remove.
                echo $e;
                var_dump($function_);
                echo "\n\n";
                echo '<?php $x ' . $initializer . ';';
                echo "\n\n";
                exit;
              }


            }

          }

          $blueprint[$parameterSymbol . '.a_defaultValue'] = $defaultValue;

        }

      }

      #self::patchDeclaration($parameter);
      #self::generateDocComment($parameter);

      #$function_->params[] = $parameter;

    }

    #return $function_;

  }

  static function extractDocumentationFunctionName ($blueprint, $fullyQualifiedName) {

    if (strpos($fullyQualifiedName, '::') !== false) {
      $fullyQualifiedClassName = substr($fullyQualifiedName, 0, strpos($fullyQualifiedName, '::'));
      $classSymbol = NodeFacade::identifier($fullyQualifiedClassName, 'class');
      $blueprint[$classSymbol . '.a_construct'] = 'class';
      $blueprint[$classSymbol . '.a_symbol'] = $classSymbol;
      $blueprint[$classSymbol . '.a_name'] = current(array_slice(preg_split('/\\\\/', $fullyQualifiedClassName), -1));
    }

    if (strpos($fullyQualifiedName, '\\') !== false) {
      $fullyQualifiedNamespaceName = substr($fullyQualifiedName, 0, strpos($fullyQualifiedName, '\\'));
      $namespaceNamePart = $fullyQualifiedNamespaceName;
      while (strlen($namespaceNamePart) > 0) {
        $namespaceSymbol = NodeFacade::identifier($fullyQualifiedNamespaceName, 'namespace');
        $blueprint[$namespaceSymbol . '.a_construct'] = 'namespace';
        $blueprint[$namespaceSymbol . '.a_symbol'] = $namespaceSymbol;
        $blueprint[$namespaceSymbol . '.a_name'] = current(array_slice(preg_split('/\\\\/', $namespaceNamePart), -1));
        $namespaceNamePart = substr($namespaceNamePart, 0, strrpos($namespaceNamePart, '\\'));
      }
    }

  }

  static function extractDocumentationClassName ($blueprint, $fullyQualifiedName) {

    $classSymbol = NodeFacade::identifier($fullyQualifiedName, 'class');
    $blueprint[$classSymbol . '.a_construct'] = 'class';
    $blueprint[$classSymbol . '.a_symbol'] = $classSymbol;
    $blueprint[$classSymbol . '.a_name'] = current(array_slice(preg_split('/\\\\/', $fullyQualifiedName), -1));

    if (strpos($fullyQualifiedName, '\\') !== false) {
      $fullyQualifiedNamespaceName = substr($fullyQualifiedName, 0, strpos($fullyQualifiedName, '\\'));
      $namespaceNamePart = $fullyQualifiedNamespaceName;
      while (strlen($namespaceNamePart) > 0) {
        $namespaceSymbol = NodeFacade::identifier($fullyQualifiedNamespaceName, 'namespace');
        $blueprint[$namespaceSymbol . '.a_construct'] = 'namespace';
        $blueprint[$namespaceSymbol . '.a_symbol'] = $namespaceSymbol;
        $blueprint[$namespaceSymbol . '.a_name'] = current(array_slice(preg_split('/\\\\/', $namespaceNamePart), -1));
        $namespaceNamePart = substr($namespaceNamePart, 0, strrpos($namespaceNamePart, '\\'));
      }
    }

  }

  static function extractDocumentationClass ($blueprint, $classNode) {

    $fullyQualifiedName = self::getNodeText($classNode->xpath('
      (
        .
        //*
          ' . self::hasClass('classsynopsisinfo') . '
        //*
          ' . self::hasClass('ooclass') . '
          [count(.//*
            ' . self::hasClass('modifier') . '
            [text() = "extends"]
          ) = 0]
      )[1]
      //*
        ' . self::hasClass('classname') . '
    '));

    if (!$fullyQualifiedName) {
      echo 'Class name for *' . self::getNodeText($classNode->xpath('../@id')) . "* not found.\n";
      return;
    }

    $symbol = NodeFacade::identifier($fullyQualifiedName, 'class');

    // @todo: Remove
    if (strpos($symbol, '.') !== false)
      return;

    Documentation::extractDocumentationClassName($blueprint, $fullyQualifiedName);

    $blueprint[$symbol . '.a_flags'] = 0;
    $implementsIndex = 0;

    foreach ($classNode->xpath('.//*' . self::hasClass('ooclass')) as $classHeader) {

      $headerSymbolName = self::getNodeText($classHeader->xpath('.//*' . self::hasClass('classname')));
      $headerModifier = self::getNodeText($classHeader->xpath('.//*' . self::hasClass('modifier')));

      if (!$headerSymbolName || !$headerModifier)
        continue;

      switch ($headerModifier) {
        case '':
          break;
        case 'abstract':
          $blueprint[$symbol . '.a_flags'] = $blueprint[$symbol . '.a_flags'] | Node\Stmt\Class_::MODIFIER_ABSTRACT;
          break;
        case 'final':
          $blueprint[$symbol . '.a_flags'] = $blueprint[$symbol . '.a_flags'] | Node\Stmt\Class_::MODIFIER_FINAL;
          break;
        case 'extends':
          $blueprint[$symbol . '.a_extends'] = self::getNodeText(
            $classHeader->xpath('.//*' . self::hasClass('classname'))
          );
          break;
        case 'implements':
          foreach ($classHeader->xpath('.//*' . self::hasClass('classname')) as $implementsNode) {
            $implementsSymbol = $symbol . '.a_implements_' . sha1(NodeFacade::identifier(self::getNodeText($implementsNode), 'class'));
            $implementsIndex++;
            $blueprint[$implementsSymbol . '.a_construct'] = 'class';
            $blueprint[$implementsSymbol . '.a_symbol'] = $implementsSymbol;
            $blueprint[$implementsSymbol . '.a_name'] = self::getNodeText($implementsNode);
          }
          break;
        default:
          echo $classHeader->asXML();
          echo "\n\n";
          exit;
      }

    }

    foreach ($classNode->xpath('.//*' . self::hasClass('oointerface')) as $classHeader) {
      foreach ($classHeader->xpath('.//*' . self::hasClass('interfacename') . '[count(./*) = 0]') as $implementsNode) {
        $implementsSymbol = $symbol . '.a_implements_' . sha1(NodeFacade::identifier(self::getNodeText($implementsNode), 'class'));
        $implementsIndex++;
        $blueprint[$implementsSymbol . '.a_construct'] = 'class';
        $blueprint[$implementsSymbol . '.a_symbol'] = $implementsSymbol;
        $blueprint[$implementsSymbol . '.a_name'] = self::getNodeText($implementsNode);
      }
    }

    #if (count($classNode->xpath('../../..//*[contains(concat(" ", @class, " "), " verinfo ")]')) > 0) {
      $versionInfo = trim(self::getNodeText($classNode->xpath('../../..//*[contains(concat(" ", @class, " "), " verinfo ")]')), '() ');

      // @todo: Introduced version.
      #$versionInfo = str_replace(',', '|', $versionInfo);
      #$versionInfo = preg_replace_callback('/(?is)PHP ([0-9]+)( \>\= ([0-9\.]+))?/', function ($match) { return '^' . (isset($match[3]) ? $match[3] : $match[1]); }, $versionInfo);

      if (preg_match('/(?is)PECL ([a-z0-9]+)/', $versionInfo, $match)) {
        $blueprint[$symbol . '.a_sourceLibrary'] = Phif::sourceLibrary($match[1]);
      } else if (strpos($versionInfo, 'PHP') !== false) {
        #$blueprint[$symbol . '.a_sourceLibrary'] = Phif::sourceLibrary('standard');
      } else {
        #var_dump($function_);
        #var_dump($versionInfo);
        #exit;
      }

      // 'standard' by default
      // @todo: Rethink.
      #if (!$function_->getAttribute('source-library'))
      #  $function_->setAttribute('source-library', 'php-standard');

      #if (!in_array($returnType, ['', 'mixed']))
      #  $function_->returnType = $returnType;
    #}

    if (false)
    foreach ($classNode->xpath('.//*[contains(concat(" ", @class, " "), " methodsynopsis ")]') as $functionNode) {

      if (count($functionNode->xpath('preceding-sibling::node()[contains(self::node(), "/* Inherited methods */")]')) > 0)
        continue;

      $function_ = Phif::parseDocumentationFunction($functionNode);

      $method_ = new Node\Stmt\ClassMethod('');
      $method_->name = $function_->name;
      $method_->byRef = $function_->byRef;
      $method_->params = $function_->params;
      $method_->returnType = $function_->returnType;
      $method_->stmts = $function_->stmts;

      if (strpos($method_->name, '::') !== false)
        continue;

      #$class_->stmts[] = $method_;

    }

    #return $class_;

  }

  static function getNodeText ($xmlNode) {
    if (is_array($xmlNode))
      return implode(' ', array_map(function ($xmlNode) { return Documentation::getNodeText($xmlNode); }, $xmlNode));
    return trim(html_entity_decode(strip_tags($xmlNode->asXML()), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
  }

  static function hasClass ($class) {
    return '[contains(concat(" ", @class, " "), " ' . $class . ' ")]';
  }

}
