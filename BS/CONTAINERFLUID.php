<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;

class CONTAINERFLUID extends BS
{
  public function __construct()
  {
    $this->finalElement = new DIV('container-fluid');
  }

  public function getTag()
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass("container-fluid");

    return $this->finalElement;
  }
}
