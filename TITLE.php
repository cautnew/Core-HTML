<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class TITLE extends TAG
{
  public function __construct(?string $title = null, ... $attrList)
  {
    $this->setTagName('title');

    $this->setHtml($title);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}