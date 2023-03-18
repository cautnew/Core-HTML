<?php

namespace Cautnew\HTML;

use Cautnew\HTML\TAG;

class FORM_UPLOAD extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $action=null, ?string $html=null, ... $attrList)
  {
    $this->setTagName('form');

    if ($class !== null) {
      $this->addClass($class);
    }

    if ($id !== null) {
      $this->setId($id);
    }

    if ($action !== null) {
      $this->setAction($action);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }

    $this->setAttr('enctype', 'multipart/form-data');
    $this->setMethod('post');

    $this->setHtml($html);
  }

  public function setAction (string $action): self
  {
    $this->setAttr('action', $action);

    return $this;
  }

  public function setMethod (string $method): self
  {
    $this->setAttr('method', 'post');

    return $this;
  }

  public function setEnctype (string $enctype): self
  {
    $this->setAttr('enctype', 'multipart/form-data');

    return $this;
  }
}