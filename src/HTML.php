<?php

namespace HTML;

use HTML\TAG;

class HTML extends TAG
{
  private bool $indHTML5;

  public function __construct(... $attrList)
  {
    $this->setTagName('html');

    $this->isHTML5(true);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }

  public function renderHtml(): self
  {
    $html = $this->prepareStartHtml();
    $html .= $this->prepareContentHtml();
    $html .= $this->prepareEndHtml();

    $this->html = ($this->indHTML5) ? '<!DOCTYPE html>' . $html : $html;

    $this->indRendered = true;

    return $this;
  }

  public function isHTML5(bool $ind): self
  {
    $this->indHTML5 = $ind;

    return $this;
  }

  public function setLang(string $lang): self
  {
    $this->setAttribute('lang', $lang);

    return $this;
  }
}
