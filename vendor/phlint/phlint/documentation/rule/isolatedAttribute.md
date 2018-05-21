
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Isolated Attribute
==================

Makes sure that [@isolated](/documentation/attribute/isolated.md) code is indeed
[isolated](/documentation/glossary/isolation.md).

Example:

```php
<?php

/** @isolated */
function foo () {
  $bar = $_GET['bar'];
}
```

Analyzing the example code would yield:

```
  ✖ Isolated Attribute: $_GET on line 5
    Function `foo()` has been marked as isolated.
    Accessing superglobal `$_GET` breaks that isolation.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('isolatedAttribute');

// To disable this rule:
$phlint->disableRule('isolatedAttribute');
```

Rule source code: [/code/phlint/rule/IsolatedAttribute.php](/code/phlint/rule/IsolatedAttribute.php)
