
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Case Sensitive Naming
=====================

This rule check that all names of the same function/class/etc are using the same letter casing.

Example:

```php
<?php

class Foo {}

$a = new foo();
```

Analyzing the example code would yield:

```
  ✖ Case Sensitive Naming: new foo() on line 5
    Expression `new foo()` is not using the same letter casing as class `Foo`.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('caseSensitiveNaming');

// To disable this rule:
$phlint->disableRule('caseSensitiveNaming');

```

Rule source code: [/code/phlint/rule/CaseSensitiveNaming.php](/code/phlint/rule/CaseSensitiveNaming.php)
