<?php

namespace HTML;

use HTML\TAG;

class STYLE extends TAG
{
  public function __construct(?string $src = null, ... $attrList)
  {
    $this->setTagName('style');

    $this->setAttr('src', $src);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}