<?php

namespace Cautnew\HTML\BS;

class SELECT extends BS
{
  public function __construct(string $id = null, string $name = null)
  {
    $this->setTagName('select');
    $this->setElementName('form-select');

    $this->setAttr('id', $id);
    $this->setAttr('name', $name);
  }
}
