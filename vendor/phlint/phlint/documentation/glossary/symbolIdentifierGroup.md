
Home: [Documentation](/documentation/index.md)

Parent: [Glossary](/documentation/glossary/index.md)


Glossary: Symbol Identifier Group
=================================

Since naming collision rules in PHP allow for the same name to be used for different
[constructs](https://en.wikipedia.org/wiki/Language_construct)
a "Symbol Identifier Group" has been added to Phlint to help in such situations.
[Symbols](/documentation/glossary/symbol.md) in Phlint are identified by
their name and group.

To visualize this consider the following example (which is acceptable by PHP):

    <?php

    $a = 0; // Fully qualified name: \a

    namespace a { // Fully qualified name: \a
      function b () {} // Fully qualified name: \a\b
      class b {} // Fully qualified name: \a\b
      interface i {} // Fully qualified name: \a\i
      trait t {} // Fully qualified name: \a\t
      $a = 0; // Fully qualified name: \a\a
      $b = 0; // Fully qualified name: \a\b
    }

    namespace a\b { // Fully qualified name: \a\b
      function x () {} // Fully qualified name: \a\b\x
    }

    namespace a\i { // Fully qualified name: \a\i
      function x () {} // Fully qualified name: \a\i\x
    }

    namespace a\t { // Fully qualified name: \a\t
      function x () {} // Fully qualified name: \a\t\x
    }

    function foo () : int {} // Return type fully qualified name: \int

Based on the PHP behavior the following groups were introduced:

- Class - includes classes, interfaces and traits
- Constant
- Function
- Namespace
- Type
- Variable

PHP behavior is due to its internal design - different constructs are stored in different tables
(variable table, function table and class table) and it does not check for duplicates in other
tables. Phlint however stores all [symbols](/documentation/glossary/symbol.md) in the same
table.

The need for grouping is not solely because Phlint stores everything in the same table - grouping
also solves some ambiguity difficulties. Consider the situation in which there is a function `x`
and a class `x`. When doing an operation on `x` it can't be determined solely based on the name `x`
if the operation is being done on a function or on a class. Even if definitions are being looked up
there would be an ambiguity as both exist.

The reason classes, interfaces and traits are in the same group is that they are in the
same group (table) in PHP as shown in the following example.

    <?php

    class A {} // Ok
    class A {} // PHP Fatal error: Cannot declare class A, because the name is already in use.
    interface A {} // PHP Fatal error: Cannot declare interface A, because the name is already in use.
    trait A {} // PHP Fatal error: Cannot declare trait A, because the name is already in use.

    function A () {} // Ok
    function A () {} // PHP Fatal error: Cannot redeclare A()

The reason type group exists is to be able to reference build-in types in the same way type hinting
for classes is referenced.
