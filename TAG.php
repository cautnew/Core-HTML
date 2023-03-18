<?php

namespace Cautnew\HTML;

class TAG
{
  protected array $classList = [];

  protected string $tagName = '';
  protected bool $indCloseTag = true;
  protected array $permAttr = [
    'id', 'name', 'value', 'src', 'href', 'placeholder',
    'style', 'width', 'height', 'max', 'min', 'title', 'alt',
    'type', 'method', 'action'
  ];
  protected array $permBooleanAttr = [
    'checked', 'disabled', 'multiple', 'readonly', 'required', 'selected'
  ];

  private array $attr = [];
  private array $attrBoolean = [];
  private array $attrData = [];
  private array $attrAria = [];
  private array $appendList = [];
  private array $appendListAfter = [];
  private array $appendListBefore = [];
  private array $notPermAttrDef = ['class'];

  public ?string $html = null;

  private string $RAD_ATTR_DATA = 'data';
  private string $RAD_ATTR_ARIA = 'aria';

  protected bool $indRendered = false;

  public function __toString(): string
  {
    return $this->getHtml();
  }

  public function setRadicalAttrData(string $radical): self
  {
    $this->RAD_ATTR_DATA = $radical;

    return $this;
  }

  public function setAttribute(string $name, $value): self
  {
    $this->indRendered = false;

    if ($value === null) {
      if (in_array($name, $this->permBooleanAttr)) {
        unset($this->attrBoolean[$name]);
      } else {
        unset($this->attr[$name]);
      }
    } else {
      if (in_array($name, $this->permBooleanAttr)) {
        $this->attrBoolean[$name] = (bool) $value;
      } else {
        $this->attr[$name] = $value;
      }
    }

    return $this;
  }

  public function setAttr(string $name, ?string $value): self
  {
    return $this->setAttribute($name, $value);
  }

  public function hasAttr(string $name): bool
  {
    if (isset($this->attrBoolean[$name]) || isset($this->attr[$name])) {
      return true;
    }

    return false;
  }

  public function setSpecialAttribute(string $name, $value): self
  {
    $this->$name($value);

    return $this;
  }

  public function setAttributeList(array $attributeList): self
  {
    define('SPECIAL_ATTRIBUTE_LIST', ['append', 'appendList']);
    foreach ($attributeList as $attr => $value) {
      if (in_array($attr, SPECIAL_ATTRIBUTE_LIST)) {
        $this->setSpecialAttribute($attr, $value);
      } else {
        $this->setAttribute($attr, $value);
      }
    }

    return $this;
  }

  public function setAttrList(array $attributeList): self
  {
    return $this->setAttributeList($attributeList);
  }

  public function getAttribute(string $name): ?string
  {
    if (isset($this->attr[$name])) {
      return $this->attr[$name];
    }

    return null;
  }

  public function getAttr(string $name): ?string
  {
    return $this->getAttribute($name);
  }

  protected function getAttrList(): ?array
  {
    return $this->attr;
  }

  public function setData(string $name, ?string $value): self
  {
    $this->indRendered = false;
    if ($value === null) {
      unset($this->attrData[$name]);
    } else {
      $this->attrData[$name] = $value;
    }

    return $this;
  }

  public function getData(string $name): ?string
  {
    if (isset($this->attrData[$name])) {
      return $this->attrData[$name];
    }

    return null;
  }

  public function setAria(string $name, ?string $value): self
  {
    $this->indRendered = false;
    if ($value === null) {
      unset($this->attrAria[$name]);
    } else {
      $this->attrAria[$name] = $value;
    }

    return $this;
  }

  public function getAria(string $name): ?string
  {
    if (isset($this->attrAria[$name])) {
      return $this->attrAria[$name];
    }

    return null;
  }

  public function __set($name, $value)
  {
    return $this->setAttribute($name, $value);
  }

  public function __get($name)
  {
    return $this->getAttr($name);
  }

  public function setTagName(string $tagName): self
  {
    $this->indRendered = false;
    $this->tagName = $tagName;

    return $this;
  }

  public function setIndCloseTag(bool $indCloseTag = true): self
  {
    $this->indRendered = false;
    $this->indCloseTag = $indCloseTag;

    return $this;
  }

  public function addStrClass(string $strClass): self
  {
    $arr = explode(' ', $strClass);

    foreach ($arr as $class) {
      if (!in_array($class, $this->classList)) {
        $this->indRendered = false;
        $this->classList[] = $class;
      }
    }

    return $this;
  }

  public function removeStrClass(string $strClass): self
  {
    $this->indRendered = false;
    $this->classList = array_diff($this->classList, [$strClass]);

    return $this;
  }

  public function addClass(null|string|array $classList): self
  {
    if (is_array($classList)) {
      foreach($classList as $class) {
        $this->addStrClass(str_sanity_space($class));
      }
    } else {
      $this->addStrClass(str_sanity_space($classList));
    }

    return $this;
  }

  public function removeClass($classList): self
  {
    if (is_array($classList)) {
      foreach($classList as $class) {
        $this->removeStrClass(str_sanity_space($class));
      }
    } else {
      $this->removeStrClass(str_sanity_space($classList));
    }

    return $this;
  }

  public function clearClassList(): self
  {
    $this->classList = [];

    return $this;
  }

  public function setId(null|string $id): self
  {
    return $this->setAttr('id', $id);
  }

  public function setName(null|string $name): self
  {
    return $this->setAttr('name', $name);
  }

  public function setHref(null|string $href): self
  {
    return $this->setAttr('href', $href);
  }

  public function setTitle(null|string $title): self
  {
    return $this->setAttr('title', $title);
  }

  public function append(TAG|string $elmt): self
  {
    $this->indRendered = false;

    if (gettype($elmt) === 'string') {
      $this->appendList[] = new INNERHTML($elmt);
    } else {
      $this->appendList[] = $elmt;
    }

    return $this;
  }

  public function add(TAG|string $elmt): self
  {
    return $this->append($elmt);
  }

  public function appendList(array $elmts): self
  {
    foreach ($elmts as $elmt) {
      $this->append($elmt);
    }

    return $this;
  }

  public function addList(array $elmts): self
  {
    return $this->appendList($elmts);
  }

  public function appendBefore(TAG $elmt): self
  {
    $this->indRendered = false;
    $this->appendListBefore[] = $elmt;

    return $this;
  }

  public function appendListBefore(array $elmts): self
  {
    foreach ($elmts as $elmt) {
      $this->appendBefore($elmt);
    }

    return $this;
  }

  public function appendAfter(TAG $elmt): self
  {
    $this->indRendered = false;
    $this->appendListAfter[] = $elmt;

    return $this;
  }

  public function appendListAfter(array $elmts): self
  {
    foreach ($elmts as $elmt) {
      $this->appendAfter($elmt);
    }

    return $this;
  }

  public function clearAppendList(): self
  {
    $this->indRendered = false;
    $this->appendList = [];

    return $this;
  }

  public function clearAppendAfterList(): self
  {
    $this->indRendered = false;
    $this->appendListAfter = [];

    return $this;
  }

  public function clearAppendBeforeList(): self
  {
    $this->indRendered = false;
    $this->appendListBefore = [];

    return $this;
  }

  public function clearAllAppendLists(): self
  {
    $this->clearAppendList()
    ->clearAppendAfterList()
    ->clearAppendBeforeList();

    return $this;
  }

  public function innerHTML($html): self
  {
    $this->indRendered = false;

    if (gettype($html) == 'string') {
      $this->html = $html;
    } elseif ($html != null) {
      $this->append($html);
    }

    return $this;
  }

  public function setHtml($html): self
  {
    return $this->innerHTML($html);
  }

  protected function getStringAttrValues(): string
  {
    $attr = ' ';

    foreach ($this->getAttrList() as $key => $value) {
      $attr .= " {$key}=\"{$value}\"";
    }

    return trim($attr);
  }

  protected function getStringAttrAriaValues(): string
  {
    $attr = ' ';

    foreach ($this->attrAria as $key => $value) {
      $attr .= " {$this->RAD_ATTR_ARIA}-{$key}=\"{$value}\"";
    }

    return trim($attr);
  }

  protected function getStringAttrDataValues(): string
  {
    $attr = ' ';

    foreach ($this->attrData as $key => $value) {
      $attr .= " {$this->RAD_ATTR_DATA}-{$key}=\"{$value}\"";
    }

    return trim($attr);
  }

  protected function getStringAttrBooleanValues(): string
  {
    $attr = ' ';

    foreach ($this->attrBoolean as $key => $value) {
      if ($value === true) {
        $attr .= " {$key}";
      }
    }

    return trim($attr);
  }

  protected function getStringAttrClass(): string
  {
    $class = implode(" ", $this->classList);
    return trim($class);
  }

  protected function prepareAttrClass(): void
  {
    $class = $this->getStringAttrClass();

    if (!empty($class)) {
      $this->setAttribute('class', $class);
    }
  }

  protected function getStringParams(): string
  {
    $this->prepareAttrClass();
    $attr = $this->getStringAttrValues();
    $attrData = $this->getStringAttrDataValues();
    $attrAria = $this->getStringAttrAriaValues();
    $attrBoolean = $this->getStringAttrBooleanValues();
    $params = '';

    if (!empty($attr)) {
      $params .= ' ' . $attr;
    }

    if (!empty($attrData)) {
      $params .= ' ' . $attrData;
    }

    if (!empty($attrAria)) {
      $params .= ' ' . $attrAria;
    }

    if (!empty($attrBoolean)) {
      $params .= ' ' . $attrBoolean;
    }

    return trim($params);
  }

  protected function prepareStartHtml(): string
  {
    if (empty($this->tagName)) {
      return '';
    }

    $html = "<{$this->tagName}";

    $params = $this->getStringParams();

    if (!empty($params)) {
      $html .= ' ' . $params;
    }

    if ($this->indCloseTag) {
      $html .= ">";
    } else {
      $html .= ">";
    }

    return $html;
  }

  protected function prepareEndHtml(): string
  {
    if (empty($this->tagName) || !$this->indCloseTag) {
      return '';
    }

    return "</{$this->tagName}>";
  }

  protected function prepareContentHtml(): string
  {
    $html = '';

    if (!empty($this->html)) {
      $html .= $this->html;
    }

    if (!empty($this->appendList)) {
      foreach ($this->appendList as $elmt) {
        $html .= $elmt->getHtml();
      }
    }

    return $html;
  }

  protected function prepareAppendBefore(): string
  {
    $html = '';

    if (!empty($this->appendListBefore)) {
      foreach ($this->appendListBefore as $elmt) {
        $html .= $elmt->getHtml();
      }
    }

    return $html;
  }

  protected function prepareAppendAfter(): string
  {
    $html = '';

    if (!empty($this->appendListAfter)) {
      foreach ($this->appendListAfter as $elmt) {
        $html .= $elmt->getHtml();
      }
    }

    return $html;
  }

  public function renderHtml(): self
  {
    $html = $this->prepareAppendBefore();
    $html .= $this->prepareStartHtml();
    $html .= $this->prepareContentHtml();
    $html .= $this->prepareEndHtml();
    $html .= $this->prepareAppendAfter();

    $this->html = $html;

    $this->indRendered = true;

    return $this;
  }

  public function render(): self
  {
    return $this->renderHtml();
  }

  public function getHtml(): string
  {
    if (!$this->indRendered) {
      $this->renderHtml();
    }

    return $this->html;
  }

  public function printHtml(): void
  {
    echo $this->getHtml();
  }

  public function print(): void
  {
    $this->printHtml();
  }
}
