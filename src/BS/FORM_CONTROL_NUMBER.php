<?php

namespace Cautnew\HTML\BS;

use Cautnew\HTML\DIV;

class FORM_CONTROL_NUMBER extends FORM_CONTROL
{
  protected string $defaultInputType = 'number';

  public function __construct(string $id, string $name, string $txtLabel, string $txtFormText)
  {
    parent::__construct($id, $name, $txtLabel, $txtFormText);
  }
}
