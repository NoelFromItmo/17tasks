<?php

namespace phlint\node;

/**
 * @see /documentation/glossary/symbolAlias.md
 */
class SymbolAlias {

  public $id = '';
  public $phpID = '';

  function __construct ($id, $phpID = '') {
    $this->id = $id;
    $this->phpID = $phpID;
  }

}
