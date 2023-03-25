<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class DIV extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('div');

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