<?php

namespace Cautnew\HTML\BS;

class COMPONENT_SPINNER_GROW extends COMPONENT_SPINNER
{
  protected string $spinnerFormat = 'grow';

  public function __construct(string $id, ?string $txtVisuallyHidden = null)
  {
    parent::__construct($id, $txtVisuallyHidden);
  }

  public function setSpinnerFormat(string $spinnerFormat = 'grow'): self
  {
    $this->spinnerFormat = $spinnerFormat;

    return $this;
  }
}
