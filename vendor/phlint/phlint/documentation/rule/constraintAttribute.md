
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Constraint Attribute
====================

Constraints provide a way to be more specific about limiting what functions accept other then just
specifying a type.

Example:

```php
<?php

/**
 * @constraint($b != 0)
 */
function devide ($a, $b) {
  return $a / $b;
}

$result = devide(5, 0);
```

Analyzing the example code would yield:

```
  ✖ Constraint Attribute: devide(5, 0) on line 10
    Function `function devide ($a, $b)` has the constraint `@constraint($b != 0)` on line 4.
    That constraint is failing for the expression `devide(5, 0)` on line 10.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('constraintAttribute');

// To disable this rule:
$phlint->disableRule('constraintAttribute');

```

Rule source code: [/code/phlint/rule/ConstraintAttribute.php](/code/phlint/rule/ConstraintAttribute.php)
