<?php

namespace luka8088;

use \ArrayAccess;
use \Closure;
use \Exception;
use \luka8088\Attribute;
use \luka8088\ExtensionCall;
use \luka8088\ExtensionCallOverwrite;
use \ReflectionFunction;
use \RuntimeException;
use \ReflectionMethod;

class ExtensionInterface implements ArrayAccess {

  protected $callInvocationMap = [];
  protected $callInvokerMap = [];

  function register ($extension) {
    if (is_array($extension))
      foreach ($extension as $function_)
        $this->registerCall($function_);
    if (is_string($extension) && class_exists($extension))
      foreach (get_class_methods($extension) as $method)
        $this->registerCall([$extension, $method]);
    if (is_object($extension) && !($extension instanceof Closure))
      foreach (get_class_methods($extension) as $method)
        $this->registerCall([$extension, $method]);
    if (is_object($extension) && ($extension instanceof Closure))
      $this->registerCall($extension);
  }

  function offsetExists ($offset) {
    return array_key_exists($offset, $this->callInvokerMap);
  }

  function offsetGet ($offset) {
    if (!isset($this->callInvokerMap[$offset]))
      throw new RuntimeException('*' . $offset . '* is not a registered extension call.');
    return $this->callInvokerMap[$offset];
  }

  function offsetSet ($offset, $extension) {
    assert($offset === null);
    $this->register($extension);
  }

  function offsetUnset ($offset) {
    assert(false);
  }

  protected $callMap = [];
  protected $callAspectMap = [];
  protected $callAspectOverwrites = [];

  protected function registerCall ($extension) {

    $extensionCallsToRefresh = [];

    foreach (Attribute::get($extension) as $attribute) {
      if (property_exists($attribute, 'extensionCall')) {
        $extensionCall = $attribute->extensionCall;
        $extensionCallsToRefresh[] = $extensionCall;
        $this->ensureInvoker($extensionCall, $extension);
        $this->callMap[$extensionCall][] = $extension;
        $extensionCallId = strpos($extensionCall, '/') !== false ?
          substr($extensionCall, 0, strrpos($extensionCall, '/')) : $extensionCall;
        $extensionCallAspect = strpos($extensionCall, '/') !== false ?
          substr($extensionCall, strrpos($extensionCall, '/') + 1) : '';
        $extensionCallsToRefresh[] = $extensionCallId;
        $this->ensureInvoker($extensionCallId, $extension);
        if ($extensionCallAspect)
          $this->callAspectMap[$extensionCallId][$extensionCallAspect][] = $extension;
      }
      if (property_exists($attribute, 'extensionCallOverwrite')) {
        $extensionCall = $attribute->extensionCallOverwrite;
        $extensionCallsToRefresh[] = $extensionCall;
        $extensionCallId = strpos($extensionCall, '/') !== false ?
          substr($extensionCall, 0, strrpos($extensionCall, '/')) : $extensionCall;
        $extensionCallAspect = strpos($extensionCall, '/') !== false ?
          substr($extensionCall, strrpos($extensionCall, '/') + 1) : '';
        $extensionCallsToRefresh[] = $extensionCallId;
        $this->callAspectOverwrites[$extensionCallId][] = $extensionCallAspect;
        $this->callAspectOverwrites[$extensionCallId] = array_unique($this->callAspectOverwrites[$extensionCallId]);
      }
    }

    foreach (array_unique($extensionCallsToRefresh) as $extensionCall) {

      $this->callInvocationMap[$extensionCall] = [];

      $deferredCallInvocations = [];

      if (isset($this->callMap[$extensionCall]))
        foreach ($this->callMap[$extensionCall] as $extension)
          $this->callInvocationMap[$extensionCall][] = $extension;

      if (isset($this->callAspectMap[$extensionCall]))
        foreach ($this->callAspectMap[$extensionCall] as $extensionCallAspect => $extensions) {
          if (isset($this->callAspectOverwrites[$extensionCall]) &&
              in_array($extensionCallAspect, $this->callAspectOverwrites[$extensionCall]))
            continue;
          foreach ($extensions as $extension) {
            $isDeferred = false;
            foreach (Attribute::get($extension) as $attribute)
              if (property_exists($attribute, 'extensionCallExtends'))
                $isDeferred = true;
            if ($isDeferred)
              $deferredCallInvocations[] = $extension;
            else
              $this->callInvocationMap[$extensionCall][] = $extension;
          }
        }

      foreach ($deferredCallInvocations as $extension)
        $this->callInvocationMap[$extensionCall][] = $extension;

    }

  }

  protected function ensureInvoker ($extensionCall, $extension) {

    if (isset($this->callInvokerMap[$extensionCall]))
      return;

    if (is_array($extension))
      $reflection = new ReflectionMethod($extension[0], $extension[1]);
    else
      $reflection = new ReflectionFunction($extension);

    $callInvocationMap = &$this->callInvocationMap;

    $this->callInvokerMap[$extensionCall] = eval('
      return function ('
          . implode(', ', array_map(function ($parameter) {
              return ($parameter->isPassedByReference() ? '&' : '') . '$' . $parameter->getName();
            }, $reflection->getParameters()))
          . ') use ($extensionCall, &$callInvocationMap) '
          . (method_exists($reflection, 'getReturnType') && $reflection->getReturnType()
            && $reflection->getReturnType()->__toString() ? ': ' . $reflection->getReturnType()->__toString() : '')
          . ' {
        $lastReturnValue = null;
        foreach ($callInvocationMap[$extensionCall] as $extension)
          $lastReturnValue = call_user_func_array($extension, [' . implode(', ', array_map(function ($parameter) {
            return ($parameter->isPassedByReference() ? '&' : '') . '$' . $parameter->getName();
          }, $reflection->getParameters())) . ']);
        return $lastReturnValue;
      };
    ');

  }

  /** @internal @test */
  static function unittest_testSimpleUsage () {

    $extensionInterface = new ExtensionInterface();

    $extensionInterface[] = /** @ExtensionCall("test.a") */ function (&$counter) {};

    $extensionInterface[] = /** @ExtensionCall("test.a") */ function (&$counter) {
      $counter += 1;
    };

    $myCounter = 0;
    $extensionInterface['test.a']($myCounter);
    $extensionInterface['test.a']($myCounter);
    assert($myCounter == 2);

  }

  /** @internal @test */
  static function unittest_testOverwriting () {

    $extensionInterface = new ExtensionInterface();

    $extensionInterface[] = /** @ExtensionCall("test.a") */ function (&$counter) {};

    $extensionInterface[] = /** @ExtensionCall("test.a/default") */ function (&$counter) {
      $counter += 1;
    };

    $extensionInterface[] =
      /**
       * @ExtensionCall("test.a/extra1")
       * @ExtensionCallOverwrite("test.a/default")
       */
      function (&$counter) use ($extensionInterface) {
        $counter += 7;
        $extensionInterface['test.a/default']($counter);
      };

    $extensionInterface[] =
      /**
       * @ExtensionCall("test.a/extra2")
       * @ExtensionCallOverwrite("test.a/extra1")
       */
      function (&$counter) use ($extensionInterface) {
        $counter += 67;
        $extensionInterface['test.a/extra1']($counter);
      };

    $myCounter = 0;
    $extensionInterface['test.a']($myCounter);
    $extensionInterface['test.a']($myCounter);
    assert($myCounter == 150);

  }

}
