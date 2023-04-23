<?php

namespace Cautnew\HTML;

class SPAN extends TAG
{
  public function __construct(string $class=null, string $id=null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('span');

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