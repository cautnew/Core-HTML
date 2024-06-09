<?php

namespace HTML\BS;

use HTML\DIV;

class MODAL extends BS
{
  private DIV $modal;
  private DIV $modalDialog;
  private DIV $modalContent;
  private DIV $modalHeader;
  private DIV $modalBody;
  private DIV $modalFooter;

  private bool $showHeader = true;
  private bool $showBody = true;
  private bool $showFooter = true;

  private bool $showButtonClose = true;
  
  private bool $acceptKeyboard = true;
  private bool $backDropStatic = true;
  private bool $fade = false;

  private string $id;
  private string $title;

  public function __construct(bool $indShowHeader = true, bool $indShowBody = true, bool $indShowFooter = true)
  {
    $this->modal = new DIV('modal');
    $this->modalDialog = new DIV('modal-dialog');
    $this->modalContent = new DIV('modal-content');
    $this->modalHeader = new DIV('modal-header');
    $this->modalBody = new DIV('modal-body');
    $this->modalFooter = new DIV('modal-footer');

    $this->setShowHeader($indShowHeader);
    $this->setShowBody($indShowBody);
    $this->setShowFooter($indShowFooter);
  }

  public function __invoke(): DIV
  {
    return $this->getTag();
  }

  public function setShowHeader(bool $indShowHeader = true): self
  {
    $this->showHeader = $indShowHeader;

    return $this;
  }

  public function setShowBody(bool $indShowBody = true): self
  {
    $this->showBody = $indShowBody;

    return $this;
  }

  public function setShowFooter(bool $indShowFooter = true): self
  {
    $this->showFooter = $indShowFooter;

    return $this;
  }

  public function getTag(): DIV
  {
    return $this->renderTag();
  }

  private function renderTag(): DIV
  {
    $this->modal->clearAppendList();
    $this->modalDialog->clearAppendList();
    $this->modalContent->clearAppendList();

    $this->modal->append($this->modalDialog);

    $this->modalDialog->append($this->modalContent);

    if ($this->showHeader) {
      $this->modalContent->append($this->modalHeader);
    }

    if ($this->showBody) {
      $this->modalContent->append($this->modalBody);
    }

    if ($this->showFooter) {
      $this->modalContent->append($this->modalFooter);
    }

    $this->modal->tabindex = '-1';
    $this->modal->setAria('hidden', 'true');

    if ($this->fade) {
      $this->modal->addClass('fade');
    } else {
      $this->modal->removeClass('fade');
    }

    if ($this->backDropStatic) {
      $this->modal->setData('bs-backdrop', 'static');
      $this->modal->setData('bs-keyboard', 'false');
    } else {
      $this->modal->setData('bs-backdrop', null);
      $this->modal->setData('bs-keyboard', 'true');
    }

    if ($this->acceptKeyboard) {
      $this->modal->setData('bs-keyboard', 'true');
    } else {
      $this->modal->setData('bs-keyboard', 'false');
    }

    return $this->modal;
  }

  public function getModal(): DIV
  {
    return $this->modal;
  }

  public function getDialog(): DIV
  {
    return $this->modalDialog;
  }

  public function getContent(): DIV
  {
    return $this->modalContent;
  }

  public function getHeader(): DIV
  {
    return $this->modalHeader;
  }

  public function getBody(): DIV
  {
    return $this->modalBody;
  }

  public function getFooter(): DIV
  {
    return $this->modalFooter;
  }
}
