<?php

namespace HTML\BS;

use Boot\Helper\Helper;
use HTML\DIV;
use HTML\LABEL;
use HTML\OPTION;
use HTML\SELECT;
use HTML\SPAN;

class FORM_SELECT extends BS
{
  protected DIV $formselect;
  protected LABEL $label;
  protected SPAN $formtext;
  protected SELECT $select;
  protected array $optionsList = [];

  protected string $id;
  protected string $name;
  protected string $txtLabel;
  protected ?string $txtFormText;

  public function __construct(string $id, string $name, string $txtLabel, ?string $txtFormText = null, ?array $optionsList = [])
  {
    $this->setId($id);
    $this->setName($name);
    $this->setTxtLabel($txtLabel);
    $this->setTxtFormText($txtFormText);
    $this->setOptionsList($optionsList);
  }

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function setFormSelect(DIV $formselect): DIV
  {
    $this->formselect = $formselect;

    return $this->formselect;
  }

  public function getFormSelect(): DIV
  {
    if (!isset($this->formselect)) {
      $this->setFormSelect(new DIV());
    }

    return $this->formselect;
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

  public function setSelect(SELECT $select): self
  {
    $this->select = $select;
    $this->select->addClass('form-select');

    return $this;
  }

  public function getSelect(): SELECT
  {
    if (!isset($this->select)) {
      $this->setSelect(new SELECT());
    }

    return $this->select;
  }

  public function setTxtFormText(?string $txtFormText = null): self
  {
    $this->txtFormText = $txtFormText;

    return $this;
  }

  public function getTxtFormText(): ?string
  {
    if (!isset($this->txtFormText)) {
      $this->setTxtFormText();
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

  public function getOptionsList(): array
  {
    return $this->optionsList;
  }

  public function setOptionsList(array $optionsList): self
  {
    $this->optionsList = $optionsList;

    return $this;
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    $this->getFormSelect()->clearAppendList();
    $this->getFormSelect()->appendList([
      $this->getLabel(),
      $this->getSelect()
    ]);

    $this->getLabel()->setFor($this->getId());
    $this->getLabel()->clearAppendList()->append($this->getTxtLabel());

    $this->getSelect()->setId($this->getId());
    $this->getSelect()->setName($this->getName());

    foreach ($this->getOptionsList() as $option) {
      if ($option instanceof OPTION)
        $this->getSelect()->append($option);
    }

    if (!empty($this->getTxtFormText())) {
      $this->getFormSelect()->append($this->getSpanFormText());
      $this->getSpanFormText()->clearAppendList()->append($this->getTxtFormText());
    }

    return $this->getFormSelect();
  }
}
