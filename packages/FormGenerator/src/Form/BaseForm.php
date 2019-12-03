<?php

namespace Jrb\FormGenerator\Form;

class BaseForm
{
  protected $id = 'BaseForm';

  protected $name = 'my-bf';

  protected $class;

  protected $htmlBuffer;

  protected function draw()
  {
    echo $this->htmlBuffer;
    $this->cleanBuffer();
  }

  private function cleanBuffer()
  {
    $this->htmlBuffer = '';
  }
}
