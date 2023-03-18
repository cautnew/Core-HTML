<?php

namespace Cautnew\HTML\BS;

use Cautnew\HTML\DIV;

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