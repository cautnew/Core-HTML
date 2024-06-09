<?php

namespace HTML\BS;

use HTML\A;
use HTML\UL;

class LIST_GROUP extends BS
{
  protected UL $finalElement;

  public function __construct()
  {
    $this->finalElement = new UL();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function getTag(): UL
  {
    $this->finalElement->clearClassList();
    $this->finalElement->addClass('list-group');

    return $this->finalElement;
  }

  public function addItem(LIST_GROUP_ITEM $item): self
  {
    $this->finalElement->append($item->getTag());

    return $this;
  }
}
