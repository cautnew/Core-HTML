<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class TEXTAREA extends TAG
{
  public function __construct(string $class=null, string $id = null, string $name = null, ... $attrList)
  {
    $this->setTagName('textarea');

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

  public function setRows(int $qtdRows): self
  {
    return $this->setAttr('rows', $qtdRows);
  }
}
