<?php

namespace phlint\constraint;

class LessThan {

  public $value = 0;

  function __construct ($value = 0) {
    $this->value = $value;
  }

}
