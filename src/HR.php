<?php

namespace HTML;

use HTML\TAG;

class HR extends TAG
{
  public function __construct(?string $class=null, ... $attrList)
  {
    $this->setTagName('hr');
    $this->setIndCloseTag(false);

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}
