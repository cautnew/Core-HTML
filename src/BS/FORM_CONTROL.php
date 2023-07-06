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

class FORM_CONTROL extends BS
{
  protected DIV $formcontrol;
  protected LABEL $label;
  protected SPAN $formtext;
  protected INPUT|INPUT_TEXT|INPUT_PASSWORD|INPUT_EMAIL|INPUT_DATE|INPUT_MONTH|INPUT_NUMBER|TEXTAREA|SELECT $input;

  protected string $id;
  protected string $name;
  protected string $txtLabel;
  protected string $txtFormText;

  protected string $defaultInputType = "text";

  public function __construct(string $id, string $name, string $txtLabel, string $txtFormText)
  {
    $this->setId($id);
    $this->setName($name);
    $this->setTxtLabel($txtLabel);
    $this->setTxtFormText($txtFormText);
  }

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function setFormControl(DIV $formcontrol): DIV
  {
    $this->formcontrol = $formcontrol;
    $this->formcontrol->addClass('form-control');

    return $this->formcontrol;
  }

  public function getFormControl(): DIV
  {
    if (!isset($this->formcontrol)) {
      $this->setFormControl(new DIV());
    }

    return $this->formcontrol;
  }

  public function setSpanFormText(SPAN $formtext): self
  {
    $this->formtext = $formtext;
    $this->formtext->addClass('form-text');

    return $this;
  }

  public function getSpanFormText(): SPAN
  {
    if (!isset($this->formtext)) {
      $this->setSpanFormText(new SPAN());
    }

    return $this->formtext;
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

  public function setInput(INPUT|INPUT_TEXT|INPUT_PASSWORD|INPUT_EMAIL|INPUT_DATE|INPUT_MONTH|INPUT_NUMBER|TEXTAREA|SELECT $input): self
  {
    $this->input = $input;
    $this->input->addClass('form-control');

    return $this;
  }

  public function getInput(): INPUT|INPUT_TEXT|INPUT_PASSWORD|INPUT_EMAIL|INPUT_DATE|INPUT_MONTH|INPUT_NUMBER|TEXTAREA|SELECT
  {
    if (!isset($this->input)) {
      $this->setInput(new INPUT($this->defaultInputType));
    }

    return $this->input;
  }

  public function setTxtFormText(string $txtFormText): self
  {
    $this->txtFormText = $txtFormText;

    return $this;
  }

  public function getTxtFormText(): string
  {
    if (!isset($this->txtFormText)) {
      $this->setTxtFormText('');
    }

    return $this->txtFormText;
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
    $this->getFormControl()->clearAppendList();
    $this->getFormControl()->appendList([
      $this->getLabel(),
      $this->getInput(),
      $this->getSpanFormText()
    ]);

    $this->getLabel()->setFor($this->getId());
    $this->getLabel()->clearAppendList()->append($this->getTxtLabel());

    $this->getInput()->setId($this->getId());
    $this->getInput()->setName($this->getName());

    $this->getSpanFormText()->append($this->getTxtFormText());

    return $this->getFormControl();
  }
}
