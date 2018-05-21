
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Assert Construct
================

`assert` in PHP is a language construct described in
[http://php.net/manual/en/function.assert.php](http://php.net/manual/en/function.assert.php).
It is used for [asserting](/documentation/glossary/assert.md) something that must always be true
regardless of the conditions at hand, thus failed assertion always indicate a code bug.
This rule can evaluate some asserts during analysis-time and point out their failures.

Example:

```php
<?php

function devide ($a, $b) {
  assert($b == 0);
  return $a / $b;
}

$result = devide(5, 0);
```

Analyzing the example code would yield:

```
  ✖ Assert Construct: assert($b != 0) on line 4
    Assertion expression *assert($b != 0)* is not always true.
    Assertions must always be true.
      Trace #1:
        #1: Function *devide(5 $a, 0 $b)* specialized for the expression *devide(5, 0)* on line 8.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('assertConstruct');

// To disable this rule:
$phlint->disableRule('assertConstruct');

```

Rule source code: [/code/phlint/rule/AssertConstruct.php](/code/phlint/rule/AssertConstruct.php)
