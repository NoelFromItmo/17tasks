
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Variable Initialization
=======================

Accessing an undefined variable (a variable that has not been initialized yet) causes different side effects in PHP.
In some cases it has no negative functional side effects (for example if a variables is being compared) and
in other cases it might cause a fatal (for example if a method is being invoked on an undefined variable).

This rule alerts about variables that are not initialized (and thus implicitly defined) before they are used.

Example:

```php
<?php

$a = $b;

$c->foo();
```

Analyzing the example code would yield:

```
  ✖ Variable Initialization: $b on line 3
    Variable `$b` is used but it is not always initialized.

  ✖ Variable Initialization: $c on line 5
    Variable `$c` is used but it is not always initialized.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('variableInitialization');

// To disable this rule:
$phlint->disableRule('variableInitialization');
```

Rule source code: [/code/phlint/rule/VariableInitialization.php](/code/phlint/rule/VariableInitialization.php)
