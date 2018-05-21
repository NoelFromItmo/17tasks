<?php

namespace phlint\data;

class Value {

  public $constraints = [];
  public $name = '';

  function __construct ($constraints, $name = '') {
    $this->constraints = $constraints;
    $this->name = $name;
  }

}
