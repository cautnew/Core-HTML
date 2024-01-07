<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class HEADER extends TAG
{
  public function __construct(... $attrList)
  {
    $this->setTagName('header');

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}
