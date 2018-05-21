<?php

namespace phlint\constraint;

class GreaterThan {

  public $value = 0;

  function __construct ($value = 0) {
    $this->value = $value;
  }

}
