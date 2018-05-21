
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Exit Construct
==============

`exit` in PHP is a language construct described in
[http://php.net/manual/en/function.exit.php](http://php.net/manual/en/function.exit.php).
It immediately halts the script not rolling up the execution stack. It has some use cases in very specific edge cases
but in general using it might be regarded as a bad practice. This rule disallows usage of `exit` or its alias `die`.

Example:

```php
<?php

function foo () {
  exit;
}

try {
  foo();
} finally {
  // This line will never be executed.
  // Using `throw` instead of `exit` might be a better idea.
}
```

Analyzing the example code would yield:

```
  ✖ Exit Construct: exit on line 4
    Using `exit` is not allowed.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('exitConstruct');

// To disable this rule:
$phlint->disableRule('exitConstruct');

```

Rule source code: [/code/phlint/rule/ExitConstruct.php](/code/phlint/rule/ExitConstruct.php)
