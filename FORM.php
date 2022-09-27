<?php

namespace Core\HTML;

use Core\HTML\TAG;

class FORM extends TAG
{
  public function __construct(?string $class=null, ?string $id=null, ?string $action=null, ?string $method=null, ?string $html=null, ... $attrList)
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

    if ($method !== null) {
      $this->setMethod($method);
    }

    if ($attrList !== null) {
      $this->setAttributeList($attrList);
    }

    $this->setHtml($html);
  }

  public function setAction (string $action): self
  {
    $this->setAttr('action', $action);

    return $this;
  }

  public function setMethod (string $method): self
  {
    $this->setAttr('method', $method);

    return $this;
  }
}