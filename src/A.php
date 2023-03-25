<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class A extends TAG
{
  public function __construct(string $href = null, string $html = null, ?string $class=null, ?string $id=null, ... $attrList)
  {
    $this->setTagName('a');

    $this->setHref($href);
    $this->setHtml($html);

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