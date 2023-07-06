<?php

namespace Cautnew\HTML\BS;

use Boot\Helper\Helper;
use Cautnew\HTML\DIV;
use Cautnew\HTML\INPUT;
use Cautnew\HTML\INPUT_RADIO;
use Cautnew\HTML\LABEL;

class FORM_SELECT extends SELECT
{
  protected DIV $div;
  protected LABEL $label;

  protected bool $indCovered = false;
  protected bool $indAppendLabelRight = false;

  public function __construct(string $id = null, string $name = null, string $label = null)
  {
    $this->setTagName('select');
    $this->setElementName('form-select');

    $this->setAttr('id', $id);
    $this->setAttr('name', $name);

    $this->label = new LABEL($id, $label);
  }

  public function getLabel(): LABEL
  {
    return $this->label;
  }

  public function setAppendLabelRight(bool $ind = true): self
  {
    $this->indAppendLabelRight = $ind;
    return $this;
  }

  public function getCol(): COL
  {
    return $this->col;
  }

  public function setCol(COL $col): self
  {
    $this->col = $col;

    return $this;
  }

  public function renderHtml(): self
  {
    $this->clearAppendAfterList();
    $this->clearAppendAfterList();
    $this->label->setAttr('for', $this->getAttr('id'));

    if ($this->indAppendLabelAfter) {
      $this->appendAfter($this->label);
    } else {
      $this->appendBefore($this->label);
    }

    $html = $this->prepareAppendBefore();
    $html .= $this->prepareStartHtml();
    $html .= $this->prepareContentHtml();
    $html .= $this->prepareEndHtml();
    $html .= $this->prepareAppendAfter();

    $this->html = $html;

    $this->indRendered = true;

    return $this;
  }
}
