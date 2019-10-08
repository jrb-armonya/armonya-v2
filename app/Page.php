<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    
    public function parent()
    {
        return Page::find($this->parent);
    }

    public function isParent()
    {
        return $this->parent === 0 ;
    }

    public function children()
    {
        return Page::where('parent', $this->id)->get();
    }

}
