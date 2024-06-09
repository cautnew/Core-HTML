<?php

namespace HTML\BS;

use HTML\A;
use HTML\LI;

class BREADCRUMB_ITEM extends BS
{
  private string $txt;
  private bool $isActive;
  private string $href;

  public function __construct(string $txt, bool $isActive=false, string $href="")
  {
    $this->finalElement = new LI('breadcrumb-item');
    $this->txt = $txt;
    $this->setIsActive($isActive);
    $this->href = $href;
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
  }

  public function setTxt(string $txt): self
  {
    $this->txt = $txt;

    return $this;
  }

  public function setText(string $txt): self
  {
    return $this->setTxt($txt);
  }

  public function setIsActive(bool $isActive=false): self
  {
    $this->isActive = $isActive;

    return $this;
  }

  public function render(): self
  {
    $this->getFinalElement()->clearClassList();
    $this->getFinalElement()->clearAppendList();
    $this->getFinalElement()->addClass('breadcrumb-item');

    if ($this->isActive) {
      $this->getFinalElement()->addClass('active');
    }

    if (!empty($this->href)) {
      $this->getFinalElement()->append(new A($this->href, $this->txt));
    } else {
      $this->getFinalElement()->append($this->txt);
    }

    return $this;
  }
}
