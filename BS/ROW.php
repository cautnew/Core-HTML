<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;

class ROW extends BS
{
  public function __construct($append = null)
  {
    $this->finalElement = new DIV('row');

    if ($append !== null) {
      $this->finalElement->append($append);
    }
  }

  public function getTag()
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass("row");

    return $this->finalElement;
  }
}
