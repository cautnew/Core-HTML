<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;

class LABEL extends BS
{
  public function __construct()
  {
    $this->finalElement = new DIV('row');
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function getTag()
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass("row");

    return $this->finalElement;
  }
}