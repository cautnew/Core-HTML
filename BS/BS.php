<?php

// Methods for BS 5 and above

namespace Core\HTML\BS;

use Core\HTML\TAG;

class BS
{
  private array $bsClassList;
  private array $bsAriaList;

  private array $bsGridBreakpoints = ['xs', 'sm', 'md', 'lg', 'xl', 'xxl'];
  private array $bsSpacingClass = ['m', 'me', 'ms', 'mt', 'mb', 'ml', 'mr', 'mx', 'my', 'p', 'pe', 'ps', 'pt', 'pb', 'pl', 'pr', 'px', 'py'];
  private array $bsContextList = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

  private string $bsElementName;
  private string $bsContext;

  private string $RAD_ATTR_ARIA = 'aria';

  private $finalElement;

  public function __invoke()
  {
    return $this->getFinalElement();
  }

  public function append($append = null): self
  {
    if ($append === null) {
      return $this;
    }

    if (gettype($append) == 'array') {
      $this->getTag()->appendList($append);
    } else {
      $this->getTag()->append($append);
    }

    return $this;
  }

  public function getFinalElement()
  {
    return $this->getTag();
  }

  public function getTag()
  {
    return $this->finalElement;
  }
}
