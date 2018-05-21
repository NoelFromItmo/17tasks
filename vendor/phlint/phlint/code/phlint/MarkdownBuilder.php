<?php

namespace phlint;

class MarkdownBuilder {

  static function inlineCode ($code) {
    if (strpos($code, '`') !== false)
      return '``' . $code . '``';
    return '`' . $code . '`';
  }

}
