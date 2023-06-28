<?php

namespace Cautnew\HTML\BS;

use Cautnew\HTML\DIV;

class FORM_RADIO_SWITCH extends FORM_RADIO
{
  public function __construct(string $id, string $name, string $txtLabel)
  {
    parent::__construct($id, $name, $txtLabel);
  }

  public function setFormCheck(DIV $formradio): DIV
  {
    $this->formradio = $formradio;
    $this->formradio->addClass('form-check form-check-switch');

    return $this->formradio;
  }
}
