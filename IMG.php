<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class IMG extends TAG
{
  public function __construct(string $src, string $class = null, ?string $id=null, ... $attrList)
  {
    $this->setTagName('img');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if (!empty($src)) {
      $this->src = $src;
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }

    $this->setIndCloseTag(false);
  }

  public function setAlt(string $alt = null): self
  {
    return $this->setAttribute('alt', $alt);
  }
}