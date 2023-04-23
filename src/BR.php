<?php

namespace Cautnew\HTML;

class BR extends TAG
{
  public function __construct(?string $class=null, ... $attrList)
  {
    $this->setTagName('br');
    $this->setIndCloseTag(false);

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}
