<?php

namespace Core\HTML;

use Core\HTML\TAG;

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