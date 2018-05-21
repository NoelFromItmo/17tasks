
Home: [Documentation](/documentation/index.md)

Parent: [Glossary](/documentation/glossary/index.md)


Glossary: Symbol Alias
======================

Symbol alias is a fake "node" that represents just that - an alias of a symbol.

Consider the following example:

```php
function foo ($aClass) {
  $aClass::bar();
}

foo("A");
```

In this example the static method `foo` will be invoked on the class `A`.
But the only way to provide an "alias of a class" to a function in PHP is using a
string - there is not way to explicitly specify a class alias which would be
different from a string. Even using the [::class](https://wiki.php.net/rfc/class_name_scalars)
keyword finally yields a string.

In Phlint there is a [SymbolAlias](/code/phlint/node/SymbolAlias.php) class to amend this
as it makes certain things easier internally.
