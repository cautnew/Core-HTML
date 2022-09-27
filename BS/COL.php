<?php

namespace Core\HTML\BS;

use Core\HTML\DIV;

class COL extends BS
{
  private int $colSize;
  private int $colXsSize;
  private int $colSmSize;
  private int $colMdSize;
  private int $colLgSize;
  private int $colXlSize;
  private int $colXxlSize;

  public function __construct(int $size=null, int $sizeXs=null, int $sizeSm=null, int $sizeMd=null, int $sizeLg=null, int $sizeXl=null, int $sizeXxl=null)
  {
    $this->finalElement = new DIV();

    if ($size !== null) {
      $this->colSize = $size;
    }

    if ($sizeXs !== null) {
      $this->colXsSize = $sizeXs;
    }

    if ($sizeSm !== null) {
      $this->colSmSize = $sizeSm;
    }

    if ($sizeMd !== null) {
      $this->colMdSize = $sizeMd;
    }

    if ($sizeLg !== null) {
      $this->colLgSize = $sizeLg;
    }

    if ($sizeXl !== null) {
      $this->colXlSize = $sizeXl;
    }

    if ($sizeXxl !== null) {
      $this->colXxlSize = $sizeXxl;
    }
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function addClassSize(string $sizeName, int $size)
  {
    $classRad = "col";

    if (!empty($sizeName)) {
      $classRad .= "-{$sizeName}";
    }

    if ($size > 0) {
      $this->finalElement->addClass("{$classRad}-{$size}");
    } elseif ($size == 0) {
      $this->finalElement->addClass($classRad);
    }
  }

  private function renderTag(): DIV
  {
    $this->finalElement->clearClassList();

    if (!$this->isSizeSet()) {
      $this->finalElement->addClass('col');
      return $this->finalElement;
    }

    if (isset($this->colSize)) {
      $this->addClassSize('', $this->colSize);
    }

    if (isset($this->colXsSize)) {
      $this->addClassSize('xs', $this->colXsSize);
    }

    if (isset($this->colSmSize)) {
      $this->addClassSize('sm', $this->colSmSize);
    }

    if (isset($this->colMdSize)) {
      $this->addClassSize('md', $this->colMdSize);
    }

    if (isset($this->colLgSize)) {
      $this->addClassSize('lg', $this->colLgSize);
    }

    if (isset($this->colXlSize)) {
      $this->addClassSize('xl', $this->colXlSize);
    }

    if (isset($this->colXxlSize)) {
      $this->addClassSize('xxl', $this->colXxlSize);
    }

    return $this->finalElement;
  }

  private function isSizeSet(): bool
  {
    $sum = ($this->colSize ?? 0) + ($this->colXsSize ?? 0) + ($this->colSmSize ?? 0) +
    ($this->colMdSize ?? 0) + ($this->colLgSize ?? 0) + ($this->colXlSize ?? 0) +
    ($this->colXxlSize ?? 0);
    return ($sum > 0);
  }

  private function setAnySize(&$varSize, int $size): void
  {
    if ($size < 0 || $size > 12) {
      $varSize = 0;
    } else {
      $varSize = $size;
    }
  }

  public function setSize(int $size): self
  {
    $this->setAnySize($this->colSize, $size);
    return $this;
  }

  public function setSizeXs(int $size): self
  {
    $this->setAnySize($this->colXsSize, $size);
    return $this;
  }

  public function setSizeSm(int $size): self
  {
    $this->setAnySize($this->colSmSize, $size);
    return $this;
  }

  public function setSizeMd(int $size): self
  {
    $this->setAnySize($this->colMdSize, $size);
    return $this;
  }

  public function setSizeLg(int $size): self
  {
    $this->setAnySize($this->colLgSize, $size);
    return $this;
  }

  public function setSizeXl(int $size): self
  {
    $this->setAnySize($this->colXlSize, $size);
    return $this;
  }

  public function setSizeXxl(int $size): self
  {
    $this->setAnySize($this->colXxlSize, $size);
    return $this;
  }
}
