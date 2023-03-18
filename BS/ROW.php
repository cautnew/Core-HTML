<?php

namespace Cautnew\HTML\BS;

use Cautnew\HTML\DIV;

class ROW extends BS
{
  public function __construct($append = null)
  {
    $this->finalElement = new DIV('row');

    $this->append($append);
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
