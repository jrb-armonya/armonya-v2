<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    //STATUS
    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

    //role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
