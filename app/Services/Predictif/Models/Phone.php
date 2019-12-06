<?php
namespace App\Services\Predictif\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model{

    protected $fillable = ['nbr', 'used', 'societe_id'];

    public function societe()
    {
        return $this->belongsTo(Societe::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}