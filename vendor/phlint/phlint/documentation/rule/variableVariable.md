
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Variable Variable
=================

Variable Variables is a PHP language feature described in
[http://php.net/manual/en/language.variables.variable.php](http://php.net/manual/en/language.variables.variable.php).

Usage of this feature allows for such dynamic code which easily becomes very unreadable and
it can be very difficult to verify manually.

This rule disallows usage of this feature.

Example:

```php
<?php

$foo = 'bar';
$$foo = 'baz';
```

Analyzing the example code would yield:

```
  ✖ Variable Variable: ${$foo} on line 4
    Using variable variable is not allowed.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('variableVariable');

// To disable this rule:
$phlint->disableRule('variableVariable');
```

Rule source code: [/code/phlint/rule/VariableVariable.php](/code/phlint/rule/VariableVariable.php)
