<?php

namespace Jrb\FormGenerator\Form;

class Input extends BaseForm
{
  protected $type;

  protected $value;

  public function __construct($id, $name, $class = [], $value = null, $type)
  {
    $this->id = $id;
    $this->name = $name;
    $this->class = $class;
    $this->value = $value;
    $this->type = $type;
  }
}
