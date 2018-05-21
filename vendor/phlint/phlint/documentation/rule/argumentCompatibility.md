
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Argument Compatibility
======================

This rules checks the compatibility or arguments passed onto function calls and object constructors and
checks their compatibility against function parameters.

Example:

```php
<?php

function foo (int $bar) {}

foo(null);
```

Analyzing the example code would yield:

```
  ✖ Argument Compatibility: null on line 5
    Argument #1 passed in the expression `foo(null)` is of type `null`.
    A value of type `null` is not implicitly convertible to type `int`.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('argumentCompatibility');

// To disable this rule:
$phlint->disableRule('argumentCompatibility');

```

Rule source code: [/code/phlint/rule/ArgumentCompatibility.php](/code/phlint/rule/ArgumentCompatibility.php)
