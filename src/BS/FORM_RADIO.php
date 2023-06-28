<?php

namespace Cautnew\HTML\BS;

use Boot\Helper\Helper;
use Cautnew\HTML\DIV;
use Cautnew\HTML\INPUT;
use Cautnew\HTML\INPUT_RADIO;
use Cautnew\HTML\LABEL;

class FORM_RADIO extends BS
{
  private DIV $formcheck;
  private LABEL $label;
  private INPUT | INPUT_RADIO $input;

  private string $id;
  private string $name;
  private string $txtLabel;

  public function __construct(string $id, string $name, string $txtLabel)
  {
    $this->setId($id);
    $this->setName($name);
    $this->setTxtLabel($txtLabel);
  }

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function setFormCheck(DIV $formcheck): DIV
  {
    $this->formcheck = $formcheck;

    return $this->formcheck;
  }

  public function getFormCheck(): DIV
  {
    if (!isset($this->formcheck)) {
      $this->setFormCheck(new DIV());
    }

    return $this->formcheck;
  }

  public function setLabel(LABEL $label): self
  {
    $this->label = $label;
    $this->label->addClass('form-label');

    return $this;
  }

  public function getLabel(): LABEL
  {
    if (!isset($this->label)) {
      $this->setLabel(new LABEL());
    }

    return $this->label;
  }

  public function setInput(INPUT|INPUT_RADIO $input): self
  {
    $this->input = $input;
    $this->input->addClass('form-control');

    return $this;
  }

  public function getInput(): INPUT|INPUT_RADIO
  {
    if (!isset($this->input)) {
      $this->setInput(new INPUT_RADIO());
    }

    return $this->input;
  }

  public function setTxtLabel(string $txtLabel): self
  {
    $this->txtLabel = $txtLabel;

    return $this;
  }

  public function getTxtLabel(): string
  {
    if (!isset($this->txtLabel)) {
      $this->setTxtLabel('');
    }

    return $this->txtLabel;
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

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function getName(): string
  {
    if (!isset($this->name)) {
      $this->setName(Helper::generateRandomId());
    }

    return $this->name;
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    $this->getFormCheck()->clearAppendList();
    $this->getFormCheck()->appendList([$this->getInput(), $this->getLabel()]);

    $this->getInput()->setId($this->getId());
    $this->getInput()->setName($this->getName());

    $this->getLabel()->setFor($this->getId());
    $this->getLabel()->append($this->getTxtLabel());

    return $this->getFormCheck();
  }
}
