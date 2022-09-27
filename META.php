<?php

namespace Core\HTML;

use Core\HTML\TAG;

class META extends TAG
{
  public function __construct(?string $name = null, ?string $content = null, ... $attrList)
  {
    $this->setTagName('meta');
    $this->setIndCloseTag(false);

    $this->setAttribute('name', $name);
    $this->setAttribute('content', $content);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}
