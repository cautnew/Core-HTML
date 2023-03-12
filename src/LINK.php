<?php

namespace Core\HTML;

use Core\HTML\TAG;

class LINK extends TAG
{
  public function __construct(string $href, ?string $rel = null, ?string $type = null, ... $attrList)
  {
    $this->setTagName('link');
    $this->setIndCloseTag(false);

    $this->setAttribute('href', $href);
    $this->setAttribute('rel', $rel);
    $this->setAttribute('type', $type);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}
