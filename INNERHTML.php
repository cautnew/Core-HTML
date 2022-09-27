<?php

namespace Core\HTML;

use Core\HTML\TAG;

class INNERHTML extends TAG
{
  public function __construct(string $html, ... $attrList)
  {
    $this->setTagName('');
    $this->setIndCloseTag(false);

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }

    $this->setHtml($html);
  }
}
