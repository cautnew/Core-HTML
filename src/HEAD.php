<?php

namespace Core\HTML;

use Core\HTML\TAG;

class HEAD extends TAG
{
  public function __construct(... $attrList)
  {
    $this->setTagName('head');

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}
