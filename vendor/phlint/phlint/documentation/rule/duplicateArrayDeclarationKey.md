
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Duplicate Array Declaration Key
===============================

This rules is disallows the array declarations to have duplicate keys because in PHP they silently overwrite
each other causing sometimes unexpected behavior. This behavior is documented on
[http://php.net/manual/en/language.types.array.php#example-57](http://php.net/manual/en/language.types.array.php#example-57).

Example:

```php
<?php

$foo = [
  "bar" => 1,
  "bar" => 2,
  1 => 3,
  1.9 => 4,
];
```

Analyzing the example code would yield:

```
  ✖ Duplicate Array Declaration Key: "bar" on line 5
    Array contains multiple entries with the key `"bar"`.

  ✖ Duplicate Array Declaration Key: 1.9 on line 7
    Array contains multiple entries with the key `1`.
```

Rule configuration:

```php
// To enable this rule:
$phlint->enableRule('duplicateArrayDeclarationKey');

// To disable this rule:
$phlint->disableRule('duplicateArrayDeclarationKey');
```

Rule source code: [/code/phlint/rule/DuplicateArrayDeclarationKey.php](/code/phlint/rule/DuplicateArrayDeclarationKey.php)
