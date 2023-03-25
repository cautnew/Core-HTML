<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

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
