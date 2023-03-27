<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class AUDIO extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ... $attrList)
  {
    $this->setTagName('audio');

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