<?php
namespace App\Services\Predictif\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Predictif\Models\Phone;

class Societe extends Model{
    

    protected $fillable = ['name', 'nbr_phones', 'standard', 'comment', 'adresse'];

    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function available_phones() {
        return $this->phones()->where('used', 0);
    }

}