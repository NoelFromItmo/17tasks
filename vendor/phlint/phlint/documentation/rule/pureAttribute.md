
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Pure Attribute
==============

Makes sure that [@pure](/documentation/attribute/pure.md) code is indeed
[pure](/documentation/glossary/isolation.md).

Example:

```php
<?php

/** @pure */
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
$phlint->enableRule('pureAttribute');

// To disable this rule:
$phlint->disableRule('pureAttribute');
```

Rule source code: [/code/phlint/rule/PureAttribute.php](/code/phlint/rule/PureAttribute.php)
