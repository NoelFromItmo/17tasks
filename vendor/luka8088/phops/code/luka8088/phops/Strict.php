<?php

namespace luka8088\phops;

use \ErrorException;

class Strict {

  /**
   * Initialize a strict mode where all notices/warnings/errors get thrown and stop further
   * execution.
   *
   * This function is also production-safe if a custom callable is passed on as
   * a `$handler`. In that case the `\Throwable` will be passed on to the `$handler`
   * and program execution will continue instead of printing the `\Throwable` and
   * terminating the program.
   */
  static function initialize ($handler = null) {

    $throwableHandler = function ($exception) use ($handler) {
      if ($handler) {
        $handler($exception);
        return;
      }
      $stderr = fopen('php://stderr', 'w');
      fwrite($stderr, ((string) $exception) . "\n");
      error_clear_last();
      if (php_sapi_name() != 'cli' && isset($_SERVER['SERVER_PROTOCOL'])) {
        echo ((string) $exception) . "\n";
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
      }
      exit(1);
    };

    $errorHandler = function ($errno, $errstr, $errfile, $errline) use ($throwableHandler) {
      $throwableHandler(new ErrorException($errstr, 0, $errno, $errfile, $errline));
    };

    $shutdownHandler = function () use ($errorHandler) {

      $error = error_get_last();

      if (!$error)
        return;

      /**
       * If error_get_last()['message'] is empty then we assume there is no error.
       *
       * This is a fix for error_clear_last() not been introduced prior to PHP7.
       * This condition will be obsolete when we migrate to PHP7 and can be removed then.
       */
      if ($error['message'] == '')
        return;

      /**
       * An alternative solution as an empty message.
       */
      if ($error['message'] == 'Undefined variable: undefinedVariable')
        return;

      $errorHandler($error['type'], $error['message'], $error['file'], $error['line']);

    };

    set_exception_handler($throwableHandler);
    set_error_handler($errorHandler);
    register_shutdown_function($shutdownHandler);

  }

}

/**
 * Fix for PHP 5 not supporting error clearing.
 */
if (!function_exists('error_clear_last')) {
  function error_clear_last () {
    static $handler;
    if (!$handler)
      $handler = function () { return false; };
    set_error_handler($handler);
    @trigger_error('');
    restore_error_handler();
  }
}
