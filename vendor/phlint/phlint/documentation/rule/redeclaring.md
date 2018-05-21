
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Redeclaring
===========

This rule alerts about redeclaration of function, classes, traits, etc. Redeclaring is prohibited in PHP and causes a
runtime fatal error.

Example:

```php
<?php

function x () {}
function x () {}
// PHP Fatal error:
//   Cannot redeclare x() (previously declared on line 3) on line 4
```

Analyzing the example code would yield:

```
  ✖ Redeclaring: function x () on line 4
    Declaration for `function x ()` already found.
    Having multiple declarations is not allowed.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('redeclaring');

// To disable this rule:
$phlint->disableRule('redeclaring');
```

Rule source code: [/code/phlint/rule/Redeclaring.php](/code/phlint/rule/Redeclaring.php)
