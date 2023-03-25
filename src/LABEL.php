<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class LABEL extends TAG
{
  public function __construct(string $for = null, string $class = null, string $id = null, string $txt = null, ... $attrList)
  {
    $this->setTagName('label');

    if (!empty($for)) {
      $this->setAttribute('for', $for);
    }

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if (!empty($txt)) {
      $this->setHtml($txt);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }

  public function setFor(string $for): self
  {
    return $this->setAttribute('for', $for);
  }
}
