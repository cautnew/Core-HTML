<?php

namespace HTML\BS;

use HTML\LABEL;

class FORM_LABEL extends BS
{
  public function __construct()
  {
    $this->finalElement = new LABEL();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function getTag(): LABEL
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass("form-label");

    return $this->finalElement;
  }
}