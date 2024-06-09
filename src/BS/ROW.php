<?php

namespace HTML\BS;

use HTML\TAG;
use HTML\DIV;

class ROW extends BS
{
  public function __construct(TAG|array $append = null)
  {
    $this->finalElement = new DIV();
    $this->append($append);
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function getTag(): DIV
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass("row");

    return $this->finalElement;
  }
}
