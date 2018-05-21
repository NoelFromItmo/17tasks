
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Name
====

Reports any undeclared/invalid names.

Example:

```php
<?php

(1)();
```

Analyzing the example code would yield:

```
  ✖ Name: (1)() in on line 3
    Expression `(1)()` makes a function call to a value of type `int`.
    A function name cannot be of type `int`.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('name');

// To disable this rule:
$phlint->disableRule('name');

```

Rule source code: [/code/phlint/rule/Name.php](/code/phlint/rule/Name.php)
