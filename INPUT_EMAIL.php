<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class INPUT_EMAIL extends TAG
{
  public function __construct(string $class=null, string $id = null, string $name = null, string $value = null, ... $attrList)
  {
    $this->setTagName('input');
    $this->setIndCloseTag(false);
    $this->setAttr('type', 'email');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if ($name !== null) {
      $this->setAttr('name', $name);
    }

    $this->setAttr('value', $value);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}
