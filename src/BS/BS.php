<?php

// Methods for BS 5 and above

namespace HTML\BS;

use HTML\TAG;

class BS
{
  private array $bsClassList;
  private array $bsAriaList;

  protected array $bsGridBreakpoints = ['xs', 'sm', 'md', 'lg', 'xl', 'xxl'];
  protected array $bsShadowSizes = ['sm', 'md', 'lg'];
  protected array $bsSpacingClass = ['m', 'me', 'ms', 'mt', 'mb', 'ml', 'mr', 'mx', 'my', 'p', 'pe', 'ps', 'pt', 'pb', 'pl', 'pr', 'px', 'py'];
  protected array $bsContextList = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
  protected array $bsBackgroundColors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'white', 'transparent'];

  private string $bsElementName;
  private string $bsContext;

  private string $RAD_ATTR_ARIA = 'aria';

  protected TAG $finalElement;

  public function __invoke()
  {
    return $this->getTag();
  }

  public function __toString()
  {
    return $this->getTag()->getHtml();
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

  /**
   * Renders the final element of the class.
   * @return self
   */
  public function render(): self
  {
    return $this;
  }

  /**
   * Renders and returns the final element of the class.
   * @return TAG
   */
  public function getTag(): TAG
  {
    return $this->render()->finalElement;
  }

  /**
   * Returns the final element of the class without rendenring it's object.
   * If you want to get the element rendered use the getTag() method.
   * @return TAG
   */
  public function getFinalElement(): TAG
  {
    return $this->finalElement;
  }

  public function setId(string $id): self
  {
    if (empty($id)) {
      return $this;
    }

    $this->getTag()->setId($id);

    return $this;
  }

  public function addClass(string $class): self
  {
    $this->getTag()->addClass($class);

    return $this;
  }
}
