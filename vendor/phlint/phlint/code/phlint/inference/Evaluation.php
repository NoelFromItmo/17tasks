<?php

namespace phlint\inference;

use \luka8088\phops\Convert;
use \luka8088\phops\MetaContext;
use \phlint\data;
use \phlint\IIData;
use \phlint\inference;
use \phlint\node as pnode;
use \phlint\NodeConcept;
use \phlint\Parser;
use \phlint\phpLanguage;
use \PhpParser\Node;

class Evaluation {

  function getIdentifier () {
    return 'evaluation';
  }

  function getDependencies () {
    return [
      'attribute',
      'concept',
      'declarationLink',
      'include',
      'nodeRelation',
      'simulation',
      'symbol',
      'value',
    ];
  }

  /**
   * Analyzes the code and infers the nodes that it would yield if it would
   * be evaluated.
   */
  static function get ($node) {

    if (is_array($node)) {
      $yieldNodes = [];
      foreach ($node as $subNode)
        foreach (self::get($subNode) as $yieldNode)
        $yieldNodes[] = $yieldNode;
      return inference\UniqueNode::get($yieldNodes);
    }

    assert(is_object($node));

    if ($node instanceof data\Value)
      return [$node];

    if ($node instanceof Node\Arg)
      return self::get($node->value);

    if ($node instanceof Node\Expr\Array_ && count($node->items) == 0)
      return [clone $node];

    $yieldClass = class_exists(Node\Identifier::class)
      ? pnode\Yield_::class
      : pnode\YieldV3::class;

    if ($node instanceof Node\Expr\BinaryOp\Concat && $node->left instanceof $yieldClass && $node->right instanceof $yieldClass)
      return [$node];

    if ($node instanceof Node\Expr\ConstFetch && $node->name->toString() == 'ZEND_DEBUG_BUILD')
      return [$node];

    if ($node instanceof Node\Expr\ConstFetch && $node->name->toString() == 'ZEND_THREAD_SAFE')
      return [$node];

    if ($node instanceof Node\Expr\ConstFetch
        && in_array(strtoupper($node->name->toString()), phpLanguage\Fixture::$valueConstants))
      return [$node];

    if ($node instanceof Node\Identifier)
      return [$node];

    if ($node instanceof Node\Name)
      return [$node];

    if ($node instanceof Node\NullableType)
      return [$node];

    if ($node instanceof Node\Scalar\DNumber)
      return [$node];

    if ($node instanceof Node\Scalar\LNumber)
      return [$node];

    if ($node instanceof Node\Scalar\String_)
      return [$node];

    if ($node instanceof pnode\Excludes)
      return [$node];

    $scopeClass = class_exists(Node\Identifier::class)
      ? pnode\Scope::class
      : pnode\ScopeV3::class;

    if ($node instanceof $scopeClass)
      return inference\Evaluation::get($node->expression);

    if ($node instanceof pnode\SymbolAlias)
      return [$node];

    $yieldClass = class_exists(Node\Identifier::class)
      ? pnode\Yield_::class
      : pnode\YieldV3::class;

    if ($node instanceof $yieldClass)
      return $node->yield;

    if (!isset($node->iiData['evaluationYield']))
      $node->iiData['evaluationYield'] = self::lookup($node);

    return $node->iiData['evaluationYield'];

  }

  /** @internal */
  static function lookup ($node) {

    if ($node instanceof Node\Expr\Array_) {
      $yieldNodes = [];
      $itemKeyConcepts = [];
      $itemConcepts = [];
      foreach ($node->items as $itemNode) {
        $itemKeyNodeConcepts = inference\Concept::get($itemNode->key);
        if (count($itemKeyNodeConcepts) == 0)
          $itemKeyConcepts[] = '';
        foreach ($itemKeyNodeConcepts as $itemKeyNodeConcept)
          $itemKeyConcepts[] = $itemKeyNodeConcept->id;
        $itemNodeConcepts = inference\Concept::get($itemNode->value);
        if (count($itemNodeConcepts) == 0)
          $itemConcepts[] = '';
        foreach ($itemNodeConcepts as $itemNodeConcept)
          $itemConcepts[] = $itemNodeConcept->id;
      }
      $commonKey = inference\Symbol::composeMulti(array_unique(array_filter($itemKeyConcepts)));
      $common = inference\Symbol::composeMulti(array_unique(array_filter($itemConcepts)));
      if ($common)
        $yieldNodes[] = new data\Value([new pnode\SymbolAlias(inference\Symbol::composeArray($commonKey, $common))]);
      return $yieldNodes;
    }

    if (isset($GLOBALS['phlintExperimental']) && $GLOBALS['phlintExperimental'])
    if ($node instanceof Node\Expr\ArrayDimFetch) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->var) as $rangeYieldNode)
        if ($rangeYieldNode instanceof data\Value && inference\Symbol::isArray(inference\Concept::nodeConcept($rangeYieldNode)->id))
          $yieldNodes[] = new data\Value([new pnode\SymbolAlias(inference\Symbol::decomposeArray(inference\Concept::nodeConcept($rangeYieldNode)->id)['valueSymbol'])]);
        else
          $yieldNodes[] = new data\Value([new pnode\SymbolAlias('t_mixed')]);
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\Assign)
      return inference\Evaluation::get($node->expr);

    if ($node instanceof Node\Expr\BinaryOp\BooleanAnd) {
      if (inference\Value::isTrue($node->left) && inference\Value::isTrue($node->right))
        return [new Node\Expr\ConstFetch(new Node\Name('true'))];
      if (inference\Value::isFalse($node->left) && inference\Value::isFalse($node->right))
        return [new Node\Expr\ConstFetch(new Node\Name('false'))];
      return [new data\Value([new pnode\SymbolAlias('t_bool')])];
    }

    if ($node instanceof Node\Expr\BinaryOp\Concat) {
      if (false)
      return [new Node\Expr\BinaryOp\Concat(
        new pnode\Yield_(inference\Evaluation::get($node->left)),
        new pnode\Yield_(inference\Evaluation::get($node->right))
      )];
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->left) as $leftYieldNode) {
        if (!inference\Value::isValueNode($leftYieldNode)) {
          $yieldNodes[] = new data\Value([new pnode\SymbolAlias('t_string')]);
          continue;
        }
        $leftValue = inference\Value::toString($leftYieldNode);
        foreach (inference\Evaluation::get($node->right) as $rightYieldNode) {
          if (!inference\Value::isValueNode($rightYieldNode)) {
            $yieldNodes[] = new data\Value([new pnode\SymbolAlias('t_string')]);
            continue;
          }
          $rightValue = inference\Value::toString($rightYieldNode);
          $yieldNodes[] = new Node\Scalar\String_($leftValue->value . $rightValue->value);
        }
      }
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\BinaryOp\Equal) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->left) as $leftYieldNode) {
        if (!inference\Value::isValueNode($leftYieldNode))
          return [];
        $leftConcept = inference\Concept::nodeConcept($leftYieldNode)->id;
        if ($leftConcept == 't_stringBool')
          $leftConcept = 't_string';
        foreach (inference\Evaluation::get($node->right) as $rightYieldNode) {
          if (!inference\Value::isValueNode($rightYieldNode))
            return [];
          $rightConcept = inference\Concept::nodeConcept($rightYieldNode)->id;
          if ($rightConcept == 't_stringBool')
            $rightConcept = 't_string';
          if ($leftConcept != $rightConcept)
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name('false'));
          if ($leftYieldNode instanceof Node\Expr\ConstFetch
              && in_array(strtolower($leftYieldNode->name->toString()), ['true', 'false', 'null'])
              && $rightYieldNode instanceof Node\Expr\ConstFetch
              && in_array(strtolower($rightYieldNode->name->toString()), ['true', 'false', 'null']))
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name(
              strtolower($leftYieldNode->name->toString()) === strtolower($rightYieldNode->name->toString())
              ? 'true'
              : 'false'
            ));
          if ($leftYieldNode instanceof Node\Scalar\String_ && $rightYieldNode instanceof Node\Scalar\String_)
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name(
              $leftYieldNode->value === $rightYieldNode->value ? 'true' : 'false'
            ));
          if ($leftYieldNode instanceof Node\Scalar\LNumber && $rightYieldNode instanceof Node\Scalar\LNumber)
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name(
              $leftYieldNode->value === $rightYieldNode->value ? 'true' : 'false'
            ));
        }
      }
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\BinaryOp\Identical) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->left) as $leftYieldNode) {
        if (!inference\Value::isValueNode($leftYieldNode))
          return [];
        $leftConcept = inference\Concept::nodeConcept($leftYieldNode)->id;
        if ($leftConcept == 't_stringBool')
          $leftConcept = 't_string';
        foreach (inference\Evaluation::get($node->right) as $rightYieldNode) {
          if (!inference\Value::isValueNode($rightYieldNode))
            return [];
          $rightConcept = inference\Concept::nodeConcept($rightYieldNode)->id;
          if ($rightConcept == 't_stringBool')
            $rightConcept = 't_string';
          if ($leftConcept != $rightConcept)
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name('false'));
          if ($leftYieldNode instanceof Node\Expr\ConstFetch
              && in_array(strtolower($leftYieldNode->name->toString()), ['true', 'false', 'null'])
              && $rightYieldNode instanceof Node\Expr\ConstFetch
              && in_array(strtolower($rightYieldNode->name->toString()), ['true', 'false', 'null']))
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name(
              strtolower($leftYieldNode->name->toString()) === strtolower($rightYieldNode->name->toString())
              ? 'true'
              : 'false'
            ));
          if ($leftYieldNode instanceof Node\Scalar\String_ && $rightYieldNode instanceof Node\Scalar\String_)
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name(
              $leftYieldNode->value === $rightYieldNode->value ? 'true' : 'false'
            ));
          if ($leftYieldNode instanceof Node\Scalar\LNumber && $rightYieldNode instanceof Node\Scalar\LNumber)
            $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name(
              $leftYieldNode->value === $rightYieldNode->value ? 'true' : 'false'
            ));
        }
      }
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\BinaryOp\NotEqual)
      return inference\Evaluation::lookup(new Node\Expr\BooleanNot(
        new Node\Expr\BinaryOp\Equal($node->left, $node->right)
      ));

    if ($node instanceof Node\Expr\BinaryOp\NotIdentical)
      return inference\Evaluation::lookup(new Node\Expr\BooleanNot(
        new Node\Expr\BinaryOp\Identical($node->left, $node->right)
      ));

    if ($node instanceof Node\Expr\BooleanNot) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->expr) as $yieldNode) {
        if ($yieldNode instanceof Node\Expr\ConstFetch && strtolower($yieldNode->name->toString()) == 'true')
          $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name('false'));
        if ($yieldNode instanceof Node\Expr\ConstFetch && strtolower($yieldNode->name->toString()) == 'false')
          $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name('true'));
      }
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\ClassConstFetch)
      if ((class_exists(Node\Identifier::class) && $node->name instanceof Node\Identifier ? $node->name->name : $node->name) == 'class')
        return array_map(function ($node) {
          return new Node\Scalar\String_(inference\Symbol::phpID($node));
        }, inference\NameEvaluation::get($node->class, 'class'));

    if ($node instanceof Node\Expr\Closure) {
      $yieldNodes = [];
      foreach (inference\SymbolLink::get($node) as $symbol)
        $yieldNodes[] = new pnode\SymbolAlias($symbol);
      return $yieldNodes;
    }

    if ($node instanceof Node\Expr\ClosureUse)
      return inference\Evaluation::lookupVariable($node);

    if ($node instanceof Node\Expr\ConstFetch) {
      $yieldNodes = [];
      foreach (DeclarationLink::get($node) as $constant)
        $yieldNodes[] = $constant->value;
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\Empty_) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->expr) as $value) {
        if ($value instanceof data\Value)
          foreach ($value->constraints as $constraint)
            if ($constraint instanceof pnode\SymbolAlias && substr($constraint->id, 0, 2) == 'c_')
              $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name('false'));
        if ($value instanceof Node\Scalar\String_)
          $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name($value->value == '' ? 'true' : 'false'));
      }
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\FuncCall)
      return inference\Evaluation::lookupInvocation($node);

    if ($node instanceof Node\Expr\Instanceof_) {
      $yieldNodes = [];
      foreach (inference\Evaluation::get($node->expr) as $yieldNode)
        $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name(
          inference\IsImplicitlyConvertible::get($yieldNode, inference\NameEvaluation::get($node->class, 'auto'))
            ? 'true'
            : 'false'
        ));
      return $yieldNodes;
    }

    if ($node instanceof Node\Expr\MethodCall)
      return inference\Evaluation::lookupInvocation($node);

    if ($node instanceof Node\Expr\New_) {
      $yieldNodes = [];
      foreach (inference\SymbolLink::get($node) as $symbol)
        $yieldNodes[] = new data\Value([new pnode\SymbolAlias($symbol)]);
      return $yieldNodes;
    }

    if ($node instanceof Node\Expr\StaticCall)
      return inference\Evaluation::lookupInvocation($node);

    if ($node instanceof Node\Expr\Ternary) {
      $yieldNodes = [];
      if (!inference\Value::isFalse($node->cond))
        foreach (inference\Evaluation::get($node->if ? $node->if : $node->cond) as $yieldNode)
          $yieldNodes[] = $yieldNode;
      if (!inference\Value::isTrue($node->cond))
        foreach (inference\Evaluation::get($node->else) as $yieldNode)
          $yieldNodes[] = $yieldNode;
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Expr\Variable)
      return inference\Evaluation::lookupVariable($node);

    if ($node instanceof Node\Param) {
      $yieldNodes = [];
      if ($node->type instanceof Node\NullableType)
        $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name('null'));
      $type = class_exists(Node\Identifier::class) && $node->type instanceof Node\Identifier ? $node->type->name : $node->type;
      if ($type == 'array')
        $yieldNodes[] = new data\Value([new pnode\SymbolAlias('t_array')]);
      if (in_array($type, ['bool', 'float', 'int', 'string']))
        $yieldNodes[] = new data\Value([new pnode\SymbolAlias('t_' . $type)]);
      if (is_object($node->type))
        foreach (inference\NameEvaluation::get($node->type, 'auto') as $yieldNode)
          $yieldNodes[] = inference\Value::isValueNode($yieldNode) ? $yieldNode : new data\Value([$yieldNode]);
      foreach (inference\Attribute::get($node) as $attribute)
        if ($attribute instanceof Node\Expr\New_ &&
            count($attribute->args) >= 1 &&
            inference\Value::isEqual($attribute->args[0], 'param'))
          if (isset($attribute->args[1], $attribute->args[1]->value->items[0]))
            if (preg_match('/\A[a-zA-Z0-9_\x7f-\xff\\\\\\(\\)\\[\\]\\|]+\z/', $attribute->args[1]->value->items[0]->value->value))
            foreach (inference\Evaluation::getPHPID($attribute->args[1]->value->items[0]->value->value, $node) as $yieldNode)
              $yieldNodes[] = inference\Value::isValueNode($yieldNode) ? $yieldNode : new data\Value([$yieldNode]);
      if (count($yieldNodes) > 0)
        if ($node->default instanceof Node\Expr\ConstFetch && strtolower($node->default->name->toString()) == 'null')
          $yieldNodes[] = $node->default;
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof Node\Scalar\MagicConst\Dir && $node->getAttribute('path', ''))
      return [new Node\Scalar\String_(dirname($node->getAttribute('path', '')))];

    if ($node instanceof Node\Scalar\MagicConst\File && $node->getAttribute('path', ''))
      return [new Node\Scalar\String_($node->getAttribute('path', ''))];

    if ($node instanceof Node\Stmt\Catch_) {
      $yieldNodes = [];
      foreach ($node->types as $typeNode)
        foreach (inference\NameEvaluation::get($typeNode, 'class') as $yieldNode)
          $yieldNodes[] = inference\Value::isValueNode($yieldNode) ? $yieldNode : new data\Value([$yieldNode]);
      return inference\UniqueNode::get($yieldNodes);
    }

    $callArgumentClass = class_exists(Node\Identifier::class)
      ? pnode\CallArgument::class
      : pnode\CallArgumentV3::class;

    if ($node instanceof $callArgumentClass) {
      $yieldNodes = [];
      foreach ($node->yield as $yieldNode)
        foreach (inference\Evaluation::get($yieldNode) as $evaluatedYieldNode)
          $yieldNodes[] = $evaluatedYieldNode;
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof pnode\RangeKeyFetch) {
      $yieldNodes = [];
      foreach (inference\Concept::get($node->range) as $rangeYieldNode)
        if ($rangeYieldNode instanceof pnode\SymbolAlias) {
          $keySymbol = inference\Symbol::decomposeArray($rangeYieldNode->id)['keySymbol'];
          $yieldNodes[] = new data\Value([new pnode\SymbolAlias($keySymbol ? $keySymbol : 't_mixed')]);
        }
      return inference\UniqueNode::get($yieldNodes);
    }

    if ($node instanceof pnode\RangeValueFetch) {
      $yieldNodes = [];
      foreach (inference\Concept::get($node->range) as $rangeYieldNode)
        if ($rangeYieldNode instanceof pnode\SymbolAlias) {
          $valueSymbol = inference\Symbol::decomposeArray($rangeYieldNode->id)['valueSymbol'];
          $yieldNodes[] = new data\Value([new pnode\SymbolAlias($valueSymbol ? $valueSymbol : 't_mixed')]);
        }
      return inference\UniqueNode::get($yieldNodes);
    }

    $returnClass = class_exists(Node\Identifier::class)
      ? pnode\Return_::class
      : pnode\ReturnV3::class;

    if ($node instanceof $returnClass) {
      $yieldNodes = [];
      $context = inference\NodeRelation::parentNode($node);
      if ($context->returnType)
        foreach (inference\NameEvaluation::get($context->returnType, 'auto') as $yieldNode)
          $yieldNodes[] = inference\Value::isValueNode($yieldNode) ? $yieldNode : new data\Value([$yieldNode]);
      foreach (inference\Attribute::get($context) as $attribute) {
        if ($attribute instanceof Node\Expr\New_ &&
            count($attribute->args) >= 1 &&
            inference\Value::isEqual($attribute->args[0], 'return'))
        if (isset($attribute->args[1]->value->items[0])) {
          if (preg_match('/\A[a-zA-Z0-9_\x7f-\xff\\\\\\(\\)\\[\\]\\|]+\z/', $attribute->args[1]->value->items[0]->value->value))
          foreach (inference\Evaluation::getPHPID($attribute->args[1]->value->items[0]->value->value, $context) as $evaluatedNode)
            $yieldNodes[] = inference\Value::isValueNode($evaluatedNode) ? $evaluatedNode : new data\Value([$evaluatedNode]);
        }
      }
      if (isset($context->iiData['returnYield']))
        foreach ($context->iiData['returnYield'] as $yieldNode)
          if ($yieldNode)
          foreach (inference\Evaluation::get($yieldNode) as $evaluatedYieldNode)
            $yieldNodes[] = $evaluatedYieldNode;
      return inference\UniqueNode::get($yieldNodes);
    }

    return [];

  }

  static function lookupInvocation ($node) {
    if (!isset(MetaContext::get(IIData::class)['memo:callContextStack']))
      MetaContext::get(IIData::class)['memo:callContextStack'] = [];
    $yieldNodes = [];
    $signatureYieldNodes = [];
    if ($node->getAttribute('inAnalysisScope', true) || !inference\NodeRelation::contextNode($node))
    foreach (inference\SymbolLink::getUnmangled($node) as $symbol)
      foreach (inference\Evaluation::lookupStandardSymbolInvocation($symbol, inference\CallArgument::get(inference\NodeRelation::originNode($node))) as $yieldNode)
        $yieldNodes[] = $yieldNode;
    if (count($yieldNodes) == 0)
    foreach (inference\DeclarationLink::get($node) as $declarationNode)
      if (NodeConcept::isExecutionContextNode($declarationNode)) {
        $declarationSymbol = inference\DeclarationSymbol::get($declarationNode);
        if (count(MetaContext::get(IIData::class)['memo:callContextStack']) > 0)
          foreach (end(MetaContext::get(IIData::class)['memo:callContextStack']) as $contextSymbol)
            if ($declarationSymbol == $contextSymbol)
              return [new pnode\SymbolAlias('o_recursiveInference')];
        MetaContext::get(IIData::class)['memo:callContextStack'][] = array_merge(
          count(MetaContext::get(IIData::class)['memo:callContextStack']) > 0
            ? end(MetaContext::get(IIData::class)['memo:callContextStack'])
            : [],
          [$declarationSymbol]
        );
        if ($declarationNode->returnType)
          foreach (inference\NameEvaluation::get($declarationNode->returnType, 'auto') as $yieldNode)
            $signatureYieldNodes[] = inference\Value::isValueNode($yieldNode) ? $yieldNode : new data\Value([$yieldNode]);
        foreach (inference\Attribute::get($declarationNode) as $attribute) {
          if ($attribute instanceof Node\Expr\New_ &&
              count($attribute->args) >= 1 &&
              inference\Value::isEqual($attribute->args[0], 'return'))
          if (isset($attribute->args[1]->value->items[0])) {
            if (preg_match('/\A[a-zA-Z0-9_\x7f-\xff\\\\\\(\\)\\[\\]\\|]+\z/', $attribute->args[1]->value->items[0]->value->value))
            foreach (inference\Evaluation::getPHPID($attribute->args[1]->value->items[0]->value->value, $declarationNode) as $evaluatedNode)
              $signatureYieldNodes[] = inference\Value::isValueNode($evaluatedNode) ? $evaluatedNode : new data\Value([$evaluatedNode]);
          }
        }
        if (isset($declarationNode->iiData['returnYield']))
          foreach ($declarationNode->iiData['returnYield'] as $yieldNode)
            foreach (inference\Evaluation::get($yieldNode) as $evaluatedYieldNode) {
              if (inference\NodeComparison::isAlways($evaluatedYieldNode, 'o_undefined')) {
                $yieldNodes[] = new Node\Expr\ConstFetch(new Node\Name('null'));
                continue;
              }
              $yieldNodes[] = $evaluatedYieldNode;
            }
      array_pop(MetaContext::get(IIData::class)['memo:callContextStack']);
      }
    $signatureYieldNodes = array_filter($signatureYieldNodes, function ($signatureYieldNode) use ($yieldNodes) {
      return !inference\NodeComparison::isSometimes($yieldNodes, $signatureYieldNode);
    });
    foreach ($signatureYieldNodes as $signatureYieldNode)
      $yieldNodes[] = $signatureYieldNode;
    return inference\UniqueNode::get($yieldNodes);
  }

  static function lookupStandardSymbolInvocation ($symbol, $arguments) {

    /** @see http://www.php.net/manual/en/function.class-exists.php */
    if ($symbol == 'f_class_exists') {
      if (!isset($arguments[0])) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\NameEvaluation::get($arguments[0], 'class') as $linkNode)
        yield new Node\Expr\ConstFetch(new Node\Name(
          count(inference\DeclarationLink::get($linkNode)) > 0 ? 'true' : 'false'
        ));
    }

    /** @see http://www.php.net/manual/en/function.date.php */
    if ($symbol == 'f_date') {
      if (!isset($arguments[0])) {
        yield new Node\Expr\ConstFetch(new Node\Name('false'));
        return;
      }
      foreach (inference\Value::get($arguments[0]) as $value) {
        if (!($value instanceof Node\Scalar\String_))
          continue;
        $yieldNode = null;
        $appendYield = function ($yieldSubNode) use (&$yieldNode) {
          if (is_array($yieldSubNode))
            $yieldSubNode = $yieldSubNode[0];
          if ($yieldSubNode instanceof Node\Stmt\Expression)
            $yieldSubNode = $yieldSubNode->expr;
          $yieldNode = $yieldNode ? new Node\Expr\BinaryOp\Concat($yieldNode, $yieldSubNode) : $yieldSubNode;
        };
        for ($i = 0; $i < strlen($value->value); $i += 1) {
          if (substr($value->value, $i, 1) == '\\') {
            $i += 1;
            $appendYield(new Node\Scalar\String_(substr($value->value, $i, 1)));
            continue;
          }
          if (substr($value->value, $i, 1) == "d") {
            $appendYield(Parser::parse('<?php rand(0, 9) . rand(0, 9);'));
            continue;
          }
          if (substr($value->value, $i, 1) == "H") {
            $appendYield(Parser::parse('<?php str_pad(rand(0, 23), 2, 0, STR_PAD_LEFT);'));
            continue;
          }
          if (substr($value->value, $i, 1) == "i") {
            $appendYield(Parser::parse('<?php str_pad(rand(0, 59), 2, 0, STR_PAD_LEFT);'));
            continue;
          }
          if (substr($value->value, $i, 1) == "l") {
            $appendYield(Parser::parse(
              '<?php ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"][rand(0, 6)];'
            ));
            continue;
          }
          if (substr($value->value, $i, 1) == "m") {
            $appendYield(Parser::parse('<?php rand(0, 9) . rand(0, 9);'));
            continue;
          }
          if (substr($value->value, $i, 1) == "n") {
            $appendYield(Parser::parse('<?php rand(1, 12);'));
            continue;
          }
          if (substr($value->value, $i, 1) == "s") {
            $appendYield(Parser::parse('<?php str_pad(rand(0, 59), 2, 0, STR_PAD_LEFT);'));
            continue;
          }
          if (substr($value->value, $i, 1) == "U") {
            $appendYield(Parser::parse('<?php rand();'));
            continue;
          }
          if (substr($value->value, $i, 1) == "Y") {
            $appendYield(Parser::parse('<?php rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);'));
            continue;
          }
          $appendYield(new Node\Scalar\String_(substr($value->value, $i, 1)));
        }
        if ($yieldNode)
          foreach (inference\Evaluation::get($yieldNode) as $evaluatedYieldNode)
            yield $evaluatedYieldNode;
      }
      return;
    }

    /** @see http://www.php.net/manual/en/function.dirname.php */
    if ($symbol == 'f_dirname') {
      if (!isset($arguments[0])) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\Evaluation::get($arguments[0]) as $yieldNode)
        if ($yieldNode instanceof Node\Scalar\String_)
          yield new Node\Scalar\String_(dirname($yieldNode->value));
    }

    /** @see http://www.php.net/manual/en/function.is-a.php */
    if ($symbol == 'f_is_a') {
      if (count($arguments) < 2) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\Value::get($arguments[0]) as $value) {
        if (!inference\IsImplicitlyConvertible::get($value, ['o_object', 't_string'])) {
          yield new Node\Expr\ConstFetch(new Node\Name('false'));
          continue;
        }
      }
    }

    /** @see http://www.php.net/manual/en/function.is-array.php */
    if ($symbol == 'f_is_array') {
      if (!isset($arguments[0])) {
        yield new Node\Expr\ConstFetch(new Node\Name('false'));
        return;
      }
      foreach (inference\Evaluation::get($arguments[0]) as $yieldNode)
        yield new Node\Expr\ConstFetch(new Node\Name(
          inference\NodeComparison::isAlways($yieldNode, 't_array') ? 'true' : 'false'
        ));
    }

    /** @see http://www.php.net/manual/en/function.is-callable.php */
    if ($symbol == 'f_is_callable') {
      if (!isset($arguments[0])) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\Evaluation::get($arguments[0]) as $yieldNode)
        yield new Node\Expr\ConstFetch(new Node\Name(inference\IsCallable::get($yieldNode) ? 'true' : 'false'));
    }

    /** @see http://www.php.net/manual/en/function.is-numeric.php */
    if ($symbol == 'f_is_numeric') {
      if (!isset($arguments[0])) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\Value::get($arguments[0]) as $value) {
        $isNumeric = false;
        if ($value instanceof Node\Scalar\DNumber && is_numeric($value->value))
          $isNumeric = true;
        if ($value instanceof Node\Scalar\LNumber && is_numeric($value->value))
          $isNumeric = true;
        if ($value instanceof Node\Scalar\String_ && is_numeric($value->value))
          $isNumeric = true;
        yield new Node\Expr\ConstFetch(new Node\Name($isNumeric ? 'true' : 'false'));
      }
    }

    /** @see http://www.php.net/manual/en/function.is-object.php */
    if ($symbol == 'f_is_object')
      foreach (count($arguments) > 0 ? inference\Concept::get($arguments[0]) : [new pnode\SymbolAlias('o_null')] as $concept) {
        $concept = $concept->id;
        if ($concept == 't_mixed')
          continue;
        if (count(inference\SymbolDeclaration::get($concept)) == 0 || $concept == 't_string') {
          yield new Node\Expr\ConstFetch(new Node\Name('false'));
          continue;
        }
        foreach (inference\SymbolDeclaration::get($concept) as $declaration)
          yield new Node\Expr\ConstFetch(new Node\Name(
            NodeConcept::isInterfaceNode($declaration) ? 'true' : 'false'
          ));
      }

    /** @see http://www.php.net/manual/en/function.rand.php */
    if ($symbol == 'f_rand') {
      if (false)
      yield new data\Value([
        new pnode\SymbolAlias('t_int'),
        new \phlint\constraint\GreaterThan(-1),
        new \phlint\constraint\LessThan(3),
      ], 'rand(0, 2)');
      yield new Node\Scalar\LNumber(0);
      #yield new Node\Scalar\LNumber(1);
      #yield new Node\Scalar\LNumber(2);
    }

    /** @see http://www.php.net/manual/en/function.str-pad.php */
    if ($symbol == 'f_str_pad') {
      if (count($arguments) < 2) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      if (count($arguments) < 4)
        return;
      foreach (inference\Value::get($arguments[0]) as $inputValue)
        foreach (inference\Value::get($arguments[1]) as $padLengthValue)
          foreach (inference\Value::get($arguments[2]) as $padStringValue)
            foreach (inference\Value::get($arguments[3]) as $padTypeValue)
            if ($inputValue instanceof Node\Scalar\String_ || $inputValue instanceof Node\Scalar\LNumber)
            if ($padLengthValue instanceof Node\Scalar\String_ || $padLengthValue instanceof Node\Scalar\LNumber)
            if ($padStringValue instanceof Node\Scalar\String_ || $padStringValue instanceof Node\Scalar\LNumber)
            if ($padTypeValue instanceof Node\Scalar\String_ || $padTypeValue instanceof Node\Scalar\LNumber)
            yield new Node\Scalar\String_(
              str_pad($inputValue->value, $padLengthValue->value, $padStringValue->value, $padTypeValue->value)
            );
    }

    /** @see http://www.php.net/manual/en/function.str-replace.php */
    if ($symbol == 'f_str_replace') {
      if (count($arguments) < 3) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\Value::get($arguments[0]) as $searchValue)
        foreach (inference\Value::get($arguments[1]) as $replaceValue)
          foreach (inference\Value::get($arguments[2]) as $subjectValue)
            if ($searchValue instanceof Node\Scalar\String_)
            if ($replaceValue instanceof Node\Scalar\String_ || $replaceValue instanceof Node\Scalar\LNumber)
            if ($subjectValue instanceof Node\Scalar\String_)
            yield new Node\Scalar\String_(
              str_replace($searchValue->value, $replaceValue->value, $subjectValue->value)
            );
    }

    /** @see http://www.php.net/manual/en/function.strlen.php */
    if ($symbol == 'f_strlen') {
      if (!isset($arguments[0])) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\Value::get($arguments[0]) as $value) {
        if ($value instanceof Node\Scalar\String_)
          yield new Node\Scalar\LNumber(strlen($value->value));
      }
    }

    /** @see http://www.php.net/manual/en/function.substr.php */
    if ($symbol == 'f_substr') {
      if (count($arguments) < 2) {
        yield new Node\Expr\ConstFetch(new Node\Name('null'));
        return;
      }
      foreach (inference\Value::get($arguments[0]) as $stringValue)
        foreach (inference\Value::get($arguments[1]) as $startValue) {
          if (!isset($arguments[2])) {
            yield new Node\Scalar\String_(
              substr(inference\Value::toString($stringValue)->value, $startValue->value)
            );
            continue;
          }
          foreach (inference\Value::get($arguments[2]) as $lenghtValue)
            yield new Node\Scalar\String_(
              substr(inference\Value::toString($stringValue)->value, $startValue->value, $lenghtValue->value)
            );
        }
    }

  }

  static function lookupIsProbed ($node) {

    $parentNode = inference\NodeRelation::parentNode($node);

    if ($parentNode instanceof Node\Expr\ArrayDimFetch && $parentNode->var === $node)
      return self::lookupIsProbed($parentNode);

    if ($parentNode instanceof Node\Expr\BinaryOp\Coalesce && $parentNode->left === $node)
      return true;

    /** @see http://php.net/manual/en/function.empty.php */
    if ($parentNode instanceof Node\Expr\Empty_)
      return true;

    /** @see http://php.net/manual/en/function.isset.php */
    if ($parentNode instanceof Node\Expr\Isset_)
      return true;

    /** @see http://php.net/manual/en/function.unset.php */
    if ($parentNode instanceof Node\Stmt\Unset_)
      return true;

    return false;

  }

  static function lookupVariable ($node) {

    $yieldNodes = [];

    foreach (inference\SymbolLink::get($node) as $symbol) {

      if ($symbol == 'v_this') {
        $context = inference\NodeRelation::contextNode($node);
        if ($context && isset($context->iiData['contextYield'])) {
          foreach ($context->iiData['contextYield'] as $contextYieldNode)
            $yieldNodes[] = new data\Value([$contextYieldNode]);
          continue;
        }
        $context = $node;
        while ($context && !NodeConcept::isInterfaceNode($context))
          $context = inference\NodeRelation::contextNode($context);
        $yieldNodes[] = new data\Value([
          new pnode\SymbolAlias($context ? inference\DeclarationSymbol::get($context) : 't_mixed'),
          new pnode\SymbolAlias('t_dynamic'),
        ]);
        continue;
      }

      foreach (phpLanguage\Fixture::$superglobals as $superglobal)
        if ($symbol == inference\Symbol::identifier($superglobal, 'variable'))
          $yieldNodes[] = new data\Value([new pnode\SymbolAlias('t_mixed[t_string]')]);

      if (count($yieldNodes) > 0)
        continue;

      $lookupIsProbed = inference\Evaluation::lookupIsProbed($node);

      foreach (inference\Simulation::get(inference\NodeRelation::originNode($node)) as $simulationYieldNode)
        foreach (inference\Evaluation::get($simulationYieldNode) as $yieldNode) {
          if ($lookupIsProbed && inference\NodeComparison::isAlways($yieldNode, 'o_undefined'))
            continue;
          $yieldNodes[] = $yieldNode;
        }

    }

    return inference\UniqueNode::get($yieldNodes);

  }

  static function getPHPID ($phpID, $scopeNode) {

    if (!isset($scopeNode->iiData['phpIDEvaluationYield:' . $phpID]))
      $scopeNode->iiData['phpIDEvaluationYield:' . $phpID] = inference\Evaluation::lookupPHPID($phpID, $scopeNode);

    return $scopeNode->iiData['phpIDEvaluationYield:' . $phpID];

  }

  static function lookupPHPID ($phpID, $scopeNode) {

    if (inference\Symbol::isMulti($phpID)) {
      $yieldNodes = [];
      foreach (inference\Symbol::decomposeMulti($phpID) as $subSymbol)
        foreach (self::lookupPHPID($subSymbol, $scopeNode) as $yieldNode)
          $yieldNodes[] = $yieldNode;
      return inference\UniqueNode::get($yieldNodes);
    }

    if (inference\Symbol::isArray($phpID)) {
      #var_dump($phpID);
      #var_dump(inference\Symbol::identifier($phpID));
      return [new pnode\SymbolAlias(inference\Symbol::identifier($phpID))];
      #$decomposedArray = inference\Symbol::decomposeArray($phpID);
      #return [];
    }

    if ($phpID == 'resource')
      return [];

    if ($phpID == 'mixed')
      return [new pnode\SymbolAlias('t_mixed')];

    if ($phpID == 'callable')
      return [new pnode\SymbolAlias('o_callable')];

    if ($phpID == 'object')
      return [new pnode\SymbolAlias('o_object')];

    if ($phpID == 'boolean')
      $phpID = 'bool';

    if ($phpID == 'integer')
      $phpID = 'int';

    if ($phpID == 'double')
      $phpID = 'float';

    if ($phpID == 'void')
      return [];

    if (strtolower($phpID) == 'false' || strtolower($phpID) == 'true')
      return inference\NameEvaluation::get($phpID, 'auto');

    if (in_array(strtolower($phpID), ['int', 'array', 'mixed', 'string', 'float', 'bool']))
      return [new pnode\SymbolAlias(inference\Symbol::identifier($phpID, 'auto'))];

    if (strtolower($phpID) == 'null')
      #return [new Node\Expr\ConstFetch(new Node\Name('null'))];
      return [new pnode\SymbolAlias('o_null')];

    if (strpos($phpID, '\\') === 0)
      $nameNode = new Node\Name\FullyQualified($phpID);
    else
      $nameNode = new Node\Name($phpID);
    $nameNode->iiData['parentNode'] = $scopeNode;

    return inference\NameEvaluation::get($nameNode, 'class');

  }

  /**
   * Convert to a key value following PHP array key conversion rules.
   *
   * @see http://php.net/manual/en/language.types.array.php
   */
  static function convertToArrayKeyValue ($keyValue) {

    /**
     * Strings containing valid integers will be cast to the integer type.
     * E.g. the key "8" will actually be stored under 8. On the other
     * hand "08" will not be cast, as it isn't a valid decimal integer.
     */
    if ($keyValue instanceof Node\Scalar\String_ && is_int(filter_var($keyValue->value, FILTER_VALIDATE_INT)))
      return new Node\Scalar\LNumber(Convert::toInt($keyValue->value));

    /**
     * Floats are also cast to integers, which means that the fractional part
     * will be truncated. E.g. the key 8.7 will actually be stored under 8.
     */
    if ($keyValue instanceof Node\Scalar\DNumber)
      return new Node\Scalar\LNumber(Convert::toInt(floor($keyValue->value)));

    /**
     * Bools are cast to integers, too, i.e. the key true will actually be
     * stored under 1 and the key false under 0.
     */
    if ($keyValue instanceof Node\Expr\ConstFetch && strtolower($keyValue->name->toString()) == 'true')
      return new Node\Scalar\LNumber(1);
    if ($keyValue instanceof Node\Expr\ConstFetch && strtolower($keyValue->name->toString()) == 'false')
      return new Node\Scalar\LNumber(0);

    /**
     * Null will be cast to the empty string, i.e. the key null will
     * actually be stored under "".
     */
    if ($keyValue instanceof Node\Expr\ConstFetch && strtolower($keyValue->name->toString()) == 'null')
      return new Node\Scalar\String_('');

    return $keyValue;

  }

}
