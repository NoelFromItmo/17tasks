Extension Interface (for PHP)
=============================

Introduction
------------

Extension Interface provides a fairly simple way to add extension/plug-in/add-on
(extension in further text) ability to applications.
It accepts a blueprint based on which a middleware is generated.

Installation
------------

Extension Interface can be included in the project through composer:

    composer require luka8088/extension-interface

Basic Usage
-----------

Initialization of extension interface needs to be done with a blueprint. A blueprint
provides definitions of calls the application is going to make a as such the definitions
that extension needs to implement in order to properly implement those calls.

`\luka8088\ExtensionCall('callIdentifier')` attribute defines the extension call identifier.
Call identifiers are may be (and depending on the application structure in some
cases should be) namespaced to avoid naming conflicts.

    # app.php

    $blueprint = [
      'myAppEvent' =>
        /**
         * @\luka8088\ExtensionCall('myApp.myEvent')
         * @param string $param1 Event ID
         */
        function ($param1) {},
      'myAppHook' =>
        /**
         * @\luka8088\ExtensionCall('myApp.myHook')
         * @param string $param1 Hook ID
         */
        function ($param1) {},
    ];

    $myExtensionInterface = new \luka8088\ExtensionInterface($blueprint);

Once initialized the application can make extension calls against the extension interface directly.
Making calls is valid regardless if any extension is bound to them and furthermore the application
should function properly regardless of number of extensions/plug-ins/add-ons being present.

    $myExtensionInterface->myAppEvent('event1');
    $myExtensionInterface->myAppHook('hook1');

Once in place an extension can be added to the application be registering it against the
extension interface. Extension can be a function, a closure, a class or an object.
Which call it is being bound to is determined solely based on extension call identifier.

    $myExtensionInterface[] = /** @\luka8088\ExtensionCall('myApp.myEvent') */ function ($param1) {
      // ...
    };

    $myExtensionInterface[] = new class {
      /** @\luka8088\ExtensionCall('myApp.myHook') */
      function listenForMyHook ($param1) {
        // ...
      }
    };

License
-------

Extension Interface (for PHP) is licensed under the [MIT license](/license.txt).
