<?php

namespace Core\HTML;

use Core\HTML\TAG;

class NAV extends TAG
{
  public function __construct(string $class=null, string $id=null, ... $attrList)
  {
    $this->setTagName('nav');

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