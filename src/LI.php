<?php

namespace HTML;

use HTML\TAG;

class LI extends TAG
{
  public function __construct(?string $class = null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('li');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($html !== null) {
      $this->innerHTML($html);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}