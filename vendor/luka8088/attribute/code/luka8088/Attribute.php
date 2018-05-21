<?php

namespace luka8088;

use \Closure;
use \Exception;
use \luka8088\PrimitiveAttribute;
use \ReflectionClass;
use \ReflectionFunction;
use \ReflectionMethod;
use \ReflectionObject;
use \Throwable;

class Attribute {

  /**
   * Get symbol attributes.
   * Symbol is anything that can be referenced (and also in this can that can have attributes).
   *
   * @param mixed $symbol
   * @return mixed[] Array of attributes.
   */
  static function get ($symbol) {
    return array_map(function ($attributeSource) {
      return Attribute::evaluate($attributeSource);
    }, Attribute::getSource($symbol));
  }

  /**
   * Get the sources of all attributes for a symbol.
   * Symbol is anything that can be referenced (and also in this can that can have attributes).
   * Each attribute source can then be evaluated using `Attribute::evaluate` to produce an attribute.
   *
   * @param mixed $symbol
   * @return mixed[] Array of attribute sources.
   */
  static function getSource ($symbol) {

    static $cache = [];

    $reflection = Attribute::symbolReflection($symbol);
    $comment = $reflection->getDocComment();

    $cacheKey = Attribute::class . '::getSource.' . sha1($comment);

    if (!isset($cache[$cacheKey]) && function_exists('apcu_fetch') && apcu_exists($cacheKey))
      $cache[$cacheKey] = apcu_fetch($cacheKey);

    if (!isset($cache[$cacheKey])) {
      $namespace_ = Attribute::reflectionNamespace($reflection);
      $phpContext = '';
      if ($namespace_)
        $phpContext .= 'namespace ' . Attribute::reflectionNamespace($reflection) . ";\n";
      $phpContext .= Attribute::extractImports($reflection);
      $attributes = Attribute::extractAttributes($comment);
      foreach ($attributes as $index => $attribute)
        $attributes[$index]['phpContext'] = $phpContext;
      $cache[$cacheKey] = $attributes;
      if (function_exists('apcu_store'))
        apcu_store($cacheKey, $attributes);
    }

    return $cache[$cacheKey];

  }

  /**
   * Evaluates an attribute source with an optional context.
   *
   * @param mixed $attributeSource Attribute source to evaluate.
   * @param mixed[] $context Optional variables to for the evaluation context.
   * @return mixed Evaluated attribute.
   */
  static function evaluate ($attributeSource, $context = []) {
    try {
      $code = $attributeSource['phpContext'] . 'return ' . $attributeSource['phpCode'] . ';';
      $data_xowvi6qznuh1csfccixpgaqaqy7f = [
        'code' => $code,
        'context' => $context,
      ];
      return call_user_func(function () use ($data_xowvi6qznuh1csfccixpgaqaqy7f) {
        extract($data_xowvi6qznuh1csfccixpgaqaqy7f['context']);
        return eval($data_xowvi6qznuh1csfccixpgaqaqy7f['code']);
      });
    } catch (Exception $e) {
      $classReflection = new ReflectionClass($e);
      $reflection = $classReflection->getProperty('message');
      $reflection->setAccessible(true);
      $reflection->setValue(
        $e,
        $e->getMessage() . ", caused by the following generated code:\n" .
        "  " . str_replace("\n", "\n  ", $code) . "\n" .
        "generated for:\n" .
        "  " . str_replace("\n", "\n  ", $attributeSource['source']) . "\n" .
        "and thrown"
      );
      throw $e;
    } catch (Throwable $t) {
      $classReflection = new ReflectionClass($t);
      $reflection = $classReflection->getProperty('message');
      $reflection->setAccessible(true);
      $reflection->setValue(
        $t,
        $t->getMessage() . ", caused by the following generated code:\n" .
        "  " . str_replace("\n", "\n  ", $code) . "\n" .
        "generated for:\n" .
        "  " . str_replace("\n", "\n  ", $attributeSource['source']) . "\n" .
        "and thrown"
      );
      throw $t;
    }
  }

  /**
   * Extracts attributes from PHPDoc comments.
   *
   * @internal
   */
  static function extractAttributes ($comment) {

    $attributes = [];
    $codeSourceMap = [];

    $processedComment = trim($comment);

    $processedComment = Attribute::unwrapComment($processedComment);
    $processedComment = Attribute::processPHPDoc($processedComment, $codeSourceMap);
    $processedComment = Attribute::processDoctrine($processedComment, $codeSourceMap);

    $tokens = token_get_all('<?php ' . $processedComment . "\n/**/\n");
    $index = 0;

    $attribute = [
      'source' => '',
      'code' => '',
      'phpContext' => '',
      'phpCode' => '',
    ];

    $printTokens = function ($tokens) {
      $source = '';
      foreach ($tokens as $token)
        $source .= is_array($token) ? $token[1] : $token;
      return $source;
    };

    $takeOneToken = function () use ($tokens, &$index, &$attribute) {
      assert(isset($tokens[$index]));
      $attribute['code'] .= is_array($tokens[$index]) ? $tokens[$index][1] : $tokens[$index];
      $token = $tokens[$index];
      $index += 1;
      return $token;
    };

    $takeTokens = function ($onlyTokens) use ($tokens, &$index, &$attribute, &$takeOneToken) {
      $takenTokens = [];
      while ($index < count($tokens)) {
        assert(isset($tokens[$index]));
        if (is_array($tokens[$index]) && !in_array($tokens[$index][0], $onlyTokens))
          break;
        if (!is_array($tokens[$index]) && !in_array($tokens[$index], $onlyTokens))
          break;
        $takenTokens[] = $takeOneToken();
      }
      return $takenTokens;
    };

    $takeValueAttributeTokens = function () use ($tokens, &$index, &$takeTokens) {
      return $takeTokens([
        T_CONSTANT_ENCAPSED_STRING,
        T_DNUMBER,
        T_LNUMBER,
      ]);
    };

    $takeAttributeNameTokens = function () use ($tokens, &$index, &$takeTokens) {
      $tokens = [];
      while (true) {
        $tokens = array_merge($tokens, $takeTokens([
          T_NS_SEPARATOR,
          T_RETURN,
          T_VAR,
          T_STRING,
        ]));
        if (!isset($tokens[$index]) || !is_array($tokens[$index]) || $tokens[$index][0] != T_WHITESPACE)
          break;
        if (!isset($tokens[$index + 1]) || !is_array($tokens[$index + 1]) || $tokens[$index + 1][0] != T_NS_SEPARATOR)
          break;
        $tokens = array_merge($tokens, $takeTokens([
          T_WHITESPACE,
        ]));
      }
      return $tokens;
    };

    $processArgumentsTokens = function () use ($tokens, &$index, &$attribute, &$printTokens,
        &$takeOneToken, &$processAttributeTokens) {

      $roundBracketNestingCount = 0;
      $curlyBracketNestingCount = 0;
      if (isset($tokens[$index]) && in_array($tokens[$index], ['(', '{']))
        while ($index < count($tokens)) {
          if ($tokens[$index] == '@') {
            $processAttributeTokens();
            continue;
          }
          if ($tokens[$index] == '(')
            $roundBracketNestingCount += 1;
          if ($tokens[$index] == ')')
            $roundBracketNestingCount -= 1;
          if ($tokens[$index] == '{')
            $curlyBracketNestingCount += 1;
          if ($tokens[$index] == '}')
            $curlyBracketNestingCount -= 1;
          if (is_array($tokens[$index]) && $tokens[$index][0] == T_STRING && isset($tokens[$index + 1]) && $tokens[$index + 1] == '=')
            return false;
          $argumentsToken = $takeOneToken();
          $attribute['phpCode'] .= $printTokens([$argumentsToken]);
          if ($roundBracketNestingCount == 0 && $curlyBracketNestingCount == 0)
            break;
        }

      if (substr($attribute['phpCode'], -1) != ')')
        $attribute['phpCode'] .= '()';

      return true;

    };

    $processAttributeTokens = function () use ($tokens, &$index, &$attribute, &$printTokens,
        &$takeTokens, &$takeValueAttributeTokens, &$takeAttributeNameTokens,
        &$processArgumentsTokens) {

      $takeTokens(['@']);
      $takeTokens([T_WHITESPACE]);

      $attributeValueTokens = $takeValueAttributeTokens();
      if (count($attributeValueTokens) > 0) {
        $attribute['phpCode'] .= $printTokens($attributeValueTokens);
        return;
      }

      $attributeName = trim($printTokens($takeAttributeNameTokens()));

      if (!$attributeName)
        return;

      $phpCode = $attribute['phpCode'];
      $attribute['phpCode'] = '';
      $isValid = $processArgumentsTokens();

      if (!$isValid) {
        $attribute['phpCode'] = '';
        return;
      }

      // @todo: Remove.
      if (strpos(trim($attribute['phpCode']), '({') === 0) {
        $attribute['phpCode'] = '';
        return;
      }

      // @todo: Remove.
      $rx = '/(?s)\A[\r\n\t ]*\([\r\n\t ]*[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*[\r\n\t ]*\=/';
      if (preg_match($rx, $attribute['phpCode'])) {
        $attribute['phpCode'] = '';
        return;
      }

      $primitiveAttributeCode = 'new \\' . PrimitiveAttribute::class .
        '(' . var_export($attributeName, true) . ', array' . $attribute['phpCode'] . ')';

      $phpKeywords = [
        'else',
        'eval',
        'if',
        'return',
        'var',
      ];

      if (in_array($attributeName, $phpKeywords))
        $attribute['phpCode'] = $primitiveAttributeCode;
      else
        $attribute['phpCode'] = $phpCode . '(class_exists(' . $attributeName . '::class) ? new ' .
          $attributeName . $attribute['phpCode'] . ' : ' . $primitiveAttributeCode . ')';

    };

    for ($index = 0; $index < count($tokens); $index += 1)
      while ($index < count($tokens) && $tokens[$index] == '@') {
        $attribute = [
          'source' => '',
          'code' => '',
          'phpCode' => '',
          'phpContext' => '',
        ];
        $processAttributeTokens();
        if (!$attribute['phpCode'])
          break;
        $attribute['source'] = isset($codeSourceMap[$attribute['code']]) ?
          $codeSourceMap[$attribute['code']] : $attribute['code'];
        $attributes[] = $attribute;
      }


    return $attributes;

  }

  /**
   * Extracts imports from a source file for a certain reflection.
   *
   * @internal
   */
  static function extractImports ($reflection) {

    $imports = '';

    if (!is_file($reflection->getFileName()))
      throw new Exception('File *' . $reflection->getFileName() . '* not found.');

    $tokens = token_get_all(file_get_contents($reflection->getFileName()));

    for ($index = 0; $index < count($tokens); $index += 1) {
      if (is_array($tokens[$index]) && $tokens[$index][2] >= $reflection->getStartLine())
        break;
      if (is_array($tokens[$index]) && $tokens[$index][0] == T_USE) {
        $import = '';
        for (;$index < count($tokens) && $tokens[$index - 1] != ';'; $index += 1) {
          if (is_array($tokens[$index]) && $tokens[$index][0] == T_VARIABLE) {
            $import = '';
            break;
          }
          $import .= is_array($tokens[$index]) ? $tokens[$index][1] : $tokens[$index];
        }
        if ($import)
          $imports .= $import . "\n";
      }
    }

    return $imports;

  }

  /** @internal */
  static function symbolReflection ($symbol) {

    if (is_array($symbol))
      return new ReflectionMethod($symbol[0], $symbol[1]);

    if ($symbol instanceof Closure)
      return new ReflectionFunction($symbol);

    if (is_object($symbol))
      return new ReflectionObject($symbol);

    assert(false, 'Unable to access symbol reflection.');

  }

  /** @internal */
  static function reflectionNamespace ($reflection) {
    if ($reflection instanceof ReflectionMethod)
      return $reflection->getDeclaringClass()->getNamespaceName();
    return $reflection->getNamespaceName();
  }

  /** @internal */
  static function unwrapComment ($comment) {
    if (strpos(ltrim($comment), '//') === 0)
      return substr(ltrim($comment), 2);
    if (strpos(ltrim($comment), '/**') === 0)
      return preg_replace('/(?is)(\A\/\*\*|(?<=\n)[ \t]*\*(?!\/\z)|\*\/\z)/', '', $comment);
    return $comment;
  }

  /** @internal */
  static function processPHPDoc ($comment, &$codeSourceMap = []) {

    $processedComment = $comment;

    $phpDocAttributes = [
      '/
        (?is)
        \@
        (param|var)
        (?:
          (?:
            (?:[ \t\r\n]+)
            (?=[^ \t\r\n@])
            (.+?)
            (?=[ \t\r\n\@]+|\z)
            (?:
              (?:[ \t\r\n]+)
              (?=[^ \t\r\n@])
              (.+?)
              (?=[ \t\r\n\@]+|\z)
              (?:
                (?:[ \t\r\n]+)
                (?=[^ \t\r\n@])
                (.+?)
                (?=[ \t\r\n]*(?:\@|\r?\n\r?\n|\z))
              )?
            )?
          )
          |
          \z
        )
      /x',
      '/
        (?is)
        \@
        (return)
        (?:
          (?:
            (?:[ \t\r\n]+)
            (?=[^ \t\r\n@])
            (.+?)
            (?=[ \t\r\n\@]+|\z)
            (?:
              (?:[ \t\r\n]+)
              (?=[^ \t\r\n@])
              (.+?)
              (?=[ \t\r\n]*(?:\@|\r?\n\r?\n|\z))
            )?
          )
          |
          \z
        )
      /x',
      '/
        (?is)
        \@
        (see)
        (?:
          (?:
            (?:[ \t\r\n]+)
            (?=[^ \t\r\n@])
            (.+?)
            (?=[ \t\r\n\@]+|\z)
            (?:
              (?:[ \t\r\n]+)
              (?=[^ \t\r\n@])
              (.+?)
              (?=[ \t\r\n]*(?:\@|\r?\n\r?\n|\z))
            )?
          )
          |
          \z
        )
      /x',
    ];

    foreach ($phpDocAttributes as $phpDocAttribute)
      $processedComment = preg_replace_callback($phpDocAttribute, function ($match) use (&$codeSourceMap) {
        $attributeCode = '@' . trim($match[1]) . '(' . implode(', ', array_filter(array_map(function ($parameter) {
          return $parameter ? var_export($parameter, true) : '';
        }, array_slice($match, 2)))) . ')';
        $codeSourceMap[$attributeCode] = $match[0];
        return $attributeCode;
      }, $processedComment);

    return $processedComment;

  }

  /** @internal */
  static function processDoctrine ($comment, &$codeSourceMap = []) {

    // @todo: Implement.
    return $comment;

    static $regex = '/
      (?is)
      (
        \@
        (?:
          [a-zA-Z_\x7f-\xff]
          [a-zA-Z0-9_\x7f-\xff]*+
          (?:
            [ \t\r\n]*+
            \\\\
            [ \t\r\n]*+
          )?
        )+
        [ \t\r\n]*+
        \(
      )
      (?:
        [ \t\r\n]*+
        \\{
        .*?
        \\}
      )
      (
        \)
      )
    /x';
    #preg_match($regex, $comment, $match);
    #var_dump($match);
    $x = preg_replace_callback($regex, function ($match) use (&$codeSourceMap) {
      #return $match[0];
      var_dump($match);
      exit;
      #$attributeCode = '@' . trim($match[1]) . '(' . implode(', ', array_map(function ($parameter) {
      #  return var_export($parameter, true);
      #}, array_slice($match, 2))) . ')';
      #$codeSourceMap[$attributeCode] = $match[0];
      #return $attributeCode;
    }, $comment);
    if (preg_last_error() != 0) {
    var_dump($comment, $x);
    var_dump(ini_get('pcre.backtrack_limit'));
    var_dump(preg_last_error());
    var_dump(PREG_BACKTRACK_LIMIT_ERROR);
    exit;
    }
    return $x;
  }

}
