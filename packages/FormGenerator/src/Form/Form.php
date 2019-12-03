<?php

namespace Jrb\FormGenerator\Form;

class Form extends BaseForm
{
  protected $method = 'POST';

  protected $action;

  public function __construct($id, $name, $class, $method, $action)
  {
    $this->id = $id;
    $this->name = $name;
    $this->class = $class;
    $this->method = $method;
    $this->action = $action;
  }

  public function newForm()
  {
    $this->htmlBuffer = "
    <form id='$this->id' name='$this->name' class='$this->class'>

    </form>
    ";

    $this->draw();
  }
}
