
Home: [Documentation](/documentation/index.md)


Why Phlint?
===========

As there are already many code analysis tools the question that arises a lot is "Why yet another one?".
The reason is because there are not so many analyzers like Phlint for PHP - Phlint is focused from
day one on very deep analysis rather then stylistically analysis. This means that Phlint tries to
find out what would happen if certain execution paths would take place.

For example:

```php
<?php

class GreetingFactory {
  static function createGreeter () {

    /** Quick fix for a special greeting message on Sundays. */
    if (date("l") == "Sunday")
      return new SundayGreeter();

    return new Greeter();
  }
}

class Greeter {
  function greet ($whom) {
    echo "Hello " . $whom->getFirstName();
  }
}

class SundayGreeter {
  function greet ($whom) {
    echo "Hello " . $whom . ", have a great day!";
  }
}

class UserRepository {
  function getRandomUser () {
    if (rand(0, 1))
      return "Luka";
    else
      return new User();
  }
}

class User {
  function getFirstName () {
    return "Luka";
  }
}

class PlanetRepository {}

$greeter = GreetingFactory::createGreeter();
$user = (rand(0, 1) ? new UserRepository() : new PlanetRepository())->getRandomUser();

$greeter->greet($user);
```

When run, Phlint finds the following issues:

```bash
# This issue is found due to it is possible that in some cases
# `PlanetRepository::getRandomUser()` is being called which does not exist.
Unable to invoke undefined *PlanetRepository::getRandomUser* for the expression
  *(rand(0, 1) ? new UserRepository() : new PlanetRepository())->getRandomUser()* on line 44.

# It seems that someone did a quick-fix by adding a special `SundayGreeter`.
# However this new greeter is not using `$whom` in a correct way by concatenating
# a string with an object that is not convertible to string.
Provided variable *$whom* of type *User* is not compatible in the expression
    *"Hello " . $whom* on line 22.
  Trace #1: Method *function greet(string|User $whom)* specialized
    for the expression *$greeter->greet($user)* on line 46.

# In case `getRandomUser` on line 44 returns a `string` it will be passed on
# to the method `greet` on line 46. Since `$greeter` on line 46 might be either
# a `Greeter` or `PoliteGreeter` both cases need to be considered.
# Passing in a `string` to `PoliteGreeter::greet` will cause no issues but
# passing in the same to `Greeter::greet` will cause an attempt of a method
# call on string.
Unable to invoke undefined *string::getFirstName*
    for the expression *$whom->getFirstName()* on line 16.
  Trace #1: Method *function greet(string|User $whom)* specialized
    for the expression *$greeter->greet($user)* on line 46.
```

As this example points out Phlint is focused on problems that break code rather than problems of readability.
That does not mean that readability should be neglected, but rather that there are indeed enough such tools
out there.
