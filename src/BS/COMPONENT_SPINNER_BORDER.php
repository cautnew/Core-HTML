<?php

namespace HTML\BS;

class COMPONENT_SPINNER_BORDER extends COMPONENT_SPINNER
{
  protected string $spinnerFormat = 'border';

  public function __construct(string $id, bool $indSmall = false, ?string $aditionalClasses = null, ?string $txtVisuallyHidden = null)
  {
    parent::__construct($id, $indSmall, $aditionalClasses, $txtVisuallyHidden);
  }
}
