
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Operand Compatibility
=====================

Reports any incompatible operands.

Example:

```php
<?php

$foo = 1 + 'bar';
```

Analyzing the example code would yield:

```
  ✖ Operand Compatibility: 'bar' on line 3
    Value `'bar'` is always or sometimes of type `string`.
    Expression `1 + 'bar'` may cause undesired or unexpected behavior with `string` operands.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('operandCompatibility');

// To disable this rule:
$phlint->disableRule('operandCompatibility');

```

Rule source code: [/code/phlint/rule/OperandCompatibility.php](/code/phlint/rule/OperandCompatibility.php)
