<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class FOOTER extends TAG
{
  public function __construct(string $class=null, string $id=null, ... $attrList)
  {
    $this->setTagName('footer');

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