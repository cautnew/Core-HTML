<?php

namespace HTML;

class BUTTON extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $html=null, ?string $value=null, ?string $type = 'button', ... $attrList)
  {
    $this->setTagName('button');

    $this->value = $value;
    $this->type = $type;

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