
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

PHPDoc
======

Reports invalid phpDoc entries or any phpDoc entries referencing invalid/undeclared types.

Example:

```php
<?php

/**
 * @param $bar
 * @return Baz
 */
function foo ($bar) {}
```

Analyzing the example code would yield:

```
  ✖ PHPDoc: @param $bar on line 4
    PHPDoc is not valid without a type.

  ✖ PHPDoc: @return Baz on line 5
    PHPDoc `@return Baz` declared with the type `Baz`.
    Type `Baz` is not declared.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('phpDoc');

// To disable this rule:
$phlint->disableRule('phpDoc');

```

Rule source code: [/code/phlint/rule/PHPDoc.php](/code/phlint/rule/PHPDoc.php)
