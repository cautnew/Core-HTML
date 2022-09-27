<?php

namespace Core\HTML;

use Core\HTML\TAG;

class H4 extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('h4');

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