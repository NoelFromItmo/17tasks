
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Source Syntax
=============

Checking source syntax is not an independent rule like other rules but rather an internal part of
the analysis process. Nevertheless in case of a syntax error a violation will be raised just like
a regular rule would.

Example:

```php
<?php

function f () {
  $x =
}
```

Analyzing the example code would yield:

```
  ✖ Source syntax
    Parse error: Syntax error, unexpected \'}\' on line 4.
```
