
Home: [Documentation](/documentation/index.md)

Parent: [Glossary](/documentation/glossary/index.md)


Glossary: Concept
=================

Concept in Phlint has the same fundamental meaning as it does in modern C++. There might be some deviations
in meanings due to practical reasons but regardless of that understanding this term in modern C++ would be
enough to understand its meaning in Phlint.

Resources on Concept:

- [https://en.wikipedia.org/wiki/Concept_(generic_programming)](https://en.wikipedia.org/wiki/Concept_(generic_programming))
- [http://en.cppreference.com/w/cpp/concept](http://en.cppreference.com/w/cpp/concept)
- [http://en.cppreference.com/w/cpp/language/constraints](http://en.cppreference.com/w/cpp/language/constraints)
- [https://dlang.org/concepts.html](https://dlang.org/concepts.html)

Consider the following task: How could the given example be rewritten to be
[strict](https://en.wikipedia.org/wiki/Strict_programming_language) and
[correct](https://en.wikipedia.org/wiki/Correctness_(computer_science))
by using PHP native features?

    <?php

    function myArraySum ($values) {
      $result = 0;
      foreach ($values as $value) {
        $result += $value;
      }
      return $result;
    }

There are two types in PHP that are traversable using `foreach`:
Object that implements the [`Traversable` interface](http://php.net/manual/en/class.traversable.php) and
[array](http://php.net/manual/en/function.array.php).
And unfortunately it is not possible to allow both of them at the same time using
[PHP Type Declarations](http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration).
One possible solution is to define a [concept](/documentation/glossary/concept.md).

    <?php

    /** Concept isTraversable defines anything that can be traversed. */
    function isTraversable ($type) {
      return is_array($type) || ($type instanceof \Traversable);
    }

    function myArraySum ($values) {
      assert(count(func_get_args()) == 1);
      assert(isTraversable($values));
      $result = 0;
      foreach ($values as $value) {
        assert(is_numeric($value));
        $result += $value;
      }
      return $result;
    }

Three `assert` statements were added to the original example assuring that the function will either behave as
expected or throw an `Error`. However there are two flaws to such approach. One is that the throw will happen
only in runtime and therefor the code has to be executed in order to know if it's ok or not. Another is that
we have to add extra asserts that could be added programatically. In other words we can say that the fact
that `$values` are being traversed and that any `$value` is participating in summing operation form an
implicit constraint on the function which can be automatically infered.

That said the following example my be clear by itself:

    <?php

    $x = myArraySum([1, 2]); // Ok as passed argument is of concept integer[]
    $x = myArraySum(["1", 2]); // Ok as passed argument is of concept integer[]
    $x = myArraySum(["a", 2]); // Not ok as passed argument is of concept string[]
    $x = myArraySum("2"); // Not ok as passed argument is of concept integer

    function getSomeValues () {
      $values = [];
      foreach ($GLOBALS['argv'] as $arg) {
      	if (!is_numeric($arg))
      	  throw new \Exception('Numeric input expected.');
      	$values[] = $arg;
      }
      return $values;
    }

    $x = myArraySum(getSomeValues()); // Ok as passed argument is of concept numeric[]

    /** @var numeric[] */
    $a = new ArrayObject();

    $a[] = 1;
    $a[] = "2";

    $x = myArraySum($a); // Ok as passed argument is of concept numeric[]
