<?php
namespace App\Services\Groups\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Groups\Models\Group;
use App\User;


class GroupRole extends Model {
    
    protected $fillable = [
        'name', 'desc'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function group()
    {
        return $this->hasMany(Group::class);
    }

}