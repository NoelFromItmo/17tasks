<?php

namespace phlint;

class Output {

  protected $indentation = 0;

  protected $sink = null;

  function __construct ($sink = STDOUT) {
    $this->sink = $sink;
  }

  function __invoke ($data) {
    if (!$this->sink)
      return;
    fwrite($this->sink, str_replace("\n", "\n" . str_repeat(' ', $this->indentation * 2), $data));
  }

  function indent () {
    $this->indentation += 1;
  }

  function unindent () {
    $this->indentation -= 1;
  }

}
