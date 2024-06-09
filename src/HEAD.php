<?php

namespace HTML;

use HTML\TAG;

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
