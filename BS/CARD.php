<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;

class CARD extends BS
{
  private DIV $card;
  private DIV $cardHeader;
  private DIV $cardBody;
  private DIV $cardFooter;

  private bool $showHeader = true;
  private bool $showBody = true;
  private bool $showFooter = true;

  public function __construct(bool $indShowHeader = true, bool $indShowBody = true, bool $indShowFooter = true)
  {
    $this->card = new DIV('card');
    $this->cardHeader = new DIV('card-header');
    $this->cardBody = new DIV('card-body');
    $this->cardFooter = new DIV('card-footer');

    $this->setShowHeader($indShowHeader);
    $this->setShowBody($indShowBody);
    $this->setShowFooter($indShowFooter);
  }

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function setShowHeader(bool $indShowHeader = true): self
  {
    $this->showHeader = $indShowHeader;

    return $this;
  }

  public function setShowBody(bool $indShowBody = true): self
  {
    $this->showBody = $indShowBody;

    return $this;
  }

  public function setShowFooter(bool $indShowFooter = true): self
  {
    $this->showFooter = $indShowFooter;

    return $this;
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    $this->card->clearAppendList();

    if ($this->showHeader) {
      $this->card->append($this->cardHeader);
    }

    if ($this->showBody) {
      $this->card->append($this->cardBody);
    }

    if ($this->showFooter) {
      $this->card->append($this->cardFooter);
    }

    return $this->card;
  }

  public function getCard(): DIV
  {
    return $this->card;
  }

  public function getHeader(): DIV
  {
    return $this->cardHeader;
  }

  public function getBody(): DIV
  {
    return $this->cardBody;
  }

  public function getFooter(): DIV
  {
    return $this->cardFooter;
  }
}
