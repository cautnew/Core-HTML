<?php

namespace HTML\BS;

use HTML\A;
use HTML\OL;

class BREADCRUMB extends BS
{
  public function __construct()
  {
    $this->finalElement = new OL('breadcrumb');
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function render(): self
  {
    $this->getFinalElement()->clearClassList();
    $this->getFinalElement()->addClass('breadcrumb');

    return $this;
  }

  public function addItem(BREADCRUMB_ITEM | BREADCRUMB_ITEMS_LIST $item): self
  {
    $this->getFinalElement()->append($item->getTag());

    return $this;
  }
}
