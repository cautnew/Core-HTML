<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;
use Core\HTML\INPUT;
use Core\HTML\INPUT_DATE;
use Core\HTML\INPUT_EMAIL;
use Core\HTML\INPUT_MONTH;
use Core\HTML\INPUT_TEXT;
use Core\HTML\LABEL;
use Core\HTML\SELECT;

class FORM_FLOATING extends BS
{
  private DIV $formfloating;
  private LABEL $label;
  private INPUT|INPUT_DATE|INPUT_TEXT|INPUT_EMAIL|INPUT_MONTH|SELECT $input;

  private string $txtLabel;
  private string $id;
  private string $name;

  public function __construct(string $id, string $name, string $txtLabel, INPUT|INPUT_DATE|INPUT_TEXT|INPUT_EMAIL|INPUT_MONTH|SELECT $input)
  {
    $this->txtLabel = $txtLabel;
    $this->id = $id;
    $this->name = $name;

    $this->formfloating = new DIV('form-floating');
    $this->label = new LABEL('card-header', txt: $txtLabel);
    $this->input = $input;
  }

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function setInput(INPUT|INPUT_DATE|INPUT_TEXT|INPUT_EMAIL|INPUT_MONTH|SELECT $input): self
  {
    $this->input = $input;
    return $this;
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    $this->formfloating->clearAppendList();
    $this->formfloating->appendList([$this->input, $this->label]);

    $this->input->setId($this->id);
    $this->input->setName($this->name);
    $this->label->setFor($this->id);
    $this->label->append($this->txtLabel);

    return $this->card;
  }

  public function getFormFloating(): DIV
  {
    return $this->formfloating;
  }

  public function getLabel(): LABEL
  {
    return $this->label;
  }

  public function getInput(): INPUT|INPUT_DATE|INPUT_TEXT|INPUT_EMAIL|INPUT_MONTH|SELECT
  {
    return $this->input;
  }

  public function setTxtLabel(string $txtLabel): self
  {
    $this->txtLabel = $txtLabel;
    return $this;
  }

  public function setId(string $id): self
  {
    $this->id = $id;
    return $this;
  }

  public function setName(string $name): self
  {
    $this->name = $name;
    return $this;
  }
}
