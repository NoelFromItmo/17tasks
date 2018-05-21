
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Variable Append Initialization
==============================

Accessing an undefined variable (a variable that has not been initialized yet) is covered in
[Variable initialization](/documentation/rule/variableInitialization.md) rule.

Append initialization occurs when an append operator is used on against an uninitialized variable.
Strictly speaking append operators require something (already initialized) to append to, and for
that reason using append operator to initialize a variable might be viewed as trying to append to an
uninitialized variable. However this construct is quite common in PHP and the fact that the variable
is being initialized in this way has no negative side effects. For this reason this rule does not point
out broken code but rather a potentially undesired coding style.

Example:

```php
<?php

$a[] = 2;
```

Analyzing the example code would yield:

```
  ✖ Variable Append Initialization: $a on line 3
    Variable `$a` initialized using append operator.
    Initializing variables using append operator is not allowed.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('variableAppendInitialization');

// To disable this rule:
$phlint->disableRule('variableAppendInitialization');
```

Rule source code: [/code/phlint/rule/VariableAppendInitialization.php](/code/phlint/rule/VariableAppendInitialization.php)
