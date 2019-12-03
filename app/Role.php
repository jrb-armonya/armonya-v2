<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions() {
        return $this->belongsToMany('App\Permission');
    }

    public function permission($perm) {
        $v = false;
        foreach ($this->permissions as $p) {
            if ( $p->name == $perm)
            {
                $v = true;
            }
        }
        return $v;
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    public function users() {
        return $this->hasMany('App\User');
    }
}
