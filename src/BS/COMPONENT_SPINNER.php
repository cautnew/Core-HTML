<?php

namespace Cautnew\HTML\BS;

use Boot\Helper\Helper;
use Cautnew\HTML\DIV;
use Cautnew\HTML\INPUT;
use Cautnew\HTML\INPUT_DATE;
use Cautnew\HTML\INPUT_EMAIL;
use Cautnew\HTML\INPUT_MONTH;
use Cautnew\HTML\INPUT_NUMBER;
use Cautnew\HTML\INPUT_PASSWORD;
use Cautnew\HTML\INPUT_TEXT;
use Cautnew\HTML\LABEL;
use Cautnew\HTML\SELECT;
use Cautnew\HTML\SPAN;
use Cautnew\HTML\TEXTAREA;

class COMPONENT_SPINNER extends BS
{
  protected DIV $spinner;
  protected SPAN $visuallyhidden;

  protected string $id;
  protected string $txtVisuallyHidden;

  public function __construct(string $id, string $txtVisuallyHidden)
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
    $this->spinner->addClass('spinner-border');
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

  public function setTxtVisuallyHidden(string $txtVisuallyHidden): self
  {
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

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    $this->getSpinner()->clearAppendList();
    $this->getSpinner()->appendList([
      $this->getSpanFormText()
    ]);

    $this->getSpanFormText()->clearAppendList();
    $this->getSpanFormText()->append($this->getTxtVisuallyHidden());

    return $this->getSpinner();
  }
}
