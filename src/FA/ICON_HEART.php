<?php

namespace HTML\FA;

use HTML\I;

class ICON_HEART extends FA
{
  public function __toString()
  {
    return $this->render();
  }

  public function render(): string
  {
    return new I('fa-solid fa-heart text-danger');
  }
}
