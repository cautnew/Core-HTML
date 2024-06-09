<?php

namespace HTML\BS;

class COMPONENT_SPINNER_GROW extends COMPONENT_SPINNER
{
  protected string $spinnerFormat = 'grow';

  public function __construct(string $id, bool $indSmall = false, ?string $aditionalClasses = null, ?string $txtVisuallyHidden = null)
  {
    parent::__construct($id, $indSmall, $aditionalClasses, $txtVisuallyHidden);
  }

  public function setSpinnerFormat(string $spinnerFormat = 'grow'): self
  {
    $this->spinnerFormat = $spinnerFormat;

    return $this;
  }
}
