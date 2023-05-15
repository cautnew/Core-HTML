<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class CALLOUT_DANGER extends TAG
{
  public function __construct(?string $id=null, ?string $class=null, ?string $html = null, ... $attrList)
  {
    $this->setTagName('div');
    $this->addClass('bd-callout bd-callout-danger');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }

    $this->setHtml($html);
  }
}