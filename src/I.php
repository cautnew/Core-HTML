<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class I extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('i');

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