<?php

namespace HTML\BS;

use HTML\DIV;
use HTML\BS\CARD_BODY;
use HTML\BS\CARD_HEADER;
use HTML\BS\CARD_FOOTER;

class CARD extends BS
{
  private DIV $card;
  private CARD_HEADER $cardHeader;
  private CARD_BODY $cardBody;
  private CARD_FOOTER $cardFooter;

  private string $id;
  private bool $indShowHeader;
  private bool $indShowBody;
  private bool $indShowFooter;

  public function __construct(string $id, string $backgroundColor = 'light', string $shadowSize = 'sm', string $marginDirection = 'b', int $marginSize = 2)
  {
    $this->setId($id);
    $this->setMargin($marginDirection, $marginSize);
    $this->setBackgroundColor($backgroundColor);
    $this->setShadowSize($shadowSize);
  }

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

  public function setMargin(string $marginDirection = 'b', int $marginSize = 2): self
  {
    $this->getTag()->addClass("m{$marginDirection}-{$marginSize}");

    return $this;
  }

  public function getIndShowHeader(): bool
  {
    if (!isset($this->indShowHeader)) {
      $this->setIndShowHeader();
    }

    return $this->indShowHeader;
  }

  public function setBackgroundColor(string $background): self
  {
    if (!in_array($background, $this->bsBackgroundColors)) {
      return $this;
    }

    $this->getTag()->addClass("bg-{$background}");

    return $this;
  }

  public function setShadowSize(string $size = "sm"): self
  {
    if (!in_array($size, $this->bsShadowSizes)) {
      return $this;
    }

    $this->getTag()->addClass("shadow-{$size}");

    return $this;
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

  public function setHeader(CARD_HEADER $cardHeader): self
  {
    $this->cardHeader = $cardHeader;

    return $this;
  }

  public function getHeader(): CARD_HEADER
  {
    if (!isset($this->cardHeader)) {
      $this->setHeader(new CARD_HEADER());
    }

    return $this->cardHeader;
  }

  public function header(): CARD_HEADER
  {
    return $this->getHeader();
  }

  public function isSetHeader(): bool
  {
    return isset($this->cardHeader);
  }

  public function setBody(CARD_BODY $cardBody): self
  {
    $this->cardBody = $cardBody;

    return $this;
  }

  public function getBody(): CARD_BODY
  {
    if (!isset($this->cardBody)) {
      $this->setBody(new CARD_BODY());
    }

    return $this->cardBody;
  }

  public function body(): CARD_BODY
  {
    return $this->getBody();
  }

  public function isSetBody(): bool
  {
    return isset($this->cardBody);
  }

  public function setFooter(CARD_FOOTER $cardFooter): self
  {
    $this->cardFooter = $cardFooter;

    return $this;
  }

  public function getFooter(): CARD_FOOTER
  {
    if (!isset($this->cardFooter)) {
      $this->setFooter(new CARD_FOOTER());
    }

    return $this->cardFooter;
  }

  public function footer(): CARD_FOOTER
  {
    return $this->getFooter();
  }

  public function isSetFooter(): bool
  {
    return isset($this->cardFooter);
  }
}
