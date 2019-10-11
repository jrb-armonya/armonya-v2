<?php
namespace App\Services\Groups\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Group extends Model {
    
    use SoftDeletes;

    protected $fillable = [
        'name', 'desc', 'color'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['role_id']);
    }

    public function head()
    {
        return $this->users()->whereHas('groups', function($q){
            $q->where('group_user.role_id', 1);
        })->first();
    }

    public function ta()
    {
        return $this->users()->whereHas('groups', function($q){
            $q->where('group_user.role_id', 2);
        })->get();
    }
}