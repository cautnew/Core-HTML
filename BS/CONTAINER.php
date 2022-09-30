<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;
use Core\HTML\TAG;

class CONTAINER extends BS
{
  public function __construct($append = null)
  {
    $this->finalElement = new DIV('container');

    $this->append($append);
  }

  public function getTag()
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass("container");

    return $this->finalElement;
  }

  public function print(): void
  {
    $this->getTag()->print();
  }
}
