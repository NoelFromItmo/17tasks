
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Declaration Type
================

Reports any undeclared/invalid types specified in declarations.

Example:

```php
<?php

function foo (Bar $bar) {}
```

Analyzing the example code would yield:

```
  ✖ Declaration Type: function foo (Bar $bar) on line 3
    Type `Bar` is undefined.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('declarationType');

// To disable this rule:
$phlint->disableRule('declarationType');

```

Rule source code: [/code/phlint/rule/DeclarationType.php](/code/phlint/rule/DeclarationType.php)
