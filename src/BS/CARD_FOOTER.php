<?php

namespace HTML\BS;

use HTML\DIV;

class CARD_FOOTER extends BS
{
  private DIV $cardFooter;

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    return $this->getCardFooter();
  }

  public function setCardFooter(DIV $cardFooter): self
  {
    $this->cardFooter = $cardFooter;
    $this->cardFooter->clearClassList();
    $this->cardFooter->addClass('card-footer');

    return $this;
  }

  public function getCardFooter(): DIV
  {
    if (!isset($this->cardFooter)) {
      $this->setCardFooter(new DIV());
    }

    return $this->cardFooter;
  }

  public function footer(): DIV
  {
    return $this->getCardFooter();
  }
}
