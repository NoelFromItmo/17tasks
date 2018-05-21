
Home: [Documentation](/documentation/index.md)

Parent: [Glossary](/documentation/glossary/index.md)


Glossary: Scope
===============

Two overlapping terms can easily be confusing - `scope` and `context`.
Contexts are isolated (and they form a new isolated scope)
while other scopes are not isolated.

For example:

```php
function x () {
  $y = 0;
  if (rand(0, 1)) {
    $y = 2;
  }
}
```

In the example function `x` forms it's own context and variables cannot be
implicitly referenced outside of the function.
On the other hand, `if` forms it's own scope but it's not isolated
and referencing variables that are outside of it can be referenced.
Technically in PHP `if` doesn't actually form a new scope, and
any initialization/referencing works in the exact same way as it would
if the `if` would not be there. Even so these two have been split up
here on purpose as some analyses require it.
