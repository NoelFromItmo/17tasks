
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Import Usage
============

Importing is PHP language feature described in [http://php.net/manual/en/language.namespaces.importing.php](http://php.net/manual/en/language.namespaces.importing.php).
This rule disallows import (use) statements that are not being used. Having import statements that are not being used
has no negative functional side effects - the only negative side effect is having a piece of code that is not being
used which might be misleading for a programmer who might think that it is used.

Example:

```php
<?php

use \B;

class A {}

$x = new A();
```

Analyzing the example code would yield:

```
  ✖ Import Usage: B on line 3
    Import `B` is not used.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('importUsage');

// To disable this rule:
$phlint->disableRule('importUsage');
```

Rule source code: [/code/phlint/rule/ImportUsage.php](/code/phlint/rule/ImportUsage.php)
