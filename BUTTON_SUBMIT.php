<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class BUTTON_SUBMIT extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $html=null, ?string $value=null, ... $attrList)
  {
    $this->setTagName('button');

    $this->value = $value;
    $this->type = 'submit';

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if ($html !== null) {
      $this->append($html);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }
  }
}