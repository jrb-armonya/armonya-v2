<?php
namespace App\Services\Predictif\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Predictif\Models\Phone;
use App\Services\Predictif\Models\Societe;

class File extends Model {

    protected $fillable = ['name'];
    public function societes()
    {
        return $this->hasMany(Societe::class);
    }
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}