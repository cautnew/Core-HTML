<?php

namespace Core\HTML;

use Core\HTML\TAG;

class SCRIPT extends TAG
{
  public function __construct(?string $src = null, ... $attrList)
  {
    $this->setTagName('script');

    $this->setAttr('src', $src);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}