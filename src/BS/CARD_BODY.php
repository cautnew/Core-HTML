<?php

namespace HTML\BS;

use HTML\DIV;

class CARD_BODY extends BS
{
  private DIV $cardBody;

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
    return $this->getCardBody();
  }

  public function setCardBody(DIV $cardBody): self
  {
    $this->cardBody = $cardBody;
    $this->cardBody->clearClassList();
    $this->cardBody->addClass('card-body');

    return $this;
  }

  public function getCardBody(): DIV
  {
    if (!isset($this->cardBody)) {
      $this->setCardBody(new DIV());
    }

    return $this->cardBody;
  }

  public function body(): DIV
  {
    return $this->getCardBody();
  }
}
