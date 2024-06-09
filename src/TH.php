<?php

namespace HTML;

use HTML\TAG;

class TH extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('th');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }

    $this->setHtml($html);
  }
}