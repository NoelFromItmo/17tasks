
Phops - PHP Core Library Extensions
=======================================


Introduction
------------

Phops is a set of functionalities missing from the PHP core library that might, subjectively, belong there.


Basic usage
-----------

Phops can be included in the project through composer:

```bash
composer require luka8088/phops
```


Functions
---------


### Convert::to

```php
\luka8088\phops\Convert::to(string $type, $value)
```

Converts a `$value` of any type to a value of type `$type`. If passed in value cannot be converted to a
value of type `$type` without data loss then a `RuntimeException` is thrown.


### Convert::toBool

```php
\luka8088\phops\Convert::toBool($value) : bool
```

Converts a value to `bool`. If passed in value cannot be converted to `bool` without data loss
then a `RuntimeException` is thrown.


### Convert::toFloat

```php
\luka8088\phops\Convert::toFloat($value) : float
```

Converts a value to `float`. If passed in value cannot be converted to `float` without data loss
then a `RuntimeException` is thrown.


### Convert::toInt

```php
\luka8088\phops\Convert::toInt($value) : int
```

Converts a value to `int`. If passed in value cannot be converted to `int` without data loss
then a `RuntimeException` is thrown.


### Convert::toString

```php
\luka8088\phops\Convert::toString($value) : string
```

Converts a value to `string`. If passed in value cannot be converted to `string` without data loss
then a `RuntimeException` is thrown.


### DestructCallback::create

```php
\luka8088\phops\DestructCallback::create(callable $callback) : self
```

Provides a way to tie a resource lifetime to a current execution scope.
The aim is to prove a way to achieve functionality described
on http://dlang.org/statement.html#ScopeGuardStatement

Example usage:

```php
function foo () {
  $_byeBye = DestructCallback::create(function () { echo "Bye-bye.\n"; });
  echo "Hello world\n";
}
```

Returns an object which will execute the provided callback once destructed
and if assigned to a scope variable it will get garbage collected at
the end of scope. Assigning to a scoped variable is necessary as otherwise
the destruction happens immediately. Also on the other hand if there are
any other references created destruction will be deferred after the end
of scope.


### MetaContext::enterDestructible

```php
\luka8088\phops\MetaContext::enterDestructible(string $type, $value)
```

Enter a new meta-context for the type `$type` by pushing a value of the type `$type`
onto a stack which will last until it is destructed by the garbage collector.

Consider the following example:

```php

class A {

  protected $num;

  function __construct ($num) {
    $this->num = $num;
  }

  function foo ($num) {
    return $this->bar($num);
  }

  function bar ($num) {
    return $this->num + $num;
  }

}

$a = new A(1);
$a->foo(2);

```

When interpreted, this example is effectively rewritten into something like:

```php

class A {
  protected $num;
}

function A___construct (A $a, $num) {
  $a->num = $num;
}

function A_foo (A $a, $num) {
  return A_bar($a, $num);
}

function A_bar (A $a, $num) {
  return $a->num + $num;
}

$a = new A();
A___construct($a, 1);
A_foo($a, 2);

```

In short such rewrite happens as functions are separated from the data and not duplicated
when a new object is initialized. Instead the object is passed into a function as a
hidden parameter.

Now consider a similar example with the meta-context:

```php

class A {
  protected $num;
}

function foo () {
  $aMetaContext = MetaContext::enterDestructible(A::class, new A());
  bar();
}

function bar () {
  baz();
}

function baz () {
  $a = MetaContext::get(A::class);
}

```

When `foo` is called it initializes `A` and enters a meta-context for it
making it accessible for all subsequent calls and then closing it when exiting
`foo`.


### MetaContext::exists
```php
\luka8088\phops\MetaContext::exists(string $type) : bool
```

Checks if the meta-context is initialized for the given type.


### MetaContext::get

```php
\luka8088\phops\MetaContext::get(string $type)
```

Gets the meta-context for the given type.


### Strict::initialize

```php
\luka8088\phops\Strict::initialize(callable $handler = null)
```

Makes PHP strict but converting all notices/warnings/errors into `ErrorException`.
If a handler is provided it will be called with the `Throwable` in the
argument. That would also make it production-safe and can be used for logging.
If no handler is provided the `Throwable` will be thrown.


License
-------

Phops is licensed under the [MIT license](/license.txt).
