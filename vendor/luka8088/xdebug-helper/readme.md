
Xdebug Helper
=============


Introduction
------------

Xdebug Helper to provide some useful functionally that is not available with Xdebug by default.


Basic usage
-----------

Xdebug  can be included in the project through composer:

```bash
composer require luka8088/xdebug-helper
```


Functions
---------


### \luka8088\XdebugHelper::disable()

Restarts the current process with Xdebug disabled.

Xdebug being enabled has a significant performance implications and due to the way it hooks into PHP there
is no way to disable it during runtime. The only known way to disable it at the moment is to restart the
PHP process with an altered ini file which excludes Xdebug - which this function does.

To use this function call it at the beginning of the script.


### \luka8088\XdebugHelper::iniFileWithoutXdebug()

Returns a path to an INI file with currently loaded INI directives excluding Xdebug.


Documentation
-------------

For a contribution guidelines visit [Contributing guidelines page](/contributing.md).


License
-------

Xdebug Helper is licensed under the [MIT license](/license.txt).
