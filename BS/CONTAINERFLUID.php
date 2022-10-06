<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;

class CONTAINERFLUID extends BS
{
  public function __construct($append = null)
  {
    $this->finalElement = new DIV('container-fluid');

    $this->append($append);
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function getTag()
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass("container-fluid");

    return $this->finalElement;
  }

  public function print(): void
  {
    $this->getTag()->print();
  }
}
