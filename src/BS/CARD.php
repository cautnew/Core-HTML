<?php

namespace Cautnew\HTML\BS;

use Cautnew\HTML\DIV;

class CARD extends BS
{
  private DIV $card;
  private DIV $cardHeader;
  private DIV $cardBody;
  private DIV $cardFooter;

  private string $id;
  private bool $indShowHeader;
  private bool $indShowBody;
  private bool $indShowFooter;

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function setIndShowHeader(bool $indShowHeader = true): self
  {
    $this->indShowHeader = $indShowHeader;

    return $this;
  }

  public function getIndShowHeader(): bool
  {
    if (!isset($this->indShowHeader)) {
      $this->setIndShowHeader();
    }

    return $this->indShowHeader;
  }

  public function isShowHeader(): bool
  {
    return $this->getIndShowHeader();
  }

  public function setIndShowBody(bool $indShowBody = true): self
  {
    $this->indShowBody = $indShowBody;

    return $this;
  }

  public function getIndShowBody(): bool
  {
    if (!isset($this->indShowBody)) {
      $this->setIndShowBody();
    }

    return $this->indShowBody;
  }

  public function isShowBody(): bool
  {
    return $this->getIndShowBody();
  }

  public function setIndShowFooter(bool $indShowFooter = true): self
  {
    $this->indShowFooter = $indShowFooter;

    return $this;
  }

  public function getIndShowFooter(): bool
  {
    if (!isset($this->indShowFooter)) {
      $this->setIndShowFooter();
    }

    return $this->indShowFooter;
  }

  public function isShowFooter(): bool
  {
    return $this->getIndShowFooter();
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    $this->getCard()->clearAppendList();

    if ($this->isShowHeader() && $this->isSetHeader()) {
      $this->getCard()->append($this->cardHeader);
    }

    if ($this->isShowBody() && $this->isSetBody()) {
      $this->getCard()->append($this->cardBody);
    }

    if ($this->isShowFooter() && $this->isSetFooter()) {
      $this->getCard()->append($this->cardFooter);
    }

    return $this->getCard();
  }

  public function setCard(DIV $card): self
  {
    $this->card = $card;
    $this->card->clearClassList();
    $this->card->addClass('card');

    return $this;
  }

  public function getCard(): DIV
  {
    if (!isset($this->card)) {
      $this->setCard(new DIV());
    }

    return $this->card;
  }

  public function setHeader(DIV $cardHeader): self
  {
    $this->cardHeader = $cardHeader;
    $this->cardHeader->clearClassList();
    $this->cardHeader->addClass('card-header');

    return $this;
  }

  public function getHeader(): DIV
  {
    if (!isset($this->cardHeader)) {
      $this->setHeader(new DIV());
    }

    return $this->cardHeader;
  }

  public function isSetHeader(): bool
  {
    return isset($this->cardHeader);
  }

  public function setBody(DIV $cardBody): self
  {
    $this->cardBody = $cardBody;
    $this->cardBody->clearClassList();
    $this->cardBody->addClass('card-body');

    return $this;
  }

  public function getBody(): DIV
  {
    if (!isset($this->cardBody)) {
      $this->setBody(new DIV());
    }

    return $this->cardBody;
  }

  public function isSetBody(): bool
  {
    return isset($this->cardBody);
  }

  public function setFooter(DIV $cardFooter): self
  {
    $this->cardFooter = $cardFooter;
    $this->cardFooter->clearClassList();
    $this->cardFooter->addClass('card-footer');

    return $this;
  }

  public function getFooter(): DIV
  {
    if (!isset($this->cardFooter)) {
      $this->setFooter(new DIV());
    }

    return $this->cardFooter;
  }

  public function isSetFooter(): bool
  {
    return isset($this->cardFooter);
  }
}
