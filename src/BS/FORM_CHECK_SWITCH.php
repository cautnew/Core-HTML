<?php

namespace Cautnew\HTML\BS;

use Cautnew\HTML\DIV;

class FORM_CHECK_SWITCH extends FORM_CHECK
{
  public function __construct(string $id, string $name, string $txtLabel)
  {
    parent::__construct($id, $name, $txtLabel);
  }

  public function setFormCheck(DIV $formcheck): DIV
  {
    $this->formcheck = $formcheck;
    $this->formcheck->addClass('form-check form-switch');

    return $this->formcheck;
  }
}
