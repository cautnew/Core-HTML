<?php

namespace HTML\BS;

class FORM_CONTROL_NUMBER extends FORM_CONTROL
{
  protected string $defaultInputType = 'number';

  public function __construct(string $id, string $name, string $txtLabel, ?string $txtFormText = null)
  {
    parent::__construct($id, $name, $txtLabel, $txtFormText);
  }
}
