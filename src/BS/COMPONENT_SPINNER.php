<?php

namespace Cautnew\HTML\BS;

use Boot\Helper\Helper;
use Cautnew\HTML\DIV;
use Cautnew\HTML\SPAN;

class COMPONENT_SPINNER extends BS
{
  protected DIV $spinner;
  protected SPAN $visuallyhidden;

  protected string $id;
  protected string $txtVisuallyHidden;
  protected bool $indSmall;
  protected string $spinnerFormat = 'border';

  public function __construct(string $id, ?string $txtVisuallyHidden = null)
  {
    $this->setId($id);
    $this->setTxtVisuallyHidden($txtVisuallyHidden);
  }

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function setSpinner(DIV $spinner): DIV
  {
    $this->spinner = $spinner;
    $this->spinner->addClass("spinner-{$this->getSpinnerFormat()}");
    $this->spinner->setAttr('role', 'status');

    return $this->spinner;
  }

  public function getSpinner(): DIV
  {
    if (!isset($this->spinner)) {
      $this->setSpinner(new DIV());
    }

    return $this->spinner;
  }

  public function setSpanVisuallyHidden(SPAN $visuallyhidden): self
  {
    $this->visuallyhidden = $visuallyhidden;
    $this->visuallyhidden->addClass('visually-hidden');

    return $this;
  }

  public function getSpanFormText(): SPAN
  {
    if (!isset($this->visuallyhidden)) {
      $this->setSpanVisuallyHidden(new SPAN());
    }

    return $this->visuallyhidden;
  }

  public function setTxtVisuallyHidden(?string $txtVisuallyHidden = null): self
  {
    if ($txtVisuallyHidden === null) {
      $txtVisuallyHidden = 'Carregando...';
    }

    $this->txtVisuallyHidden = $txtVisuallyHidden;

    return $this;
  }

  public function getTxtVisuallyHidden(): string
  {
    if (!isset($this->txtVisuallyHidden)) {
      $this->setTxtVisuallyHidden('Carregando...');
    }

    return $this->txtVisuallyHidden;
  }

  public function setId(string $id): self
  {
    $this->id = $id;

    return $this;
  }

  public function getId(): string
  {
    if (!isset($this->id)) {
      $this->setId(Helper::generateRandomId());
    }

    return $this->id;
  }

  public function setSpinnerFormat(string $spinnerFormat = 'border'): self
  {
    $this->spinnerFormat = $spinnerFormat;

    return $this;
  }

  public function getSpinnerFormat(): string
  {
    if (!isset($this->spinnerFormat)) {
      $this->setSpinnerFormat();
    }

    return $this->spinnerFormat;
  }

  public function setIndSmall(bool $indSmall = false): self
  {
    $this->indSmall = $indSmall;

    return $this;
  }

  public function getIndSmall(): string
  {
    if (!isset($this->indSmall)) {
      $this->setIndSmall();
    }

    return $this->indSmall;
  }

  public function isSmall(): bool
  {
    return $this->getIndSmall();
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  public function getTagAsSpan(): SPAN
  {
    return $this->renderTagAsSpan();
  }

  private function renderTag(): DIV
  {
    $this->getSpinner()->clearAppendList();
    $this->getSpinner()->appendList([
      $this->getSpanFormText()
    ]);
    $this->getSpinner()->setId($this->getId());

    if ($this->isSmall()) {
      $this->getSpinner()->addClass("spinner-{$this->getSpinnerFormat()}-sm");
    }

    $this->getSpanFormText()->clearAppendList();
    $this->getSpanFormText()->append($this->getTxtVisuallyHidden());

    return $this->getSpinner();
  }

  private function renderTagAsSpan(): SPAN
  {
    $span = new SPAN("spinner-{$this->getSpinnerFormat()}", $this->getId());
    $span->setAttr('role', 'status');
    $span->setAttr('aria-hidden', 'true');

    if ($this->isSmall()) {
      $span->addClass("spinner-{$this->getSpinnerFormat()}-sm");
    }

    return $span;
  }
}
