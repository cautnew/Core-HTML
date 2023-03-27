<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class CANVAS extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ... $attrList)
  {
    $this->setTagName('canvas');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}