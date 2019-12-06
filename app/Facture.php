<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model {

    protected $fillable = ['partenaire_id', 'status'];

    public function fiches() {
        return $this->hasMany('App\Fiche');
    }
    public function partenaire() {
        return $this->belongsTo('App\Partenaire');
    }

    public function amount() {
        return $this->partenaire->prix_fiche  * $this->fiches->count();
    }
}
