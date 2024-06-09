<?php

namespace HTML;

use HTML\TAG;

class H5 extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('h5');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if ($html !== null) {
      $this->setHtml($html);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}