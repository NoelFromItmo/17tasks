<?php

namespace luka8088;

class XdebugHelper {

  /**
   * Xdebug being enabled has a significant performance implications and
   * due to the way it hooks into PHP there is no way to disable it during
   * runtime.
   * The only known way to disable it at the moment is to restart the
   * PHP process with an altered ini file which excludes Xdebug - which
   * this function does.
   *
   * @return void
   */
  static function disable () {

    if (getenv('xdebugDisableAttemptMade')) {
      putenv('PHP_INI_SCAN_DIR' . (getenv('PHP_INI_SCAN_DIR_BACKUP') ? '=' . getenv('PHP_INI_SCAN_DIR_BACKUP') : ''));
      putenv('PHP_INI_SCAN_DIR_BACKUP');
      putenv('xdebugDisableAttemptMade');
      return;
    }

    if (!in_array('xdebug', array_map(function ($name) { return strtolower($name); }, get_loaded_extensions(true))))
      return;

    /**
     * For some reason the combination of both OPCache and Xdebug being enabled
     * causes an error in the sub-process making it exit immediately with an error code.
     * One guess is that it might have something to do with accessing the shared
     * cache at the same time with two processes where one has Xdebug enabled and
     * other does not.
     * Reseting OPCache at this point addresses that issue.
     */
    if (function_exists('opcache_reset'))
      opcache_reset();

    $process = proc_open(
      (PHP_BINARY ? PHP_BINARY : PHP_BINDIR . '/php')
      . (PHP_SAPI == 'phpdbg' ? ' -qrr' : '')
      . ' ' . '-c ' . (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'
        ? '"' . addcslashes(self::iniFileWithoutXdebug(), '\\"') . '"'
        : escapeshellarg(self::iniFileWithoutXdebug()))
      . ' ' . (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'
        ? '"' . addcslashes(debug_backtrace()[0]['file'], '\\"') . '"'
        : escapeshellarg(debug_backtrace()[0]['file']))
      . (isset($GLOBALS['argv']) ? ' ' . implode(' ', array_slice($GLOBALS['argv'], 1)) : ''),
      [
        0 => fopen('php://stdin', 'r'),
        1 => http_response_code() ? ['pipe', 'w'] : fopen('php://stdout', 'w'),
        2 => fopen('php://stderr', 'w'),
      ],
      $pipes,
      null,
      array_filter(XdebugHelper::getEnvironmentVariables() + [
        'PHP_INI_SCAN_DIR' => '/dev/null',
        'PHP_INI_SCAN_DIR_BACKUP' => getenv('PHP_INI_SCAN_DIR'),
        'xdebugDisableAttemptMade' => '1',
      ], function ($value) { return !is_array($value); })
    );

    if (isset($pipes[1]))
      while (!feof($pipes[1]))
        echo fread($pipes[1], 1024);

    $exitCode = proc_close($process);

    exit($exitCode);

  }

  /**
   * @return string Path to an INI file with currently loaded INI directives excluding Xdebug.
   */
  static function iniFileWithoutXdebug () {

    static $alteredINIFile = null;

    if (!$alteredINIFile) {
      $alteredINIFile = tmpfile();
      fwrite($alteredINIFile, self::removeFromINI(self::loadedINI()));
    }

    $alteredINIFileInfo = stream_get_meta_data($alteredINIFile);

    return $alteredINIFileInfo['uri'];

  }

  /**
   * Remove Xdebug entry from an INI file.
   *
   * @internal
   *
   * @param string $iniContents Contents of INI file to remove Xdebug from.
   * @return string Contents of INI file without Xdebug entry.
   */
  static function removeFromINI ($iniContents) {
    /**
     * Examples:
     *   zend_extension=/usr/lib64/php/modules/xdebug.so
     *   zend_extension=php_xdebug.dll
     *   zend_extension = 'C:\php\ext\php_xdebug-2.5.5-7.1-vc14-x86_64.dll'
     */
    return preg_replace(
      '/(?s)(\A|(?<=\n))[ \t]*zend_extension[ \t]*\=[ \t]*[^\n]*?xdebug[^\n]*(\r?\n)?/',
      '',
      $iniContents
    );
  }

  /** @test @internal */
  static function test_removeFromINI () {
    assert(self::removeFromINI('
      zend_extension=php_opcache.dll
      zend_extension=php_xdebug.dll
    ') == '
      zend_extension=php_opcache.dll
    ');
    assert(self::removeFromINI('
      zend_extension=php_opcache.dll
      zend_extension=/usr/lib64/php/modules/xdebug.so
    ') == '
      zend_extension=php_opcache.dll
    ');
    assert(self::removeFromINI('
      zend_extension=php_opcache.dll
      zend_extension = \'C:\php\ext\php_xdebug-2.5.5-7.1-vc14-x86_64.dll\'
    ') == '
      zend_extension=php_opcache.dll
    ');
  }

  /**
   * @internal
   *
   * @return string The contents of all currently loaded INI files.
   */
  static function loadedINI () {

    $loadedINIFiles = [];

    if (is_file(php_ini_loaded_file()))
      $loadedINIFiles[] = php_ini_loaded_file();

    if (php_ini_scanned_files())
      foreach (preg_split('/(?s)[ \t\r\n]*,[ \t\r\n]*/', php_ini_scanned_files()) as $loadedINIFile)
        if (is_file(trim($loadedINIFile)))
          $loadedINIFiles[] = trim($loadedINIFile);

    return implode("\n", array_map('file_get_contents', $loadedINIFiles));

  }

  /**
   * @internal
   *
   * @return string[] Current environment variables as an associative array.
   */
  static function getEnvironmentVariables () {

    if (PHP_VERSION_ID >= 70100)
      return getenv();

    $environmentVariables = $_SERVER;

    ob_start();
    phpinfo(INFO_ENVIRONMENT);
    $phpinfo = ob_get_clean();
    preg_match_all('/(?s)\<td class\=\"e\"\>([^\>]+)\<\/td\>/', $phpinfo, $matches);

    foreach ($matches[1] as $environmentVariable)
      $environmentVariables[trim($environmentVariable)] = getenv(trim($environmentVariable));

    return $environmentVariables;

  }

}
