<?php

namespace Core\HTML;

use Core\HTML\TAG;

class TR extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ... $attrList)
  {
    $this->setTagName('tr');

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