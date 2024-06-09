<?php

namespace HTML\BS;

use ArrayObject;

class BREADCRUMB_ITEMS_LIST extends ArrayObject
{
  public function __construct(array $data = [])
  {
    parent::__construct($data);
  }

  /**
   * @param BREADCRUMB_ITEM $item
   */
  public function append($item): void
  {
    if (!($item instanceof BREADCRUMB_ITEM)) {
      throw new \InvalidArgumentException('Only BREADCRUMB_ITEM can be added to BREADCRUMB_ITEMS_LIST');
    }

    parent::append($item);
  }

  public function addItem(BREADCRUMB_ITEM $item): self
  {
    $this->append($item);

    return $this;
  }
}
