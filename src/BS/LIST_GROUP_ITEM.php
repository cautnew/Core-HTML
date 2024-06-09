<?php

namespace HTML\BS;

use HTML\A;
use HTML\LI;

class LIST_GROUP_ITEM extends BS
{
  private string $txt;
  private bool $isActive;
  private string $href;

  public function __construct(string $txt, bool $isActive=false, string $href="")
  {
    $this->finalElement = new LI();
    $this->txt = $txt;
    $this->isActive = $isActive;
    $this->href = $href;
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function getTag(): LI
  {
    $this->finalElement->clearClassList();
    $this->finalElement->clearAppendList();
    $this->finalElement->addClass('list-group-item');

    if ($this->isActive) {
      $this->finalElement->addClass('active');
    }

    if (!empty($this->href)) {
      $this->finalElement->append(new A($this->href, $this->txt));
    } else {
      $this->finalElement->append($this->txt);
    }

    return $this->finalElement;
  }
}
