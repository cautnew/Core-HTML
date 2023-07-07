<?php

namespace Cautnew\HTML\BS;

class COMPONENT_SPINNER_BORDER extends COMPONENT_SPINNER
{
  protected string $spinnerFormat = 'border';

  public function __construct(string $id, ?string $txtVisuallyHidden = null)
  {
    parent::__construct($id, $txtVisuallyHidden);
  }
}
