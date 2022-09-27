<?php

namespace Core\HTML;

use Core\HTML\TAG;

class BODY extends TAG
{
  public function __construct(?string $class=null, ?string $html=null, ... $attrList)
  {
    $this->setTagName('body');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }

    $this->setHtml($html);
  }
}
