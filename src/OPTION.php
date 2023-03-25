<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class OPTION extends TAG
{
  public function __construct($value = null, $text = null, bool $selected = false, ... $attrList)
  {
    $this->value = $value;
    $this->html = $text;
    $this->selected = $selected;

    $this->setTagName('option');

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}