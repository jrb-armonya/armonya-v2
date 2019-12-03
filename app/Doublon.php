<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doublon extends Model
{
    protected $fillable = ['fiche1', 'fiche2', 'subject'];

    public function ficheOne() {
        return $this->belongsTo(Fiche::class, 'fiche1');
    }

    public function ficheTwo() {
        return $this->belongsTo(Fiche::class, 'fiche2');
    }
}
