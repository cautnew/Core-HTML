<?php

namespace HTML;

use HTML\TAG;

class MAIN extends TAG
{
  public function __construct(string $class=null, string $id=null, ... $attrList)
  {
    $this->setTagName('main');

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