<?php

namespace phif;

class Parser {

  static function parse ($source) {
    $parserFactory = new \PhpParser\ParserFactory();
    $parser = $parserFactory->create(\PhpParser\ParserFactory::PREFER_PHP7);
    return $parser->parse(preg_replace('/(?is)\A\<\?(?=[ \t\r\n])/', '<?php', $source));
  }

}
