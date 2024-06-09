<?php

namespace HTML\BS;

use Boot\Helper\Helper;
use HTML\DIV;
use HTML\INPUT;
use HTML\INPUT_DATE;
use HTML\INPUT_EMAIL;
use HTML\INPUT_MONTH;
use HTML\INPUT_NUMBER;
use HTML\INPUT_PASSWORD;
use HTML\INPUT_TEXT;
use HTML\LABEL;
use HTML\SELECT;
use HTML\TEXTAREA;

class FORM_FLOATING extends BS
{
  private DIV $formfloating;
  private LABEL $label;
  private INPUT|INPUT_TEXT|INPUT_PASSWORD|INPUT_EMAIL|INPUT_DATE|INPUT_MONTH|INPUT_NUMBER|TEXTAREA|SELECT $input;

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

  public function setFormFloating(DIV $formfloating): DIV
  {
    $this->formfloating = $formfloating;

    return $this->formfloating;
  }

  public function getFormFloating(): DIV
  {
    if (!isset($this->formfloating)) {
      $this->setFormFloating(new DIV());
    }

    return $this->formfloating;
  }

  public function setLabel(LABEL $label): self
  {
    $this->label = $label;
    $this->label->clearClassList();

    return $this;
  }

  public function getLabel(): LABEL
  {
    if (!isset($this->label)) {
      $this->setLabel(new LABEL());
    }

    return $this->label;
  }

  public function setInput(INPUT|INPUT_TEXT|INPUT_PASSWORD|INPUT_EMAIL|INPUT_DATE|INPUT_MONTH|INPUT_NUMBER|TEXTAREA|SELECT $input): self
  {
    $this->input = $input;
    $this->input->addClass('form-control');

    return $this;
  }

  public function getInput(): INPUT|INPUT_TEXT|INPUT_PASSWORD|INPUT_EMAIL|INPUT_DATE|INPUT_MONTH|INPUT_NUMBER|TEXTAREA|SELECT
  {
    if (!isset($this->input)) {
      $this->setInput(new INPUT('text'));
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
    $this->getFormFloating()->clearAppendList();
    $this->getFormFloating()->addClass('form-floating');
    $this->getFormFloating()->appendList([$this->getInput(), $this->getLabel()]);

    $this->getInput()->setId($this->getId());
    $this->getInput()->setName($this->getName());
    $this->getInput()->addClass('form-control');

    $this->getLabel()->setFor($this->getId());
    $this->getLabel()->clearAppendList()->append($this->getTxtLabel());

    return $this->getFormFloating();
  }
}
