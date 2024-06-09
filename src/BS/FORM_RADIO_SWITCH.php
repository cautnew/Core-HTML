<?php

namespace HTML\BS;

use HTML\DIV;

class FORM_RADIO_SWITCH extends FORM_RADIO
{
  public function __construct(string $id, string $name, string $txtLabel)
  {
    parent::__construct($id, $name, $txtLabel);
  }

  public function setFormCheck(DIV $formradio): DIV
  {
    $this->formradio = $formradio;
    $this->formradio->addClass('form-check form-switch');

    return $this->formradio;
  }
}
