<?php

namespace HTML;

use HTML\TAG;

class SELECT extends TAG
{
  public function __construct(string $class=null, string $id = null, string $name = null, ... $attrList)
  {
    $this->setTagName('select');

    $this->setAttr('name', $name);

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

  public function isMultiple(): bool
  {
    return $this->hasAttr('multiple');
  }
}
