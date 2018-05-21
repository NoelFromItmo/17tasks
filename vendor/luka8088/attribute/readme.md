
Attributes for PHP
==================


Introduction
------------

Attributes (or sometimes called Annotations) library for PHP.

Related:
- https://wiki.php.net/rfc/annotations
- https://wiki.php.net/rfc/annotations-in-docblock
- https://wiki.php.net/rfc/reflection_doccomment_annotations
- https://wiki.php.net/rfc/attributes


Basic usage
-----------

Attributes can be included in the project through composer:

    # To install run:
    composer require luka8088/attribute

Example usage:

    namespace a {

      class MyAttribute {

        public $param1 = '';
        public $param2 = 0;

        function __construct ($param1 = '', $param2 = 0) {
          $this->param1 = $param1;
          $this->param2 = $param2;
        }

      }

    }

    namespace b {

      use \a\MyAttribute as myAlias;

      /**
       * @myAlias("param1")
       */
      class A {

        /**
         * @myAlias("param1", 2)
         */
        function myMethod () {
          // ...
        }

      }

    }

    namespace c {

      use \luka8088\Attribute;
      use \b\A;

      $myA = new A();

      // Read symbol attributes:
      var_dump(Attribute::get($myA));

      // Outputs:
      #  array(1) {
      #    [0]=>
      #    object(a\MyAttribute)#9 (2) {
      #      ["param1"]=>
      #      string(6) "param1"
      #      ["param2"]=>
      #      int(0)
      #    }
      #  }

      // Read symbol attributes:
      var_dump(Attribute::get([$myA, 'myMethod']));

      // Outputs:
      #  array(1) {
      #    [0]=>
      #    object(a\MyAttribute)#13 (2) {
      #      ["param1"]=>
      #      string(6) "param1"
      #      ["param2"]=>
      #      int(2)
      #    }
      #  }

    }


Documentation
-------------

For a contribution guidelines visit [Contributing guidelines page](/contributing.md).


License
-------

Attributes for PHP is licensed under the [MIT license](/license.txt).
