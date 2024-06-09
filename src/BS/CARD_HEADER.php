<?php

namespace HTML\BS;

use HTML\DIV;

class CARD_HEADER extends BS
{
  private DIV $cardHeader;

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
    return $this->getCardHeader();
  }

  public function setCardHeader(DIV $cardHeader): self
  {
    $this->cardHeader = $cardHeader;
    $this->cardHeader->clearClassList();
    $this->cardHeader->addClass('card-header');

    return $this;
  }

  public function getCardHeader(): DIV
  {
    if (!isset($this->cardHeader)) {
      $this->setCardHeader(new DIV());
    }

    return $this->cardHeader;
  }

  public function footer(): DIV
  {
    return $this->getCardHeader();
  }
}
