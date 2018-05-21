<?php

namespace luka8088;

class PrimitiveAttribute {

  public $name = '';
  public $arguments = [];

  function __construct ($name, $arguments) {
    $this->name = $name;
    $this->arguments = $arguments;
  }

}
